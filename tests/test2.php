<?php
$opts = ['http' => [
  'method' => 'POST',
  'header' => 'Content-Type: application/x-www-form-urlencoded',
  'content' => http_build_query(['name' => '', 'email' => 'rossz'])
]];
$context = stream_context_create($opts);
$response = file_get_contents('http://localhost/api/register.php?event_id=1', false, $context);

if (strpos($response, 'error') !== false) {
  echo "TESZT2 Sikeres\n";
} else {
  echo "TESZT2 Sikertelen\n";
}
?>
