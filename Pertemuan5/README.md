### 1. Buatlah sebuah form registrasi yang terdiri dari nama mahasiswa, nim, mata kuliah, dan dosen. Form registrasi ini memiliki aturan sebagai berikut. Ketika pengguna sistem akan mengisikan data nama dengan memasukkan huruf tertentu maka akan muncul rekomendasi tertentu. Gunakan referensi di internet ataupun yang lainnya untuk memecahkan kasus tersebut.

```html
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Validasi form</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        #autocomplete-list {
            position: relative;
        }
        .autocomplete-items {
            position: absolute;
            border: 1px solid #d4d4d4;
            border-bottom: none;
            border-top: none;
            z-index: 99;
            top: 100%;
            left: 0;
            right: 0;
        }
        .autocomplete-items div {
            padding: 10px;
            cursor: pointer;
            background-color: #fff;
            border-bottom: 1px solid #d4d4d4;
        }
        .autocomplete-items div:hover {
            background-color: #e9e9e9;
        }
        .autocomplete-active {
            background-color: DodgerBlue !important;
            color: #ffffff;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head> 
<body>

<div class="form-container">
    <h2>Form Registrasi Mahasiswa</h2>
    <form id="registrationForm">
        <div class="form-group">
            <label for="nama">Nama Mahasiswa:</label>
            <div id="autocomplete-list">
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama mahasiswa..." required>
            </div>
        </div>
        <div class="form-group">
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" placeholder="Masukkan NIM..." required>
        </div>
        <div class="form-group">
            <label for="mataKuliah">Mata Kuliah:</label>
            <input type="text" id="mataKuliah" name="mataKuliah" placeholder="Masukkan mata kuliah..." required>
        </div>
        <div class="form-group">
            <label for="dosen">Dosen:</label>
            <input type="text" id="dosen" name="dosen" placeholder="Masukkan nama dosen..." required>
        </div>
        <button type="submit">Daftar</button>
    </form>
</div>

<script src="autocomplete.js"></script>

</body>
</html>
```

```js
// autocomplete.js

// Daftar nama mahasiswa
const names = [
  "Ferdian Ardra Hafizhan",
  "Ayu Putri",
  "Budi Santoso",
  "Citra Dewi",
  "Dedi Prasetyo",
  "Eka Saputra",
  "Fajar Wibowo",
  "Gita Ramadani",
  "Hendra Kusuma",
  "Ika Nur",
  "Joko Widodo",
  "Kiki Amalia",
  "Lina Marlina",
  "Mawar Sari",
  "Nadia Putri",
  "Oki Rahman",
  "Putu Adi",
  "Rizky Pratama",
  "Siti Rahayu",
  "Taufik Hidayat"
];

function autocomplete(inp, arr) {
  let currentFocus;

  inp.addEventListener("input", function () {
    const val = this.value;
    closeAllLists();
    if (!val) return false;
    currentFocus = -1;

    const listContainer = document.createElement("div");
    listContainer.setAttribute("id", this.id + "-autocomplete-list");
    listContainer.setAttribute("class", "autocomplete-items");
    this.parentNode.appendChild(listContainer);

    const lowerVal = val.toLowerCase();
    for (let i = 0; i < arr.length; i++) {
      if (arr[i].toLowerCase().indexOf(lowerVal) > -1) {
        const itemDiv = document.createElement("div");
        itemDiv.innerHTML = arr[i];
        itemDiv.addEventListener("click", function () {
          inp.value = arr[i];
          closeAllLists();
        });
        listContainer.appendChild(itemDiv);
      }
    }
  });

  inp.addEventListener("keydown", function (e) {
    const list = document.getElementById(this.id + "-autocomplete-list");
    if (!list) return;
    let items = list.getElementsByTagName("div");
    if (e.key === "ArrowDown") {
      currentFocus++;
      addActive(items);
    } else if (e.key === "ArrowUp") {
      currentFocus--;
      addActive(items);
    } else if (e.key === "Enter") {
      e.preventDefault();
      if (currentFocus > -1 && items[currentFocus]) {
        items[currentFocus].click();
      }
    }
  });

  function addActive(items) {
    if (!items) return false;
    removeActive(items);
    if (currentFocus >= items.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = items.length - 1;
    items[currentFocus].classList.add("autocomplete-active");
  }

  function removeActive(items) {
    for (let i = 0; i < items.length; i++) {
      items[i].classList.remove("autocomplete-active");
    }
  }

  function closeAllLists(elmnt) {
    const items = document.getElementsByClassName("autocomplete-items");
    for (let i = 0; i < items.length; i++) {
      if (elmnt !== items[i] && elmnt !== inp) {
        items[i].parentNode.removeChild(items[i]);
      }
    }
  }

  document.addEventListener("click", function (e) {
    closeAllLists(e.target);
  });
}

// Inisialisasi setelah DOM siap
document.addEventListener("DOMContentLoaded", function () {
  const namaInput = document.getElementById("nama");
  autocomplete(namaInput, names);
});
```

