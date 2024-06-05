<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Stylekas.css">
    <title>Kasir Ansa Grosir</title>
</head>
<body>
    <header class="atas">
        <h2>313 Ansa Market</h2>
    </header>
    <div class="container">
        <div class="Inputan">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="">
                <h1><b>Kasir</b></h1>
                <div class="">
                    <label for="namabar" class="form-label">Nama Barang :</label>
                    <input type="text" name="namabar" id="namabar" class="form-control" required>
                </div>
                <div class="">
                    <label for="hargabar" class="form-label">Harga Barang :</label>
                    <input type="number" name="hargabar" id="hargabar" class="form-control" min="0" max="100000000" required>
                </div>
                <div class="">
                    <label for="jumlahbar" class="form-label">Jumlah Barang :</label>
                    <input type="number" name="jumlahbar" id="jumlahbar" class="form-control" min="0" max="1000" required>
                </div>
                <div class="buttonne">
                    <button type="submit" class="btn btn-primary mt-3" name="kirim"><i class='bx bx-plus'></i> Tambah Data</button>
                </div>
                <br>
                <br>
            </form>
        </div>
    </div>
    <div class="FormBarang"> 
        <?php
        session_start();
        
        if(!isset($_SESSION['Barangbelanja'])){
            $_SESSION['Barangbelanja'] = array();
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['kirim'])) {
            if (!empty($_POST['namabar']) && !empty($_POST['hargabar']) && !empty($_POST['jumlahbar'])) {
                $data = array(
                    'namabar' => $_POST['namabar'],
                    'hargabar' => $_POST['hargabar'],
                    'jumlahbar' => $_POST['jumlahbar'],
                );
                array_push($_SESSION['Barangbelanja'], $data);
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            } else {
                echo "<p class='text-danger'>Semua data harus diisi!</p>";
            }
        }

        if (isset($_GET['hapus'])) {
            $index = $_GET['hapus'];
            unset($_SESSION['Barangbelanja'][$index]);
            header("Location: index.php");
            exit();
        }
        
        if(!empty($_SESSION['Barangbelanja'])){
            echo '<div class="ContainerStruck">';
            echo '<div class="Struck">';
            echo '<h3>Data Belanja</h3>';
            echo '<table class="table table-bordered">';
            echo '<tr>';
            echo '<th>Nama Barang</th>';
            echo '<th>Harga Barang</th>';
            echo '<th>Jumlah Barang</th>';
            echo '<th>Action</th>';
            echo '</tr>';
            
            foreach ($_SESSION['Barangbelanja'] as $index => $value) {
                echo '<tr>';
                echo '<td>'. $value['namabar'] .'</td>';
                echo '<td>'.'Rp. '. number_format($value['hargabar']).'</td>';
                echo '<td>'. $value['jumlahbar'] .'</td>';
                echo '<td><a href="?hapus='.$index.'" class="btn btn-danger btn-sm">Hapus</a></td>';
                echo '</tr>';
            } 
            echo '</table>';
            echo '</div>';
            echo '</div>';
            echo '<div class="buttonne">';
            echo '<button type="button" class="btn btn-secondary mt-3"><a href="bayar33.php" style="text-decoration: none; color: white;"><i class="bx bx-cart"></i> Bayar</a></button>';
            echo '</div>';
        }
        ?>
    </div>
    <style>
        *{
            margin:0;
            padding: 0;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            background: #e4e9f7;
        }

        .atas {
            display: flex;
            justify-content: center;
            background-color: rgba(76,68,182,0.808);
            color: white;
            border-radius: 0 0 20px 20px;
            margin: 0 48px;
            padding: 15px 24px;
        }

        .container{
            width: 700px;
            height: auto;
            background: #d4d8e5;
            margin-top: 40px;
            border:3px solid #fff;
            border-radius: 8px;
        }

        .Inputan h1{
            text-align: center;
            padding: 10px;
        }

        .buttonne{
            text-align: center;
            padding : 10px;
        }

        .Inputan{
            padding: 25px;
        }

        .table h3{
            display: flex;
            justify-content: center;
        }

        .table{
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            font-size: 10pt;
            border: 1px solid #000;
        }

        .ContainerStruck{
            width: 500px;
            height: auto;
            background: #d4d8e5;
            border:1px solid #000;
            text-align: center;
            margin: auto;
            margin-top: 50px;
        }

        .Struck{
            padding: 30px;
            text-align: center;
        }
    </style>
</body>
</html>
