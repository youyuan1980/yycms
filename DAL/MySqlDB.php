<?php
	class MySqlDB
	{
		private $Link;				 //连接对象
		var $Result;

        function __construct($Config)
        {
            $this->Link=mysql_connect(
                $Config["Server"],
                $Config["UserID"],
                $Config["UserPwd"]
            );
            mysql_select_db($Config["DataBase"]);
            mysql_set_charset("utf8");


        } //结果
		
		//执行sql语句
		public function Execute($sql)
		{
			$this->Result=mysql_query($sql);
			return $this->Result;
		}
		
		//返回查询语句总数
		public function GetRowsCount($sql)
		{
			$this->Result=mysql_query($sql);
			return mysql_num_rows($this->Result);
		}
		
		//返回数据项
		public function GetDataTable($sql)
		{
			$data=array();
			$this->Result=mysql_query($sql);
			while($row=mysql_fetch_array($this->Result,MYSQL_ASSOC))
			{
				$data[]=$row;
			}
			mysql_free_result($this->Result);
			return $data;
		}
	}
?>