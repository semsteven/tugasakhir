<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Daftar Guru</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center">Daftar Guru</h1>
    <a href="tambah_guru.php" class="btn btn-primary mb-2">Tambah Guru</a>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nip</th>
          <th scope="col">Nama</th>
          <th scope="col">Jabatan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $query = "SELECT * FROM tb_guru";
        $result = mysqli_query($koneksi, $query);
        foreach ($result as $data) {
          echo "
            <tr>
              <th scope='row'>" . $no++ . "</th>
              <td>" . $data["nip"] . "</td>
              <td>" . $data["nama"] . "</td>
              <td>" . $data["jabatan"] . "</td>
              <td>
                <a href='update_guru.php?id=" . $data["id"] . "' type='button' class='btn btn-success'>Update</a>
                <a href='delete_guru.php?id=" . $data["id"] . "' type='button' class='btn btn-danger' onclick='return confirm(\"Yakin ingin menghapus data?\")'>Delete</a>
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
