<?php
require_once ("../tools.php");
$comment = requestValue("comment");
$cwriter = requestValue("writer");
require_once ("BoardDao.php");
$dao=new BoardDAO();

$num = requestValue("num");
$page = requestValue("page");
$url= bdURL("view.php",$num,$page);
$dao->insertCmt($num,$cwriter,$comment);



okGo("댓글이 입력되었습니다.", $url);



//페이지랑 넘 불러오기
?>
