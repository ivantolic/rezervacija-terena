<?php
session_start();
error_reporting(0);
include("connection.php"); 
$loginFailed = false;

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = mysqli_query($conn, "select id from user where email='$email' && lozinka='$password' ");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        $_SESSION['id'] = $ret['id'];
        header('location: rezervacija.php');

    } else { 
        $loginFailed = true;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>

    <style>
        * {box-sizing: border-box}

        .container {
        padding: 16px;
        }

        input[type=text], input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
        }

        input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
        }

        
        hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
        }

        
        .submitButton {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
        }

        .submitButton:hover {
        opacity:1;
        }

       
        a {
        color: rgb(5, 134, 255);
        }

        
        .signin {
        background-color: #f1f1f1;
        text-align: center;
        }

    </style>
</head>
<body>

    <div class="container">
        <h1>Prijavi se</h1>
        <p>Molimo vas popunite predviđena polja kako bi ste se prijavili.</p>
        <hr>
        <form method="post" name="login" action="#">
            <label for="email"><b>E-mail</b></label>
            <input type="text" placeholder="Unesite e-mail" name="email" id="email" required>
        
            <label for="password"><b>Lozika</b></label>
            <input type="password" placeholder="Unesite lozinku" name="password" id="password" required>
        
            <hr>
        
            <input value="Prijavi se" type="submit" name="login" id="submitButton" class="submitButton">
        </form>
      </div>
    
      <div class="container ">
        <p style=" text-align: center;">Nemate račun? <a href="registracija.php">Registriraj se</a>.</p>
        <p id="error-message" style="color: red; display: none;">Molimo vas da popunite sva polja.</p>
      </div>


     
      
    
</body>
</html>