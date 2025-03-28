<?php
define("PASSWORD", "12345"); // Ganti dengan password yang aman
$file = "family_tree.json";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    http_response_code(200);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo "Metode tidak diizinkan!";
    exit;
}

$password = $_POST["password"] ?? "";
$data = $_POST["data"] ?? "";

if ($password !== PASSWORD) {
    http_response_code(403);
    echo "Password salah!";
    exit;
}

if (empty($data)) {
    http_response_code(400);
    echo "Data tidak boleh kosong!";
    exit;
}

// Simpan ke file
if (file_put_contents($file, $data)) {
    echo "Data berhasil disimpan!";
} else {
    http_response_code(500);
    echo "Gagal menyimpan data!";
}
?>
