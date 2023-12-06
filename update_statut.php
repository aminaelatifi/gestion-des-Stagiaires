<?php
include 'config.php';


$id=$_GET['id'];
$statut=$_GET['statut'];
$updateQuery = "UPDATE stagiare SET statut='$statut' WHERE id='$id'";
mysqli_query($conn,$updateQuery);
header('location:index.php');
?>

