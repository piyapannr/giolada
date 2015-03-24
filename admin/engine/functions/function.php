<?php
	function ajax_login($user, $pass)
	{
		if(Token::check(Input::get('token'))) {
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'username' => array('required' => true),
				'password' => array('required' => true)
				));

			if($validation->passed()) {
				// loged in
				$user = new User();
				$remember = (Input::get('remember') === 'on') ? true : false;
				$login = $user->login(Input::get('username'), Input::get('password'), $remember);
				if($login) {
					echo '<p>Login Success</p>';
					return 1;
				} else {
					echo '<p>Sorry, login failed.</p>';
					return 0;
				}
			} else {
				foreach ($validation->errors() as $error) {
					echo $error, '<br>';
					return $error;
				}
			}
		}
		/*
		writeLog($user, $pass);

		$sql="SELECT * FROM user_entity WHERE username='$user'";
	    $query=mysql_query($sql)or die(mysql_error());
	    $objResult = mysql_fetch_array($query);

	    if($objResult['password']==$pass){
	    	$loginCount = $objResult['login_count'] + 1;
			if ($objResult['restrict'] == 'student') {
				setcookie("uid", $objResult['uid'], time()+3600, "/", "", "", TRUE);
				setcookie("c_user", $objResult['username'], time()+3600, "/", "", "", TRUE);
				setcookie("wres", $objResult['restrict'], time()+3600, "/", "", "", TRUE);
				return 99;
			}else if($objResult['restrict'] == 'admin') {
				setcookie("uid", $objResult['uid'], time()+(3600*24*7*30), "/", "", "", TRUE);
				setcookie("c_user", $objResult['username'], time()+(3600*24*7*30), "/", "", "", TRUE);
				setcookie("wres", $objResult['restrict'], time()+(3600*24*7*30), "/", "", "", TRUE);
				return 99;
			}
		} else {
			return 1;
		}
		*/
	}

	function fb_date($timestamp){
		$difference = time() - $timestamp;
		$periods = array("second", "min", "hour");
		$ending="";
		if($difference<60){
			$j=0;
			$periods[$j].=($difference != 1)?"s":"";
			$difference=($difference==3 || $difference==4)?"a few ":$difference;
			$text = "$difference $periods[$j] $ending";
		}elseif($difference<3600){
			$j=1;
			$difference=round($difference/60);
			$periods[$j].=($difference != 1)?"s":"";
			$difference=($difference==3 || $difference==4)?"a few ":$difference;
			$text = "$difference $periods[$j] $ending";
		}elseif($difference<86400){
			$j=2;
			$difference=round($difference/3600);
			$periods[$j].=($difference != 1)?"s":"";
			$difference=($difference != 1)?$difference:"about an ";
			$text = "$difference $periods[$j] $ending";
		}elseif($difference<172800){
            $j=0;
			$difference=round($difference/86400);
			$periods[$j].=($difference != 1)?"s":"";
			$text = "Yesterday at ".date("g:ia",$timestamp);
		}else{
			if($timestamp<strtotime(date("Y-01-01 00:00:00"))){
				$text = date("l j, Y",$timestamp)." at ".date("g:ia",$timestamp);
			}else{
				$text = date("l j",$timestamp)." at ".date("g:ia",$timestamp);
			}
		}
		return $text; 
	} 
?>