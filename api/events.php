<?php
require '../db.php';
header('Content-Type: application/json');

if (isset($_GET['id'])) {
  $stmt = $pdo->prepare("SELECT * FROM events WHERE id = ?");
  $stmt->execute([$_GET['id']]);
  $event = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($event) {
    // Jelentkezők lekérdezése
    $registrations = $pdo->prepare("SELECT name, email FROM registrations WHERE event_id = ?");
    $registrations->execute([$_GET['id']]);
    $event['registrations'] = $registrations->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($event);
  } else {
    http_response_code(404);
  }
} else {
  $stmt = $pdo->query("SELECT * FROM events");
  echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}
?>
