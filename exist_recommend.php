<?php

$con=mysqli_connect('localhost','root','12345','dressing');
if ( mysqli_connect_error($con))
{
    echo "Failed to connect to MySQL : " . mysqli_connect_error();
}
else
{	
	
	$username = $_POST['username'];
	$type = $_POST['type'];
//	$username = "alex2";
//	$type = 1;
	
	$username1=$username."1.txt";
	$username2=$username."2.txt";
	$username3=$username."3.txt";
	$username4=$username."4.txt";
	$username5=$username."5.txt";
	$username6=$username."6.txt";
	$username7=$username."7.txt";
	$username8=$username."8.txt";
	$username9=$username."9.txt";//suit up
	$username10=$username."10.txt";//exercise
	shell_exec("rm -f ./users/$username2");
	shell_exec("rm -f ./users/$username3");
	shell_exec("rm -f ./users/$username4");
	shell_exec("rm -f ./users/$username5");
	shell_exec("rm -f ./users/$username6");
	shell_exec("rm -f ./users/$username7");
	shell_exec("rm -f ./users/$username8");
	shell_exec("rm -f ./users/$username9");
	shell_exec("rm -f ./users/$username10");
   	$lines = shell_exec("cd users; cd $username ; cat wardrobe | wc -l");
	//echo $lines;
	//echo "<br>";
	for($i=1;$i<=$lines;$i++)
	{	
		 
		$num=shell_exec("cd users; cd $username ; cat wardrobe  | head -$i | tail -1 | tr '\n' ' ' ");
		
		$sql = "select * from clothes where id = $num";
		if($result = mysqli_query($con,$sql))
		{
			
			$row=mysqli_fetch_assoc($result);
			if($row['style3']==1)//represent pants
			{
				
				$num = $num." 2";//cloth socre
				if($row['style2']==3)//suit up 
					shell_exec("cd users; echo $num >> $username9");
				else if($row['style2']==1)//exercise 
					shell_exec("cd users; echo $num >> $username10");
				else if($row['style1'] == 1)
					shell_exec("cd users; echo $num >> $username2");
				else if($row['style1']==2)
					exec("cd users; echo $num >> $username3 ");
				else if($row['style1']==3)
					exec("cd users; echo $num >> $username4");
				else if($row['style1']==4)
					exec("cd users; echo $num >> $username5");
				else if($row['style1']==5)
					exec("cd users; echo $num >> $username6");
				else if($row['style1']==6)
					exec("cd users; echo $num >> $username7");
				else if($row['style1']==7)
					exec("cd users; echo $num >> $username8");
				else 
					echo "0000";
			}
			
		}
		else
		{	
			echo $num;
			echo "connect error";
			echo "<br>";
		}
	}
	$score_line = shell_exec("cd users ; cat $username1 | wc -l");
	$totalscore = 0;
	for($j=1;$j<=$score_line;$j++)
	{
	$temp = shell_exec("cd users; cat $username1  | head -$j | tail -1 | tr '\n' ' ' ");
	$totalscore = $totalscore + $temp;
	}
	/*echo $totalscore;
	echo "<br>";*/
	$choose=rand(1,$totalscore);
	//echo $choose;
	//echo "<br>";
	for($j=1;$j<=$score_line;$j++)
	{
	$temp = shell_exec("cd users; cat $username1  | head -$j | tail -1 | tr '\n' ' ' ");
	$choose = $choose - $temp;
		if($choose<=0)
		{
			//echo "choose $j";
			//echo "<br>";
			$j = $j+1;//for username next
			break;
		}
	}

 	$which_file = $username .$j .".txt";
 	//echo $which_file;
 	//echo "<br>";
 	//echo $which_file;//choose to select cloth from which tyep
 	//--choose the cloth from this type
 	$cloth_line = shell_exec("cd users ; cat $which_file | wc -l");
 	for($j=1;$j<=$cloth_line;$j++)//count the total score of cloth 
 	{
	 	$temp=shell_exec("cd users; cat $which_file  | head -$j | tail -1 | tr '\n' ' ' ");
		$temp2 = shell_exec("echo $temp | awk '{print $2}'");
		$cloth_score = $cloth_score + $temp2;
 	}
 	//echo "<br>";
 	//echo $cloth_score;
 	$choose=rand(1,$cloth_score);//choose the clothes by the score
 	//echo "<br> randomnumber = $choose <br>" ;
 	for($j=1;$j<=$cloth_line;$j++)//count the total score of cloth 
 	{
	 	$temp=shell_exec("cd users; cat $which_file  | head -$j | tail -1 | tr '\n' ' ' ");
		$temp2 = shell_exec("echo $temp | awk '{print $2}'");
		$choose = $choose - $temp2;
		if($choose <=0)
		{
			//the cloth we need to return back
			
			$choose_cloth = shell_exec("echo $temp | awk '{print $1}'");
			//echo $choose_cloth;	
			//echo "<br>";
			//echo $choose_cloth;
			/*//echo 63;
			echo $choose_cloth;
			echo "<br>";*/
			//$bottom = shell_exec(" cd ./picture/bottoms;ls | sort -R  | head -1 | sed 's/\.jpg//'");
			if($type==2)//suit up
			{
			$temp = shell_exec("cd users; cat $username9 | sort -R | head -1 | tr '\n' ' ' ");
			$choose_cloth = shell_exec("echo $temp | awk '{print $1}'");
			
			}
			if($type==3)//exercise
			{
			$temp = shell_exec("cd users; cat $username10 | sort -R | head -1 | tr '\n' ' ' ");
			$choose_cloth = shell_exec("echo $temp | awk '{print $1}'");
			
			}
			//$back = $choose_cloth." ".$bottom;
			//echo $back;
			break;
		}
 	}
 	if($type==1)
 	{
 		$bottom = shell_exec("cat style1 | sort -R | head -1 | tr -d '\n' ");
 		$back = $choose_cloth." ".$bottom;
		echo $back;
 	}
	else if($type==2)
	{
		$bottom = shell_exec("cat style2 | sort -R | head -1 | tr -d '\n' ");
		$back = $choose_cloth." ".$bottom;
		echo $back;
	}
	else
	{
		$bottom = shell_exec("cat style3 | sort -R | head -1 | tr -d '\n' ");
		$back = $choose_cloth." ".$bottom;
		echo $back;
	}
 	
 	
 	
 	
 	
 	
 	
}


?>
