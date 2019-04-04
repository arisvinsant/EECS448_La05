<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "a941v383", "ash7eetu", "a941v383");
if ($mysqli->connect_errno) {
     printf("Connect failed: %s\n" , $mysqli->connect_error);
     exit();
}
$result = $mysqli->query('SELECT * FROM Posts');
if ($result->num_rows > 0) {
     echo "<form action='confirmDelete.php' method='post'>",
     "<table border='1'><tr><th>Post</th><th>Author</th><th>Delete?</th></tr>";
     $i = 0;
     while ($row = $result->fetch_assoc()) {
          echo "<tr><td>{$row['content']}</td><td>{$row['author_id']}</td>",
          "<td><input type='checkbox' name='delete[$i]' value='{$row['post_id']}'></td></tr>";
          $i = $i + 1;
     }
     echo "</table><br><input type='submit' value='Submit'></form>";
} else {
     echo 'There are no Posts within the database.';
}
$result->free();
$mysqli->close();
echo "<br><button onclick=\"location.href = 'https://people.eecs.ku.edu/~a941v383/EECS448_Lab05/AdminHome.html';\"'>Back</button>";
?>
