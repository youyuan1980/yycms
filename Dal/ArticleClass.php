<?php
	/**
	*
	*/
	class ArticleClass
	{
		//数据连接
		private $Db;
		public function __construct($DB)
		{
			$this->Db=$DB;
		}

		//添加
		public function AddArticleClass($Title,$ParentId)
		{
            $isBad="0";
            $sql="insert into article_classlist values(".Common::GetUniqueID().",'".$Title."',".$ParentId.",now())";
            if (!$this->Db->Execute($sql)) {
            	$isBad="1";
            }
            return $isBad;
        }

        //修改
        public function EditArticleClass($Title,$ClassId)
        {
            $isBad="0";
            $sql="update article_classlist set title='".$Title."',uptime=now() where id=".$ClassId;

            if (!$this->Db->Execute($sql)) {
                $isBad="1";
            }
            return $isBad;
        }

        public function GetChildArticleClassList($ClassID)
        {
        	$dt=$this->Db->GetDataTable("select id,title,parentid from article_classlist where parentid=".$ClassID);
        	return $dt;
        }

        public function DelArticleClass($ClassID)
        {
            $sql="delete from article_classlist where id=".$ClassID;
            $this->Db->Execute($sql);
        }

        public function GetChildArticleClassListByPage($ClassID,$Title,$page,$pagesize)
        {
            $sql="select id,title,parentid from article_classlist where 1=1 ";
            if ($Title!='') {
            	$sql=$sql." and title like '%".$Title."%' ";
            }
            $sql=$sql." and parentid=".$ClassID;
            $rowcount=$this->Db->GetRowsCount($sql);
            $sql = $sql.' limit '.($page-1)*$pagesize.','.$pagesize;
            $data=array(
            	"rowcount"=>$rowcount,
            	"items"=>$this->Db->GetDataTable($sql)
            	);
            return $data;
        }

        public function GetArticleClassInfo($ClassID)
        {
            $info=array('id' => "",'title'=>"" ,'pid'=>'');
            if ($ClassID=="-1") {
                $info["id"]="-1";
                $info["title"]="根目录";
                $info["pid"]="";
            }
            else
            {
            	$sql="select id,title,parentid from article_classlist where  id=".$ClassID;
            	$dt=$this->Db->GetDataTable($sql);
                foreach ($dt as $row) {
                    # code...
                    $info["id"]=$row["id"];
                    $info["title"]=$row["title"];
                    $info["pid"]=$row["parentid"];
                    break;
                }
            }
            return $info;
        }
	}
 ?>