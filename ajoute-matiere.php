<?php
//la connexion avec la base de données

$con=mysqli_connect("localhost","root","","gestionnote");
if(!$con){die("Erreur de type: " .mysqli_connect_error()); }
else "OK";



//Récupération de données 
$niveau=$_POST['niveau'];

$classe=$_POST['matiere'];
$coef=$_POST['coeff'];

//Insertion de données dans la gestionnote

$sql= "INSERT INTO `gestionnote`.`matiere` (`nomM`,`coeff`,`idN`) VALUES ('$classe', '$coef', '$niveau');";
if(mysqli_query($con,$sql)){
header ("location:listematiere.php.php");
}
else
 header("location:erreurmatiere.html");	


?>