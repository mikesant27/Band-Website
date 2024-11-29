<?php
require_once '../BLL/UserController.php';

$controller = new UserController();
$error_message = '';
$success_message = '';
$username = $email = $full_name = $role = $created_at = $updated_at = ''; // Default empty values

// Check if id is set in the URL for initial loading
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $user = $controller->viewUser($id);

    if ($user) {
        // Populate variables with show data
        $username = $user['username'];
        $email = $user['email'];
        $full_name = $user['full_name'];
        $role = $user['role'];
        $created_at = $user['created_at'];
        $updated_at = $user['updated_at'];
    } else {
        $error_message = "Show not found.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form submission to update show
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $full_name = filter_var($_POST['full_name'], FILTER_SANITIZE_STRING);
    $role = filter_var($_POST['role'], FILTER_SANITIZE_STRING);

    if ($controller->updateUser($id, $username, $email, $full_name, $role)) {
        $success_message = "Show updated successfully!";
    } else {
        $error_message = "Failed to update Show.";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="text-center mb-3">
            <a href='userList.php' class='btn btn-secondary'>Back to Users</a>
        </div>

        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Update User</h2>

                <?php if (!empty($error_message)): ?>
                    <p class="text-danger text-center"><?php echo $error_message; ?></p>
                <?php elseif (!empty($success_message)): ?>
                    <p class="text-success text-center"><?php echo $success_message; ?></p>
                <?php else: ?>
                    <form method="POST" action="editUser.php">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" id="username" name="username" class="form-control" required
                                value="<?php echo htmlspecialchars($username); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" id="email" name="email" class="form-control" required
                                value="<?php echo htmlspecialchars($email); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="full_name" class="form-label">Full Name:</label>
                            <input type="text" id="full_name" name="full_name" class="form-control" required
                                value="<?php echo htmlspecialchars($full_name); ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label for="role" class="form-label">Role:</label>
                            <select name="role" id="role">
                                <!--Dynamically sets default value of the select to the users current role-->
                                <option value="admin" <?php echo htmlspecialchars($role) === 'admin' ? 'selected' : ''; ?>>Admin</option>
                                <option value="member" <?php echo htmlspecialchars($role) === 'member' ? 'selected' : ''; ?>>Member</option>
                                <option value="customer" <?php echo htmlspecialchars($role) === 'customer' ? 'selected' : ''; ?>>Customer</option>
                            </select>
                        </div>

                        <div class="text-center">
                            <input type="submit" class="btn btn-success" value="Update User">
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>