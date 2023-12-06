<?php
include 'config.php';
header('content-type: text/html;charset=utf-8');
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
<!--Container -->
<?php
include 'barside.php';
?>
            <!--/Sidebar-->
            <!--Main-->
            <main class="bg-white-500 flex-1 p-3 overflow-hidden">

                <div class="flex flex-col">
                    <!-- Card Sextion Starts Here -->
                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        
                        <!--/Horizontal form-->

                      
                        <!--/Underline form-->
                    </div>
                    <!-- /Cards Section Ends Here -->

                    <!--Grid Form-->

                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                Formulaire de la demande
                            </div>
                            <div class="p-3">
                                <form class="w-full" method="post">
                                    <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                                                   for="grid-first-name">
                                                N° Demande
                                            </label>
                                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
       id="grid-first-name" type="text" name="ndemande" required>

                                           
                                        </div>
                                       

                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                                                   for="grid-first-name">
                                                Nom et Prénom
                                            </label>
                                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                                                   id="grid-first-name" type="text" name="nomprenom" required>
                                           
                                        </div>


                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                                                   for="grid-first-name">
                                                Date dépot
                                            </label>
                                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                                                   id="grid-first-name" type="date" name="datedp"  required>
                                            
                                        </div>

                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                                                   for="grid-first-name">
                                               Fillière
                                            </label>
                                            <!--<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                                                   id="grid-first-name" type="text" name="filier" required>-->
                                                   <?php
                                                   $filieres=array("Informatique","Commercial","Gestion","Comptabilité");
                                                   echo "<td id='selection'><select name='filier'>";
                                                   foreach( $filieres as  $filiere){
                                                         echo "<option  class='appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500'
                                                         id='grid-first-name'value='$filiere'>$filiere</option>";
                                                   }
                                                   
                                                         echo "</select></td>";
                                                        
                                                   echo "</td>";
                   
                                                   ?>
                                            
                                        </div>
                                        <div class="w-full md:w-1/2 px-3">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                                                   for="grid-last-name">
                                                Date de début du stage:
                                            </label>
                                            <input class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                                                   id="grid-last-name" type="date" name="start_date" required>
                                        </div>
                                        <div class="w-full md:w-1/2 px-3">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                                                   for="grid-last-name">
                                                Date du fin du stage:
                                            </label>
                                            <input class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                                                   id="grid-last-name" type="date" name="end_date"  required>
                                        </div>
                                      



                                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                                                   for="grid-first-name">
                                               Niveau
                                            </label>
                                            <?php
                                                   $niveaux=array("Bac+1","Bac+2","Bac+3","Bac+4","Bac+5","Bac+6","Bac+7");
                                                   echo "<td><select name='niveau'>";
                                                   foreach( $niveaux as  $niveau){
                                                         echo "<option  class='appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500'
                                                         id='grid-first-name'value='$niveau'>$niveau</option>";
                                                   }
                                                   echo "</select></td>";
                                                   ?>
                                                  

                                            </div>
                                                  
                                          <button type="submit" name="ajouter" class="boutton">Ajouter</button>
                                      

                                       <style>

.boutton{
  border:1px black ;
  padding:10px;
  border-radius: 10px;
  margin-top:50px;
  margin-left:500px;
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
        <!--Footer-->
        <footer class="bg-grey-darkest text-white p-2">
            <div class="flex flex-1 mx-auto">&copy; My Design</div>
        </footer>
        <!--/footer-->

    </div>

</div>

<script src="./main.js"></script>


<?php


if(isset($_POST['ajouter'])){
    header('location:index.php');
    $ndemande = $_POST['ndemande'];
    $nomprenom = $_POST['nomprenom'];
    $datedp = $_POST['datedp'];
    
    $filier = $_POST['filier'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $niveau = $_POST['niveau'];

    $query = "INSERT INTO stagiare (ndemande ,nomprenom, datedp,filier,start_date, end_date,niveau) VALUES ('$ndemande', '$nomprenom', '$datedp', '$filier','$start_date','$end_date', '$niveau')";

    if(mysqli_query($conn, $query)){
        echo "<script>alert('Ajout de la demande avec succès'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Erreur lors de l\'ajout du stagiaire');</script>";
    }
}
?>
</body>

</html>

