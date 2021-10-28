<?php
    // Koneksi ke database
    $server = "localhost";
    $user   = "root";
    $pass   = "";
    $db     = "test";

    $koneksi= mysqli_connect($server, $user, $pass, $db) or die (mysqli_error($koneksi));

    // Jika tombol simpan di klik
    if(isset($_POST['bsimpan'])){
        // Apakah data akan diedit atau disimpan baru
        if($_GET['hal'] == 'edit'){
            // Data akan diedit
            $edit = mysqli_query($koneksi, "UPDATE tprajurit SET
                                            nim = '$_POST[tnim]',
                                            nama = '$_POST[tnama]',
                                            alamat = '$_POST[talamat]',
                                            prodi = '$_POST[tprodi]'
                                            WHERE id_mhs = '$_GET[id]'
                                            ");
            
            if($edit){
                echo"<script>
                        alert('Edit Data Success!!!');
                        document.location='index.php';
                    </script>";
            }else{
                echo"<script>
                        alert('Edit Data Gagal!!!');
                        document.location='index.php';
                    </script>";
            }
        }else{
            // Data akan disimpan sebagai data baru
            $simpan = mysqli_query($koneksi, "INSERT INTO tprajurit (nim, nama, alamat, prodi)
                                            VALUES ('$_POST[tnim]', '$_POST[tnama]', '$_POST[talamat]', '$_POST[tprodi]')
                                            ");
            
            if($simpan){
                echo"<script>
                        alert('Simpan Data Success!!!');
                        document.location='index.php';
                    </script>";
            }else{
                echo"<script>
                        alert('Simpan Data Gagal!!!');
                        document.location='index.php';
                    </script>";
            }  
        }
    }

    // Pengujian jika tombol edit /hapus di klik
    if(isset($_GET['hal'])){
        // Pengujian jika edit data
        if(@$_GET['hal'] == "edit"){
            // Tampilkan data yang akan diedit
            $tampil = mysqli_query($koneksi, "SELECT * FROM tprajurit WHERE id_mhs = '$_GET[id]'");
            $data   = mysqli_fetch_array($tampil);
            if($data){
                $vnim = $data['nim'];
                $vnama = $data['nama'];
                $valamat = $data['alamat'];
                $vprodi = $data['prodi'];
            }
        }else if(@$_GET['hal'] == "hapus"){
            // Persiapan hapus data
            $hapus = mysqli_query($koneksi, "DELETE FROM tprajurit WHERE id_mhs = '$_GET[id]'");
            if($hapus){
                echo"<script>
                        alert('Data telah dihapus');
                        document.location='index.php';
                    </script>";
            }else{
                echo"<script>
                        alert('Data gagal dihapus');
                        document.location='index.php';
                    </script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Prajurit</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Sistem Informasi Prajurit</h1>
        <h2 class="text-center">by Jonathan Parhusip</h2>

        <!-- Awal card form -->
        <div class="card mt-3">
            <div class="card-header bg-primary text-white">
                Form Input Data Prajurit
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label>NIM</label>
                        <input type="text" name="tnim" value="<?=@$vnim?>" class="form-control" placeholder="Input NIM anda disini" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="tnama" value="<?=@$vnama?>"class="form-control" placeholder="Input nama anda disini" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="talamat" class="form-control" placeholder="Input alamat anda disini"><?=@$valamat?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Program Studi</label>
                        <select name="tprodi" class="form-control">
                            <option value="<?=@$vprodi?>"><?=@$vprodi?></option>
                            <option value="D3 - MI">D3 - MI</option>
                            <option value="S1 - SI">S1 - SI</option>
                            <option value="S1 - TI">S1 - TI</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
                    <button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

                </form>
            </div>
        </div>
        <!-- Akhir card form -->

        
        <!-- Awal card tabel -->
        <div class="card mt-3">
            <div class="card-header bg-success text-white">
                Daftar Data Prajurit
            </div>
            <div class="card-body">

                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No.</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Program Studi</th>
                        <th>Action</th>
                    </tr>

                    <?php
                        $no     = 1;
                        $tampil = mysqli_query($koneksi, "SELECT * FROM tprajurit ORDER BY id_mhs DESC");
                        while($data = mysqli_fetch_array($tampil)):

                    ?>

                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$data['nim']?></td>
                        <td><?=$data['nama']?></td>
                        <td><?=$data['alamat']?></td>
                        <td><?=$data['prodi']?></td>
                        <td>
                            <a href="index.php?hal=edit&id=<?=$data['id_mhs']?>" class="btn btn-warning">Edit</a>
                            <a href="index.php?hal=hapus&id=<?=$data['id_mhs']?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php
                        endwhile; // penutup perulangan
                    ?>
                </table>

            </div>
        </div>
        <!-- Akhir card tabel -->
    </div>

<script src="js/bootstrap.min.js"></script>
</body>
</html>