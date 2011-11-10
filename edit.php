<?php
include("config.php");
?>
<html>
	<head>
		<title>Edit link - <?php echo $title; ?></title>
	</head>
	<body>
		<center>
		<img src="http://msby.org/msby/dc/images/logo.bmp" width="997" height="126" />
<?php
@$get_w = strip_tags(addslashes($_GET['link']));
@$get_p = strip_tags(addslashes($_GET['p']));
if(file_exists($root."/url/".$get_w))
{
	$linenum = 1;
	$path = $root."/url/".$get_w."/info";
	$handle = fopen($path, "r");
	$lines=file($path);
	$password = htmlentities($lines[$linenum]);
	if(preg_match("/".$get_p."/", $password))
	{
		if(isset($_POST['submit']))
		{
				//if(url_exists(addslashes($_POST['l_url'])) == 1)
				if(1 == 1)
				{
					$long = strip_tags(addslashes($_POST['l_url']));
					if ((strpos($long, "http")) === false)
					{
						$long = "http://" . $long;
					}
			
				$filename = $root."/url/".$get_w."/info";
				$handle = fopen($filename, "r");
				$contents = fread($handle, filesize($filename));
				fclose($handle);
				
				$fp = fopen("url/".$get_w."/info", "w");
				fputs($fp, $long."\r\n");
				fputs($fp, $password);
				fputs($fp, date("d-m-Y, H:i:s").",	by this ip:	".$_SERVER['REMOTE_ADDR']."\r\n");
				fputs($fp, $contents);
				fclose($fp);
				
				echo "<br />";
				echo "long url: <a href='".$long."'>".$long."</a><br />";
				echo "<br />";
				echo "tiny url: <a href='".$http_root."/".$get_w."'>".$http_root."/".$get_w."</a><br />";
				echo "<br />";
				echo "edit link: <a href='".$http_root."/?r=e&link=".$get_w."&p=".$password."'>".$http_root."/?r=e&link=".$get_w."&p=".$password."<a/><br />";
			}
			else
			{ 
				echo"<br />URL does not exist!, Retry<br />"; 
			} 	
		}
			$linenum = 0;
			$path = $root."/url/".$get_w."/info";
			$handle = fopen($path, "r");
			$lines=file($path);
			$l_url = htmlentities($lines[$linenum]);
		?>
			<form action="" method="POST">		
				<table>
					<tr>
						<td>
							Last updated :
						</td>
						<td>
							<?php
								$linenum_1 = 2;
								$path_1 = $root."/url/".$get_w."/info";
								$handle_1 = fopen($path_1, "r");
								$lines_1 = file($path_1);
								$date = htmlentities($lines_1[$linenum_1]);
								echo $date.", ".date("e, P");
							?>
						</td>
					</tr>
					<tr>
						<td>
							long url:
						</td>
						<td>
							<input type="text" name="l_url" id="l_url" value="<?php echo $l_url; ?>" size="70" />
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
	else
	{
	echo "<br />url not valid!";
	}
}
else
{
	echo "<br />url not valid!";
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