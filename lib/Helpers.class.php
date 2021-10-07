<?php

/**
 * Helper Class. That class provide many utils methods.
 */
class Helpers
{
	/**
	 * This function does a great job at converting phpinfo into an array.
	 *
	 * @return array
	 */
	public static function get_parsed_phpinfo(): array
	{
		ob_start();
		phpinfo(INFO_MODULES);
		$s = ob_get_contents();
		ob_end_clean();
		$s = strip_tags($s, '<h2><th><td>');
		$s = preg_replace('/<th[^>]*>([^<]+)<\/th>/', '<info>\1</info>', $s);
		$s = preg_replace('/<td[^>]*>([^<]+)<\/td>/', '<info>\1</info>', $s);
		$t = preg_split('/(<h2[^>]*>[^<]+<\/h2>)/', $s, -1, PREG_SPLIT_DELIM_CAPTURE);
		$r = array();
		$count = count($t);
		$p1 = '<info>([^<]+)<\/info>';
		$p2 = '/' . $p1 . '\s*' . $p1 . '\s*' . $p1 . '/';
		$p3 = '/' . $p1 . '\s*' . $p1 . '/';
		for ($i = 1; $i < $count; $i++) {
			if (preg_match('/<h2[^>]*>([^<]+)<\/h2>/', $t[$i], $matchs)) {
				$name = trim($matchs[1]);
				$vals = explode("\n", $t[$i + 1]);
				foreach ($vals as $val) {
					if (preg_match($p2, $val, $matchs)) { // 3cols
						$r[$name][trim($matchs[1])] = array(trim($matchs[2]), trim($matchs[3]));
					} elseif (preg_match($p3, $val, $matchs)) { // 2cols
						$r[$name][trim($matchs[1])] = trim($matchs[2]);
					}
				}
			}
		}
		return $r;
	}

	/**
	 * @return array
	 */
	public static function get_shell_phpinfo()
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
	public static function generate_uniq_id($length = 13)
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
	public static function get_user_ip_addr()
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
	public static function get_http_user_agent()
	{
		return (!empty($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
	}

	/**
	 *
	 */
	public static function detect_browser(String $data)
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
	public static function detect_os(String $data)
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

	/**
	 * Method that return assets path
	 *
	 * @return string
	 */
	public static function getAssetsPath(): string
	{
		$appName = getenv('APP_NAME');
		return "$appName/assets";
	}

	/**
	 * Method that return the relative root path
	 *
	 * @return string
	 */
	public static function getRelativeRootPath(): string
	{
		$appName = getenv('APP_NAME');
		return "$appName";
	}

	/**
	 * Method that return the directory infos
	 *
	 * @return array
	 */
	public static function get_dir_info(string $dir): array
	{
		$dir_infos = [];

		if (file_exists($dir)) {
			$dir_infos["size"] = filesize($dir);
			$dir_infos["type"] = filetype($dir);
			$dir_infos["last_access_time"] = fileatime($dir);
			$dir_infos["inode_change_time"] = filectime($dir);
			$dir_infos["group"] = filegroup($dir);
			$dir_infos["modification_time"] = filemtime($dir);
			$dir_infos["owner"] = fileowner($dir);
			$dir_infos["permissions"] = fileperms($dir);
			$dir_infos["file_exists"] = file_exists($dir);
		} else {
			throw new Exception("The directory passed aren't valid", 1);
		}

		return $dir_infos;
	}
}
