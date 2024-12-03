
# 🚌 Online Bus Ticket Booking System 1.0


The Online Bus Ticket Booking System is a web-based application designed to provide a seamless and efficient platform for booking bus tickets. It simplifies the process for passengers and streamlines management tasks for administrators. With a user-friendly interface and robust functionality, this system enhances the overall experience of bus travel.



 

## Authors

- [@Rakib-28169-islam](https://github.com/Rakib-28169-islam)[Backend]
- [@MubtasinShihab](https://github.com/MubtasinShihab)[Frontend]


## 🛠️ Technologies Used

    Frontend: HTML, TailWind-CSS, Raw PHP
    Backend: PHP
    Database: MySQL 
    Additional Tools: XAMMP(DBMS)
## 🚀 Features
For Passengers:

    🔍 Search Buses:
    User can Search Buses From --> To Location with Coach Type and Date Based.

    🚌 Dynamic Bus:
     For Dynamic Bus Time, We work with two predefined location_time for a specific Location with predefined location_level(e.x 1,2,3...) 
     so that user can search from specific bus stop location.
    (E.X  Dhaka - Jessore - Benapole location buses .User can search

     Dhaka    -> Benapole
     Dhaka    -> Jessore
     Jessore  -> Benapole
     Jessore  -> Dhaka
     Benapole -> Jessore
     Benapole -> Dhaka
     Benapole -> Jessore etc
     )


    🪑 Good Looking UI with Dynamic Seat Map:
     we work with AC(24 seats) and Non AC(32 Seats) So that we handle dynamic seat map for ac and Non Ac Buses.
    Look At Below Screen Shots for ticketPanel.php file. 
    User can select one or more than one seats at a time .
    Also they can cancel those selected seats and Confirm.
    User Can't select previous booked seats.
    We Handle dynamic Ticket Price calculation. 

    💳 Secure Payments: 
    No actual Payment option But in Future, Inshallah We will work on it.

    ✅ Refundable Options:
    A User can refund his/her tickets based on booking Dates.They Have to cancel there ticket before 2 days at least.

    📂 Manage Bookings:
    View booking history, upcoming trips, and cancel or modify reservations.

For Administrators:

🛠️ Bus Management: 
Add, update, and manage bus details, schedules, and routes.

🎟️ Booking Overview:
 Monitor bookings and ticket availability.

🖥️ Dynamic Updates:
 we record total 12 days of bus and ticket information(Dynamically.
 So that User can Booked advance ticket  5 days before.
 Admin has the accaccess to see the previous 6 days record.
 Every Day the date_name_table will updated autoautomatically and remove the last previous date_name_table.
## 💡 How to Run the Project



# ![Open Xammp Like this](./screenshots/s1.png)


# create a database named 'cse311project' on your phpMyAdmin


Import The sql file on your XAMMP phpMyAdmin Server
```bash
(this is the .sql file name for import)--->  cse311project(3).sql
```

## After Import database

![phpMyAdmin Panel](./screenshots/s2.png)




Clone this repository On:
Local(C)Drive -> xammp -> htdocs 

```bash
  git clone https://github.com/Rakib-28169-islam/Online-Bus-Ticket-Booking-System.git
```

Navigate to the project directory:
```bash
cd Online-Bus-Ticket-Booking-System
```


write this link on your brower and enjoy :)
```bash
http://localhost/Online-Bus-Ticket-Booking-System/userHome.php
```


## Review Of The Website

![](./screenshots/userHome1.png)
![](./screenshots/userHome2.png)
![](./screenshots/userHome3.png)
![](./screenshots/userHome4.png)
![](./screenshots/login.png)
![](./screenshots/signUp.png)
![](./screenshots/search1.png)
![](./screenshots/search1Result.png)
![](./screenshots/search1ResultSeat.png)
![](./screenshots/search2.png)
![](./screenshots/search2Result.png)
![](./screenshots/search2ResultSeat.png)
![](./screenshots/selectSeat.png)
![](./screenshots/finalTicket.png)
![](./screenshots/ticketOperation.png)

<<<<<<< HEAD
=======

>>>>>>> dce9401e9c02f7da9be4b52f06250bbbf767664e
