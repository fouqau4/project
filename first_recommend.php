<?php
	$username = $_POST['username'];
	
	$filepath="./users/".$username."1.txt";
	//echo $filepath;
	echo `(ls $filepath > trash && echo 1) || echo 0`;
	/*if( -f $filepath )//file is exist
	{
	   echo "1";
	}
	else//file is not exist 0 represent not exist
	{
	    echo "0";
	    
	}*/
		
		
?>
