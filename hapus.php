<?php
require_once 'functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (hapusSiswa($id)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    header("Location: index.php");
    exit;
}
?>