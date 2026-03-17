<?php include "config.php";
if($_POST){
  $u=$_POST['username'];
  $p=md5($_POST['password']);
  $stmt=$pdo->prepare("SELECT * FROM users WHERE username=? AND password=?");
  $stmt->execute([$u,$p]);
  if($user=$stmt->fetch()){
    $_SESSION['user']=$user;
    header("Location:index.php");
  }
}
?>
<form method="POST">
<input name="username" placeholder="user">
<input type="password" name="password">
<button>Login</button>
</form>