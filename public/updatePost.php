<?php
// Load all application files and configurations
require($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');
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
                if ($requestType == 'GET') {
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
                <form id="createPostForm" action='updatePost.php' method="POST" class="form-horizontal">
        <fieldset>


            <!-- Form Name -->
            <legend>Update Post</legend>
  <input type="hidden" name="id" value=$id>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="title">Title</label>
                <div class="col-md-8">
                    <input id="title" name="title" type="text" placeholder="post title" value="$title" class="form-control input-md" required="">
                </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-3 control-label" for="content">Content</label>
                <div class="col-md-8">
                    <textarea class="form-control" id="content" name="content">$content</textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="startDate">Effective Date</label>
                <div class="col-md-8">
                    <input id="startDate" name="startDate" type="text" placeholder="effective date" value="$startDate" class="form-control input-md" required="">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="endDate">End Date</label>
                <div class="col-md-8">
                    <input id="endDate" name="endDate" type="text" placeholder="end date" value="$endDate" class="form-control input-md">
                </div>
            </div>

            <!-- File Button
                <div class="form-group">
                <label class="col-md-3 control-label" for="image">Image Upload</label>
                <div class="col-md-8">
                    <input id="image" name="image" class="input-file" value="$image" type="file">
                </div>
            </div>
                -->

            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-3 control-label" for="submit"></label>
                <div class="col-md-8">
                    <button id="submit" name="submit" value="Submit" class="btn btn-success">Submit</button>
                    <a id="cancel" name="cancel" href="index.php" value="Cancel" class="btn btn-info">Cancel</a>
                </div>
            </div>

        </fieldset>
    </form>
postform;


                } elseif ($requestType == 'POST') {
                    //Validate data
                    // Save data
                    $id = $_POST['id'];
                    $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
                    $content = htmlspecialchars($_POST['content'], ENT_QUOTES);
                    $startDate = htmlspecialchars($_POST['startDate'], ENT_QUOTES);
                    $endDate = htmlspecialchars($_POST['endDate'], ENT_QUOTES);

                    //add in startdate and enddate

                    //echo '<pre>' . print_r($_POST) . '</pre>';

                    $sql = "update posts set startDate = '$startDate', endDate = '$endDate', title = '$title', content = '$content' where id = $id;";
                    $result = $db->query($sql);
                    header('Location: index.php');
                }
                ?>
            </section>
        </div>

    </div>


<?php
// Generate the page footer
Layout::pageBottom();