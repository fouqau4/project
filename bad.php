<?php
	for( $temp_i = 1 ; $temp_i <= 300 ; $temp_i++ )
	{
		$img = shell_exec("cat recommand/data/bad_num | head -$temp_i | tail -1 | cut -d_ -f1 | grep -o '[0-9]*'");
        echo "<pre>$img</pre>";
        echo "<img src=\"picture/tops/$img.jpg\" width =\"300\" >";
        $img = shell_exec("cat recommand/data/bad_num | head -$temp_i | tail -1 | cut -d_ -f2 | grep -o '[0-9]*'");
        echo "<pre>$img</pre>";
        echo "<img src=\"picture/bottoms/$img.jpg\" width = \"250\" >";
    }
		
?>
