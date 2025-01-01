<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "akademik";

    $koneksi = mysqli_connect($host, $user, $pass, $db);

    $nim = "";
    $nama = "";
    $prodi = "";
    $fakultas = "";
    $sukses = "";
    $error = "";

    if(isset($_GET['op'])) {
        $op = $_GET[ 'op'];
    }else {
        $op = "";
    }

    if($op == 'delete'){
        $id     = $_GET['id'];
        $sql1   = "delete from mahasiswa where id = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
        if($q1){
            $sukses = "Berhasil hapus data";
        }else{
            $error = "Penghapusan Data Dibatalkan";
        }
    }

    if($op == 'edit'){
        $id = $_GET[ 'id'] ;
        $sqli = "select * from mahasiswa where id = '$id'";
        $q1 = mysqli_query($koneksi,$sqli);
        $r1 = mysqli_fetch_array($q1);
        $nim = $r1['nim'];
        $nama  = $r1['nama'];
        $prodi   = $r1['prodi'];
        $fakultas  = $r1['fakultas'];

        if($nim == ''){
            $error = "Data tidak ditemukan";
        }

    }
    if(isset($_POST['simpan'])) {
        $nim  =$_POST['nim'];
        $nama =$_POST['nama'];
        $prodi =$_POST['prodi'];
        $fakultas=$_POST['fakultas'];

        if($nim && $nama && $prodi && $fakultas){
            if($op == 'edit'){
                $sql1   = "update mahasiswa set nim = '$nim', nama = '$nama', prodi = '$prodi', fakultas = '$fakultas' where id = '$id'";
                $q1     = mysqli_query($koneksi, $sql1);
                if($q1) {
                    $sukses = "Data berhasil diupdate";

                }else {
                    $sql1 = "insert into mahasiswa (nim,nama,prodi,fakultas) values ('$nim', '$nama', '$prodi', '$fakultas')";
                    $q1 = mysqli_query($koneksi, $sql1);
                    if($q1) {
                        $sukses = "Berhasil";
                    }else {
                        $error = "Gagal";
                    }
                    $error = "Data gagal diupdate";
                }

            }
            

        }else{
            $error = "Masukkan semua data dengan benar";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px;
        }
        .card {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div style="text-align: center;">
    <img src="https://github.com/baguseri054/ToolTID/blob/main/udayanamart.png?raw=true" alt="Udayana Mart" height="250" width="250">
    </br><a href="about.php">Kembali ke halaman About</a> </style>
    <a href="dashboard.php">Kembali ke Dashboard</a>
    </div>

    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if($error) {
                ?>
                     <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($sukses) {
                ?>
                     <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama"value="<?php echo $nama; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="prodi" class="col-sm-2 col-form-label">Program Studi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prodi" name="prodi"value="<?php echo $prodi; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="fakultas" name="fakultas">
                                <option value="">- Pilih Fakultas -</option>
                                <option value="Ilmu Budaya" <?php if($fakultas == "Ilmu Budaya") echo "Selected"?>>Ilmu Budaya</option>
                                <option value="Kedokteran" <?php if($fakultas == "Kedokteran") echo "Selected"?>>Kedokteran</option>
                                <option value="Hukum" <?php if($fakultas == "Hukum") echo "Selected"?>>Hukum</option>
                                <option value="Teknik" <?php if($fakultas == "Teknik") echo "Selected"?>>Teknik</option>
                                <option value="Pertanian" <?php if($fakultas == "Pertanian") echo "Selected"?>>Pertanian</option>
                                <option value="Ekonomi dan Bisnis" <?php if($fakultas == "Ekonomi dan Bisnis") echo "Selected"?>>Ekonomi dan Bisnis</option>
                                <option value="Peternakan" <?php if($fakultas == "Peternakan") echo "Selected"?>>Peternakan</option>
                                <option value="Matematika & Ilmu Pengetahuan Alam" <?php if($fakultas == "Matematika & Ilmu Pengetahuan Alam") echo "Selected"?>>Matematika & Ilmu Pengetahuan Alam</option>
                                <option value="Kedokteran Hewan" <?php if($fakultas == "Kedokteran Hewan") echo "Selected"?>>Kedokteran Hewan</option>
                                <option value="Teknologi Pertanian" <?php if($fakultas == " Teknologi Pertanian") echo "Selected"?>>Teknologi Pertnanian</option>
                                <option value="Pariwisata" <?php if($fakultas == "Pariwisata") echo "Selected"?>>Pariwisata</option>
                                <option value="Ilmu Sosial Ilmu Politik" <?php if($fakultas == "Ilmu Sosial Ilmu Politik") echo "Selected"?>>Ilmu Sosial Ilmu Politik</option>
                                <option value="Kelautan dan Perikanan" <?php if($fakultas == "Kelautan dan Perikanan") echo "Selected"?>>Kelautan dan perikanan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="simpan data" class="btn btn-warning">
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Fakultas</th>
                    <th scope="col">Aksi</th>
            </tr>
            <tbody>
                <?php
                $sql2 = "select * from mahasiswa order by id desc";
                $q2 = mysqli_query($koneksi,$sql2);
                $urut = 1;
                while($r2 = mysqli_fetch_array($q2)){
                    $id  = $r2['id'];
                    $nim     = $r2['nim'];
                    $nama     = $r2['nama'];
                    $prodi   = $r2['prodi'];
                    $fakultas    = $r2['fakultas'];

                    ?>
                    <tr>
                        <th scope="row"><?php echo $urut++ ?></th>
                        <td scope="row"><?php echo $nim ?></td>
                        <td scope="row"><?php echo $nama ?></td>
                        <td scope="row"><?php echo $prodi ?></td>
                        <td scope="row"><?php echo $fakultas ?></td>
                        <td scope="row">
                        <a href="local.php?op=edit&id=<?php echo $id?>"><button type="button" class="btn btn-primary">Edit</button></a>
                        <a href="local.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Apakah anda yakin?')"><button type="button" class="btn btn-warning">Delete</button></a>
                        </td>
                     </tr>
                <?php
                }
                ?>
            </tbody>
            </thead>
            </table>
            </div>
        </div>
    </div>

    <?php include "Layout/footer.html" ?>
</body>
</html>