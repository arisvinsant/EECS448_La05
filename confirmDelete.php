<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "a941v383", "ash7eetu", "a941v383");
if ($mysqli->connect_errno) {
     printf("Connect failed: %s\n" , $mysqli->connect_error);
     exit();
}

$deletedStuff = $_POST['delete'];
echo "<form action='deletePosts.php' method='post'>";
if (empty($_POST)) {
     echo 'You didn\'t select any posts to delete.';
} else {
     echo "Post Deleted";
     echo "$deletedStuff";
     foreach ($_POST['delete'] as $ID) {
          echo "<p>{$ID}</p>";
          echo "Deletion of: ", $mysqli->query("SELECT content FROM Posts WHERE post_id = \"{$ID}\"")->fetch_assoc()['content'], "... ";
          $mysqli->query("DELETE FROM Posts WHERE post_id = \"{$ID}\"");
     }
}

$mysqli->close();
echo "<br><input type='submit' value='back'></form>";
?>
