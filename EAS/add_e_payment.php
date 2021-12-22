<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add E-Payment</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <?php
        $sql = "SELECT * FROM parent";
        $query = mysqli_query($db, $sql);
        $res = Array();
        while($parent = mysqli_fetch_array($query)) {
            $id_siswa = $parent['id_siswa'];
            $res[$id_siswa]['id_parent'] = $parent['id'];
            $res[$id_siswa]['nama'] = $parent['nama'];
            $res[$id_siswa]['address'] = $parent['address'];
            $res[$id_siswa]['phone'] = $parent['phone'];
            $res[$id_siswa]['email'] = $parent['email'];
        }
        $json = json_encode($res);
    ?>
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
                        <div class="card-body mx-4 mt-2 text-black">  
                            <h5 class="fw-normal pb-4" style="letter-spacing: 1px;">New Payment Slip</h5>
                            <form action="payment.php" method = "POST">
                                <select class="form-select rounded-pill" style = "background-color: #F1F0FF"  aria-label="Default select example" id="mySelect" name="id" onchange="selectionchange();">
                                
                                <?php
                                $sql = "SELECT * FROM siswa";
                                $query = mysqli_query($db, $sql);

                                while($siswa = mysqli_fetch_array($query)) {
                                    echo "<option value='".$siswa['id']."'>".$siswa['nama']. " - ".$siswa['nrp']."</option>";
                                    
                                }
                                ?>
                                </select>
                                <h5 class="fw-normal my-4" style="letter-spacing: 1px;">Parent</h5>
                                <input type="hidden" name="parent_id" id ="parent_id">
                                <div class="form-outline">
                                    <label class="form-label">Parent Name</label>
                                    <input readonly type="text" id="parent" name="parent" style = "background-color: #DDDDDD" class="form-control form-control-lg rounded-pill" />
                                </div>
                                <div class="form-outline">
                                    <label class="form-label">Email</label>
                                    <input readonly type="email" id="email" name="email" style = "background-color: #DDDDDD" class="form-control form-control-lg rounded-pill" />
                                </div>
                                <div class="form-outline">
                                    <label class="form-label">Phone Number</label>
                                    <input  readonly type="text" id="phone" name="phone" style = "background-color: #DDDDDD" class="form-control form-control-lg rounded-pill" />
                                </div>
                                <div class="form-outline">
                                    <label class="form-label">Billing Address</label>
                                    <input readonly type="text" id="address" name="address" style = "background-color: #DDDDDD" class="form-control form-control-lg rounded-pill" />
                                </div>

                                <div class="text-end pt-4">
                                    <button class="btn rounded-pill" value="add" name="add" style="background-color: #F1F0FF;" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>    
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </section>
      <script>

        var arr = <?php echo $json; ?>

        function selectionchange()
        {
            var e = document.getElementById("mySelect");
            var str = e.options[e.selectedIndex].value;
            
            console.log(arr[str]['id_parent']);
            document.getElementById("parent_id").value = arr[str]['id_parent'];
            document.getElementById('parent').value = arr[str]['nama'];
            document.getElementById('email').value = arr[str]['email'];
            document.getElementById('phone').value = arr[str]['phone'];
            document.getElementById('address').value = arr[str]['address'];
        }
      </script>
</body>
</html>