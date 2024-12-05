<?php
require_once '../BLL/TransactionController.php';

$error_message = '';
$success_message = '';
$name = $price = $description = ''; // Default empty values

// Check if product_id is set in the URL for initial loading
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $controller = new TransactionController();
    $transaction = $controller->viewTransaction($id);

    if ($transaction) {
        // Populate variables with product data
        //$location = $transaction['location'];
        //$show_time = $transaction['show_time'];
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
    <title>Transaction Details</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="card-title mb-0">Transaction Details</h1>
            </div>
            <div class="card-body">
                <?php if ($error_message): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo htmlspecialchars($error_message); ?>
                    </div>
                <?php endif; ?>

                <p><strong>ID:</strong> <?php echo htmlspecialchars($transaction['transaction_id']); ?></p>
                <p><strong>User:</strong> <?php echo htmlspecialchars($transaction['user_name']); ?></p>
                <p><strong>Product:</strong> <?php echo htmlspecialchars($transaction['product_name']); ?></p>
                <p><strong>Quantity:</strong> <?php echo htmlspecialchars($transaction['quantity']); ?></p>
                <p><strong>Total:</strong> <?php echo htmlspecialchars($transaction['total_amount']); ?></p>
                <p><strong>Date:</strong> <?php echo htmlspecialchars($transaction['transaction_date']); ?></p>
            </div>
            <div class="card-footer text-end">
                <a href="transactionList.php" class="btn btn-secondary">Back to Transactions</a>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>