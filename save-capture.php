<?php
  $dir = __Dir__;
  $folders = scandir($dir);
  $count = 0;
  foreach ($folders as $folder) {
      if (is_dir($folder) && $folder != "." && $folder != ".." && $folder != "assests"){
        $files = scandir($folder);
        $count++;
        if ($_POST["project"] == $folder) {
          $image = $_POST["image"];
          $image = explode(";", $image)[1];
          $image = explode(",", $image)[1];
          $image = str_replace(" ", "+", $image);
          $image = base64_decode($image);
          file_put_contents("./assests/screenshot/" . $folder . ".jpeg", $image);
      }
    }
  }

  
  

	
?>