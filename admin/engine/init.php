<?php
session_name('apk');
session_start();

$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => 'localhost',
		'username' => 'giolada',
		'password' => 'sEYzA8Aik',
		'db' => 'giolada_DB'
	),
	'remember' => array(
		'cookie_uid' => 'uid',
		'cookie_name' => 'hash',
		'cookie_expiry' => 604800
	),
	'session' => array(
		'session_name' => 'user',
		'token_name' => 'token'
	),
	'database' => array(
		'user_table' => 'users',
		'field_user_id' => 'uid',
		'field_username' => 'username',
		'field_password' => 'password',
		'field_salt' => 'salt'
	)
);


spl_autoload_register(function($class) {
    $file = __DIR__.'/classes/' . $class . '.php';
    if(file_exists($file)) {
       include $file;
    }
});

require_once 'functions/sanitize.php';
/*
if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
	//echo 'User asked to be remembered.';
	$hash = Cookie::get(Config::get('remember/cookie_name'));
	$hashCheck = Database::getInstance()->get('users_session', array('hash', '=', $hash));

	if($hashCheck->count()) {
		Notify::sent('Hash matches, log user in.');
	}
}
*/