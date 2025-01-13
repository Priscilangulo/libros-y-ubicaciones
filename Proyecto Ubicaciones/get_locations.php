<?php
require 'config.php';

try {
    $query = "SELECT Locations.id, Locations.latitude, Locations.longitude, Locations.created_at,
                     Timezones.timezone, Timezones.current_time 
              FROM Locations
              LEFT JOIN Timezones ON Locations.id = Timezones.location_id";
    $stmt = $pdoRegistro->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h1>Ubicaciones y Horas</h1>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Latitud</th>
                <th>Longitud</th>
                <th>Fecha de Registro</th>
                <th>Zona Horaria</th>
                <th>Hora Actual</th>
            </tr>";

    foreach ($results as $row) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['latitude']}</td>
                <td>{$row['longitude']}</td>
                <td>{$row['created_at']}</td>
                <td>{$row['timezone']}</td>
                <td>{$row['current_time']}</td>
              </tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    die("Error al consultar ubicaciones y horas: " . $e->getMessage());
}
?>