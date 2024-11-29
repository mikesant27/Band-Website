<?php
require_once '../DAL/UserModel.php';

class UserController
{
    private $model;

    public function __construct()
    {
        $this->model = new ShowModel();
    }

    public function listShows()
    {
        return $this->model->getAllShows();
    }

    public function viewUser($id)
    {
        return $this->model->getUserById($id);
    }

    public function updateUser($id, $username, $email, $full_name, $role)
    {
        return $this->model->updateUser($id, $username, $email, $full_name, $role);
    }

    public function deleteUser($id)
    {
        return $this->model->deleteUser($id);
    }

    public function searchUsers($term, $limit = 5, $offset = 0)
    {
        return $this->model->searchShows($term, $limit, $offset);
    }
}
