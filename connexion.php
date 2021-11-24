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
     <a href="inscription.php"> Inscription </a>
     <a href="connexion.php"> Connexion </a>
</header>
<main>
<h1 class="tsignin"><i>Fleurs d'autonomne</i></h1>

<div class="container">
<form class="myform" method="post">
    <label name="login">Login</label>
    <input type="text" name="login"></input>
    <label name="password">Password</label>
    <input type="password" name="password"></input>
    <input type ="submit"></input>
    </form>
</div>
</main>
 <?php 

//_________________connect to SQL_________________//

$servername = "localhost";
$username = "root";
$password = "root";

// Create connection

$conn = new mysqli($servername, $username, $password, 'livreor');

//_________________select DATA_________________//

// get DATA from utilisateurs

$sql = "SELECT * FROM utilisateurs" ;
$query = $conn->query($sql);
$users = $query->fetch_all();

//_________________connect USER_________________//

session_start();

$_SESSION["connected"];
foreach($users as $user){
    if ( isset($_POST["login"]) && $_POST["login"] == $user[1] && password_verify($_POST['password'],$user[2]) == true){
        $_SESSION["connected"] = $_POST["login"] ;
        header("Location:index.php");
    }
    if ( isset($_POST["login"]) && $_POST["login"] == $user[1] && $_POST['password'] == $user[2]){
        $_SESSION["connected"] = $_POST["login"] ;
        header("Location:index.php");
    }
}

?>


<footer>
</footer>

 </body>
</html>