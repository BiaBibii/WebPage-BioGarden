<?php
session_start(); 
	include_once('connection.php');
	
$editData = $_POST['text'];
$retetaId=$_POST['id'];

if(isset($_POST['id'])) {
   
	$sql ="UPDATE  retete SET text='$editData' WHERE id='$retetaId';";
	$result=$conn->query($sql);
     /*header("Location:http://localhost/shop/index.php?action=retete");
		die();*/
  }
// Add your validation and save data to database
?>


