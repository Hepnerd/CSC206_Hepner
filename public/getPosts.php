<?php
// Load all application files and configurations
require($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');
// Include the HTML layout class
include('../Templates/layout.php');
include('../Templates/getPosts.php');
// Connect to the database
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Initialize variables
$requestType = $_SERVER['REQUEST_METHOD'];
$sql = 'select * from posts order by startDate DESC';
$posts = $db->query($sql);
// Run a simple query that will be rendered in column 2 below
$sql = 'select id, name, description from pages';
$res = $db->query($sql);
// Generate the HTML for the top of the page
Layout::pageTop('CSC206 Project');
// Page content goes here
// Create the table Header
// echo News::buildTableHeader($posts);
// Fill data table
//  foreach ($posts as $post) {
//    $post['content'] = substr($post['content'], 0, 35) . '...';
//   echo News::buildTableRow($post);
//}
?>
<div class="top10">
    <table align="center" class="table">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Start Date</th>
            <th>End Date</th>
        </tr>

        <?php
        // Loop through the posts and display them
        while ($post = $posts->fetch()) {
            // Call the method to create the layout for a post
            getPosts::story($post);
        }
        ?>
    </table>
</div>
<?php
// Generate the page footer

Layout::pageBottom();