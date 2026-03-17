<?php 

include "config.php";
if(!isset($_SESSION['user'])) die("Login required");
?>
<form action="upload.php" method="POST" enctype="multipart/form-data">
<input name="title" placeholder="Tên phim"><br>
<input name="thumbnail" placeholder="Ảnh"><br>
<select name="category">
<option>Action</option>
<option>Romance</option>
</select><br>
<input type="file" name="video"><br>
<button>Upload</button>
</form>