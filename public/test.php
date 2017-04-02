<?php

Session_start();
$username = 'Nathanael';
echo 'Hello ' . $username . "<br>";
//echo 'Hello ' . $_SESSION['username'] . "<br>";

$_SESSION['day'] = 'Thursday';
echo $_SESSION['day'];
"<br>";


If (array_key_exists('course', $_SESSION)) {
    echo 'Class day' . $_SESSION('course') . "<br>";

} else {
    echo "course not defined";
}



Session_end():
Session_destroy();




?>