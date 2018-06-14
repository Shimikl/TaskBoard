<?php

$servername = "shimonk3355711.ipagemysql.com";
$username = "roshimikot";
$password = "Sk171974";
$dbname = "book_storeobjetoriented";
$conn = mysqli_connect($servername, $username, $password, $dbname);

$GLOBALS["connection"]= $conn;
//mysqli_close($conn);
