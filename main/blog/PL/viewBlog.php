<?php
require_once '../BLL/BlogController.php';

$error_message = '';
$success_message = '';
$title = $content = $creator = ''; // Default empty values

// Check if product_id is set in the URL for initial loading
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $controller = new BlogController();
    $blog = $controller->viewblog($id);

    if ($blog) {
        // Populate variables with product data
        $title = $blog['title'];
        $content = $blog['content'];
        $creator = $blog['creator'];
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
    <title>Blog Details</title>
    <link rel="stylesheet" href="../../../css/style.css"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="card-title mb-0">Blog Details</h1>
            </div>
            <div class="card-body">
                <?php if ($error_message): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo htmlspecialchars($error_message); ?>
                    </div>
                <?php endif; ?>

                <p><strong>ID:</strong> <?php echo htmlspecialchars($blog['id']); ?></p>
                <p><strong>Title:</strong> <?php echo htmlspecialchars($blog['title']); ?></p>
                <p><strong>Content:</strong> <?php echo htmlspecialchars($blog['content']); ?></p>
                <p><strong>Creator:</strong> <?php echo htmlspecialchars($blog['creator']); ?></p>
            </div>
            <div class="card-footer text-end">
                <a href="editblog.php?id=<?php echo $id; ?>" class="btn btn-warning">Edit</a>
                <a href="blogList.php" class="btn btn-secondary">Back to blogs</a>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>