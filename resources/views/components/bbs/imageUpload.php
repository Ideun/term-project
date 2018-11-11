<?php

$return_value = "";

if ($_FILES['image']['name']) { // 파라미터 image로 줬음, imgage에 name있으면

	if (!$_FILES['image']['error']) { // 이미지에 에러가 없으면
		$name = md5(rand(100, 200));
		$ext = explode('.', $_FILES['image']['name']);  
		$filename = $name . '.' . $ext[1];
		$destination = '../images/upload/' . $filename;
		$location = $_FILES['image']['tmp_name'];
		move_uploaded_file($location, $destination); // lcation-파일경로, destination-location이 저장될 곳
		$return_value = '../images/upload/' . $filename;
	}else{
		$return_value = '업로드에 실패 하였습니다.: '.$_FILES['image']['error'];
	}
}

echo $return_value;

?>