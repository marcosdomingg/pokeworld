CREATE DATABASE IF NOT EXISTS pokemon_db;
USE pokemon_db;

CREATE TABLE IF NOT EXISTS pokemons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    color VARCHAR(50),
    tipo VARCHAR(50),
    nivel INT
);