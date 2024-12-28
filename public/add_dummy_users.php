<?php
require_once __DIR__ . '/../src/config/database.php';
require_once __DIR__ . '/../src/models/User.php';

$database = new Database();
$db = $database->getConnection();

$users = [
    ['username' => 'admin', 'password' => 'adminpassword', 'role' => 'admin'],
    ['username' => 'user1', 'password' => 'userpassword1', 'role' => 'user'],
    ['username' => 'user2', 'password' => 'userpassword2', 'role' => 'user'],
    ['username' => 'user3', 'password' => 'userpassword3', 'role' => 'user']
];

foreach ($users as $user) {
    $username = $user['username'];
    $password = password_hash($user['password'], PASSWORD_DEFAULT);
    $role = $user['role'];

    // Periksa apakah pengguna sudah ada
    $query = "SELECT COUNT(*) FROM users WHERE username = :username";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count == 0) {
        // Tambahkan pengguna jika belum ada
        $query = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);

        if ($stmt->execute()) {
            echo "User $username created successfully.<br>";
        } else {
            echo "Failed to create user $username.<br>";
        }
    } else {
        echo "User $username already exists.<br>";
    }
}