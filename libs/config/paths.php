<?php
session_start();
define('URL', 'http://'.$_SERVER['HTTP_HOST'].'/elearning');
define('URL_E', 'http://'.$_SERVER['HTTP_HOST'].'/dichvu/public/elearning');
$dirtionary = realpath($_SERVER['DOCUMENT_ROOT']);
define('DIR_UPLOAD', $dirtionary.'/dichvu/public');;
?>
