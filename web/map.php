<?php
// php function to convert csv to json format
header('Content-Type: application/json');
function csvToJson($fname) {
    // open csv file
    if (!($fp = fopen($fname, 'r'))) {
        die("Can't open file...");
    }

    //read csv headers
    $key = fgetcsv($fp,"1024",",");

    // parse csv rows into array
    $json = array();
        while ($row = fgetcsv($fp,"1024",",")) {
        $json[] = array_combine($key, $row);
    }

    // release file handle
    fclose($fp);

    // encode array to json
    return json_encode($json);
}

$json_Stories = csvToJson("https://docs.google.com/spreadsheets/d/1rygeWPIeE8p5p4lUgwyNp3U1fnjJjpTIojdcDrDF4Jg/pub?gid=0&single=true&output=csv");
print_r($json_Stories);
?>
