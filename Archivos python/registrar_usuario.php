<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $privilegios = $_POST['privilegios'];

    // Hashear la contraseña antes de almacenarla (puedes usar funciones de hashing de PHP)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Conectar a la base de datos SQLite
    $db = new SQLite3('usuarios.db');

    // Insertar el usuario en la base de datos
    $query = 'INSERT INTO usuarios (username, password, privilegios) VALUES (:username, :password, :privilegios)';
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username, SQLITE3_TEXT);
    $stmt->bindParam(':password', $hashed_password, SQLITE3_TEXT);
    $stmt->bindParam(':privilegios', $privilegios, SQLITE3_TEXT);

    if ($stmt->execute()) {
        echo "Usuario registrado exitosamente.";
    } else {
        echo "Error al registrar el usuario.";
    }

    $db->close();
}
?>
