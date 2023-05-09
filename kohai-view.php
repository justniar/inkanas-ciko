<?php
require 'dbcon.php';
$id_kohai = "";
$nama_kohai = "";
$email = "";
$telepon = "";
$alamat = "";
$tingkatan = "";
$kelas = "";
if (isset($_GET['view'])) {
    $id_kohai = $_GET['view'];
    $query = "SELECT * FROM info_kohai WHERE id_kohai='$id_kohai'";
    $sql = mysqli_query($con, $query);
    $kohai = mysqli_fetch_array($sql);
    $nama_kohai = $kohai['nama_kohai'];
    $email = $kohai['email'];
    $telepon = $kohai['telepon'];
    $alamat = $kohai['alamat'];
    $tingkatan = $kohai['tingkatan'];
    $kelas = $kohai['kd_kelas'];
}
?>
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Kohai View</title>
</head>

<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Info Kohai Detail
                            <a href="info-kohai.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name='kodebuku' value="<?php echo $id_kohai ?>">
                        <div class="mb-3">
                            <label>Nama kohai</label>
                            <p class="form-control">
                                <?php echo $nama_kohai; ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <p class="form-control">
                                <?php echo $email; ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Nomor Telepon</label>
                            <p class="form-control">
                                <?php echo $telepon; ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Alamat</label>
                            <p class="form-control">
                                <?php echo $alamat; ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Tingkatan</label>
                            <p class="form-control">
                                <?php echo $tingkatan; ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Kelas</label>
                            <p class="form-control">
                                <?php echo $kelas; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>