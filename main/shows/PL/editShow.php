<?php
// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect non-admin users
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'staff') {
    header('Location: ../../home/PL/home.php');
    exit();
}
require_once '../BLL/ShowController.php';

$controller = new ShowController();
$error_message = '';
$success_message = '';
$location = $show_time = ''; // Default empty values

// Check if id is set in the URL for initial loading
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $show = $controller->viewShow($id);

    if ($show) {
        // Populate variables with show data
        $location = $show['location'];
        $show_time = $show['show_time'];
    } else {
        $error_message = "Show not found.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form submission to update show
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $location = filter_var($_POST['location'], FILTER_SANITIZE_STRING);
    $show_time = filter_var($_POST['show_time'], FILTER_SANITIZE_STRING);

    if ($controller->updateShow($id, $location, $show_time)) {
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
    <title>Edit Show</title>
    <link rel="stylesheet" href="../../../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="text-center mb-3">
            <a href="addShow.php" class="btn btn-primary">Add New Show</a>
            <a href='showList.php' class='btn btn-secondary'>Back to Shows</a>
        </div>

        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Update Show</h2>

                <?php if (!empty($error_message)): ?>
                    <p class="text-danger text-center"><?php echo $error_message; ?></p>
                <?php elseif (!empty($success_message)): ?>
                    <p class="text-success text-center"><?php echo $success_message; ?></p>
                <?php else: ?>
                    <form method="POST" action="editShow.php">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

                        <div class="mb-3">
                            <label for="location" class="form-label">Location:</label>
                            <input type="text" id="location" name="location" class="form-control" required
                                value="<?php echo htmlspecialchars($location); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="show_time" class="form-label">Show Time:</label>
                            <input type="text" id="show_time" name="show_time" class="form-control" required
                                value="<?php echo htmlspecialchars($show_time); ?>">
                        </div>

                        <div class="text-center">
                            <input type="submit" class="btn btn-success" value="Update Show">
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>