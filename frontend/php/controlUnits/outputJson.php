<?php
// * ********************************** output the pages info as json ************************************

    $dir = "/opt/lampp/htdocs/envpage/"; // ! the root path
    $count = 0;

    // Sort in ascending order - this is default
    $folders = scandir($dir);
    $components_json = new stdClass(); //! define Object before declare values to it

    // ! loop over the (./)(root) folder
    foreach ($folders as $folder) {

        // ! just take the real folders (projects folders only)
        if (is_dir($dir . $folder) && $folder != "." && $folder != ".." && $folder != "assests"){
            // ! scan every folder to extract files in it.
            $files = scandir($dir . $folder);
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
                    $components_json->$folder->name = $folder;
                    $components_json->$folder->path = $path;
                    $components_json->$folder->img_path = $folder . ".jpeg";

                    // ? we make it in an a form of array to have abillity of (map) on it in JS
                    $JsonArray[] = $components_json->$folder;
                }
            }
        }
    }

    // ? encode the JSON object in order to send it
    $encoded_components = json_encode($JsonArray);

    echo $encoded_components;