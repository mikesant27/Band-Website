<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        // Redirect to the index page if not logged in
        header('Location: ../index.php');
        exit();
    }

    // Retrieve user data from the session
    $fullName = $_SESSION['full_name'];
    $userImage = $_SESSION['user_image'];
    $isAdmin = $_SESSION['role'] === 'admin';
    $isStaff = $_SESSION['role'] === 'staff';
?>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="menu">
    <a href="../../home/PL/home.php">Home</a>
    <a href="../../music/PL/music.php">Music</a>
    <a href="../../shows/PL/showList.php">Shows</a>
    <a href="../../merch/PL/productList.php">Merch</a>
    <a href="../../blog/PL/blogList.php">Blog</a>
    <a href="../../pictures/PL/pictures.php">Pictures</a>
    <?php if ($isAdmin): ?><a href="../../admin/PL/admin.php">Admin</a><?php endif; ?>
    <?php if ($isStaff): ?><a href="../../staff/PL/staff.php">Staff</a><?php endif; ?>
</div>

<div class="header">
    <h1>Velvet Horizon</h1>
    <?php if (isset($_SESSION['user_id'])): ?>
        <!-- User information displayed at the top right corner -->
        <div class="user-info">
            <span><?php echo htmlspecialchars($fullName); ?></span>
            <?php if (!empty($userImage)): ?>
                <img src="<?php echo htmlspecialchars($userImage); ?>" alt="User Image">
            <?php endif; ?>
            <a href="../../../includes/logout.php" class="logout-link" style="text-decoration: none; color: #ff4500 !important;">Logout</a>
        </div>
    <?php endif; ?>
</div>