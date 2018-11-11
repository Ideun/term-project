<!--

추천 버튼을 눌렀을때 form 이나 직접주소링크를 이용해서 추천 프로세스로 이동합니다. 
해당 페이지에서 위에 말한 Table을 검사합니다. 
간단하게 조건을 줘서 해당 row가 있는지만 확인하면 되죠. 
있다면 "이미 추천했어요" 말 뿌리고 Back 하면되고 
없다면 게시글 안의 추천컬럼을 1증가시키고  추천테이블에 정보를 저장합니다. 
"추천했어요" 말 뿌리고 게시물로 돌아가면 됩니다.

	-->
	<?php
		require_once("../tools.php");
		require_once("BoardDAO.php");
		session_start_if_none();
    	$rec = sessionValue("rec");

	?>
