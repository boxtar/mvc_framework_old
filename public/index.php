<?php
/**
 * Entry point for MVC app
 */

error_reporting(E_ALL);

define ('ROOT_PATH', realpath(dirname(__DIR__)));

require_once ROOT_PATH.'/app/init.php';

$app = new App;

