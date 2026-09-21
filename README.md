# Mini-Projek-Produk-Information-System
# Sistem Informasi Produk

##  Deskripsi

Sistem Informasi Produk merupakan program sederhana berbasis PHP yang digunakan untuk menyimpan, mengolah, dan menampilkan data produk. Sistem ini menggunakan konsep pemisahan menjadi tiga bagian, yaitu **Data Layer, Processing Layer, dan Presentation Layer**.

##  Struktur File

```text
project/
│
├── products.php
├── functions.php
├── index.php
└── README.md
```

### 1. `products.php` – Data Layer

File ini digunakan untuk menyimpan data produk dalam bentuk array.

Data yang disimpan meliputi:

* ID produk
* Nama produk
* Kategori
* Harga
* Stok
* Deskripsi

Contoh data yang terdapat di dalam sistem:

* Beras Premium 5kg
* Minyak Goreng 2L
* Gula Pasir 1kg
* Tepung Terigu 1kg

File ini berfungsi sebagai **sumber data** yang nantinya akan digunakan oleh file lainnya.

---

### 2. `functions.php` – Processing Layer

File ini berisi fungsi-fungsi untuk mengolah data dari `products.php`.

Terdapat dua fungsi utama:

#### `hitungTotalNilaiStok()`

Digunakan untuk menghitung total nilai stok seluruh produk.

Rumus yang digunakan:

```text
Harga × Stok
```

Kemudian hasil dari setiap produk dijumlahkan.

Dari data yang tersedia:

```text
Beras       = 65.000 × 10 = 650.000
Minyak      = 34.000 × 2  = 68.000
Gula        = 15.000 × 1  = 15.000
Tepung      = 12.000 × 8  = 96.000
```

Total nilai aset gudang:

```text
Rp829.000
```

#### `cekStokKritis()`

Digunakan untuk mengecek jumlah stok produk.

Jika:

```text
stok < 3
```

maka sistem memberikan class:

```text
stok-kritis
```

Class tersebut digunakan oleh CSS untuk memberikan tanda pada produk yang stoknya kritis.

---

### 3. `index.php` – Presentation Layer

File `index.php` merupakan bagian yang menampilkan hasil data kepada pengguna.

Pertama, file ini memanggil:

```php
require_once 'products.php';
require_once 'functions.php';
```

Artinya, `index.php` mengambil data dari `products.php` dan fungsi dari `functions.php`.

Selanjutnya sistem menghitung total aset:

```php
$totalAset = hitungTotalNilaiStok($products);
```

Setelah itu, data produk ditampilkan dalam bentuk tabel.

Setiap produk diperiksa menggunakan:

```php
$kelasCSS = cekStokKritis($item['stok']);
```

Jika stok kurang dari 3, baris produk akan menggunakan class `stok-kritis` sehingga tampil dengan warna khusus.

---

##  Alur Sistem

Alur kerja program secara sederhana:

```text
products.php
     │
     │ Data Produk
     ↓
functions.php
     │
     │ Mengolah Data
     │ - Menghitung total aset
     │ - Mengecek stok kritis
     ↓
index.php
     │
     │ Menampilkan hasil
     ↓
Tampilan Sistem Informasi Produk
```

##  Hasil Akhir

Saat `index.php` dijalankan, sistem akan menampilkan:

1. Judul **Sistem Informasi Produk**
2. Total nilai aset gudang sebesar **Rp829.000**
3. Tabel seluruh produk
4. Harga setiap produk dalam format Rupiah
5. Produk dengan stok kurang dari 3 akan ditandai sebagai **stok kritis**

Produk yang memiliki stok kritis:

| Produk           | Stok |
| ---------------- | ---: |
| Minyak Goreng 2L |    2 |
| Gula Pasir 1kg   |    1 |

##  Kesimpulan

Program ini menerapkan pemisahan fungsi berdasarkan tugasnya:

* **Data Layer (`products.php`)** → menyimpan data.
* **Processing Layer (`functions.php`)** → memproses data.
* **Presentation Layer (`index.php`)** → menampilkan data dan hasil proses.

Dengan pemisahan ini, kode menjadi lebih **terstruktur dan mudah dikelola**, karena bagian penyimpanan data, proses, dan tampilan tidak dicampur menjadi satu file.
