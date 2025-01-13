<?php
require 'config.php';

$id = $_GET['id'] ?? null;

try {
    if ($id) {
        // Consulta un libro específico por ID
        $query = "SELECT Books.id, Books.title, Books.pages, Books.publication_date, Books.publisher,
                  CONCAT(Authors.first_name, ' ', Authors.last_name) AS author 
                  FROM Books
                  INNER JOIN Authors ON Books.author_id = Authors.id
                  WHERE Books.id = :id";
        $stmt = $pdoLibros->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $book = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($book) {
            // Mostrar detalles del libro
            echo "<h1>Detalles del Libro</h1>";
            echo "<p><strong>ID:</strong> {$book['id']}</p>";
            echo "<p><strong>Título:</strong> {$book['title']}</p>";
            echo "<p><strong>Páginas:</strong> {$book['pages']}</p>";
            echo "<p><strong>Fecha:</strong> {$book['publication_date']}</p>";
            echo "<p><strong>Editorial:</strong> {$book['publisher']}</p>";
            echo "<p><strong>Autor:</strong> {$book['author']}</p>";
        } else {
            echo "No se encontró ningún libro con el ID proporcionado.";
        }
    } else {
        // Consulta todos los libros
        $query = "SELECT Books.id, Books.title, Books.pages, Books.publication_date, Books.publisher,
                  CONCAT(Authors.first_name, ' ', Authors.last_name) AS author 
                  FROM Books
                  INNER JOIN Authors ON Books.author_id = Authors.id";
        $stmt = $pdoLibros->prepare($query);
        $stmt->execute();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<h1>Lista de Libros</h1>";
        echo "<table border='1'><tr><th>ID</th><th>Título</th><th>Páginas</th><th>Fecha</th><th>Editorial</th><th>Autor</th></tr>";
        foreach ($books as $book) {
            echo "<tr>
                    <td>{$book['id']}</td>
                    <td>{$book['title']}</td>
                    <td>{$book['pages']}</td>
                    <td>{$book['publication_date']}</td>
                    <td>{$book['publisher']}</td>
                    <td>{$book['author']}</td>
                  </tr>";
        }
        echo "</table>";
    }
} catch (PDOException $e) {
    die("Error al consultar los libros: " . $e->getMessage());
}
?>