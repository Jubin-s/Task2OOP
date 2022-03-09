<?php
session_start();
include("dbconn.php");
include('FileController.php');
$na=$_SESSION['name'];
$id=$_POST['id'] ?? 0;
$gt=new FileController();
$gt->check1($na,$id);
?>