<?php
session_start();
require_once '../db/Connect.php';
require_once '../models/book.php';


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$book2 = new book();
$book2->bookname = $_POST['bookname'];
$book2->author = $_POST['author'];
$book2->price = $_POST['price'];

echo $_POST['bookid'];
echo $_POST['bookname'];
$bookname=$_POST['bookname'];
$author= $_POST['author'];
$price = $_POST['price'];
$bookid=$_POST['bookid'];
//$sqlInsertStat = "UPDATE books  SET book_name='" . $bookname. "' ,"
     //   . " author= '" . $author . "' , "
     //   . "price=" . $price
     //   . " WHERE book_id=" . $bookid;
$sql="UPDATE  books set book_name='$bookname', author='$author', price=$price  Where book_id=$bookid";


 $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "DB updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

mysqli_close($conn);


echo '<br/>';
echo '<br/>';
echo ' <a href="../index.php"> Go Back To Main Screen</a>';
?>
