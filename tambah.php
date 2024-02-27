<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "<script>
            alert('berhasil')
            document.location.href = 'index.php'
        </script>";
    } else {
        echo "<script>
            alert('gagal')
            document.location.href = 'index.php'
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data siswa</title>
</head>

<body>
    <h1>Tambah data siswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama">Nama: </label>
                <input id="nama" type="text" name="nama" required autocomplete="off">
            </li>
            <li>
                <label for="nis">NIS: </label>
                <input id="nis" type="text" name="nis" required autocomplete="off">
            </li>
            <li>
                <label for="email">Email: </label>
                <input id="email" type="text" name="email" required autocomplete="off">
            </li>
            <li>
                <label for="jurusan">Jurusan: </label>
                <input id="jurusan" type="text" name="jurusan" required autocomplete="off">
            </li>
            <li>
                <label for="gambar">Gambar: </label>
                <input id="gambar" type="file" name="gambar" autocomplete="off">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>
</body>

</html>