<?php
// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect non-admin users
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../../home/PL/home.php');
    exit();
}
require_once '../BLL/UserController.php';

$error_message = '';
$success_message = '';
$username = $email = $full_name = $role = $created_at = $updated_at = ''; // Default empty values

// Check if id is set in the URL for initial loading
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $controller = new UserController();
    $user = $controller->viewUser($id);

    if ($user) {
        // Populate variables with User data
        $username = $user['username'];
        $email = $user['email'];
        $full_name = $user['full_name'];
        $role = $user['role'];
        $created_at = $user['created_at'];
        $updated_at = $user['updated_at'];
    } else {
        $error_message = "Product not found.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="../../../css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white" style="background-color: #ff4500 !important;">
                <h1 class="card-title mb-0">User Details</h1>
            </div>
            <div class="card-body">
                <?php if ($error_message): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo htmlspecialchars($error_message); ?>
                    </div>
                <?php endif; ?>

                <p><strong>ID:</strong> <?php echo htmlspecialchars($user['id']); ?></p>
                <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                <p><strong>Full Name:</strong> <?php echo htmlspecialchars($user['full_name']); ?></p>
                <p><strong>Role:</strong> <?php echo htmlspecialchars($user['role']); ?></p>
                <p><strong>Created At:</strong> <?php echo htmlspecialchars($user['created_at']); ?></p>
                <p><strong>Updated At:</strong> <?php echo htmlspecialchars($user['updated_at']); ?></p>
            </div>
            <div class="card-footer text-end">
                <a href="editUser.php?id=<?php echo $id; ?>" class="btn btn-warning">Edit</a>
                <a href="userList.php" class="btn btn-secondary">Back to Users</a>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>