<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Daftar Mata Pelajaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center">Daftar Mata Pelajaran</h1>
    <div class="d-flex justify-content-between mb-2">
      <a href="index.php#mata_pelajaran" class="btn btn-secondary">Kembali</a>
      <a href="tambah_mata_pelajaran.php" class="btn btn-primary">Tambah Mata Pelajaran</a>
    </div>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kode Mata Pelajaran</th>
          <th scope="col">Nama Mata Pelajaran</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $query = "SELECT * FROM tb_mata_pelajaran";
        $result = mysqli_query($koneksi, $query);
        foreach ($result as $data) {
          echo "
            <tr>
              <th scope='row'>" . $no++ . "</th>
              <td>" . $data["kode_mata_pelajaran"] . "</td>
              <td>" . $data["nama_mata_pelajaran"] . "</td>
              <td>
                <a href='update_mata_pelajaran.php?id=" . $data["id"] . "' type='button' class='btn btn-success'>Update</a>
                <a href='delete_mata_pelajaran.php?id=" . $data["id"] . "' type='button' class='btn btn-danger' onclick='return confirm(\"Yakin ingin menghapus data?\")'>Delete</a>
              </td>
            </tr>
          ";
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
</body>
</html>
