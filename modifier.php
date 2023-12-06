
<?php
  include "config.php";
  include 'barside.php';
   
        
          
         //on récupère le id dans le lien
          $id = $_GET['id'];
          //requête pour afficher les infos d'un employé
          $req = mysqli_query($conn , "SELECT * FROM stagiare WHERE id = $id");
          $row = mysqli_fetch_assoc($req);


       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if(isset($ndemande) && isset($nomprenom) && isset($datedp) && isset($filier) && isset($start_date)  && isset($end_date) && isset($niveau)   ){
               //requête de modification
               $req = mysqli_query($conn, "UPDATE stagiare SET ndemande= '$ndemande' , nomprenom = '$nomprenom' , datedp = '$datedp', start_date ='$start_date',  end_date ='$end_date',filier = '$filier' , niveau='$niveau' WHERE id = $id");
                
                if(!$req){

                    $message = "Employé non modifié";
                }
                else{
                    echo "<script>alert('Modification de la demande de stage avec succès'); window.location.href='index.php';</script>";
            exit();
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="./dist/styles1.css">
    <link rel="stylesheet" href="./dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
</head>
<body>


    
    <main class="bg-white-500 flex-1 p-3 overflow-hidden">

<div class="flex flex-col">
    <div class="form">
        <a href="index.php" class="back_back"><img width="25px" src="img/back.png"> </a><br><br>
        <h2>Modifier la demande de stage N°<?=$row['ndemande']?> de : <?=$row['nomprenom']?> </h2>
        <style>
               h2{
                font-size:25px;
                font-weight:bold;
                text-align:center;
                margin-bottom:20px;
               }
            </style>
        <p class="erreur_message">
           <?php 
              if(isset($message)){
                  echo $message ;
              }
           ?>
        </p>
      
    

    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        
        <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            
                            <div class="p-3">
                                <form class="w-full" method="post" action="">
                                    <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                                                   for="grid-first-name">
                                                N° Demande
                                            </label>
                                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
       id="grid-first-name" type="text" name="ndemande" value="<?=$row['ndemande']?>" required>

                                           
                                        </div>
                                       

                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                                                   for="grid-first-name">
                                                Nom et Prénom
                                            </label>
                                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                                                   id="grid-first-name" type="text" name="nomprenom" value="<?=$row['nomprenom']?>" required>
                                           
                                        </div>


                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                                                   for="grid-first-name">
                                                Date dépot
                                            </label>
                                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                                                   id="grid-first-name" type="date" name="datedp" value="<?=$row['datedp']?>" required>
                                            
                                        </div>

                                      
                                        
                                        
                                       
                                         
                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                                                   for="grid-first-name">
                                               Filière:
                                            </label>
                                            
                                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                                                   id="grid-first-name" type="text" name="filier"  value="<?=$row['filier']?>" required>
                                            
                                        </div>
                                            
                                        </div>
                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                                                   for="grid-last-name">
                                                Date de début du stage:
                                            </label>
                                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                                                   id="grid-first-name" type="date" name="start_date" value ="<?=$row['start_date']?>"required>
                                        </div>
                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                                                   for="grid-last-name">
                                                Date du fin du stage:
                                            </label>
                                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                                                   id="grid-first-name" type="date" name="end_date" value="<?=$row['end_date']?>" required>
                                        </div>
                                      

                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                                                   for="grid-first-name">
                                               Niveau
                                            </label>
                                            
                                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                                                   id="grid-first-name" type="text" name="niveau" value="<?=$row['niveau']?>" required>

                                                   </div>

                                                 
                                            
                                           
                                           
                                          <button type="submit" name="button" class="boutton ">Modifier</button>
                                        
                   <style>                     
.boutton{
  border:1px black ;
  padding:10px;
  border-radius: 10px;
  margin-top:50px;
  margin-left:0px;
  font-weight: bold;
  font-family: sans-serif;
  background-color: #8eca78;
  color: white;

  
  }

  .boutton:hover{
    
    background-color: #72ae5c;
    }
    </style>
                                        </div>

                                        
                                     


                                    </div>
                                    <div class="flex flex-wrap -mx-3 mb-6">
                                        
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--/Grid Form-->
                </div>
            </main>
            <!--/Main-->
        </div>
    </div>
</body>
</html>