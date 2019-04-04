<?php
echo "<title>Posts made by {$_POST['user']}</title>";
$mysqli = new mysqli("mysql.eecs.ku.edu", "a941v383", "ash7eetu", "a941v383");
if ($mysqli->connect_errno) {
     printf("Connect failed: %s\n" , $mysqli->connect_error);
     exit();
}
$user = $_POST['user'];
$result = $mysqli->query("SELECT * FROM Posts WHERE author_id = \"$user\"");
if($result->num_rows > 0) {
     echo "<table border='1'><tbody><tr><th>Posts made by ", $_POST['user'], "</th></tr>";
     while ($row = $result->fetch_assoc()) {
          echo '<tr><td>', $row['content'], '</td></tr>';
     }
     echo '</tbody></table>';
  } else {
     echo "No posts found for {$_POST['user']}.";
  }
$result->free();
$mysqli->close();
echo "<br><button onclick='window.history.back();'>Back</button>";
?>
