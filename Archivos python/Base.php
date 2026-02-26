<?php
// Crear o abrir la base de datos
$db = new SQLite3('usuarios.db');

// Crear tabla de usuarios (si no existe)
$query = 'CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    privilegios TEXT
)';

$db->exec($query);
?>
