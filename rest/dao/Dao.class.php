<?php
require 'Database.class.php';
class Dao {
    private $conn;
    private $table_name;
    

    function __construct($table_name) {
        $this->conn = Database::conn();
        $this->table_name=$table_name;
    }

    function get_all() {
        $stmt = $this->conn->prepare("SELECT * FROM ".$this->table_name);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    function get_by_id($id) {
        $stmt = $this->conn->prepare("SELECT * FROM ".$this->table_name." WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM ".$this->table_name." WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return "sucessfuly deleted";
    }

    public function add($entity)
    {
        $query = "INSERT INTO " . $this->table_name . " (";
        foreach ($entity as $column => $value) {
            $query .= $column . ',';
        }
        $query = substr($query, 0, -1);
        $query .= ") VALUES (";
        foreach ($entity as $column => $value) {
            $query .= ":" . $column . ',';
        }
        $query = substr($query, 0, -1);
        $query .= ")";

        $stmt = $this->conn->prepare($query);
        $stmt->execute($entity);
        return 'added';

    }

    public function update($entity)
    {

        $query = "INSERT INTO " . $this->table_name . " (";
        foreach ($entity as $column => $value) {
            $query .= $column . ',';
        };
        $query = substr($query, 0, -1);
        $query .= ") VALUES (";
        foreach ($entity as $column => $value) {
            $query .= ":" . $column . ',';
        }
        $query = substr($query, 0, -1);
        $query .= ")";

        $stmt = $this->conn->prepare($query);
        $stmt->execute($entity);
        return 'updated';

    }

}

