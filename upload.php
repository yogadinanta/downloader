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
    $allowedTypes = array("jpg","jpeg","png","gif","pdf","doc","docx","xls","xlsx", "txt", "zip", "rar", "mp4", "mp3", "mwb", "sql", "svg", "pkt");

    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Upload File</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #6ea5fb;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen px-4">

    <div class="bg-white shadow-2xl rounded-2xl p-8 w-full max-w-lg text-center transform transition-all duration-300 hover:scale-[1.02]">
        <div class="flex items-center justify-center mb-6">
            <i class="fa-solid fa-cloud-arrow-up text-5xl text-[#ffd02f] mr-3"></i>
            <h1 class="text-3xl font-bold text-gray-800">Hasil Upload File</h1>
        </div>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <?php if (in_array($fileType, $allowedTypes)): ?>
                <?php if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)): ?>
                    <?php 
                        $fileUrl = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/" . $targetFilePath;
                    ?>
                    <div class="bg-green-50 border border-green-200 rounded-xl p-5 mb-4">
                        <h2 class="text-2xl font-semibold text-green-600 mb-2">
                            <i class="fa-solid fa-circle-check mr-2"></i>File Berhasil Diupload!
                        </h2>
                        <p class="mb-3 text-gray-700">Link Download:</p>
                        <div class="flex items-center justify-center bg-gray-50 border border-gray-200 rounded-lg p-2 space-x-3">
                            <a id="fileUrl" href="<?php echo $fileUrl; ?>" target="_blank" 
                               class="text-blue-600 underline break-all hover:text-blue-800 transition">
                               <?php echo $fileUrl; ?>
                            </a>
                            <button onclick="copyUrl()" class="text-gray-600 hover:text-blue-600 transition" title="Salin URL">
                                <i class="fa-solid fa-copy"></i>
                            </button>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="bg-red-50 border border-red-200 rounded-xl p-5">
                        <h2 class="text-2xl font-semibold text-red-600">
                            <i class="fa-solid fa-triangle-exclamation mr-2"></i>Gagal Mengupload File
                        </h2>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-5">
                    <h2 class="text-2xl font-semibold text-yellow-600">
                        <i class="fa-solid fa-ban mr-2"></i>Tipe File Tidak Diperbolehkan
                    </h2>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="bg-blue-50 border border-blue-200 rounded-xl p-5">
                <h2 class="text-xl font-semibold text-gray-700">
                    <i class="fa-solid fa-info-circle mr-2"></i>Akses halaman ini melalui form upload.
                </h2>
            </div>
        <?php endif; ?>

        <a href="/" class="mt-6 inline-block text-[#1f2937] bg-[#ffd02f] hover:bg-blue-600 transition px-6 py-2 rounded-full shadow-md">
            Kembali Ke Beranda
        </a>
    </div>

    <script>
        function copyUrl() {
            const urlText = document.getElementById("fileUrl").href;
            navigator.clipboard.writeText(urlText).then(() => {
                alert("✅ URL berhasil disalin!");
            });
        }
    </script>
</body>
</html>
