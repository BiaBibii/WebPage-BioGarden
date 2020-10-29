<?php
    session_start();
    session_destroy();
    echo '<a href="index.php"> Mulţumim! Vei fi redirecţionat spre pagina de start... <a>';
    echo '<meta http-equiv="refresh" content="1;url=index.php">';
 ?>

