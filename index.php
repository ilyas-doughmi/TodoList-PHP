<?php 
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $db_name = "task_manager";

    $sql = mysqli_connect($server_name,$username,$password,$db_name);


    if(!$sql){
        echo "problem in connexion ";
    }
    else{
        echo "all good ";
    }
?>  