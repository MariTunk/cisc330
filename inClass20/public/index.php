<?php
require_once "../app/models/model.php";
require_once "../app/models/posts.php";
require_once "../app/controllers/PostController.php"; // Fixed file name (case-sensitive)

// Set environment variables
$env = parse_ini_file('../.env');

define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);

use app\controllers\PostController;

// Get URI without query strings
$uri = strtok($_SERVER["REQUEST_URI"], '?');

// Break URI into parts
$uriArray = explode("/", $uri);

// API: Get all users or a single user
if ($uriArray[1] === 'api' && $uriArray[2] === 'users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $userID = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $postController = new PostController();

    if ($userID) {
        $postController->getUserByID($userID);
    } else {
        $postController->getAllUsers();
    }
}

// API: Get notes (if applicable)
if ($uriArray[1] === 'api' && $uriArray[2] === 'notes' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $postController = new PostController();
    $postController->getNotes(); // Ensure this method exists in PostController.php
}

// API: Save user
if ($uriArray[1] === 'api' && $uriArray[2] === 'users' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $postController = new PostController();
    $postController->saveUser();
}

// API: Update user
if ($uriArray[1] === 'api' && $uriArray[2] === 'users' && $_SERVER['REQUEST_METHOD'] === 'PUT') {
    $userID = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $postController = new PostController();
    $postController->updateUser($userID);
}

// API: Delete user
if ($uriArray[1] === 'api' && $uriArray[2] === 'users' && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $userID = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $postController = new PostController();
    $postController->deleteUser($userID);
}

// Views: New User
if ($uri === '/new-user' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $postController = new PostController();
    $postController->usersAddView();
}

// Views: Update User
if ($uriArray[1] === 'users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $postController = new PostController();
    $postController->usersUpdateView();
}

// Views: Delete User
if ($uriArray[1] === 'delete-user' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $postController = new PostController();
    $postController->usersDeleteView();
}

// Views: Default Users Page
if ($uriArray[1] === '' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $postController = new PostController();
    $postController->usersView();
}

// If no routes match, show Not Found page
include '../public/assets/views/notFound.html';
exit();
?>
