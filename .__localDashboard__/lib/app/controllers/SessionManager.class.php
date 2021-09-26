<?php

/**
 * Class that will manage app sessions.
 *
 */
class SessionManager
{

	function __construct()
	{
	}

	/**
	 * Method that destroy a session.
	 *
	 * @param string $key
	 * @return void
	 */
	public static function sd($key)
	{
		if (!empty($_SESSION[$key])) {
			unset($_SESSION[$key]);
		}
	}

	/**
	 * Method that start session.
	 *
	 * @return bool
	 */
	public static function ss()
	{
		return session_start();
	}
}
