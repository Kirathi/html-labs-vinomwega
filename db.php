<?php
//establish a database coonection
$db = mysqli_connect('localhost','root','mocheche');

//if the connection is not established, then,
//terminate execution and print out the error 
if(!$db){
    die(mysqli_connect_error()); 
}