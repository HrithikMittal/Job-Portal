


<?php

//this file is to connect to the database to retrieve and write data
//this is the address of the database. since the database is on the same host, we can use "localhost"

$host = "localhost";

//this is the database user that the website will use
$dbuser = "saujan";

//this is the password for the database user
$dbpassword = "";

//this is the name of the database
$database = "userRegistration";

$dbconnection = mysqli_connect($host,$dbuser,$dbpassword,$database);

// Check connection
$con = mysqli_connect($host,$dbuser,$dbpassword,$database) or die("Error " . mysqli_error($con));
?>



<?php
 try {
    $pdo = new PDO('mysql:host=localhost;dbname=userRegistration', 'root', '');
     
} catch (PDOException $e) {
    print "Connetion Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>