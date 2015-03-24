<?php
class Notify {
	public static function sent($string) {
		if($string) {
			echo   '<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
						<div class="panel panel-default">
							<div class="panel-heading">Notification</div>
							<div class="panel-body">'.$string.'</div>
						</div>
					</div>';
		}
	}
}