<?php
require_once '../BLL/ProductController.php';

$controller = new ProductController();

$limit = 5;
$page = isset($_POST["page"]) ? (int)$_POST["page"] : 1;
$offset = ($page - 1) * $limit;

if (isset($_POST["search_term"])) {
    $search_term = '%' . filter_var($_POST["search_term"], FILTER_SANITIZE_STRING) . '%';
    $products = $controller->searchProducts($search_term, $limit, $offset);

    echo '<table class="table table-striped">';
    //echo '<thead><tr><th>Name</th><th>Price</th><th>Description</th><th>Actions</th></tr></thead>';
    echo '<tbody>';

    if ($products && count($products) > 0) {
        foreach ($products as $product) {
            echo "<tr>
                    <td>{$product['name']}</td>
                    <td>{$product['price']}</td>
                    <td>{$product['description']}</td>
                    <td><a href='viewProduct.php?id={$product['id']}' class='btn btn-primary'>View</a></td>
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