<img width="1617" height="976" alt="image" src="https://github.com/user-attachments/assets/f0306afa-789e-43e8-b6fd-2aa1d98e8d83" />

### 2. Buatlah pencarian kode pos Indonesia dengan inputan Provinsi, Kabupaten/ Kota, Kecamatan, kemudian outputnya kode pos dan informasi daerah.

```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Kode Pos Indonesia</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 1.5rem;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
            font-weight: 600;
        }
        select, button {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
            box-sizing: border-box;
        }
        select:disabled {
            background-color: #e9ecef;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: 600;
            margin-top: 1rem;
        }
        button:hover {
            background-color: #0056b3;
        }
        #hasil {
            margin-top: 1.5rem;
            padding: 1rem;
            background-color: #e2e3e5;
            border-radius: 4px;
            text-align: center;
            font-size: 1.1rem;
            color: #333;
            display: none; /* Sembunyikan secara default */
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Pencarian Kode Pos</h1>
        <form id="formKodePos">
            <div class="form-group">
                <label for="provinsi">Provinsi:</label>
                <select id="provinsi" onchange="updateKota()">
                    <option value="">-- Pilih Provinsi --</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kota">Kabupaten/Kota:</label>
                <select id="kota" onchange="updateKecamatan()" disabled>
                    <option value="">-- Pilih Kabupaten/Kota --</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kecamatan">Kecamatan:</label>
                <select id="kecamatan" disabled>
                    <option value="">-- Pilih Kecamatan --</option>
                </select>
            </div>
            <button type="button" onclick="tampilkanKodePos()">Cari Kode Pos</button>
        </form>
        <div id="hasil"></div>
    </div>

    <script>
        const dataDaerah = {
            "Jawa Barat": {
                "Kota Bandung": {
                    "Coblong": "40132",
                    "Sukasari": "40151",
                    "Cibeunying Kidul": "40121",
                    "Bandung Wetan": "40115"
                },
                "Kota Bekasi": {
                    "Bekasi Timur": "17111",
                    "Bekasi Barat": "17131",
                    "Rawalumbu": "17116"
                },
                 "Kabupaten Bogor": {
                    "Cibinong": "16911",
                    "Gunung Putri": "16961",
                    "Citeureup": "16810"
                }
            },
            "DKI Jakarta": {
                "Jakarta Pusat": {
                    "Gambir": "10110",
                    "Menteng": "10310",
                    "Senen": "10410"
                },
                "Jakarta Selatan": {
                    "Kebayoran Baru": "12110",
                    "Tebet": "12810",
                    "Pasar Minggu": "12520"
                }
            },
            "Jawa Timur": {
                "Kota Surabaya": {
                    "Gubeng": "60281",
                    "Wonokromo": "60241",
                    "Tegalsari": "60261"
                },
                "Kabupaten Sidoarjo": {
                    "Sidoarjo": "61211",
                    "Waru": "61256",
                    "Taman": "61257"
                }
            },
            "Jawa Tengah": {
                "Kota Semarang": {
                    "Candisari": "50251",
                    "Gajahmungkur": "50232",
                    "Tembalang": "50275"
                },
                "Kabupaten Demak": {
                    "Demak": "59511",
                    "Wonosalam": "59572",
                    "Karanganyar": "59561"
                }
            }
        };

        const provinsiSelect = document.getElementById('provinsi');
        const kotaSelect = document.getElementById('kota');
        const kecamatanSelect = document.getElementById('kecamatan');
        const hasilDiv = document.getElementById('hasil');

        // 1. Isi dropdown provinsi saat halaman dimuat
        window.onload = function() {
            for (const provinsi in dataDaerah) {
                provinsiSelect.innerHTML += `<option value="${provinsi}">${provinsi}</option>`;
            }
        };

        // 2. Update dropdown kota berdasarkan provinsi yang dipilih
        function updateKota() {
            const provinsiTerpilih = provinsiSelect.value;
            kotaSelect.innerHTML = '<option value="">-- Pilih Kabupaten/Kota --</option>';
            kecamatanSelect.innerHTML = '<option value="">-- Pilih Kecamatan --</option>';
            kotaSelect.disabled = true;
            kecamatanSelect.disabled = true;
            hasilDiv.style.display = 'none';

            if (provinsiTerpilih) {
                kotaSelect.disabled = false;
                for (const kota in dataDaerah[provinsiTerpilih]) {
                    kotaSelect.innerHTML += `<option value="${kota}">${kota}</option>`;
                }
            }
        }

        // 3. Update dropdown kecamatan berdasarkan kota yang dipilih
        function updateKecamatan() {
            const provinsiTerpilih = provinsiSelect.value;
            const kotaTerpilih = kotaSelect.value;
            kecamatanSelect.innerHTML = '<option value="">-- Pilih Kecamatan --</option>';
            kecamatanSelect.disabled = true;
            hasilDiv.style.display = 'none';

            if (kotaTerpilih) {
                kecamatanSelect.disabled = false;
                for (const kecamatan in dataDaerah[provinsiTerpilih][kotaTerpilih]) {
                    kecamatanSelect.innerHTML += `<option value="${kecamatan}">${kecamatan}</option>`;
                }
            }
        }

        // 4. Tampilkan kode pos saat tombol diklik
        function tampilkanKodePos() {
            const provinsi = provinsiSelect.value;
            const kota = kotaSelect.value;
            const kecamatan = kecamatanSelect.value;

            if (provinsi && kota && kecamatan) {
                const kodePos = dataDaerah[provinsi][kota][kecamatan];
                hasilDiv.innerHTML = `
                    <strong>Informasi Daerah:</strong><br>
                    ${kecamatan}, ${kota}, ${provinsi}<br>
                    <strong>Kode Pos: ${kodePos}</strong>
                `;
                hasilDiv.style.display = 'block';
            } else {
                alert('Harap lengkapi semua pilihan (Provinsi, Kabupaten/Kota, dan Kecamatan).');
                hasilDiv.style.display = 'none';
            }
        }
    </script>

</body>
</html>
```
<img width="983" height="797" alt="image" src="https://github.com/user-attachments/assets/44ac9d64-1c98-4809-af93-bafc04bac3c6" />

