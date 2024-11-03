<?php
// Menghubungkan dengan file PHP lainnya
require 'functions.php';

// Mendapatkan ID dari parameter URL
$id = $_GET['id'];

// Memeriksa apakah data berhasil dihapus
if (hapus($id) > 0) {
    echo "<script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'index.php';
          </script>";
} else {
    echo "<script>
            alert('Data Gagal Dihapus');
            document.location.href = 'index.php';
          </script>";
}
?>
