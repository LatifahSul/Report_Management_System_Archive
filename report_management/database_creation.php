<?php

include 'database_connection.php';


// Select 1 from users table will return false if the table does not exist.
$val = mysqli_query($con, 'select * from `users` LIMIT 1');

if ($val == FALSE) {
    // Not EXISTS
    // sql to create users table
    $sql = "CREATE TABLE users(
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(50),
        password VARCHAR(50),
        permissions VARCHAR(50),
        last_login TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
        first_name VARCHAR(50),
        last_name VARCHAR(50),
        role VARCHAR(50)
    )";
    // selection query
    mysqli_query($con, $sql);

    $param_password = password_hash('123456', PASSWORD_DEFAULT); // Creates a password hash

    //insert sql
    $sql_insert = "INSERT INTO users (email, password, first_name, last_name, permissions, role) VALUES ('admin@gmail.com','$param_password', 'Admin','Admin', 'KSA','Admin')";
    // insertion query
    mysqli_query($con, $sql_insert);

    $param_password = password_hash('123456', PASSWORD_DEFAULT); // Creates a password hash
    //insert sql
    $sql_insert = "INSERT INTO users (email, password, first_name, last_name, permissions, role) VALUES ('user@gmail.com','$param_password', 'User','User', 'KSA','User')";
    // insertion query
    mysqli_query($con, $sql_insert);
} //end-if

// Select 1 from reportDoc table  will return false if the table does not exist.
$val2 = mysqli_query($con, 'select * from `reportdoc` LIMIT 1');

if ($val2 == FALSE) {
    // Not EXISTS
    // sql to create table
    $sql2 = "CREATE TABLE reportdoc(
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        groups VARCHAR(50),
        tags VARCHAR(50),
        file_image LONGBLOB
    )";
    // selection query
    mysqli_query($con, $sql2);
}//end-if2
?>