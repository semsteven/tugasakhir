<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Ambil data nilai berdasarkan ID
    $query = "SELECT * FROM tb_nilai WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nis = $_POST['nis'];
        $kode_mata_pelajaran = $_POST['kode_mata_pelajaran'];
        $nip_guru = $_POST['nip_guru'];
        $nilai = $_POST['nilai'];
        
        // Query untuk update data nilai
        $update_query = "
            UPDATE tb_nilai 
            SET nis = '$nis', kode_mata_pelajaran = '$kode_mata_pelajaran', nip_guru = '$nip_guru', nilai = '$nilai' 
            WHERE id = '$id'
        ";

        if (mysqli_query($koneksi, $update_query)) {
            header("Location: nilai_siswa.php");
            exit();
        } else {
            echo "Error: " . $update_query . "<br>" . mysqli_error($koneksi);
        }
    }
} else {
    echo "ID tidak ditemukan.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Update Nilai Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center">Update Nilai Siswa</h1>
    <form action="" method="post">
      <div class="mb-3">
        <label for="nis" class="form-label">NIS</label>
        <input type="text" class="form-control" id="nis" name="nis" value="<?php echo $data['nis']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="kode_mata_pelajaran" class="form-label">Kode Mata Pelajaran</label>
        <input type="text" class="form-control" id="kode_mata_pelajaran" name="kode_mata_pelajaran" value="<?php echo $data['kode_mata_pelajaran']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="nip_guru" class="form-label">NIP Guru</label>
        <input type="text" class="form-control" id="nip_guru" name="nip_guru" value="<?php echo $data['nip_guru']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="nilai" class="form-label">Nilai</label>
        <input type="text" class="form-control" id="nilai" name="nilai" value="<?php echo $data['nilai']; ?>" required>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
      <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>

  <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
</body>
</html>
