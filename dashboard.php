<?php
session_start(); // Start session
if (!isset($_SESSION['user'])) {
    header("Location: login.html"); // Redirect to login if not authenticated
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
        }

        header nav {
            display: flex;
            gap: 15px;
        }

        header nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        header nav a:hover {
            background-color: #0056b3;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .welcome {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .features {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .feature {
            flex: 1 1 calc(33.33% - 20px);
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
            transition: box-shadow 0.3s;
        }

        .feature:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .feature h3 {
            margin-bottom: 15px;
        }

        .feature a {
            display: inline-block;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .feature a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1>Dashboard</h1>
        <nav>
            <a href="dashboard.php">Dashboard</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <!-- Main Container -->
    <div class="container">
        <!-- Welcome Message -->
        <div class="welcome">
            Welcome, <strong><?php echo htmlspecialchars($_SESSION['user']); ?></strong>!
        </div>

        <!-- Features Section -->
        <div class="features">
            <div class="feature">
                <h3>Sales Record</h3>
                <p>Manage and view sales transactions.</p>
                <a href="sales.html">View Sales</a>
            </div>
            <div class="feature">
                <h3>Purchase Record</h3>
                <p>Track and manage purchases.</p>
                <a href="purchase.html">View Purchases</a>
            </div>
            <div class="feature">
                <h3>Stock Record</h3>
                <p>Monitor available stock levels.</p>
                <a href="stock.html">View Stock</a>
            </div>
            <div class="feature">
                <h3>Add New Item</h3>
                <p>Add new items to your inventory.</p>
                <a href="addnewitem.html">Add Item</a>
            </div>
        </div>
    </div>
</body>
</html>
