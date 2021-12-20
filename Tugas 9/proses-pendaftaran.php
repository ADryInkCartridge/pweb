<?php

    include("config.php");

    // cek apakah tombol daftar sudah diklik atau blum?
    if (isset($_POST['daftar'])) {

        // ambil data dari formulir
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jk = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $sekolah = $_POST['sekolah_asal'];
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        $fotobaru = date('d-m-Y_H-i-s').$foto;

        $path = "images/".$fotobaru;

        if (move_uploaded_file($tmp, $path)) {
            // buat query
            $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal, foto) VALUE ('$nama', '$alamat', '$jk', '$agama', '$sekolah', '$fotobaru')";
            $query = mysqli_query($db, $sql);

            // apakah query simpan berhasil?
            if ( $query ) {
                // kalau berhasil alihkan ke halaman index.php dengan status=sukses
                header('Location: list-siswa.php?status=sukses');
            } else {
                // kalau gagal alihkan ke halaman indek.php dengan status=gagal
                header('Location: list-siswa.php?status=gagal');
            }
        }

    } else {
        die("Akses dilarang...");
    }

?>