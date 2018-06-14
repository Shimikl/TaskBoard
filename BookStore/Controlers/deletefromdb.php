
<?php
session_start();
 if (!isset($_SESSION['loguser'])) {
                    header("Location:http://localhost/objectBookStote/login.html");
                    exit;
                }
require_once '../db/Connect.php';
require_once '../models/book.php';


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if  ($_POST['bookid']!="")
{
    
    $getid = $_POST['bookid'];
echo $_POST['bookid'];
$sql = "DELETE FROM books WHERE book_id=$getid";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
}

 else {
    echo 'No Id To Delete';
  // header('Location:  http://localhost/objectBookStote/index.php');

 }
$conn->close();

echo '<br/>';
echo '<br/>';
echo ' <a href="../index.php"> Go Back To Main Screen</a>';
?>
