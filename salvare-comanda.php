<?php
include_once('connection.php');
  if(isset($_POST['cart_content']) && !empty($_POST['cart_content'])) {
    echo("Comanda finalizata");
    $cos=json_decode($_POST['cart_content'],true);
     $cos['numeclient'];
     $nameCustomer=$cos['numeclient'];
	 $adressCustomer=$cos['adresa'];
	 $listaproduse=$cos['listaproduse'];
	 $prettotal=$cos['prettotal'];
	 $status="In procesare...";
	 $sql ="INSERT INTO comenzi (numeclient,adresa, listaproduse, prettotal, status) VALUES	('$nameCustomer','$adressCustomer','$listaproduse','$prettotal','$status')";
	$result=$conn->query($sql);
     
  }
?>