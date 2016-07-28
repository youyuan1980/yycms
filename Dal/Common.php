<?php
	class Common
	{
		//获取全局ID唯一变量
		static function GetUniqueID()
		{
			$id=0;
			$time =microtime(true)-strtotime('1970-01-01 00:00:00');
			$id=$time*100;
			return $id;
		}
	}
?>
