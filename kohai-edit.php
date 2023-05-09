<?php
    session_start();
    require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Edit Data Kohai</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data Kohai
                            <a href="info-kohai.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id_kohai']))
                        {
                            $id_kohai = mysqli_real_escape_string($con, $_GET['id_kohai']);
                            $query = "SELECT * FROM info_kohai WHERE id='$id_kohai'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $kohai = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="id_kohai" value="<?= $kohai['id_kohai']; ?>">

                                    <div class="mb-3">
                                        <label>Nama Kohai</label>
                                        <input type="text" name="nama_kohai" value="<?=$kohai['nama_kohai'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" value="<?=$kohai['email'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>No. Telepon</label>
                                        <input type="text" name="telepon" value="<?=$kohai['telepon'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" value="<?=$kohai['alamat'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Tingkatan</label>
                                        <input type="text" name="tingkatan" value="<?=$kohai['tingkatan'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Kelas</label>
                                        <input type="text" name="kelas" value="<?=$kohai['kd_kelas'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_kohai" class="btn btn-primary">
                                            Update kohai
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>