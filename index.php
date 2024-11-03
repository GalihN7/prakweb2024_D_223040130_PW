<?php
// Menghubungkan dengan file PHP lainnya
require 'functions.php';
$buku = query("SELECT * FROM buku");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Perpustakaan</title>
</head>

<body>
    <h2 class="text-center fw-bold">Daftar Buku</h2>
    <div class="container">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr class="text-center">
                    <th scope="col">No. </th>
                    <th scope="col">Cover</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Halaman</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Bahasa</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="" tabindex="0">
                <?php if (empty($buku)) : ?>
                    <tr>
                        <td>
                            <h4 class="text-center">Buku Tidak Ditemukan</h4>
                        </td>
                    </tr>
                <?php else : ?>
                    <?php $i = 1; ?>
                    <?php foreach ($buku as $b) : ?>
                        <tr class="" tabindex="0">
                            <td class="align-middle"><strong><?= $i ?></strong></td>
                            <td class="align-middle text-center">
                                <img src="assets/<?= $b["cover"]; ?>">
                            </td>
                            <td class="align-middle text-center"><a href="detail.php?id=<?= $b['id'] ?>" class="text-decoration-none text-dark"><?= $b["judul"]; ?></a></td>
                            <td class="align-middle text-center"><?= $b["penulis"]; ?></td>
                            <td class="align-middle text-center"><?= $b["penerbit"]; ?></td>
                            <td class="align-middle">Rp. <?= $b["harga"]; ?></td>
                            <td class="align-middle text-center"><?= $b["halaman"]; ?></td>
                            <td class="align-middle text-center"><?= $b["genre"]; ?></td>
                            <td class="align-middle text-center"><?= $b["bahasa"]; ?></td>
                            <td class="align-middle text-center">
                                <div class="d-grid gap-2">
                                    <a href="ubah.php?id=<?= $b["id"] ?>" class="btn btn-primary" role="button">Ubah</a>
                                    <a href="hapus.php?id=<?= $b["id"] ?>" onclick="return confirm('Hapus Data Ini?')" class="btn btn-danger">Hapus</a>
                                </div>
                            </td>
                        </tr>
            </tbody>
            <?php $i++; ?>
        <?php endforeach; ?>
    <?php endif; ?>
        </table>
        <div class="add">
            <a href="tambah.php" class="btn btn-primary">Tambah</i></a>
        </div>
    </div>
    <div class="clear"></div>
</body>

</html>