<?php
session_start();
error_reporting(0);
include("connection.php"); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Naslovnica</title>

    <style>

        *{
            margin: 0;
            padding: 0;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .container {
            width: 100%;
            min-height: 100vh;
            background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),url(slike/background.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;      
            padding-left: 2%;
            padding-right: 2%;      
            box-sizing: border-box;

        }

        .navbar {
            display: flex;
            height: 130px;
            align-items: center;
        }
        .logo {
            width: 200px;
            cursor: pointer;
        }

        nav {
            flex: 1;
            text-align: right;
            margin-right: 20px;

        }

        nav ul li {
            list-style: none;
            display: inline-block;
            margin-left: 50px;
        }

        nav ul li a{
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 15px;

        }

        .row {
            display: flex;
            height: 88%;
            align-items: center;
            margin-top: 175px;
        }

        .col {
            flex-basis: 50%;

        }

        h1 {
            color: white;
            font-size: 100px;
        }

        p {
            color: white;
            font-size: 13px;
            line-height: 15px;
        }

        button {
            width: 200px;
            color: black;
            font-size: 14px;
            padding: 12px 0;
            background: white ;
            border: 0;
            border-radius: 20px;
            outline: none;
            margin-top: 30px;

        }

        .rezerviraj_button {
            cursor: pointer;
        }

        

    
    </style>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <a href=""><img src="slike\logowhite.png" class="logo" alt="logo"></a>

            <nav>
                <ul>
                <?php 
                    $user_id = $_SESSION['id'];
                    $query = mysqli_query($conn, 'SELECT email FROM user WHERE id = "'.$user_id.'"');
                    $row = mysqli_fetch_array($query);
                    if(strlen($_SESSION['id']) != 0){
                        echo '<li style="color: white;">'.$row['email'].'</li>';
                        echo '<li><a href="rezervacija.php">REZERVIRAJ</a></li>';
                        echo '<li><a href="faq.php">FAQ</a></li>';
                        echo '<li><a href="odjava.php">ODJAVA</a></li>';
                    }else {
                        echo '<li><a href="rezervacija.php">REZERVIRAJ</a></li>';
                        echo '<li><a href="prijava.php">PRIJAVI SE</a></li>';
                        echo '<li><a href="registracija.php">REGISTRIRAJ SE</a></li>';
                        echo '<li><a href="faq.php">FAQ</a></li>';
                    }

                    ?>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col">
                <h1>FUC</h1>
                <p style="font-size: 16px; padding-top: 5px;">Želite se zabaviti sa svojom ekipom na našim novoizgrađenim terenima? <br>
                    Rezervirajte svoj termin odmah sada!
                </p>
                <a href="rezervacija.php"><button class="rezerviraj_button"type="button">Rezerviraj</button></a>
            </div>
           
        </div>
    </div>
    
</body>

</html>