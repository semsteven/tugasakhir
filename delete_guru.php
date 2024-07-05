<?php
include "koneksi.php";

$id = $_GET['id'];
$query = "DELETE FROM tb_guru WHERE id = $id";
$result = mysqli_query($koneksi, $query);

if($result){
  echo "<script>alert('Data berhasil dihapus!'); window.location.href='index.php?page=profile_guru';</script>";
} else {
  echo "<script>alert('Data Gagal dihapus!')</script>";
}
?>
