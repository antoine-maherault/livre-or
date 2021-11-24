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
<form method="post" class="myform">
    <label name="login">Login</label>
        <input type="text" name="login" value=<?php echo $_POST["login"] ?>></input>
    <label name="password1">Password</label>
        <input type="password" name="password1" value=<?php echo $_POST["password1"] ?>></input>
    <label name="password2">Password</label>
        <input type="password" name="password2" value=<?php echo $_POST["password2"] ?>></input>
    <input class = "submit" type="submit" name="submit"></input>
    </form>
</div>
</main>
 <?php 

// Variables form // 

$login=$_POST["login"];
$prenom=$_POST["fname"];
$nom=$_POST["lname"];
$password1=$_POST["password1"];
$password2=$_POST["password2"];


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

//_________________interact with DATA_________________//

if($_POST["submit"]=="Envoyer"){
    if ($login == NULL && $password1 == NULL && $password2 == NULL){}
    else {
        if($login == NULL||$password1 == NULL||$password2 == NULL||$password1 != $password2){
            if($login == NULL){
            echo "
            <style>
            input[name='login'] {
                background-color: #FFBBBB ;
            }
            </style>         
            ";}
            if($password1 == NULL){
                echo "
                <style>
                input[name='password1'] {
                background-color: #FFBBBB ;
                }
                </style>         
                ";        }
            if($password2 == NULL){
                echo "
                <style>
                input[name='password2'] {
                background-color: #FFBBBB ;
                }
                </style>         
                ";        }
            if($password1 != $password2){
                echo "<p id='update'>passwords non indentiques</p>";
            }
        }
        else{
            foreach($users as $user){   // check if Login already exists
                if ( isset($_POST["login"]) && $_POST["login"] == $user[1] ){
                    echo "<p id='update'>login alreay taken</p>";
                    $taken = 1;
                }
            }
            if($taken == false){ // create new user 
                $password1 = password_hash($password1, PASSWORD_BCRYPT);
                $sql = "INSERT INTO `utilisateurs` (`login`, `password`) VALUES('$login', '$password1')";
                $query = $conn->query($sql);
                header("Location:connexion.php");
            }
        }
    }
}   

?>

<footer>
</footer>

 </body>
</html>