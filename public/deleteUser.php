<?php
// Load all application files and configurations
require($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');
// Include the HTML layout class
include('../Templates/layout.php');
include('../Templates/News.php');
// Connect to the database
// Initialize variables
$requestType = $_SERVER['REQUEST_METHOD'];
$email = $_GET['email'];
if ($_SESSION['user'])
{
    $sql = "delete from users where email=" . $_GET['email'];
    $result = $db->query($sql);
    header('Location: index.php');
}
else
{
    header('Location: login.php');
}