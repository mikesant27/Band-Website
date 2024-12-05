<?php
require_once '../BLL/ShowController.php';

$controller = new ShowController();
$shows = $controller->listShows();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shows</title>
    <link rel="icon" type="image/x-icon" href="../../../includes/favicon.png">
    <link rel="stylesheet" href="../../../css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Include DataTables CSS and jQuery -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
</head>

<body>
    <?php include '../../../includes/header.php'; 
    $isStaff = $_SESSION['role'] === 'staff';
    ?>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Shows</h1>
        </div>
        <div class="table-responsive mt-3">
            <table id="productTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Location</th>
                        <th>Time</th>
                        <?php if ($isStaff): ?>
                            <th>Actions</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($shows as $show): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($show['id']); ?></td>
                        <td><?php echo htmlspecialchars($show['location']); ?></td>
                        <td><?php echo htmlspecialchars($show['show_time']); ?></td>
                        <?php if ($isStaff): ?>
                            <td>
                                <a href="addShow.php?id=<?php echo $show['id']; ?>" class="btn btn-success btn-sm">
                                    <i class="fas fa-add"></i>
                                </a>
                                <a href="viewShow.php?id=<?php echo $show['id']; ?>" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="editShow.php?id=<?php echo $show['id']; ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="deleteShow.php?id=<?php echo $show['id']; ?>" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- jQuery, Bootstrap JS, and DataTables JS -->
    <!-- Include jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#productTable').DataTable({
            responsive: true,
            autoWidth: false,
            paging: true,
            searching: true
        });
    });
    </script>
</body>

</html>