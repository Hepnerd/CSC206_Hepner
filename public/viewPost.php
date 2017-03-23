<?php
// Load all application files and configurations
require($_SERVER[ 'DOCUMENT_ROOT' ] . '/../includes/application_includes.php');
// Include the HTML layout class
include('../Templates/layout.php');
include('../Templates/News.php');
// Connect to the database
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Initialize variables
$requestType = $_SERVER['REQUEST_METHOD'];
// Generate the HTML for the top of the page
Layout::pageTop('CSC206 Project');
// Page content goes here
?>
<div class="container top25">
    <div class="col-md-8">
        <section class="content">

            <?php
            if ( $requestType == 'GET' ) {
//
                $sql = 'select * from posts where id = ' . $_GET['id'];
                $result = $db->query($sql);
                $row = $result->fetch();
                //News::story($row);
                //showUpdateForm($row);
                $id = $row['id'];
                $title = $row['title'];
                $content = $row['content'];
                $startDate = $row['startDate'];
                $endDate = $row['endDate'];
                $image = $row['image'];

                echo <<<postform
                <form id="createPostForm" action='viewPost.php' method="POST" class="form-horizontal">
        <fieldset>


            <!-- Form Name -->
            <legend>View Post</legend>
  <input type="hidden" name="id" value=$id>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="title">Title = $title</label>
            </div>

            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-3 control-label" for="content">Content = $content</label>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="startDate">Start Date = $startDate</label>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="endDate">End Date = $endDate</label>
            </div>

            <!-- File Button
                <div class="form-group">
                <label class="col-md-3 control-label" for="image">Image = $image</label>
            </div>
                -->

        </fieldset>
    </form>
            <h4><a href="updatePost.php?id=$id">Edit</a>
postform;


            } elseif ( $requestType == 'POST' ) {
                //Validate data
                // Save data
                $id = $_POST['id'];
                $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
                $content = htmlspecialchars($_POST['content'], ENT_QUOTES);

                //  echo '<pre>' . print_r($_POST) . '</pre>';
                $sql = "update posts set title = '$title', content = '$content' where id = $id;";
                $result = $db->query($sql);
            }
            ?>





<?php
// Generate the page footer
Layout::pageBottom();
?>
