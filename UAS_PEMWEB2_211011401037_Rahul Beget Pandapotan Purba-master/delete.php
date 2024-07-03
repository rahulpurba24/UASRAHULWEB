<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['kdeuro'])) {
    $kdeuro = $_GET['kdeuro'];

    $stmt = $conn->prepare("DELETE FROM euro2024 WHERE kdeuro=?");
    $stmt->bind_param("s", $kdeuro);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Kode UEFA tidak valid.";
    exit();
}
