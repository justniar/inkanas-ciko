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

    <title>INFO KOHAI</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Info Kohai
                            <a href="kohai-create.php" class="btn btn-primary float-end">Tambahkan Kohai</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID Kohai</th>
                                    <th>Nama Kohai</th>
                                    <th>Tingkatan</th>
                                    <th>Kelas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT info_kohai.id_kohai, info_kohai.nama_kohai, sabuk.tingkatan, kelas.kd_kelas FROM info_kohai,sabuk,kelas WHERE info_kohai.tingkatan=sabuk.tingkatan and info_kohai.kd_kelas=kelas.kd_kelas";
                                    $query_run = mysqli_query($con, $query);
                                    if (!$query_run) {
                                        echo "Query failed: ". mysqli_error($con);
                                    }
                                    $query_run = mysqli_query($con, $query);
                                    #if (!$query_run || mysqli_num_rows($query_run) == 0)
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $kohai)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $kohai['id_kohai']; ?></td>
                                                <td><?= $kohai['nama_kohai']; ?></td>
                                                <td><?= $kohai['tingkatan']; ?></td>
                                                <td><?= $kohai['kd_kelas']; ?></td>
                                                <td>
                                                    <a href="kohai-view.php?id=<?= $kohai['id_kohai']; ?>" class="btn btn-outline-info btn-sm">View</a>
                                                    <a href="kohai-edit.php?id=<?= $kohai['id_kohai']; ?>" class="btn btn-outline-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_kohai" value="<?=$kohai['id_kohai'];?>" class="btn btn-outline-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>