<?php
unlink("data/".$_POST['data']);
header('Location: /index.php');
?>
