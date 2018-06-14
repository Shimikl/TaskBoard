<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
         if (!isset($_SESSION['loguser'])) {
                    header("Location:http://localhost/objectBookStote/login.html");
                    exit;
                }
        require '../db/connect.php';

        //  echo $getid;
        if ($_POST['bookid']!="") {
            $getid = $_POST['bookid'];
            $sql = "SELECT book_id,book_name, author,price  FROM books where book_id = $getid";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    //  echo "id: " . $row["book_id"] . $row["book_name"]. $row["author"]. $row["price"]. "<br>";
                    echo " <form method='POST' action='../controlers/updatedb.php'>";
                    echo " <input type='hidden' name='bookid' value='$row[book_id]'/><br/><br/>";
                    echo 'Book Name <br/>';
                    echo " <input type='text' name='bookname' value='$row[book_name]'/><br/><br/>";
                    echo 'Author <br/>';
                    echo "<input type='text' name='author' value='$row[author]'/><br/><br/>";
                    echo 'Priec <br/>';
                    echo "<input type='number' name='price' value='$row[price]'/><br/><br/>";
                    echo '<br/>';
                    echo ' <input type="submit" value="Update"/>';
                    echo '</form>';
                }
            }
        } else {

            echo 'No Id To Update';
            //   header('Location:  http://localhost/objectBookStote/index.php');
            echo '<br/>';
            echo '<a href="http://localhost/objectBookStote/index.php">Back to Main Screen</a>';
        }

        $conn->close();
        ?>





    </body>
</html>
