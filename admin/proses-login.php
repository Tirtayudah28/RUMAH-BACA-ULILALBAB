<?php
session_start();
include '../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // cari admin berdasarkan email
    $stmt = $conn->prepare("SELECT * FROM admins WHERE email = ? AND status = 'aktif'");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // cek password
        if (password_verify($password, $row['password'])) {
            // login sukses
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_name'] = $row['email'];
            $_SESSION['role'] = $row['role'];

            header("Location: ../dashboard/index.php");
            exit();
        } else {
            $_SESSION['error'] = "Password salah.";
        }
    } else {
        $_SESSION['error'] = "Akun tidak ditemukan atau nonaktif.";
    }

    header("Location: index.php");
    exit();
}
