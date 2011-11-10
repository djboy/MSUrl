<?php
//if(!empty(htmlspecialchars(addslashes($_GET['w']))))
if(!empty($_GET['w']))
{
	include("go.php");
}
else
{
	$get_r = htmlspecialchars(addslashes($_GET['r']));
	switch ($get_r)
	{
		case "e":
			include("edit.php");
		break;
		
		default:
			header("location: new.php"); die;
		break;
	}
}
?>