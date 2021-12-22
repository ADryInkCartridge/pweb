<?php

    include("config.php");

    if (isset($_POST['id'])) {

        $payment = $_POST['id'];
        


        $sql = "DELETE FROM payment WHERE id = '$payment'";
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