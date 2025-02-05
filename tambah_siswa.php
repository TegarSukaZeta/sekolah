<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'nis' => $_POST['nis'],
        'nama_siswa' => $_POST['nama_siswa'],
        'jenis_kelamin' => $_POST['jenis_kelamin'],
        'tempat_lahir' => $_POST['tempat_lahir'],
        'tanggal_lahir' => $_POST['tanggal_lahir'],
        'id_kelas' => $_POST['id_kelas'],
        'id_wali' => $_POST['id_wali']
    ];
    addSiswa($data);
    header('Location: index.php');
    exit;
}


?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Tambah Siswa</h1>
    <form method="POST">
        <label for="nis">NIS:</label>
        <input type="text" id="nis" name="nis" required>
        <label for="nama_siswa">Nama Siswa:</label>
        <input type="text" id="nama_siswa" name="nama_siswa" required>
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
        <label for="tempat_lahir">Tempat Lahir:</label>
        <input type="text" id="tempat_lahir" name="tempat_lahir">
        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir">
        <label for="id_kelas">Kelas:</label>
        <select id="id_kelas" name="id_kelas">
            <?php foreach ($kelas as $k): ?>
            <option value="<?= $k['id_kelas'] ?>"><?= htmlspecialchars($k['nama_kelas']) ?></option>
            <?php endforeach; ?>
        </select>
        <label for="id_wali">Wali Murid:</label>
        <select id="id_wali" name="id_wali">
            <?php foreach ($wali as $w): ?>
            <option value="<?= $w['id_wali'] ?>"><?= htmlspecialchars($w['nama_wali']) ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Simpan</button>
    </form>
    <a href="index.php" class="btn">Kembali</a>
</body>
</html>