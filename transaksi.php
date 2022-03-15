<?php

require 'app.php';

$id = $_GET["id"];
$paket = $datapaket[$id];
$harga = $paket[2];

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Transaksi | Car Wash</title>
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

        <!-- BAGIAN INPUT TRANSAKASI -->
        <div class="card m-5 p-4">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3 row">
                            <label for="input1" class="col-sm-2 col-form-label">No. Transaksi</label>
                            <div class="col">
                            <input type="text" class="form-control" id="input1">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input2" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                            <div class="col">
                            <input type="date" class="form-control" id="input2">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input3" class="col-sm-2 col-form-label">Nama Customer</label>
                            <div class="col">
                            <input type="text" class="form-control" id="input3">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input4" class="col-sm-2 col-form-label">Pilihan Paket</label>
                            <div class="col">
                            <input type="text" class="form-control" id="input4" value="<?= $paket[0]?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input5" class="col-sm-2 col-form-label">Harga Paket</label>
                            <div class="col">
                            <input type="text" class="form-control" name="paket" id="input5" value=" <?= number_format($harga, 0, ',', '.') ?> ">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 pt-5">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tambahan" id="flexRadioDefault1" value="0" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Tidak ada Tambahan - Rp.0
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tambahan" id="flexRadioDefault2" value="10000">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Wax - Rp.10.000
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tambahan" id="flexRadioDefault3" value="20000">
                            <label class="form-check-label" for="flexRadioDefault3">
                                Fogging - Rp.20.000
                            </label>
                        </div>
                        <div class="col-auto pt-5">
                            <button type="button" onclick="totalHitung()" class="btn btn-primary">Hitung Total Bayar</button>
                        </div>
                    </div>
                </div>
                </div>
            </form>
        </div>

        
        <!-- BAGIAN INPUT PEMBAYARAN DAN KEMBALIAN -->
        <div class="row">
            <div class="col-6">
                <div class="total px-5">
                    <form action="" method="post">
                    <div class="mb-3 row">
                        <label for="totalHarga" class="col-sm-2 col-form-label">Total Harga</label>
                        <div class="col">
                        <input type="text" class="form-control" id="totalHarga" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pembayaran" class="col-sm-2 col-form-label">Pembayaran</label>
                        <div class="col">
                        <input type="text" class="form-control" id="pembayaran" min="<?php $harga ?>">
                        </div>
                    </div>
                    <div class="mb-3 d-flex">
                        <button class="btn btn-primary justify-content-end" onclick="kembalianHitung()" type="button">Hitung Kembalian</button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-6 px-5">
                <div class="row">
                    <label for="kembalian" class="col-sm-2 col-form-label">Kembalian</label>
                    <div class="col">
                    <input type="text" class="form-control" id="kembalian" name="kembalian">
                    </div>
                </div>
                <!-- MODAL KEMBALI KE HOME -->
                <button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Simpan Transaksi
                </button>

                <!-- MODAL -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content align-middle">
                        <div class="modal-body">
                            <h3 class="text-center fw-bold">
                                Transaksi Berhasil <br>
                                Kembali ke Home
                            </h3>

                            <div class="d-grid gap-2 col-6 mx-auto">
                                <a href="home.php" class="btn btn-primary mt-5 px-5">OK</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

    <script>
        // FUNCTION UNTUK MENGHITUNG JUMLAH HARGA
        function totalHitung() {
            var tambahan = parseInt(document.querySelector('input[name="tambahan"]:checked').value);
            var harga = parseInt(<?= $paket[2] ?>);
            var totalHarga = tambahan + harga;

            document.getElementById('totalHarga').value = totalHarga.toLocaleString();
            return totalHarga;
        }

        // FUNCTION UNTUK MENGHITUNG KEMBALIAN
        function kembalianHitung() {
            var total = totalHitung();
            var pembayaran = document.getElementById('pembayaran').value;
            var kembali = pembayaran - total;

            document.getElementById('kembalian').value = kembali.toLocaleString();
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>