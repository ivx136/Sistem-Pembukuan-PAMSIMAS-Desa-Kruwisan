<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: /php/Sistem Pembukuan PAMSIMAS Desa Kruwisan/public/login.php");
    exit();
}
?>
<?php include __DIR__ . '/../src/views/layout/header.php'; ?>
<div class="container mt-5">
    <h2>Admin Dashboard</h2>
    <p>Selamat datang, <?php echo $_SESSION['username']; ?>!</p>
    <a href="/php/Sistem Pembukuan PAMSIMAS Desa Kruwisan/public/logout.php" class="btn btn-danger">Logout</a>
</div>
<?php include __DIR__ . '/../src/views/layout/footer.php'; ?>