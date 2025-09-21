
// auth.js - Logika authentication yang bisa digunakan di berbagai halaman
const API_LOGIN = "https://rbca-api.vercel.app/api/auth/login";
const API_GOOGLE_AUTH = "https://rbca-api.vercel.app/api/auth/google-auth";
const API_LOGOUT = "https://rbca-api.vercel.app/api/auth/logout";

// Konfigurasi Firebase
const firebaseConfig = {
  apiKey: "AIzaSyDXr1twM0CeAVenm82_SjPf3WIdsODmWQY",
  authDomain: "rbca-web.firebaseapp.com",
  projectId: "rbca-web",
  storageBucket: "rbca-web.firebasestorage.app",
  messagingSenderId: "280055473070",
  appId: "1:280055473070:web:e2d2f800e946a768155e3f"
};

// Inisialisasi Firebase
if (!firebase.apps.length) {
  firebase.initializeApp(firebaseConfig);
}

// Fungsi untuk menampilkan popup login
function showLoginPopup() {
  const loginPopup = document.getElementById('loginPopup');
  if (loginPopup) {
    loginPopup.classList.remove('hidden');
    loginPopup.classList.add('flex');
  }
}

// Fungsi untuk menutup popup login
function closeLoginPopup() {
  const loginPopup = document.getElementById('loginPopup');
  if (loginPopup) {
    loginPopup.classList.add('hidden');
    loginPopup.classList.remove('flex');
  }
}

// Fungsi untuk menangani login dengan email/password
async function handleLogin(e) {
  e.preventDefault();
  
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;
  const loginSpinner = document.getElementById('loginSpinner');
  const loginError = document.getElementById('loginError');
  
  // Tampilkan loading
  if (loginSpinner) loginSpinner.classList.remove('hidden');
  if (loginError) loginError.classList.add('hidden');
  
  try {
    const response = await fetch(API_LOGIN, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ email, password })
    });
    
    const data = await response.json();
    
    if (response.ok) {
      // Simpan token di localStorage
      localStorage.setItem('authToken', data.token);
      localStorage.setItem('user', JSON.stringify(data.user));
      
      // Redirect ke dashboard
      window.location.href = '../dashboard-user/index.html';
    } else {
      throw new Error(data.message || 'Login failed');
    }
  } catch (error) {
    if (loginError) {
      loginError.textContent = error.message;
      loginError.classList.remove('hidden');
    }
  } finally {
    if (loginSpinner) loginSpinner.classList.add('hidden');
  }
}

// Fungsi untuk menangani login Google
async function handleGoogleLogin() {
  const loginSpinner = document.getElementById('loginSpinner');
  const loginError = document.getElementById('loginError');
  
  try {
    const provider = new firebase.auth.GoogleAuthProvider();
    const result = await firebase.auth().signInWithPopup(provider);
    
    // Dapatkan token ID dari Google
    const idToken = await result.user.getIdToken();
    
    // Tampilkan loading
    if (loginSpinner) loginSpinner.classList.remove('hidden');
    if (loginError) loginError.classList.add('hidden');
    
    // Kirim token ke backend
    const response = await fetch(API_GOOGLE_AUTH, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ idToken })
    });
    
    const data = await response.json();
    
    if (response.ok) {
      // Simpan token di localStorage
      localStorage.setItem('authToken', data.token);
      localStorage.setItem('user', JSON.stringify(data.user));
      
      // Redirect ke dashboard
      window.location.href = '../dashboard-user/index.html';
    } else {
      throw new Error(data.message || 'Google login failed');
    }
  } catch (error) {
    if (loginError) {
      loginError.textContent = error.message;
      loginError.classList.remove('hidden');
    }
  } finally {
    if (loginSpinner) loginSpinner.classList.add('hidden');
  }
}

// Fungsi untuk logout
async function logout() {
  try {
    const token = localStorage.getItem('authToken');
    
    // Panggil API logout
    await fetch(API_LOGOUT, {
      method: 'POST',
      headers: {
        'Authorization': `Bearer ${token}`
      }
    });
  } catch (error) {
    console.error('Logout error:', error);
  } finally {
    // Hapus data dari localStorage
    localStorage.removeItem('authToken');
    localStorage.removeItem('user');
    
    // Redirect ke halaman beranda
    window.location.href = '../index.html';
  }
}

