<?php

require('config.php');

#login
if(isset($_POST['loginn'])){
    
    $query="SELECT * FROM `admin` WHERE `email` = '$_POST[email]' ";
    $result = mysqli_query($conn,$query);
    if($result){
            if (mysqli_num_rows($result)==1) {
                $result_fetch=mysqli_fetch_assoc($result);
                if(password_verify( $_POST['password'],$result_fetch['password'])){
                 
                     $_SESSION['email']=$result_fetch['email'];
                     header("location: index.php");
                    
                }
                else{
                    echo"
                         <script> alert('mot de passe incorrect');
                            window.location.href='login2.php'; 
                              </script>
    ";
                }
            }
            else{
                echo"
                <script> alert('Compte introuvable!');
                window.location.href='register2.php';
                </script>
                ";
            }
    }
    else{
        echo"
        <script> alert('cannot run query');
        window.location.href='register2.php';
        </script>
        ";
        echo "Erreur de requête : " . mysqli_error($conn);
    }
}

#Inscri
if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    if ($password !== $cpassword) {
     echo "
            <script>
                alert('Les mots de passe ne correspondent pas');
                window.location.href = 'register2.php';
            </script>";
        exit();
       
        
    }
$user_exit_query = "SELECT * FROM `admin` WHERE `email` = '$_POST[email]' AND `name` = '$_POST[name]'";
$result = mysqli_query($conn,$user_exit_query);


if($result){
    if(mysqli_num_rows($result)>0){
        $result_fetcht=mysqli_fetch_assoc($result);
        if($result_fetcht['email']==$_POST['email'] OR $result_fetcht['name']==$_POST['name']){
           echo" <script>
           alert('$result_fetch[email] already taken ');
           window.location.href = 'register2.php';
           /script>";
          
        }
    }
    else
    {
           $password_has=password_hash($_POST['password'],PASSWORD_BCRYPT);
            $query="INSERT INTO `admin`( `id`,`name`, `email`, `password`) VALUES ('$_POST[id]','$_POST[name]','$_POST[email]','$password_has')";
            echo "Requête SQL: $query";  // Afficher la requête SQL
            if(mysqli_query($conn,$query)){
                
 echo"
    <script> alert('Inscription avec succes');
    window.location.href='login2.php';
    </script>
    ";
   
           }
           else{
            $error_message = mysqli_error($conn);  // Récupérer le message d'erreur MySQL
            echo "
                <script>
                    alert('Erreur lors de l\'inscription: $error_message');
                    window.location.href = 'register2.php';
                </script>";
           }
    }
}
    else{
echo"
    <script> alert('cannot run query');
    window.location.href='register2.php';
    </script>
    ";
    }
}
else{
echo"
    <script> alert('cannot run query');
    window.location.href='register2.php';
    </script>
    ";
}





?>