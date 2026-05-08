<?php

require_once __DIR__ . '/../config/db.php';

function insertBook($title, $author, $category, $availability)
{
    global $conn;

    $query = "INSERT INTO books(title, author, category, availability)
    VALUES('$title', '$author', '$category', '$availability')";

    return mysqli_query($conn, $query);
}

function getAllBooks()
{
    global $conn;

    $query = "SELECT * FROM books ORDER BY id DESC";

    return mysqli_query($conn, $query);
}

function getBookById($id)
{
    global $conn;

    $query = "SELECT * FROM books WHERE id = $id";

    $result = mysqli_query($conn, $query);

    return mysqli_fetch_assoc($result);
}

function updateBook($id, $title, $author, $category, $availability)
{
    global $conn;

    $query = "UPDATE books
              SET
              title='$title',
              author='$author',
              category='$category',
              availability='$availability'
              WHERE id=$id";

    return mysqli_query($conn, $query);
}

function deleteBook($id)
{
    global $conn;

    $query = "DELETE FROM books WHERE id=$id";

    return mysqli_query($conn, $query);
}

?>