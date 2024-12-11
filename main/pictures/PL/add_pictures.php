<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Picture</title>
    <link rel="stylesheet" href="../../../css/style.css">
</head>
<body>
    <div class="container mt-3">
        <h2>Insert Picture</h2>
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">Upload a Picture</h2>
                    <form id="uploadForm" action="../../../includes/picture_upload.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="imageTitle" class="form-label">Image Title</label>
                            <input type="text" class="form-control" id="imageTitle" name="title" placeholder="Enter image title" required>
                        </div>
                        <div class="mb-3">
                            <label for="imageFile" class="form-label">Select Image</label>
                            <input class="form-control" type="file" id="imageFile" name="image" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Upload</button>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>