<?php 

    $conn = mysqli_connect("localhost", "name", "password","shop");
   
   
    if (!$conn)
    {
        die('Could not connect: ' . $mysqli_connect_error());
    }
   // else echo "<h1>Connected succesfully<h1>";

    //selectare bd
   mysqli_select_db($conn,"shop") or die ('Error: '.mysqli_error ());
   

?> 


