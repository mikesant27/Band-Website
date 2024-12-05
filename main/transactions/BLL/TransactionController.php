<?php
require_once '../DAL/TransactionModel.php';

class TransactionController
{
    private $model;

    public function __construct()
    {
        $this->model = new TransactionModel();
    }

    public function listTransactions()
    {
        return $this->model->getAllTransactions();
    }

    public function viewTransaction($id)
    {
        return $this->model->getTransactionById($id);
    }

    public function deleteTransaction($id)
    {
        return $this->model->deleteTransaction($id);
    }

    public function searchTransactions($term, $limit = 5, $offset = 0)
    {
        return $this->model->searchTransactions($term, $limit, $offset);
    }
}
