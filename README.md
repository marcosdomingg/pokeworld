# Pokeworld es un concepto del mundo de Pokémon

Author: Marcos Dominguez - Mat. 20221093
Profesor: Amadis Suarez
Materia - Programación Web

# Configuración del proyecto:

Lo primero es clonar el repositorio

1. **Clonar el Repositorio**

git clone https://github.com/marcosdomingg/pokeworld.git
cd a/la/carpeta/donde/lo/clonaste

2. **Cargar las dependencias**

Con el comando:

$ npm install o npm i esto para cargar la dependencia de Tailwindcss

3. **Tailwind CSS**

Utiliza este comando para que tailwindcss capture los cambios de las utility class

npx tailwindcss -i "./css/input.css" -o "./css/output.css" --watch [estes watch es para que se mantenga observando los cambios].

4. **Configuración de la Base de Datos**

Asegúrate de tener MySQL instalado y ejecutándose.

Importa el archivo pokemon.sql:

mysql -u [usuario] -p pokemon < pokemon.sql

Reemplaza [usuario] con tu nombre de usuario de MySQL.

Configuración de la Conexión a la Base de Datos:

Edita db_config.php con las credenciales de tu base de datos.

Iniciar el Servidor:

Si estás usando un servidor local como XAMPP, MAMP, etc., coloca el proyecto en el directorio adecuado (por ejemplo, htdocs para XAMPP).

Abrir en el Navegador:

Navega a http://localhost/mi-proyecto/index.php para ver la aplicación.

5. **Funcionalidades**

Create: Añadir nuevos Pokémon.
Read: Mostrar todos los Pokémon registrados.
Update: Editar la información de los Pokémon.
Delete: Eliminar Pokémon de la base de datos.

CRUD

-¡Muchas gracias!
