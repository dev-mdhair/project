<?php
class HostAddress
{
	public static function getUserIp()
	{
		if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
		{
			$ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
			return $ips[0];
		}
		else 
		{
		return isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:'127.0.0.1';
		}
	}
}