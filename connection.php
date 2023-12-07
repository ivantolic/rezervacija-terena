<?php
    $conn = mysqli_connect("localhost", "root", "", "rezervacija");
    if(mysqli_connect_errno()){
    echo "Spoj na bazu neuspjesan.".mysqli_connect_error();
    }
?>