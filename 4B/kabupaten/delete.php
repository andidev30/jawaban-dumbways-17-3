<?php 

    include "../config/database.php";

    $id = $_GET['id'];

    $query = " DELETE FROM tb_kabupaten WHERE id = '$id' ";
    $data = mysqli_query($con, $query);

    if($data){
        echo "<script>alert('data berhasil dihapus)</script>";
        header("location: index.php");
    } else {
        echo "<script>alert('data berhasil dihapus)</script>";
        echo "error";die;
    }