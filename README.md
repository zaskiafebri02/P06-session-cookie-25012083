# Praktikum Pemrograman Web I - Pertemuan 6

## Identitas

Nama: ZASKIA FEBRIANI NOER
NIM: 25012083
Kelas: 25M31

## Judul

Session, Cookie, Flash Message, dan GitHub

## Deskripsi

Program ini merupakan aplikasi keranjang belanja sederhana
menggunakan PHP tanpa database.

Program menggunakan:
- Session untuk menyimpan keranjang.
- Cookie untuk menyimpan pilihan tema.
- Flash message untuk memberikan informasi setelah proses.
- Git dan GitHub untuk mencatat perkembangan program.

## Fitur

1. Menampilkan katalog produk.
2. Menambahkan produk ke keranjang.
3. Menampilkan jumlah produk.
4. Menghapus produk dari keranjang.
5. Mengosongkan keranjang.
6. Menampilkan total harga.
7. Mengubah tema Light/Dark.
8. Menyimpan tema menggunakan cookie.
9. Validasi input.
10. Escape output menggunakan htmlspecialchars().

## Cara Menjalankan

1. Simpan folder pertemuan-06 di dalam:

C:\xampp\htdocs\

2. Jalankan Apache melalui XAMPP.

3. Buka browser.

4. Masukkan:

http://localhost/pertemuan-06/

## Pengujian

### 1. Membuka katalog

Hasil:
Katalog produk berhasil ditampilkan.

### 2. Menambah produk

Hasil:
Produk berhasil masuk ke keranjang.

### 3. Menambah produk yang sama

Hasil:
Jumlah produk bertambah.

### 4. Membuka keranjang

Hasil:
Nama produk, harga, jumlah, subtotal, dan total ditampilkan.

### 5. Menghapus produk

Hasil:
Produk berhasil dihapus dari keranjang.

### 6. Mengosongkan keranjang

Hasil:
Semua produk berhasil dihapus.

### 7. Menggunakan ID produk tidak valid

Hasil:
Permintaan ditolak dan tidak menyebabkan error.

### 8. Membuka actions.php dengan GET

Hasil:
Halaman diarahkan kembali ke index.php.

### 9. Mengubah tema

Hasil:
Tema Light dan Dark dapat digunakan.

### 10. Refresh halaman setelah flash message

Hasil:
Flash message tidak muncul kembali.

## Git Commit

1. docs: inisialisasi proyek dan petunjuk praktikum
2. feat: tambahkan bootstrap session
3. feat: tambahkan dataset dan fungsi bantuan
4. feat: tampilkan katalog produk
5. feat: proses tambah produk ke session
6. feat: tampilkan ringkasan keranjang
7. feat: tambahkan hapus item dan kosongkan keranjang
8. feat: simpan preferensi tema dalam cookie
9. fix: tangani input tidak valid dan escape output
10. docs: lengkapi README dan bukti pengujian
