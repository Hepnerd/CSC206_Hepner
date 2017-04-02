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
                    // Display the form
                    showForm();
                } elseif ($requestType == 'POST') {
                    if (validateInput($_POST)) {
                        // Data is valid so save it to the database
                        // pull the fields from the POST array.
                        $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
                        $password = htmlspecialchars($_POST['password'], ENT_QUOTES);
                        // This SQL uses double quotes for the query string.  If a field is not a number (it's a string or a date) it needs
                        // to be enclosed in single quotes.  Note that right after values is a ( and a single quote.  Taht single quote comes right
                        // before the value of $title.  Note also that at the end of $title is a ', ' inside of double quotes.  What this will all render
                        // That will generate this piece of SQL:   values ('title text here', 'content text here', '2017-02-01 00:00:00'  and so
                        // on until the end of the sql command.
                        $sql = "insert into users (email, password) values ('" . $email . "', '" . $password . "');";
                        $db->query($sql);
                    } else {
                        // This is an error so show the form again
                        showForm($_POST);
                    }
                    header('Location: index.php');
                }
                ?>


            </section>
        </div>


    </div>

<?php
// Generate the page footer
Layout::pageBottom();
/**
 * Functions that support the createPost page
 */
$fields = [
    'email' => ['required', 'email'],
    'password' => ['required', 'password'],
];
function validateInput($formData)
{
    // use the global $fields list
    global $fields;
    $message = '';
    // Assume everything will be valid
    $validData = true;
    // Loop through the whitelist to ensure required data is provided and the data
    // is of the correct type
//    foreach ($fields as $name => $field){
//        $isRequired = ($field[0] == 'required') ? true : false;
//
//        $inArray = array_key_exists($name, $formData);
//
//
//
//        // Check for proper type of data
//        // if ()
//
//
//    }
    return true;
}

/**
 * Show the form
 */
function showForm($data = null)
{
    $email = $data['email'];
    $password = $data['password'];
    echo <<<postform
    <form id="createPostForm" action='createUser.php' method="POST" class="form-horizontal">
        <fieldset>
    
            <!-- Form Name -->
            <legend>Create User</legend>
    
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="email">Email</label>
                <div class="col-md-8">
                    <input id="title" name="email" type="text" placeholder="Email Address" value="$email" class="form-control input-md" required="">                    
                </div>
            </div>
    
            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-3 control-label" for="password">Password</label>
                <div class="col-md-8">
                    <textarea class="form-control" id="password" name="password">$password</textarea>
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
}