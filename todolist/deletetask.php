<?php
include 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM task WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit;
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
