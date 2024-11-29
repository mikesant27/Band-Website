<?php
require_once '../DAL/ShowModel.php';

class ShowController
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

    public function viewShow($id)
    {
        return $this->model->getShowById($id);
    }

    public function addShow($location, $show_time)
    {
        return $this->model->createShow($location, $show_time);
    }

    public function updateShow($id, $location, $show_time)
    {
        return $this->model->updateShow($id, $location, $show_time);
    }

    public function deleteShow($id)
    {
        return $this->model->deleteShow($id);
    }

    public function searchShows($term, $limit = 5, $offset = 0)
    {
        return $this->model->searchShows($term, $limit, $offset);
    }
}
