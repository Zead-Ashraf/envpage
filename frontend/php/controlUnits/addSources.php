<?php

    function addSources() {
    $dir = "/opt/lampp/htdocs/envpage/";
    $folders = scandir($dir);
    foreach ($folders as $folder) {
        if (is_dir($dir . $folder) && $folder != "." && $folder != ".." && $folder != "assests" && $folder != "frontend"){
            $files = scandir($dir . $folder);
            foreach ($files as $file) {
                $link = explode(".", $file);
                if ($link[0] == "index" && $link[1] == "php" || $link[1] == "html") {
                    $json_file_path = './assests/JSON/links.json';
                    $control = file_get_contents($json_file_path);
                    $json_a = json_decode($control, true);
                    if($json_a[$folder] != $folder) {
                        $path = $folder;
                        $ofile = fopen($dir . $path . "/" . $file, "a") or die("Unable to open file!");
                        $addedData = '<script src="../assests/JS/html2canvas.js"></script>' . 
                        '<script src="../assests/JS/capture.js"></script>';
                        fwrite($ofile, $addedData);
                        fclose($ofile);
                        $json_a[$folder] = $folder;
                        file_put_contents($json_file_path, json_encode($json_a));
                    }
                    
                }
            }
        }

    }
    }