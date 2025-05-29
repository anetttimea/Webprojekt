<?php
$response = file_get_contents('http://localhost/api/events.php?id=1');
if (strpos($response, 'name') !== false) {
  echo "TESZT1 Sikeres\n";
} else {
  echo "TESZT1 Sikertelen\n";
}
?>