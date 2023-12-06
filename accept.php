<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'projet';

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Vérifier si la connexion a réussi
    if (!$conn) {
        die("Erreur de connexion à la base de données: " . mysqli_connect_error());
    }

    // Mettre à jour la colonne "color" pour indiquer que la ligne est en vert
    $updateQuery = "UPDATE stagiare SET color = 'green' WHERE id = $id";
    mysqli_query($conn, $updateQuery);

    // Récupérer les données du stagiaire à partir de la table stagiare
    $selectQuery = "SELECT * FROM stagiare WHERE id = $id";
    $result = mysqli_query($conn, $selectQuery);
    $row = mysqli_fetch_assoc($result);
   



$statut=$_GET['statut'];
$updateQuery = "UPDATE stagiare SET statut='$statut' WHERE id='$id'";
mysqli_query($conn,$updateQuery);
header('location:index.php');


    // Insérer les données dans la table accepte_stagier
   // $insertQuery = "INSERT INTO stagiaires_accepte (ndemande, nomprenom, datedebut, datefin, dure, filier, niveau) 
     //               VALUES ('" . $row['ndemande'] . "', '" . $row['nomprenom'] . "', '" . $row['datedebut'] . "', '" . $row['datefin'] . "',  '" . $row['dure'] . "', '" . $row['filier'] . "', '" . $row['niveau'] . "' , '" . $row['post'] . "' , '" . $row['email'] . "' , '" . $row['tele'] . "' )";
   // mysqli_query($conn, $insertQuery);

    // Fermer la connexion à la base de données
    mysqli_close($conn);

    // Rediriger vers la page appropriée après l'acceptation
    header("Location: index.php");
    exit;
}
?>