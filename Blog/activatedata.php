<?php
include("dbconn.php");
include("FileController.php");
$name=$_POST['aname'];
$sql=new FileController();
$sql->activateData($name);
?>