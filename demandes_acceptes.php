<?php
include 'config.php' ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["Attestation"])) {
        $student_id = $_POST["id"];
        // Effectuez des opérations nécessaires en fonction de l'ID de l'étudiant
        
        // Redirigez l'utilisateur vers une autre page
        header("Location: attestations - Copy.php?id=$student_id");
        exit; // Assurez-vous de quitter le script après la redirection
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
    <title>Demandes acceptés</title>
</head>

<body>
<?php
include 'barside.php';
?>
            
            <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                    <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                        <div class="dem">
                        Demandes acceptées:</div>
                    </div>
                    <div class="p-3">
                    <form method="post" action="">
                        <table class="table-responsive w-full rounded">
                            <thead>
                              <tr>
                              <th class="border w-1/6  px-4 py-2">Numéro</th>
                                
                                <th class="border w-1/4 px-4 py-2">Nom et Prénom</th>
                                <th class="border w-1/4 px-4 py-2">Date de dépot</th>
                                <th class="border w-1/6 px-4 py-2">Branche</th>
                                <th class="border w-1/6 px-4 py-2">Durée de stage</th>
                                <th class="border w-1/4 px-4 py-2">Niveau</th>
                                <th class="border w-1/4 px-4 py-2">Email</th>
                                <th class="border px-4 py-2">
                               attestaion</th>
                               <th class="border px-4 py-2">
                               Certifié(e)</th>
                                 
                                
                              </tr>
                            </thead>
                            <tbody>
        <?php
       
        // Assurez-vous que vous avez une connexion à la base de données établie ici
        
        
             
            // Assurez-vous de valider et nettoyer les données avant de les insérer dans la base de données
            // Ensuite, exécutez votre requête d'insertion SQL ici
         
            $query = "SELECT * FROM stagiare WHERE statut = 'accepte'";
            $result = mysqli_query($conn, $query);
         
            if (!$result) {
                die("Erreur SQL : " . mysqli_error($conn));
            }
       
        while($row = mysqli_fetch_assoc($result)) {
         

            echo "<tr>";
     
            echo "<td>" . $row['num'] . "</td>";
            echo "<td>" . $row['nomprenom'] . "</td>";
            echo "<td>" . $row['datedp'] . "</td>";
            echo "<td>" . $row['filier'] . "</td>";
            echo "<td>" ."De ". $row['start_date'] . " au " . $row['end_date'] . "</td>";

           
            echo "<td>" . $row['niveau'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo"<td>";
            echo "<form method='post'>";
                                    echo "<input type='hidden' name='id' value='{$row['id']}'>";
                                    echo "<button type='submit' name='Attestation'>Attestation</button>";
                                    echo "</form>";
                                    echo"</td>";
                                    if ($row['accompli'] == '1') {
                                        echo "<td class='border px-4 py-2'>";
                                        echo '<a href="update_accompli.php?id=' . $row['id'] . '&accompli=0" ><i class="fas fa-check text-green-500 mx-2"></i></a>';
                                        echo "</td>";   
                                    } else {
                                        echo "<td  class='border px-4 py-2'>";
                                        echo '<a href="update_accompli.php?id=' . $row['id'] . '&accompli=1" class="check"><i class="fas fa-times text-red-500 mx-2"></i></a>';
                                        echo "</td>";
                                    }
                                    
                               
                               

                          
       
            echo "<td><a href='num_email.php?id=" . $row['id'] . "' class='edit-link'>Editer<img class='icone' src='img\pen.png'></a></td>";
          
echo "</tr>";

echo "<tr id='edit-form-" . $row['id'] . "' style='display: none;'>";
echo "<td colspan='7'>";

            echo"
            <style>
                                          .icone{
                                            width:25px;
                                            margin-left:10px;
                                          }
                                          th{
                                                
                                            color: #181C32 ;
                                            background-color: #EBEDF6 ;
                                            

                                        }
                                           td{
                                            border:1px solid #dee2e6;
                                            text-align:center;
                                            
                                           }
                                           .dem{
                                             color: rgb(57, 6, 6);
                                             font-weight:bold;

                                           }

                                           </style>
                                           ";
                                           
                                        }
                                        
                                         ?>
                            </tbody>
                        </table>
  
                    </div>
                </div>
            </div>
        </div>
        <!--Footer-->
        <footer class="bg-gray-darkest text-white p-2">
            <div class="flex flex-1 mx-auto">&copy;Amina</div>
        </footer>
        <!--/footer-->

    </div>

</div>
<script src="./main.js"></script>



</body>

</html>