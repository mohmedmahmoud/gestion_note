
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="emp.css">
</head>
<body>
<?php
//la connexion avec la base de données
include "cnx.php";

//Récupération de données
$email=$_POST['email'];
$code=$_POST['code'];
$sql= "select * from prof where admin='$email' and code='$code'";

$resultat = mysqli_query($con,$sql);
if(mysqli_num_rows($resultat)>0){
header ("location:frameset.html");
}
else echo "email ou le mode passe incorrecte ";	


?>

