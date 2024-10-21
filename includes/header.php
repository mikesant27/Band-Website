<?php
    session_start();

    // Retrieve user data from the session
    $fullName = $_SESSION['full_name'];
    $userImage = $_SESSION['user_image'];
?>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
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
    <a href="index.html">Home</a>
    <a href="music.html">Music</a>
    <a href="tour.html">Tour</a>
    <a href="merch.html">Merch</a>
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
        </div>
    <?php endif; ?>
</div>