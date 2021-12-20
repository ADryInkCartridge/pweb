<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>index</title>
</head>
<body class="min-vh-100  d-flex flex-column">
   <div class="container-fluid content flex-grow-1 d-flex flex-column justify-content-center">
        <div class="m-auto justify-content-center">
        <h1>List Terdaftar</h1>
        <div class="jumbotron m-auto p-4 justify-content-center">
            <div class="p-5">
                <header>
                    <h2>List Pendaftar</h2>
                </header>
                <nav>
                    <a class="btn btn-dark" href="form-daftar.php">Tambah Baru</a>
                </nav>
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Sekolah Asal</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
        
                        <?php
                        $sql = "SELECT * FROM pweb8"; // query to get all data 
                        $query = mysqli_query($db, $sql);
        
                        while ($siswa = mysqli_fetch_array($query)) {
                            echo "<tr>";
        
                            echo "<td>" . $siswa['id'] . "</td>";
                            echo "<td>" . $siswa['nama'] . "</td>";
                            echo "<td style='width: 20%'>" . $siswa['alamat'] . "</td>";
                            echo "<td>" . $siswa['jenis_kelamin'] . "</td>";
                            echo "<td>" . $siswa['agama'] . "</td>";
                            echo "<td>" . $siswa['sekolah_asal'] . "</td>";
        
                            echo "<td>";
                            echo "<a class='btn btn-dark mx-1' href='form-edit.php?id=" . $siswa['id'] . "'>Edit</a>";
                            echo "<a class='btn btn-danger' href='hapus.php?id=" . $siswa['id'] . "'>Hapus</a>";
                            echo "</td>";
        
                            echo "</tr>";
                        }
                        ?>
        
                    </tbody>
                </table>
        
                <h5>Total: <?php echo mysqli_num_rows($query) ?></h5>
            </div>
        </div>
        </div>
   </div>
    
</body>
</html>