<?php
// Folder tujuan penyimpanan file
$targetDir = "uploads/";

// Pastikan folder uploads ada
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    // Ekstensi file yang diperbolehkan
    $allowedTypes = array("jpg","jpeg","png","gif","pdf","doc","docx","xls","xlsx", "txt", "zip", "rar", "mp4", "mp3", "mwb", "sql");

    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            // Jika berhasil upload, buat URL download
            $fileUrl = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/" . $targetFilePath;
            echo "File berhasil diupload.<br>";
            echo "Download Link: <a href='" . $fileUrl . "' target='_blank'>" . $fileUrl . "</a>";
        } else {
            echo "Gagal mengupload file.";
        }
    } else {
        echo "Tipe file tidak diperbolehkan.";
    }
}
?>