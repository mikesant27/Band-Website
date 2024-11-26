<?php
require_once '../DAL/ProductModel.php';

class ProductController
{
    private $model;

    public function __construct()
    {
        $this->model = new ProductModel();
    }

    public function listProducts()
    {
        return $this->model->getAllProducts();
    }

    public function viewProduct($id)
    {
        return $this->model->getProductById($id);
    }

    public function addProduct($name, $price, $description)
    {
        return $this->model->createProduct($name, $price, $description);
    }

    public function updateProduct($id, $name, $price, $description)
    {
        return $this->model->updateProduct($id, $name, $price, $description);
    }

    public function deleteProduct($id)
    {
        return $this->model->deleteProduct($id);
    }

    public function searchProducts($term, $limit = 5, $offset = 0)
    {
        return $this->model->searchProducts($term, $limit, $offset);
    }
}
