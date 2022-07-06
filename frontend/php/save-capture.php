<?php
  $dir = "/opt/lampp/htdocs/envpage/";
  $folders = scandir($dir);
  $count = 0;

  foreach ($folders as $folder) {
      if (is_dir($dir . $folder) && $folder != "." && $folder != ".." && $folder != "assests"){
        $files = scandir($dir . $folder);
        $count++;
        if ($_POST["project"] == $folder) {
          $image = $_POST["image"];
          $image = explode(";", $image)[1];
          $image = explode(",", $image)[1];
          $image = str_replace(" ", "+", $image);
          $image = base64_decode($image);
          file_put_contents("../src/screenshot/" . $_POST["project"] . ".jpeg", $image);
      }
    }
  }
  

	
?>