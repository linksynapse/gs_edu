<?php
    $servername = "192.168.10.30";
    $username = "nscn101s_SYS";
    $password = "p]S=xJ#~hs+C";
    $database = "nscn101s_SYS";

    // Create connection
    $PDO = new PDO("mysql:host=$servername;port=3306;dbname=$database;charset=utf8",$username,$password);
?>