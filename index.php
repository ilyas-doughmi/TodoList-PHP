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


    // task informations 


    if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $task_title = $_POST["task_title"];
    $task_description = $_POST["task_description"];


    $task_add = "INSERT INTO task (task_title,task_description) VALUES('$task_title','$task_description')";

    if(mysqli_query($sql,$task_add)){
        echo "sended";
    }
    else{
        echo "problem";
    }
    }

?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
</head>
<body>
    <form action="index.php" method="POST">
        <label for="">Title</label>
        <input type="text" name="task_title">
        <label for="">Description</label>
        <textarea name="task_description" id=""></textarea>

        <button type="submit">Add Task</button>
    </form>
</body>
</html>