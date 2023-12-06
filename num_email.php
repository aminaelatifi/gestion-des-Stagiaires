<?php
                                   //connexion à la base de donnée
          include "config.php";
          //on récupère le id dans le lien
           $id = $_GET['id'];
           //requête pour afficher les infos d'un employé
           $req = mysqli_query($conn , "SELECT * FROM stagiare WHERE id = $id");
           $row = mysqli_fetch_assoc($req);
 
 
        //vérifier que le bouton ajouter a bien été cliqué
        if(isset($_POST['edit'])){
            //extraction des informations envoyées dans des variables par la méthode POST
            extract($_POST);
            //vérifier que tous les champs ont été remplis
            if(isset($num) && isset($email)){
                //requête de modification
                $req = mysqli_query($conn, "UPDATE stagiare SET num= '$num' , email='$email' WHERE id = $id");
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: demandes_acceptes.php");
                }else {//si non
                    $message = "Employé non modifié";
                }
 
            }else {
                //si non
                $message = "Veuillez remplir tous les champs !";
            }
        }
        
        
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Css -->
    <link rel="stylesheet" href="./dist/styles1.css">
    <link rel="stylesheet" href="./dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Ajouter un stagiaire </title>
</head>

<body>
    <?php
    include 'barside.php';
    ?>

<a href="demandes_acceptes.php" class="back_back"><img width="25px" src="img/back.png"> </a><br><br>
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                           <?php
                            $id1 = $_GET['id'];
                            //requête pour afficher les infos d'un employé
                            $req1 = mysqli_query($conn , "SELECT nomprenom FROM stagiare WHERE id = $id1");
                            $row1 = mysqli_fetch_assoc($req1);
                           ?>

                                Compléter le Numéro et l'Email de <?=$row1['nomprenom']?>
                            </div>
                            <div class="p-3">
<div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                        <form method="POST" action="">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
               for="grid-first-name">
           Num
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
               id="grid-first-name" type="text" name="num" required>
    </div>

    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
               for="grid-first-name">
          Email
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
               id="grid-first-name" type="email" name="email" required>
    </div>

    <div class="w-full px-3 mb-6 md:mb-0">
        <button type="submit" name="edit"class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Enregistrer
        </button>
    </div>
</form>

                                        
                                     


                                    </div>
         