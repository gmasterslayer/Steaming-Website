<!DOCTYPE html> 
<html> 
<head>
	<title>Movies Site</title>
	<style> 
video {
    position: relative;
    -webkit-animation: myfirst 5s 1; /* Safari 4.0 - 8.0 */
    -webkit-animation-direction: normal; /* Safari 4.0 - 8.0 */
}

/* Safari 4.0 - 8.0 */
@-webkit-keyframes myfirst {
    0%   { left: 000px; top: -1000px;}
    100%  { left: 000px; top: 0px;}
}

	</style>
	 <meta charset="UTF-16"> 
</head>
<body> 

	<div style="height: 70px; padding:20px; text-align:center; background-color:grey;">
		<h1 style>Gary's Movie Player</h1>
	</div>

	<br><br>

	<div style="text-align:center;" id="1">
		<video width="800" autoplay controls >
			<?php
				echo '<source src="' . htmlspecialchars($_POST["movieselection"]) . '" type="video/mp4" id="player">';
			 
	echo		"Your browser does not support HTML5 video.";
	echo '!-->chrome has a bug in it where the . php string combine posts a unicode ufeff character but chrome thinks its text-->';
	echo	"</video>";
	echo "</div>";
		
	
	echo " <div style=\"width:500px; margin:auto; text-align:center;\"><h2>The ability to download is finally here!</h2><a href=\"" . $_POST["movieselection"] . "\" download><button  style=\"height: 50px; font-size: 120%;width:400px; margin:auto; text-align:center;\">Download " . basename($_POST["movieselection"]) . "</button></a></div> ";
	echo "<br>";
	?>
	
	<div style="height: 20px; text-align:center; background-color:grey;" id="2">
		
	</div>

</body> 
	<script>
		//fixes some of the stupid chrome bug
		if (navigator.platform == "Win32"){ //mobile browsers were doing weird shit TODO look into it later.
		var x = document.getElementsByTagName("video");
		var z = document.getElementById("player").src;
		do {
			z = z.replace ('%20' , ' ');
        } while (z.search('%20') != -1)
		z = z.replace("%EF%BB%BF", '');
		x[0].src = z;
		}

	
		//messaging service
	
		var timer = setInterval(ajax_getmessage, 60000);
		var ajax_new_message = false;
		
		function ajax_getmessage() {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var ajax_message = this.responseText;
				
				if (this.responseText != "" && ajax_new_message == false){
					alert(ajax_message);
					ajax_new_message = true;
				} else if (ajax_message == "reset"){
					ajax_new_message = false;
				}
			}
		};
		xhttp.open("GET", "ajax_videomessage.php", true);
		xhttp.send();
		}
		
		if (navigator.platform == "Win32"){
		var watchedtimer = setInterval(watched, 1000);
		}
		
		function setCookie(cname, cvalue, exdays) {
			var d = new Date();
			d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
			var expires = "expires="+d.toUTCString();
			document.cookie = cname + "=" + cvalue + ";" + expires + ';path=..//;';
		}
		
		function watched(){
			window.clearTimeout(watchedtimer);
			
			var showname = x[0].src;
			showname = showname.slice(showname.lastIndexOf('/') + 1, showname.length);
			
			setCookie(showname, "watched", 9999);
		}
		 
	</script>
</html>
