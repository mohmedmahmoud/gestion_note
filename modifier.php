<?php

$id=$_GET['edit_id'];
include "cnx.php";
$sql= "select * from etudiant where numE= $id ";
$resultat = mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($resultat);


if(isset($_POST['btn-save']))
{
	$num = $_POST['num'];
	$nom = $_POST['nom'];
	$classe = $_POST['classe'];
	

	
	$sql= "UPDATE `gestionnote`.`etudiant` SET `numE` = '$num', `nomE` = '$nom', `idC` = '$classe' WHERE `etudiant`.`numE` = $id;";
	$resultat = mysqli_query($con,$sql);
	if($resultat)
	{
		header("Location:liste_etu.php");
	}
	else
	{
		echo "Erreur";
		
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="etu.css">
</head>
<body>
<div class="container">
<h3>Modifier un(e) Etudiant(e)</h3>
<form method="post"  >
<label>Num</label>
<input type="text" id="num" name="num"  value ="<?php print($row['numE']); ?>" required>

<label>nom</label>
<input type="text" id="nom" name="nom"  value ="<?php print($row['nomE']); ?>" required>
<label>classe</label>

<input type="text" id="classe" name="classe"  value ="<?php print($row['idC']); ?>" required>
<input type="submit" value=" " name="btn-save">

<br>
</form>
</div>
</body>
</html>
