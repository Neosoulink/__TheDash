<?php

/**
 * Helper Class. That class provide many utils methods.
 */
class Helpers
{
	/**
	 * @return array
	 */
	public static function getProjectList()
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
	public static function getShellPhpInfo()
	{
		$phpInfoShell = shell_exec('php -i');
		$arrayLinePhpInfo = array_filter(preg_split("/\n/", $phpInfoShell));
		$formattedArrayLines = array();

		foreach ($arrayLinePhpInfo as $lineValue) {
			$splittedLineValue = preg_split("/=>/", $lineValue);
			if (count($splittedLineValue) === 2)
				$formattedArrayLines[str_replace(" ", "", $splittedLineValue[0])] = $splittedLineValue[1];
		}

		return $formattedArrayLines;
	}

	/**
	 *
	 */
	public static function generateUniqId($length = 13)
	{
		// uniqid gives 13 chars, but you could adjust it to your needs.
		if (function_exists("random_bytes")) {
			$bytes = random_bytes(ceil($length / 2));
		} elseif (function_exists("openssl_random_pseudo_bytes")) {
			$bytes = openssl_random_pseudo_bytes(ceil($length / 2));
		} else {
			throw new Exception("no cryptographically secure random function available");
		}
		return substr(bin2hex($bytes), 0, $length);
	}

	/**
	 * Get user ip
	 *
	 * @return string
	 */
	public static function getUserIpAddr()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			//ip from share internet
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			//ip pass from proxy
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}

	/**
	 *
	 */
	public static function getHttpUserAgent()
	{
		return (!empty($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
	}

	/**
	 *
	 */
	public static function detectBrowser(String $data)
	{
		$user_agent = (!empty($data)) ? $data : App::getHttpUserAgent();
		$browser  = "Inconnu";
		$browser_array = array(
			'/mobile/i' => 'Handheld Browser',
			'/msie/i' => 'Internet Explorer',
			'/trident/i' => 'Internet Explorer',
			'/firefox/i' => 'Firefox',
			'/safari/i' => 'Safari',
			'/chrome/i' => 'Chrome',
			'/edge/i' => 'Edge',
			'/opera/i' => 'Opera',
			'/netscape/i' => 'Netscape',
			'/maxthon/i' => 'Maxthon',
			'/konqueror/i' => 'Konqueror'
		);
		foreach ($browser_array as $regex => $value)
			if (preg_match($regex, $user_agent))
				$browser = $value;
		return $browser;
	}

	/**
	 *
	 */
	public static function detectOS(String $data)
	{
		$user_agent = (!empty($data)) ? $data : App::getHttpUserAgent();
		$os_platform = "Inconnu";
		$os_array = array(
			'/windows nt 10/i' => 'Windows 10',
			'/windows nt 6.3/i' => 'Windows 8.1',
			'/windows nt 6.2/i' => 'Windows 8',
			'/windows nt 6.1/i' => 'Windows 7',
			'/windows nt 6.0/i' => 'Windows Vista',
			'/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
			'/windows nt 5.1/i' => 'Windows XP',
			'/windows xp/i' => 'Windows XP',
			'/windows nt 5.0/i' => 'Windows 2000',
			'/windows me/i' => 'Windows ME',
			'/win98/i' => 'Windows 98',
			'/win95/i' => 'Windows 95',
			'/win16/i' => 'Windows 3.11',
			'/macintosh|mac os x/i' => 'Mac OS X',
			'/mac_powerpc/i' => 'Mac OS 9',
			'/linux/i' => 'Linux',
			'/ubuntu/i' => 'Ubuntu',
			'/iphone/i' => 'iPhone',
			'/ipod/i' => 'iPod',
			'/ipad/i' => 'iPad',
			'/android/i' => 'Android',
			'/blackberry/i' => 'BlackBerry',
			'/webos/i' => 'Mobile'
		);
		foreach ($os_array as $regex => $value)
			if (preg_match($regex, $user_agent))
				$os_platform = $value;
		return $os_platform;
	}
}
