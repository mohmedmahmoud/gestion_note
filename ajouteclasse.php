<?php
//la connexion avec la base de données

$con=mysqli_connect("localhost","root","","gestionnote");
if(!$con){die("Erreur de type: " .mysqli_connect_error()); }
else "OK";



//Récupération de données 
$niveau=$_POST['niveau'];

$classe=$_POST['classe'];


//Insertion de données dans la gestionnote

$sql= "insert into classe values ('$classe','$niveau')";
if(mysqli_query($con,$sql)){
header ("location:ajouteclasse.html");
}
else
 header("location:erreurclasse.html");	


?>");
}
else
 header("location:erreur.html");	


?>