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
    $sql = "SELECT * FROM Sales";
    $result = $conn->query($sql);

    $sales = [];
    while ($row = $result->fetch_assoc()) {
        $sales[] = $row;
    }
    echo json_encode($sales);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO Sales (item_name, quantity) VALUES ('$item_name', '$quantity')";
    if ($conn->query($sql) === TRUE) {
        echo "Sale record added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
