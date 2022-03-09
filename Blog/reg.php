<?php
session_start();
include('dbconn.php');
include('FileController.php');
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$query=new FileController();
$query->registration($name,$email,$phone,$password);
?>