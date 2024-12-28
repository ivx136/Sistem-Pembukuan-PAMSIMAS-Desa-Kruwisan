<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /php/Sistem Pembukuan PAMSIMAS Desa Kruwisan/public/login.php");
    exit();
}
?>
<?php include __DIR__ . '/../src/views/layout/header.php'; ?>
<div class="container mt-5">
    <div class="jumbotron">
        <h1 class="display-4">Selamat Datang di Sistem Pembukuan PAMSIMAS Desa Kruwisan</h1>
        <p class="lead">Ini adalah halaman utama.</p>
        <hr class="my-4">
        <p>Gunakan sistem ini untuk mengelola pembukuan PAMSIMAS dengan mudah dan efisien.</p>
        <a class="btn btn-primary btn-lg" href="/php/Sistem Pembukuan PAMSIMAS Desa Kruwisan/public/admin_dashboard.php" role="button">Admin Dashboard</a>
    </div>
</div>
<?php include __DIR__ . '/../src/views/layout/footer.php'; ?>