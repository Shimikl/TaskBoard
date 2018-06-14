 
<?php
require_once '\db\CreateDb.php';
require '\db\Connect.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <style>
        body{
            text-align: center;
            background-image: url("https://hdwallsource.com/img/2014/7/free-vintage-wallpaper-tumblr-24514-25183-hd-wallpapers.jpg");
            background-repeat: no-repeat;
        }

        #mytable{
            margin-top: 100px;
            margin-left: 28%;
            text-align: center;
        }

        .link-btn {
            color: white;
            background: blue;
        } 
         .logout-btn {
            color: white;
            background: red;
            float: left; 
        } 
    </style>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <br/>
        <a href="Controlers/logout.php" class="logout-btn">Log-Out</a>
        <a href="Viewes/addbook.php" class="link-btn">ADD BOOK</a>
        <br/> <br/>
        <form method="POST" action="Viewes/updatebook.php">

            <input type="number" placeholder="Book id to Edit" name="bookid" /><br/>
            <input type="submit" value="Edit" id="editbookbtn" />
        </form>

        <form method="POST" action="controlers/deletefromdb.php">

            <input type="number" placeholder="Book id to delete" name="bookid" /><br/>
            <input type="submit" value="DELETE" id="deletebookbtn" />
        </form>

        <table id="mytable" border="1" style="width: 500px;">
            <tr>
                <td style=" height:50px;" colspan="7">BOOK STORE</td>
            </tr>
            <tr>
                <td style="width: 50px;height:50px;background-color: yellow">BOOK ID</td>
                <td style="width: 50px;height:50px;background-color: yellow">BOOK NAME</td>
                <td style="width: 50px;height:50px;background-color: yellow">AUTHOR</td>
                <td style="width: 50px;height:50px;background-color: yellow">PRICE</td>


                <?php
                session_start();
                if (!isset($_SESSION['loguser'])) {
                    header("Location:http://localhost/objectBookStote/login.html");
                    exit;
                }
                $sql = "SELECT book_id,book_name, author,price FROM book_storeobjetoriented.books";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo "<tr>";
                        echo " <td style=width: 50px;height:50px;>$row[book_id]</td>";
                        echo " <td style=width: 50px;height:50px;>$row[book_name]</td>";
                        echo " <td style=width: 50px;height:50px;>$row[author]</td>";
                        echo " <td style=width: 50px;height:50px;>$row[price]</td>";
                        echo" </tr>";
                    }
                    echo" </table> ";
                }
                ?>

                </body>
                </html>
