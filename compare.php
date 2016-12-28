<?php
/**
 * Created by PhpStorm.
 * User: vilina.osilova
 * Date: 28/12/2016
 * Time: 15:48
 */

echo $_POST["original_file"];
echo $_POST["comparable_file"];
var_dump($_FILES);
$handle = fopen($_FILES["original_file"]["tmp_name"], 'r');
var_dump($handle);