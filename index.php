<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Downloader Minipul - Get Your Link | Upload File</title>
    
    <!-- Meta SEO -->
    <meta name="description" content="Downloader Minipul - Get Your Link di downloader.minipul.com, platform terbaik untuk upload dan download file dengan cepat, aman, dan mudah.">
    <meta name="keywords" content="Downloader Minipul, downloader.minipul.com, upload file, download file, Get Your Link, file sharing, file manager">
    <meta name="author" content="Downloader Minipul">
    <meta property="og:title" content="Downloader Minipul - Get Your Link | Upload File">
    <meta property="og:description" content="Upload dan bagikan file Anda dengan Downloader Minipul - Get Your Link. Proses cepat, aman, dan mudah.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://downloader.minipul.com/">
    <meta property="og:image" content="https://downloader.minipul.com//uploads/icon_downloader.png">
    <link rel="icon" href="https://downloader.minipul.com//uploads/icon_downloader.png" type="image/png">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-[#6ea5fb] min-h-screen flex items-center justify-center p-5">

    <div class="bg-white/95 backdrop-blur-md shadow-2xl rounded-2xl p-8 w-full max-w-md border border-gray-200 relative overflow-hidden">
        <!-- Brand -->
        <div class="text-center mb-6">
            <img src="https://downloader.minipul.com//uploads/icon_downloader.png" alt="Downloader Minipul Icon" class="mx-auto w-20 h-20 mb-3">
            <h1 class="text-3xl font-extrabold text-gray-800">Downloader Minipul</h1>
            <p class="text-sm text-gray-600">Get Your Link - <a href="https://downloader.minipul.com/" class="text-[#6ea5fb] font-semibold hover:underline">downloader.minipul.com</a></p>
        </div>

        <!-- Form Upload -->
        <form action="upload.php" method="post" enctype="multipart/form-data" class="space-y-5" onsubmit="showLoading()">
            <div>
                <label for="file" class="block text-gray-700 font-medium mb-2">Pilih File</label>
                <input type="file" name="file" id="file" required
                    class="w-full px-3 py-3 border-2 border-dashed border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6ea5fb] focus:border-[#6ea5fb] bg-gray-50 hover:border-[#ffd02f] transition duration-300">
                <p id="fileName" class="text-xs text-gray-500 mt-2"></p>
            </div>

            <button id="uploadBtn" type="submit"
                class="w-full bg-[#ffd02f] text-[#1f2937] py-3 px-4 rounded-lg shadow-lg hover:opacity-90 transition duration-300 font-medium flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4"/>
                </svg>
                Upload Sekarang
            </button>
        </form>

        <!-- Footer kecil -->
        <div class="mt-6 text-center text-xs text-gray-500">
            © 2025 <a href="https://downloader.minipul.com/" class="text-[#6ea5fb] font-semibold hover:underline">Downloader Minipul</a> - Get Your Link. All Rights Reserved.
        </div>
    </div>

    <script>
        // tampilkan nama file yang dipilih
        document.getElementById('file').addEventListener('change', function() {
            const fileName = this.files[0] ? this.files[0].name : "";
            document.getElementById('fileName').textContent = fileName ? `File dipilih: ${fileName}` : "";
        });

        // animasi tombol saat upload
        function showLoading() {
            const btn = document.getElementById('uploadBtn');
            btn.disabled = true;
            btn.innerHTML = `
                <svg class="animate-spin h-5 w-5 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                </svg>
                Mengunggah...
            `;
        }
    </script>

</body>
</html>
