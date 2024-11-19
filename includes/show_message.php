    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Account Created!</title>
        <link rel="icon" type="image/x-icon" href="./includes/favicon.ico">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="../css/styles.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container-fluid content-wrapper d-flex flex-column flex-grow-1">
            <div class="row flex-grow-1">
                <div class="container mt-3">
                        <?php
                        if (isset($_GET['type'])) {

                            $type = $_GET['type'];
                            echo "<h2>$type</h2>";
                        }
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <!-- =========================Start Content================================== -->
                                <?php
                                    // Check if the 'message' parameter exists in the URL
                                    if (isset($_GET['message'])) {
                                        // Retrieve the value from the 'key' parameter in the URL
                                        $value = $_GET['message'];

                                        // Output the value
                                        echo "<p>$value" . "</p>";;
                                    } else {
                                        echo  "<p>No 'message' parameter found in the URL." . "</p>";;
                                    }
                                ?>

                                <!-- ===========================End Content================================== -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        <script>
            // script to show the message above, wait 5 seconds, then go to home
            setTimeout(function() {
                window.location.href = "../home.php";
            }, 5000); // Redirect after 5 seconds (5000ms)
        </script>
    </body>

    </html>