// CONFIG
const API_LOGIN   = "https://rbca-api.vercel.app/api/auth/login";
const API_PROFILE = "https://rbca-api.vercel.app/api/user/profile";

const STORAGE_KEY = "rbca_auth"; // menyimpan { token, expires } sebagai JSON

// Simpan token
function storeToken(token, ttlSeconds = 3600) {
  const payload = {
    token,
    expires: Date.now() + ttlSeconds * 1000
  };
  localStorage.setItem(STORAGE_KEY, JSON.stringify(payload));
}

// Ambil token
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

// Hapus token
function clearToken() {
  localStorage.removeItem(STORAGE_KEY);
}

// Redirect helper
function redirectToLogin() {
  if (window.location.pathname.includes("/dashboard-admin/")) {
    window.location.href = "../login.html";
  } else {
    window.location.href = "login.html";
  }
}
function redirectToDashboard() {
  window.location.href = "../dashboard-admin/index.html";
}

// Cek apakah sudah login
function checkAuth() {
  const token = readToken();
  if (!token) {
    redirectToLogin();
  }
}

// 🔑 Fungsi login
async function login(email, password) {
  try {
    const res = await fetch(API_LOGIN, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ email, password }) // kalau backend pakai username, ubah jadi { username, password }
    });

    const data = await res.json();
    console.log("Response login:", data); // Debugging, cek format respons

    // Ambil token dari beberapa kemungkinan field
    const token = data.token || data.accessToken || data?.data?.token;

    if (res.ok && token) {
      storeToken(token, 3600); // simpan 1 jam
      redirectToDashboard();
    } else {
      alert("Login gagal: " + (data.message || "Periksa email/password"));
    }
  } catch (err) {
    console.error("Login error:", err);
    alert("Terjadi kesalahan saat login");
  }
}

// 🔒 Ambil profil user
async function getProtectedData() {
  const token = readToken();
  if (!token) throw new Error("Unauthorized");

  const res = await fetch(API_PROFILE, {
    method: "GET",
    headers: { "Authorization": "Bearer " + token }
  });

  if (!res.ok) throw new Error("Request failed: " + res.status);
  return await res.json();
}

// Logout
function logout() {
  clearToken();
  redirectToLogin();
}

// Hubungkan form login
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("loginForm");
  if (form) {
    form.addEventListener("submit", (e) => {
      e.preventDefault();
      const email = document.getElementById("email").value.trim();
      const password = document.getElementById("password").value;
      login(email, password);
    });
  }
});

// Export
window.rbcaAuth = { checkAuth, getProtectedData, logout, readToken };
