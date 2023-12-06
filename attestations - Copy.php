<?php
include 'config.php';


if (isset($_GET['id'])) {
    $studentId = $_GET['id'];
    
   
    $query = "SELECT num FROM stagiare WHERE id = $studentId";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $studentNum = $row['num'];
    } else {
        $studentNum = "N/A"; 
    }
} else {
    $studentNum = "N/A"; 
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  
  body {
    font-family:"Times New Roman", Times, serif;
    margin: 0;
    padding: 0;
    font-size:20px;
  }

  .attestation {
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .content {
    font-size: 16px;
    line-height: 1.6;
    text-align: center;
  }

  .content h2 {
    font-size: 28px;
    text-decoration: underline;
    margin-bottom: 20px;
  }

  .content p {
    margin-bottom: 10px;
    font-size:20px;
    margin-left:60px;
    margin-right:30px
  }

  .date-input {
    width: 120px;
  }

  .bold-input {
    font-size: 20px;
   
    padding: 2.5px;
    border: none;
    text-align:center;
    
  }

  .signature-container {
    text-align:center;
    margin-left:280px;
  }

  .small-text {
    font-size: 12px;
    text-decoration: underline;
  }
  .special-first-letter::first-letter {
    font-size: 20px;
    font-weight: bold;
  }

  .center-content {
    text-align: center;
  }
  .signature-bold-italic {
    font-weight: bold;
    font-style: italic;
  }
 

.search-container form {
  display: inline-block;
}

.search-container input[type="number"] {
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

.search-container button {
  padding: 5px 10px;
  border: none;
  background-color: #007bff;
  color: #fff;
  border-radius: 3px;
  cursor: pointer;
}

.search-container button:hover {
  background-color: #0056b3;
}

.print-button-container {
    text-align: center;
    padding: 20px;
  }

  .print-button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
  }
  .small-line-height {
        line-height: 1; }


  .print-button:hover {
    background-color: #0056b3;
  }
  .search-container, .print-button-container {
    text-align: right;
    padding: 20px;
    background-color: #f2f2f2;
  }

  .search-container form {
    display: inline-block;
  }

  .search-container input[type="number"] {
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
  }

  .search-container button, .print-button {
    padding: 5px 10px;
    border: none;
    background-color: #007bff;
    color: #fff;
    border-radius: 3px;
    cursor: pointer;
  }

     /* Style pour l'impression */
  @media print {
    body * {
      visibility: hidden;
    
    }

    @media print{
      #logo,#manu,#peid_page,#imprimer{
        display: none;
      }
       /* Masquer le titre du document */
    .attestation-title {
      display: none;
    }
    }
    .attestation, .attestation * {
      visibility: visible;
    }
    .attestation {
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
    }
    .print-button-container {
    display: none; /* Masquer le bouton d'impression */
  }
  .attestation-title {
    display: none; /* Masquer le titre du document */
  }
  }

  #peid_page{
    color:#999;
    background-color:#000;
    text-align:center;
    width:100%;
    margin: 5px auro;
    
  }
  /* Masquer les chemins d'accès du document */
  #peid_page {
      display: none;
    }
  .attestation input[type="text"],
  .attestation input[type="date"],
  .attestation input[type="number"] {
    border: none;
    outline: none; /* Ajoutez cette ligne pour supprimer également le contour lors de la mise en surbrillance */
  }
  /* Masquer l'icône de la date */
  .attestation input[type="date"]::-webkit-calendar-picker-indicator {
    display: none;
  }

  .custom-paragraph {
        text-indent: 40px; /* Ajoute une indentation au début du paragraphe */
        margin-top: 20px; /* Ajoute une marge seulement en haut du paragraphe */
    }

    .indent{
      margin-left:100px;
    }
    .indent2{
      margin-left:50px
    }
    .indent3{
      margin-right:220px;
      font-size:20px;
    }
    .indent4{
      margin-left:25px;
    }
    .indent5{
      margin-right:100px;
      font-size:20px;
    }
    .indent6{
      margin-left:100px;
      font-size:20px;
    }
  
</style>
<title>Attestation de Stage</title>
</head>
<body>





 <!-- . -->
  <div class="attestation">
    <div class="header">
      <div class="header-left">
        <div class="title">S.R.H</div>
        <div class="info">
        N° <input type="number" ><br>

          Attestation de Stage <br>
          Réf :  <input type="text" value="<?php echo $studentNum; ?>">
          du <input type="date" value="<?php echo date('Y-m-d'); ?>"><br>
          <br>
          <br>
          <br>
          <br>
         

         </div>
      </div>
    </div>
    <div class="content">
          <center><h2>ATTESTATION DE STAGE</h2></center>
          <br>
            
          &ensp;&ensp; <p  class="special-first-letter" class="small-line-height" class="custom-paragraph">
               <span class="indent">Je soussigné, Directeur Général de la Régie Autonome<span>
          <span class="indent2">Intercommunale de Distribution d'Eau et d'électricité de la Province</span>
          <div class="indent3">de Safi(RADEES), atteste que :</div></p>
            
   <?php
   if (isset($_GET['id'])) {
    $studentId = $_GET['id'];
    
    // Fetch 'num' value based on the provided 'id'
    $query = "SELECT nomprenom, start_date, end_date FROM stagiare WHERE id = $studentId";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $studentName = $row['nomprenom'];
        $studentStartDate = $row['start_date'];
        $studentEndDate = $row['end_date'];
    } else {
        $studentName = "not found"; // Default value if student not found
        $studentStartDate = "not found"; 
        $studentEndDate= "not found"; 
    }
} else {
  $studentName = "(Stagire concerné(e))"; // Default value if student not found
  $studentStartDate = "not found"; 
  $studentEndDate= "not found"; 
}
   
   ?>
      <div class="bold-input"> &emsp;&emsp;&emsp;&emsp; &emsp;-M(me)
     <input type="text" value="<?php echo $studentName ?>" style="font-weight: 400; font-size: 20px;">
      </div>
      <p  class="small-line-height" class="custom-paragraph"><span class="indent4">a effectuée un stage non rémunéré au service technique de la Régie</span> 
      <div class="indent5" >durant la période du <input type="date" value="<?php echo $studentStartDate ; ?>"> au <input type="date" value="<?php echo $studentEndDate; ?>">.</div> </p>
      <div class="indent6">La présente attestation est délivrée à l'intéressée sur </div> <div class="indent5">sa demande pour servir et valoir ce que de droit.</div> 
     <br>
     <br>
    &emsp;

     
    </div>
    <div class="signature-container">
        <p class="signature-bold-italic"> P.Le Directeur Généralet P.O </p></center>
     <p class="signature-bold-italic">Le Chef du service Resources Humaines p.i</p></center> <br>
       <p class="signature-bold-italic"> Yassmine WADIH</p></center>
    </div>


<div class="small-text">
    NB : cette attestation ne peut pas etre <br>
     délivrée qu'une seul fois
</div>

  </div>
 

  <script>
  function imprimerAttestation() {
   
    window.print();
  }
</script>



 <div class="search-container print-button-container">

<a href="javascript:window.print()"><button class="print-button" onclick="window.print()">Imprimer</button></a>
  </div>
</body>
</html>
