<?php
require_once 'db_config.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

function get_data($row, $key) {
  return isset($row[$key]) ? $row[$key] : "";
}

function get_pokemons($conn) {
  $sql = "SELECT * FROM pokemons";
  $result = $conn->query($sql);
  return $result;
}

$pokemons = get_pokemons($conn);
$pokemon_rows = [];

if ($pokemons->num_rows > 0) {
  while ($row = $pokemons->fetch_assoc()) {
    $pokemon_rows[] = $row;
  }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokeworld</title>
    <link rel="stylesheet" href="/css/output.css">
    <link rel="shortcut icon" href="/public/assets/favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/0a2c6443a1.js" crossorigin="anonymous"></script>
</head>
<body class="w-full h-screen flex flex-col items-center py-12 font-main">
    <script>
        function wipe() {
            return confirm("¿Estás seguro de eliminar este Pokémon?");
        }
    </script>

<?php if (!empty($pokemon_rows)): ?>
    <header class="w-full justify-center flex items-center mb-20 ">
        <a href="/index.php" class="flex w-32 justify-evenly text-xs p-2 ml-8 rounded-lg text-white items-center bg-black ">
            <object data="/public/assets/pokeball.svg" type="image/svg+xml" class="w-4"></object>
            Ir al inicio
        </a>
        <a href="/form.php" class="flex w-52 justify-evenly text-xs p-2 ml-8 rounded-lg text-white items-center bg-main ">
            <object data="/public/assets/pokeball.svg" type="image/svg+xml" class="w-4"></object>
            Agregar otro pokemon
        </a>
   
    </header>
    
        <h1 class="text-main text-8xl mb-7">Pokeboard</h1>
            <table class="w-3/5 min-w-96 items-center flex flex-col max-h-80 h-full justify-center  ">
                <thead class="bg-main flex w-4/6 h-16 ">
                    <tr class="flex justify-center w-full items-center text-white"> 
                        <th class="max-w-16 w-full flex items-center justify-center">ID</th>
                        <th class="max-w-20 w-full flex items-center justify-center">Name</th>
                        <th class="max-w-20 w-full flex items-center justify-center">Color</th>
                        <th class="max-w-20 w-full flex items-center justify-center">Type</th>
                        <th class="max-w-20 w-full flex items-center justify-center">Level</th>
                        <th class="max-w-20 w-full flex items-center justify-center">Edit</th>
                        <th class="max-w-20 w-full flex items-center justify-center">Delete</th>
                    </tr> 
                </thead>
                <tbody class="bg-main flex flex-col w-4/6 h-full mt-2 p-3 overflow-y-scroll">
                    <?php foreach ($pokemon_rows as $row): ?>
                        <tr class="flex justify-center w-full mt-3 text-white">
                            <td class="max-w-16 w-full  flex items-center justify-center text-sm"><?php echo htmlspecialchars($row['id']); ?></td>
                            <td class="max-w-20 w-full  flex items-center justify-center text-sm"><?php echo htmlspecialchars($row['nombre']); ?></td>
                            <td class="max-w-20 w-full  flex items-center justify-center text-sm"><?php echo htmlspecialchars($row['color']); ?></td>
                            <td class="max-w-20 w-full  flex items-center justify-center text-sm"><?php echo htmlspecialchars($row['tipo']); ?></td>
                            <td class="max-w-20 w-full  flex items-center justify-center text-sm"><?php echo htmlspecialchars($row['nivel']); ?></td>
                            <td class="max-w-20 w-full  flex items-center justify-center text-sm"><a href="update.php?id=<?php echo htmlspecialchars($row['id']); ?>">
                            <i class="fa-regular fa-pen-to-square hover:scale-125 transition ease-in-out duration-500"></i>
                            </a></td>
                            <td class="max-w-20 w-full  flex items-center justify-center"><a href="delete.php?id=<?php echo htmlspecialchars($row['id']); ?>" onclick="return wipe();">
                            <i class="fa-solid fa-trash hover:scale-125 transition ease-in-out duration-500"></i>
                            </a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            
             <div class="w-full h-screen flex flex-col items-center justify-center">
                 <p class="text-main">No se encontraron Pokémon registrados</p>
                 <div class="flex w-full justify-center gap-2 mt-5">
                  <a href="/index.php" class="flex w-32 justify-evenly text-xs p-2  rounded-lg text-white items-center bg-black ">
                 <object data="/public/assets/pokeball.svg" type="image/svg+xml" class="w-4"></object>
                     Ir al inicio
                 </a>
                 <a href="/form.php" class="flex w-52 justify-evenly text-xs p-2 rounded-lg text-white items-center bg-main ">
                     <object data="/public/assets/pokeball.svg" type="image/svg+xml" class="w-4"></object>
                     Agregar otro pokemon
                 </a>
                 </div>
            </div>
        <?php endif; ?>
</body>
</html>



