<?php
	$ok=isset($_GET["action"]);
	if($ok)
	$action=($_GET["action"]);
	else
   	 $action = "orice";

	switch ($action)
	{
    	case ("login"):
       	  include_once("login.php");
        	break;
      case ("retete"):
          include_once("retete.php");
          break;
      case ("homepage"):
          include_once("homepage.php");
          break;
      case("update_products"):
        	include_once("update_products.php");
          break;
      case("insert-products-into-db"):
          include_once("insert-products-into-db.php");
          break;
      case("vezi-comenzi"):
          include_once("vezi-comenzi.php");
          break;
      case("add-products"):
          include_once("add-products.php");
          break;
      case ("logout"):
        	include_once("logout.php");
       	  break;
   	  case ("mycart"):
        	include_once("mycart.php");
       	  break;
      case ("login"):
          include_once("login.php");
          break;
      case ("logout"):
          include_once("logout.php");
          break;
      case ("logat"):
          include_once("user_page.php");
          break;
       case ("shop"):
          include_once("shop.php");
          break;
        default:
        include_once("homepage.php");
    }

?>
