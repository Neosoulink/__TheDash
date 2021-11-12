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
			$appName,
		];

		$projectsList = [];

		foreach ($directories as $directory) {
			if (
				!in_array($directory, $doNotShow) &&
				!preg_match('/^[\.]{1,2}/', $directory) &&
				is_dir($dir . $directory)
			) {
				$project_data = Helpers::get_dir_info($dir . $directory);
				$project_data["name"] = $directory;
				$project_data["framework"] = self::get_project_builded_framework($dir . $directory);
				$project_data["project_url"] = ProjectsManager::generate_project_url($directory);

				array_push($projectsList, $project_data);
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
	public static function get_project_builded_framework(string $rootDirectory)
	{
		$dir = './' . $rootDirectory;
		$directories = scandir($dir);

		$file_list = [];

		$project_builded_name = null;

		$projects_builded_names = (object) [
			"LARAVEL" =>  "Laravel",
			"UNKNOWN" => "Unknown"
		];

		$projects_builded = (object) [
			"LARAVEL" =>  [
				".env",
				"routes",
				"storage",
				"resources",
				"database",
			]
		];

		foreach ($directories as $directory) {
			array_push($file_list, $directory);
		}

		if (
			(in_array($projects_builded->LARAVEL[0], $file_list, true) ||
				in_array($projects_builded->LARAVEL[0], $file_list, true))
		) {
			$project_builded_name = $projects_builded_names->LARAVEL;
		}

		return $project_builded_name
			? $project_builded_name
			: $projects_builded_names->UNKNOWN;
	}

	/**
	 * @return string
	 */
	public static function get_project_builded_langs(string $path)
	{
		$total_size = 0;
		$files = scandir($path);

		foreach ($files as $t) {
			// TODO: add recursive logic
		}
		return $total_size;
	}

}
