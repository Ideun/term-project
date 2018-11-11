<?php
	require_once("../tools.php");
	require_once("BoardDAO2.php");
	
	$title = requestValue("title");
	$writer = requestValue("writer");
	$content = requestValue("content");

	if ($title && $writer && $content) {
		// DB에 insert
		$dao = new BoardDao();
		$dao->insertMsg($title, $writer, $content);
		okGo("정상적으로 입력되었습니다", "board2.php");
	} else {
		errorBack("모든 항목이 빈칸 없이 입력되어야 합니다.");
	}

?>