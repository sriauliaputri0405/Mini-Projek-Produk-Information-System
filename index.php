<?php
// index.php - Presentation Layer

// Merajut berkas Data dan Processing Layer
require_once 'products.php';
require_once 'functions.php';

// Menghitung total aset gudang
$totalAset = hitungTotalNilaiStok($products);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Information System</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        
        /* Gaya CSS untuk menandai baris stok kritis (< 3) */
        .stok-kritis { 
            background-color: #ffcccc; 
            color: #900000; 
            font-weight: bold; 
        }
    </style>
</head>
<body>

    <h2>Sistem Informasi Produk</h2>
    <p><strong>Total Nilai Aset Gudang:</strong> Rp <?= number_format($totalAset, 0, ',', '.'); ?></p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $item): ?>
                <?php $kelasCSS = cekStokKritis($item['stok']); ?>
                <tr class="<?= $kelasCSS; ?>">
                    <td><?= $item['id']; ?></td>
                    <td><?= $item['nama']; ?></td>
                    <td><?= $item['kategori']; ?></td>
                    <td>Rp <?= number_format($item['harga'], 0, ',', '.'); ?></td>
                    <td><?= $item['stok']; ?></td>
                    <td><?= $item['deskripsi']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>