<?php
include("dbconn.php");
include('FileController.php');
session_start();
$name=$_POST["name"];
$brief=$_POST["brief"];
$t="product-images/".basename($_FILES['file']['name']);
$photo=$_FILES["file"]["name"];
$query=new FileController();
$query->uploadData($name,$brief,$t,$photo);
?>