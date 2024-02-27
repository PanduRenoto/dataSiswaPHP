<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id = $_GET["id"];
$s = query("SELECT * FROM siswa WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
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
    <title>Ubah data siswa</title>
</head>

<body>
    <h1>Ubah data siswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $s["id"] ?>">
        <input type="hidden" name="gambarLama" value="<?= $s["gambar"] ?>">
        <ul>
            <li>
                <label for=" nama">Nama: </label>
                <input id="nama" type="text" name="nama" required value="<?= $s["nama"] ?>" autocomplete="off">
            </li>
            <li>
                <label for="nis">NIS: </label>
                <input id="nis" type="text" name="nis" required value="<?= $s["nis"] ?>" autocomplete="off">
            </li>
            <li>
                <label for="email">Email: </label>
                <input id="email" type="text" name="email" required value="<?= $s["email"] ?>" autocomplete="off">
            </li>
            <li>
                <label for="jurusan">Jurusan: </label>
                <input id="jurusan" type="text" name="jurusan" required value="<?= $s["jurusan"] ?>" autocomplete="off">
            </li>
            <li>
                <label for="gambar">Gambar: </label> <br>
                <img src="img/<?= $s["gambar"] ?>">
                <input id="gambar" type="file" name="gambar" autocomplete="off">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>

</html>