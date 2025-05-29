<?php
$host = 'localhost';
$db = 'esemenyek';
$user = 'root';
$pass = '';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['error' => 'DB hiba']);
  exit;
}
?>