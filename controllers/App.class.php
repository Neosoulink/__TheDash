<?php
class App
{
	private function __construct()
	{
	}

	/**
	 * Launch app
	 */
	static function launchApp()
	{
		$path = __DIR__ . '/../views/'  . 'App.php';
		require $path;
	}
}
