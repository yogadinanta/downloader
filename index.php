<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
</head>
<body>
    <h2>Upload File</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Pilih file:
        <input type="file" name="file" required>
        <input type="submit" value="Upload">
    </form>
</body>
</html>
