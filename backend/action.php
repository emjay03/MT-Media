<?php
include './Model/AuthManager.php';
include './Model/DatabaseConnection.php'; 

$dbConnection = new DatabaseConnection('localhost', 'root', '', 'mt-media');
$authManager = new AuthManager($dbConnection);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $authManager->loginUser($username, $password);
    } catch (Exception $e) {
        $error = "An error occurred: " . $e->getMessage();
    }
}

?>