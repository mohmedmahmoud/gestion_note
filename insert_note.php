<?php
//la connexion avec la base de données

$con=mysqli_connect("localhost","root","","gestionnote");
if(!$con){die("Erreur de type: " .mysqli_connect_error()); }
else "OK";



//Récupération de données 
$num=$_POST['num'];
$matier=$_POST['matiere'];
$note=$_POST['note'];
$niveau=$_POST['niveau'];




//Insertion de données dans la gestionnote

$sql= "insert into gestionnote.note (numE,nomM,note,idN) values ('$num', '$matier','$note','$niveau')";
if(mysqli_query($con,$sql)){
header ("location:ajout-note.html");
}
else
 header("location:erreur.html");	


?>