<?php

/**
 * Class that provide some useful method to manage projects
 */
class ProjectsManager
{

	/**
	 * @return array
	 */
	public static function get_project_list(): array
	{
		$appName = getenv('APP_NAME');
		$dir = './';
		$directories = scandir($dir);
		$doNotShow = [
			'index.php',
			$appName,
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
	 * @return string
	 */
	public static function generate_project_url(string $projectName): string
	{
		$protocole = 'http://';
		$hostname = $_SERVER["HTTP_HOST"] . '/';

		return $protocole . $hostname . $projectName;
	}

	/**
	 * @return string
	 */
	public static function get_project_builded_lang(string $rootDirectory)
	{
		$dir = './' . $rootDirectory;
		$directories = scandir($dir);

		$projects_list = [];

		$project_builded_name = null;

		$projects_builded_names = (object) [
			"LARAVEL" =>  "Laravel",
			"UNKNOWN" => "Unknown"
		];

		$projects_builded = (object) [
			"LARAVEL" =>  [
				".env",
				".env.example",
			]
		];

		foreach ($directories as $directory) {
			array_push($projects_list, $directory);
		}

		if (
			(in_array($projects_builded->LARAVEL[0], $projects_list, true) ||
				in_array($projects_builded->LARAVEL[0], $projects_list, true))
		) {
			$project_builded_name = $projects_builded_names->LARAVEL;
		}

		return $project_builded_name
			? $project_builded_name
			: $projects_builded_names->UNKNOWN;
	}
}
