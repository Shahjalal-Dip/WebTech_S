window.onload = function () {
    fetchBooks();
};

function fetchBooks() {

    let xhr = new XMLHttpRequest();

    xhr.open("POST", "../ajax/bookHandler.php", true);

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        document.getElementById("bookTableBody").innerHTML = this.responseText;

        attachEditEvents();
        attachDeleteEvents();
    };
    xhr.send("action=fetch");
}

document.getElementById("bookForm").addEventListener("submit", function (e) {

    e.preventDefault();

    let id = document.getElementById("bookId").value;
    let title = document.getElementById("title").value;
    let author = document.getElementById("author").value;
    let category = document.getElementById("category").value;
    let availability = document.getElementById("availability").value;

    let action = id ? "update" : "add";

    let xhr = new XMLHttpRequest();

    xhr.open("POST", "../ajax/bookHandler.php", true);

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function () {

        alert(this.responseText);

        fetchBooks();

        document.getElementById("bookForm").reset();

        document.getElementById("bookId").value = "";

        document.getElementById("submitBtn").innerText = "Add Book";
    };

    xhr.send(
        "action=" + action +
        "&id=" + id +
        "&title=" + title +
        "&author=" + author +
        "&category=" + category +
        "&availability=" + availability
    );
});

// Edit Button Events
function attachEditEvents() {

    let editButtons = document.querySelectorAll(".editBtn");

    editButtons.forEach(button => {

        button.addEventListener("click", function () {

            document.getElementById("bookId").value = this.dataset.id;
            document.getElementById("title").value = this.dataset.title;
            document.getElementById("author").value = this.dataset.author;
            document.getElementById("category").value = this.dataset.category;
            document.getElementById("availability").value = this.dataset.availability;

            document.getElementById("submitBtn").innerText = "Update Book";
        });
    });
}

// Delete Button Events
function attachDeleteEvents() {

    let deleteButtons = document.querySelectorAll(".deleteBtn");

    deleteButtons.forEach(button => {

        button.addEventListener("click", function () {

            if (confirm("Are you sure to delete this book?")) {

                let id = this.dataset.id;

                let xhr = new XMLHttpRequest();

                xhr.open("POST", "../ajax/bookHandler.php", true);

                xhr.setRequestHeader(
                    "Content-type",
                    "application/x-www-form-urlencoded"
                );

                xhr.onload = function () {

                    alert(this.responseText);

                    // Reload book table after delete
                    fetchBooks();
                };

                xhr.send("action=delete&id=" + id);
            }
        });
    });
}