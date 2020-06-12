<?php 

//sample data with unique id upto 20 records
	$N=20;
	echo "SNo.=>Unique Id\n";
	for($i=1; $i<=$N; $i++){
		$c = uniqid (rand (),true);
		$md5c = md5($c); 
		echo $i."=>".$md5c."\n";
	}

?>