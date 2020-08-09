<?php 
$id=$_GET['delete_id'];
include "cnx.php";
$sql= "delete  from niveau where idN='$id' ";
$resultat = mysqli_query($con,$sql);

	
	if($resultat)
	{
		header("Location:liste_classe.php");
	}
	else
	{
		echo "Erreur";
	}

	?>