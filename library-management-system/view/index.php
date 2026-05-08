<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

    <h1>Library Management System</h1>

    <form id="bookForm">

        <input type="hidden" id="bookId">

        <input type="text" id="title" placeholder="Book Title" required>

        <input type="text" id="author" placeholder="Author Name" required>

        <input type="text" id="category" placeholder="Category" required>

        <select id="availability">
            <option value="Available">Available</option>
            <option value="Borrowed">Borrowed</option>
        </select>

        <button type="submit" id="submitBtn">Add Book</button>

    </form>

    <br>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody id="bookTableBody">

        </tbody>

    </table>

</div>

<script src="js/script.js"></script>

</body>
</html>