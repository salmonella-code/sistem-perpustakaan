<?php
    $sever = 'localhost';
    $user = 'salmonella';
    $password = 'salmonella';
    $database = 'perpus2';

    $con = mysqli_connect($sever, $user, $password, $database);

    if(!$con){
        die("gagal terhubung". mysqli_connect_error());
    }
?>