<?php
// Load all application files and configurations
require($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');
// Include the HTML layout class
include('../Templates/layout.php');
include('../Templates/News.php');
// Connect to the database
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
                    $sql = "select * from users where id = '" . $_GET['id'] . "'";
                    $result = $db->query($sql);
                    $row = $result->fetch();
                    //News::story($row);
                    //showUpdateForm($row);
                    $email = $row['email'];
                    $password = $row['password'];
                    $firstName = $row['firstName'];
                    $lastName = $row['lastName'];

                    echo <<<postform
    <form id="createPostForm" action='updateUser.php' method="POST" class="form-horizontal">
        <fieldset>
    
            <!-- Form Name -->
            <legend>Create User</legend>
    
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="email">Email</label>
                <div class="col-md-8">
                <label class="col-md-3 control-label" for="email">$email</label>
                </div>
            </div>
               
                        <div class="form-group">
                <label class="col-md-3 control-label" for="firstName">First Name</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="First Name" id="firstName" name="firstName" value="$firstName">
                </div>
            </div>
            
                        <div class="form-group">
                <label class="col-md-3 control-label" for="lastName">Last Name</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Last Name" id="lastName" name="lastName" value="$lastName">
                </div>
            </div>
            
    
            <!-- Button (Double) -->
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
                    $firstName = htmlspecialchars($_POST['firstName'], ENT_QUOTES);
                    $lastName = htmlspecialchars($_POST['lastName'], ENT_QUOTES);
                    //add in startdate and enddate

                    //echo '<pre>' . print_r($_POST) . '</pre>';

                    $sql = "update users set firstName = '$firstName', lastName = '$lastName'";
                    $result = $db->query($sql);
                    header('Location: logoff.php');
                }
                ?>
            </section>
        </div>

    </div>


<?php
// Generate the page footer
Layout::pageBottom();