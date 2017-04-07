<?php
// Load all application files and configurations
require($_SERVER['DOCUMENT_ROOT'] . '../../includes/application_includes.php');
// Include the HTML layout class
include('../Templates/layout.php');
include('../Templates/getPosts.php');
// Connect to the database
// Generate the HTML for the top of the page
Layout::pageTop('CSC206 Project');


if ($requestType == 'GET') {
//
    showloginForm();
} elseif ($requestType == 'POST') {
    //echo '<h1>Process Login Form </h1>';
    $input = $_POST;

    $sql = "select * from users where email = '" . $input['email'] . "'";
    $result = $db->query($sql);

    if (!$result->size() == 0) {
        $user = $result->fetch();
        //echo $user['password'] . "<br>";
        if (password_verify($input['password'], $user['password'])) {
            $_SESSION['user'] = $user;
            //print_r($user);
            echo '<h1>we are logged in</h1>';
            header('Location: index.php');
        } else {
            echo '<h1>Invalid Password</h1>';
            echo '<h3>Please login again or go back to home</h3>';
        }

    } else {
        echo '<h1>User not found</h1>';
        echo '<h3>Please login again or go back to home</h3>';
    }

}
?>


