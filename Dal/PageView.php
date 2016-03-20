<?php 
/**
* 
*/
class PageView
{
  public static function getPageHtml($page=1, $rowcount=0,$pagesize=20,$url='')
   {
      $sizeCount = 0;
      if ($rowcount != 0) {
          $sizeCount = ceil($rowcount / $pagesize);
      }      
      $pagestr = "<table id=\'pager\' class=\"pager\"><tr><td  valign=\"bottom\" align=\"left\" nowrap=\"true\" style=\"width:40%;\">记录数：" . $rowcount . "条<span style=\"margin-left:5px;\"></span>每页显示：" . $pagesize . "条 ";
      $pagestr =$pagestr. "当前页：第" . $page . "页<span style=\"margin-left:5px;\"></span>总页数：" . $sizeCount . "页<span style=\"margin-left:60px;\"></span>";
      $pagestr =$pagestr.  "<a href='" . $url . "page=" . $page . "' style=\"margin-right:5px;\">&lt;&lt;</a>";
      if ($page <= $pagesize) {
          if ($page + $pagesize > $sizeCount) {
              for ($i = 1; $i <= $sizeCount; $i++) {
                  if ($page == $i) {
                      $pagestr =$pagestr.  "<span style=\"margin-right:5px;font-weight:Bold;color:red;\">" . $i . "</span>";
                  }
                  else {
                      $pagestr =$pagestr.  "<a href='" . $url . "page=" . $i . "' style=\"margin-right:5px;\">" . $i . "</a>";
                  }
              }
          }
          else {
              for ($i = 1; $i <= $page + $pagesize; $i++) {
                  if ($page == $i) {
                      $pagestr =$pagestr.  "<span style=\"margin-right:5px;font-weight:Bold;color:red;\">" . $i . "</span>";
                  }
                  else {
                      $pagestr =$pagestr.  "<a href='" . $url . "page=" . $i . "' style=\"margin-right:5px;\">" . $i . "</a>";
                  }
              }
          }
      }
      else {
          if ($page + $pagesize > $sizeCount) {
              for ($i = $page - $pagesize; $i <= $sizeCount; $i++) {
                  if ($page == $i) {
                      $pagestr =$pagestr.  "<span style=\"margin-right:5px;font-weight:Bold;color:red;\">" . $i . "</span>";
                  }
                  else {
                      $pagestr =$pagestr.  "<a href='" . $url . "page=" . $i . "' style=\"margin-right:5px;\">" . $i . "</a>";
                  }
              }
          }
          else {
              for ($i = $page - $pagesize; $i <= $page + $pagesize; $i++) {
                  if ($page == $i) {
                      $pagestr =$pagestr.  "<span style=\"margin-right:5px;font-weight:Bold;color:red;\">" . $i . "</span>";
                  }
                  else {
                      $pagestr =$pagestr.  "<a href='" . $url . "page=" . $i . "' style=\"margin-right:5px;\">" . $i . "</a>";
                  }
              }
          }
      }
      $pagestr =$pagestr.  "<a href='" . $url . "page=" . $sizeCount . "' style=\"margin-right:5px;\">&gt;&gt;</a>";
      $pagestr =$pagestr.  "</td></tr></table>";
      return $pagestr;
   }
}
 ?>