<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "utensiltrack";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO Items (name, description, price, quantity) VALUES ('$name', '$description', '$price', '$quantity')";
    if ($conn->query($sql) === TRUE) {
        echo "New item added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
