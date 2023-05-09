<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_kohai']))
{
    $id_kohai = mysqli_real_escape_string($con, $_POST['delete_kohai']);

    $query = "DELETE FROM info_kohai WHERE id='$id_kohai' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "kohai Deleted Successfully";
        header("Location: info-kohai.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "kohai Not Deleted";
        header("Location: info-kohai.php");
        exit(0);
    }
}

if(isset($_POST['update_kohai']))
{
    $id_kohai = mysqli_real_escape_string($con, $_POST['id_kohai']);

    $name = mysqli_real_escape_string($con, $_POST['nama_kohai']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['telepon']);
    $alamat = mysqli_real_escape_string($con, $_POST['alamat']);
    $tingkatan = mysqli_real_escape_string($con, $_POST['tingkatan']);
    $kelas = mysqli_real_escape_string($con, $_POST['kd_kelas']);

    $query = "UPDATE info_kohai SET nama_kohai='$name', email='$email', elepone='$phone', alamat='$alamat', tingkatan='$tingkatan', kd_kelas='$kelas' WHERE id='$id_kohai' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Info Kohai Updated Successfully";
        header("Location: info-kohai.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Info kohai Not Updated";
        header("Location: info-kohai.php");
        exit(0);
    }

}


if(isset($_POST['save_kohai']))
{
    $name = mysqli_real_escape_string($con, $_POST['nama_kohai']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['telepon']);
    $alamat = mysqli_real_escape_string($con, $_POST['alamat']);
    $tingkatan = mysqli_real_escape_string($con, $_POST['tingkatan']);
    $kelas = mysqli_real_escape_string($con, $_POST['kd_kelas']);

    $query = "INSERT INTO info_kohai(nama_kohai,email,telepon,alamat,tingkatan,kd_kelas) VALUES ('$name','$email','$phone','$alamat','$tingkatan','$kelas')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "kohai Created Successfully";
        header("Location: kohai-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "kohai Not Created";
        header("Location: kohai-create.php");
        exit(0);
    }
}

?>