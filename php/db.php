<?php
function createDb()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "book_store";
    // create connection
    $con = mysqli_connect($servername, $username, $password);
    // Check Connection
    if (!$con) {
        die("Connection Failed:" . mysqli_connect());
    }
    // create Database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if (mysqli_query($con, $sql)) {
        $con = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "CREATE TABLE IF NOT EXISTS books(
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            book_name VARCHAR(30) NOT NULL,
            book_publisher VARCHAR(30),
            book_price FLOAT
            );
        ";
        if (mysqli_query($con, $sql)) {
            return $con;
        } else {
            echo "Cannot Create Table...!";
        }
    } else {
        echo "Error while creating database" . mysqli_error($con);
    }
}
