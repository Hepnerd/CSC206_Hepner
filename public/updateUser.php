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
                    $sql = "select * from users where email = '" . $input['email'] . "'";
                    $result = $db->query($sql);
                    $row = $result->fetch();
                    //News::story($row);
                    //showUpdateForm($row);
                    $email = $row['email'];
                    $password = $row['password'];

                    echo <<<postform
                <form id="createPostForm" action='updateUser.php' method="POST" class="form-horizontal">
        <fieldset>


            <!-- Form Name -->
            <legend>Update Post</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="email">Email</label>
                <div class="col-md-8">
                    <input id="title" name="email" type="text" placeholder="post title" value="$email" class="form-control input-md" required="">
                </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-3 control-label" for="password">Password</label>
                <div class="col-md-8">
                    <textarea class="form-control" id="content" name="password">$password</textarea>
                </div>
            </div>
            
                        <div class="form-group">
                <label class="col-md-3 control-label" for="submit"></label>
                <div class="col-md-8">
                    <button id="submit" name="submit" value="Submit" class="btn btn-success">Submit</button>
                    <button id="cancel" name="cancel" value="Cancel" class="btn btn-info">Cancel</button>
                </div>
            </div>
        </fieldset>
    </form>
postform;


                } elseif ($requestType == 'POST') {
                    //Validate data
                    // Save data
                    $id = $_POST['id'];
                    $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
                    $password = htmlspecialchars($_POST['password'], ENT_QUOTES);
                    //add in startdate and enddate

                    //echo '<pre>' . print_r($_POST) . '</pre>';

                    $sql = "update users set email = '$email', password = '$password' where username = $username;";
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