<?php 
$id=$_GET['delete_id'];
include "cnx.php";
$sql= "delete  from classe where idC='$id' ";
$resultat = mysqli_query($con,$sql);

	
	if($resultat)
	{
		header("Location:liste_classe.php");
	}
	else
	{
		header("Location:ERliste_classe.php");
	}

	?>