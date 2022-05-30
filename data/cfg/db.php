<?php
    $servername = getenv('DB_HOST');
    $port = getenv('DB_PORT');
    $username = getenv('DB_AUTH_ID');
    $password = getenv('DB_AUTH_PW');
    $database = getenv('DB_NAME');
    
    // Create connection
    $PDO = new PDO("mysql:host=$servername;port=$port;dbname=$database;charset=utf8",$username,$password);
?>