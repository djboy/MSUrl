<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
		<center>
			<img src="http://msby.org/msby/dc/images/logo.bmp" width="997" height="126" />
			<br />
<?php
include("config.php");

$num_dir = scandir($root."/url");
$number_of_dirs = count($num_dir);

$password = rand_string(8).rand(0, 999).$number_of_dirs.rand_string(5);

if(isset($_POST['submit']))
{
	$long = strip_tags(addslashes($_POST['l_url']));
	if(empty($long))
	{
		echo"<br />No URL entered, <a href='index.php'>Retry</a><br />"; 
	}
	else
	{
		if ((strpos($long, "http")) === false)
		{
			$long = "http://" . $long;
		}
		//if(url_exists(addslashes($_POST['l_url'])) == 1)
		if(1 == 1)
		{	
			$dir_name = rand_string(2).$number_of_dirs++.rand_string(1);
			mkdir($root."/url/".$dir_name, 0755);
			$fp = fopen("url/".$dir_name."/info", "a");
			fputs($fp, $long."\r\n");
			fputs($fp, $password."\r\n");
			fputs($fp, date("d-m-Y, H:i:s").",	by this ip:	".$_SERVER['REMOTE_ADDR']."\r\n");
			fclose($fp);
			
			echo "<br />";
			echo "long url: <a href='".$long."'>".$long."</a><br />";
			echo "<br />";
			echo "tiny url: <a href='".$http_root."/".$dir_name."'>".$http_root."/".$dir_name."</a><br />";
			echo "<br />";
			echo "edit link: <a href='".$http_root."/?r=e&link=".$dir_name."&p=".$password."'>".$http_root."/?r=e&link=".$dir_name."&p=".$password."<a/><br />";
			echo "<br />";
		}
		else
		{ 
			echo"<br />URL does not exist!, <a href='index.php'>Retry</a><br />"; 
		}
	}
}
else
{
?>
			<form action="" method="POST">		
				<table>
					<tr>
						<td>
							long url:
						</td>
						<td>
							<input type="text" name="l_url" id="l_url" size="70" />
						</td>
					</tr>
					<tr>
						<td>
						</td>
						<td>
							<input type="submit" name="submit" value="submit" />
						</td>
					</tr>
				</table>
			</form>
<?php
}
?>
		</center>
		<hr />
		<center>
			Powered by MSUrl 0.2 beta
			<br />
			More scripts from <a href='http://msscripts.msby.org'>MSScripts</a>
		</center>
	</body>
</html>