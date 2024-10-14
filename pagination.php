<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$posts = [
    "Post 1",
    "Post 2",
    "Post 3",
    "Post 4",
    "Post 5",
    "Post 6",
    "Post 7",
    "Post 8",
    "Post 9",
    "Post 10",
    "Post 11",
    "Post 12",
    "Post 13",
    "Post 14",
    "Post 15",
    "Post 1",
    "Post 2",
    "Post 3",
    "Post 4",
    "Post 5",
    "Post 6",
    "Post 7",
    "Post 8",
    "Post 9",
    "Post 10",
    "Post 11",
    "Post 12",
    "Post 13",
    "Post 14",
];

$posts_per_page = 5;

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;

$offset = ($page - 1) * $posts_per_page;

$paginated_posts = array_slice($posts, $offset, $posts_per_page);

$total_pages = ceil(count($posts) / $posts_per_page);

echo json_encode([
    'posts' => $paginated_posts,
    'total_pages' => $total_pages
]);
