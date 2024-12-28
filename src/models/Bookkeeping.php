<?php
// filepath: src/models/Bookkeeping.php
class Bookkeeping {
    private $conn;
    private $table_name = "bookkeeping";

    public $id;
    public $description;
    public $amount;
    public $date;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}