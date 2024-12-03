<?php

include 'connection.php';
date_default_timezone_set('Asia/Dhaka'); 
// Base date

$sql = "select * from date_tracking where id = 1";
$result = $conn->query($sql);


$range_date = $result->fetch_assoc();
$sqlMinDateFormatted = $range_date['min_date'];//2024_11_27
$sqlMaxDateFormatted = $range_date['max_date'];



$presentDate = new DateTime();//today's date

$minDate = clone $presentDate;
$maxDate = clone $presentDate;


$maxDate = newDate($maxDate, +5);//5 days after date
$minDate = newDate($minDate, -5);//5 days before date




$presentDateTable = dateToString($presentDate);//2024_11_27
$minDateTable = dateToString($minDate);//2024_11_22
$maxDateTable = dateToString($maxDate);//2024_12_02

//echo "Present Date:".$presentDate->format('Y-m-d')."<br>";
//echo "Present date: $presentDateTable<br>";
//echo "Min date: $minDateTable<br>";
//echo "Max date: $maxDateTable<br>";
//echo "Previous  Min date: $sqlMinDateFormatted<br>";
//echo "Previous  Max date: $sqlMaxDateFormatted<br>";

if (isset($sqlMinDateFormatted) && isset($sqlMaxDateFormatted)) {

    if ($sqlMinDateFormatted != $minDateTable && $sqlMaxDateFormatted != $maxDateTable) {
        //echo "Min date: $sqlMinDateFormatted<br>";
        //echo "new min date: $minDateTable<br>";
        //echo "Max date: $sqlMaxDateFormatted<br>";
        //echo "new max date: $maxDateTable<br>";

        dropTable($sqlMinDateFormatted);//drop previous min date table

        createTable($maxDateTable);//create next max date table

        updateMinMaxDate($minDateTable, $maxDateTable);//update min and max date




        exit();


    } else {

        //echo "No update needed";

    }



} else {
    createMultipleTables($minDate, $minDateTable, 5);  // For previous 5 days
    createMultipleTables($presentDate, $presentDateTable, 6);      // For the next 6 days
    updateMinMaxDate($minDateTable, $maxDateTable);
}
//echo "Previous date: $prevDateTable<br>";
//echo "Next date: $nextDateTable<br>";




function updateMinMaxDate($minDateTable, $maxDateTable)
{
    global $conn;

    $insertMinMaxDateQuery = "UPDATE `date_tracking` 
          SET min_date = '$minDateTable', max_date = '$maxDateTable' 
          WHERE id = 1";

    $minMaxResult = $conn->query($insertMinMaxDateQuery);
    if ($minMaxResult) {
        //echo "Min and max date updated successfully";
    } else {
        echo "Error updating min and max date: " . $conn->error;
        exit();
    }
}

// Function to calculate a new date after a specified number of days
function newDate($date, $days)
{
    if ($date instanceof DateTime) {
        $date = clone $date;  // Ensure the original date is not modified
        $future = $date->modify($days . ' days');  // Modify based on days
        return $future;  // Return DateTime object, not a string
    } else {
        throw new Exception('Input must be a DateTime object');
    }
}

// Function to format a date as Y_m_d
function dateToString($date)
{
    if ($date instanceof DateTime) {
        return $date->format('Y_m_d'); // Ensure the DateTime object is formatted correctly
    } else {
        throw new Exception('Input must be a DateTime object');
    }
}

function insertQuery($tableName)
{
    $query = "CREATE TABLE `$tableName` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    bus_code CHAR(4) NOT NULL,
    seat_name CHAR(2) NOT NULL,
    status VARCHAR(255),
    booked_date DATE,
    booked_user_id INT,
    name VARCHAR(255),
    email VARCHAR(255),
    phone_number VARCHAR(15),
    FOREIGN KEY (bus_code) REFERENCES bus(bus_code),
    FOREIGN KEY (booked_user_id) REFERENCES user(id)
        )";

    return $query;
}

function checkTable($tableName)
{
    global $conn;
    $query = "SELECT COUNT(*) 
              FROM information_schema.tables 
              WHERE table_schema = DATABASE() 
              AND table_name = '$tableName'";

    $result = $conn->query($query);
    $row = $result->fetch_row();

    return $row[0] > 0;
}

function createMultipleTables($date, $tableName, $days)
{
    global $conn;

    for ($i = 0; $i < $days; $i++) {
        $newDate = newDate($date, $i);  // Calculate the new date
        $currentTableName = dateToString($newDate);  // Generate table name based on the date

        // Check if the table already exists
        if (checkTable($currentTableName)) {
            //echo "Table '$currentTableName' already exists.<br>";
            continue;
        }

        // Create the table
        $createQuery = insertQuery($currentTableName);
        $result = $conn->query($createQuery);

        if ($result) {
           // echo "Table '$currentTableName' created successfully.<br>";
            insertData($currentTableName);  // Insert data into the newly created table
        } else {
            echo "Error creating table '$currentTableName': " . $conn->error . "<br>";
            exit();
        }
    }
}

function getSeatNumber($i, $j)
{
    return "$i" . chr(65 + $j); // Generate seat names like 1A, 1B, etc.
}
function insertData($tableName)
{
    global $conn;

    // Fetch all bus codes and capacities
    $query = "SELECT bus_code, capacity FROM bus";
    $buses = $conn->query($query);

    if (!$buses) {
        echo "Error fetching buses: " . $conn->error . "<br>";
        return;
    }

    // Helper function to generate seat names


    // Insert data for each bus
    foreach ($buses as $bus) {
        for ($i = 1; $i <= 8; $i++) { // Rows 1 to 8
            for ($j = 0; $j <= 3; $j++) { // Columns A to D
                // Skip the last column (D) if bus capacity is less than 32
                if ($j == 3 && $bus['capacity'] != 32) {
                    continue;
                }

                $seatName = getSeatNumber($i, $j);

                // Insert query for each seat
                $insertQuery = "INSERT INTO `$tableName` (bus_code, seat_name, status, booked_date, booked_user_id) 
                                VALUES ('{$bus['bus_code']}', '$seatName', 'free', NULL, NULL)";

                // Execute the query and check for errors
                if ($conn->query($insertQuery) !== TRUE) {
                   // echo "Error inserting data into '$tableName' for bus '{$bus['bus_code']}', seat '$seatName': " . $conn->error . "<br>";
                }
            }
        }
    }

    //echo "Data inserted successfully into table: $tableName.<br>";
}
function dropTable($tableName)
{
    global $conn;

    $dropQuery = "DROP TABLE IF EXISTS `$tableName`";
    $result = $conn->query($dropQuery);


}
function createTable($tableName)
{
    global $conn;

    $createQuery = insertQuery($tableName);
    $result = $conn->query($createQuery);
    if ($result) {
      //  echo "Table '$tableName' created successfully.<br>";
        insertData($tableName);
    } else {
        echo "Error creating table '$tableName': " . $conn->error . "<br>";
        exit();
    }




}
?>