<?php
require '../db.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['event_id'])) {
  $name = $_POST['name'] ?? '';
  $email = $_POST['email'] ?? '';
  if (!$name || !$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['error' => 'Hibás adatok']);
    exit;
  }

  $stmt = $pdo->prepare("INSERT INTO registrations (event_id, name, email) VALUES (?, ?, ?)");
  $stmt->execute([$_GET['event_id'], $name, $email]);
  http_response_code(201);
  echo json_encode(['success' => true]);
}
?>