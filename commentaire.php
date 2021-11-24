<!DOCTYPE html>
<html>
 <head>
 <title>Fleurs d'automne</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
 </head>

 <body>

 <header>
   <a href="index.php"> Home </a> 
   <?php include "header.php";?> 
</header>
<main>
<h1 class="tsignin"><i>Livre d'or</i></h1> 

<div class ="commentsA">
<article class ="commentA">
  <form method = "get">
  <input size = 50 placeholder="Your comment here" type="text" name="comment"> </input>
</article>
<input type ="submit"class ="addComment" value= "Ajouter un commentaire"></input>
</form>
</div>

<?php
//_________________connect to SQL_________________//

$servername = "localhost";
$username = "root";
$password = "root";

// Create connection

$conn = new mysqli($servername, $username, $password, 'livreor');

//_________________ user ID _________________//

$co_user = $_SESSION['connected'];

$sql = "SELECT id FROM `utilisateurs` WHERE `login` = '$co_user'" ;
$query = $conn->query($sql);
$id_user = $query->fetch_all();

//_________________set variables_________________//

$id_user = $id_user[0][0];
$comment = $_GET["comment"];
$date = date('Y-m-d H:i:s');

//_________________save COMMENT_________________//

if(isset($_GET["comment"])){
  $sql = "INSERT INTO `commentaires` (`commentaire`, `id_utilisateur`, `date`) VALUES('$comment', '$id_user', '$date')";
  $query = $conn->query($sql);
  header("Location:livre-or.php");
}

?>

</main>
<footer>
  
</footer>
</body>
</html>