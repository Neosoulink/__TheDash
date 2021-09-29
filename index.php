<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET,POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require('./controllers/Autoloader.class.php');

Autoloader::register();
SessionManager::ss();

// IMPORTANT: DEFINE A ROOTER !!!
App::launchApp();
//
