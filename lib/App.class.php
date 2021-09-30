<?php
class App
{
	private function __construct()
	{
	}

	/**
	 * Launch view app
	 *
	 * @return void
	 */
	static function launchApp(): void
	{
		$path = __DIR__ . '/../views/'  . 'App.php';
		require $path;
	}
}
