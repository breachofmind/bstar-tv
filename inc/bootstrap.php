<?php
use App\Request;

require(BASE_PATH.'inc'.DS.'functions.php');
require(BASE_PATH.'vendor'.DS.'autoload.php');

$request = Request::capture();
