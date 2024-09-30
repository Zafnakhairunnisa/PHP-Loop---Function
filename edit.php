<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $matematika = $_POST['matematika'];
    $bahasa_indonesia = $_POST['bahasa_indonesia'];
    $bahasa_inggris = $_POST['bahasa_inggris'];
    $ipa = $_POST['ipa'];
    
    if (updateSiswa($id, $nama, $matematika, $bahasa_indonesia, $bahasa_inggris, $ipa)) {
        header("Location: index.php");
        exit;
    }
} else {
    $id = $_GET['id'];
    $siswa = ambilSiswa($id);
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-20 px-32">
        <h1 class="text-3xl font-bold mb-6 text-center">Edit Siswa</h1>

        <form action="edit.php" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <input type="hidden" name="id" value="<?= $siswa['id'] ?>">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                    Nama
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="nama" name="nama" type="text" value="<?= htmlspecialchars($siswa['nama']) ?>" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="matematika">
                    Nilai Matematika
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="matematika" name="matematika" type="number" value="<?= $siswa['matematika'] ?>" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="bahasa_indonesia">
                    Nilai Bahasa Indonesia
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="bahasa_indonesia" name="bahasa_indonesia" type="number"
                    value="<?= $siswa['bahasa_indonesia'] ?>" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="bahasa_inggris">
                    Nilai Bahasa Inggris
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="bahasa_inggris" name="bahasa_inggris" type="number" value="<?= $siswa['bahasa_inggris'] ?>"
                    required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="ipa">
                    Nilai IPA
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="ipa" name="ipa" type="number" value="<?= $siswa['ipa'] ?>" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="rata_rata">
                    Rata-rata
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="rata_rata" type="number" value="<?= $siswa['rata_rata'] ?>" disabled>
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Update Siswa
                </button>
                <a href="index.php"
                    class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Batal
                </a>
            </div>
        </form>
    </div>
</body>

</html>