<?php
	$file = fopen("ajax_videomessage.txt","r");
	$message = "";
	
	while(! feof($file))
		{
			$message = fgets($file);
		}
	
	echo $message;
?>