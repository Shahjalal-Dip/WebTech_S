<?php
$students = [
    ["name" => "Dip", "id" => "23-54777-3", "department" => "CSE", "cgpa" => 3.85],
    ["name" => "Asif", "id" => "23-54756-3", "department" => "EEE", "cgpa" => 3.65],
    ["name" => "Akib", "id" => "23-53567-3", "department" => "BBA", "cgpa" => 3.90],
    ["name" => "Lisa", "id" => "23-52517-3", "department" => "ME", "cgpa" => 3.70]
];

header('Content-Type: application/json');
echo json_encode($students);
?>