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
