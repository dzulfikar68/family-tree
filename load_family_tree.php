<?php
$file = "family_tree.json";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] !== "GET") {
    http_response_code(405);
    echo json_encode(["error" => "Metode tidak diizinkan!"]);
    exit;
}

if (file_exists($file)) {
    echo file_get_contents($file);
} else {
    http_response_code(404);
    echo json_encode(["error" => "File tidak ditemukan!"]);
}
?>
