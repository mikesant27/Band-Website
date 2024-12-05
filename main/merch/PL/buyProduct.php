<?php
require_once '../BLL/ProductController.php';

$error_message = '';
$success_message = '';
$name = $price = $description = $user_id = $product_id = $quantity = $total = ''; // Default empty values
$controller = new ProductController();

// Check if product_id is set in the URL for initial loading
if (isset($_GET['id'])) {
    $product_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    //$controller = new ProductController();
    $product = $controller->viewProduct($product_id);

    if ($product) {
        // Populate variables with product data
        $name = $product['name'];
        $price = $product['price'];
        $description = $product['description'];
    } else {
        $error_message = "Product not found.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    // Process the form submission to process transaction

    $user_id = filter_var($_SESSION['user_id'], FILTER_SANITIZE_NUMBER_INT);
    $product_id = filter_var($_POST['product_id'], FILTER_SANITIZE_NUMBER_INT);
    $quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $total = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) * filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    if ($controller->buyProduct($product_id, $user_id, $quantity, $total)) {
        $success_message = "Product purchased successfully!";
    } else {
        $error_message = "Failed to purchase product.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Product</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="card-title mb-0">Buy Product</h1>
            </div>
            <div class="card-body">
                <?php if (!empty($error_message)): ?>
                    <p class="text-danger text-center"><?php echo $error_message; ?></p>
                <?php elseif (!empty($success_message)): ?>
                    <p class="text-success text-center"><?php echo $success_message; ?></p>
                <?php else: ?>
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($product['name']); ?></p>
                    <p><strong>Price:</strong> $<?php echo htmlspecialchars($product['price']); ?></p>
                    <p><strong>Description:</strong> <?php echo htmlspecialchars($product['description']); ?></p>

                    <form method="POST" action = "buyProduct.php">
                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
                        <input type="hidden" name="price" value="<?php echo htmlspecialchars($product['price']); ?>">

                        <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity:</label>
                                <input type="number" id="quantity" name="quantity" class="form-control" min="1" value = "1" required>

                                <p>Total: $<span id="total" class="total"><?php echo number_format($product['price'], 2); ?></span></p>

                                <input type="submit" class="btn btn-primary" value="Place Order">
                        </div>
                    </form>
                <?php endif; ?>
            </div>
            <div class="card-footer text-end">
                <a href="productList.php" class="btn btn-secondary">Back to Products</a>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!--Script to dynamically change the total for the user to see before they hit buy -->
    <script>
        document.getElementById('quantity').addEventListener('input', function () {
            const quantity = parseInt(this.value) || 1;
            const price = <?php echo json_encode($product['price']); ?>;
            const total = quantity * price;
            document.getElementById('total').textContent = total.toFixed(2);
        });
    </script>

</body>

</html>