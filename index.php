<?php
	session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>BioGarden</title>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon" />

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstraps JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	 <script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="index.php">
		<img src="images/logo_200x200.png" width="30" height="30" class="d-inline-block align-top" alt="">
		Bio Garden
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="index.php">Acasă </a>
			</li>
			<?php if(isset($_SESSION['key_admin'])){ ?>
			<li class="nav-item">
				<a class="nav-link" href="index.php?action=update_products">Admin</a>
			</li>
		<?php } ?>
			<li class="nav-item">
				<a class="nav-link " href="index.php?action=shop">Shop</a>
			</li>
			<li class="nav-item">
				<a class="nav-link " href="index.php?action=retete">Retete</a>
			</li>

			
			<?php if(isset($_SESSION['key_admin'])){ ?>
			<li class="nav-item">
				<a class="nav-link" href="index.php?action=vezi-comenzi">Comenzi</a>
			</li>
		<?php } ?>
			<li class="nav-item">
				<a class="nav-link " href="index.php?action=<?php
					if(isset($_SESSION['key_admin']))
						echo "logout";
					else
						echo "login";
					?>
					">
					<?php
					if(isset($_SESSION['key_admin']))
						echo "Iesire";
					else
						echo "Contul meu";
					?>
					</a>
			</li>
		</ul>
	</div>

</nav>

<div id="app-container" class="container">
  		<?php
  		include_once("selectoption.php");
		?>
</div>




</body>
</html>
