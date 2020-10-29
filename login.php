<?php session_start();
?>
<html>
<h2><a href="#">Contul meu</a></h2>
 <?php
	$adminname = $_POST["adminname"]; 
	$password = $_POST["password"]; 
	$logare=$_POST['logare'];
  //echo "$adminname, $password, $logare";
	if($logare)
	{
		
		include_once('connection.php'); 
    $sql = "SELECT adminname, password FROM user WHERE adminname='$adminname'";
    $result = $conn->query($sql);
		
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              if($password==$row['password'] ){
                $_SESSION['id'] = $row['id'];
                $_SESSION['adminname'] = $row['adminname'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['key_admin'] = session_id();
                /*echo $_SESSION['adminname'].', esti logat. Vei fi redirectat spre pagina ta.
                Altfel click <a href="index.php?action=logat">aici</a>.';*/
                echo '<meta http-equiv="refresh" content="1;url=index.php?action=homepage">';
              
              }
              else
                echo "<p>Parola introdusa incorect!</p>";
           
            } 
      
      } else {
            echo "0 results";
              }
}
	

?> 
<!--
  <form action="index.php?action=login" method="post"> 
    <div class="login-box"> 
      <h1>Login</h1> 

      <div class="textbox"> 
        <i class="fa fa-user" aria-hidden="true"></i> 
        <input type="text" placeholder="Adminname"
            name="adminname" value=""> 
      </div> 

      <div class="textbox"> 
        <i class="fa fa-lock" aria-hidden="true"></i> 
        <input type="password" placeholder="Password"
            name="password" value=""> 
      </div> 

      <input class="button" type="submit"
          name="logare" value="Logare"> 
    </div> 
  </form> 
</html>

-->
<div class="bg-img"   >
  
  
      <form action="index.php?action=login" method="post" style="width: 30%;" class="container">
      <div class="form-group" >
        <label for="name" style="color:white;font-weight: bold;">Nume</label>
      <input width="30%" type="text" class="form-control" id="adminname" name="adminname" placeholder="Nume">
    </div>
  <div class="form-group">
    <label for="exampleInputPassword1" style="color:white;font-weight: bold;">Parola</label>
    <input   type="password" class="form-control" name="password"  id="password" placeholder="******">
  </div>
 
  <button type="submit" class="btn btn-primary" name="logare" value="Logare">Logare</button>
</form>
</div>



</html>
<style type="text/css">
.bg-img {
  background-image: url("images/legume.jpg");
  min-height: 700px;
  
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
</style>