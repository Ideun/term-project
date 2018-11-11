<?php

    require_once("../tools.php");
    require_once("BoardDao.php");

    $content = requestValue("content");
    $title   = requestValue("title");
    $num = requestValue("num");
    $writer  = requestValue("writer");

    

    if($content && $title && $writer){
        $dao = new BoardDao();
        $dao->updateMsg($num, $title, $writer, $content);

        okGo("게시글이 수정되었습니다","board.php");
    } else{
        errorBack("모든 항목이 빈 칸 없이 입력되어야 합니다");
    }
?>