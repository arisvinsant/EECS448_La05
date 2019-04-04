<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "a941v383", "ash7eetu", "a941v383");
if ($mysqli->connect_errno) {
     printf("Connect failed: %s\n" , $mysqli->connect_error);
     exit();
} else {
     if(empty($mysqli->query('SELECT * FROM Posts')->num_rows)) {
          echo 'The database does not contain any posts';
     } else {
          $tableOfUsers = $mysqli->query('SELECT user_id FROM Users');
          if($tableOfUsers-> num_rows > 0) {
               echo "<form action='printPosts.php' method='post'><select name='user'>";
               while ($row = $tableOfUsers->fetch_assoc()) {
                    echo "<option value='{$row['user_id']}'>{$row['user_id']}</option>";
               }
               echo "</select><br><br><input type='submit' value='Submit'></form>";
          } else {
               echo 'There are no users in the database';
          }
          $tableOfUsers->free();
     }
}
$mysqli->close();
echo "<br><button onclick='window.history.back();'>Back</button>";
?>
