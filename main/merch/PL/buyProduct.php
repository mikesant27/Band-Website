<?php
require_once '../BLL/ProductController.php';

$error_message = '';
$success_message = '';
$name = $price = $description = ''; // Default empty values

// Check if product_id is set in the URL for initial loading
if (isset($_GET['id'])) {
    $product_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $controller = new ProductController();
    $product = $controller->viewProduct($product_id);

    if ($product) {
        // Populate variables with product data
        $name = $product['name'];
        $price = $product['price'];
        $description = $product['description'];
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
                <?php if ($error_message): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo htmlspecialchars($error_message); ?>
                    </div>
                <?php endif; ?>

                <p><strong>Name:</strong> <?php echo htmlspecialchars($product['name']); ?></p>
                <p><strong>Price:</strong> $<?php echo htmlspecialchars($product['price']); ?></p>
                <p><strong>Description:</strong> <?php echo htmlspecialchars($product['description']); ?></p>

                <form method="POST" action = "buyProduct.php">
                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">

                    <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" min="1" value = "1" required>

                            <p>Total: $<span id="total" class="total"><?php echo number_format($product['price'], 2); ?></span></p>
                    </div>
                </form>

            </div>
            <div class="card-footer text-end">
                <a href="editProduct.php?id=<?php echo $product_id; ?>" class="btn btn-primary">Buy</a>
                <a href="productList.php" class="btn btn-secondary">Back to Products</a>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
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