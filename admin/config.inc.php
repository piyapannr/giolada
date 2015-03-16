<?php
	$host = "localhost";
	$user ="giolada";
	$password_admin = "sEYzA8Aik";
	$database = "giolada_DB";
	$link = mysql_connect($host,$user,$password_admin ) or die(mysql_error());
	mysql_select_db($database) or die(mysql_error());
//mysql_query("SET CHARACTER SET tis620");
	mysql_query("set character set utf8");

?>


