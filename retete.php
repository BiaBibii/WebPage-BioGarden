<?php if ($_SESSION["key_admin"] == session_id()){?>

  	
<html>
<head>
   <title>Sample - CKEditor</title>
   <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
</head>
<body>
   <form method="post" action="index.php?action=retete">
      <p>
         Retetele mele:<br />
         <textarea name="editor1">&lt;p&gt;Scrie aici reteta&lt;/p&gt;</textarea>
         <script type="text/javascript">
            CKEDITOR.replace( 'editor1' );
         </script>
      </p>
      <p>
         <input type="submit" id="submit" name="submit"/>
      </p>
   </form>
</body>
</html>



<?php


include_once('connection.php');
//Function to clean the text data received from post
function dataready($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
} 
if(isset($_POST['submit'])){
	
	    $editor_data = dataready($_POST['editor1']);

		//Decoding html codes for storing in DB
		$editor_data_insert = $editor_data;
		

		$sql="INSERT INTO retete (text) VALUE ( '$editor_data_insert' )" ;

		$result = $conn->query($sql);
		unset($_POST);
		header("Location:http://localhost/shop/index.php?action=retete");
		die();
			//echo '<meta http-equiv="refresh" content="1;url=index.php?action=retete">'		
	}
?>



<?php


   	include_once('connection.php');
   		$sql = "SELECT * FROM retete";
			$result = $conn->query($sql);

       while ($row = $result->fetch_array()) {
          $content = $row['text'];?>
          <div class="text-reteta">
		  <div class="edit" contenteditable="true"> <?php echo html_entity_decode($content); ?></div>
		  <button class="save" data-id="<?php echo $row['id'] ?>">Click to Save</button>
		  <a class="text-light bg-dark" href="index.php?action=retete&operation=delete&id=<?php echo $row["id"]; ?> " onclick="return confirm('Sigur vrei sa stergi acest produs?')">Delete</a>
		</div>      
		 <?php }

     

	
if(isset($_GET['operation'])){
		if($_GET['operation']=="delete")
			{
				$id=$_GET['id'];
				$sql="DELETE FROM retete WHERE id='$id'";
				$result=$conn->query($sql);
				mysqli_close($conn);
				echo '<meta http-equiv="refresh" content="1;url=index.php?action=retete">';
			}
	}
?>
<script type="text/javascript">
	$(document).ready(function(argument) {
		$('button.save').click(function(){
			// Get edit field value
			var $editor = $(this).parent().find("div.edit").first().html();
			 var retetaId = $(this).attr("data-id");		
			$.ajax({
					url: 'update-reteta.php',
					type: 'post',
					data: {text: $editor, id: retetaId},
					datatype: 'html',
					success: function(rsp){
								alert("Reteta a fost editata!");
					}
					});
				});
			});
</script>

<?php }
		if ($_SESSION["key_admin"] != session_id()){
	

			 	include_once('connection.php');
   		$sql = "SELECT * FROM retete";
			$result = $conn->query($sql);

       while ($row = $result->fetch_array()) {
          $content = $row['text'];?>
          <div class="text-reteta">
		  <div class="edit" > <?php echo html_entity_decode($content); ?></div>
		 
		</div>     
<?php }}?>


<?php
  		include_once("selectoption.php");
		?>
