<?php include "config.php";
if($_POST){
 $u=$_POST['username'];
 $p=md5($_POST['password']);
 $pdo->prepare("INSERT INTO users(username,password) VALUES(?,?)")->execute([$u,$p]);
}
?>
<form method="POST">
<input name="username">
<input type="password" name="password">
<button>Register</button>
</form>