<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "fareselattar", "ohNgah3U", "fareselattar");
/* check connection */
if ($mysqli->connect_errno)
{
  printf("Connect failed:%s\n", $mysqli->connect_error);
  exit();
}
$name = $_POST["username"];
$content = $_POST["post"];
if($content !="")
{
  $flag =True;
  $query = "SELECT * FROM Users WHERE user_Id = '$name'";
  $result = $mysqli->query($query);
  while($row = $result->fetch_assoc()) {
    $flag =False;
  }
  if($flag == False )
  {
    $insert = "INSERT INTO Posts(content, author_Id) VALUES ('$content','$name')";


    if ($mysqli->query($insert) === TRUE) {
      echo "New post created successfully";
    } else {
      echo "Error: " . $mysqli . "<br>" . $mysqli->error;
    }
  }
  else {
    echo "Username does not exist.";
  }
}
else {
  echo "Post cannot be empty";
}
/* close connection */
$mysqli->close();
?>
