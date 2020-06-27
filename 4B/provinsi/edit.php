<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Me Dumb</title>

    <!-- link bootstrap -->
    <link rel="stylesheet" href="../b4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../b4/css/style.css">
</head>

    <?php 
        include "../config/database.php";

        $id = $_GET['id'];

        $query = " SELECT * FROM tb_provinsi WHERE id = '$id' ";
        $data = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($data);

        $query = " SELECT * FROM tb_user ";
        $user = mysqli_query($con, $query);

        if(isset($_POST['tambah'])){
            $nama = htmlspecialchars($_POST['nama']);
            $diresmikan = htmlspecialchars($_POST['diresmikan']);
            $pulau = htmlspecialchars($_POST['pulau']);

            $ekstensi_diperbolehkan	= array('png','jpg', 'jpeg');
            $photo = $_FILES['photo']['name'];
            $x = explode('.', $photo);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['photo']['size'];
            $file_tmp = $_FILES['photo']['tmp_name'];
            $dirUpload = "photo/";
            
            if($ukuran > 0) {
                if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                    if($ukuran < 1044070){
                        $terupload = move_uploaded_file($file_tmp, $dirUpload.$photo);
                        if ($terupload) {
                            $query = " UPDATE tb_provinsi 
                                        SET nama = '$nama',
                                         diresmikan = '$diresmikan',
                                          photo = '$photo',
                                          pulau = '$pulau'
                                           WHERE id = '$id'  ";
                            $data = mysqli_query($con, $query);
                            if($data){
                                echo "<script>alert('data berhasil ditambah)</script>";
                                header("location: index.php");
                            } else {
                                var_dump($query);
                                echo "<script>alert('data berhasil ditambah)</script>";
                                echo "error";die;
                            }
                        } else {
                            echo "Upload Gagal!";
                        }
                    }else{
                        echo 'UKURAN FILE TERLALU BESAR';
                    }
                }else{
                    echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
                }
            } else {
                $query = " UPDATE tb_provinsi 
                        SET nama = '$nama',
                         diresmikan = '$diresmikan',
                          pulau = '$pulau'
                           WHERE id = '$id'  ";
                $data = mysqli_query($con, $query);
                if($data){
                    echo "<script>alert('data berhasil ditambah)</script>";
                    header("location: index.php");
                } else {
                    var_dump($query);
                    echo "<script>alert('data berhasil ditambah)</script>";
                    echo "error";die;
                }
            }
            
        }
    ?>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-4">
        <div class="container">

            <a class="navbar-brand text-primary" href="#">Provinsi dan Kabupaten</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Provinsi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../kabupaten">Kabupaten</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="news">
        <div class="container">
            <div class="row mb-5">
                <div class="col">
                    <h2>Tambah Berita</h2>
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="index.php" class="btn btn-warning"> <- Kembali</a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="nama" class="col-4 col-md-3">Nama</label>
                                    <div class="col-8 col-md-9">
                                        <input type="text" value="<?= $row['nama'] ?>" class="form-control form-control-sm" name="nama" id="nama" required >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="diresmikan" class="col-4 col-md-3">Diresmikan</label>
                                    <div class="col-8 col-md-9">
                                        <input type="date" value="<?= $row['diresmikan'] ?>" class="form-control form-control-sm" name="diresmikan" id="diresmikan" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="photo" class="col-4 col-md-3">Photo</label>
                                    <div class="col-8 col-md-9">
                                        <input type="file" class="form-control form-control-sm" name="photo" id="photo" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pulau" class="col-4 col-md-3">Pulau</label>
                                    <div class="col-8 col-md-9">
                                        <input type="text" value="<?= $row['nama'] ?>" class="form-control form-control-sm" name="pulau" id="pulau" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <button type="submit" class="btn btn-primary ml-3" name="tambah">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-light p-5 text-center border-top">
        All right copyright 2020 <a href="https://andidev30.github.io">Andi</a>
    </footer>

    <script src="../b4/js/jquery-3.4.1.min.js"></script>
    <script src="../b4/js/popper.min.js"></script>
    <script src="../b4/js/bootstrap.min.js"></script>

</body>

</html>