<?php 
    if(isset($_SESSION['auth'])){
        echo "<script> location.replace('home.php?page=kriteria'); </script>";
    }else{
        echo "<script> location.replace('login.php'); </script>";
    }