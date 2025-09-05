<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Video</title>
  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

  <!-- AOS (Animate on Scroll) -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
  <?php include '../navbar.php'; ?>
    
  <div class="w-full">
    <div class="bg-neutral-900 p-6 sm:p-10 md:p-16 lg:p-14 mt-8 mb-[6rem] md:mb-[2rem]">

        <!-- Heading -->
      <div class="flex items-center gap-3 mb-6 mt-4">
        <div class="w-2 h-10 bg-orange-600 rounded"></div>
        <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white">Video</h2>
      </div>
  
        <!-- Kategori -->
      <div class="flex flex-nowrap overflow-x-auto gap-3 pb-3 scrollbar-hide whitespace-nowrap mb-6">
        <span class="px-4 py-1.5 rounded-full bg-neutral-700 text-gray-100 text-xs sm:text-sm font-medium cursor-pointer hover:bg-orange-600 transition">Animasi</span>
        <span class="px-4 py-1.5 rounded-full bg-neutral-700 text-gray-100 text-xs sm:text-sm font-medium cursor-pointer hover:bg-orange-600 transition">Khutbah</span>
        <span class="px-4 py-1.5 rounded-full bg-neutral-700 text-gray-100 text-xs sm:text-sm font-medium cursor-pointer hover:bg-orange-600 transition">Podcast</span>
        <span class="px-4 py-1.5 rounded-full bg-neutral-700 text-gray-100 text-xs sm:text-sm font-medium cursor-pointer hover:bg-orange-600 transition">Series</span>
        <span class="px-4 py-1.5 rounded-full bg-neutral-700 text-gray-100 text-xs sm:text-sm font-medium cursor-pointer hover:bg-orange-600 transition">Refleksi</span>
        <span class="px-4 py-1.5 text-gray-400">|</span>
        <span class="px-4 py-1.5 text-gray-400">Topic:</span>
        <span class="px-4 py-1.5 rounded-full bg-neutral-700 text-gray-100 text-xs sm:text-sm font-medium cursor-pointer hover:bg-orange-600 transition">Keyakinan</span>
        <span class="px-4 py-1.5 rounded-full bg-neutral-700 text-gray-100 text-xs sm:text-sm font-medium cursor-pointer hover:bg-orange-600 transition">Syariah</span>
        <span class="px-4 py-1.5 rounded-full bg-neutral-700 text-gray-100 text-xs sm:text-sm font-medium cursor-pointer hover:bg-orange-600 transition">Politik</span>
        <span class="px-4 py-1.5 rounded-full bg-neutral-700 text-gray-100 text-xs sm:text-sm font-medium cursor-pointer hover:bg-orange-600 transition">History</span>
        <span class="px-4 py-1.5 rounded-full bg-neutral-700 text-gray-100 text-xs sm:text-sm font-medium cursor-pointer hover:bg-orange-600 transition">Sains</span>
        <span class="px-4 py-1.5 rounded-full bg-neutral-700 text-gray-100 text-xs sm:text-sm font-medium cursor-pointer hover:bg-orange-600 transition">Psikologi</span>
        <span class="px-4 py-1.5 rounded-full bg-neutral-700 text-gray-100 text-xs sm:text-sm font-medium cursor-pointer hover:bg-orange-600 transition">Data</span>
      </div>
  
      <!-- Section Video -->
      <section class="flex flex-col lg:flex-row gap-6 lg:gap-4 mt-6">
        <!-- main video -->
        <div class="mt-2 flex flex-col w-full lg:w-[52rem] ">
          <video id="mainVideo" class="w-full h-[14rem] sm:h-[20rem] md:h-[25rem] lg:h-[30rem]" controls preload="metadata" controls>
            <source src="../image/video-rumahbaca.mp4" type="video/mp4">
          </video>
  
          <!-- tombol dropdown untuk mobile -->
          <div class="lg:hidden mt-2">
            <button id="toggleList" class="flex justify-between items-center w-full bg-neutral-900 p-3 text-neutral-50 font-semibold">
              <div class="flex flex-col">
                <span>Terbaru</span>
                <span class="text-gray-500 text-xs sm:text-sm flex flex-start">1/20</span>
              </div>
              <div class="flex flex-row items-center gap-4">
                <i class="bi bi-arrow-down-circle text-sm text-gray-500 text-lg"></i>
                <i id="arrowIcon" class="bi bi-chevron-down transition-transform duration-300 font-bold text-green-800 text-lg"></i>
              </div>
            </button>
            <!-- List video di mobile -->
            <div id="videoListMobile" class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
              <div class="flex flex-col max-h-[18rem] overflow-y-auto">
                <!-- contoh video -->
                <div 
                  class="flex items-center gap-2 sm:gap-4 w-full cursor-pointer hover:bg-neutral-800 p-2 sm:px-4 rounded-md transition"
                  data-src="../image/video-rumahbaca.mp4"
                  data-title="Mari Berkenalan dengan program baru Ulil Albab, Rumah Baca akan membantu anak-anak bangsa">
                  <span class="video-index text-gray-500 text-xs sm:text-sm">1</span>
                  <video class="w-24 h-16 pointer-events-none">
                    <source src="../image/video-rumahbaca.mp4" type="video/mp4">
                  </video>
                  <span class="text-[11px] font-bold text-neutral-50">
                    Mari Berkenalan dengan program baru Ulil Albab, Rumah Baca akan membantu anak-anak bangsa
                  </span>
                </div>
  
                <div 
                  class="flex items-center gap-2 sm:gap-4 w-full cursor-pointer hover:bg-neutral-800 p-2 sm:px-4 rounded-md transition"
                  data-src="../image/video-rumahbaca.mp4"
                  data-title="Rumah Baca siap membantu anak-anak bangsa menjadi terbiasa literasi">
                  <span class="video-index text-gray-500 text-xs sm:text-sm">2</span>
                  <video class="w-24 h-16 pointer-events-none">
                    <source src="../image/video-rumahbaca.mp4" type="video/mp4">
                  </video>
                  <span class="text-[11px] font-bold text-neutral-50">
                    Rumah Baca siap membantu anak-anak bangsa menjadi terbiasa literasi
                  </span>
                </div>
              </div>
            </div>
          </div>
  
          <!-- Judul -->
          <div id="mainTitle" class="text-lg sm:text-xl md:text-2xl text-neutral-50 font-[poppins] font-semibold mt-4">
            Pengenalan Program Dari Ulil Albab RUMAH BACA
          </div>
          <div class="text-xs sm:text-sm text-gray-500 mt-2 sm:mt-4">September 2.2025</div>
  
          <!-- Action buttons -->
          <div class="flex gap-4 mt-4">
            <button class="flex items-center gap-2 bg-gray-800 hover:bg-gray-700 px-3 py-2 rounded-lg text-white text-sm transition">
              <i class="bi bi-bookmark-dash-fill"></i> Bookmark
            </button>
            <button class="flex items-center gap-2 bg-gray-800 hover:bg-gray-700 px-3 py-2 rounded-lg text-white text-sm transition">
              <i class="bi bi-share-fill"></i> Share
            </button>
          </div>
  
          <!-- Transcript -->
          <div class="mt-4 sm:mt-6 text-gray-400 text-xs sm:text-sm w-full lg:w-[51rem]">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio explicabo, beatae aut doloremque eaque officiis iure, ipsum in hic magni illo deserunt saepe delectus ratione, modi dolorem officia aliquid temporibus sequi! Voluptatibus cum nobis nisi doloribus. Saepe, voluptatem tempore eaque doloribus labore eligendi non alias iusto rerum eos beatae obcaecati!</p>
          </div>
        </div>
  
          <!-- Sidebar Video List -->
        <div class="hidden lg:flex flex-col w-[24rem] bg-neutral-950/70 rounded-xl shadow-lg mt-2 h-[45rem]">
          <div class="flex justify-between items-center p-4 border-b border-neutral-800 text-white font-semibold">
            <span>Terbaru</span>
            <span class="text-sm text-gray-400">1/20</span>
          </div>
          <div class="overflow-y-auto px-2">
            <div class="flex items-center gap-3 p-3 cursor-pointer hover:bg-neutral-800 transition" data-src="../image/video-rumahbaca.mp4"
            data-title="Mari Berkenalan dengan program baru Ulil Albab, Rumah Baca akan membantu anak-anak bangsa">
            <span class="video-index text-xs text-gray-500">2</span>
              <video class="w-24 h-16 rounded object-cover">
                <source src="../image/video-rumahbaca.mp4" type="video/mp4">
              </video>
              <div>
                <span class="text-[11px] font-bold text-neutral-50"> Mari Berkenalan dengan program baru Ulil Albab, Rumah Baca akan membantu anak-anak bangsa </span>
              </div>
            </div>

            <div class="flex items-center gap-3 p-3 cursor-pointer hover:bg-neutral-800 transition" data-src="../image/video-rumahbaca.mp4"
            data-title="Mari Berkenalan dengan program baru Ulil Albab, Rumah Baca akan membantu anak-anak bangsa">
            <span class="video-index text-xs text-gray-500">3</span>
              <video class="w-24 h-16 rounded object-cover">
                <source src="../image/video-rumahbaca.mp4" type="video/mp4">
              </video>
              <div>
                <span class="text-[11px] font-bold text-neutral-50"> Mari Berkenalan dengan program baru Ulil Albab, Rumah Baca akan membantu anak-anak bangsa </span>
              </div>
            </div>
            <div class="flex items-center gap-3 p-3 cursor-pointer hover:bg-neutral-800 transition" data-src="../image/video-rumahbaca.mp4"
            data-title="Mari Berkenalan dengan program baru Ulil Albab, Rumah Baca akan membantu anak-anak bangsa">
            <span class="video-index text-xs text-gray-500">3</span>
              <video class="w-24 h-16 rounded object-cover">
                <source src="../image/video-rumahbaca.mp4" type="video/mp4">
              </video>
              <div>
                <span class="text-[11px] font-bold text-neutral-50"> Mari Berkenalan dengan program baru Ulil Albab, Rumah Baca akan membantu anak-anak bangsa </span>
              </div>
            </div>
           
            
          </div>
        </div>
      </section>

    </div>

    <!-- Daftar Video (Grid bawah) -->
  <div class="px-6 sm:px-10 md:px-16 lg:px-14 mt-6 mb-6">
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
      <div class="relative group rounded-xl overflow-hidden shadow-md">
        <img src="../image/anak_membaca.jpg" alt="..." class="w-full h-48 object-cover group-hover:scale-105 transition">
        <div class="absolute inset-0 bg-black/40 group-hover:bg-black/60 transition flex flex-col justify-end p-4">
          <p class="text-white font-semibold">Khutbah</p>
          <span class="text-xs text-gray-300">12 item</span>
        </div>
      </div>
      <div class="relative group rounded-xl overflow-hidden shadow-md">
        <img src="../image/event.jpg" alt="..." class="w-full h-48 object-cover group-hover:scale-105 transition">
        <div class="absolute inset-0 bg-black/40 group-hover:bg-black/60 transition flex flex-col justify-end p-4">
          <p class="text-white font-semibold">Khutbah</p>
          <span class="text-xs text-gray-300">12 item</span>
        </div>
      </div>
      <div class="relative group rounded-xl overflow-hidden shadow-md">
        <img src="../image/event.jpg" alt="..." class="w-full h-48 object-cover group-hover:scale-105 transition">
        <div class="absolute inset-0 bg-black/40 group-hover:bg-black/60 transition flex flex-col justify-end p-4">
          <p class="text-white font-semibold">Khutbah</p>
          <span class="text-xs text-gray-300">12 item</span>
        </div>
      </div>
      <div class="relative group rounded-xl overflow-hidden shadow-md">
        <img src="../image/event.jpg" alt="..." class="w-full h-48 object-cover group-hover:scale-105 transition">
        <div class="absolute inset-0 bg-black/40 group-hover:bg-black/60 transition flex flex-col justify-end p-4">
          <p class="text-white font-semibold">Khutbah</p>
          <span class="text-xs text-gray-300">12 item</span>
        </div>
      </div>
    </section>
  </div>
  </div>

  <?php include '../footer.php'; ?>
  
  <script src="../translate.js"></script>
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>



  <script>
  document.addEventListener("DOMContentLoaded", () => {
    const mainVideo  = document.getElementById("mainVideo");
    const mainTitle  = document.getElementById("mainTitle");
    const items      = document.querySelectorAll("[data-src]");
    const toggleBtn  = document.getElementById("toggleList");
    const listMobile = document.getElementById("videoListMobile");
    const arrowIcon  = document.getElementById("arrowIcon");

    // Klik pilih video
    items.forEach((item, i) => {
      item.addEventListener("click", () => {
        const newSrc   = item.getAttribute("data-src");
        const newTitle = item.getAttribute("data-title");

        if (mainVideo && newSrc) {
          const srcEl = mainVideo.querySelector("source");
          if (srcEl) {
            srcEl.src = newSrc;
            mainVideo.load();
            mainVideo.play();
          }
        }
        if (mainTitle && newTitle) {
          mainTitle.textContent = newTitle;
        }

        // reset semua nomor
        items.forEach((el, idx) => {
          const indexEl = el.querySelector(".video-index");
          if (indexEl) {
            indexEl.innerHTML = idx + 0;
            indexEl.classList.remove("text-green-400");
          }
        });

        // tandai item aktif
        const indexEl = item.querySelector(".video-index");
        if (indexEl) {
          indexEl.innerHTML = '<i class="bi bi-play-fill"></i>';
          indexEl.classList.add("text-green-400");
        }
      });
    });

    // Dropdown mobile
    if (toggleBtn && listMobile) {
      listMobile.style.maxHeight = "0px"; // awalnya tertutup
      toggleBtn.addEventListener("click", () => {
        const isClosed = listMobile.style.maxHeight === "0px";
        if (isClosed) {
          listMobile.style.maxHeight = listMobile.scrollHeight + "px";
          arrowIcon && arrowIcon.classList.add("rotate-90");
        } else {
          listMobile.style.maxHeight = "0px";
          arrowIcon && arrowIcon.classList.remove("rotate-90");
        }
      });
    }
  });
  </script>
</body>
</html>
