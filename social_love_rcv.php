<?php
	$username = $_POST['username'];
	$num = $_POST['num'];
	$love = $_POST['love'];
	$totalnum = `cat uploads/sequence`;
	$presentnum = $totalnum - $num + 1;
	shell_exec("echo $presentnum $love >> ./users/$username/social_love");
?>
