<?php
  // ! import addsources function
  require "./controlUnits/addSources.php";
  // * ****************** handle if the envirnoment dir has any changes ***********************

  $filename = './assests/JSON/count.json'; // ! JSON file path
    
  $control = file_get_contents($filename); // ! Get Json file data
  $json_a = json_decode($control, true);

      if ($json_a["count"] != $count) { // ! check if the page has any changes
          // ? Delete deleted project's screenshot from assest
          if ($json_a["count"] > $count) {
              $new_json_arr = new stdClass(); //! define Object before declare values to it
              $json_file ="links.json";  // ! JSON files List
              $json_path = "/assests/JSON/";  // ! JSON files Path
              $dir = "/opt/lampp/htdocs/envpage/";
              $folders = scandir($dir);
              $screenShots_path = "./assests/screenshot/";
              $screenShots= scandir($screenShots_path);
              foreach ($screenShots as $screenShot) {
                  if ($screenShot != "." && $screenShot != "..") {
                      $screenShot_name = explode(".", $screenShot);
                              foreach ($folders as $folder) {
                              if (is_dir($dir . $folder) && $folder != "." && $folder != ".." && $folder != "assests" && $folder != "frontend"){
                                      if ($screenShot_name[0] == $folder) {
                                          break;
                                      }
                                      else {
                                          unlink($screenShots_path . $screenShot);
                                      }
                              }
                          }
                      }
                  }
                  // ? Delete the deleted projects from the json
                      $main_path = "/opt/lampp/htdocs/envpage/frontend/php";
                      $data = file_get_contents($main_path . $json_path . $json_file);
                      $json_arr = json_decode($data, true);
                      foreach ($folders as $folder) {
                          if (is_dir($dir . $folder) && $folder != "." && $folder != ".." && $folder != "assests" && $folder != "frontend"){
                              foreach ($json_arr as $key => $value) {
                                  if ($key == $folder) {
                                      // ! make a new array has only the projects that exists
                                      $new_json_arr->$key = $value;
                                  }
                              }
                          }
                      }
                      file_put_contents("." . $json_path . $json_file, json_encode($new_json_arr));
                  }
              // ? Add the scripts needed to the files
              addSources();
          }

          $filename = './assests/JSON/count.json'; // ! JSON file path
  
          $control = file_get_contents($filename); // ! Get Json file data
          $json_a = json_decode($control, true);

          // ? update Json file (count) data
          $data = file_get_contents($filename);

          $json_arr = json_decode($data, true);

          $json_arr['count'] = $count;
          file_put_contents($filename, json_encode($json_arr));