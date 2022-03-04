<?php
include("dbconn.php");
include('FileController.php');
session_start();
$username = $_POST["user"];
$password = $_POST["pass"];
$pass=MD5($password);
$query=new FileController();
$query->checklog($username,$pass);
?>