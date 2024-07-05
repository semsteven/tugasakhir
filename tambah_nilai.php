<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nis = $_POST['nis'];
    $kode_mata_pelajaran = $_POST['kode_mata_pelajaran'];
    $nip_guru = $_POST['nip_guru'];
    $nilai = $_POST['nilai'];

    $query = "INSERT INTO tb_nilai (nis, kode_mata_pelajaran, nip_guru, nilai) VALUES ('$nis', '$kode_mata_pelajaran', '$nip_guru', '$nilai')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: nilai_siswa.php");
        exit();
    } else {
        $error = "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Nilai Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tambah Nilai Siswa</h1>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php } ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="mb-3">
                <label for="nis" class="form-label">NIS</label>
                <select class="form-select" id="nis" name="nis" required>
                    <option value="" selected>Pilih Siswa</option>
                    <?php
                    $siswa_query = "SELECT * FROM tb_siswa";
                    $siswa_result = mysqli_query($koneksi, $siswa_query);
                    while ($siswa = mysqli_fetch_assoc($siswa_result)) {
                        echo "<option value='{$siswa['nis']}'>{$siswa['nis']} - {$siswa['nama']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="kode_mata_pelajaran" class="form-label">Mata Pelajaran</label>
                <select class="form-select" id="kode_mata_pelajaran" name="kode_mata_pelajaran" required>
                    <option value="" selected>Pilih Mata Pelajaran</option>
                    <?php
                    $mapel_query = "SELECT * FROM tb_mata_pelajaran";
                    $mapel_result = mysqli_query($koneksi, $mapel_query);
                    while ($mapel = mysqli_fetch_assoc($mapel_result)) {
                        echo "<option value='{$mapel['kode_mata_pelajaran']}'>{$mapel['kode_mata_pelajaran']} - {$mapel['nama_mata_pelajaran']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="nip_guru" class="form-label">Guru</label>
                <select class="form-select" id="nip_guru" name="nip_guru" required>
                    <option value="" selected>Pilih Guru</option>
                    <?php
                    $guru_query = "SELECT * FROM tb_guru";
                    $guru_result = mysqli_query($koneksi, $guru_query);
                    while ($guru = mysqli_fetch_assoc($guru_result)) {
                        echo "<option value='{$guru['nip']}'>{$guru['nip']} - {$guru['nama']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="nilai" class="form-label">Nilai</label>
                <input type="number" step="0.01" class="form-control" id="nilai" name="nilai" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="nilai_siswa.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
</body>
</html>
