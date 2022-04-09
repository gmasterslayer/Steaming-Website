<?php
	$selectedtext = $_POST["selectedtext"];
	$mediatype = $_POST["mediatype"];
	$file_to_read = "movieslist.txt";
	$returnlist = "";
	
	if ($mediatype == "TV Shows"){
		$file_to_read = "tvlist.txt";
	} else if ($mediatype == "Anime") {
		$file_to_read = "animelist.txt";
	}
	
	if ($file = fopen($file_to_read, "r")){
		// the symbol * will be the delimiter
		$selectioncomparer = "";
		$filepath = "";
		$clientsidedirectorytracking = "";
		
		while (! feof($file)){
			$filepath = fgets($file);
			$selectioncomparerarray = explode("\\", $filepath);
			$selectionlocation = "";
			$index = 0;
			$controlflag = 0;
			
			for ($x = 0; $x < count($selectioncomparerarray); $x++){
				
				
				if ($selectioncomparerarray[$x] == $selectedtext){
					
					$index = $x;
					$x = count($selectioncomparerarray);
					
					if ($index < count($selectioncomparerarray) - 1){ //if another directory exists then advance it up
						$index++;
						$selectionlocation = $selectioncomparerarray[$index];
					} else {
						$selectionlocation = $selectioncomparerarray[$index];
					}
					
					//TODO loop forward to look for directories not backwards. this should be solved :)
					
					for ($xxx = 0; $xxx < count(explode("*", $returnlist)); $xxx++) {
						if (explode("*", $returnlist)[$xxx] == $selectionlocation) {
							$controlflag = 1;
						}
					}
					
					if ($controlflag === 0) {
						$returnlist = $returnlist . $selectionlocation . "*";
					}
					
					if ($index - 1 >= 0){
						$clientsidedirectorytracking = "";
						for ($xx = $index - 1; $xx >= 0; $xx--){
							$clientsidedirectorytracking = $selectioncomparerarray[$xx] . '\\' . $clientsidedirectorytracking;
						}
					}
				}
			}
		}
		
		echo $returnlist . $clientsidedirectorytracking;
	}
?>