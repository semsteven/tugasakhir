<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode_mata_pelajaran = $_POST['kode_mata_pelajaran'];
    $nama_mata_pelajaran = $_POST['nama_mata_pelajaran'];

    $query = "INSERT INTO tb_mata_pelajaran (kode_mata_pelajaran, nama_mata_pelajaran) VALUES ('$kode_mata_pelajaran', '$nama_mata_pelajaran')";
    mysqli_query($koneksi, $query);

    header('Location: mata_pelajaran.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tambah Mata Pelajaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center">Tambah Mata Pelajaran</h1>
    <form action="" method="POST">
      <div class="mb-3">
        <label for="kode_mata_pelajaran" class="form-label">Kode Mata Pelajaran</label>
        <input type="text" class="form-control" id="kode_mata_pelajaran" name="kode_mata_pelajaran" required>
      </div>
      <div class="mb-3">
        <label for="nama_mata_pelajaran" class="form-label">Nama Mata Pelajaran</label>
        <input type="text" class="form-control" id="nama_mata_pelajaran" name="nama_mata_pelajaran" required>
      </div>
      <button type="submit" class="btn btn-primary">Tambah</button>
      <a href="index.php?page=mata_pelajaran" type="button" class="btn btn-info text-white">Kembali</a>
    </form>
  </div>

  <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
</body>
</html>
