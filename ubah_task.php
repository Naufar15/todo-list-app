<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $isi = $_POST['isi'];
    $tgl_awal = $_POST['tgl_awal'];
    $tgl_akhir = $_POST['tgl_akhir'];

    $sql = "UPDATE tasks SET isi='$isi', tgl_awal='$tgl_awal', tgl_akhir='$tgl_akhir' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM tasks WHERE id=$id");
    $task = $result->fetch_assoc();
?>
<form method="POST" action="ubah_task.php">
    <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
    <div class="mb-3">
        <label for="isi" class="form-label">Isi Task</label>
        <input type="text" class="form-control" id="isi" name="isi" value="<?php echo $task['isi']; ?>">
    </div>
    <div class="mb-3">
        <label for="tgl_awal" class="form-label">Tanggal Awal</label>
        <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" value="<?php echo $task['tgl_awal']; ?>">
    </div>
    <div class="mb-3">
        <label for="tgl_akhir" class="form-label">Tanggal Akhir</label>
        <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" value="<?php echo $task['tgl_akhir']; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Ubah</button>
</form>
<?php
}
$conn->close();
?>
