<?php

	$number = $_POST['number'];//represent which number
	$totalnum = `cat uploads/sequence`;
	$presentnum = $totalnum - $number + 1;
	$love_num = shell_exec("cat love | head -$presentnum | tail -1 | tr '\n' ' ' ");
	echo $love_num;
	

?>
