<?php
require_once '../BLL/TransactionController.php';

$error_message = '';
$success_message = '';
$location = $show_time = '';
$id = null;

$controller = new TransactionController();

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $transaction = $controller->viewTransaction($id);

    if ($transaction) {
        //$location = $transaction['location'];
        //$show_time = $transaction['show_time'];
    } else {
        $error_message = "Show not found.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

    if ($controller->deleteTransaction($id)) {
        $success_message = "Transaction deleted successfully!";
        header("Location: transactionList.php");
        exit();
    } else {
        $error_message = "Failed to delete Transaction.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete This Transaction</title>
    <link rel="stylesheet" href="../../../css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white" style="background-color: #ff4500 !important;">
                <h1 class="card-title mb-0">Delete This Show</h1>
            </div>
            <div class="card-body">
                <?php if ($error_message): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo htmlspecialchars($error_message); ?>
                    </div>
                <?php elseif ($success_message): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo htmlspecialchars($success_message); ?>
                    </div>
                <?php endif; ?>

                <?php if ($transaction): ?>
                    <p><strong>ID:</strong> <?php echo htmlspecialchars($transaction['transaction_id']); ?></p>
                    <p><strong>User:</strong> <?php echo htmlspecialchars($transaction['user_name']); ?></p>
                    <p><strong>Product:</strong> <?php echo htmlspecialchars($transaction['product_name']); ?></p>
                    <p><strong>Quantity:</strong> <?php echo htmlspecialchars($transaction['quantity']); ?></p>
                    <p><strong>Total:</strong> <?php echo htmlspecialchars($transaction['total_amount']); ?></p>
                    <p><strong>Date:</strong> <?php echo htmlspecialchars($transaction['transaction_date']); ?></p>
                <?php endif; ?>
            </div>
            <div class="card-footer text-end">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    <i class="fas fa-trash-alt"></i> Delete
                </button>
                <a href="transactionList.php" class="btn btn-secondary">Back to Transactions</a>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Transaction?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form method="POST" action="deleteTransaction.php" style="display: inline;">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>