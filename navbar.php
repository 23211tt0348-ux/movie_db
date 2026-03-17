
<div class="navbar">
    <div class="logo">🎬WEB DEMO</div>

    <div class="nav-links">
        <a href="index.php">Trang chủ</a>
        <a href="admin.php">Admin</a>
        <a href="register.php">Register</a> |
        <a href="favorite.php">Yêu thích</a>
    </div>

    <div class="search-box">
        <form method="GET" action="index.php">
            <input type="text" name="q" placeholder="Tìm phim...">
            <button>Tìm</button>
        </form>
    </div>

    <div>
        <?php if(isset($_SESSION['user'])): ?>
            Xin chào, <?= $_SESSION['user']['username'] ?> |
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>
</div>