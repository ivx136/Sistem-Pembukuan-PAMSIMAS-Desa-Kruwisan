<?php
// filepath: /C:/XAMPP/htdocs/php/Sistem Pembukuan PAMSIMAS Desa Kruwisan/src/controllers/AuthController.php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->user->login($username, $password)) {
                if ($this->user->isAdmin()) {
                    session_start();
                    $_SESSION['user_id'] = $this->user->id;
                    $_SESSION['username'] = $this->user->username;
                    $_SESSION['role'] = $this->user->role;
                    header("Location: /php/Sistem Pembukuan PAMSIMAS Desa Kruwisan/public/admin_dashboard.php");
                    exit();
                } else {
                    $error = "Hanya admin yang bisa login.";
                }
            } else {
                $error = "Username atau password salah.";
            }
        }
        include __DIR__ . '/../views/auth/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /php/Sistem Pembukuan PAMSIMAS Desa Kruwisan/public/login.php");
        exit();
    }
}