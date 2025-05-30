<?php
require '../db.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'] ?? '';
  $description = $_POST['description'] ?? '';
  $date = $_POST['date'] ?? '';
  $location = $_POST['location'] ?? '';

  if (!$name || !$description || !$date || !$location) {
    http_response_code(400);
    echo json_encode(['error' => 'Minden mező kötelező']);
    exit;
  }

  $stmt = $pdo->prepare("INSERT INTO events (name, description, date, location) VALUES (?, ?, ?, ?)");
  $stmt->execute([$name, $description, $date, $location]);

  http_response_code(201);
  echo json_encode(['success' => true]);
}
