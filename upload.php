<?php include "config.php";
$title=$_POST['title'];
$thumb=$_POST['thumbnail'];
$cat=$_POST['category'];

$name=$_FILES['video']['name'];
$tmp=$_FILES['video']['tmp_name'];
$path="videos/".$name;
move_uploaded_file($tmp,$path);

$pdo->prepare("INSERT INTO movies(title,thumbnail,video,category) VALUES(?,?,?,?)")
->execute([$title,$thumb,$path,$cat]);

header("Location:index.php");
?>