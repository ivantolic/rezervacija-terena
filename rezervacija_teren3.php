<?php
session_start();
error_reporting(0);
include("connection.php"); 

if (isset($_POST['rezervacija'])) {

    $termin = $_POST['termin'];

    $sql = "INSERT INTO teren3 (user_id, termin, zauzet) VALUES ('$user_id', '$termin', '1')";

    if ($conn->query($sql) === TRUE) {
        echo 'Uspješno ste rezervirali termin: ' . $termin;
    } else {
        echo 'Greška: ' . $sql . '<br>' . $conn->error;
    }
}

$user_id = $_SESSION['id'];

$reservedTimesQuery = "SELECT termin FROM teren3 WHERE zauzet='1'";
$reservedTimesResult = mysqli_query($conn, $reservedTimesQuery);
$reservedTimes = [];

while ($row = mysqli_fetch_assoc($reservedTimesResult)) {
    $reservedTimes[] = $row['termin'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervacija teren 1</title>

    <style>
        * {box-sizing: border-box}

        .container {
        padding: 16px;
        }

        input[type=text] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
        }

        hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
        }

        
        .potvrdibtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
        }

        .potvrdibtn:hover {
        opacity:1;
        }

       
        a {
        color: rgb(5, 134, 255);
        }

        select {
            font-size: 20px;
        }

        option {
            font-size:20px;
        }

        .vrijeme {
            font-size: 22px;
        }

    </style>
</head>
<body>

        <div class="container">
          <h1>Rezerviraj vanjski teren 2</h1>
          
          <hr>
        
          <label for="termin" style="font-weight: bold;">Odaberi termin:</label>
          
          <form method="post" name="rezervacija" action="#">
            
            <?php
                $timeOptions = array(
                "12-13", "13-14", "14-15", "15-16", "16-17", "17-18", "18-19", "19-20", "20-21", "21-22"
             );

                foreach ($timeOptions as $time) {
                
                    if (!$user_id || in_array($time, $reservedTimes)) {
                        echo '<input type="radio" id="' . $time . '" name="termin" value="' . $time . '" disabled>';
                    }else {
                        echo '<input type="radio" id="' . $time . '" name="termin" value="' . $time . '">';
                    }

                    echo '<label class="vrijeme" for="' . $time . '">' . $time . '</label><br>';
                }
            ?>

            <button type="submit" class="potvrdibtn" id="potvrdibtn" name="rezervacija">Rezerviraj</button>
        </form>
          <hr>
      
          
        </div>
      
    
</body>
</html>