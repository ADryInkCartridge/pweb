<?php

    include("config.php");

    // cek apakah tombol simpan sudah diklik atau blum?
    if(isset($_POST['simpan'])) {

        // ambil data dari formulir
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jk = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $sekolah = $_POST['sekolah_asal'];
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        if (empty($foto)) {
            // buat query update
            $sql1 = "UPDATE calon_siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah' WHERE id=$id";
            $query1 = mysqli_query($db, $sql1);

            // apakah query update berhasil?
            if( $query1 ) {
                // kalau berhasil alihkan ke halaman list-siswa.php
                header('Location: list-siswa.php');
            } else {
                // kalau gagal tampilkan pesan
                die("Gagal menyimpan perubahan...");
            }
        } else {
            $fotobaru = date('d-m-Y_H-i-s').$foto;
            $path = "images/".$fotobaru;
            if (move_uploaded_file($tmp, $path)) {
                $sql2 = "SELECT foto FROM calon_siswa WHERE id=$id";
                $query2 = mysqli_query($db, $sql2);

                while($siswa = mysqli_fetch_array($query2)) {
                    if (is_file("images/".$siswa['foto'])) {
                        unlink("images/".$siswa['foto']);
                    }
                }

                $sql3 = "UPDATE calon_siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah', foto='$fotobaru' WHERE id=$id";
                $query3 = mysqli_query($db, $sql3);
                // apakah query update berhasil?
                if( $query3 ) {
                    // kalau berhasil alihkan ke halaman list-siswa.php
                    header('Location: list-siswa.php');
                } else {
                    // kalau gagal tampilkan pesan
                    die("Gagal menyimpan perubahan...");
                }
            }
        }

    } else {
        die("Akses dilarang...");
    }

?>