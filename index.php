<?php
include 'config.php';
if (!isset($_SESSION['email'])) {
    header("Location: login2.php");
    exit;
}



$queryStagiareCount = "SELECT COUNT(*) AS total FROM stagiare";
$resultStagiareCount = mysqli_query($conn, $queryStagiareCount);
$rowStagiareCount = mysqli_fetch_assoc($resultStagiareCount);
$totalStagiareCount = $rowStagiareCount['total'];

$queryAcceptCount = "SELECT COUNT(*) AS totalacceptes FROM stagiare WHERE statut='accepte'";


$resultAcceptCount = mysqli_query($conn, $queryAcceptCount);
if ($resultAcceptCount){
$rowAcceptCount = mysqli_fetch_assoc($resultAcceptCount);
$totalAcceptCount = $rowAcceptCount['totalacceptes'];
}

$queryAttestCount = "SELECT COUNT(*) AS totalattest FROM stagiare WHERE accompli=1";


$resultAttestCount = mysqli_query($conn, $queryAttestCount);
if ($resultAttestCount){
$rowAttestCount = mysqli_fetch_assoc($resultAttestCount);
$totalAttestCount = $rowAttestCount['totalattest'];
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
    <link rel="stylesheet" href="ind.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Dashboard Admin</title>
</head>

<body>
    <!--Container -->
    <?php
    include 'barside.php';
    ?>
    <!--/Sidebar-->
    <!--Main-->
    <main class="bg-white-300 flex-1 p-3 overflow-hidden">

        <div class="flex flex-col" class="dis" 2.php>

            <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

                <div class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2 flex-1">


                    <div class="p-4 flex flex-col">
                        <a href="#" class="no-underline text-white text-2xl">
                        <?php echo $totalStagiareCount; ?>
                        </a>
                        <a href="#" class="no-underline text-white text-lg">
                        Total des demandes de stages
                        </a>
                    </div>
                </div>



               

                <div class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2 flex-1">
                    <div class="p-4 flex flex-col">
                        <a class="no-underline text-white text-2xl">
                        <?php echo $totalAcceptCount; ?>
                        </a>
                        <a href="#" class="no-underline text-white text-lg">
                        Total Demandes de stages acceptées
                        </a>
                    </div>
                </div>

                

                <div class="shadow bg-success border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-1/4 mx-2 flex-1">
                    <div class="p-4 flex flex-col">
                        <a href="#" class="no-underline text-white text-2xl">
                       
                        <?php echo $totalAttestCount; ?>

                        </a>
                        <a href="#" class="no-underline text-white text-lg">
                            Total des Personnes attestées
                        </a>
                        
                    </div>

                </div>


            </div>
               
                    <!-- /Stats Row Ends Here -->

                    <!-- Card Sextion Starts Here -->
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

                        <!-- card -->

                        <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                            <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                                <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                    Toutes les demandes de stage:
                                </div>
                                <div class="p-3">
                                    <table class="table-responsive w-full rounded">
                                        <thead>
                                          <tr>
                                            <th  class="border w-1/4 px-4 py-2">N° Demande</th>
                                            <th class="border w-1/4 px-4 py-2">Nom et Prénom</th>
                                            <th class="border w-1/4 px-4 py-2">Date de dépot</th>
                                          
                                            <th class="border w-1/6 px-4 py-2">Durée de stage</th>
                                            <th class="border w-1/6 px-4 py-2">Filière</th>
                                            <th class="border w-1/6 px-4 py-2">Niveau</th>
                                            <th class="border w-1/7 px-4 py-2">Status</th>
                                           <th class="border w-1/5 px-4 py-2">Actions</th>
                                          </tr>
                                          <style>
                                            
                                            th{
                                                
                                                color: #181C32 ;
                                                background-color: #EBEDF6 ;
                                                

                                            }
                                            tr{
                                                border:1px solid #dee2e6;
                                                text-align: center;
                                                padding: 0.2rem;
                                                
                                               
                                               
                                            }
                                          </style>
                                        </thead>
                                        <tbody>
                                        <?php
                                   
                                   $query = "SELECT * FROM stagiare";
                                   $result = mysqli_query($conn, $query);
                
                                      while($row = mysqli_fetch_assoc($result)) {
                                         echo "<tr>";
                                          echo "<td>" . $row['ndemande'] . "</td>";
                                           echo "<td>" . $row['nomprenom'] . "</td>";
                                           echo "<td>" . $row['datedp'] . "</td>";
                                           echo "<td>" ."De ". $row['start_date'] . " au " . $row['end_date'] . "</td>";

                                            echo "<td>" . $row['filier'] . "</td>";
                                            echo "<td>" . $row['niveau'] . "</td>";
                                            
           
echo"<td>";

if ($row['color'] != 'green' && $row['color'] != 'red') {
    echo '<a href="accept.php?id=' . $row['id'] . '&statut=accepte" class="label label-success accepted-link">Acceptée</a>';
    echo '<a href="refuse.php?id=' . $row['id'] . '" class="label label-danger rejected-link">Refusée</a>';
} elseif ($row['color'] == 'green') {
    echo '<span class="label label-success">Acceptée</span>';
} elseif ($row['color'] == 'red') {
    echo '<span class="label label-danger">Refusée</span>';
}

echo "</td>";


                                      
                                        
                                           
                                            
                                   echo "<td><a href='modifier.php?id=" . $row['id'] . "'><img class='icone' src='img/pen.png'></a>
                                            <a href='supprimer.php?id=" . $row['id'] . "'><img class='icone icone2'  src='img/trash.png'></a></td>";

                                           echo "</tr>";
                                           echo "
                                           <style>
                                           td{
                                            border:1px solid #dee2e6;
                                            
                                           }
                                            .icone{
                                                width:25px
                                               
                                            }
                                            .icone.icone2{
                                                margin-left:35px;
                                                margin-top:-25px;
                                            }
                                            .label-success{
                                                border-radius:4px;
                                                font_size:65%;
                                                padding:4px 7px;
                                                font-weight:300;
                                                color:white;
                                                background-color:green;
                                            }
                                            .label-danger{
                                                border-radius:4px;
                                                font_size:65%;
                                                padding:4px 7px;
                                                font-weight:300;
                                                color:white;
                                                background-color:red;
                                            }
                                           </style>";
                }
                ?>
   
                                        </tbody>
                                        
                                    </table>
                                    
                                </div>
                            </div>

                        </div>
                        <!-- /card -->

                    </div>
                    <!-- /Cards Section Ends Here -->

                    
                        </div>
                    </div>
                    <!--Profile Tabs-->
                    
                    <!--/Profile Tabs-->
                </div>
            
            </main>
            <!--/Main-->
        </div>
        

    </div>

</div>
<script src="./main.js">

</script>
<script>
  function imprimerAttestation() {
   
    window.print();
  }
</script>



</body>

</html>
