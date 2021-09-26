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
		require("../views/components/Layout.php");
	}
}
