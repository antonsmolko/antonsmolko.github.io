<?php

use Illuminate\Support\Facades\File;

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
    $string = substr($string, 0, 1000);
    $string = rtrim($string, "!,.-");
    $string = substr($string, 0, strrpos($string, ' '));
    return $string."… ";
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
        return imagejpeg($img_o,$file_output . "." . $ext,90);
    } else {
        $func = 'image'.$ext;
        return $func($img_o,$file_output . "." . $ext);
    }
}

function uploadImage($file)
{
        $mime = $file->getMimeType();
        $parts = explode("/", $mime);
        $ext = $parts[1];

        $file_name = sha1(microtime(true));
        resizeImage($file, UPLOAD_DIR . FULL_DIR . $file_name, 1500, 0);
        resizeImage($file, UPLOAD_DIR . THUMB_DIR . $file_name, 600, 0);

        return $file_name . "." . $ext;
}



