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
    <title>Rezervacija nogometnog terena</title>

    <style>

        *{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .flexbox-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            align-content: space-between;
            padding-left: 2%;
            padding-right: 2%;
        }

        .teren1, .teren2, .teren3 {
            flex-grow: 1;
            text-align: center;
            font-weight: bold;
            margin-bottom: 50px;

        }


        .teren1_naslov, .teren2_naslov, .teren3_naslov {
            text-align: center;
            padding-bottom: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            font-weight: bold;
            
        }
        
        .rezerviraj {
            display: block;
            width: 100%;
            padding: 1em;
            background-color: rgb(35, 35, 35);
            color: white;
            border-color: rgb(35, 35, 35);
            border-style: solid;
            transition: opacity 0.15s;
            text-decoration: none;
            font-family: Arial, Helvetica, sans-serif;
            border-radius: 10px;
  
        }

        .rezerviraj:hover {
            background-color: #575656;
            opacity: 0.7;
            cursor: pointer;
            text-decoration: none;
        }


        body {
            margin: 0;
            padding: 0;
        }

        header {
            background-color: white;
            color: #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
            padding-left: 30px;
            
        }

        h1 {
            margin: left;
            font-family: Arial, Helvetica, sans-serif;

            
        }
        
        img{
            max-width: 100%;
        }

        hr {
        border: 1px solid #f1f1f1;
        
        }

        .button-container {
            display: flex;
        }

        .header-button {
            margin: 0 10px;
            padding: 8px 16px;
            font-size: 14px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: Arial, Helvetica, sans-serif;
            transition: opacity 0.15s;
            
        }

        .header-button:hover {
            opacity: 0.7;
        }

        footer {
            text-align: center;
            padding: 3px;
            background-color: #333;
            color: white;
            margin-top: 10px;
        }

        .header-logo {
            display: flex;
            flex-direction: row;
        }

        .logo {
            width: 200px;
            cursor: pointer;
        }

        .vanjski1, .vanjski2, .unutarnji{
            width: 500px;
        }

        .navbar {
            display: flex;
            height: 130px;
            align-items: center;
            padding-left: 2%;
            padding-right: 2%;
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
            color: black;
            font-weight: bold;
            font-size: 15px;

        }
    </style>
</head>
<body>
    
        <div class="navbar">
            <a href=""><img src="slike\logoblack.png" class="logo" alt="logo"></a>

            <nav>
                <ul>
                <?php 
                    $user_id = $_SESSION['id'];
                    $query = mysqli_query($conn, 'SELECT email FROM user WHERE id = "'.$user_id.'"');
                    $row = mysqli_fetch_array($query);
                    if(strlen($_SESSION['id']) != 0){
                        echo '<li style="color: black;">'.$row['email'].'</li>';
                        echo '<li><a href="naslovnica.php">NASLOVNICA</a></li>';
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

   <div class="flexbox-container">
    <div class="teren1">
        <p>Unutarnji teren</p>
        <img src="slike/fuc1.jpg" class="unutarnji" alt="teren1">
        <a href="rezervacija_teren1.php" style="text-decoration: none;"><button class="rezerviraj">Rezerviraj</button></a>
    </div>
    <div class="teren2">
        <p>Vanjski teren 1</p>
        <img src="slike\fuc2.webp" class="vanjski1" alt="teren2">
        <a href="rezervacija_teren2.php" style="text-decoration: none;"><button class="rezerviraj">Rezerviraj</button></a>
    </div>
    <div class="teren3">
        <p>Vanjski teren 2</p>
        <img src="slike\fuc2.webp" class="vanjski2" alt="teren3">
        <a href="rezervacija_teren3.php" style="text-decoration: none;"><button class="rezerviraj">Rezerviraj</button></a>
    </div>
   </div>
    
    
</body>
</html>