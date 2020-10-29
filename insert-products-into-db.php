<form method="POST"  style="font-size: 25px;width: 30%;" action="insert-products-into-db.php" >
   		 <div class="form-group">
			<label>Nume</label>
			<input type="text" name="numeclient" id="numeclient">
		</div>
		
		<div class="form-group">
			<label>Adresa</label>
			<input type="text" name="adresa" id="adresa">
		</div>
		<div class="input-group">
			<button class="btn  btn-primary" bootype="submit" name="final" value="final">Trimite comanda</button>
		</div>
</form>
</div>
<?php
include_once('connection.php');
	if(isset($_POST['final'])){
		$nameCustomer=$_POST['numeclient'];
		$adressCustomer=$_POST['adresa'];
		$listaproduse="xdfcgvhbj";
		$prettotal=20;
		$status="In procesare..."
		$sql ="INSERT INTO comenzi (numeclient,adresa, listaproduse, prettotal, status) VALUES	('$nameCustomer','$adressCustomer','$listaproduse',20,'$status')";
		$result=$conn->query($sql);
		 echo '<meta http-equiv="refresh" content="1;url=index.php?action=homepage">';

}
?>

  		<?php
  		include_once("selectoption.php");
		?>


