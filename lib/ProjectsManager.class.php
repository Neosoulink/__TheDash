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
				$project_data["builded_lang"] = self::get_project_builded_lang($dir . $directory);

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
