<?php
	class User
	{
		//数据连接
		private $Db;
		public function __construct($DB)
		{
			$this->Db=$DB;
		}

        public function  GetUserName($UserID)
        {
            $UserName="";
            $sql="select username from users where userid='".$UserID."'";
            $UserInfo=$this->Db->GetDataTable($sql);
            if($UserInfo)
            {
                if(count($UserInfo)==1)
                {
                    $UserName=$UserInfo[0]["username"];
                }
            }
            return $UserName;
        }
		//判断用户名和密码是否正确 ,返回1为登陆成功 ，2为密码错误，3为用户名错误
		public function Login($UserID,$UserPwd)
		{
			$sql="select userid,userpassword from users where userid='".$UserID."'";
			$flag=$this->Db->GetRowsCount($sql);
			if($flag==1)
			{
				$data=$this->Db->GetDataTable($sql);
				$userpwd=$data[0]["userpassword"];
				if(!strcasecmp($userpwd,md5($UserPwd)))
				{
					return 1;
				}
				else
				{
					return 2;
				}
			}
			else
			{
				return 3;
			}
		}

        //添加用户
		public function AddUser($UserID,$UserPwd,$UserName,$UserRoles)
		{
            $sql="insert into users(userid,userpwd,username) values()";
            return $this->Db->Execute($sql);
        }
		
		public function DelUser($UserID)
        {
            $sql="delete from users where userid='".$UserID."'";
            return $this->Db->Execute($sql);
        }
		
		public function GetUserList()
        {
            $sql="select userid,username from users ";
            return $this->Db->GetDataTable($sql);
        }
		
		public function Lock()
		{

		}
		
		public function IsChecked($UserID)
        {
            $sql="select count(*) from users where userid='".$UserID."'";
            return $this->Db->GetRowsCount($sql);
        }
		
		public function UpdUser()
        {

        }
	}
?>