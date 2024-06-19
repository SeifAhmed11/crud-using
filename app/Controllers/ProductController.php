<?php

class ProductController {
    private $conn;

    public function __construct() {
        $this->conn = new Product();
    }

    public function index() {
        $data['products'] = $this->conn->getAllProducts();
        View::load('product/index', $data);
    }

    public function add() {
        View::load('product/add');
    }

    public function store() {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];

            $dataInsert = [
                "name" => $name,
                "description" => $description,
                "price" => $price,
                "qty" => $qty
            ];

            if ($this->conn->insertProducts($dataInsert)) {
                $data['success'] = "Data Added Successfully";
                View::load('product/add', $data);
            } else {
                $data['error'] = "Error Adding Data";
                View::load('product/add', $data);
            }
        } else {
            View::load('product/add');
        }
    }

    public function delete($id) {
        $data['id'] = $id;
        View::load('product/delete', $data);
    }

    public function destroy($id) {
        if ($this->conn->deleteProduct($id)) {
            $data['success'] = "Product Has Been Deleted";
        } else {
            $data['error'] = "Error Deleting Product";
        }
        View::load('product/delete', $data);
    }

    public function edit($id) {
        $data['row'] = $this->conn->getProduct($id)[0];
        View::load('product/edit', $data);
    }

    public function update() {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];
            $id = $_POST['id'];

            $dataUpdate = [
                "name" => $name,
                "description" => $description,
                "price" => $price,
                "qty" => $qty
            ];

            if ($this->conn->updateProduct($id, $dataUpdate)) {
                $data['success'] = "Updated Successfully";
                $data['row'] = $this->conn->getProduct($id)[0];
                View::load('product/edit', $data);
            } else {
                $data['error'] = "Error Updating Product";
                $data['row'] = $this->conn->getProduct($id)[0];
                View::load('product/edit', $data);
            }
        } else {
            redirect('home/index');
        }
    }
}
