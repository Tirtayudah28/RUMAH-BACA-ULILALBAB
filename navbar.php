<?php 
include 'config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pojok Baca</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">


  <style>
    body { font-family: 'Poppins', sans-serif; color:#0f172a; }
    .navbar{ transition: top .4s ease; }
    .nav-link{ position:relative; }
    .nav-link:after{
      content:""; position:absolute; left:0; bottom:-6px; height:2px; width:0;
      background:linear-gradient(90deg,#0ea5a0,#f97316); transition:width .25s;
    }
    .nav-link:hover:after{ width:100%; }
    .btn-primary{ background:linear-gradient(90deg,#f97316,#fb923c); color:#fff; }
    .btn-primary:hover{ filter:brightness(.95); }
    .hover-green:hover{ color:#0ea5a0; }
    .hover-bg-green:hover{ background:rgba(14,165,160,.08); }
    .hover-bg-orange:hover{ background:#fed7aa; }

    .navbar {
      transition: top .4s ease;
    }
    .navbar-hide {
      top: -100%; /* sembunyikan penuh */
    }
     .nav-active { color: #16a34a; font-weight: 600; }
  </style>
</head>
<body class="bg-gray-50">

  <!-- Navbar -->
  <header id="navbar" class="navbar fixed top-0 left-0 w-full bg-white border-b border-gray-100 z-50">
    <!-- ✅ container sudah diperbaiki -->
    <div class="w-full max-w-full md:max-w-7xl mx-auto px-4 lg:px-8">
      <div class="h-16 flex items-center justify-between">
        
        <!-- Logo -->
        <a href="../beranda/index.php" class="flex items-center gap-3 md:gap-4">
          <!-- ✅ logo responsive -->
          <img src="<?= $base_url ?>image/logo.png" 
               alt="Rumah Baca" 
               class="h-12 sm:h-16 md:h-16 w-auto max-w-[150px] object-contain">
        </a>

        <!-- Menu Desktop -->
        <nav class="hidden lg:flex gap-6 items-center font-bold text-gray-400 text-sm">
          <a href="<?= $base_url ?>index.php" class="nav-link hover:text-green-600 mr-[-0.2rem]" data-key="home">Beranda</a>
          <a href="<?= $base_url ?>tentang-kami" class="nav-link hover:text-green-600" data-key="about">Tentang Kami</a>
          <a href="<?= $base_url ?>program" class="nav-link hover:text-green-600" data-key="program">Program</a>

           <!-- Dropdown Media -->
          <div class="relative">
            <button id="mediaBtn" class="nav-link hover:text-green-600 flex items-center" type="button">
              Media
              <svg class="w-2.5 h-2.5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 10 6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
              </svg>
            </button>
            <div id="mediaDropdown" class="absolute hidden bg-white shadow-lg mt-2 rounded-lg py-2 w-40">
              <a href="<?= $base_url ?>berita" class="block px-4 py-2 hover:bg-green-100 hover:text-green-600" data-key="news">Berita</a>
              <a href="<?= $base_url ?>publikasi" class="block px-4 py-2 hover:bg-green-100 hover:text-green-600" data-key="publication">Publikasi</a>
              <a href="<?= $base_url ?>video" class="block px-4 py-2 hover:bg-green-100 hover:text-green-600" data-key="watch">video</a>
            </div>
          </div>

          <a href="<?= $base_url ?>pojok-baca" class="nav-link hover:text-green-600" data-key="pojok">Pojok Baca</a>
          <a href="<?= $base_url ?>hubungi-kami" class="nav-link hover:text-green-600" data-key="contact">Hubungi Kami</a>
          <a href="<?= $base_url ?>donasi" class="btn-primary rounded-lg px-4 py-2 font-semibold shadow-soft" data-key="donate">Donasi</a>

          <!-- Bahasa -->
           <button id="languageDropdownButton" data-dropdown-toggle="language-dropdown" class="nav-link hover:text-green-600 flex items-center" type="button">Bahasa<svg class="w-2.5 h-2.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/></svg>
          </button>
          <!-- Dropdown menu -->
          <div id="language-dropdown" class="absolute right-0 mt-3 w-40 rounded-xl bg-white border shadow-lg py-2 hidden">
              <a href="?lang=id" class="block px-4 py-2 hover:bg-green-100">🇮🇩 Indonesia</a>
              <a href="?lang=en" class="block px-4 py-2 hover:bg-green-100">🇬🇧 English</a>
          </div>

          <!-- Profile/Login -->
          <div class="relative">
            <button id="profileBtn" class="w-9 h-9 rounded-full bg-gray-200 flex items-center justify-center hover:ring-2 ring-offset-2 ring-[#0ea5a0]">
              <svg class="w-6 h-6 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z"/>
              </svg>
            </button>
            <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white border shadow-lg rounded-lg py-2 hidden">
              <a href="#" id="myProfile" class="block px-4 py-2 hover:bg-green-100" data-key="profile">Profil Saya</a>
              <a href="#" id="uploadBook" class="block px-4 py-2 hover:bg-green-100" data-key="upload">Upload Buku</a>
              <a href="#" id="logoutBtn" class="block px-4 py-2 hover:bg-green-100 text-red-500 font-semibold" data-key="logout">Logout</a>
            </div>
          </div>
        </nav>

          <!-- Hamburger Mobile -->
        <div class="flex items-center lg:hidden">
          <button id="hamburger" class="focus:outline-none">
            <svg class="w-8 h-8 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="fixed top-0 right-0 w-[80%] max-w-xs h-full bg-white shadow-lg hidden translate-x-full transition-transform duration-300 flex-col p-6 z-40">
      <button id="closeMenu" class="self-end mb-6 text-2xl">✖</button>
      <a href="<?= $base_url ?>index.php" class="block py-2 font-semibold" data-key="home">Beranda</a>
      <a href="<?= $base_url ?>tentang-kami" class="block py-2 font-semibold" data-key="about">Tentang Kami</a>
      <a href="<?= $base_url ?>program" class="block py-2 font-semibold" data-key="program">Program</a>
      <details class="py-2">
        <summary class="cursor-pointer font-semibold">Media</summary>
        <a href="<?= $base_url ?>berita" class="block py-2 pl-4" data-key="news">Berita</a>
        <a href="<?= $base_url ?>publikasi" class="block py-2 pl-4" data-key="publication">Publikasi</a>
        <a href="<?= $base_url ?>video" class="block py-2 pl-4" data-key="watch">video</a>
      </details>
      <a href="<?= $base_url ?>pojok-baca" class="block py-2 font-semibold" data-key="pojok">Pojok Baca</a>
      <a href="<?= $base_url ?>hubungi-kami" class="block py-2 font-semibold" data-key="contact">Hubungi Kami</a>
      <div class="mt-4">
        <p class="text-sm text-gray-500 mb-2">Pilih Bahasa:</p>
        <a href="?lang=id" class="block py-1">🇮🇩 Indonesia</a>
        <a href="?lang=en" class="block py-1">🇬🇧 English</a>
      </div>
      <a href="<?= $base_url ?>donasi" class="block btn-primary rounded-lg px-4 py-2 mt-6 text-center text-orange-600 font-bold" data-key="donate">Donasi</a>
    </div>
  </header>

  <!-- Popup Login -->
  <div id="loginPopup" class="hidden fixed inset-0 bg-black/50 z-[60] items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 relative">
      <button id="closePopup" class="absolute top-3 right-3 p-2 rounded-lg hover-bg-green">✖</button>
      <h2 class="text-xl font-bold mb-1 text-[#0ea5a0]">Log in or Sign up</h2>
      <p class="text-sm text-gray-600 mb-4">Continue with</p>
      <div class="grid grid-cols-3 gap-3 mb-4">
        <button id="loginGoogle" class="border rounded-lg py-2 font-semibold hover-bg-green">G</button>
        <button id="loginFacebook" class="border rounded-lg py-2 font-semibold hover-bg-green">f</button>
        <button id="loginApple" class="border rounded-lg py-2 font-semibold hover-bg-green"></button>
      </div>
      <div class="flex items-center my-4">
        <hr class="flex-1 border-gray-300">
        <span class="px-3 text-gray-400 text-sm">Or</span>
        <hr class="flex-1 border-gray-300">
      </div>
      <input id="emailInput" type="email" placeholder="Email address" class="w-full border rounded-lg px-3 py-2 mb-3 focus:outline-none focus:ring-2 focus:ring-emerald-300">
      <button id="loginEmailBtn" class="w-full bg-amber-400 hover:bg-amber-500 py-2 rounded-lg font-bold">Continue</button>
      <p class="text-xs mt-3 text-gray-500">
        By signing up, I agree to <a href="#" class="text-[#f97316]">terms of use</a> and <a href="#" class="text-[#f97316]">privacy policy</a>.
      </p>
    </div>
  </div>


  <script src="translate.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
 <!-- === perbaikan dropdown bahasa dan hamburger === -->
<script>

  // ===== Navbar Scroll Hide/Show =====
  let lastScroll = 0;
  const navbar = document.getElementById('navbar');
  window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;
    if (Math.abs(currentScroll - lastScroll) < 5) return;

    if (currentScroll > lastScroll && currentScroll > navbar.offsetHeight) {
      navbar.classList.add('navbar-hide');
    } else {
      navbar.classList.remove('navbar-hide');
    }
    lastScroll = currentScroll <= 0 ? 0 : currentScroll;
  });

  // ===== Mobile Menu =====
  const hamburger = document.getElementById('hamburger');
  const mobileMenu = document.getElementById('mobileMenu');
  const closeMenu = document.getElementById('closeMenu');

  hamburger.addEventListener('click', () => {
    mobileMenu.classList.remove('hidden');          
    setTimeout(() => {
      mobileMenu.classList.remove('translate-x-full'); 
      mobileMenu.classList.add('translate-x-0');
    }, 10);
  });

  closeMenu.addEventListener('click', () => {
    mobileMenu.classList.remove('translate-x-0');
    mobileMenu.classList.add('translate-x-full');
    setTimeout(() => mobileMenu.classList.add('hidden'), 300);
  });

  // ===== Popup Login =====
  const profileBtn = document.getElementById('profileBtn');
  const loginPopup = document.getElementById('loginPopup');
  const closePopup = document.getElementById('closePopup');
  const profileDropdown = document.getElementById("profileDropdown");

  profileBtn.addEventListener('click', () => { 
    loginPopup.classList.remove('hidden'); 
    loginPopup.classList.add('flex'); 
  });
  closePopup.addEventListener('click', () => { 
    loginPopup.classList.add('hidden'); 
    loginPopup.classList.remove('flex'); 
  });

  // ===== Dropdown Desktop =====
  const mediaBtn = document.getElementById('mediaBtn');
  const mediaDropdown = document.getElementById('mediaDropdown');
  const langBtn = document.getElementById('languageDropdownButton'); // ✅ disamakan
  const langDropdown = document.getElementById('language-dropdown'); // ✅ disamakan

  mediaBtn.addEventListener('click', () => {
    mediaDropdown.classList.toggle('hidden');
  });
  langBtn.addEventListener('click', () => {
    langDropdown.classList.toggle('hidden');
  });

  // ===== Social Login =====
  document.getElementById('loginGoogle').addEventListener('click', () => {
    signInWithPopup(auth, new GoogleAuthProvider()).then(() => {
      loginPopup.classList.add('hidden');
    }).catch(console.error);
  });

  document.getElementById('loginFacebook').addEventListener('click', () => {
    signInWithPopup(auth, new FacebookAuthProvider()).then(() => {
      loginPopup.classList.add('hidden');
    }).catch(console.error);
  });

  document.getElementById('loginApple').addEventListener('click', () => {
    signInWithPopup(auth, new OAuthProvider('apple.com')).then(() => {
      loginPopup.classList.add('hidden');
    }).catch(console.error);
  });

  // ===== Login via Email Link =====
  document.getElementById('loginEmailBtn').addEventListener('click', () => {
    const email = document.getElementById('emailInput').value;
    sendSignInLinkToEmail(auth, email, {
      url: window.location.href,
      handleCodeInApp: true
    }).then(() => {
      window.localStorage.setItem('emailForSignIn', email);
      alert("Cek email untuk verifikasi login.");
    }).catch(console.error);
  });

</script>


</body>
</html>
