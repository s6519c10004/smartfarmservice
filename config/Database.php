<?php
class Database {
    private $host = "mysql-1bd6670d-sau-d963.e.aivencloud.com:15087";
    private $db_name = "smart_farm_db";
    private $username = "avnadmin";
    private $password = "AVNS_Mb-I6Zb6nNBrx0elRr2";
    private $conn;
 
    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Database Connection Error: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>