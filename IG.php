<?php

	$number = $_POST['number'];//represent which number
	$totalnum = `cat uploads/sequence`;
	$presentnum = $totalnum - $number + 1;
	//shell_exec(./IG $number);
	echo "http://140.117.169.42/project/uploads/".`ls uploads/ | grep -o "^$presentnum\_.*\..*"`;

?>
