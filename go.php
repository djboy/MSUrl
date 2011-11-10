<?php
include("config.php");
@$get_w = addslashes($_GET['w']);
if(file_exists($root."/url/".$get_w))
{
	$linenum = 0;
	$path = $root."/url/".$get_w."/info";
	$handle = fopen($path, "r");
	$lines=file($path);
	$l_url = htmlentities($lines[$linenum]);
	header("location: ".$l_url) or die("
		<html>
	<head>
		<title>Edit link - ".$title."</title>
	</head>
	<body>
		<center>
		<img src='http://msby.org/msby/dc/images/logo.bmp' width='997' height='126' /><br />
	url not valid!
		</center>
	<hr />
	<center>
		Powered by MSUrl 0.2 beta
		<br />
		More scripts from <a href='http://msscripts.msby.org'>MSScripts</a>
	</center>
	</body>
</html>
	");
}
else
{
	echo "
	<html>
	<head>
		<title>Edit link - ".$title."</title>
	</head>
	<body>
		<center>
		<img src='http://msby.org/msby/dc/images/logo.bmp' width='997' height='126' /><br />
	url not valid!
		</center>
	<hr />
	<center>
		Powered by MSUrl 0.2 beta
		<br />
		More scripts from <a href='http://msscripts.msby.org'>MSScripts</a>
	</center>
	</body>
</html>
	";
}
?>