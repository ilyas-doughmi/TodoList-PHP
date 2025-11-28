<?php 
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $db_name = "task_manager";

    $sql = mysqli_connect($server_name,$username,$password,$db_name);

    $add_task = "INSERT INTO task(task_title,task_description) VALUES('test','testing inserting new item to task')";
    if(!$sql){
        echo "problem in connexion ";
    }
    else{
        echo "all good ";
    }


    if(mysqli_query($sql,$add_task)){
        echo "added";
    }
    else{
        echo "problem";
    }
?>  