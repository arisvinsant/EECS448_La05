<?php
//error reporting
error_reporting(E_ALL);
ini_set("display_errors", 1);
//variable placement
$new_post = $_POST['post'];
$user = $_POST['username'];
//open database and check for connection error
$mysqli = new mysqli("mysql.eecs.ku.edu", "a941v383", "ash7eetu", "a941v383");
if ($mysqli->connect_errno) {
     printf("Connect failed: %s\n" , $mysqli->connect_error);
     exit();
}
//make sure user exists in database
$query = "SELECT user_id FROM Users WHERE user_id='$user'";
if($result = $mysqli->query($query)->num_rows > 0) {
     $mysqli->query("INSERT INTO Posts (content, author_id) VALUES ('$new_post', '$user')");
     echo 'The post was saved to the database';
}
else {
     echo "{$_POST['username']} was not found in the database";
}
$mysqli->close();
echo "<br><button onclick='window.history.back();'>Back</button>";
?>
