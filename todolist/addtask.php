<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = $conn->real_escape_string($_POST['task']);
    
    $sql = "INSERT INTO task (task) VALUES ('$task')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
