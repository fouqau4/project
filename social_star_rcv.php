<?php
	$username = $_POST['username'];
	$num = $_POST['num'];
	$star = $_POST['star'];
	$totalnum = `cat uploads/sequence`;
	$presentnum = $totalnum - $num + 1;
	shell_exec("echo $presentnum $star >> ./users/$username/social_star");
?>
