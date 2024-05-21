<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    // Validasi sederhana
    if (empty($email) || empty($message)) {
        echo "Email dan pesan tidak boleh kosong.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Format email tidak valid.";
        exit;
    }

    // Simpan data ke database atau kirim email
    // Kode untuk menyimpan ke database atau mengirim email bisa ditambahkan di sini
    // Contoh: Simpan ke file sebagai simulasi
    $file = fopen("messages.txt", "a");
    fwrite($file, "Email: $email\nPesan: $message\n\n");
    fclose($file);

    // Umpan balik kepada pengguna
    echo "Pesan Anda telah berhasil dikirim.";
} else {
    echo "Metode pengiriman tidak valid.";
}
?>