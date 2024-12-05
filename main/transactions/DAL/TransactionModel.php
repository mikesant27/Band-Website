<?php
require_once '../../../includes/conn.php';

class TransactionModel
{
    private $table_name = "transactions";
    private $conn;

    public function __construct()
    {
        global $conn;  // Use the global connection variable from conn.php
        $this->conn = $conn;
    }

    public function getAllTransactions()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTransactionById($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Specify the data type
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function searchTransactions($term, $limit = 5, $offset = 0)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE name LIKE :term OR description LIKE :term LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':term', $term, PDO::PARAM_STR);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