### 3. Membuat List Dropdown dinamis

```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Dinamis</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        select {
            width: 200px;
            padding: 8px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <h2>Dropdown Dinamis</h2>

    <div>
        <label for="produk">Pilih Produk:</label>
        <select id="produk" name="produk">
            <option value="">--Pilih Kategori Produk--</option>
            <option value="elektronik">Elektronik</option>
            <option value="pakaian">Pakaian</option>
            <option value="otomotif">Otomotif</option>
        </select>
    </div>

    <div>
        <label for="merk">Pilih Merk:</label>
        <select id="merk" name="merk">
            <option value="">--Pilih Produk Terlebih Dahulu--</option>
        </select>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dataMerk = {
                elektronik: ["Samsung", "LG", "Sony", "Apple", "Xiaomi"],
                pakaian: ["Nike", "Adidas", "Uniqlo", "H&M", "Zara"],
                otomotif: ["Toyota", "Honda", "Suzuki", "BMW", "Mercedes-Benz"]
            };

            const produkDropdown = document.getElementById('produk');
            const merkDropdown = document.getElementById('merk');

            produkDropdown.addEventListener('change', function() {
                // Ambil nilai produk yang dipilih
                const selectedProduk = this.value;

                // Kosongkan dropdown merk
                merkDropdown.innerHTML = '';

                if (selectedProduk) {
                    // Dapatkan daftar merk berdasarkan produk yang dipilih
                    const merks = dataMerk[selectedProduk];

                    // Tambahkan opsi default
                    let defaultOption = document.createElement('option');
                    defaultOption.value = "";
                    defaultOption.textContent = "--Pilih Merk--";
                    merkDropdown.appendChild(defaultOption);

                    // Isi dropdown merk dengan data yang sesuai
                    merks.forEach(function(merk) {
                        let option = document.createElement('option');
                        option.value = merk.toLowerCase().replace(/ /g, '-');
                        option.textContent = merk;
                        merkDropdown.appendChild(option);
                    });
                } else {
                    // Jika tidak ada produk yang dipilih
                    let defaultOption = document.createElement('option');
                    defaultOption.value = "";
                    defaultOption.textContent = "--Pilih Produk Terlebih Dahulu--";
                    merkDropdown.appendChild(defaultOption);
                }
            });
        });
    </script>

</body>
</html>
```
<img width="870" height="480" alt="image" src="https://github.com/user-attachments/assets/2e72bc1c-1615-4f66-a889-c7e34d6474de" />
