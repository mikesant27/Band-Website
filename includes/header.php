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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #ff4500;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #1a1a1a;
  color:rgb(172, 48, 3);
}

.topnav a.active {
  color: #ff4500;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {
    display: none;
  }
  
  .topnav a.icon {
    float: left;
    display: block;
  }

  .topnav.responsive {
    position: relative;
  }

  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>
</head>
<body>

<div class="topnav" id="myTopnav">
    <a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="fa fa-bars"></i></a>
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

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
</body>
</html>