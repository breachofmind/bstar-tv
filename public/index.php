<?php
use App\Controller;

define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', dirname(dirname(__FILE__)).DS);
require(BASE_PATH.'inc'.DS.'bootstrap.php');

new Controller($request);
