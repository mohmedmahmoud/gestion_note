<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="tabllecss.css">
</head>

<?php
//la connexion avec la base de données
include "cnx.php";

//Récupération de données
$nom=$_POST['nom'];

//Affichage les données de recherche
echo "<h3>Liste des etudiants</h3>";
echo "<table  width='80%'>";
echo "<tr height='50px'>";
echo "<th>". "Num". "</th>" ;
echo "<th>". "nom". "</th>" ;
echo "<th>". "classe". "</th>" ;
echo "<th colspan='2'>". "Action". "</th>"."</tr>" ;
$sql= "select * from etudiant  where numE like '$nom' or  nomE like '$nom%'";
$resultat = mysqli_query($con,$sql);
if(mysqli_num_rows($resultat)>0){
while($row=mysqli_fetch_assoc($resultat)){
	echo "<tr>";
	echo"<td>". $row['numE']."</td>"; 
	echo "<td>".$row['nomE']."</td>";
   
    echo "<td>".$row['idC']."</td>";
    
	?>
	<td align="center">
		 <a href="Rnote.php?num=<?php print($row['numE']); ?>  " >
				<font color ="white"> <?php echo "<img src='d.png' width='35px' height='35px'>"; ?></font></a>
                </td>
				<td>
                <a href="modifier.php?edit_id=<?php print($row['numE']); ?>" >
				<font color ="white"><?php echo "<img src='updat.png'width='35px' height='35px'>"; ?></font></a>
                </td>
                <td align="center">
                <a href="supprimer.php?delete_id=<?php print($row['numE']); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer  ?')">
				<font color ="white"><?php echo "<img src='trash.png'>"; ?></font></a>
				
                </td>
	  <?php
	echo "</tr>";
}	
	
	
	
} else 
{
	echo "<tr>";
	echo "<td colspan='4'>";
echo  "Aucun enregistrement";
echo "</td>";
}
echo "</table>";
?>
