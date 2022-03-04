<?php
session_start();
include("dbconn.php");
include('FileController.php');
$na=$_SESSION['name'];
$id=$_GET['id'];
$gt=new FileController();
$gt->check1($na,$id);
?>