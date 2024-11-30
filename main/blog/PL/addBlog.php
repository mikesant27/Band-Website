<?php
require_once '../BLL/BlogController.php';

$controller = new BlogController();
$error_message = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $blog_id = htmlspecialchars(trim($_POST['id']));
    $title = htmlspecialchars(trim($_POST['title']));
    $content = htmlspecialchars(trim($_POST['content']));
    $creator = htmlspecialchars(trim($_POST['creator']));

    // Attempt to add the blog
    if ($controller->addBlog($title, $content, $creator)) {
        echo "<div class='alert alert-success'>Blog added successfully.</div>";
        header("Location: blogList.php");
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
    <title>Add Blog</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0">Add Blog</h2>
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
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required
                                    value="<?php echo isset($title) ? htmlspecialchars($title) : ''; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <input type="text" class="form-control" id="content" name="content" required
                                    value="<?php echo isset($content) ? htmlspecialchars($content) : ''; ?>">
                            </div>
                            
                            <div class="mb-3">
                                <label for="creator" class="form-label">Creator</label>
                                <input type="text" class="form-control" id="creator" name="creator" required
                                    value="<?php echo isset($creator) ? htmlspecialchars($creator) : ''; ?>">
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Add Blog</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>