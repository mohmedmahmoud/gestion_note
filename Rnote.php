<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="tabllecss.css">
</head>
<body>
<?php
//la connexion avec la base de données
include "cnx.php";

//Récupération de données
$num=$_GET['num'];



echo "<h1>RELEVE DES NOTES</h1>";
$sql="select etudiant.numE,etudiant.nomE,classe.idN ,classe.idC from etudiant ,classe where etudiant.numE=$num and classe.idC=etudiant.idC";
$resultat = mysqli_query($con,$sql);

if(mysqli_num_rows($resultat)>0){
while($row=mysqli_fetch_assoc($resultat)){
echo "<h3>ETUDIANT:";

echo "  ".$row['numE'];
echo " ".$row['nomE']; 
	echo"  ". $row['idC'];
   
    echo "   ".$row['idN']."</h3>";

}
} 

echo "<table  width='80%'>";
echo "<tr height='50px'>";
echo "<th>". "matiere". "</th>" ;
echo "<th>". "note". "</th>" ;
echo "<th>"."coefficient". "</th>" ;
echo "<th>". "points". "</th>"."</tr>" ; 

$sql= "select matiere.nomM,note.note,matiere.coeff,(note.note * matiere.coeff) as points from note , matiere where matiere.nomM=note.nomM and note.numE=$num and matiere.idN = note.idN";
$resultat = mysqli_query($con,$sql);
if(mysqli_num_rows($resultat)>0){
while($row=mysqli_fetch_assoc($resultat)){
	echo "<tr>";
	echo"<td>". $row['nomM']."</td>"; 
	echo "<td>".$row['note']."</td>";
   
    echo "<td>".$row['coeff']."</td>";
    echo "<td>".$row['points']."</td>";

	echo "</tr>";

}
echo "<tr align=center>";
	echo "<td colspan='4'>";
$sql="select (sum(note.note * matiere.coeff)/sum(matiere.coeff)) as moyenne from note , matiere where matiere.nomM=note.nomM and note.numE=$num and matiere.idN= note.idN";
$resultat = mysqli_query($con,$sql);

if(mysqli_num_rows($resultat)>0){
while($row=mysqli_fetch_assoc($resultat)){
echo "MOYENNE GENERAL:".$row['moyenne']."</td>";
echo "</tr>" ;

}

}else 
{
echo "<tr>";
echo "<td colspan='4'>";
echo  "Aucun enregistrement";
echo "</td>";
}
echo "</table>";
}

?>
<form>
<font onClick="window.print()"><img src="print.png" width="35px"></font>
</form>
</body>
</html>