<?php

$dbhost = 'localhost';
$dbuser  = 'root';
$dbpass  = '';
$dbname  = 'userdb';


//$connection=mysqli_connect(dbserver, dbuser,dbpass,dbname);
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// chech error -> mysqli_connect_errno()  ,display error -> mysqli_connect_error()

if (mysqli_connect_errno()) {
    die('Database connection fail' . mysqli_connect_error());
} else {
    //echo "Connerction succesful.<br>";
}
