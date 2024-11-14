<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $task = $conn->real_escape_string($_POST['task']);
    
    $sql = "UPDATE task SET task='$task' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
} else {

    $id = $_GET['id'];
    $sql = "SELECT * FROM task WHERE id=$id";
    $result = $conn->query($sql);
    $task = $result->fetch_assoc();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tugas</title>
</head>
<body>
    <h1>Edit Tugas</h1>
    <form action="edittask.php" method="POST">
        <input type="hidden" name="id" value="<?= $task['id'] ?>">
        <input type="text" name="task" value="<?= htmlspecialchars($task['task']) ?>" required>
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
