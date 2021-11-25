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
<?php

//_________________connect to DB_________________//

include "db_link.php"; 

//_________________select DATA_________________//

// get DATA from commentaires

$sql = "SELECT * FROM commentaires";
$query = $conn->query($sql);
$comments = $query->fetch_all();

// get LOGIN from utilisateurs and commentaires

$sql = "SELECT utilisateurs.id, utilisateurs.login FROM utilisateurs INNER JOIN commentaires ON commentaires.id_utilisateur = utilisateurs.id" ;
$query = $conn->query($sql);
$users = $query->fetch_all();

//_________________display COMMENT_________________//

foreach(array_reverse($comments) as $comment){
  echo "<div class ='comments'>
          <article class ='comment'>";
  foreach($users as $user){
    if ($comment[2] == $user[0]){
      $uname = $user[1];
    }
  }
  $date = date_create($comment[3]);
  $date = date_format($date, 'd/m/y');
  echo "Posté le ".$date." par ".$uname."</br>";
  echo "<div class='com'>";
  echo "&nbsp&nbsp".$comment[1];
  echo "</div>";
  echo "</div></article>";
} 
//_________________add new COMMENT_________________//

if(isset($_SESSION['connected'])){ ?>
<div id=newcomment>
<input href="commentaire.php" type ="submit"class ="addComment" value= "Ajouter un commentaire"></input>
</div>
<?php  }?>

</main>
<footer>  
</footer>
</body>
</html>