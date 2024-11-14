<?php
include 'config.php';

$sql = "SELECT * FROM task ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
</head>
<body>
    <h1>To-Do List</h1>

    <form action="addtask.php" method="POST">
        <input type="text" name="task" placeholder="Tugas baru..." required>
        <button type="submit">Tambah Tugas</button>
    </form>

    <h2>Daftar Tugas</h2>
    <ul>
        <?php while ($task = $result->fetch_assoc()): ?>
            <li>
                <?= htmlspecialchars($task['task']) ?>
                <a href="edittask.php?id=<?= $task['id'] ?>">Edit</a>
                <a href="deletetask.php?id=<?= $task['id'] ?>" onclick="return confirm('Anda yakin ingin menghapus?')">Hapus</a>
            </li>
        <?php endwhile; ?>
    </ul>

</body>
</html>

<?php
$conn->close();
?>
