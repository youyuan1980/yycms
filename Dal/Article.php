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
            $sql=$sql." order by uptime desc";
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

        public function AddArticle($title,$classid,$keyword,$linkurl,$source,$author,$titleimage,$isimgnews,$istop,$ishot,$content,$userid)
        {
            $isbad=0;
            $sql="insert into article(id,title,class,keyword,linkurl,source,author,titleimage,isimgnews,istop,ishot,content,uptime,addtime,editusername) values(".Common::GetUniqueID().",'".$title."',".$classid.",'".$keyword."','".$linkurl."','".$source."','".$author."','".$titleimage."',".$isimgnews.",".$istop.",".$ishot.",'".$content."',now(),now(),'".$userid."') ";
            if (!$this->Db->Execute($sql)) {
                # code...
                $isbad=1;
            }
            return $isbad;
        }

        public function EditArticle($Id,$title,$keyword,$linkurl,$source,$author,$titleimage,$isimgnews,$istop,$ishot,$content,$userid)
        {
            $isbad=0;
            $sql="update article set title='".$title."',keyword='".$keyword."',linkurl='".$linkurl."',source='".$source."',author='".$author."',titleimage='".$titleimage."',isimgnews=".$isimgnews.",istop=".$istop.",ishot=".$ishot.",content='".$content."',uptime=now(),editusername='".$userid."' where id=".$Id;
            if (!$this->Db->Execute($sql)) {
                # code...
                $isbad=1;
            }
            return $isbad;
        }

        public function GetArticle($ID)
        {
            $sql="select * from article where id=".$ID;
            return $this->Db->GetDataTable($sql);
        }
	}
 ?>