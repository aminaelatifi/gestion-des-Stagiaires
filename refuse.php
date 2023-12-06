<?php

session_start();

// Vérifier si l'utilisateur est connecté


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

    $updateQuery = "UPDATE stagiare SET color = 'red' WHERE id = $id";
    mysqli_query($conn, $updateQuery);


    // Récupérer les données du stagiaire à partir de la table stagiare
    $selectQuery = "SELECT * FROM stagiare WHERE id = $id";
    $result = mysqli_query($conn, $selectQuery);
    $row = mysqli_fetch_assoc($result);

 

$statut=$_GET['statut'];
$updateQuery = "UPDATE stagiare SET statut='$statut' WHERE id='$id'";
mysqli_query($conn,$updateQuery);

    // Fermer la connexion à la base de données
    mysqli_close($conn);

    // Rediriger vers la page appropriée après le refus
    header("Location: index.php");
    exit;
}
?>