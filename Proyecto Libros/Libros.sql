CREATE DATABASE Libros;

USE Libros;

-- Tabla Autores
CREATE TABLE Authors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL
);

-- Tabla Libros
CREATE TABLE Books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    pages INT NOT NULL,
    publication_date DATE NOT NULL,
    publisher VARCHAR(100) NOT NULL,
    author_id INT NOT NULL,
    FOREIGN KEY (author_id) REFERENCES Authors(id)
);

-- Insertar datos en las tablas
INSERT INTO Authors (first_name, last_name) VALUES
('Carlos', 'Fuentes'),
('Elena', 'Poniatowska'),
('Octavio', 'Paz'),
('Juan', 'Rulfo');

-- Insertar libros
INSERT INTO Books (title, pages, publication_date, publisher, author_id) VALUES
('La región más transparente', 300, '1958-01-01', 'Fondo de Cultura Económica', 1),
('Cambio de piel', 350, '1967-01-01', 'Joaquín Mortiz', 1),
('Hasta no verte Jesús mío', 250, '1969-05-15', 'Ediciones Era', 2),
('Querido Diego, te abraza Quiela', 150, '1978-08-20', 'Diana', 2),
('El laberinto de la soledad', 200, '1950-10-19', 'Fondo de Cultura Económica', 3),
('Piedra de sol', 100, '1957-04-01', 'Seix Barral', 3),
('Pedro Páramo', 150, '1955-03-27', 'Editorial RM', 4),
('El Llano en llamas', 180, '1953-09-15', 'Fondo de Cultura Económica', 4),
('Como agua para chocolate', 230, '1989-09-01', 'Planeta', 5),
('Tan veloz como el deseo', 200, '2001-05-03', 'Planeta', 5),
('Balún Canán', 280, '1957-05-15', 'Fondo de Cultura Económica', 6),
('Oficio de tinieblas', 320, '1962-07-10', 'Fondo de Cultura Económica', 6),
('Estas ruinas que ves', 310, '1975-03-12', 'Joaquín Mortiz', 7),
('Dos crímenes', 270, '1979-10-15', 'Joaquín Mortiz', 7),
('1492: La historia que aún no termina', 220, '1992-01-01', 'Editorial Diana', 8),
('La Santa Muerte', 190, '2003-06-15', 'Editorial Grijalbo', 8),
('El huésped', 180, '2006-02-01', 'Planeta', 9),
('Después del invierno', 220, '2014-09-01', 'Planeta', 9),
('Los ingrávidos', 190, '2011-06-15', 'Editorial Sexto Piso', 10),
('Desierto sonoro', 320, '2019-09-01', 'Alfaguara', 10),
('Aura', 120, '1962-04-10', 'Fondo de Cultura Económica', 1),
('Terra Nostra', 500, '1975-08-01', 'Seix Barral', 1),
('La noche de Tlatelolco', 240, '1971-12-01', 'Editorial Era', 2),
('Los días enmascarados', 190, '1954-03-15', 'Fondo de Cultura Económica', 3),
('La silla del águila', 340, '2003-07-01', 'Alfaguara', 1),
('Los recuerdos del porvenir', 310, '1963-05-15', 'Editorial Era', 6),
('Un lugar donde nunca llueve', 270, '1989-11-01', 'Editorial Joaquín Mortiz', 7),
('La ley de Herodes', 290, '1967-02-01', 'Fondo de Cultura Económica', 7),
('El niño y la niebla', 150, '1949-06-01', 'Editorial Diana', 6),
('Las batallas en el desierto', 150, '1981-03-01', 'Ediciones Era', 7),
('Ensayo sobre la ceguera', 250, '1995-09-15', 'Alfaguara', 1),
('El hombre duplicado', 290, '2002-05-10', 'Alfaguara', 1),
('Los relámpagos de agosto', 230, '1965-10-01', 'Editorial Era', 7),
('Los albañiles', 300, '1964-07-01', 'Ediciones Era', 7),
('Cartucho', 200, '1931-01-01', 'Editorial Grijalbo', 6),
('La fuerza del destino', 270, '1973-09-01', 'Editorial Diana', 7),
('El complot mongol', 310, '1969-06-01', 'Joaquín Mortiz', 7),
('La muerte de Artemio Cruz', 320, '1962-03-01', 'Fondo de Cultura Económica', 1);