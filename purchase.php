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
    $sql = "SELECT * FROM Purchases";
    $result = $conn->query($sql);

    $purchases = [];
    while ($row = $result->fetch_assoc()) {
        $purchases[] = $row;
    }
    echo json_encode($purchases);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_id = $_POST['item_name'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO Purchases (item_name, quantity) VALUES ('$item_name', '$quantity')";
    if ($conn->query($sql) === TRUE) {
        echo "Purchase record added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
