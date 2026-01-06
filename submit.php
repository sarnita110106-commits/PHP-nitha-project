<?php
header('Access-Control-Allow-Origin: *');

$api_info = [
    "status" => "Online",
    "server_time" => date('Y-m-d H:i:s'),
    "api_name" => "Lavender-Gateway",
    "endpoint" => $_SERVER['PHP_SELF'],
    "author" => "Gemini AI Assistant"
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    $nama  = isset($_POST['nama']) ? trim($_POST['nama']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $nomor = isset($_POST['nomor']) ? trim($_POST['nomor']) : '';
    $pesan = isset($_POST['pesan']) ? trim($_POST['pesan']) : '';

    if (empty($nama)) {
        $errors[] = "Nama wajib diisi.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    } elseif (!preg_match('/@(gmail\.com|yahoo\.com)$/i', $email)) {
        $errors[] = "Hanya menerima email dari @gmail.com atau @yahoo.com.";
    }

    if (empty($nomor)) {
        $errors[] = "Nomor HP wajib diisi.";
    } elseif (!ctype_digit($nomor)) {
        $errors[] = "Nomor HP harus berupa angka saja (tanpa spasi/simbol).";
    }

    if (strlen($pesan) < 10) {
        $errors[] = "Isi pesan minimal harus 10 karakter.";
    }

    if (!empty($errors)) {
        header('Content-Type: application/json');
        echo json_encode([
            "success" => false,
            "message" => "Validasi Gagal",
            "errors" => $errors,
            "api_log" => $api_info
        ], JSON_PRETTY_PRINT);
    } else {
        
        $file = 'laporan.txt';
        $waktu = date('Y-m-d H:i:s');
        $isi_laporan = "=== DATA MASUK ($waktu) ===\n" .
                       "Nama  : $nama\n" .
                       "Email : $email\n" .
                       "HP    : $nomor\n" .
                       "Pesan : $pesan\n" .
                       "============================\n\n";

        file_put_contents($file, $isi_laporan, FILE_APPEND);

        echo "<body style='background:#E6E6FA; font-family:sans-serif; display:flex; justify-content:center; align-items:center; height:100vh; margin:0;'>";
        echo "<div style='background:white; padding:40px; border-radius:30px; text-align:center; box-shadow:0 10px 30px rgba(0,0,0,0.1);'>";
        echo "<h1 style='color:#A699C3;'>🫶Berhasil!</h1>";
        echo "<p style='color:#555;'>Data Anda telah aman tersimpan di <b>laporan.txt</b></p>";
        echo "<p style='font-size:0.8rem; color:#aaa;'>Timestamp: $waktu</p>";
        echo "<br><a href='index.php' style='text-decoration:none; background:#BDB5D5; color:white; padding:10px 25px; border-radius:12px;'>Kembali</a>";
        echo "</div></body>";
    }

} else {
    header('Content-Type: application/json');
    echo json_encode([
        "message" => "Welcome to Lavender Message Root API",
        "instruction" => "Please send data using POST method from the form.",
        "server_status" => $api_info
    ], JSON_PRETTY_PRINT);
}