<?php
$hostname="localhost";
$username="root";
$password="";
$dbname=db_HW2;

$conn=new mysqli($hostname,$username,$password,$dbname);
if(!$conn){
    echo "DB not connected";
}

?>