<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET,POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require(__DIR__ . '/lib/Autoloader.class.php');

use Controllers\Autoloader;

Autoloader::register();
SessionManager::ss();

(new DotEnv(__DIR__ . '/.env'))->load();

// IMPORTANT: DEFINE A ROOTER !!!
App::launchApp();
//

require_once _DIR__ . '/lib/php-hot-reloader/src/HotReloader.php';
new HotReloader\HotReloader('//localhost/helpers/phrwatcher.php');
