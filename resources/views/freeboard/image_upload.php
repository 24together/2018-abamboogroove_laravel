<?php
$return_value = "";

if ($_FILES['image']['name']) {
if (!$_FILES['image']['error']) {
$name = md5(rand(100, 200));
$ext = explode('.', $_FILES['image']['name']);  
$filename = $name . '.' . $ext[1];
$destination = '../upload/' . $filename;
$location = $_FILES['image']['tmp_name'];#파일 경로
move_uploaded_file($location, $destination);
$return_value = '../upload/' . $filename;
}else{
$return_value = '업로드에 실패 하였습니다.: '.$_FILES['image']['error'];
}
}

echo $return_value;

?>