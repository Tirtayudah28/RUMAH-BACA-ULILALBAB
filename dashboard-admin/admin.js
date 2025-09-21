    const API_PROFILE = "https://rbca-api.vercel.app/api/user/profile";
    const API_LOGOUT = "https://rbca-api.vercel.app/api/auth/logout";
    const STORAGE_KEY = "rbca_auth";

    // Profile
   function readToken() {
  try {
    const s = localStorage.getItem(STORAGE_KEY);
    if (!s) return null;
    const obj = JSON.parse(s);
    if (!obj.token || !obj.expires) return null;
    if (Date.now() > obj.expires) {
      localStorage.removeItem(STORAGE_KEY);
      return null;
    }
    return obj.token;
  } catch {
    return null;
  }
}

async function loadProfile() {
  const token = readToken();
  if (!token) {
    window.location.href = "../login/login.html";
    return;
  }

  try {
    const res = await fetch(API_PROFILE, {
      headers: { "Authorization": `Bearer ${token}` }
    });

    if (!res.ok) throw new Error("Unauthorized");

    const user = await res.json();
    console.log("Profile data:", user);

    // Update UI
    document.getElementById("profileName").textContent =
      user.name || user.username || "User";

    document.getElementById("profileEmail").textContent =
      user.email || "-";

    document.getElementById("profileAvatar").src =
      user.profilePicture || "../image/logo.png";
  } catch (err) {
    console.error("Auth error:", err);
    localStorage.removeItem(STORAGE_KEY);
    window.location.href = "../login/login.html";
  }
}

document.addEventListener("DOMContentLoaded", loadProfile);

    // Logout
function readToken() {
  try {
    const s = localStorage.getItem(STORAGE_KEY);
    if (!s) return null;
    const obj = JSON.parse(s);
    if (!obj.token || !obj.expires) return null;
    if (Date.now() > obj.expires) {
      localStorage.removeItem(STORAGE_KEY);
      return null;
    }
    return obj.token;
  } catch {
    return null;
  }
}

async function logout() {
  const token = readToken();
  try {
    if (token) {
      await fetch(API_LOGOUT, {
        method: "POST",
        headers: {
          "Authorization": `Bearer ${token}`,
          "Content-Type": "application/json"
        }
      });
    }
  } catch (err) {
    console.error("Logout error:", err);
  } finally {
    // Hapus token lokal dan redirect ke login
    localStorage.removeItem(STORAGE_KEY);
    window.location.href = "../login/index.html";
  }
}

document.addEventListener("DOMContentLoaded", () => {
  const logoutBtn = document.getElementById("logoutBtn");
  if (logoutBtn) {
    logoutBtn.addEventListener("click", (e) => {
      e.preventDefault(); // cegah pindah halaman langsung
      logout();
    });
  }
});


// Pasang ke tombol
document.addEventListener("DOMContentLoaded", () => {
  const logoutBtn = document.getElementById("logoutBtn");
  if (logoutBtn) {
    logoutBtn.addEventListener("click", (e) => {
      e.preventDefault();
      logout();
    });
  }
});
  feather.replace();
  
  // Dark mode toggle functionality
  const themeToggleBtn = document.getElementById('theme-toggle');
  const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
  const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

  // Change the icons inside the button based on previous settings
  if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden');
    document.documentElement.classList.add('dark');
  } else {
    themeToggleDarkIcon.classList.remove('hidden');
    document.documentElement.classList.remove('dark');
  }

  themeToggleBtn.addEventListener('click', function() {
    // toggle icons
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    // if set via local storage previously
    if (localStorage.getItem('color-theme')) {
      if (localStorage.getItem('color-theme') === 'light') {
        document.documentElement.classList.add('dark');
        localStorage.setItem('color-theme', 'dark');
      } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('color-theme', 'light');
      }

    // if NOT set via local storage previously
    } else {
      if (document.documentElement.classList.contains('dark')) {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('color-theme', 'light');
      } else {
        document.documentElement.classList.add('dark');
        localStorage.setItem('color-theme', 'dark');
      }
    }
  });

   // Donasi Chart
  const ctxDonasi = document.getElementById('donasiChart').getContext('2d');
  const gradient = ctxDonasi.createLinearGradient(0, 0, 0, 400);
  gradient.addColorStop(0, 'rgba(16, 185, 129, 0.4)');
  gradient.addColorStop(1, 'rgba(16, 185, 129, 0)');

  new Chart(ctxDonasi, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
      datasets: [{
        label: 'Donasi',
        data: [120, 190, 300, 250, 400, 320],
        borderColor: '#10b981',
        backgroundColor: gradient,
        fill: true,
        tension: 0.4,
        pointRadius: 4,
        pointBackgroundColor: '#10b981'
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false },
        tooltip: {
          backgroundColor: '#1f2937',
          titleColor: '#fff',
          bodyColor: '#d1d5db',
          padding: 10,
          cornerRadius: 8
        }
      },
      scales: {
        x: { grid: { display: false }, ticks: { color: '#6b7280' } },
        y: { grid: { color: 'rgba(0,0,0,0.05)' }, ticks: { color: '#6b7280' } }
      }
    }
  });

  // Buku Chart
  new Chart(document.getElementById('bukuChart'), {
    type: 'doughnut',
    data: {
      labels: ['Fiksi', 'Non-Fiksi', 'Anak', 'Referensi'],
      datasets: [{
        data: [300, 150, 100, 80],
        backgroundColor: ['#10b981', '#3b82f6', '#f59e0b', '#ef4444'],
        borderWidth: 2,
        borderColor: '#fff'
      }]
    },
    options: {
      cutout: '70%',
      plugins: {
        legend: { position: 'bottom', labels: { color: '#6b7280' } },
        tooltip: { backgroundColor: '#1f2937', titleColor: '#fff', bodyColor: '#d1d5db' }
      }
    }
  });


  // Auth
  if (typeof rbcaAuth !== 'undefined') {
    rbcaAuth.checkAuth();
    async function loadProfile() {
      try {
        const profile = await rbcaAuth.getProtectedData();
        document.getElementById("adminName").textContent = profile.name || profile.email || "Admin";
      } catch (err) {
        console.error(err);
        rbcaAuth.logout();
      }
    }
    loadProfile();
<<<<<<< HEAD
  }
=======
  }
>>>>>>> 28de91cc8a1cda52f11af5c48f82f4bd0789801f
