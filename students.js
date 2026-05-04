 document.getElementById("fetchBtn").addEventListener("click", function() {

      var xhr = new XMLHttpRequest();
      xhr.open("GET", "students.php", true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {

          var students = JSON.parse(xhr.responseText);
          var outputDiv = document.getElementById("output");
          outputDiv.innerHTML = "";

          students.forEach(student => {
            var studentInfo = `
              <div class="student">
                <strong>Name:</strong> ${student.name}<br>
                <strong>ID:</strong> ${student.id}<br>
                <strong>Department:</strong> ${student.department}<br>
                <strong>CGPA:</strong> ${student.cgpa}
              </div>
            `;
            outputDiv.innerHTML += studentInfo;
          });
        }
      };
      xhr.send();
    });