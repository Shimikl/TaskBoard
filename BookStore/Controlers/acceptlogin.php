<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <style>

            body{
                text-align: center;
                background-image: url("https://hdwallsource.com/img/2014/7/free-vintage-wallpaper-tumblr-24514-25183-hd-wallpapers.jpg");
                background-repeat: no-repeat;
            }
        </style>
        <title>AcceptLogin</title>
    </head>
    <body>
        <?php
        session_start();
        require_once '../models/user.php';
        require_once '../db/connect.php';
        $loguser = $_POST['username'];
        $logpass = $_POST['password'];

        $sql_u = "SELECT * FROM users WHERE name='$loguser'AND password = '$logpass'";
        $res_u = mysqli_query($conn, $sql_u);
        if (mysqli_num_rows($res_u) > 0) {
           $_SESSION['loguser'] = $loguser ;
            echo 'Exelent';
            echo '<script>setTimeout(function(){window.location.href = "http://localhost/objectBookStote/index.php";}, 2000);</script>';
        } else {
            echo 'User Name Or Password Error';
            echo '<h1 style="color:yellow;">You will be taken back to the login page</h1>';
            echo '<script>setTimeout(function(){window.location.href = "http://localhost/objectBookStote/login.html";}, 2000);</script>';
        }
        ?>
    </body>
</html>