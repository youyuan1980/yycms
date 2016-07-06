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
		public function AddUser($UserID,$UserName,$UserRoles)
		{
            $isBad="0";
            $pwd=md5('123');
            $this->Db->Execute('START TRANSACTION');
            $sql="delete from userinrole where userid='".$UserID."'";
            if(!$this->Db->Execute($sql))
            {
                $isBad="1";
            }
            if (is_array($UserRoles)) {
                foreach ($UserRoles as $value) {
                    $sql="insert into userinrole values('".$UserID."','".$value."')";
                    if(!$this->Db->Execute($sql))
                    {
                        $isBad="1";
                    }
                }
            }
            $sql="insert into users(userid,userpassword,username) values('".$UserID."','".$pwd."','".$UserName."')";
            if(!$this->Db->Execute($sql))
            {
                $isBad="1";
            }
            if($isBad=="1")
            {
                $this->Db->Execute('ROLLBACK ');
            }
            else
            {
                $this->Db->Execute('COMMIT');
            }
            return $isBad;
        }

        //添加用户
        public function EditUser($UserID,$UserName,$UserRoles)
        {
            $isBad="0";
            $pwd=md5('123');
            $this->Db->Execute('START TRANSACTION');
            $sql="delete from userinrole where userid='".$UserID."'";
            if(!$this->Db->Execute($sql))
            {
                $isBad="1";
            }
            foreach ($UserRoles as $value) {
                $sql="insert into userinrole values('".$UserID."','".$value."')";
                if(!$this->Db->Execute($sql))
                {
                    $isBad="1";
                }
            }
            $sql="update users set username='".$UserName."' where userid='".$UserID."'";
            if(!$this->Db->Execute($sql))
            {
                $isBad="1";
            }
            if($isBad=="1")
            {
                $this->Db->Execute('ROLLBACK ');
            }
            else
            {
                $this->Db->Execute('COMMIT');
            }
            return $isBad;
        }

		public function DelUser($UserID)
        {
            $sql="delete from users where userid='".$UserID."'";
            return $this->Db->Execute($sql);
        }

        public function RestPassowrd($UserID)
        {
        	$pwd=md5('123');
        	$sql="update users set USERPASSWORD='".$pwd."' where userid='".$UserID."'";
        	return $this->Db->Execute($sql);
        }

		public function GetUserList($username,$page,$pagesize)
        {
            $sql="select userid,username from users ";
            if ($username!='') {
            	$sql=$sql."where userid like '%".$username."%' or username like '%".$username."%'";
            }
            $rowcount=$this->Db->GetRowsCount($sql);
            $sql = $sql.' limit '.($page-1)*$pagesize.','.$pagesize;
            $data=array(
            	"rowcount"=>$rowcount,
            	"items"=>$this->Db->GetDataTable($sql)
            	);
            return $data;
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