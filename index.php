<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$siswa = query("SELECT * FROM siswa");

if (isset($_POST["cari"])) {
    $siswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <style>
        @media print {
            .logout, .tambah, .form-cari, .aksi {
                display: none;
            }
        }
    </style>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
    <a href="logout.php" class="logout">Logout</a>
    <h1>Daftar Mahasiswa</h1>
    <a href="tambah.php" class="tambah">Tambah data siswa</a>
    <br><br>

    <form action="" method="post" class="form-cari">
        <input type="text" name="keyword" size="30" autofocus placeholder="masukkan NIS atau nama..." autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari</button>
    </form>
    <br>

    <div id="container">
        <table border=" 1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th class="aksi">Aksi</th>
                <th>Gambar</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($siswa as $row) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td class="aksi">
                        <a href="ubah.php?id=<?= $row["id"] ?>">Ubah</a> |
                        <a href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('yakin dek?')">Hapus</a>
                    </td>
                    <td>
                        <img src="img/<?= $row["gambar"] ?>" width="70">
                    </td>
                    <td><?= $row["nis"] ?></td>
                    <td><?= $row["nama"] ?></td>
                    <td><?= $row["email"] ?></td>
                    <td><?= $row["jurusan"] ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>