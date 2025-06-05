@extends('layouts.app') {{-- Atau layout dashboard utama Anda --}}

@section('title', 'Kalender Tanam')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              poppins: ['Poppins', 'sans-serif'],
              poetsen_one: ['"Poetsen One"', 'cursive'],
            },
            colors: {
              'custom-green': {
                DEFAULT: '#2E7D32', dark: '#1e4a20', month_title: '#2E7D32',
                day_bg: '#2E7D32', nav_btn: '#2c6b2f', detail_strong: '#2c6b2f',
              },
              'custom-brown': { year: '#795548', },
              'custom-gray': { body_bg: '#e9e9e9', detail_bg: '#f8f9fa', detail_border: '#e0e0e0', }
            }
          }
        }
      }
    </script>
    {{-- Jika kalender.html memiliki blok <style> spesifik, pindahkan ke file CSS dan tautkan di sini --}}
    {{-- Atau inline di sini jika hanya kelas utilitas Tailwind dalam struktur HTML --}}
@endsection

@section('content')
<body class="font-poppins m-0 bg-custom-gray-body_bg flex flex-col items-center min-h-screen text-gray-800">
    <header id="main-header" class="bg-custom-green text-white px-5 py-3.5 text-center w-full flex justify-center items-center box-border h-[70px] mb-5">
      <i class="fas fa-calendar-alt text-[1.8em] mr-3"></i>
      <h1 class="m-0 text-[1.9em] font-bold">Kalender</h1>
    </header>

    <div class="calendar-navigation-wrapper bg-white p-5 rounded-lg shadow-[0_4px_15px_rgba(0,0,0,0.1)] w-[90%] max-w-[900px] box-border">
      <div class="year-display-container text-center mb-[25px] relative group">
        <span id="displayed-year" class="text-[2.2em] font-poetsen_one text-custom-brown-year">2025</span>
        <input type="number" id="year-input" value="2025" min="1900" max="2100" title="Ganti Tahun"
               class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[80px] opacity-0 group-hover:opacity-20 cursor-pointer h-full border-none text-base z-[2]"/>
      </div>

      <div class="months-carousel flex items-center justify-between max-md:flex-col">
        <button id="prev-month-btn" class="nav-btn bg-transparent border-none text-custom-green-nav_btn text-[2.5em] cursor-pointer px-[15px] transition-colors duration-300 ease-in-out hover:text-custom-green-dark max-md:py-2.5 max-md:text-2xl max-md:order-1">
          <i class="fas fa-chevron-left"></i>
        </button>
        <div class="months-display-area flex justify-around flex-grow gap-5 max-md:order-2 max-md:flex-col max-md:w-full max-md:gap-[25px]">
          <div class="month-container basis-[calc(50%-10px)] max-w-[calc(50%-10px)] bg-white rounded-lg flex flex-col max-md:basis-full max-md:max-w-full">
            <h2 id="month-name-1" class="text-center text-custom-green-month_title mt-2.5 mb-[15px] text-[1.6em] font-poetsen_one">Januari</h2>
            <div class="days-grid grid grid-cols-7 gap-[6px] px-2.5 max-sm:gap-1" id="days-grid-1"></div>
            <div class="detail-tanaman bg-custom-gray-detail_bg border border-custom-gray-detail_border rounded-lg p-[15px] my-2.5 mx-[10px] min-h-[100px]" id="detail-tanaman-1">
              <p class="m-0 text-gray-800 text-[0.9em] max-sm:text-[0.85em]"><strong>Detail Tanaman:</strong></p>
              <p id="tanggal-terpilih-1" class="m-0 text-gray-800 text-[0.9em] max-sm:text-[0.85em]">Pilih tanggal untuk melihat detail.</p>
              <p id="rekomendasi-tanaman-1" class="m-0 text-gray-800 text-[0.9em] font-bold max-sm:text-[0.85em]"></p>
              <p id="suhu-1" class="m-0 text-gray-800 text-[0.9em] font-bold max-sm:text-[0.85em]"></p>
            </div>
          </div>

          <div class="month-container basis-[calc(50%-10px)] max-w-[calc(50%-10px)] bg-white rounded-lg flex flex-col max-md:basis-full max-md:max-w-full">
            <h2 id="month-name-2" class="text-center text-custom-green-month_title mt-2.5 mb-[15px] text-[1.6em] font-poetsen_one">Februari</h2>
            <div class="days-grid grid grid-cols-7 gap-[6px] px-2.5 max-sm:gap-1" id="days-grid-2"></div>
            <div class="detail-tanaman bg-custom-gray-detail_bg border border-custom-gray-detail_border rounded-lg p-[15px] my-2.5 mx-[10px] min-h-[100px]" id="detail-tanaman-2">
              <p class="m-0 text-gray-800 text-[0.9em] max-sm:text-[0.85em]"><strong>Detail Tanaman:</strong></p>
              <p id="tanggal-terpilih-2" class="m-0 text-gray-800 text-[0.9em] max-sm:text-[0.85em]">Pilih tanggal untuk melihat detail.</p>
              <p id="rekomendasi-tanaman-2" class="m-0 text-gray-800 text-[0.9em] font-bold max-sm:text-[0.85em]"></p>
              <p id="suhu-2" class="m-0 text-gray-800 text-[0.9em] font-bold max-sm:text-[0.85em]"></p>
            </div>
          </div>
        </div>
        <button id="next-month-btn" class="nav-btn bg-transparent border-none text-custom-green-nav_btn text-[2.5em] cursor-pointer px-[15px] transition-colors duration-300 ease-in-out hover:text-custom-green-dark max-md:py-2.5 max-md:text-2xl max-md:order-3">
          <i class="fas fa-chevron-right"></i>
        </button>
      </div>
    </div>
