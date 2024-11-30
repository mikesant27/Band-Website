<?php
require_once '../BLL/BlogController.php';

$controller = new BlogController();

$limit = 5;
$page = isset($_POST["page"]) ? (int)$_POST["page"] : 1;
$offset = ($page - 1) * $limit;

if (isset($_POST["search_term"])) {
    $search_term = '%' . filter_var($_POST["search_term"], FILTER_SANITIZE_STRING) . '%';
    $products = $controller->searchBlogs($search_term, $limit, $offset);

    echo '<table class="table table-striped">';
    //echo '<thead><tr><th>Name</th><th>Price</th><th>Description</th><th>Actions</th></tr></thead>';
    echo '<tbody>';

    if ($blogs && count($blogs) > 0) {
        foreach ($blogs as $blog) {
            echo "<tr>
                    <td>{$blog['title']}</td>
                    <td>{$blog['content']}</td>
                    <td>{$blog['creator']}</td>
                    <td><a href='viewProduct.php?id={$blog['id']}' class='btn btn-primary'>View</a></td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No matches found</td></tr>";
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo "<p>No search term provided</p>";
}
