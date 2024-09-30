<?php
require_once 'functions.php';

$siswa = ambilSemuaSiswa();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penilaian Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="container mx-auto py-20 px-32">
        <h1 class="text-3xl font-bold mb-6 text-center">Sistem Penilaian Siswa</h1>

        <a href="tambah.php"
            class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
            Tambah Siswa
        </a>

        <table class="w-full bg-white shadow-md rounded mb-4">
            <thead>
                <tr class="bg-indigo-600 text-white text-center uppercase text-sm leading-normal">
                    <th class="py-3 px-6">Nama</th>
                    <th class="py-3 px-6">Matematika</th>
                    <th class="py-3 px-6">Bahasa Indonesia</th>
                    <th class="py-3 px-6">Bahasa Inggris</th>
                    <th class="py-3 px-6">IPA</th>
                    <th class="py-3 px-6">Rata-rata</th>
                    <th class="py-3 px-6">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center text-sm">
                <?php foreach ($siswa as $s): ?>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 whitespace-nowrap"><?= htmlspecialchars($s['nama']) ?></td>
                    <td class="py-3 px-6"><?= $s['matematika'] ?></td>
                    <td class="py-3 px-6"><?= $s['bahasa_indonesia'] ?></td>
                    <td class="py-3 px-6"><?= $s['bahasa_inggris'] ?></td>
                    <td class="py-3 px-6"><?= $s['ipa'] ?></td>
                    <td class="py-3 px-6"><?= $s['rata_rata'] ?></td>
                    <td class="py-3 px-6">
                        <a href="edit.php?id=<?= $s['id'] ?>"
                            class="text-white bg-blue-500 py-2 px-4 rounded-xl hover:bg-blue-700">Edit</a>
                        <a href="hapus.php?id=<?= $s['id'] ?>"
                            class="text-white py-2 px-4 rounded-xl bg-red-500 hover:bg-red-700"
                            onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>