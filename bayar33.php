<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Kasir</title>
</head>
<body>
    <header class="atas">
        <h2>313 Ansa Market</h2>
    </header>
    <div class="container">
        <div class="Inputan">
            <h3>Data Belanja</h3>
            <table class="table table-bordered">
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Harga Semua Barang</th>     
                </tr>
                <?php
                session_start();
                $total_harga = 0;
                foreach ($_SESSION['Barangbelanja'] as $index => $value) {
                    $total_harga += $value['hargabar'] * $value['jumlahbar'];
                }

                if (isset($_POST['bayar'])) {
                    $_SESSION['bayar'] = $_POST['bayar'];
                    if ($_SESSION['bayar'] < $total_harga) {
                        echo "<div class='alert alert-danger' role='alert'>Uang anda kurang !</div>";
                    } else {
                        $_SESSION['kembali'] = ($_SESSION['bayar'] - $total_harga) ;
                        header('struck.php');
                        exit;
                    }
                }

                if(isset($_SESSION['Barangbelanja']) > 0){
                    foreach ($_SESSION['Barangbelanja'] as $index => $value) {
                        echo '<tr>';
                        echo '<td>'. $value['namabar'].'</td>';  
                        echo '<td>'. $value['jumlahbar'].'</td>';
                        echo '<td>'. 'Rp. '. number_format($value['hargabar'] * $value['jumlahbar']).'</td>';
                        echo '</tr>';
                    }
                    echo '<td colspan="2">Total Harga</td>';
                    echo '<td>'. 'Rp. '. number_format($total_harga).'</td>';
                    echo '</table>';
                
                    echo "<form action='' method='post' class='mt-3'>";
                    echo "<label for='bayar' class='form-label'>Jumlah Pembayaran:</label>";
                    echo "<input type='number' class='form-control' id='bayar' name='bayar' ><br>";
                    echo "<div class='buttonne'>";
                    echo "<div class='buttonne22'>";
                    echo "<button type='submit' class='btn btn-primary'><a href='index.php' style='text-decoration: none; color: white;'><i class='bx bx-left-arrow-alt'></i> Kembali  </a></button>";
                    echo "</div>";
                    echo "<button type='submit' class='btn btn-secondary'><a href='struck.php' style='text-decoration: none; color: white;'><i class='bx bxs-printer'></i>Bayar&Cetak Struck</a></button>";
                    echo "</div>";
                }
                ?>
            </table>
        </div>
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
            display: flex;
            justify-content: center;
        }
        
        .buttonne22{
            margin-right:10px;
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
    </style>
</body>
</html>
