<?php
require_once '../../../includes/conn.php';

class ShowModel
{
    private $table_name = "shows";
    private $conn;

    public function __construct()
    {
        global $conn;  // Use the global connection variable from conn.php
        $this->conn = $conn;
    }

    public function getAllShows()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getShowById($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Specify the data type
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createShow($location, $show_time)
    {
        $query = "INSERT INTO " . $this->table_name . " (location, show_time) VALUES (:location, :show_time)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":location", $location);
        $stmt->bindParam(":show_time", $show_time);
        return $stmt->execute();
    }

    public function updateShow($id, $locate, $show_time)
    {
        $query = "UPDATE " . $this->table_name . " SET location = :location, show_time = :show_time WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":location", $location);
        $stmt->bindParam(":show_time", $show_time);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT); // Specify the data type
        return $stmt->execute();
    }

    public function deleteShow($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Specify the data type
        return $stmt->execute();
    }

    public function searchShows($term, $limit = 5, $offset = 0)
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
