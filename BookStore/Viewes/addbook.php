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
        <form method="POST" action="../controlers/addtodb.php">
            <input type="text" name="bname" placeholder="enter book name"/><br/><br/>
            <input type="text" name="author" placeholder="enter book author"/><br/><br/>
            <input type="number" name="price" placeholder="enter book price"/><br/><br/>
           
            <br/>
            <input type="submit" value="SEND TO SERVER"/>
        </form>
        <?php
       
        ?>

    </body>
</html>
