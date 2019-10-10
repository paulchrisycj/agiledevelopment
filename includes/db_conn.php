<?php
/**
 * Created by PhpStorm.
 * User: chins
 * Date: 5/4/2016
 * Time: 9:08 PM
 */
date_default_timezone_set("Asia/Kuala_Lumpur");

$host="";
$port=3306;
$socket="";
$user="";
$password="";
$dbname="";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket) //Note, $conn and $con is 2 seperate database object, seperate to debug.
or die ('Could not connect to the database server' . mysqli_connect_error());


//$con->close();
?>