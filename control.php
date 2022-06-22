 <?php

    function addSources() {
        $dir = __Dir__;
        $folders = scandir($dir);
        foreach ($folders as $folder) {
            if (is_dir($folder) && $folder != "." && $folder != ".."){
                $files = scandir($folder);
                foreach ($files as $file) {
                    $link = explode(".", $file);
                    if ($link[0] == "index" && $link[1] == "php" || $link[1] == "html") {
                        $json_file_path = './assests/JSON/links.json';
                        $control = file_get_contents($json_file_path);
                        $json_a = json_decode($control, true);
                        if($json_a[$folder] != $folder) {
                            $path = $folder;
                            $ofile = fopen($path . "/" . $file, "a") or die("Unable to open file!");
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


    // * ********************************** make the pages links ************************************

    $dir = __Dir__; // ! the root path
    $count = 0;

    // Sort in ascending order - this is default
    $folders = scandir($dir);
    $components_json = new stdClass(); //! define Object before declare values to it

    // ! loop over the (./)(root) folder
    foreach ($folders as $folder) {
        // ! just take the real folders (projects folders only)
        if (is_dir($folder) && $folder != "." && $folder != ".." && $folder != "assests"){
            // ! scan every folder to extract files in it.
            $files = scandir($folder);
            foreach ($files as $file) {
                $link = explode(".", $file);
                // ! take the index file rather than others (to link to it forward)
                if ($link[0] == "index" && $link[1] == "php" || $link[1] == "html") {
                    // ! increase count (count of pages)
                    $count++;

                    $path = $folder . "/". $file;

                    //! we need to declare ($folder) as object
                    $components_json->$folder = new stdClass(); 

                    // ? make the Json object and incject it with data
                    $components_json->$folder->path = $path;
                    $components_json->$folder->img_path = $folder . ".jpeg";
                }
            }
        }
    }

    // ? encode the JSON object in order to send it
    $encoded_components = json_encode($components_json);

    echo $encoded_components;

    // * ****************** handle if the envirnoment skeleton has any changes ***********************
    
    $filename = './assests/JSON/count.json'; // ! JSON file path
    
    $control = file_get_contents($filename); // ! Get Json file data
    $json_a = json_decode($control, true);

        if ($json_a["count"] != $count) { // ! check if the page has any changes
            // ? Delete deleted project's screenshot from assest
            if ($json_a["count"] > $count) {
                $json_file ="links.json";  // ! JSON files List
                $json_path = "./assests/JSON/";  // ! JSON files Path
                $dir = __Dir__;
                $folders = scandir($dir);
                $screenShots_path = "./assests/screenshot/";
                $screenShots= scandir($screenShots_path);
                $data = file_get_contents($json_path . "links.json");
                $json_arr = json_decode($data, true);
                foreach ($screenShots as $screenShot) {
                    if ($screenShot != "." && $screenShot != "..") {
                        $screenShot_name = explode(".", $screenShot);
                                foreach ($folders as $folder) {
                                if (is_dir($folder) && $folder != "." && $folder != ".." &&$folder!="assests"){
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
                        $data = file_get_contents($json_path . $json_file);
                        $json_arr = json_decode($data, true);
                        foreach ($folders as $folder) {
                            if (is_dir($folder) && $folder != "." && $folder != ".." &&$folder!="assests"){
                                foreach ($json_arr as $key => $value) {
                                    if ($key == $folder) {
                                        // ! make a new array has only the projects that exists
                                        $new_json_arr[$key] = $value;
                                    }
                                }
                            }
                        }
                        file_put_contents($json_path . $json_file, json_encode($new_json_arr));
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

?>