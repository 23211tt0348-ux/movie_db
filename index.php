<?php 
include "config.php";
$q = $_GET['q'] ?? '';
$cat = $_GET['cat'] ?? '';

$sql = "SELECT * FROM movies WHERE title LIKE ?";
$params = ["%$q%"];

if($cat) {
  $sql .= " AND category=?";
  $params[] = $cat;
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
?>
<!DOCTYPE html>
<html>
<head>
<title>WEB XEM PHIM</title>
<style>
body{background:#141414;color:#fff;font-family:sans-serif}
.movie{display:inline-block;margin:15px}
img{width:200px;height:300px;border-radius:10px}
</style>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "navbar.php"; ?>
<h1>🎬 Movie Web</h1>

<form>
<input name="q" placeholder="Tìm phim...">
<select name="cat">
<option value="">All</option>
<option>Action</option>
<option>Romance</option>
</select>
<button>Tìm</button>
</form>

<?php while($m=$stmt->fetch()): ?>
<div class="movie">
<a href="watch.php?id=<?=$m['id']?>">
<img src="<?=$m['thumbnail']?>">
<h3><?=$m['title']?></h3>
</a>
</div>
<?php endwhile; ?>

<br>
</body>
</html>