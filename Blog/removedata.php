<?php
include("dbconn.php");
include("FileController.php");
$name=$_POST['rname'];
$sql=new FileController();
$sql->remove($name);
?>