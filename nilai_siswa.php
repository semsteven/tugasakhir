<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Daftar Nilai Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center">Daftar Nilai Siswa</h1>
    <div class="d-flex justify-content-between mb-2">
      <a href="index.php" class="btn btn-secondary">Kembali</a>
      <a href="tambah_nilai.php" class="btn btn-primary">Tambah Nilai</a>
    </div>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">NIS</th>
          <th scope="col">Nama Siswa</th>
          <th scope="col">Mata Pelajaran</th>
          <th scope="col">Guru</th>
          <th scope="col">Nilai</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $query = "
          SELECT 
            tb_nilai.id,
            tb_nilai.nis,
            tb_siswa.nama AS nama_siswa,
            tb_mata_pelajaran.nama_mata_pelajaran,
            tb_guru.nama AS nama_guru,
            tb_nilai.nilai
          FROM tb_nilai
          JOIN tb_siswa ON tb_nilai.nis = tb_siswa.nis
          JOIN tb_mata_pelajaran ON tb_nilai.kode_mata_pelajaran = tb_mata_pelajaran.kode_mata_pelajaran
          JOIN tb_guru ON tb_nilai.nip_guru = tb_guru.nip
        ";
        $result = mysqli_query($koneksi, $query);
        foreach ($result as $data) {
          echo "
            <tr>
              <th scope='row'>" . $no++ . "</th>
              <td>" . $data["nis"] . "</td>
              <td>" . $data["nama_siswa"] . "</td>
              <td>" . $data["nama_mata_pelajaran"] . "</td>
              <td>" . $data["nama_guru"] . "</td>
              <td>" . $data["nilai"] . "</td>
              <td>
                <a href='update_nilai.php?id=" . $data["id"] . "' type='button' class='btn btn-success'>Update</a>
                <a href='delete_nilai.php?id=" . $data["id"] . "' type='button' class='btn btn-danger' onclick='return confirm(\"Yakin ingin menghapus data?\")'>Delete</a>
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
