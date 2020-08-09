<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="tabllecss.css">
</head>
<body>
<?php
include "cnx.php";

//Récupération de données
$num=$_POST['num'];

//Affichage de données
echo "<h3 >"."Liste des notes des etudiants par classe "."</h3>";
echo "<table>";
echo "<tr height='50px'>";
echo "<th>". "Num". "</th>" ;
echo "<th>". "nom". "</th>" ;
echo "<th>". "classe". "</th>" ;
echo "<th>". "matiere". "</th>" ;

echo "<th>". "note". "</th>" ;

echo "<th>". "Supprimer". "</th>" ;
$sql= "SELECT `etudiant`.*, `note`.`nomM`,`note` FROM `etudiant`, `note`where `etudiant`.`idC`='$num' and `etudiant`.`numE`=`note`.`numE` ORDER BY `etudiant`.`idC` ASC";
$resultat = mysqli_query($con,$sql);
if(mysqli_num_rows($resultat)>0){
while($row=mysqli_fetch_assoc($resultat)){
	echo "<tr>";
	echo"<td>". $row['numE']."</td>"; 
	echo "<td>".$row['nomE']."</td>";
   
    echo "<td>".$row['idC']."</td>";
    echo "<td>".$row['nomM']."</td>";
    echo "<td>".$row['note']."</td>";

?>
	<td align="center">
           
                <a href="supprimernote.php?delete_id=<?php print($row['nomM']); ?>&idd=<?php print($row['idN']);?>&idid=<?php print($row['numE']);?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer  ?')">
				<font color ="white"><?php echo "<img src='trash.png'>"; ?></font></a>
				
                </td>
	  <?php
$sql="select count(*) as nomber from etudiant where etudiant.idC='$num'";
$resultat = mysqli_query($con,$sql);

if(mysqli_num_rows($resultat)>0){
while($row=mysqli_fetch_assoc($resultat)){
echo "Nombres Des Etudiant:".$row['nomber']."</td>";
echo "</tr>" ;

}
}else
{ 
	
echo "<tr>";
echo "<td colspan='4'>";
echo  "Aucun enregistrement";
echo "</td>";
echo "</tr>";
}
echo "</table>";
}

 ?>
 </body>
</html>
 