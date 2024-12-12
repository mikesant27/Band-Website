<?php
// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect non-staff users
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'staff') {
    header('Location: ../../home/PL/home.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/style.css">
    <title>Staff dashboard</title>
    <link rel="icon" type="image/x-icon" href="../../../includes/favicon.png">

    <style>
        .dashboard-container {
             text-align: center;
            margin-top: 20px;
        }

        .link-container {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }

        .dashboard-link {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            color: white;
            background-color: #ff4500;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .dashboard-link:hover {
            background-color: #c94412;
        }

        .dashboard-container h1{
            color: #ff4500;
        }
    </style>

</head>
<body>
    <CENTER><?php include '../../../includes/header.php'; ?></CENTER>

    <div class="dashboard-container">
        <h1>Staff Dashboard</h1>
        <div class="link-container">
            <a href="../../shows/PL/addShow.php" class="dashboard-link">Create Show</a>
            <a href="../../merch/PL/addProduct.php" class="dashboard-link">Create Product</a>
            <a href="../../blog/PL/addBlog.php" class="dashboard-link">Create Blog Post</a>
            <a href="../../pictures/PL/add_pictures.php" class="dashboard-link">Add a picture</a>
        </div>
    </div>

    <?php include '../../../includes/footer.php';?>

</body>
</html>