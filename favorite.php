<?php include "config.php";
$user=$_SESSION['user']['id'];
$movie=$_GET['id'];
$pdo->prepare("INSERT INTO favorites(user_id,movie_id) VALUES(?,?)")->execute([$user,$movie]);
header("Location:watch.php?id=$movie");
?>