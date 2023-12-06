<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="stylesheet" href="register3.css">
    <title>Connexion</title>

</head>
<body>
    
   
    <div class="form_container">
        <div class="popup">
               <form action="login_register.php" method="post">
                  <h2>
                    <span>Connexion</span>
                    <button type="reset">X</button>
                  </h2>
                        
                         <input type="email" name="email"placeholder="Entrer votre email" required>
                         <input type="password" name="password" placeholder="Entrer votre mot de passe" required>
                         
                         <button type="submit" class="reg-btn" name="loginn">Se connecter</button>
                          <p>N'avez-vous pas un compte ? <a href="register2.php">S'inscrire</a></p>
               </form>
               

        </div>
     
    </div>
    <style>


      .form_container{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
     background-color: rgb(7, 18, 78);
    display : flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}
.form_container  .popup{
    background-color:white;
    width: 350px;
    display: flex;
    border-radius: 10px;
    padding: 20px 20px 25px 30px;



}
.form_container  .popup h2{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    margin-bottom:30px ;
    font-family: Arial, Helvetica, sans-serif;
    color: rgb(19, 18, 20);
}
.form_container  .popup h2 button{
    
    background-color: transparent;
    outline: none;
    font-size: 15px;
    font-weight: 550;
    color:rgb(139, 130, 119);
    cursor: pointer;
}
.form_container  .popup input{
    width: 100%;
    margin-bottom: 20px;
    background-color: transparent;
    border: none;
    border-bottom: 1px solid black;
    padding: 10px 0;
    font-weight: 550;
    font-size: 15px;
    outline: none ;
}
.form_container  .popup button.reg-btn{
    font-weight: 550;
    font-size: 15px;
   color: beige;
   background-color: #CD5C5C;
    padding: 10px;
    border: none;
    border-radius: 20px;
    outline: none;
    cursor: pointer;
    margin-top: 5px;
    align-items: center;
}

    p{
    font-size: 15px;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
}

a{
    text-decoration: none;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 18px;
    color: #261560
}
a:hover{
    text-decoration: underline;
}
.form_container  .popup h2 button{
    border: none;
}
.form_container  .popup h2 button:hover{
   font-size: 20px;
  
}
</style>
</body>
</html>