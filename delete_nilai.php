<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data nilai berdasarkan ID
    $query = "DELETE FROM tb_nilai WHERE id = '$id'";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: nilai_siswa.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
