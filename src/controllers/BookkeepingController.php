<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Bookkeeping.php';

class BookkeepingController {
    private $db;
    private $bookkeeping;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->bookkeeping = new Bookkeeping($this->db);
    }

    public function index() {
        $stmt = $this->bookkeeping->read();
        $bookkeepings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include __DIR__ . '/../views/bookkeeping/index.php';
    }
}