<?php
require_once 'db_config.php';

if (!isset($_GET['id'])) {
    echo "ID de Pokémon no proporcionado";
    exit;
}

$id = $_GET['id'];

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "DELETE FROM pokemons WHERE id=?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die('Error al preparar la consulta: ' . $conn->error);
}

$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    echo "Pokémon eliminado correctamente";
    header("Location: read.php");  // Redirect to the list page
} else {
    echo "Error al eliminar el Pokémon: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>