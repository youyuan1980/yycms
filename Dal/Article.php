<?php
	class Article
	{
		//数据连接
		private $Db;
		public function __construct($DB)
		{
			$this->Db=$DB;
		}

		public function GetArticleList($title,$classid,$page,$pagesize)
        {
            $sql="select id,title,class from article where isdelete='0' and  class='".$classid."'";
            if ($title!='') {
            	$sql=$sql." and title like '%".$title."%'";
            }
            $rowcount=$this->Db->GetRowsCount($sql);
            $sql = $sql.' limit '.($page-1)*$pagesize.','.$pagesize;
            $data=array(
            	"rowcount"=>$rowcount,
            	"items"=>$this->Db->GetDataTable($sql)
            	);
            return $data;
        }

        public function DelArticle($ID)
        {
            $sql="update article set isdelete='1' where id=".$ID;
            $this->Db->Execute($sql);
        }
	}
 ?>