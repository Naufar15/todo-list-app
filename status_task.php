<?php
include 'koneksi.php';

$id = $_GET['id'];
$result = $conn->query("SELECT status FROM tasks WHERE id=$id");
$row = $result->fetch_assoc();
$status = $row['status'] === 'Belum' ? 'Sudah' : 'Belum';

$sql = "UPDATE tasks SET status='$status' WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
