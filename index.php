<?php
// 1. 데이터베이스 서버에 접속
$link=mysql_connect('localhost','root','111111');
if(!$link) {
die('Could not connect: '.mysql_error());
}
// 2. 데이터베이스 선택
mysql_select_db('opentutorials');
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");
if(!empty($_GET['id'])) {
	$sql="SELECT * FROM topic WHERE id = ".mysql_real_escape_string($_GET['id']);
	$result = mysql_query($sql);
	$topic = mysql_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>index</title>
		<meta name="description" content="" />
		<meta name="author" content="egoing" />

		<meta name="viewport" content="width=device-width; initial-scale=1.0" />

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
		<link rel="stylesheet" type="text/css" href="./style.css" />
	</head>

	<body id="body" style="font-size:1em">
		<div>
			<header>
				<h1>Opentutorials by egoing</h1>
			</header>
			<div id="toolbar">
				<input type="button" value="black" onclick="document.getElementById('body').className='black'" />
				<input type="button" value="white" onclick="document.getElementById('body').className='white'" />
			</div>
			<nav>
				<ul>
					<?php
					$sql="select id,title from topic";
					$result=mysql_query($sql);
					while($row=mysql_fetch_assoc($result)) {
					echo "<li><a href=\"?id={$row['id']}\">{$row['title']}</a></li>";
					}
					?>
				</ul>
			</nav>
			<article>
				<h2><?=$topic['title']?></h2>
				<div>
					<?=$topic['description']?>
				</div>
			</article>
		</div>
	</body>
</html>
