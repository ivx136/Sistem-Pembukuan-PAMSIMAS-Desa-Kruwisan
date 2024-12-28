<?php
// filepath: /C:/XAMPP/htdocs/php/Sistem Pembukuan PAMSIMAS Desa Kruwisan/public/logout.php
require_once __DIR__ . '/../src/controllers/AuthController.php';
$authController = new AuthController();
$authController->logout();