<?php
//la connexion avec la base de données

$con=mysqli_connect("localhost","root","","gestionnote");
if(!$con){die("Erreur de type: " .mysqli_connect_error()); }
else "OK";



//Récupération de données 
$num=$_POST['num'];
$nom=$_POST['nom'];
$classe=$_POST['classe'];


//Insertion de données dans la gestionnote

$sql= "insert into etudiant (numE,nomE,idC) values ('$num', '$nom','$classe')";
if(mysqli_query($con,$sql)){
header ("location:liste_etu.php");
}
else 
header ("location:etu-erreur.html");	


?>