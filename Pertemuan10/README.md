## 📌 Spesifikasi Website – **WorkManage**

### 1. Deskripsi Umum

**WorkManage** adalah aplikasi berbasis web yang digunakan untuk membantu pengguna dalam mengelola tugas (task management) secara terstruktur. Sistem ini memungkinkan pengguna untuk melakukan autentikasi, menambahkan tugas, memperbarui status tugas, melihat tugas berdasarkan deadline, serta memantau tugas melalui tampilan dashboard dan kalender.

---

## 2. Teknologi yang Digunakan

### 🔹 Front End

Front end bertanggung jawab terhadap tampilan dan interaksi pengguna.

| Komponen      | Teknologi               |
| ------------- | ----------------------- |
| Markup        | HTML5                   |
| Styling       | CSS3                    |
| Framework CSS | Bootstrap 5             |
| Interaksi     | JavaScript (Vanilla JS) |
| Ikon          | Bootstrap Icons         |
| Data Fetching | Fetch API (AJAX)        |

**Fungsi Front End:**

* Menampilkan halaman login & register
* Menampilkan dashboard tugas
* Menampilkan kalender deadline tugas
* Menampilkan data task secara dinamis
* Menangani event user (submit form, klik tombol, pencarian)
* Berkomunikasi dengan backend melalui API JSON

---

### 🔹 Back End

Back end bertanggung jawab terhadap logika sistem, keamanan, dan pengolahan data.

| Komponen   | Teknologi                   |
| ---------- | --------------------------- |
| Bahasa     | PHP Native                  |
| Session    | PHP Session                 |
| Database   | MySQL                       |
| Arsitektur | MVC (Model–Controller)      |
| API        | REST-like API berbasis JSON |

**Fungsi Back End:**

* Autentikasi pengguna (login & register)
* Manajemen session user
* CRUD data tugas (Create, Read, Update, Delete)
* Pengelolaan kalender berdasarkan deadline
* Validasi data
* Pengamanan akses halaman & API

---

## 3. Struktur Sistem

###  Front End (Tampilan)

```
pages/
 ├── login.php
 ├── register.php
 ├── index.php (dashboard)
 ├── task.php
 └── calendar.php

assets/
 ├── css/
 └── js/
```

### Back End (Logic & API)

```
api/
 ├── auth/
 │   ├── login.php
 │   ├── register.php
 │   └── logout.php
 │
 ├── tasks/
 │   ├── index.php
 │   ├── store.php
 │   ├── update.php
 │   └── delete.php
 │
 └── calendar/
     └── events.php

models/
 ├── User.php
 ├── Task.php
 └── Calendar.php

controllers/
 ├── AuthController.php
 ├── TaskController.php
 └── CalendarController.php
```

---

## 4. Mekanisme Autentikasi

* Sistem menggunakan **PHP Session**
* Session dibuat saat login berhasil
* Session dicek pada setiap halaman dan API
* Pengguna yang belum login akan diarahkan ke halaman login

---

## 5. Alur Kerja Sistem

1. User melakukan login
2. Backend memverifikasi akun dan membuat session
3. Frontend memanggil API untuk mengambil data tugas
4. Backend mengambil data dari database dan mengirim JSON
5. Frontend menampilkan data ke halaman
6. User dapat menambah, mengedit, menghapus tugas
7. Perubahan langsung tersimpan ke database

---

## 6. Output Sistem

* Dashboard tugas
* Daftar tugas berdasarkan status & deadline
* Kalender tugas
* Sistem autentikasi aman berbasis session

---

## 7. Kesimpulan

Website **WorkManage** menggunakan pendekatan **PHP Native + JavaScript** dengan arsitektur yang terpisah antara tampilan dan logika. Sistem ini dirancang sederhana, aman, dan mudah dikembangkan untuk kebutuhan manajemen tugas berbasis web.


