<?php
$link=mysql_connect('localhost','root','111111');
if(!$link) {
die('Could not connect: '.mysql_error());
}
// 2. 데이터베이스 선택
mysql_select_db('opentutorials');
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");

$clean = array();
$clean['title'] = mysql_real_escape_string($_POST['title']);
$clean['description'] = mysql_real_escape_string($_POST['description']);

$sql = "INSERT INTO topic (title, description, created) VALUES('{$clean['title']}', '{$clean['description']}', NOW())";
mysql_query($sql);
if(mysql_affected_rows()==1){
	echo "<script>alert('성공 했습니다.');location.href=\"index.php?id=".mysql_insert_id()."\"</script>";
} else {
	echo "실패, ".mysql_error();
}
?>