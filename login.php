<?php
session_start(); // Start session to store user information

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "utensiltrack";

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    // Prepare and execute query
    $stmt = $conn->prepare("SELECT * FROM Users WHERE username = ?");
    $stmt->bind_param("s", $inputUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($inputPassword, $user['password_hash'])) {
            // Successful login
            $_SESSION['user'] = $user['username']; // Store username in session
            header("Location: dashboard.php");     // Redirect to dashboard
            exit();
        } else {
            echo "<p>Invalid password. <a href='login.html'>Try again</a></p>";
        }
    } else {
        echo "<p>User not found. <a href='login.html'>Try again</a></p>";
    }

    $stmt->close();
} else {
    echo "<p>Invalid request method. <a href='login.html'>Go back to login</a></p>";
}

$conn->close();
?>
