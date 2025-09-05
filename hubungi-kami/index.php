<?php 
session_start();
include '../config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hubungi Kami - Rumah Baca</title>

  <!-- Icon & CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="../main.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link href="https://unpkg.com/tabler-icons@latest/iconfont/tabler-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Leaflet JS -->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

  <style>
    :root {
      --rb-green: #15803d;
      --rb-orange: #f97316;
    }
    .text-rb-green { color: var(--rb-green); }
    .text-rb-orange { color: var(--rb-orange); }
    .bg-rb-green { background-color: var(--rb-green); }
    .bg-rb-orange { background-color: var(--rb-orange); }
  </style>
</head>
<body class="font-poppins bg-gray-50">

<!-- Navbar -->
<?php include '../navbar.php'; ?>

<!-- Toast -->
<div id="toast" class="hidden fixed top-5 right-5 bg-green-600 text-white px-4 py-3 rounded-lg shadow-lg z-50">
  ✅ Pesan berhasil dikirim!
</div>

<!-- Header -->
<section class="bg-rb-green bg-[url('https://transparenttextures.com/patterns/cubes.png')] text-white py-20 sm:py-24 px-6 text-center relative">
  <div data-aos="fade-up" class="relative z-10">
    <i class="bi bi-chat-dots text-6xl mb-4 animate-bounce"></i>
    <h1 class="text-4xl sm:text-5xl font-bold mb-4 bg-gradient-to-r from-green-700 to-orange-500 bg-clip-text text-transparent">
      Hubungi Kami
    </h1>
    <p class="max-w-2xl mx-auto text-white/90 text-lg">
      Kami siap mendengar pertanyaan, saran, atau peluang kolaborasi dari Anda.
    </p>
  </div>
</section>

<!-- Form & Info -->
<section class="py-16 px-6 sm:px-12 lg:px-20 overflow-x-hidden">
  <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12">

    <!-- Form -->
    <div class="bg-white shadow-lg rounded-xl p-8 hover:shadow-2xl transition" data-aos="fade-right">
      <h2 class="text-2xl font-bold text-rb-green mb-6">Kirim Pesan</h2>
      <form id="contactForm" class="space-y-6" method="post">

        <!-- Nama -->
        <div class="relative">
          <input type="text" id="nama" required
            class="peer w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-rb-green focus:outline-none placeholder-transparent"
            placeholder="Nama Lengkap">
          <label for="nama"
            class="absolute left-3 top-3 text-gray-400 peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-400 peer-focus:-top-2 peer-focus:left-2 peer-focus:text-sm peer-focus:text-rb-orange transition-all bg-white px-1">
            Nama Lengkap
          </label>
        </div>

        <!-- Email -->
        <div class="relative">
          <input type="email" id="email" required
            class="peer w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-rb-green focus:outline-none placeholder-transparent"
            placeholder="Alamat Email">
          <label for="email"
            class="absolute left-3 top-3 text-gray-400 peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-400 peer-focus:-top-2 peer-focus:left-2 peer-focus:text-sm peer-focus:text-rb-orange transition-all bg-white px-1">
            Alamat Email
          </label>
        </div>

        <!-- Subjek -->
        <div class="relative">
          <input type="text" id="subjek"
            class="peer w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-rb-green focus:outline-none placeholder-transparent"
            placeholder="Subjek">
          <label for="subjek"
            class="absolute left-3 top-3 text-gray-400 peer-placeholder-shown:top-3 peer-focus:-top-2 peer-focus:left-2 peer-focus:text-sm peer-focus:text-rb-orange transition-all bg-white px-1">
            Subjek (Opsional)
          </label>
        </div>

        <!-- Pesan -->
        <div class="relative">
          <textarea id="pesan" rows="5" required
            class="peer w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-rb-green focus:outline-none placeholder-transparent"></textarea>
          <label for="pesan"
            class="absolute left-3 top-3 text-gray-400 peer-placeholder-shown:top-3 peer-focus:-top-2 peer-focus:left-2 peer-focus:text-sm peer-focus:text-rb-orange transition-all bg-white px-1">
            Pesan Anda
          </label>
        </div>

        <!-- Tombol -->
        <button type="submit"
          class="w-full bg-rb-green hover:bg-rb-orange text-white font-semibold py-3 rounded-lg transition duration-300 flex items-center justify-center gap-2">
          Kirim Pesan <i class="bi bi-send"></i>
        </button>
      </form>
    </div>

    <!-- Info Kontak -->
    <div class="max-w-3xl mx-auto space-y-6" data-aos="fade-left">
      <h2 class="text-3xl font-bold text-center bg-gradient-to-r from-green-700 to-orange-500 bg-clip-text text-green-800 mb-12">Informasi Kontak</h2>

      <!-- Item -->
      <div class="bg-white shadow-md rounded-xl p-6 flex items-start gap-4 hover:shadow-lg transition">
        <i class="bi bi-geo-alt text-rb-green text-3xl"></i>
        <div>
          <h3 class="font-semibold text-rb-green">Alamat Kantor</h3>
          <p class="text-gray-600">Jl. Brigjend Katamso, Kp. Baru, Kec. Medan Maimun, Kota Medan, Sumatera Utara 20158</p>
        </div>
      </div>

      <div class="bg-white shadow-md rounded-xl p-6 flex items-start gap-4 hover:shadow-lg transition">
        <i class="bi bi-telephone text-rb-green text-3xl"></i>
        <div>
          <h3 class="font-semibold text-rb-green">Telepon</h3>
          <p class="text-gray-600">+62 813 7696 5858</p>
        </div>
      </div>

      <div class="bg-white shadow-md rounded-xl p-6 flex items-start gap-4 hover:shadow-lg transition">
        <i class="bi bi-instagram text-rb-green text-3xl"></i>
        <div>
          <h3 class="font-semibold text-rb-green">Instagram</h3>
          <p class="text-gray-600">@lazulilalbab</p>
        </div>
      </div>

      <div class="bg-white shadow-md rounded-xl p-6 flex items-start gap-4 hover:shadow-lg transition">
        <i class="bi bi-clock text-rb-green text-3xl"></i>
        <div>
          <h3 class="font-semibold text-rb-green">Jam Operasional</h3>
          <p class="text-gray-600">Senin - Sabtu: 08.00 - 17.00</p>
        </div>
      </div>

      <div class="bg-white shadow-md rounded-xl p-6 flex items-start gap-4 hover:shadow-lg transition">
        <i class="bi bi-share text-rb-green text-3xl"></i>
        <div>
          <h3 class="font-semibold text-rb-green mb-2">Ikuti Kami</h3>
          <div class="flex gap-5 text-xl">
            <a href="#" class="text-rb-orange hover:text-rb-green transition"><i class="bi bi-facebook"></i></a>
            <a href="#" class="text-rb-orange hover:text-rb-green transition"><i class="bi bi-instagram"></i></a>
            <a href="#" class="text-rb-orange hover:text-rb-green transition"><i class="bi bi-youtube"></i></a>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- Map -->
