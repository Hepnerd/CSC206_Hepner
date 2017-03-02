<?php
// Load all application files and configurations
require($_SERVER[ 'DOCUMENT_ROOT' ] . '/../includes/application_includes.php');
// Include the HTML layout class
include("../templates/layout.php");
include("../templates/News.php");
// Connect to the database
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Get the stories for column 1 from the database
$sql = 'select * from posts';
$posts = $db->query($sql);
// Run a simple query that will be rendered in column 2 below
$sql = 'select id, name, description from pages';
$res = $db->query($sql);

Layout::pageTop("layout.php");
//Layout::pageSide();
?>
<body>
<div class="container">
    <div class="row">

        <div class="col-sm-8 blog-main">

            <div class="blog-post">
                <div class="container top25">
                    <div class="col-md-6">
                        <section class="content">
                            <?php
                            // Loop through the posts and display them
                            while ($post = $posts->fetch()) {
                                // Call the method to create the layout for a post
                                News::story($post);
                            }
                            ?>
                        </section>
                    </div>
                </div>
            </div>
            <!-- /.blog-post -->
            <nav>
                <ul class="pager">
                    <li><a href="#">Previous</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </nav>
        </div>
        <div>
            <?php Layout::PageSide() ?>
        </div>
    </div>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


<?php

Layout::pageBottom();

?>

