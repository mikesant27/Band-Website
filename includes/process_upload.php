<!-- =========================Start Content================================== -->
<?php
ob_start();  // Start output buffering to prevent output before headers

include 'conn.php';
$message = "";

// Check if $conn is defined and available
if (isset($conn)) {
    // Database name
    $dbname = "banddb";

    try {
        // Select the database
        $conn->exec("USE $dbname");
    } catch (PDOException $e) {
        echo "<p>Error selecting database: " . $e->getMessage() . '</p>';
        exit();  // Stop execution if the database cannot be selected
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $title = !empty($_POST['title']) ? $_POST['title'] : null;
        $duration = !empty($_POST['duration']) ? $_POST['duration'] : null;
        $image = $_FILES['image']['name'];


        if (empty($title) || empty($duration)) {
            $message = "Title and duration are required fields.";
            header('Location: ../includes/show_message.php?type=Upload Song$Message=' . urlencode($message));
            exit();
        }

        // Validate image upload
        if (!empty($image)) {
            $target_dir = "../includes/images/";  // Directory where images will be saved
            $target_file = $target_dir . basename($image);
            $image_entry = "../../../includes/images/" . basename($image);

            // Validate image type and size
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $check = getimagesize($_FILES['image']['tmp_name']); // Check if image is valid
            if ($check === false) {
                $message = "File is not an image.";
                header('Location: ../includes/show_message.php?type=Upload Image&message=' . urlencode($message));
                exit();
            }

            // Check file size (e.g., max 5MB)
            if ($_FILES['image']['size'] > 5000000) {
                $message = "Sorry, your file is too large.";
                header('Location: ../includes/show_message.php?type=Upload Image&message=' . urlencode($message));
                exit();
            }

            // Allow only specific file formats
            $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($imageFileType, $allowed_types)) {
                $message = "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
                header('Location: ../includes/show_message.php?type=Upload Image&message=' . urlencode($message));
                exit();
            }

            // Move the uploaded image to the target directory
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                // Use a prepared statement to insert data into the database
                $sql = "INSERT INTO SONG (title, duration, image_path) VALUES (:title, :duration, :image_path)";
                $stmt = $conn->prepare($sql);

                try {
                    $stmt->execute([
                        ':title' => $title,
                        ':duration' => $duration,
                        ':image_path' => $image_entry
                    ]);
                    $message = "The file " . htmlspecialchars(basename($image)) . " has been uploaded and saved to the database.";
                } catch (PDOException $e) {
                    $message = "Error inserting data into database: " . $e->getMessage();
                }
            } else {
                $message = "Sorry, there was an error uploading your file.";
            }
        } else {
            $message = "No file was uploaded.";
        }
    }
} else {
    $message = "Database connection failed.";
    exit();  // Stop execution if the connection is not available
}

ob_end_flush();  // End output buffering and flush the output

// Redirect with a message
header('Location: ../includes/show_message.php?type=Upload Image&message=' . $message);
exit(); // Always use exit after a redirect to stop further execution

?>
<!-- ===========================End Content================================== -->