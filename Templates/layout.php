<?php

class layout
{
    public static function pageTop($title)
    {
        echo <<<pageTop
        <!doctype html>
    <html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>$title</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
        <link rel="stylesheet" href="Assets/css/styles.css">
</head>
<body>
<header>
    <div class="blog-masthead">
        <div class="container">
            <nav class="blog-nav">
                <img src="Assets/images/Logo.png" style="height: 42px">
                <a class="blog-nav-item active" href="index.php">Home</a>
                <a class="blog-nav-item" href="createpost.php">Create Post</a>
            </nav>
        </div>
    </div>

    <div class="container">

        <div class="blog-header">
            <img class="headerImage" src="Assets/images/sundown.jpg" />
            <h1 class="blog-title">World Travels</h1>
            <p class="lead blog-description">Follow Nathanael as he posts his Facebook Pictures.</p>
        </div>
    </div>
</header>
pageTop;
    }


    public static function pageBottom()
    {
        echo <<<pageBottom
<footer class="blog-footer">
            <p>Nathanael built this.</p>
            <p>Hepnerd Inc.</p>
            <p>412-973-5495</p>
            <p>Registered to Nathanael (c)</p>
            <p>
                <a href="#">Back to top</a>
            </p>
        </footer>
        </body>
        </html>
pageBottom;
    }

    public static function PageSide()
    {
        echo <<<PageSide
            
<div class="sideBar">

<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>About</h4>
                <p>Nathanael is a one of a kind dude. He dabbles in the #000 arts.</p>
            </div>
            <div class="sidebar-module">
                <h4>Archives</h4>
                <ol class="list-unstyled">
                    <li><a href="#">March 2014</a></li>
                    <li><a href="#">February 2014</a></li>
                    <li><a href="#">January 2014</a></li>
                    <li><a href="#">December 2013</a></li>
                    <li><a href="#">November 2013</a></li>
                    <li><a href="#">October 2013</a></li>
                    <li><a href="#">September 2013</a></li>
                    <li><a href="#">August 2013</a></li>
                    <li><a href="#">July 2013</a></li>
                    <li><a href="#">June 2013</a></li>
                    <li><a href="#">May 2013</a></li>
                    <li><a href="#">April 2013</a></li>
                </ol>
            </div>
            <div class="sidebar-module">
                <h4>Elsewhere</h4>
                <ol class="list-unstyled">
                    <li><a href="#">GitHub</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Facebook</a></li>
                </ol>
            </div>
        </div>
</div>
                
PageSide;
    }


}