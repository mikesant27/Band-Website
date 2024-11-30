<?php
require_once '../DAL/BlogModel.php';

class BlogController
{
    private $model;

    public function __construct()
    {
        $this->model = new BlogModel();
    }

    public function listBlogs()
    {
        return $this->model->getAllBlogs();
    }

    public function viewBlog($id)
    {
        return $this->model->getBlogById($id);
    }

    public function addBlog($title, $content, $creator)
    {
        return $this->model->createBlog($title, $content, $creator);
    }

    public function updateBlog($id, $title, $content, $creator)
    {
        return $this->model->updateblog($id, $title, $content, $creator);
    }

    public function deleteBlog($id)
    {
        return $this->model->deleteBlog($id);
    }

    public function searchBlogs($term, $limit = 5, $offset = 0)
    {
        return $this->model->searchBlogs($term, $limit, $offset);
    }
}
