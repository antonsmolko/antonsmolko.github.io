<?php

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;

function getRusDate($dateTime, $format = '%DAYWEEK%, d %MONTH% Y H:i', $offset = 0)
{
    $monthArray = array('января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
    $daysArray = array('Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье');
    $timestamp = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $dateTime)->timestamp;
    $timestamp += 3600 * $offset;
    $findArray = array('/%MONTH%/i', '/%DAYWEEK%/i');
    $replaceArray = array($monthArray[date("m", $timestamp) - 1], $daysArray[date("N", $timestamp) - 1]);
    $format = preg_replace($findArray, $replaceArray, $format);
    return date($format, $timestamp);
}

function cutText($string)
{
    $string = strip_tags($string);
    $string = substr($string, 0, 250);
    $string = rtrim($string, "!,.-");
    $string = substr($string, 0, strrpos($string, ' '));
    return $string."… ";
}


function validateImage($file)
{
    if ($file['name'] == '')
    {
        return false;
    }

    $blacklist = array(".php", ".phtml", ".php3", ".php4");
    foreach ($blacklist as $item) {
        if(preg_match("/$item\$/i", $file['name'])) {
            return false;
        }
    }

    $imageinfo = getimagesize($file['tmp_name']);

    if($imageinfo['mime'] != 'image/png' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/gif') {
        return false;
    }

    if ($file['size'] > (10 * 1024 * 1024)) {
        return false;
    }

    return true;



//    $uploadfile = UPLOAD_DIR . FULL_DIR . basename($_FILES['userfile']['name']);

//    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
//        echo "File is valid, and was successfully uploaded.\n";
//    } else {
//        echo "File uploading failed.\n";
//    }

}

function resizeImage($file_input, $file_output, $w_o, $h_o) {
    list($w_i, $h_i, $type) = getimagesize($file_input);
    if (!$w_i || !$h_i) {
        echo 'Error. Width and height image not found!';
        return;
    }
    $types = array('','gif','jpeg','png');
    $ext = $types[$type];
    if ($ext) {
        $func = 'imagecreatefrom'.$ext;
        $img = $func($file_input);
    } else {
        echo 'Type of file is not correct!';
        return;
    }

    if (!$h_o) $h_o = $w_o/($w_i/$h_i);
    if (!$w_o) $w_o = $h_o/($h_i/$w_i);

    $img_o = imagecreatetruecolor($w_o, $h_o);
    imagecopyresampled($img_o, $img, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i);
    if ($type == 2) {
        return imagejpeg($img_o,$file_output . "." . $ext,100);
    } else {
        $func = 'image'.$ext;
        return $func($img_o,$file_output . "." . $ext);
    }
}

function uploadImage($file)
{
    if(!validateImage($file))
        return false;
    else
    {
        $mime = $file['type'];
        $parts = explode("/", $mime);
        $ext = $parts[1];


        $file_name = sha1(microtime(true));
//        copy($file['tmp_name'], UPLOAD_DIR . FULL_DIR . $file_name . $mime);
        resizeImage($file['tmp_name'], UPLOAD_DIR . FULL_DIR . $file_name, 2500, 0);
        resizeImage($file['tmp_name'], UPLOAD_DIR . THUMB_DIR . $file_name, 600, 0);

        return $file_name . "." . $ext;
    }
}



