<?php
include "koneksi.php";

$id = $_GET['id'];
$query = "SELECT * FROM tb_guru WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Update Guru</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
  <section class="row">
    <div class="col-md-6 offset-md-3 align-self-center"> 
      <h1 class="text-center mt-4">Form Update Data Guru</h1>
      <form method="POST">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <div class="mb-3">
          <label for="inputNip" class="form-label">Nip</label>
          <input type="number" class="form-control" id="inputNip" name="nip" value="<?php echo $data['nip']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="inputNama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="inputNama" name="nama" value="<?php echo $data['nama']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="inputJabatan" class="form-label">Jabatan</label>
          <input type="text" class="form-control" id="inputJabatan" name="jabatan" value="<?php echo $data['jabatan']; ?>" required>
        </div>
        <input name="update" type="submit" class="btn btn-primary" value="Update">
        <a href="index.php?page=profile_guru" type="button" class="btn btn-info text-white">Kembali</a>
      </form>
    </
