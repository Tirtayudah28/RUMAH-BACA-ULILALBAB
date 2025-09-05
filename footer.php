<?php 
    include 'config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
     <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- AOS (Animate on Scroll) -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

  <!-- Icons (Heroicons) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <style>
    :root {
      --rb-green: #15803d;
      --rb-orange: #f97316;
    }
    .animate-spin-slow {
        animation: spin 6s linear infinite;
    }

      .perspective {
        perspective: 1000px;
    }
    .preserve-3d {
        transform-style: preserve-3d;
    }
    .rotate-y-180 {
        transform: rotateY(180deg);
    }
    .backface-hidden {
        backface-visibility: hidden;
    }
  </style>
</head>
<body>

<!-- FOOTER -->
<footer class="bg-[var(--rb-green)] text-white pt-12 pb-8">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- Grid utama -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
      
      <!-- Bagian kiri: Logo + Carousel -->
      <div>
        <div class="flex items-center gap-3">
          <img src="<?= $base_url ?>image/logo.png" alt="Rumah Baca" class="h-16 md:h-20 w-auto object-contain">
          <div>
            <div class="font-semibold text-lg">Rumah Baca Ulil Albab</div>
            <div class="text-sm text-emerald-100">Membangun generasi literasi.</div>
          </div>
        </div>

        <!-- Carousel (dibatasi lebarnya) -->
        <div id="indicators-carousel" class="relative w-full max-w-sm mt-4" data-carousel="static">
          <div class="relative aspect-video overflow-hidden rounded-lg">
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
              <img src="<?= $base_url ?>image/tentang-kami.jpg" class="block w-full h-full object-cover" alt="...">
            </div>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
              <img src="<?= $base_url ?>image/edukasi.jpg" class="block w-full h-full object-cover" alt="...">
            </div>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
              <img src="<?= $base_url ?>image/donation.jpg" class="block w-full h-full object-cover" alt="...">
            </div>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
              <img src="<?= $base_url ?>image/event.jpg" class="block w-full h-full object-cover" alt="...">
            </div>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
              <img src="<?= $base_url ?>image/donasi-picture.jpg" class="block w-full h-full object-cover" alt="...">
            </div>
          </div>

          <!-- Controls -->
          <button type="button" class="absolute inset-y-0 start-0 z-30 flex items-center justify-center px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/30 group-hover:bg-white/50">
              <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
              </svg>
            </span>
          </button>
          <button type="button" class="absolute inset-y-0 end-0 z-30 flex items-center justify-center px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/30 group-hover:bg-white/50">
              <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
              </svg>
            </span>
          </button>
        </div>
      </div>

      <!-- Bagian kanan: Connect + Links -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Connect with -->
        <div>
          <span class="text-neutral-300 font-semibold block mb-3">Terhubung</span>
          <div class="flex flex-nowrap w-[22rem] items-center gap-3">
            <a href="http://" target="_blank" class="flex justify-center items-center w-12 h-12 text-red-600 bg-neutral-50 text-2xl rounded-full">
              <i class="bi bi-youtube"></i>
            </a>
            <a href="http://" target="_blank" class="flex justify-center items-center w-12 h-12 text-neutral-600 bg-neutral-50 text-2xl rounded-full">
              <i class="bi bi-instagram"></i>
            </a>
            <a href="http://" target="_blank" class="flex justify-center items-center w-12 h-12 text-blue-600 bg-neutral-50 text-2xl rounded-full">
              <i class="bi bi-facebook"></i>
            </a>
            <a href="http://" target="_blank" class="flex justify-center items-center w-12 h-12 text-neutral-600 bg-neutral-50 text-2xl rounded-full">
              <i class="bi bi-tiktok"></i>
            </a>
            <a href="http://" target="_blank" class="flex justify-center items-center w-12 h-12 text-neutral-600 bg-neutral-50 text-2xl rounded-full">
              <i class="bi bi-twitter-x"></i>
            </a>
            <a href="http://" target="_blank" class="flex justify-center items-center w-12 h-12 text-blue-600 bg-neutral-50 text-2xl rounded-full">
              <i class="bi bi-linkedin"></i>
            </a>
          </div>
        </div>

        <!-- Quick Links -->
        <div class="ml-[5rem] sm:ml-[0] lg:ml-[5rem]">
          <div class="font-semibold mb-3 text-neutral-300">Tautan</div>
          <ul class="space-y-2 text-emerald-100/90 text-sm">
            <li><a href="#" class="hover:underline text-neutral-50 font-semibold">Beranda</a></li>
            <li><a href="#about" class="hover:underline text-neutral-50 font-semibold">Tentang Kami</a></li>
            <li><a href="#programs" class="hover:underline text-neutral-50 font-semibold">Program</a></li>
            <li><a href="#pojokbaca" class="hover:underline text-neutral-50 font-semibold">Pojok Baca</a></li>
            <li><a href="#news" class="hover:underline text-neutral-50 font-semibold">Berita</a></li>
          </ul>
        </div>
      </div>

    </div>

    <!-- Copyright -->
    <div class="mt-10 border-t border-white/20 pt-6 flex flex-col md:flex-row items-center justify-between gap-3 text-emerald-100/90 text-sm">
      <div>© 2025 Rumah Baca Ulil Albab. Semua hak dilindungi.</div>
      <div>Didesain dengan ♥ oleh Tim Ulil Albab — tema: hijau & oranye.</div>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script>
    // init AOS
    AOS.init({ duration: 700, once: true });

    // mobile menu toggle
    const mobileBtn = document.getElementById('mobileBtn');
    const mobilePanel = document.getElementById('mobilePanel');
    mobileBtn?.addEventListener('click', () => {
      if (mobilePanel.classList.contains('hidden')) {
        mobilePanel.classList.remove('hidden');
        mobilePanel.classList.add('animate-slide-down');
      } else {
        mobilePanel.classList.add('hidden');
        mobilePanel.classList.remove('animate-slide-down');
      }
    });

    // simple "will-animate" reveal fallback (for browsers without AOS immediate triggering)
    document.addEventListener('DOMContentLoaded', () => {
      const els = document.querySelectorAll('.will-animate');
      els.forEach((el, idx) => {
        setTimeout(() => el.classList.add('show'), idx * 90);
      });
    });

    // Reader modal
    function openReader(title){
      document.getElementById('readerTitle').textContent = title;
      document.getElementById('readerModal').classList.remove('hidden');
      document.getElementById('readerModal').classList.add('flex');
    }
    function closeReader(){
      document.getElementById('readerModal').classList.add('hidden');
      document.getElementById('readerModal').classList.remove('flex');
    }

    // small accessibility: close modal with Esc
    document.addEventListener('keydown', (e)=>{
      if(e.key === 'Escape') closeReader();
    });

    // feather icons replacement (if present)
    try{ feather.replace(); }catch(e){}

    let player;
    function onYouTubeIframeAPIReady() {
      player = new YT.Player('ytPlayer', {
        events: {
          'onReady': function(event) {
            event.target.playVideo();
          }
        }
      });
    }

    // Klik iframe wrapper untuk play/pause
    document.getElementById("ytPlayer").addEventListener("click", function () {
      if (player.getPlayerState() === YT.PlayerState.PLAYING) {
        player.pauseVideo();
      } else {
        player.playVideo();
      }
    });
  </script>
</body>
</html>