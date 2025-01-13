<?php
require 'config.php';

$apiUrl = "https://ipapi.co/json/"; // API pública para obtener ubicación

try {
    // Obtener datos de la API
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);

    if (isset($data['latitude'], $data['longitude'])) {
        // Insertar datos en la base de datos
        $query = "INSERT INTO Locations (latitude, longitude) VALUES (:latitude, :longitude)";
        $stmt = $pdoRegistro->prepare($query);
        $stmt->bindParam(':latitude', $data['latitude']);
        $stmt->bindParam(':longitude', $data['longitude']);
        $stmt->execute();

        echo "Ubicación guardada: Latitud {$data['latitude']}, Longitud {$data['longitude']}";
    } else {
        echo "No se pudo obtener la ubicación.";
    }
} catch (Exception $e) {
    die("Error al consumir la API: " . $e->getMessage());
}
?>