<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Me Dumb</title>

    <!-- link bootstrap -->
    <link rel="stylesheet" href="b4/css/bootstrap.min.css">
    <link rel="stylesheet" href="b4/css/style.css">
</head>

<?php
    include "config/database.php";

    $id = $_GET['id'];

    $query = " SELECT * FROM tb_kabupaten WHERE tb_kabupaten.provinsi_id = '$id' ";
    $data = mysqli_query($con, $query);

        $query = " SELECT * FROM tb_provinsi WHERE id = '$id' ";
        $data2 = mysqli_query($con, $query);
        $provinsi = mysqli_fetch_assoc($data2);
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
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="provinsi">Provinsi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kabupaten">Kabupaten</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <H2>Detail Provinsi <?= $provinsi['nama'] ?></H2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <img src="provinsi/photo/<?= $provinsi['photo'] ?>" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Diresmikan
            </div>
            <div class="col-md-8">
                <?= $provinsi['diresmikan'] ?> 
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Pulau
            </div>
            <div class="col-md-8">
                <?= $provinsi['pulau'] ?> 
            </div>
        </div>
    </div>

    <section class="provinsi mt-4">
        <div class="container">
            <div class="row">
                <div class="col mb-4">
                    <h2 class="ml-4">Kabupaten</h2>
                </div>
            </div>
            <div class="row">
                <?php while($rows = mysqli_fetch_assoc($data)) { ?>
                <div class="col-6 col-md-3 mb-4">
                    <div class="card p-3">
                        <img class="card-img-top" src="kabupaten/photo/<?= $rows['photo'] ?>" alt="">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?= $rows['nama'] ?></h5>
                            <p class="card-text text-center pb-0 mb-0 text-muted"><?= $rows['diresmikan'] ?></p>
                        </div>
                    </div>
                    <a href="detail.php?id=<?php echo $rows['id'] ?>" class="btn btn-primary btn-block mt-3">Detail</a>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <footer class="bg-light p-5 text-center border-top">
        All right copyright 2020 <a href="https://andidev30.github.io">Andi</a>
    </footer>

    <script src="b4/js/jquery-3.4.1.min.js"></script>
    <script src="b4/js/popper.min.js"></script>
    <script src="b4/js/bootstrap.min.js"></script>

</body>

</html>