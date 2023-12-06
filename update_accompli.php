<?php
include 'config.php';


$id=$_GET['id'];
$accompli=$_GET['accompli'];
$updateQuery = "UPDATE stagiare SET accompli='$accompli' WHERE id='$id'";
mysqli_query($conn,$updateQuery);
header('location:demandes_acceptes.php');
?>