<section class="py-16 px-6 sm:px-12 lg:px-0">
  <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-lg px-6 sm:px-12 py-10 text-center hover:shadow-xl transition">
    <h2 class="text-3xl font-bold bg-gradient-to-r from-green-700 to-orange-500 bg-clip-text text-green-800 mb-4">Temukan Lokasi Kami</h2>
    <p class="text-gray-600 mb-8">
      No. 11, Jl. Brigjend Katamso, Kp. Baru, Kec. Medan Maimun, Kota Medan, Sumatera Utara 20158
    </p>
    <div id="mapid" class="w-full h-72 sm:h-96 lg:h-[500px] rounded-xl"></div>
  </div>
</section>

<!-- FAB WhatsApp -->
<a href="https://wa.me/6281376965858" target="_blank"
  class="fixed bottom-6 right-6 bg-green-500 text-white p-4 rounded-full text-2xl shadow-lg hover:scale-110 transition z-50">
  <i class="bi bi-whatsapp"></i>
</a>

<?php include '../footer.php'; ?>

<script src="<?= $base_url ?>translate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init({ duration: 1000, once: true });

// Toast
function showToast(msg) {
  const toast = document.getElementById("toast");
  toast.textContent = msg;
  toast.classList.remove("hidden");
  setTimeout(() => toast.classList.add("hidden"), 4000);
}

// Form handler
document.getElementById("contactForm").addEventListener("submit", function(e){
  e.preventDefault();
  const email = document.getElementById("email").value;
  const pesan = document.getElementById("pesan").value;
  if(!email.includes("@") || pesan.trim() === ""){
    alert("Harap isi email valid dan pesan!");
    return;
  }
  showToast("✅ Pesan berhasil dikirim!");
  this.reset();
});

// Map
const map = L.map('mapid').setView([3.580495, 98.684048], 16);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '© OpenStreetMap' }).addTo(map);

const customIcon = L.icon({
  iconUrl: 'https://cdn-icons-png.flaticon.com/512/29/29302.png',
  iconSize: [40, 40],
  iconAnchor: [20, 40],
  popupAnchor: [0, -35]
});

L.marker([3.580495, 98.684048], {icon: customIcon}).addTo(map)
  .bindPopup('<strong>Rumah Baca</strong><br>No. 11, Jl. Brigjend Katamso, Kp. Baru, Kec. Medan Maimun<br><a href="https://maps.google.com/?q=3.580495,98.684048" target="_blank" class="text-rb-orange">Buka di Google Maps</a>')
  .openPopup();
</script>
</body>
</html>
