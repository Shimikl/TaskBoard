<?php

session_start();
session_unset('loguser');

  echo '<h1 style="color:yellow;">You will be taken back to the login page</h1>';
   echo '<script>setTimeout(function(){window.location.href = "http://localhost/objectBookStote/login.html";}, 1000);</script>"';