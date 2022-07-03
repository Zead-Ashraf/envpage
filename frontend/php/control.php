<?php
    $AccessOrigin = 'Access-Control-Allow-Origin: http://localhost:3000';
    header($AccessOrigin);

    // * ********************************** output the pages info as json ************************************

    // ! import outputJson function
    require "./controlUnits/outputJson.php";

    // * ****************** handle if the envirnoment dir has any changes ***********************
    
    require "./controlUnits/handleMainDirChanged.php"

?>