<?php
// Fungsi untuk melakukan koneksi ke database
function koneksi()
{
    $conn = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn, "prakweb_a_203040034_pw");
    return $conn;
}

// Fungsi untuk melakukan query dan memasukkannya ke dalam array
function query($sql)
{
    $conn = koneksi();
    $result = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Fungsi untuk menambahkan data ke dalam database
function tambah($data)
{
    $conn = koneksi();
    $cover = htmlspecialchars($data['cover']);
    $judul = htmlspecialchars($data['judul']);
    $penulis = htmlspecialchars($data['penulis']);
    $penerbit = htmlspecialchars($data['penerbit']);
    $harga = htmlspecialchars($data['harga']);
    $halaman = htmlspecialchars($data['halaman']);
    $genre = htmlspecialchars($data['genre']);
    $bahasa = htmlspecialchars($data['bahasa']);

    $query = "INSERT INTO buku VALUES (
        '', '$cover', '$judul', '$penulis', '$penerbit', 
        '$harga', '$halaman', '$genre', '$bahasa'
    )";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Fungsi untuk menghapus data dari database
function hapus($id)
{
    $conn = koneksi();
    mysqli_query($conn, "DELETE FROM buku WHERE id = $id");

    return mysqli_affected_rows($conn);
}

// Fungsi untuk mengubah data dalam database
function ubah($data)
{
    $conn = koneksi();
    $id = htmlspecialchars($data["id"]);
    $cover = htmlspecialchars($data["cover"]);
    $judul = htmlspecialchars($data["judul"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $harga = htmlspecialchars($data["harga"]);
    $halaman = htmlspecialchars($data["halaman"]);
    $genre = htmlspecialchars($data["genre"]);
    $bahasa = htmlspecialchars($data["bahasa"]);

    $query = "UPDATE buku SET 
                cover = '$cover',
                judul = '$judul',
                penulis = '$penulis', 
                penerbit = '$penerbit', 
                harga = '$harga', 
                halaman = '$halaman', 
                genre = '$genre', 
                bahasa = '$bahasa'
              WHERE id = '$id'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>
