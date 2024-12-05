<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/style.css">
    <title>Admin dashboard</title>
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
            background-color: #007BFF;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .dashboard-link:hover {
            background-color: #0056b3;
        }
    </style>

</head>
<body>
    <?php include '../../../includes/header.php'; ?>

    <div class="dashboard-container">
        <h1>Admin Dashboard</h1>
        <div class="link-container">
            <!--add_user.php is a placeholder-->
            <a href="../../showUsers/PL/userList.php" class="dashboard-link">Users</a>
            <a href="../../transactions/PL/transactionList.php" class="dashboard-link">Transactions</a>
            <a href="../../music/PL/add_images.php" class="dashboard-link">Add Images</a>
        </div>
    </div>

</body>
</html>