<?php
//la connexion avec la base de données

$con=mysqli_connect("localhost","root","","gestionnote");
if(!$con){die("Erreur de type: " .mysqli_connect_error()); }
else "OK";



//Récupération de données 
$niveau=$_POST['niveau'];




//Insertion de données dans la gestionnote

$sql= "insert into niveau values ('$niveau')";
if(mysqli_query($con,$sql)){
header ("location:ajouteniveau.html");
}
else
 header("location:erreurniveaux.html");	


?>");
}
else
 header("location:erreur.html");	


?>