<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List E-Payment</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    
</head>

<body style = "background-color: #F1F0FF">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light rounded-3">
                <div class="d-flex flex-column align-items-center pt-2 text-black min-vh-100">
                    <div class="py-5">
                        <div class="rounded-circle overflow-hidden" style="background-color: #F1F0FF;">
                            <img src="./assets/user.png" alt="user" style="width: 100px">
                        </div>
                        <h3 class="text-center">Admin</h3>
                    </div>
                    <ul class="nav nav-pills flex-column mb-0 align-items-center align-items-sm-start w-100" id="menu">
                        <li class="nav-item m-3">
                            <a href="#" class="text-center align-middle px-0 text-decoration-none text-reset d-flex align-items-center">
                                    <img class="mx-2" src="./assets/briefcase.png" alt="briefcase" style="width: 20px;">
                                    <p class="align-middle my-auto">Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item m-3">
                            <a href="#" class="text-center align-middle px-0 text-decoration-none text-reset d-flex align-items-center">
                                <img class="mx-2" src="./assets/comment-user.png" alt="briefcase" style="width: 20px;">
                                <p class="align-middle my-auto">Student Management</p>
                            </a>
                        </li>
                        <li class="nav-item m-3">
                            <a href="#" class="text-center align-middle px-0 text-decoration-none text-reset d-flex align-items-center">
                                <img class="mx-2" src="./assets/user.png" alt="briefcase" style="width: 20px;">
                                <p class="align-middle my-auto">Parent Creation</p>
                            </a>
                        </li>
                        <li class="nav-item m-3">
                            <a href="#" class="text-center align-middle px-0 text-decoration-none text-reset d-flex align-items-center">
                                <img class="mx-2" src="./assets/receipt.png" alt="briefcase" style="width: 20px;">
                                <p class="align-middle my-auto" style="color: #9B95E6;">E-Payment Generation</p>
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <a href="login.php" class=" text-decoration-none text-reset d-flex align-items-center mb-2 mx-2 mt-auto align-self-end">
                        <p class="align-middle my-auto">Logout</p>
                        <img class="mx-2" src="./assets/sign-out.png" alt="briefcase" style="width: 30px;">

                    </a>
                </div>
            </div>
            <section class="vh-100 col" >
                <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                        <div class="card-body m-2 text-black">  
                            <h5 class="fw-normal pb-4" style="letter-spacing: 1px;">E-Payment</h5>
                            <div class="py-0 d-flex flex-row h-auto justify-content-evenly">
                                <p class="col-5">Enrolled Child</p>
                                <p class="col-5">Parent Name</p>
                                <p class="col">Status</p>
                                <p class="col" class="mx-2">Action</p>
                            </div>
                            <hr class="bg-dark">
                            <div class="flex d-flex flex-column align-items-center ">

                                <?php
                                $sql = "SELECT payment.id as id_payment, parent.nama AS nama_parent, siswa.nama AS nama_siswa, payment.payment_status AS status_p FROM payment,siswa,parent WHERE payment.id_siswa = siswa.id AND payment.id_parent = parent.id";
                                $query = mysqli_query($db, $sql);

                                while($siswa = mysqli_fetch_array($query)) {

                                    echo '<div class="d-flex flex-row w-100 justify-content-evenly align-content-center">';
                                    echo '<p class="col-5 pt-2">'.$siswa['nama_siswa'].'</p>';
                                    echo '<p class="col-5 pt-2">'.$siswa['nama_parent'].'</p>';
                                    echo '<p class="col pt-2">'.$siswa['status_p'].'</p>';
                                    echo '<div class="d-flex col">
                                            <form action="edit.php" id="edit'.$siswa['id_payment'].'" method="POST">
                                                <input type="hidden" name="id" value="'.$siswa['id_payment'].'">
                                                <button class="btn" type="submit"><img class="mx-2" src="./assets/pencil.png" alt="edit" style="width: 20px;"></button>
                                            </form>
                                            <form action="delete.php" id="edit'.$siswa['id_payment'].'" method="POST">
                                                <input type="hidden" name="id" value="'.$siswa['id_payment'].'">
                                                <button class="btn" type="submit"><img src="./assets/trash.png" style="width: 20px;"></button>
                                            </form>
                                         </div>
                                        </div>';
                                }
                                ?>
                                <a href="add_e_payment.php" class=" text-decoration-none text-reset d-flex align-items-center mb-2 mt-auto align-self-end pt-4">
                                    <img class="mx-2" src="./assets/user-add.png" alt="briefcase" style="width: 25px;">
                                </a>
                            </div>

                            
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </section>
      <script>
        function submitEdit(int x) {
            console.log(x);
            // document.getElementById("edit"+x).submit();
        }
        function submitDelete(int x) {
            document.getElementById("delete"+x).submit();
        }
      </script>
</body>
</html>