<?php
class Session {
	public static function exists($name) {
		return (isset($_SESSION[$name])) ? true : false;
	}

	public static function put($name, $value) {
		return $_SESSION[$name] = $value;
	}

	public static function set($name, $value, $time) {
		setcookie($name, $value, time()+$time, "/", "", "", TRUE);
		return true;
	}

	public static function get($name) {
		if(isset($_SESSION[$name])){
			return $_SESSION[$name];
		} else {
			return 'You are not log in yet.';
		}
	}

	public static function delete($name) {
		if(self::exists($name)) {
			unset($_SESSION[$name]);
		}
	}

	public static function flash($name, $string = '') {
		if(self::exists($name)) {
			$session = self::get($name);
			self::delete($name);
			return $session;
		} else {
			self::put($name, $string);
		}
	}
}