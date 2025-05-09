# TP9DPBO2025C1

## Janji

Saya Muhammad Helmi Rahmadi dengan NIM 2311574 mengerjakan soal TP 9 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Deskripsi 

Tugas praktikum yang mengimplementasikan pola desain MVP (Model-View-Presenter) untuk membuat pengelolaan data mahasiswa dengan fitur CRUD lengkap. Data mahasiswa mencakup informasi seperti NIM, nama, tempat lahir, tanggal lahir, gender, email, dan telepon.

## Desain Program

### Pola Desain MVP (Model-View-Presenter)

Proyek ini menggunakan pola desain MVP yang memisahkan komponen menjadi tiga bagian utama:

1. **Model**: Bertanggung jawab untuk mengelola data dan logika bisnis.
   - `DB.class.php`: Menangani koneksi dan operasi database
   - `Mahasiswa.class.php`: Representasi objek mahasiswa
   - `TabelMahasiswa.class.php`: Operasi database terkait mahasiswa

2. **View**: Bertanggung jawab untuk menampilkan data ke pengguna.
   - `form.php`: Form untuk menambah/mengedit data mahasiswa
   - `TampilMahasiswa.php`: Menampilkan tabel data mahasiswa
   - `skin.html`: Template HTML untuk tampilan

3. **Presenter**: Bertindak sebagai perantara antara Model dan View.
   - `ProsesMahasiswa.php`: Mengolah data dari Model untuk ditampilkan di View

### Diagram Struktur Database

<img src="https://github.com/user-attachments/assets/6f358b4d-7fb8-4b1c-a184-917fdb242b6e" alt="Diagram Database" width="200"/>


### Alur Program

1. **Tampilan Utama**:
   - Menampilkan tabel data mahasiswa dari database
   - Terdapat opsi untuk menambah, mengedit, dan menghapus data

2. **Tambah Data**:
   - Pengguna mengklik tombol Tambah
   - Form input data mahasiswa ditampilkan
   - Pengguna mengisi data dan mengklik Submit
   - Data disimpan ke database dan tampilan diperbarui

3. **Edit Data**:
   - Pengguna mengklik tombol Edit pada baris yang ingin diubah
   - Form dengan data yang sudah terisi ditampilkan
   - Pengguna mengubah data dan mengklik Submit
   - Data diperbarui di database dan tampilan diperbarui

4. **Hapus Data**:
   - Pengguna mengklik tombol Hapus pada baris yang ingin dihapus
   - Konfirmasi penghapusan ditampilkan
   - Jika dikonfirmasi, data dihapus dari database dan tampilan diperbarui

## Implementasi Fitur CRUD

### 1. CREATE
Fitur untuk menambahkan data mahasiswa baru ke database:
- Form input data mahasiswa
- Validasi data input
- Penyimpanan data ke database

### 2. READ
Fitur untuk menampilkan data mahasiswa dari database:
- Mengambil seluruh data mahasiswa
- Menampilkan data dalam bentuk tabel
- Menampilkan detail data mahasiswa

### 3. UPDATE
Fitur untuk memperbarui data mahasiswa yang sudah ada:
- Form edit data mahasiswa
- Validasi data input
- Pembaruan data di database

### 4. DELETE
Fitur untuk menghapus data mahasiswa dari database:
- Konfirmasi penghapusan
- Penghapusan data dari database

## Alur Kerja Kode

1. `index.php` memulai web
2. `TampilMahasiswa.php` dipanggil untuk menampilkan data
3. `ProsesMahasiswa.php` memproses data dari Model
4. `TabelMahasiswa.class.php` mengambil data dari database
5. Data ditampilkan menggunakan `Template.class.php` dan `skin.html`

## Penambahan Kolom

Dalam tugas ini ini, ditambahkan dua kolom baru pada tampilan tabel mahasiswa:
1. **Email**: Menampilkan alamat email mahasiswa
2. **Telepon**: Menampilkan nomor telepon mahasiswa

## Dokumentasi

https://github.com/user-attachments/assets/53f34181-340c-4ce1-9d53-70139c31048c


