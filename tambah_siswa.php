<?php
// Koneksi ke database
include 'koneksi.php';

// Ambil data kelas dan wali untuk dropdown
$result_kelas = mysqli_query($koneksi, "SELECT id_kelas, nama_kelas FROM kelas");
$result_wali = mysqli_query($koneksi, "SELECT id_wali, nama_wali FROM wali_murid");

// Tambah Data Siswa
if (isset($_POST['tambah_siswa'])) {
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $id_kelas = $_POST['id_kelas'];
    $id_wali = $_POST['id_wali'];

    $query = "INSERT INTO siswa (nis, nama_siswa, jenis_kelamin, tempat_lahir, tanggal_lahir, id_kelas, id_wali) 
              VALUES ('$nis', '$nama_siswa', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$id_kelas', '$id_wali')";
    mysqli_query($koneksi, $query);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, select, button {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background: #28a745;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 15px;
        }
        button:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Tambah Siswa</h2>
        <form method="POST" action="">
            <label>NIS:</label>
            <input type="text" name="nis" required>
            
            <label>Nama Siswa:</label>
            <input type="text" name="nama_siswa" required>
            
            <label>Jenis Kelamin:</label>
            <select name="jenis_kelamin" required>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>
            
            <label>Tempat Lahir:</label>
            <input type="text" name="tempat_lahir" required>
            
            <label>Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" required>
            
            <label>Kelas:</label>
            <select name="id_kelas" required>
                <?php while ($row = mysqli_fetch_assoc($result_kelas)) { ?>
                    <option value="<?php echo $row['id_kelas']; ?>"><?php echo $row['nama_kelas']; ?></option>
                <?php } ?>
            </select>
            
            <label>Wali Murid:</label>
            <select name="id_wali" required>
                <?php while ($row = mysqli_fetch_assoc($result_wali)) { ?>
                    <option value="<?php echo $row['id_wali']; ?>"><?php echo $row['nama_wali']; ?></option>
                <?php } ?>
            </select>
            
            <button type="submit" name="tambah_siswa">Tambah Siswa</button>
        </form>
    </div>
</body>
</html>
