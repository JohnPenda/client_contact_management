<?php
include 'DB_Connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["contact_name"];
    $surname = $_POST["contact_surname"];
    $email = $_POST["contact_email"];

    $sql = "INSERT INTO contacts (name, surname, email) VALUES ('$name', '$surname', '$email')";
    if ($conn->query($sql) === TRUE) {
        echo "Contact created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
