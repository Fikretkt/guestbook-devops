<?php
// Hata raporlamayı açıyoruz ki GitHub loglarında görebilelim
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");

// Çevresel değişkenleri al
$host = getenv('DB_HOST');
$db   = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');

try {
    // MySQL'e bağlanmayı dene
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM entries");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(["status" => "success", "data" => $results]);
} catch (PDOException $e) {
    // HATA DURUMU: Burası mülakatlarda 'Error Handling' olarak geçer.
    header("HTTP/1.1 500 Internal Server Error");
    echo json_encode([
        "status" => "error",
        "debug_info" => $e->getMessage(), // GERÇEK HATA MESAJI BURADA
        "attempted_host" => $host
    ]);
}