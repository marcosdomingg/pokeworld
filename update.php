<?php
require_once 'db_config.php';

$id = $nombre = $color = $tipo = $nivel = '';
$update_success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['name'];
    $color = $_POST['color'];
    $tipo = $_POST['type'];
    $nivel = $_POST['level'];

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql = "UPDATE pokemons SET nombre=?, color=?, tipo=?, nivel=? WHERE id=?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Error al preparar la consulta: ' . $conn->error);
    }

    $stmt->bind_param('sssii', $nombre, $color, $tipo, $nivel, $id);

    if ($stmt->execute()) {
        $update_success = true;
    } else {
        echo "Error al actualizar el Pokémon: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM pokemons WHERE id=?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die('Error al preparar la consulta: ' . $conn->error);
        }

        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nombre = $row['nombre'];
            $color = $row['color'];
            $tipo = $row['tipo'];
            $nivel = $row['nivel'];
        } else {
            echo "No se encontró ningún Pokémon con ese ID";
            exit;
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokeworld - Edit Pokémon</title>
    <link rel="stylesheet" href="/css/output.css">
    <link rel="shortcut icon" href="/public/assets/favicon.ico" type="image/x-icon">
</head>
<body class="bg-white font-main">
    <div class="w-full h-screen flex flex-col justify-center items-center">
        <h1 class="text-7xl font-semibold text-main mb-6">EDIT POKÉMON</h1>
        <?php if ($update_success): ?>
            <div class="bg-green-200 text-green-800 py-2 px-4 mb-4 rounded-md">
                ¡Pokémon updated successfully!
            </div>
            <?php header("Location: read.php") ?>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="w-96 h-2/4 flex flex-col items-center">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            
            <div class="flex flex-col w-full">
                <label for="name" class="my-2">Nombre</label>
                <input type="text" name="name" id="name" class="py-3 px-2 border border-thirdcolor rounded-md" placeholder="Insert the name of your Pokémon" value="<?php echo htmlspecialchars($nombre); ?>" required>
            </div>
            <div class="flex flex-col w-full">
                <label for="color" class="my-2">Color</label>
                <input type="text" name="color" id="color" class="py-3 px-2 border border-thirdcolor rounded-md" placeholder="Insert the color of your Pokémon" value="<?php echo htmlspecialchars($color); ?>" required>
            </div>
            <div class="flex flex-col w-full">
                <label for="type" class="my-2">Tipo</label>
                <input type="text" name="type" id="type" class="py-3 px-2 border border-thirdcolor rounded-md" placeholder="Insert the type of your Pokémon" value="<?php echo htmlspecialchars($tipo); ?>" required>
            </div>
            <div class="flex flex-col w-full">
                <label for="level" class="my-2">Nivel</label>
                <input type="number" name="level" id="level" class="py-3 px-2 border border-thirdcolor rounded-md" placeholder="Insert the level of your Pokémon" value="<?php echo htmlspecialchars($nivel); ?>" required>
            </div>

            <button type="submit" class="text-white bg-main flex items-center justify-between py-2 px-3 rounded-md w-64 mt-6">
                <object data="/public/assets/pokeball.svg" type="image/svg+xml"></object>
                Save changes
            </button>
        </form>
    </div>
</body>
</html>
