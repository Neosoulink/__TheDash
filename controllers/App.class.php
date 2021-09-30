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
		$path = __DIR__ . '/../'  . 'App.php';
		require $path;
	}
}
