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

    $task_add = "INSERT INTO tasks (task_title, task_description)
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
</head>

<body>
    <form action="index.php" method="POST">
        <label>Title</label>
        <input type="text" name="task_title" required>

        <label>Description</label>
        <textarea name="task_description" required></textarea>

        <button type="submit">Add Task</button>
    </form>
</body>

</html>