

<div>
<?php
	session_start(); 
	include_once('connection.php');
			$sql = "SELECT * FROM products";
			$result = $conn->query($sql);
			

			$rows = $result->num_rows;    // Find total rows returned by database
			if($rows > 0) {
				$cols = 3;    // Define number of columns
				$counter = 1;     // Counter used to identify if we need to start or end a row
				$nbsp = $cols - ($rows % $cols);    // Calculate the number of blank columns
		 
		        echo '<table width="100%" align="center" cellpadding="4" cellspacing="1">';
				while ($row = $result->fetch_array()) {
					if(($counter % $cols) == 1) {    // Check if it's new row
						echo '<tr>';	
					}
		                   $img = "images/".$row['image'];
					echo '<td>
							<img width="80%"  src="'.$img.'" alt="'.$row['name'].'" />
							<h5>'.$row['name'].' :<span> '.$row['price'].'lei/kg</span></h5>
							<h6>'.$row['description'].'</h6>
						  </td>';
					if(($counter % $cols) == 0) { // If it's last column in each row then counter remainder will be zero
						echo '</tr>';	
					}
					$counter++;    // Increase the counter
				}
				$result->free();
				if($nbsp > 0) { // Add unused column in last row
					for ($i = 0; $i < $nbsp; $i++)	{ 
						echo '<td>&nbsp;</td>';		
					}
					echo '</tr>';
				}
                echo '</table>';
	}
	?>
			
			<?php if ($_SESSION["key_admin"] == session_id())
     		{


				?>
				<table width="100%" border="1" style="font-size: 25px; border-collapse:collapse;">
					<thead>
						<tr>
						<th><strong>NR</strong></th>
						<th><strong>Pret</strong></th>
						<th><strong>Nume</strong></th>
						<th><strong>Descriere</strong></th>
						<th><strong>Edit</strong></th>
						<th><strong>Delete</strong></th>
						</tr>
					</thead>
					<tbody>
						<?php
						include_once('connection.php');
						$count=1;
						$sel_query="Select * from products";
						$result = mysqli_query($conn,$sel_query);
						while($row = mysqli_fetch_assoc($result)) { ?>
						<tr>
							<td align="center"><?php echo $count; ?></td>
							<td align="center"><?php echo $row["name"]; ?></td>
							<td align="center"><?php echo $row["price"]; ?></td>

							<td align="center"><?php echo $row["description"]; ?></td>
							<td align="center">
							<a href="index.php?action=update_products&operation=edit&id=<?php echo $row["id"]; ?>">Edit</a>
							</td>
							<td align="center">
							<a href="index.php?action=update_products&operation=delete&id=<?php echo $row["id"]; ?> " onclick="return confirm('Sigur vrei sa stergi acest produs?')">Delete</a>
							</td>
						</tr>
						<?php $count++; } ?>
					</tbody>
				</table>





<!--formular pentru editarea produselor --> 
<?php if(isset($_GET['operation'])){
		if($_GET['operation']=="edit")
			{	$id=$_GET['id'];
				$sql = "SELECT * FROM products WHERE id='$id'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					 // output data of each row
				    while($row = $result->fetch_assoc()) {
				    	$name=$row["name"];
				    	$description=$row["description"];
				    	$quantity=$row["quantity"];
				    	$price=$row["price"];
				    	
				    }
				} else {
				    echo "0 results";
				}
				?>
	<form method="POST" style="width: 30%;font-size: 25px;" enctype="multipart/form-data action=" index.php?action="update_products&operation=edit&id=<?php echo $id; ?>" >
   		 <div class="form-group">
			<label >Nume</label>
			<input type="text" name="name" id="name" value="<?php echo $name ?>">
		</div>
		<div class="form-group">
			<label>Descriere</label>
			<input type="text" name="description" id="description" value="<?php echo $description ?>">
		</div>
		
		<div class="form-group">
			<label>Pret</label>
			<input type="text" name="price" id="price" value="<?php echo $price ?>">
		</div>
		<div class="form-group">
			<label>Cantitate</label>
			<input type="text" name="quantity" id="quantity" value="<?php echo $quantity ?>">
		</div>

		
		<div class="input-group">
			<button class="btn  btn-primary" bootype="submit"   name="edit-product" >Salveaza schimbarile</button>
		</div>
	</form>

<?php }} ?>


<!--formular pentru adaugarea produselor --> 

<form method="POST"  style="font-size: 25px;width: 30%;" action="index.php?action=update_products" enctype="multipart/form-data">
   		 <div class="form-group">
			<label>Nume</label>
			<input type="text" name="name" id="name">
		</div>
		
		<div class="form-group">
			<label>Descriere</label>
			<input type="text" name="description" id="description">
		</div>
		
		<div class="form-group">
			<label>Pret</label>
			<input type="text" name="price" id="price">
		</div>
		<div class="form-group">
			<label>Cantitate</label>
			<input type="text" name="quantity" id="quantity">
		</div>
		
  		<div>
  	 		<input type="file" name="image">
  		</div>
		<div class="input-group">
			<button class="btn  btn-primary" bootype="submit"   name="reset" value="reset">Salveaza</button>
		</div>
</form>
</div>

<?php
		//adaug un produs nou
	if(isset($_POST['reset'])){
		$name = $_POST['name'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$quantity=$_POST['quantity'];
		$image = $_FILES['image']['name'];
		//fisierul unde se pun imaginile
		$target = "images/".basename($image);
		$sql ="INSERT INTO products (name,description,price, quantity, image) VALUES	('$name','$description','$price','$quantity','$image')";	
		$result=$conn->query($sql);
		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  		}else{
  		$msg = "Failed to upload image";
  	}
		mysqli_close($conn);
		echo '<meta http-equiv="refresh" content="1;url=index.php?action=update_products">';
	}

		//sterg un produs 
	if(isset($_GET['operation'])){
		if($_GET['operation']=="delete")
			{
				$id=$_GET['id'];
				$sql="DELETE FROM products WHERE id='$id'";
				$result=$conn->query($sql);
				mysqli_close($conn);
				echo '<meta http-equiv="refresh" content="1;url=index.php?action=update_products">';
			}
	}

		//editez un produs 
	if(isset($_GET['operation'])){
		if($_GET['operation']=="edit")
			{

				if(isset($_POST['edit-product'])){
				$id=$_GET['id'];
				$name = $_POST['name'];
				$description = $_POST['description'];
				$price = $_POST['price'];
				$quantity=$_POST['quantity'];
				$sqli="UPDATE products SET name='$name', description='$description', price='$price', quantity='$quantity' 
				     WHERE id='$id'"; 
				
				$result = $conn->query($sqli);
				echo '<meta http-equiv="refresh" content="1;url=index.php?action=update_products">';
				}
				
			}
	}
}
?>
</div>