<?php 
include "config.php";

if (!isset($_SESSION['user'])) {
    die("Bạn chưa đăng nhập");
}

$user = $_SESSION['user']['id'];
$movie = $_POST['id'] ?? 0;
$rate = $_POST['rate'] ?? 0;

if (!$movie || !$rate) {
    die("Thiếu dữ liệu");
}

$stmt = $pdo->prepare("INSERT INTO ratings(user_id, movie_id, rating) VALUES(?,?,?)");
$stmt->execute([$user, $movie, $rate]);

header("Location: watch.php?id=$movie");