<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "a941v383", "ash7eetu", "a941v383");
if ($mysqli->connect_errno) {
     printf("Connect failed: %s\n" , $mysqli->connect_error);
     exit();
}
$result = $mysqli->query('SELECT * FROM Users');
if($result->num_rows>0){
     echo "<table border='1'><tbody><tr><th>Usernames in Database</th></tr>";
     while ($row = $result->fetch_assoc()) {
          echo '<tr><td>', $row['user_id'], '</td></tr>';
     }
     echo '</tbody></table>';
} else {
     echo 'There are no users in the database';
}
$result->free();
$mysqli->close();
?>
