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
require_once '../BLL/ShowController.php';

$error_message = '';
$success_message = '';
$name = $price = $description = ''; // Default empty values

// Check if product_id is set in the URL for initial loading
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $controller = new ShowController();
    $show = $controller->viewShow($id);

    if ($show) {
        // Populate variables with product data
        $location = $show['location'];
        $show_time = $show['show_time'];
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
    <title>Show Details</title>
    <link rel="stylesheet" href="../../../css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white" style="background-color: #ff4500 !important;">
                <h1 class="card-title mb-0">Show Details</h1>
            </div>
            <div class="card-body">
                <?php if ($error_message): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo htmlspecialchars($error_message); ?>
                    </div>
                <?php endif; ?>

                <p><strong>ID:</strong> <?php echo htmlspecialchars($show['id']); ?></p>
                <p><strong>Location:</strong> <?php echo htmlspecialchars($show['location']); ?></p>
                <p><strong>Time:</strong> <?php echo htmlspecialchars($show['show_time']); ?></p>
            </div>
            <div class="card-footer text-end">
                <a href="editShow.php?id=<?php echo $id; ?>" class="btn btn-warning">Edit</a>
                <a href="showList.php" class="btn btn-secondary">Back to Shows</a>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>