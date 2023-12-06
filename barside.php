<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'projet';

$connection = mysqli_connect($hostname, $username, $password, $database);

if (!$connection) {
    die("La connexion a échoué : " . mysqli_connect_error());
}





    $query = "SELECT name, email FROM admin";
    $result = mysqli_query($connection, $query);

    // En supposant que vous récupérez les données correctement, vous pouvez utiliser le nom obtenu
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $userName = $row['name'];
        $useremail = $row['email'];
    } else {
        $userName = "Utilisateur"; 
        $useremail = "Email"; 
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
    <!-- Css -->
    <link rel="stylesheet" href="./dist/styles1.css">
    <link rel="stylesheet" href="./dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Dashboard Admin</title>
</head>
<div class="mx-auto bg-grey-400">
    <!--Screen-->
    <div class="min-h-screen flex flex-col">
       
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="cursor-pointer fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2"><img src="img/11.png" alt="" width="100px"></h1>
                </div>
                <div class="p-1 flex flex-row items-center">
                  


                <p class="text-white p-2 no-underline hidden md:block lg:block">Bonjour <?= $userName; ?></p>&ensp;&ensp;

                <i class="cursor-pointer fas fa-user pr-2 text-white " onclick="profileToggle()"></i>
                  
                    <div id="ProfileDropDown" class="rounded hidden ">
                        <ul class="list-reset">
                           <li>
             
                          <li><a href="logout.php" class="no-underline px-4 py-2 block text-black bg-grey-lighter hover:bg-grey-light">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        
        <div class="flex flex-1">
            <!--Sidebar-->
            <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">

                <ul class="list-reset flex flex-col">
                    <li class=" w-full h-full py-3 px-2 border-b border-light-border ">
                        <a href="index.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-tachometer-alt float-left mx-2"></i>
                            Dashboard
                            <span><i class="fas fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="ajouter_une _demande.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fab fa-wpforms float-left mx-2"></i>
                           Ajouter une demande
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="demandes_acceptes.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-grip-horizontal float-left mx-2"></i>
                            Demandes acceptés
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="attestations%20-%20Copy.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            Attestation
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    
                  
                    
                        
                    </li>
                </ul>

            </aside>