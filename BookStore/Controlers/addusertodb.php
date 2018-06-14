<?php

require_once '../db/Connect.php';
require_once '../models/book.php';
require_once '../viewes/addbook.php';





$book1 = new book();
$book1->bookname = $_POST['bname'];
$book1->author = $_POST['author'];
$book1->price = $_POST['price'];




$stmt = $conn->prepare("INSERT INTO books (book_name, author, price) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $bname, $author, $price);

$bname=$_POST['bname'];
$author= $_POST['author'];
$price = $_POST['price'];
$stmt->execute();


echo 'New records created successfully'; 

$stmt->close();
echo '<br/>';
echo '<br/>';
echo ' <a href="../index.php"> Go Back To Main Screen</a>';
?>
