<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isi = $_POST['isi'];
    $tgl_awal = $_POST['tgl_awal'];
    $tgl_akhir = $_POST['tgl_akhir'];

    $sql = "INSERT INTO tasks (isi, tgl_awal, tgl_akhir) VALUES ('$isi', '$tgl_awal', '$tgl_akhir')";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
