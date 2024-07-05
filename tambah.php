<?php
  include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Tambah data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
  <section class="row">
    <div class="col-md-6 offset-md-3 align-self-center"> 
      <h1 class="text-center mt-4">Form Tambah Data</h1>
      <form method="POST">
        <div class="mb-3">
          <label for="inputNis" class="form-label">Nis</label>
          <input type="number" class="form-control" id="inputNis" name="nis" placeholder="Masukan Nis Siswa" required>
        </div>
        <div class="mb-3">
          <label for="inputNama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Masukan Nama Siswa" required>
        </div>
        <div class="mb-3">
          <label for="inputKelas" class="form-label">Kelas</label>
          <input type="text" class="form-control" id="inputKelas" name="kelas" placeholder="Masukan Kelas Siswa" required>
        </div>
        <input name="daftar" type="submit" class="btn btn-primary" value="Tambah">
        <button type="button" id="back-to-siswa" class="btn btn-info text-white" onclick="loadSiswaPage()">Kembali</button>
      </form>
    </div>
  </section>

  <?php
    if(isset($_POST['daftar'])){
      $nis = $_POST['nis'];
      $nama = $_POST['nama'];
      $kelas = $_POST['kelas'];

      $query = "INSERT INTO tb_siswa (nis, nama, kelas) VALUES('".$nis."', '".$nama."', '".$kelas."')";
      $result = mysqli_query($koneksi, $query);

      if($result){
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='index.php?page=siswa';</script>";
      } else {
        echo "<script>alert('Data Gagal di tambahkan!')</script>";
      }
    }    
  ?>

  <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>

  <script>
    function loadSiswaPage() {
      window.location.href = 'index.php?page=siswa';
    }
  </script>
</body>
</html>
