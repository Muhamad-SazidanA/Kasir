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

    .buttonne{
        display: flex;
        justify-content: center;
        padding:30px;
    }

    .table h3{
        display: flex;
        justify-content: center;
    }

    .tablestruck{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 16px;
        margin-left: 10px;
        display: inline;
    }

    .tablestruck th{
        padding :5px;
    }
    </style>
    <header class="atas">
        <h2>313 Ansa Market</h2>
    </header>
    
    <div class="ContainerStruck">
        <div class="Struck">
            <h1>Struk</h1>
                    <h4>313 Ansa Market</h4>
                    <p>Jl. Ketikung Dua, Kecamatan NT <br> Bandar Hati</p>
                    <table class="tablestruck">
                        <tr>
                            <th> Nama Barang </th>
                            <th> Jumlah Barang </th>
                            <th> Harga Semua Barang </th>
                        </tr>
                        <?php
                        session_start();
                        $total_harga = 0;
                        foreach ($_SESSION['Barangbelanja'] as $index => $value) {
                            $total_harga += $value['hargabar'] * $value['jumlahbar'];
                        } 

                        if(isset($_SESSION['Barangbelanja']) > 0){
                            foreach ($_SESSION['Barangbelanja'] as $index => $value) {
                                echo '<tr>';
                                echo '<td>'. $value['namabar'].'  </td>';  
                                echo '<td>'. $value['jumlahbar'].'  </td>';
                                echo '<td>'. number_format($value['hargabar'] * $value['jumlahbar']).'  </td>';
                                echo '</tr>';
                            }
                        }

                        ?>
                    </table>
                    <hr style="border: 1px dashed #000;">
                   
                        <?php      
                        
                        $pembayaran = $_SESSION['bayar'];
                        $kembalian = $_SESSION['kembali'];
                        
                        echo '<p> Total '. number_format($total_harga) . '</p>';
                        echo '<p> Bayar '. number_format($pembayaran) . '</p>';
                        echo '<p> Kembalian '. number_format($kembalian) . '</p>';
                        ?>
                    
                    <hr style="border: 1px dashed #000;">
                    <p>Terima Kasih <br> Atas Kunjungannya</p>
                    <hr style="border: 1px dashed #000;">
        </div>
    </div>
    <div class="buttonne">
        <button type='submit' class='btn btn-danger' name='reset'><a href='loading.php' style='text-decoration: none; color: white;'><i class='bx bx-left-arrow-alt'></i> Reset  </a></button> 
    </div>
</body>
</html>