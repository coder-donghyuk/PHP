<?php

function print_title(){
  if(isset($_GET['data'])){
    echo $_GET['data'];
  } else {
    echo "Welcome";
  }
}

function print_list(){
  $data_count = 0;
  $data_list = scandir("./data");
  while($data_count < count($data_list)){
    if($data_list[$data_count]!='.'){
      if($data_list[$data_count]!='..'){
        echo "<li><a href=\"index.php?data=$data_list[$data_count]\" >$data_list[$data_count]</a></li>\n";
      }
    }
    $data_count++;
  }
}

function print_contents(){
  if(isset($_GET['data'])){
    echo "<h2>".$_GET['data']."</h2>";
    //echo "<br>";
    echo file_get_contents("./data/".$_GET['data']);
  }else{
    echo "<h2>Welcome</h2>";
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
    <?php
    print_title();
    ?>
  </title>
  </head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
    <hr>
    <ol>
      <?php
      print_list();
      ?>
    </ol>
    <strong><br><a href="create.php">create</a></strong>
    <?php  if(isset($_GET['data'])){?>
      <strong><br><a href="update.php?data=<?php echo $_GET['data']?>">update</a></strong><br>
      <form action="delete_process.php" method="post">
        <input type="hidden" name="data" value="<?=$_GET['data']?>">
        <input type="submit" value="delete">
      </form>
    <?php }  ?>
    <?php
    print_contents();
    ?>
  </body>
</html>
