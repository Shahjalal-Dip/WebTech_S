<?php
require_once __DIR__ . '/../model/BookModel.php';

function addBookController($data)
{
    $title = $data['title'];
    $author = $data['author'];
    $category = $data['category'];
    $availability = $data['availability'];

    return insertBook($title, $author, $category, $availability);
}

function getBooksController()
{
    return getAllBooks();
}

function getSingleBookController($id)
{
    return getBookById($id);
}

function updateBookController($data)
{
    $id = $data['id'];
    $title = $data['title'];
    $author = $data['author'];
    $category = $data['category'];
    $availability = $data['availability'];

    return updateBook($id, $title, $author, $category, $availability);
}

function deleteBookController($id)
{
    return deleteBook($id);
}

?>