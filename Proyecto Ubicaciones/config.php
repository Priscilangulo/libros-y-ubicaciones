<?php
$host = 'localhost';
$dbname = 'Registro';
$username = 'root';
$password = '';

try {
    $pdoRegistro = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdoRegistro->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar a la base de datos de Registro: " . $e->getMessage());
}
?>