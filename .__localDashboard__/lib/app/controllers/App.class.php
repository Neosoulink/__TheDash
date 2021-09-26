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
		// IMPORTANT: Add a path resolver
		require ".__localDashboard__/lib/app/views/components/Layout.php";
	}
}
