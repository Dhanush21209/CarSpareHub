<?php

$conn = new mysqli(
  "localhost",
  "root",
  "",
  "carparts"
);

if ($conn->connect_error) {
  die("DB Error: " . $conn->connect_error);
}
?>
