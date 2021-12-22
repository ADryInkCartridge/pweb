<?php

    include("config.php");

    if (isset($_POST['id'])) {

        $payment = $_POST['id'];
        
        $sql = "SELECT payment_status FROM payment WHERE id = '$payment'";
        $query = mysqli_query($db, $sql);
        

        if( $query ) {
            
            $row = mysqli_fetch_assoc($query);
            $payment_status = $row['payment_status'];
            if($payment_status == "Unpaid"){
                $payment_status = "Paid";
            }else{
                $payment_status = "Unpaid";
            }

            $sql = "UPDATE payment SET payment_status = '$payment_status' WHERE id = '$payment';";
            $query = mysqli_query($db, $sql);
            if( $query ) {
            header('Location: e_payment_list.php?status=sukses');
            }
        } else {
            // if fail, redirect with status gagal
            header('Location: e_payment_list.php?status=gagal');
        }

    } else {
        die("Akses dilarang...");
    }

?>