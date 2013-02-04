<?php
$link=mysql_connect('localhost','root','111111');
if(!$link) {
die('Could not connect: '.mysql_error());
}

mysql_select_db('opentutorials');
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");

$title = $_POST['title'];
$description = $_POST['description'];

/*
보안을 위해서는 위의 코드를 아래와 같이 작성해야 합니다. 
아래 코드는 이해를 쉽게 하기 위해서 설명을 생략했습니다.
$title = mysql_real_escape_string($_POST['title']);
$description = mysql_real_escape_string($_POST['description']);
*/

$sql = "INSERT INTO topic (title, description, created) VALUES('".$title."', '".$description."', NOW())";
mysql_query($sql);
if(mysql_affected_rows()==1){
	echo "
		<html>
			<head>
				<script>
					alert('성공 했습니다.');
					location.href=\"index.php?id=".mysql_insert_id()."\";
				</script>
			</head>
		</html>";
} else {
	echo "
		<html>
			<body>
				실패, ".mysql_error()."
			</body>
		</html>";
}
?>