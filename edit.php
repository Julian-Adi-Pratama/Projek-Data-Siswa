<?php
session_start();

if (isset($_GET['key'])) {
    $key = $_GET['key'];
    if (isset($_SESSION['dataSiswa'][$key])) {
        $siswa = $_SESSION['dataSiswa'][$key];
    }
}
// mengecek jika request method nya selain dari post maka kode tidak akan dijalankan sc:stackoverflow
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($key)) {
    // update data siswa
    $_SESSION['dataSiswa'][$key]['nama'] = $_POST['nama'];
    $_SESSION['dataSiswa'][$key]['nis'] = $_POST['nis'];
    $_SESSION['dataSiswa'][$key]['rayon'] = $_POST['rayon'];

    // kembali ke halaman index
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Home</title>
</head>

<body>
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                <div class="card text-center px-3">
                    <div class="card-body">
                        <h1>Edit Data Siswa</h1>
                        <form method="POST">
                            <div class="col">
                                <div class="row">
                                    <label for="nama">Nama:</label><br>
                                    <input type="text" id="nama" name="nama" class=""
                                        value="<?php echo $siswa['nama']; ?>"><br>
                                    <label for="nis">NIS:</label><br>
                                    <input type="text" id="nis" name="nis" value="<?php echo $siswa['nis']; ?>"><br>
                                    <label for="rayon">Rayon:</label><br>
                                    <input type="text" id="rayon" name="rayon"
                                        value="<?php echo $siswa['rayon']; ?>"><br>
                                </div>
                                <div class="mt-2 col">
                                    <input type="submit" value="Simpan" class="btn btn-success">
                                    <a href="index.php" class="btn btn-warning ">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>