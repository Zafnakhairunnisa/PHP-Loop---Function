<?php
function bacaData() {
    $namaFile = 'data_siswa.json';
    if (file_exists($namaFile)) {
        $jsonData = file_get_contents($namaFile);
        return json_decode($jsonData, true);
    }
    return [];
}

function tulisData($data) {
    $namaFile = 'data_siswa.json';
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($namaFile, $jsonData);
}

function hitungRataRata($matematika, $bahasa_indonesia, $bahasa_inggris, $ipa) {
    return round(($matematika + $bahasa_indonesia + $bahasa_inggris + $ipa) / 4, 2);
}

function tambahSiswa($nama, $matematika, $bahasa_indonesia, $bahasa_inggris, $ipa) {
    $data = bacaData();
    $id = uniqid();
    $rata_rata = hitungRataRata($matematika, $bahasa_indonesia, $bahasa_inggris, $ipa);
    $siswa = [
        'id' => $id,
        'nama' => $nama,
        'matematika' => $matematika,
        'bahasa_indonesia' => $bahasa_indonesia,
        'bahasa_inggris' => $bahasa_inggris,
        'ipa' => $ipa,
        'rata_rata' => $rata_rata
    ];
    $data[] = $siswa;
    tulisData($data);
    return true;
}

function ambilSemuaSiswa() {
    return bacaData();
}

function ambilSiswa($id) {
    $data = bacaData();
    foreach ($data as $siswa) {
        if ($siswa['id'] === $id) {
            return $siswa;
        }
    }
    return null;
}

function updateSiswa($id, $nama, $matematika, $bahasa_indonesia, $bahasa_inggris, $ipa) {
    $data = bacaData();
    foreach ($data as &$siswa) {
        if ($siswa['id'] === $id) {
            $siswa['nama'] = $nama;
            $siswa['matematika'] = $matematika;
            $siswa['bahasa_indonesia'] = $bahasa_indonesia;
            $siswa['bahasa_inggris'] = $bahasa_inggris;
            $siswa['ipa'] = $ipa;
            $siswa['rata_rata'] = hitungRataRata($matematika, $bahasa_indonesia, $bahasa_inggris, $ipa);
            tulisData($data);
            return true;
        }
    }
    return false;
}

function hapusSiswa($id) {
    $data = bacaData();
    foreach ($data as $key => $siswa) {
        if ($siswa['id'] === $id) {
            unset($data[$key]);
            tulisData(array_values($data));
            return true;
        }
    }
    return false;
}