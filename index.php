<?php
$server_name = "localhost";
$username = "root";
$password = "";
$db_name = "task_manager";

$conn = mysqli_connect($server_name, $username, $password, $db_name);
    
if (!$conn) {
    die("Connection failed");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $task_title = $_POST["task_title"];
    $task_description = $_POST["task_description"];

    $task_add = "INSERT INTO task (task_title, task_description)
                 VALUES ('$task_title', '$task_description')";

    if (mysqli_query($conn, $task_add)) {
        header("Location: index.php?status=success");
        exit;
    } else {
        echo "problem: " . mysqli_error($conn);
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
      <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="">
    <div class="flex justify-center flex-col align-center items-center mt-24">
 <h1 class="text-center text-4xl font-semibold ">Task Manager</h1>
    <form action="index.php" method="POST" class="flex flex-col w-[30%]">
        
        <input type="text" name="task_title" required placeholder="Task Title" class="border-2 rounded-xl text-center mb-4 mt-5 h-[40px]">

        <textarea name="task_description" required class="border-2 rounded-[12px] h-[80px] mb-2 text-center" placeholder="Task Description"></textarea>

        <button type="submit" class="border-2 rounded-[12px] h-[6vh]  w-[80%] self-center bg-black text-white text hover:scale[0.9px]">Add Task</button>
    </form>
        <div class="border-2 border-black mt-12 p-24 rounded-xl text-[30px] font-semibold uppercase">
     <?php

        $get_data = "SELECT * FROM task";

        $result = mysqli_query($conn, $get_data);




        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<h3>" . $row["task_title"] . " | " . $row["task_description"] . "</h3>";
            }
        }
        else{
            echo "no task found";
        }

        ?>
        </div>
   
    
    </div>
   
</body>

</html>