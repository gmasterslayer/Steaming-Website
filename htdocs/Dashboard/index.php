<!DOCTYPE html> 
<html> 
<head>
	<title>Gary's Movie Site</title>
	<style>
		.watchselect {
			text-align:center;
			width:50%;
		}
		
		#instructions {
			-webkit-animation: thirda 0s infinite;
			position: relative;
		    -webkit-animation-direction: alternate; /* Safari 4.0 - 8.0 */
		}
		
		.second	{
			-webkit-animation: seconda 5s 1; /* Safari 4.0 - 8.0 */
			-webkit-animation-direction: normal; /* Safari 4.0 - 8.0 */
		}
		
		.third {
			-webkit-animation: thirda 5s 1; /* Safari 4.0 - 8.0 */
			-webkit-animation-direction: normal; /* Safari 4.0 - 8.0 */
		}
		
		/* Safari 4.0 - 8.0 */
		@-webkit-keyframes seconda {
		0%   {color: white; left: 000px; top: 00px;}
		100%  {color: black; left: 000px; top: 0px;}
		}

		/* Safari 4.0 - 8.0 */
		@-webkit-keyframes thirda {
		0%   {color: white; left: 000px; top: 00px;}
		100%  {color: black; left: 000px; top: 0px;}
		}
}
	</style>
