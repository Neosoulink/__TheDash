<?php

/**
 * App autoloader.
 *
 */
class Autoloader
{
	static function register()
	{
		spl_autoload_register(array(__CLASS__, 'autoload'));
	}

	static function autoload($class_name)
	{
		$path = __DIR__ . '/' . $class_name . '.class.php';
		if (preg_match('/models\/(.)+\.php/', $path) && file_exists($path)) {
			//$path = () ? $path : str_replace('.class', '', $path);
			require $path;
		} else {
			header('HTTP/1.1 400 Not Found Class');
			exit();
		}
	}
}
