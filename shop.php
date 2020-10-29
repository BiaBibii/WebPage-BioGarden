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
		 		?>
		        <table width="100%" align="center" cellpadding="4" cellspacing="1" >
		        <?php
				while ($row = $result->fetch_array()) {
					if(($counter % $cols) == 1) {
					?>
						<tr>
						<?php
					}
		                   $img = "images/".$row['image'];
		                   ?>
						<td>
							<img width="80%"  src="<?php echo $img ?>" alt="<?php echo $row['name'] ?>" />
							<h5><?php echo $row['name'] ?> :<span>  <?php echo $row['price'] ?></span> lei/kg</h5>
							<h6><?php echo $row['description'] ?></h6>
              				<button type="button" class="btn btn-light add-product-to-cart" 
                     		 data-productid="<?php echo $row['id'] ?>"
                     		 data-name="<?php echo $row['name'] ?>"
                     		 data-price="<?php echo $row['price'] ?>"
                     		 >
                			 Adaugă în coș
             				</button>

						  </td>
						  <?php
					if(($counter % $cols) == 0) { // If it's last column in each row then counter remainder will be zero
						?>
					</tr>
					<?php
					}
					$counter++;    // Increase the counter
				}
				$result->free();
				if($nbsp > 0) { // Add unused column in last row
					for ($i = 0; $i < $nbsp; $i++)	{ ?>
						<td></td>
					<?php } ?>
					</tr>
				<?php } ?>
                </table>
	<?php }
	?>

<script>
  $(document).ready(function() {
    var COS_CUMPARATURI = "cos_cumparaturi";  // definim ca si constanta sa nu tot editam peste tot in caz ca schimbam numele

    $("button.add-product-to-cart").on("click", function() {
      var product_id = $(this).attr("data-productid");
      var product_name = $(this).attr("data-name");
      var product_price = $(this).attr("data-price");
      if (localStorage.getItem(COS_CUMPARATURI) === null) {
        //alert("Creez cosul.");
        localStorage.setItem(COS_CUMPARATURI, JSON.stringify({}));
      }

      if (localStorage.getItem(COS_CUMPARATURI) === null) {
        //alert("N-am putut crea cos.");
      } else {
        //alert("Cos exista.");
      }
      $("div.continut-cos p.fara-produse").hide();
      var textComanda="<p class='produs-comandat'>" + product_name + " (" + product_price + " lei)</p>";
      $("div.continut-cos").append(
       textComanda
      );
     $("span#prettotal").text((parseInt(product_price)+parseInt($("span#prettotal").text())).toString());
    });

    $("button.reseteaza").on("click", function() {
      $("span#prettotal").text("0");
      $("div.continut-cos p.fara-produse").show();
      $("div.continut-cos p.produs-comandat").remove();
      localStorage.setItem(COS_CUMPARATURI, JSON.stringify({}));
      localStorage.removeItem(COS_CUMPARATURI);
      //alert("Cos golit. Sesiune anulata.");
    });

    $("button.finalizeaza").on("click", function() {
    	var formIsVisible=$("div.client-info").is(":visible");
    	$("div.client-info").show();
    	var numeclient=$("input#numeclient").val();
    	var adresa=$("input#adresa").val();

    	if((numeclient.length==0)  || (adresa.length==0)){
    		if(formIsVisible){
    			alert("Completeaza numele si adresa");
    		}
    	} else {
    		$("div.continut-cos p.fara-produse").remove();

    		var listaProduse= $("div.continut-cos").text();
    		var prettotal=$("span#prettotal").text();
	    	var comanda={
	    		"numeclient": numeclient,
	    		"adresa":adresa,
	    		"listaproduse":listaProduse,
	    		"prettotal":prettotal,
	    		"status":"In procesare..."
	    	};
	     	$.ajax({
		        url:"salvare-comanda.php",    //the page containing php script
		        type: "post",    //request type,
		        dataType: 'json',
		        data: {cart_content: JSON.stringify( comanda) },
		        complete:function(result){
		        	$("div.continut-cos").html("<p>Comanda preluata. Vei fi contactat.</p>");
		        	$("div.controls").hide();
		        	$("div.client-info").hide();
		         
       			}
   	 		});
   	 	}
    });
  });
</script>

<div class="row">
  <div class="col">
    <div class="cos-de-cumparaturi">
      <h5>Coș de cumpărături</h5>
      <div class="continut-cos">
        <p class="fara-produse">Nu ai comandat nimic.</p>
      </div>
      <div class="container-pret">
      		<p>Pret total: <span id="prettotal">0</span> lei </p>
      </div>
      <div class="client-info" style="display: none;">
    
      	 <div class="form-group">
			<label>Nume</label>
			<input type="text" name="numeclient" required="required" id="numeclient">
		</div>
		
		<div class="form-group">
			<label>Adresa</label>
			<input type="text" name="adresa" required="required" id="adresa">
		</div>
      	
      </div>
      <div class="controls">
        <button class="btn btn-danger reseteaza">Anulez cumpărături</button>
        <button class="btn btn-primary finalizeaza">Finalizeaza comanda</button>
      </div>
    </div>
  </div>
</div>


