<?php
    session_start();

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
?>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .user-info {
        position: absolute;
        top: 10px;
        right: 10px;
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .user-info img {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        margin: 5px 0;
    }

    .logout-link {
        margin-top: 5px;
        font-size: 14px;
    }
</style>

<div class="menu">
    <a href="../../home/PL/home.php">Home</a>
    <a href="../../music/PL/music.php">Music</a>
    <a href="../../shows/PL/showList.php">Shows</a>
    <a href="../../merch/PL/productList.php">Merch</a>
    <a href="../../blog/PL/blogList.php">Blog</a>
    <!--Change href below once admin dashboard has been made-->
    <?php if ($isAdmin): ?><a href="../../admin/PL/admin.php">Admin</a><?php endif; ?>
    <?php if ($isAdmin): ?><a href="../../music/PL/add_images.php">Add Images</a><?php endif; ?>
</div>

<div class="header">
    <h1>Band Name</h1>
    <?php if (isset($_SESSION['user_id'])): ?>
        <!-- User information displayed at the top right corner -->
        <div class="user-info">
            <span><?php echo htmlspecialchars($fullName); ?></span>
            <?php if (!empty($userImage)): ?>
                <img src="<?php echo htmlspecialchars($userImage); ?>" alt="User Image">
            <?php endif; ?>
            <a href="../../../includes/logout.php" class="logout-link text-decoration-none text-white" style="text-decoration: none; color: black !important;">Logout</a>
        </div>
    <?php endif; ?>
</div>