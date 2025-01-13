-- Crear la base de datos
CREATE DATABASE Registro;

USE Registro;

-- Crear la tabla Locations para almacenar latitud y longitud
CREATE TABLE Locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    latitude DECIMAL(10, 8) NOT NULL,
    longitude DECIMAL(11, 8) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear la tabla Timezones para almacenar la hora basada en la ubicación
CREATE TABLE Timezones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    location_id INT NOT NULL,
    timezone VARCHAR(100) NOT NULL,
    current_time DATETIME NOT NULL,
    FOREIGN KEY (location_id) REFERENCES Locations(id)
);

-- Insertar registros iniciales en Locations
INSERT INTO Locations (latitude, longitude) VALUES
(19.432608, -99.133209),  -- Ciudad de México
(20.659698, -103.349609), -- Guadalajara
(25.686613, -100.316116); -- Monterrey

-- Insertar registros iniciales en Timezones
INSERT INTO Timezones (location_id, timezone, current_time) VALUES
(1, 'America/Mexico_City', '2025-01-12 12:00:00'),
(2, 'America/Mexico_City', '2025-01-12 12:30:00'),
(3, 'America/Monterrey', '2025-01-12 13:00:00');