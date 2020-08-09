<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="tabllecss.css">
</head>

<?php
include "cnx.php";

//Affichage de données
echo "<h3 >"."Liste des classes"."</h3>";
echo "<table>";
echo "<tr height='50px'>";

echo "<th>". "classe". "</th>" ;
echo "<th>". "niveau". "</th>" ;
echo "<th>". "action". "</th>" ;


$sql= "SELECT `classe`.*from classe ORDER BY `classe`.`idC` ASC ";
$resultat = mysqli_query($con,$sql);
if(mysqli_num_rows($resultat)>0){
while($row=mysqli_fetch_assoc($resultat)){
	echo "<tr>";
    echo "<td>".$row['idC']."</td>";
    echo "<td>".$row['idN']."</td>";
	?>
	<td align="center">
           
                <a href="supprimerclasse.php?delete_id=<?php print($row['idC']); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer  ?')">
				<font color ="white"><?php echo "<img src='trash.png'>"; ?></font></a>
				
                </td>
	  <?php
	echo "</tr>";
}	
	
	
	
} else 
{
	echo "<tr>";
	echo "<td colspan='3'>";
echo  "Aucun enregistrement";
echo "</td>";
}
echo "</table>";
?>