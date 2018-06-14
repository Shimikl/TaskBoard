<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS Book_StoreObjetOriented";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
mysqli_select_db($conn,"Book_StoreObjetOriented");

$sql2= " CREATE TABLE IF NOT EXISTS books (
 book_id INT AUTO_INCREMENT PRIMARY KEY,
book_name VARCHAR (255) DEFAULT NULL,
author VARCHAR (255) DEFAULT NULL,
price decimal DEFAULT NULL
)";
if ($conn->query($sql2) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating Table: " . $conn->error;
}
$conn->close();
