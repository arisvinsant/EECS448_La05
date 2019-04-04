<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$mysqli = new mysqli("mysql.eecs.ku.edu", "a941v383", "ash7eetu", "a941v383")
$username = $_POST["username"];
if($username == "")
{
    echo "<p>You must enter a username!</p>";
    exit();
}
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    echo "<p>No Connection to Database</p>"
    exit();
}
if($mysqli->query("SELECT user_id FROM Users WHERE user_id = '$username'")->num_rows!=0)
{
    echo "<p>This username already exists!</p>";
    exit();
}

$query = "INSERT INTO Users (user_id) VALUES ('$username')";
$mysqli->query($query);
echo "<p>You have successfully registered!</p>";
/* close connection */
$mysqli->close();
?>
