<?php

class layout
{
    public static function LoggedIn()
    {
        $user = $_SESSION['user'];
        $x = '
        <div class="blog-masthead" >
        <div class="container" >
            <nav class="blog-nav" >
                <a href = "index.php" ><img src = "Assets/images/Logo.png" style = "height: 42px" ></a >
                <a class="blog-nav-item" href = "index.php" >Home</a >
                <a class="blog-nav-item" href = "createPost.php" >Create Post</a >
                <a class="blog-nav-item" href = "getPosts.php" >View Posts</a >
                <a class="blog-nav-item" href = "updateUser.php" >Edit User</a >
                <div class="blog-nav-item3">Hello, ' . $user['firstName'] . ' ' . $user['lastName'] .
                '</div><a class="blog-nav-item2" href="logoff.php">Logout</a>
            </nav >
        </div >
    </div >';
        return $x;
    }

    public static function LoggedOut()
    {
        $x = '
        <div class="blog-masthead" >
        <div class="container" >
            <nav class="blog-nav" >
                <a href = "index.php" ><img src = "Assets/images/Logo.png" style = "height: 42px" ></a >
                <a class="blog-nav-item" href = "index.php" > Home</a >
                <a class="blog-nav-item2" onclick = "document.getElementById(\'id01\').style.display=\'block\'" > Login</a >
                <a class="blog-nav-item2" href = "createUser.php" > Register</a >
            </nav >
        </div >
    </div >';
        return $x;
    }

    public static function pageTop($title)
    {
        if ( isset($_SESSION['user'])) {
            $menu = static::LoggedIn();
        } else {
            $menu = static::LoggedOut();
        }
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
$menu

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" 
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" method="post" action="login.php">

    <div class="logincontainer">
      <label><b>Username</b></label>
      <input class="logintextandpass" type="text" placeholder="Enter Username" name="email" required>

      <label><b>Password</b></label>
      <input class="logintextandpass" type="password" placeholder="Enter Password" name="password" required>

      <button class=submitbutton href="#" type="submit">Login</button>
      <input type="checkbox" checked="checked"> Remember me</input> <br>
      <span class="psw">Forgot <a href="#">password?</a></span>

    </div>

    <div class="logincontainer" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

    <div class="container">

        <div class="blog-header">
            <img class="headerImage" src="Assets/images/sundown.jpg" />
            <h1 class="blog-title">World Travels</h1>
            <p class="lead blog-description">Follow Nathanael as he posts his Facebook pictures.</p>
        </div>
    </div>
</header>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
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