<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tambah Guru</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
  <section class="row">
    <div class="col-md-6 offset-md-3 align-self-center"> 
      <h1 class="text-center mt-4">Form Tambah Data Guru</h1>
      <form method="POST">
        <div class="mb-3">
          <label for="inputNip" class="form-label">Nip</label>
          <input type="number" class="form-control" id="inputNip" name="nip" placeholder="Masukan Nip Guru" required>
        </div>
        <div class="mb-3">
          <label for="inputNama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Masukan Nama Guru" required>
        </div>
        <div class="mb-3">
          <label for="inputJabatan" class="form-label">Jabatan</label>
          <input type="text" class="form-control" id="inputJabatan" name="jabatan" placeholder="Masukan Jabatan Guru" required>
        </div>
        <input name="daftar" type="submit" class="btn btn-primary" value="Tambah">
        <a href='index.php?page=profile_guru' type="button" class="btn btn-info text-white">Kembali</a>
      </form>
    </div>
  </section>

  <?php
    if(isset($_POST['daftar'])){
      $nip = $_POST['nip'];
      $nama = $_POST['nama'];
      $jabatan = $_POST['jabatan'];

      $query = "INSERT INTO tb_guru (nip, nama, jabatan) VALUES('".$nip."', '".$nama."', '".$jabatan."')";
      $result = mysqli_query($koneksi, $query);

      if($result){
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='index.php?page=profile_guru';</script>";
      } else {
        echo "<script>alert('Data Gagal di tambahkan!')</script>";
      }
    }    
  ?>

  <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
</body>
</html>
