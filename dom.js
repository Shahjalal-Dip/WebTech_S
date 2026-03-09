const form = document.getElementById('student-form');
const nameInput = document.getElementById('student-name');
const rollInput = document.getElementById('student-roll');
const addButton = form.querySelector('button[type="submit"]');
const list = document.getElementById('student-list');
const countDisplay = document.getElementById('student-count');
const attendanceDisplay = document.getElementById('attendance');

nameInput.addEventListener('input', () => {
  addButton.disabled = nameInput.value.trim() === "";
});

form.addEventListener('submit', addStudent);

function addStudent(event) {
  event.preventDefault();

  let studentName = nameInput.value.trim();
  let studentRoll = rollInput.value.trim();

  if (studentName === "" || studentRoll === "") {
    alert("Please enter both name and roll number");
    return;
  }

  let li = document.createElement('li');
  li.classList.add('student-item');

  let span = document.createElement('span');
  span.textContent = `${studentRoll} – ${studentName}`;

  let editButton = document.createElement('button');
  editButton.textContent = 'Edit';
  editButton.classList.add('btn-edit');
  editButton.addEventListener('click', () => editStudent(li, span));

  let deleteButton = document.createElement('button');
  deleteButton.textContent = 'Delete';
  deleteButton.classList.add('btn-delete');
  deleteButton.addEventListener('click', () => deleteStudent(li));

  let presentCheckbox = document.createElement('input');
  presentCheckbox.type = 'checkbox';
  presentCheckbox.addEventListener('change', updateAttendance);

  li.appendChild(span);
  li.appendChild(editButton);
  li.appendChild(deleteButton);
  li.appendChild(presentCheckbox);

  list.appendChild(li);

  nameInput.value = "";
  rollInput.value = "";
  addButton.disabled = true;

  updateCount();
  updateAttendance();
}

function editStudent(studentElement, studentNameElement) {
  let parts = studentNameElement.textContent.split(" – ");
  let oldRoll = parts[0];
  let oldName = parts[1];

  let newRoll = prompt("Enter new roll:", oldRoll);
  let newName = prompt("Enter new name:", oldName);

  if (newRoll && newName) {
    studentNameElement.textContent = `${newRoll} – ${newName}`;
  }
}

function deleteStudent(studentElement) {
  if (confirm("Are you sure you want to delete this student?")) {
    studentElement.remove();
    updateCount();
    updateAttendance();
  }
}

function updateCount() {
  let count = document.querySelectorAll('#student-list .student-item').length;
  countDisplay.textContent = `Total students: ${count}`;
}

function updateAttendance() {
  let students = document.querySelectorAll('#student-list .student-item input[type="checkbox"]');
  let present = 0, absent = 0;
  students.forEach(cb => cb.checked ? present++ : absent++);
  attendanceDisplay.textContent = `Present: ${present}, Absent: ${absent}`;
}

document.getElementById('search').addEventListener('input', function () {
  let searchText = this.value.toLowerCase();
  document.querySelectorAll('#student-list .student-item').forEach(item => {
    let text = item.querySelector('span').textContent.toLowerCase();
    item.style.display = text.includes(searchText) ? "" : "none";
  });
});

document.getElementById('sort').addEventListener('click', function () {
  let items = Array.from(list.children);
  items.sort((a, b) => a.querySelector('span').textContent.localeCompare(b.querySelector('span').textContent));
  items.forEach(item => list.appendChild(item));
});

document.getElementById('highlight-first').addEventListener('click', function () {
  document.querySelectorAll('.student-item').forEach(item => item.classList.remove('highlight'));
  let first = document.querySelector('.student-item');
  if (first) first.classList.add('highlight');
}); 