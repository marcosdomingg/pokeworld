<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokeworld</title>
    <link rel="stylesheet" href="/css/output.css">
    <link rel="shortcut icon" href="/public/assets/favicon.ico" type="image/x-icon">

</head>
<body class="bg-white font-main">
    <div class="w-full h-screen flex flex-col justify-center items-center">
        <h1 class="text-7xl font-semibold text-main mb-6">POKEFORM</h1>
        <form action="/create.php" method="post" enctype="multipart/form-data" class="w-96 h-2/4 flex flex-col items-center">

            <div class="flex flex-col w-full">
                <label for="name" class="my-2">Nombre</label>
                <input type="text" name="nombre" id="name" class="py-3 px-2 border border-thirdcolor rounded-md" required placeholder="Inserta el nombre de tu Pokémon">
            </div>
            <div class="flex flex-col w-full">
                <label for="name" class="my-2">Color</label>
                <input type="text" name="color" id="color" class="py-3 px-2 border border-thirdcolor rounded-md" required placeholder="Inserta el color de tu Pokémon">
            </div>
            <div class="flex flex-col w-full">
                <label for="name" class="my-2">Tipo</label>
                <input type="text" name="tipo" id="tipo" class="py-3 px-2 border border-thirdcolor rounded-md" required placeholder="Inserta el tipo de tu Pokémon">
            </div>
            <div class="flex flex-col w-full">
                <label for="name" class="my-2">Nivel</label>
                <input type="number" name="nivel" id="nivel" class="py-3 px-2 border border-thirdcolor rounded-md" required placeholder="Inserta el nivel de tu Pokémon">
            </div>

            <button type="submit" class="text-white bg-main flex items-center justify-evenly p-2 rounded-md w-64 mt-6">
                <object data="/public/assets/pokeball.svg" type="image/svg+xml"></object>
                Create your Pokémon
            </button>
        </form>
    </div>
</body>
</html>