// Fungsi untuk cek status login
function checkLoginStatus() {
  const token = localStorage.getItem('authToken');
  const user = JSON.parse(localStorage.getItem('user') || '{}');
  
  if (token) {
    // Update UI untuk state logged in
    const profileBtnDesktop = document.getElementById('profileBtnDesktop');
    const mobileMenuLoggedIn = document.getElementById('mobileMenuLoggedIn');
    
    if (profileBtnDesktop) {
      // Ganti icon dengan avatar user jika ada
      if (user.avatar) {
        profileBtnDesktop.innerHTML = `<img src="${user.avatar}" class="w-9 h-9 rounded-full object-cover" alt="Profile">`;
      }
    }
    
    // Tampilkan menu tambahan di mobile
    if (mobileMenuLoggedIn) {
      mobileMenuLoggedIn.classList.remove('hidden');
    }
  }
}

// Fungsi untuk setup event listeners navbar
function setupNavbarEvents() {
  // Event listener untuk form login
  const loginForm = document.getElementById('loginForm');
  if (loginForm) {
    loginForm.addEventListener('submit', handleLogin);
  }

  // Event listener untuk login Google
  const googleLoginBtn = document.getElementById('googleLoginBtn');
  if (googleLoginBtn) {
    googleLoginBtn.addEventListener('click', handleGoogleLogin);
  }

  // Event listener untuk logout
  const logoutBtn = document.getElementById('logoutBtn');
  if (logoutBtn) {
    logoutBtn.addEventListener('click', logout);
  }

  const mobileLogoutBtn = document.getElementById('mobileLogoutBtn');
  if (mobileLogoutBtn) {
    mobileLogoutBtn.addEventListener('click', logout);
  }

  // Event listener untuk tombol profile
  const profileBtnDesktop = document.getElementById('profileBtnDesktop');
  if (profileBtnDesktop) {
    profileBtnDesktop.addEventListener('click', function() {
      const isLoggedIn = localStorage.getItem('authToken');
      
      if (isLoggedIn) {
        // Toggle dropdown profile jika sudah login
        const profileDropdown = document.getElementById('profileDropdown');
        if (profileDropdown) {
          profileDropdown.classList.toggle('hidden');
        }
      } else {
        // Tampilkan popup login jika belum login
        showLoginPopup();
      }
    });
  }

  const profileBtnMobile = document.getElementById('profileBtnMobile');
  if (profileBtnMobile) {
    profileBtnMobile.addEventListener('click', function() {
      const isLoggedIn = localStorage.getItem('authToken');
      
      if (isLoggedIn) {
        // Untuk mobile, mungkin ingin menampilkan menu atau dropdown
        const mobileMenuLoggedIn = document.getElementById('mobileMenuLoggedIn');
        if (mobileMenuLoggedIn) {
          mobileMenuLoggedIn.classList.toggle('hidden');
        }
      } else {
        // Tampilkan popup login jika belum login
        showLoginPopup();
      }
    });
  }

  // Event listener untuk menutup popup
  const closePopup = document.getElementById('closePopup');
  if (closePopup) {
    closePopup.addEventListener('click', closeLoginPopup);
  }
}

// Jalankan saat dokumen siap
document.addEventListener('DOMContentLoaded', function() {
  checkLoginStatus();
  setupNavbarEvents();
});

// Fungsi untuk menangani navbar yang dimuat secara dinamis
function initAuth() {
  // Coba setup events, jika gagal coba lagi setelah delay
  const loginForm = document.getElementById('loginForm');
  const googleLoginBtn = document.getElementById('googleLoginBtn');
  
  if (loginForm || googleLoginBtn) {
    // Elemen sudah ada, setup events langsung
    setupNavbarEvents();
    checkLoginStatus();
  } else {
    // Elemen belum ada, coba lagi setelah 100ms
    setTimeout(initAuth, 100);
  }
}

// Jalankan inisialisasi
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initAuth);
} else {
  initAuth();
}

// Juga dengarkan event navbarLoaded untuk kasus navbar dimuat dinamis
document.addEventListener('navbarLoaded', initAuth);