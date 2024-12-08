<?php
require_once '../BLL/ShowController.php';

$controller = new ShowController();
$error_message = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $show_id = htmlspecialchars(trim($_POST['id']));
    $location = htmlspecialchars(trim($_POST['location']));
    $show_time = htmlspecialchars(trim($_POST['show_time']));

    // Attempt to add the show
    if ($controller->addShow($location, $show_time)) {
        echo "<div class='alert alert-success'>Show added successfully.</div>";
        header("Location: showList.php");
        die();
    } else {
        $error_message = "Failed to add show. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Show</title>
    <link rel="stylesheet" href="../../../css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white" style="background-color: #ff4500 !important;">
                        <h2 class="mb-0">Add Show</h2>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($error_message)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo htmlspecialchars($error_message); ?>
                            </div>
                        <?php endif; ?>

                        <form method="post" action="addShow.php">
                            <input type="hidden" name="id"
                                value="<?php echo isset($_GET['id']) ? htmlspecialchars($_GET['id']) : ''; ?>">

                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location" required
                                    value="<?php echo isset($location) ? htmlspecialchars($location) : ''; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="show_time" class="form-label">Show Time</label>
                                <input type="text" class="form-control" id="show_time" name="show_time" required
                                    value="<?php echo isset($show_time) ? htmlspecialchars($show_time) : ''; ?>">
                            </div>

                            <button type="submit" class="btn btn-primary w-100" style="background-color: #ff4500 !important;">Add Show</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>