<?php

    include("config.php");

    if (isset($_POST['add'])) {

        $id_siswa = $_POST['id'];
        $parent_id = $_POST['parent_id'];
        $payment_status = "Unpaid";


        $sql = "INSERT INTO payment (id_siswa,id_parent, payment_status) VALUE ('$id_siswa', '$parent_id', '$payment_status')";
        $query = mysqli_query($db, $sql);

        if( $query ) {
            //redirect to index.php with status=sukses
            header('Location: e_payment_list.php?status=sukses');
        } else {
            // if fail, redirect with status gagal
            header('Location: e_payment_list.php?status=gagal');
        }

    } else {
        die("Akses dilarang...");
    }

?>