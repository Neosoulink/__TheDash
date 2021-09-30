<?php

/**
 * Class that provide some useful method to manage projects
 */
class ProjectManager
{

	/**
	 * @return array
	 */
	public static function get_project_list() : array
	{
		$dir = './';
		$directories = scandir($dir);
		$doNotShow = [
			'index.php',
		];

		$projectsList = [];

		foreach ($directories as $directory) {
			if (!in_array($directory, $doNotShow) && !preg_match('/^[\.].*$/', $directory)) {
				array_push($projectsList, $directory);
			}
		}

		return $projectsList;
	}

	/**
	 * @return array
	 */
	public static function generate_project_url(string $projectName): string
	{
		$protocole = 'http://';
		$hostname = $_SERVER["HTTP_HOST"] . '/';

		return $protocole . $hostname . $projectName;
	}
}
