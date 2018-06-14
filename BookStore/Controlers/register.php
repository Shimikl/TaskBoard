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
        <title>Register</title>
    </head>
    <body>
        <?php
        require_once '../models/user.php';
        require_once '../db/connect.php';

        $reguser = $_POST['username'];
        $regemail = $_POST['email'];
        $regpass = $_POST['password'];
        $regconfpass = $_POST['confirm-password'];

        //echo $reguser.'  '.$regemail.'  '.$regpass.'  '.$regconfpass;

        if ($regpass == $regconfpass) {
            $reguser = $_POST['username'];
            $sql_u = "SELECT * FROM users WHERE name='$reguser'";
            $res_u = mysqli_query($conn, $sql_u);
            if (mysqli_num_rows($res_u) > 0) {
                echo  "Sorry... username already taken";
                echo '<script>setTimeout(function(){window.location.href = "http://localhost/objectBookStote/login.html";}, 2000);</script>';
            } else {
                //  $reguser = $_POST['username'];
                $regemail = $_POST['email'];
                $regpass = $_POST['password'];
                $acceptetduser = new user($reguser, $regemail, $regpass);
                //  var_dump($acceptetduser);
                $conn = $GLOBALS["connection"];
                $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $acceptetduser->username, $acceptetduser->email, $acceptetduser->password);
                $stmt->execute();

                echo 'user updated successfully';
                echo '<br/>';
                echo '<h1 style="color:yellow;">You will be taken back to the login page</h1>';
                $stmt->close();
                $conn->close();
                echo '<script>setTimeout(function(){window.location.href = "http://localhost/objectBookStote/login.html";}, 2000);</script>';
            }
        } else {
            echo 'Password Not Match Try Again';
            echo '<script>setTimeout(function(){window.location.href = "http://localhost/objectBookStote/login.html";}, 2000);</script>"';
        }
        ?>
    </body>
</html>
