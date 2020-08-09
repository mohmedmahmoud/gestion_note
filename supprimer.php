<?php 
$id=$_GET['delete_id'];
include "cnx.php";
$sql= "delete  from etudiant where numE=$id ";
$resultat = mysqli_query($con,$sql);

	
	if($resultat)
	{
		header("Location: liste_etu.php");
	}
	else
	{
		echo "Erreur";
	}

	?>