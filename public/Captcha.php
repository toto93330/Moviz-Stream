<?php

/**
 * This file it's for Captcha system.
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package App\Functions
 */

session_start();

$captcha = rand(111111, 999999);

$_SESSION['captcha'] = $captcha;

$img = \imagecreate(93, 40);
$font = __DIR__ . '\fonts\28DaysLater.ttf';
$bg = \imagecolorallocate($img, 255, 255, 255);
$textcolor = \imagecolorallocate($img, 213, 7, 7);
\imagettftext($img, 23, 0, 3, 35, $textcolor, $font, $_SESSION['captcha']);
header('content-type:image/jpeg');
\imagejpeg($img);
