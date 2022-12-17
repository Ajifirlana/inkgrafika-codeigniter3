<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FEE MARKETING | SURAT</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    
    <body>
        <br>
        <center>
            <hr>
            <h1>
                BUAT SURAT FEE MARKETING PER PRIODE
            </h1>
            <hr>
        </center>
        <div class="container col-lg-5">
            <div class="card mt-4">
                <form action="proses.php" method="post">
                    <div class="card-body">
                        <div class="form-group mb-2">
                            <label for="">Tanggal Surat</label>
                            <input type="date" name="tanggal_surat" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">No Surat</label>
                            <input type="text" name="no_surat" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Bulan</label>
                            <input type="text" name="bulan" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Tahun</label>
                            <input type="text" name="tahun" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">YTH UP</label>
                            <input type="text" name="yth_up" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Ter Tanggal</label>
                            <input type="date" name="ter_tanggal" class="form-control">
                        </div> 
                        <div class="form-group mb-2">
                            <label for="">Priode Bulan</label>
                            <input type="text" name="priode_bulan" class="form-control">
                        </div> 
                        <div class="form-group mb-2">
                            <button type="submit" class="btn btn-success">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
    </html>