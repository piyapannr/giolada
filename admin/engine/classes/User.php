<?php
class User {
	private static $_instance = null;
	private $_db,
			$_data,
			$_sessionName,
			$_tokenName,
			$_cookieUid,
			$_cookieName,
			$_isLoggedIn;

	public function __construct($user = null) {
		$this->_db = Database::getInstance();
		$this->_sessionName = Config::get('session/session_name');
		$this->_tokenName = Config::get('session/token_name');
		$this->_cookieUid = Config::get('remember/cookie_uid');
		$this->_cookieName = Config::get('remember/cookie_name');
	}

	public static function getInstance() {
		if(!isset(self::$_instance)) {
			self::$_instance = new User();
		}
		return self::$_instance;
	}

	public function isLoggedIn(){
		$user = $this->findUid(base64_decode(Cookie::get('uid')));
		if($user){
			if($this->data()->session === Cookie::get('hash')){
				return true;
			}
		}
		return false;
	}

	public function create($fields = array()) {
		if(!$this->_db->insert(Config::get('database/user_table'), $fields)) {
			throw new Exception('There was problem creating an acount.');
		}
	}

	public function deleteUser($uid) {
		if($this->_db->delete(Config::get('database/user_table'), array('uid', '=', $uid)))
			return true;
		else
			return false;
	}

	public function find($user = null) {
		if($user) {
			$field = Config::get('database/field_username');
			$data = $this->_db->get(Config::get('database/user_table'), array($field, '=', $user));

			if($data->count()) {
				$this->_data = $data->first();
				return true;
			}
		}
	}
	public function findUid($user = null) {
		if($user) {
			$field = 'uid';
			$data = $this->_db->get(Config::get('database/user_table'), array($field, '=', $user));

			if($data->count()) {
				$this->_data = $data->first();
				return true;
			}
		}
	}

	public function login($username = null, $password = null, $remember = false) {
		$user = $this->find($username);
		/*
		if($user){ 
			echo 'User \'', $username , '\' founded.<br>';
		} else {
			echo 'User \'', $username , '\' not found.<br>';
		}
		*/

		if($user) {
			//echo Hash::make($password, $this->data()->salt) . '<br>';
			//echo $this->data()->password , '<br>';
			//echo Input::get('token');
			if($this->data()->password === Hash::make($password, $this->data()->salt)) {
				/*
				Session::put($this->_sessionName, $this->data()->uid);
				Session::put($this->_tokenName, Input::get('token'));
				*/
				$hash = Hash::unique();
				Cookie::put($this->_cookieName, $hash, 3600);
				Cookie::put($this->_cookieUid, base64_encode($this->data()->uid), 3600);
				$this->_db->update(Config::get('database/user_table'), array('uid', '=', $this->data()->uid), array('session' => $hash));
					
				if($remember) {
					$hashCheck = $this->_db->get(Config::get('database/user_table'), array('uid', '=', $this->data()->uid));

					if(!$hashCheck->count()) {
						$this->_db->insert(Config::get('database/user_table'), array(
							'uid' => $this->data()->uid,
							'hash' => $hash
							));
					} else {
						$hash = $hashCheck->first()->session;
					}

					Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));

				}
				return true;
			}
		}
		//print_r($this->_data);
		//echo $username . ", " . $password . " -> ";
		return false;
	}

	private function data() {
		return $this->_data;
	}
}