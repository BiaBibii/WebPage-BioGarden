<?php
	session_start(); 
	include_once('connection.php');
	if ($_SESSION["key_admin"] == session_id()){
		?>
			<table width="100%" border="1" style="font-size: 25px; border-collapse:collapse;">
					<thead>
						<tr>
						<th><strong>NR</strong></th>
						<th><strong>Nume si prenume</strong></th>
						<th><strong>Adresa</strong></th>
						<th><strong>Lista produse</strong></th>
						<th><strong>Pret total</strong></th>
						<th><strong>Status</strong></th>
						</tr>
					</thead>
					<tbody>
						<?php
						include_once('connection.php');
						$count=1;
						$sel_query="Select * from comenzi";
						$result = mysqli_query($conn,$sel_query);
						while($row = mysqli_fetch_assoc($result)) { ?>
						<tr>
							<td align="center"><?php echo $count; ?></td>
							<td align="center"><?php echo $row["numeclient"]; ?></td>
							<td align="center"><?php echo $row["adresa"]; ?></td>
							<td align="center"><?php echo $row["listaproduse"]; ?></td>
							<td align="center"><?php echo $row["prettotal"]; ?></td>
							<td align="center"><button class="button" onclick="change()"id="statusBtn"><?php echo $row["status"]; ?></button></td>
							
							<!-- <a href="index.php?action=update_products&operation=edit&id=<?php echo $row["id"]; ?>">Edit</a>
							</td>
							<td align="center">
							<a href="index.php?action=update_products&operation=delete&id=<?php echo $row["id"]; ?> " onclick="return confirm('are you sure?')">Delete</a>
							</td>-->
						</tr>
						<?php $count++; } ?>
					</tbody>
				</table>

<?php	} 
?>

<script>
	$(document).ready(function(){
		$('#statusBtn').on('click',function(){
			document.getElementById("statusBtn").innnerHTML=
		   "Finalizata";
		});
	});

</script>


