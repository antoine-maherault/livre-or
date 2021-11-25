<?php 
   //_________________connect to SQL_________________//

   $servername = "localhost:3306";
   $username = "_root_";
   $password = "_root_";

   // Create connection

   $conn = new mysqli($servername, $username, $password, 'antoine-maherault_livre-or');
   mysqli_set_charset($conn,'utf8');
?>

