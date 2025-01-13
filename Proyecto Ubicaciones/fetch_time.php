<?php
require 'config_locations.php';

$locationId = $_GET['id'] ?? null;

if (!$locationId) {
    die("Se requiere un ID de ubicación para obtener la hora.");
}

try {
    // Consultar la ubicación por ID
    $query = "SELECT id, latitude, longitude FROM Locations WHERE id = :id";
    $stmt = $pdoRegistro->prepare($query);
    $stmt->bindParam(':id', $locationId, PDO::PARAM_INT);
    $stmt->execute();
    $location = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$location) {
        die("No se encontró la ubicación con el ID proporcionado.");
    }

    $latitude = $location['latitude'];
    $longitude = $location['longitude'];

    // API pública para obtener la hora basada en la ubicación
    $apiUrl = "http://worldtimeapi.org/api/timezone/Etc/GMT";

    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);

    if (isset($data['utc_datetime'], $data['timezone'])) {
        // Insertar datos en la tabla Timezones
        $query = "INSERT INTO Timezones (location_id, timezone, current_time) VALUES (:location_id, :timezone, :current_time)";
        $stmt = $pdoRegistro->prepare($query);
        $stmt->bindParam(':location_id', $locationId, PDO::PARAM_INT);
        $stmt->bindParam(':timezone', $data['timezone']);
        $stmt->bindParam(':current_time', $data['utc_datetime']);
        $stmt->execute();

        echo "Hora guardada: Zona horaria {$data['timezone']}, Hora {$data['utc_datetime']}";
    } else {
        echo "No se pudo obtener la hora.";
    }
} catch (Exception $e) {
    die("Error al consumir la API o al guardar los datos: " . $e->getMessage());
}
?>