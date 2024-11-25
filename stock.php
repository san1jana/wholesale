<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "utensiltrack";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM Items";
    $result = $conn->query($sql);

    $stock = [];
    while ($row = $result->fetch_assoc()) {
        $stock[] = $row;
    }
    echo json_encode($stock);
}

$conn->close();
?>
