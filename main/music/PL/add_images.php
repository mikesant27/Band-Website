<?php
// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect non-admin users
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../../home/PL/home.php');
    exit();
}
?>

<link rel="stylesheet" href="../../../css/style.css">

<div class="container mt-3">
    <h2>Insert Music Image</h2>
    <div class="card">
        <div class="card-body">
            <h2 class="text-center">Upload Song Details</h2>
            <form id="uploadForm" action="../../../includes/process_upload.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="songTitle" class="form-label">Song Title</label>
                    <input type="text" class="form-control" id="songTitle" name="title" placeholder="Enter song title" required>
                </div>
                <div class="mb-3">
                    <label for="songDuration" class="form-label">Duration (HH:MM:SS)</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="songDuration" 
                        name="duration" 
                        placeholder="e.g., 00:03:45" 
                        pattern="^([0-9]{2}):([0-5][0-9]):([0-5][0-9])$" 
                        required 
                        title="Please enter the duration in HH:MM:SS format.">
                    <small class="form-text text-muted">Enter the duration in the format HH:MM:SS.</small>
                </div>
                <div class="mb-3">
                    <label for="imageFile" class="form-label">Select Cover Image</label>
                    <input class="form-control" type="file" id="imageFile" name="image" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Upload</button>
            </form>
        </div>
    </div>
</div>
