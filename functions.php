<?php
// functions.php - Processing Layer

/**
 * Mengalkulasi total nilai aset produk di gudang (Harga x Stok)
 */
function hitungTotalNilaiStok($products) {
    $totalNilai = 0;
    foreach ($products as $item) {
        $totalNilai += ($item['harga'] * $item['stok']);
    }
    return $totalNilai;
}

/**
 * Menyaring stok kritis dan mengembalikan nama kelas CSS
 */
function cekStokKritis($stok) {
    if ($stok < 3) {
        return "stok-kritis"; // Nama class CSS untuk warna merah
    }
    return "";
}