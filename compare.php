<?php
/**
 * Created by PhpStorm.
 * User: vilina.osilova
 * Date: 28/12/2016
 * Time: 15:48
 */


$handle = fopen($_FILES["original_file"]["tmp_name"], 'r');
$original_file_tmp_name = $_FILES["original_file"]["tmp_name"];
$comparable_file_tmp_name = $_FILES["comparable_file"]["tmp_name"];

$original_file_name = $_FILES["original_file"]["name"];
$comparable_file_name = $_FILES["comparable_file"]["name"];

move_uploaded_file($original_file_tmp_name, "uploads/".$original_file_name);
move_uploaded_file($comparable_file_tmp_name, "uploads/".$comparable_file_name);


$original_file_path = 'uploads/'.$original_file_name;
$original_file_json = file_get_contents($original_file_path);
$original_file_array_full = json_decode($original_file_json, true);
$original_file_array = $original_file_array_full;
$comparable_file_path = 'uploads/'.$comparable_file_name;
$comparable_file_json = file_get_contents($comparable_file_path);
$comparable_file_array_full = json_decode($comparable_file_json, true);
$comparable_file_array = $comparable_file_array_full;


foreach ($original_file_array as $key => &$value) {
    if (isset($comparable_file_array[$key])) {
        unset($original_file_array[$key]);
        unset($comparable_file_array[$key]);
    } else {
//                    echo 'ffff ';
//                    echo $key1;
    }
}

$result = array();
$result['original_file_array_full'] = $original_file_array_full;
$result['comparable_file_array_full'] = $comparable_file_array_full;
$result['original_file_array'] = $original_file_array;
$result['comparable_file_array'] = $comparable_file_array;
echo json_encode($result);

//            var_dump($array1);
//            echo "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA";
//            var_dump($array2);
    //    var_dump($array1);
    //    var_dump($array2);