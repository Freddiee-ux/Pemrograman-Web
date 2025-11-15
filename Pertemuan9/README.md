# Form Pendaftaran SMK Coding

1. config.php
   
Peran:
File konfigurasi database.

Fungsi:
- Menjalankan koneksi ke MySQL menggunakan mysqli_connect().
- Menyimpan variabel penting seperti server, user, password, dan nama database.
- Digunakan oleh semua file lain yang membutuhkan koneksi database lewat include("config.php");.

Tanpa file ini, file lain tidak bisa membaca/menulis ke database.

2. index.php
   
Peran:
Halaman utama sistem pendaftaran siswa.
Fungsi:
- Menampilkan menu navigasi:
  - Link ke form-daftar.php untuk menambah siswa baru.
  - Link ke list-siswa.php untuk melihat daftar siswa.
- Menampilkan status jika pendaftaran berhasil atau gagal, berdasarkan parameter status dari URL.

File ini adalah landing page untuk semua user.

3. list-siswa.php
   
Peran:
Menampilkan semua data siswa dalam bentuk tabel.
Fungsi:
- Mengambil data dari tabel calon_siswa dengan query SELECT.
- Menampilkan data siswa secara dinamis dalam tabel HTML.
- Menyediakan link Edit untuk mengubah data siswa (form-edit.php?id=...).
- Menyediakan link Hapus untuk menghapus data siswa (hapus.php?id=...).
- Menghitung jumlah data menggunakan mysqli_num_rows().

File ini berfungsi sebagai halaman admin untuk memonitor seluruh pendaftar.

4. form-daftar.php
   
Peran:
Halaman untuk input data siswa baru.

Fungsi:
- Menampilkan form berisi input: nama, alamat, jenis kelamin, agama, sekolah asal.
- Mengirim data ke proses-pendaftaran.php menggunakan method POST.
- Menyediakan interface bagi pengguna untuk memasukkan data baru.
- File ini adalah UI untuk proses pendaftaran.

5. proses-pendaftaran.php
   
Peran:
Memproses input data dari form pendaftaran.

Fungsi:
- Mengambil data dari form menggunakan $_POST.
- Menjalankan query INSERT ke database untuk menyimpan data baru.
- Mengalihkan user kembali ke index.php dengan status sukses atau gagal.

File ini adalah backend penyimpanan data baru.

6. hapus.php

Peran:
Menghapus data siswa berdasarkan id.

Fungsi:
- Menerima id dari URL via $_GET.
- Menjalankan query DELETE untuk menghapus data sesuai id.
- Setelah penghapusan berhasil, kembali ke list-siswa.php.

File ini menangani operasi delete pada database.

7. form-edit.php

Peran:
Menampilkan form untuk mengedit data siswa.

Fungsi:
- Mengambil data berdasarkan id dari URL.
- Menampilkan data lama ke dalam form sebagai nilai default.
- Menyediakan input radio dan select yang otomatis terpilih sesuai data database.
- Mengirim data perubahan ke proses-edit.php.

File ini adalah UI untuk update data.

8. proses-edit.php

Peran:
Memproses perubahan data siswa yang dikirim dari form-edit.

Fungsi:
- Mendapatkan data baru dari $_POST.
- Menjalankan query UPDATE untuk memperbarui data.
- Mengalihkan kembali ke list-siswa.php jika update berhasil.

File ini adalah backend untuk update data.

## ALUR KERJA SISTEM SECARA KESELURUHAN

User mengakses index.php.

User dapat:
- Daftar siswa baru → form-daftar.php → proses-pendaftaran.php.
-Melihat daftar siswa → list-siswa.php.
- Dari daftar siswa, user bisa:
  - Edit data → form-edit.php → proses-edit.php
  - Hapus data → hapus.php

Semua pengolahan database memakai config.php.


<img width="2876" height="729" alt="image" src="https://github.com/user-attachments/assets/7e358629-e0b9-4ba9-b4b5-fc5b679e38d2" />
<img width="1912" height="928" alt="image" src="https://github.com/user-attachments/assets/ee55997a-e4e5-43d1-9072-d44397d360b2" />

