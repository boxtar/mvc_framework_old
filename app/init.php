<?php

define ('APP_DIR', realpath(__DIR__));
define ('CORE_DIR', APP_DIR.'/core');
define ('CONTROLLERS_DIR', APP_DIR . '/controllers');
define ('MODELS_DIR', APP_DIR . '/models');
define ('VIEWS_DIR', APP_DIR . '/views');

// Composer autoloader:
require_once '../vendor/autoload.php';

require_once 'database.php';

require_once CORE_DIR . '/App.php';

require_once CORE_DIR . '/Controller.php';

