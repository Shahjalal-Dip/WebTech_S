<?php
require_once __DIR__ . '/../controller/BookController.php';

$action = $_POST['action'];

if ($action == 'add') {

    $result = addBookController($_POST);

    if ($result) {
        echo "Book Added Successfully";
    } else {
        echo "Failed to Add Book";
    }
}

if ($action == 'fetch') {

    $result = getBooksController();

    $output = "";

    while ($row = mysqli_fetch_assoc($result)) {

        $output .= "
        <tr>
            <td>{$row['id']}</td>
            <td>{$row['title']}</td>
            <td>{$row['author']}</td>
            <td>{$row['category']}</td>
            <td>{$row['availability']}</td>
            <td>
                <button class='editBtn'
                    data-id='{$row['id']}'
                    data-title='{$row['title']}'
                    data-author='{$row['author']}'
                    data-category='{$row['category']}'
                    data-availability='{$row['availability']}'>
                    Edit
                </button>

                <button class='deleteBtn' data-id='{$row['id']}'>
                    Delete
                </button>
            </td>
        </tr>
        ";
    }

    echo $output;
}

if ($action == 'update') {

    $result = updateBookController($_POST);

    if ($result) {
        echo "Book Updated Successfully";
    } else {
        echo "Failed to Update Book";
    }
}

if ($action == 'delete') {

    $id = $_POST['id'];

    $result = deleteBookController($id);

    if ($result) {
        echo "Book Deleted Successfully";
    } else {
        echo "Failed to Delete Book";
    }
}

?>