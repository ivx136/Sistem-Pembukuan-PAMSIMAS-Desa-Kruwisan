<?php
// filepath: /C:/XAMPP/htdocs/php/Sistem Pembukuan PAMSIMAS Desa Kruwisan/public/add_admin.php
require_once __DIR__ . '/../src/config/database.php';
require_once __DIR__ . '/../src/models/User.php';

$database = new Database();
$db = $database->getConnection();

$username = 'admin';
$password = 'adminpassword';
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$role = 'admin';

$query = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
$stmt = $db->prepare($query);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $hashed_password);
$stmt->bindParam(':role', $role);

if ($stmt->execute()) {
    echo "Admin user created successfully.";
} else {
    echo "Failed to create admin user.";
}