<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">To-Do List</h2>
    <form method="POST" action="tambah_task.php">
        <div class="mb-3">
            <label for="isi" class="form-label">Isi Task</label>
            <input type="text" class="form-control" id="isi" name="isi" placeholder="Masukkan task">
        </div>
        <div class="mb-3">
            <label for="tgl_awal" class="form-label">Tanggal Awal</label>
            <input type="date" class="form-control" id="tgl_awal" name="tgl_awal">
        </div>
        <div class="mb-3">
            <label for="tgl_akhir" class="form-label">Tanggal Akhir</label>
            <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Isi</th>
                <th>Tanggal Awal</th>
                <th>Tanggal Akhir</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM tasks");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['isi']}</td>";
                echo "<td>{$row['tgl_awal']}</td>";
                echo "<td>{$row['tgl_akhir']}</td>";
                echo "<td>{$row['status']}</td>";
                echo "<td>
                        <a href='ubah_task.php?id={$row['id']}' class='btn btn-warning'>Ubah</a>
                        <a href='hapus_task.php?id={$row['id']}' class='btn btn-danger'>Hapus</a>
                        <a href='status_task.php?id={$row['id']}' class='btn btn-info'>Status</a>
                    </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
