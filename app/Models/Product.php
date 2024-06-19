<?php

class Product extends DB {
    private $conn;
    private $table = "products";

    public function __construct() {
        $this->conn = $this->connect();
    }

    public function getAllProducts() {
        return $this->conn->get($this->table);
    }

    public function insertProducts($data) {
        return $this->conn->insert($this->table, $data);
    }

    public function deleteProduct($id) {
        $this->conn->where('id', $id);
        return $this->conn->delete($this->table);
    }

    public function getProduct($id)
    {
        $product = $this->conn->where('id', $id);
        return $product->get($this->table);
    }

    public function updateProduct($id,$data)
    {
        $product = $this->conn->where('id', $id);
        return $product->update($this->table,$data);
    }
}
