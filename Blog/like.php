<?php
session_start();
include("dbconn.php");
include('FileController.php');
$na=$_SESSION['name'];
$id=$_POST['id'];
$gt=new FileController();
$gt->check($na,$id);
?>