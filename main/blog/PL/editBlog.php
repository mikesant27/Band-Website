<?php
require_once '../BLL/BlogController.php';

$controller = new BlogController();
$error_message = '';
$success_message = '';
$title = $content = $creator = ''; // Default empty values

// Check if id is set in the URL for initial loading
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $blog = $controller->viewblog($id);

    if ($blog) {
        // Populate variables with blog data
        $title = $blog['title'];
        $content = $blog['content'];
        $creator = $blog['creator'];
    } else {
        $error_message = "blog not found.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form submission to update blog
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
    $creator = filter_var($_POST['creator'], FILTER_SANITIZE_STRING);

    if ($controller->updateblog($id, $title, $content, $creator)) {
        $success_message = "blog updated successfully!";
    } else {
        $error_message = "Failed to update blog.";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="text-center mb-3">
            <a href="addblog.php" class="btn btn-primary">Add New blog</a>
            <a href='blogList.php' class='btn btn-secondary'>Back to blogs</a>
        </div>

        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Update blog</h2>

                <?php if (!empty($error_message)): ?>
                    <p class="text-danger text-center"><?php echo $error_message; ?></p>
                <?php elseif (!empty($success_message)): ?>
                    <p class="text-success text-center"><?php echo $success_message; ?></p>
                <?php else: ?>
                    <form method="POST" action="editblog.php">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

                        <div class="mb-3">
                            <label for="title" class="form-label">title:</label>
                            <input type="text" id="title" name="title" class="form-control" required
                                value="<?php echo htmlspecialchars($title); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">content:</label>
                            <input type="text" id="content" name="content" class="form-control" required
                                value="<?php echo htmlspecialchars($content); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="creator" class="form-label">creator:</label>
                            <input type="text" id="creator" name="creator" class="form-control" required
                                value="<?php echo htmlspecialchars($creator); ?>">
                        </div>

                        <div class="text-center">
                            <input type="submit" class="btn btn-success" value="Update blog">
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>