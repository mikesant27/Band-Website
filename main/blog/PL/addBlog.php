<?php
require_once '../BLL/BlogController.php';

$controller = new BlogController();
$error_message = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $blog_id = htmlspecialchars(trim($_POST['id']));
    $location = htmlspecialchars(trim($_POST['location']));
    $show_time = htmlspecialchars(trim($_POST['show_time']));

    // Attempt to add the show
    if ($controller->addBlog($title, $content, $authorId)) {
        echo "<div class='alert alert-success'>Blog added successfully.</div>";
        header("Location: showBlog.php");
        die();
    } else {
        $error_message = "Failed to add blog. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Show</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0">Add Show</h2>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($error_message)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo htmlspecialchars($error_message); ?>
                            </div>
                        <?php endif; ?>

                        <form method="post" action="addBlog.php">
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

                            <button type="submit" class="btn btn-primary w-100">Add Show</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>