</head>
<body> 

	<div style="width: 0px; height: 0px;" id="overlay">
		<h1 style="font-size: 0px;" id="overlaytext">Upload In Progress</h1>
	</div>
	
	<div class="first" id="header" style="padding:20px; text-align:center; background-color:grey;">
		<h1 style>Gary's Movie Site</h1>
	</div>

	<br><br>

	<div id="labeling" style="padding:1px; text-align:center; background-color:grey;">
		<h1 >Watch</h1>
	</div>
	
	
	<h3 style="text-align:center"> Movies </h3>

	<div style="text-align:center;" id="1">
		<form action="video.php" method="post">
			<select class="watchselect" id="selectionbox" name="movieselection" onchange="watchedremove(0, false)">
		<?php
			if ($file = fopen("movieslist.txt","r")){
					echo "<!-- Found the file -->";
				}
		$returnlist = "";
		$selectioncomparer = "";
		$filepath = "";
		$selectedtext = "Movies";
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
						echo $returnlist;
						$returnlist = $returnlist . $selectionlocation . "*";
					}
					
				}
			}
		}
		
		for ($co = 0; $co < count(explode("*", $returnlist)); $co++){
			echo "<option value=\"\\dashboard\\Movies\\" . explode("*", $returnlist)[$co] . "\">" . explode("*", $returnlist)[$co] . "</option>";
		}
		

			fclose($file);
		?> 
			</select> 
			<br><br>
			
		<div style="text-align:center;" id="1">
			<input class="watchselectsubmit" type="submit" onclick="watchedremove(0, true)" value="Watch">
		</div>
		</form>
	</div>
	
	
	<h3 style="text-align:center"> TV Shows </h3>
	
	<div  style="text-align:center;" id="1-2">
		<form action="video.php" method="post">
			<select class="watchselect" id="selectionbox" name="movieselection" onchange="watchedremove(1, false)">
		<?php
			if ($file = fopen("tvlist.txt","r")){
					echo "<!-- Found the file -->";
				}
		$returnlist = "";
		$selectioncomparer = "";
		$filepath = "";
		$selectedtext = "TV Shows";
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
						echo $returnlist;
						$returnlist = $returnlist . $selectionlocation . "*";
					}
					
				}
			}
		}
		
		for ($co = 0; $co < count(explode("*", $returnlist)); $co++){
			echo "<option value=\"\\dashboard\\TV Shows\\" . explode("*", $returnlist[$co]) . "\">" . explode("*", $returnlist)[$co] . "</option>";
		}
		

			fclose($file);
		?>
			</select> 
			<br><br>
			
		<div style="text-align:center;" id="1">
			<input class="watchselectsubmit" type="submit" onclick="watchedremove(1, true)" value="Watch">
		</div>
		</form>
	</div>
	
	<h3 style="text-align:center"> Anime </h3>
	
	<div  style="text-align:center;" id="1-2">
		<form  action="video.php" method="post">
			<select class="watchselect" id="selectionbox" name="movieselection" onchange="watchedremove(2, false)">
		<?php
			if ($file = fopen("animelist.txt","r")){
					echo "<!-- Found the file -->";
				}
		$returnlist = "";
		$selectioncomparer = "";
		$filepath = "";
		$selectedtext = "Anime";
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
						echo $returnlist;
						$returnlist = $returnlist . $selectionlocation . "*";
					}
					
				}
			}
		}
		
		for ($co = 0; $co < count(explode("*", $returnlist)); $co++){
			echo "<option value=\"\\dashboard\\Anime\\" . explode("*", $returnlist[$co]) . "\">" . explode("*", $returnlist)[$co] . "</option>";
		}
		

			fclose($file);
		?>
			</select> 
			<br><br>
			
		<div style="text-align:center;" id="1">
			<input class="watchselectsubmit" type="submit" onclick="watchedremove(2, true)" value="Watch">
		</div>
		</form>
	</div>
		
	<br><br>
		
	<div class="second" id="labeling" style="padding:1px; text-align:center; background-color:grey;">
		<h1>Or Upload</h1>
	</div>
	
	<br>
	
	<div class="third" style="text-align:center;" id="">
		<p id="instructions">The upload screen still isn't perfect, but i'm out of time.</p>
		
		<br>
	
		<form method="post" action="upload.php" enctype="multipart/form-data">
			Select media to upload:
			<input type="file" name="fileToUpload" id="fileToUpload">
			<br><br>
			Select media type:
			<select name="mediatype" id="mediatype">
				<option value="Movie">Movie</option>
				<option value="TVShow">TV Show</option>
				<option value="Anime">Anime</option>
			</select>
			<input type="submit" onclick="overlay()"  value="Upload" name="submit">
		</form>
		
	</div>
	
	<p id="status"></p>

		<script>
	document.getElementById("status").innerHTML = navigator.platform;
	
	function watchedremove(selectiontype, submitting){
		var x = document.getElementsByTagName("option");
		
		for (var i = 0; i < x.length; i++) {
			if (x[i].outerHTML.includes(" watched", 0)){
				x[i] = x[i].outterHTML.replace(" watched","");
			}
			
		}
		
		if (submitting === false){
			getselectedtext(selectiontype);
		}
	}
	
	function getselectedtext(selectiontype){
		var selectedtext = document.getElementsByTagName("select")[selectiontype].selectedOptions[0].innerText;
		
		if (!selectedtext.includes(".mp4") && !selectedtext.includes(".avi") && !selectedtext.includes(".m4v") && !selectedtext.includes(".mkv")){
			selectedtext = selectedtext.replace("\n", "");
			ajax_messaging(selectedtext, selectiontype);
		}
	}
	
	function ajax_messaging(selectedtext, selectiontype) {
		var mediatype = "";
		
		switch (selectiontype) {
			case 0:
				mediatype = "Movie";
				break;
				
			case 1:
				mediatype = "TV Shows";
				break;
			
			case 2:
				mediatype = "Anime";
				break;
				
			default:
				mediatype = "ERROR";
		}
		
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		
			if (this.readyState == 4 && this.status == 200) {
				var ajax_message = this.responseText;
				repopulateoptions(ajax_message, selectiontype);
			}
		};
	
		xhttp.open("POST", "ajax_indexfoldersworker.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("selectedtext=" + selectedtext + "&mediatype=" + mediatype); 
	
	}
	
	function repopulateoptions(newoptionslist, selectiontype){
		var x = document.getElementsByTagName("select")[selectiontype];
		var z = x.getElementsByTagName("option");
		var entries = z.length;
			
		for (var count = entries - 1; count >= 0; count--){
			x.removeChild(z[count]);
		}
		
		var newoptionslistsplit = newoptionslist.split("*");
		
		x.appendChild(document.createElement("option"));
		x[0].innerText = "No Selection\n";
		
		for (var count = 1; count < newoptionslistsplit.length + 1; count++){ //minus one because of the blank element on the end of the array for some reason...
		
			if (count == newoptionslistsplit.length){
				var dir = newoptionslistsplit[count - 1].split("\\");
				x.appendChild(document.createElement("option"));
				
				if (dir.length - 3 >= 0){
					x[count].innerText += dir[dir.length - 3] + "\n";
				} else {
					x[count].innerText += dir[dir.length - 2] + "\n";
				}
				
			} else {
				x.appendChild(document.createElement("option"));
				x[count].value = "\\dashboard" + "\\" + newoptionslistsplit[newoptionslistsplit.length - 1] + newoptionslistsplit[count - 1] ;
				x[count].innerText = newoptionslistsplit[count - 1] + "\n";
			}

		}

	}
	
	if (navigator.platform != "Win32"){
		phonescreenadjust();
	}
	
	function phonescreenoverlayadjust(){
		document.getElementById("overlay").style
	}
		
	function phonescreenadjust(){
		var elementclasslist = ["watchselect", "watchselectsubmit"];
		var adjustbuttonlandscape = [screen.height * .1, screen.width * .15]; //landscape button
		var adjustselectionlandscape = [screen.height * .15, screen.width * 1];
		var adjustbuttonportrait = [screen.height * .1, screen.width * .3]; //portrait button
		var adjustselectionportrait = [screen.height * .1, screen.width * 2.25];
		
		document.getElementById("header").style = "margin:auto; padding-top:10px; padding-bottom:10px; text-align:center; background-color:grey; width:" + "px;";
		
		if (navigator.platform != "Win32" && screen.height < screen.width){ //phone screen is landscape
			for (var i = 0; i < document.getElementsByClassName(elementclasslist[1]).length; i++) {
				document.getElementsByClassName(elementclasslist[1])[i].style = "height:" + adjustbuttonlandscape[0] + "px;" + "width:" + adjustbuttonlandscape[1]  + "px;";
			}
			
			for (var i = 0; i < document.getElementsByClassName(elementclasslist[0]).length; i++) {
				document.getElementsByClassName(elementclasslist[0])[i].style = "height: " + adjustselectionlandscape[0] + "px; " + "width:" + adjustselectionlandscape[1] + "px;";
			}
		} else if (navigator.platform != "Win32" && screen.height > screen.width) { //phone screen is portrait
			for (var i = 0; i < document.getElementsByClassName(elementclasslist[1]).length; i++) {
				document.getElementsByClassName(elementclasslist[1])[i].style = "height:" + adjustbuttonportrait[0] + "px;" + "width:" + adjustbuttonportrait[1]  + "px; font-size: 150%";
			}
			
			for (var i = 0; i < document.getElementsByClassName(elementclasslist[0]).length; i++) {
				document.getElementsByClassName(elementclasslist[0])[i].style = "height: " + adjustselectionportrait[0] + "px; " + "width:" + adjustselectionportrait[1] + "px; font-size: 150%";
			}
		} else { //desktop
			adjust -= 100;
		}
		
	}
		
	function overlay(){
		var elementlist = ["div", "form", "br", "input", "p", "h1", "h3", "select", "option"];
		var elementremoved = false;
		do{
			elementremoved = false;
		for (var i = 0; i < elementlist.length; i++){
			var foundelements = document.getElementsByTagName(elementlist[i]);
			for (var o = 0; o < foundelements.length; o++) {

				if (foundelements[o].id != "overlay" && foundelements[o].id != "overlaytext" && foundelements[o].id != "nodestroy"){
					foundelements[o].visible = true;
					elementremoved = true;
					//ok so this was stupid and is why I hate javascript variables. When you remove an element from the foundelements array, 
					//it turns out that it also removes it from the array. This causes the entire array to shift its index, which causes the loop
					//to make unexpected and confusing jumps. To fix this I have to run the entire loop multiple times because the array wont
					//hold its index properly.
				}	
			}
			elementremoved = false;
		}
		} while (elementremoved)
		
		var adjust = screen.height / 2;
		var isphone = false;
		
		if(navigator.platform != "Win32"){
			isphone = true;
		}
		
		if (navigator.platform != "Win32" && screen.height < screen.width){ //phone screen is landscape
			adjust -= 25;
		} else if (navigator.platform != "Win32" && screen.height > screen.width) { //phone screen is portrait
			adjust *= 2;
			adjust -= 100;
		} else { //desktop
			adjust -= 100;
		}
		
		//document.getElementById("overlay").style = " z-index: 500; height: 100px; text-align: center; margin-top:" + adjust + "px;";
		document.getElementById("overlay").style = "position:absolute; background-color: white; z-index:500; height: " + 100 + "%; width: " + (100 ) + "%;";

		//css offically makes me mad. screen.height gets the total screen height resolution. The phone seems to draw
		//starting from the top of the text while the laptop draws from the top of the div and the text is drwan in the middle. On my laptop, it draws differently than on 
		//my phone. My phone draws differently depending on whether it is rotated or not. TODO come up with the adjustment algorithims for
		//my phone rotation states. The above only works for desktop. :(
		document.getElementById("overlaytext").style = " margin-top:" + adjust + "px;";
		document.getElementsByTagName("body")[0].style = "overflow: hidden;";
		overlaytextanimation(adjust, isphone);
	}
	
	function overlaytextanimation(adjust, phone) {
	var elem = document.getElementById("overlaytext");
	var pos = 100;
	var switcher = 1;
	var id = setInterval(frame, 5);
	function frame() {
		if (pos < 350 && switcher == 1) {
			pos++;
			if (pos == 350)
				switcher = 0;
		} else if (pos > 100 && switcher == 0) {
			pos--; 
			if (pos == 100)
				switcher = 1
		}
		if (phone){
			elem.style = " margin-top:" + adjust + "px; font-size: " + pos + "%; padding-left: " + ((screen.height / 2 - pos / 2) / screen.height * 100) + "%;";
		}
		elem.style = " margin-top:" + adjust + "px; font-size: " + pos + "%; padding-left: " + ((screen.width / 2 - pos / 2) / screen.width * 100) + "%;"; 
		}
	}
	
	var options = document.getElementsByTagName("option");
	
	for (var i = 0; i > options.length; i++){
		options[i].innerText.slice(0,options[i].innerText.lastIndexOf('\n'));
	}
	
	
	function getCookie(cname) {
		var name = cname + "=";
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for(var i = 0; i <ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return "";
	}
		
	</script> 
</body> 

</html>
