<?php
$host = 'localhost';
$dbname = 'Libros';
$username = 'root';
$password = '';

try {
    $pdoLibros = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdoLibros->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar a la base de datos de Libros: " . $e->getMessage());
}
?>