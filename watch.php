<?php include "config.php";
$id = $_GET['id'] ?? 0;

// dùng prepare để tránh lỗi + bảo mật
$stmt = $pdo->prepare("SELECT * FROM movies WHERE id=?");
$stmt->execute([$id]);
$m = $stmt->fetch();

// check nếu không có phim
if (!$m) {
    die("Phim không tồn tại");
}
?>
<h1><?=$m['title']?></h1>
<video width="800" controls>
<source src="<?=$m['video']?>">
</video>

<br>
<a href="favorite.php?id=<?=$id?>">❤️ Yêu thích</a>

<form action="rate.php" method="POST">
<input type="hidden" name="id" value="<?=$id?>">
<input type="number" name="rate" min="1" max="5">
<button>Đánh giá</button>

</form>