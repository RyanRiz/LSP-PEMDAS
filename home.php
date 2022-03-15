<?php

require 'app.php';

$_SESSION['pilihan'] = $datapaket;

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Landing | Car Wash</title>
  </head>
  <body>
      <div class="container">
          <!-- BAGIAN NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded-3">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active px-5" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#">Transaksi</a>
                </div>
                <div class="navbar-nav">
                    <a class="nav-link" href="logout.php">Logout</a>
                </div>
                </div>
            </div>
        </nav>

        <!-- BAGIAN BANNER -->
        <div class="jumbotron pt-4">
            <img src="banner.jpg" class="rounded-3" height="529">
        </div>

        <!-- BAGIAN DAFTAR -->
        <div class="daftar pt-3">
            <!-- BAGIAN TITLE DAFTAR -->
            <h2>Daftar Paket Pencucian Mobil</h2>

            <!-- BAGIAN ROW DAFTAR -->
            <div class="row pt-2">
                <?php foreach (array_values($datapaket) as $i => $data) : ?>
                <div class="col">
                    <div class="card py-3">
                        <div class="card-body">
                            <h3><?=$data[0]?></h3>
                            <p><?=$data[1]?> </p>
                            <div class="card-subtitle">Rp. <?=$data[2]?></div>
                        </div>
                    </div>
                    <div class="pilih pt-4">
                        <a class="btn btn-primary d-grid" href="transaksi.php?id=<?= $i ?>" role="button">Pilih Paket</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- BAGIAN FOOTER -->
        <footer class="bg-dark text-center text-white py-4 mt-5">
            <h5>@Copyright Ryan Rizky Pratama</h5>
        </footer>

      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>