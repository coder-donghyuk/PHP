<?php
file_put_contents("data/".$_POST["title"], $_POST["description"]);
header('Location: /index.php?data='.$_POST["title"]);
?>
