<?php

require_once 'db_config.php';

$nombre = $_POST['nombre'];
$color = $_POST['color'];
$tipo = $_POST['tipo'];
$nivel = (int) $_POST['nivel'];


$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

$sql = "INSERT INTO pokemons (nombre, color, tipo, nivel) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
  $stmt->bind_param("ssss", $nombre, $color, $tipo, $nivel);
  $stmt->execute();

  if ($stmt->affected_rows === 1) {
    echo "Nuevo Pokémon agregado correctamente";
    header("Location: read.php");
  } else {
    echo "Error al agregar el Pokémon: " . $stmt->error;
  }

  $stmt->close();
} else {
  echo "Error: Failed to prepare statement: " . $conn->error;
}

$conn->close();
?>

