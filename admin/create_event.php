<?php
require '../db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $pdo->prepare("INSERT INTO events (name, description, date, location) VALUES (?, ?, ?, ?)");
  $stmt->execute([
    $_POST['name'], $_POST['description'], $_POST['date'], $_POST['location']
  ]);
  echo 'Sikeresen hozzáadva!';
}
?>