</body>
@endsection

@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const displayedYearEl = document.getElementById("displayed-year");
    const yearInputEl = document.getElementById("year-input");
    const prevMonthBtn = document.getElementById("prev-month-btn");
    const nextMonthBtn = document.getElementById("next-month-btn");

    const monthNameEls = [
        document.getElementById("month-name-1"),
        document.getElementById("month-name-2"),
    ];
    const daysGridEls = [
        document.getElementById("days-grid-1"),
        document.getElementById("days-grid-2"),
    ];
    const detailTanamanContainers = [
        {
            container: document.getElementById("detail-tanaman-1"),
            tanggal: document.getElementById("tanggal-terpilih-1"),
            rekomendasi: document.getElementById("rekomendasi-tanaman-1"),
            suhu: document.getElementById("suhu-1"),
        },
        {
            container: document.getElementById("detail-tanaman-2"),
            tanggal: document.getElementById("tanggal-terpilih-2"),
            rekomendasi: document.getElementById("rekomendasi-tanaman-2"),
            suhu: document.getElementById("suhu-2"),
        },
    ];

    const namaBulan = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember",
    ];

    let currentYear = new Date().getFullYear(); // Default ke tahun saat ini
    let currentMonthIndex = new Date().getMonth(); // Default ke bulan saat ini (0-indeks)

    function updateDisplayedYear() {
        displayedYearEl.textContent = currentYear;
        yearInputEl.value = currentYear;
    }

    function resetDetailTanaman(detailContainer) {
        detailContainer.tanggal.textContent = "Pilih tanggal untuk melihat detail.";
        detailContainer.rekomendasi.textContent = "";
        detailContainer.suhu.textContent = "";
    }

    async function fetchPlantingData(year, month, day) { // month adalah 0-indeks di sini, API butuh 1-indeks
        try {
            const response = await fetch(`/api/planting-info/date?year=${year}&month=${month + 1}&day=${day}`); // Sesuaikan bulan menjadi 1-indeks untuk API
            if (!response.ok) {
                if (response.status === 404) { // Jika 404, berarti tidak ada data
                     return { rekomendasi: "Belum ada data.", suhu: "-" };
                }
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return await response.json();
        } catch (error) {
            console.error("Error mengambil data tanam:", error);
            return { rekomendasi: "Gagal memuat data.", suhu: "-" };
        }
    }


    async function tampilkanDetail(detailContainer, tanggal, bulanIndex, tahun) { // bulanIndex adalah 0-indeks
        detailContainer.tanggal.textContent = `Tanggal: ${tanggal} ${namaBulan[bulanIndex]} ${tahun}`;
        detailContainer.rekomendasi.textContent = `Memuat...`;
        detailContainer.suhu.textContent = ``;

        const data = await fetchPlantingData(tahun, bulanIndex, tanggal);

        detailContainer.rekomendasi.textContent = `Rekomendasi Tanaman: ${data.rekomendasi}`;
        detailContainer.suhu.textContent = `Suhu: ${data.suhu}`;
    }


    function buatSatuBulan(tahun, bulanIndex, daysGridEl, detailContainer) { // bulanIndex adalah 0-indeks
        daysGridEl.innerHTML = "";
        monthNameEls[daysGridEls.indexOf(daysGridEl)].textContent = namaBulan[bulanIndex];
        resetDetailTanaman(detailContainer);

        const tanggalPertama = new Date(tahun, bulanIndex, 1);
        const hariPertamaMinggu = (tanggalPertama.getDay() === 0) ? 6 : tanggalPertama.getDay() -1; // Sesuaikan agar Senin adalah 0
        const jumlahHari = new Date(tahun, bulanIndex + 1, 0).getDate();

        for (let i = 0; i < hariPertamaMinggu; i++) {
            const selKosong = document.createElement("div");
            selKosong.className = "bg-transparent cursor-default text-white py-3 px-1.5 text-center rounded-md font-bold text-[0.95em] max-md:py-2.5 max-md:px-0.5 max-md:text-[0.85em] max-sm:py-2 max-sm:px-0.5 max-sm:text-[0.8em]";
            daysGridEl.appendChild(selKosong);
        }

        for (let tanggal = 1; tanggal <= jumlahHari; tanggal++) {
            const selTanggal = document.createElement("div");
            selTanggal.className = "day bg-custom-green-day_bg text-white py-3 px-1.5 text-center rounded-md cursor-pointer transition-colors duration-300 ease-in-out font-bold text-[0.95em] hover:scale-105 hover:transition-all hover:duration-200 hover:ease-in-out max-md:py-2.5 max-md:px-0.5 max-md:text-[0.85em] max-sm:py-2 max-sm:px-0.5 max-sm:text-[0.8em]";
            selTanggal.textContent = tanggal;
            selTanggal.dataset.tanggal = tanggal;

            selTanggal.addEventListener("click", function () {
                document.querySelectorAll(".days-grid .day.selected").forEach((d) => {
                    d.classList.remove("selected");
                    d.classList.add("bg-custom-green-day_bg", "text-white");
                    d.classList.remove("bg-white", "text-custom-green-day_bg", "outline", "outline-1", "outline-custom-green-day_bg");
                });
                this.classList.add("selected");
                this.classList.remove("bg-custom-green-day_bg", "text-white");
                this.classList.add("bg-white", "text-custom-green-day_bg", "outline", "outline-1", "outline-custom-green-day_bg");

                tampilkanDetail(detailContainer, tanggal, bulanIndex, tahun);
            });
            daysGridEl.appendChild(selTanggal);

            // Logika pemilihan default (mis., pilih hari ini jika ada di tampilan saat ini)
            const today = new Date();
            if (tahun === today.getFullYear() && bulanIndex === today.getMonth() && tanggal === today.getDate()) {
                 // Periksa apakah ini panel yang benar untuk men-trigger klik
                 const panelIndex = daysGridEls.indexOf(daysGridEl); // 0 atau 1
                 // Jika panel pertama DAN bulan saat ini adalah bulan yang ditampilkan DI panel pertama
                 // ATAU jika panel kedua DAN bulan saat ini adalah bulan yang ditampilkan DI panel kedua
                 if ((panelIndex === 0 && bulanIndex === currentMonthIndex) ||
                     (panelIndex === 1 && bulanIndex === (currentMonthIndex + 1) % 12)) {
                    selTanggal.click(); // Simulasikan klik untuk memuat data
                 }
            }
        }
    }

    function renderKalenderDuaBulan() {
        updateDisplayedYear();

        const tahunBulan1 = currentYear;
        const bulan1Index = currentMonthIndex; // 0-indeks

        let tahunBulan2 = currentYear;
        let bulan2Index = (currentMonthIndex + 1) % 12; // 0-indeks

        if (bulan1Index === 11) { // Jika bulan saat ini adalah Desember
            tahunBulan2 = currentYear + 1;
        }

        buatSatuBulan(tahunBulan1, bulan1Index, daysGridEls[0], detailTanamanContainers[0]);
        buatSatuBulan(tahunBulan2, bulan2Index, daysGridEls[1], detailTanamanContainers[1]);
    }

    prevMonthBtn.addEventListener("click", () => {
        currentMonthIndex--;
        if (currentMonthIndex < 0) {
            currentMonthIndex = 11;
            currentYear--;
        }
        renderKalenderDuaBulan();
    });

    nextMonthBtn.addEventListener("click", () => {
        currentMonthIndex++;
        if (currentMonthIndex > 11) { // Maksimal adalah 11 (Desember)
            currentMonthIndex = 0;
            currentYear++;
        }
        renderKalenderDuaBulan();
    });

    yearInputEl.addEventListener("change", () => {
        const tahunBaru = parseInt(yearInputEl.value);
        if (!isNaN(tahunBaru) && tahunBaru >= 1900 && tahunBaru <= 2100) {
            currentYear = tahunBaru;
            // currentMonthIndex akan tetap, atau Anda dapat mengatur ulang ke Januari (0)
            renderKalenderDuaBulan();
        } else {
            alert("Masukkan tahun yang valid (1900-2100).");
            yearInputEl.value = currentYear; // Atur ulang ke nilai lama
        }
    });
    yearInputEl.addEventListener("focus", () => { yearInputEl.style.opacity = "1"; });
    yearInputEl.addEventListener("blur", () => { yearInputEl.style.opacity = "0"; });

    // Atur tahun awal untuk tampilan
    displayedYearEl.textContent = currentYear;
    yearInputEl.value = currentYear;
    renderKalenderDuaBulan();
});
</script>
@endsection