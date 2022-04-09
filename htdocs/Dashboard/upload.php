<!doctype html>
<html>
	<head>
		<title>Movie Upload</title>
	</head>
	<body>
	
		<?php
			global $target_dir, $target_file;
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$file_to_write = "movieslist.txt";
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			
			if ($_POST["mediatype"] == "TVShow"){
				$target_dir = "TV Shows/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$file_to_write = "tvlist.txt";
			} else if ($_POST["mediatype"] == "Anime") {
				$target_dir = "Anime/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$file_to_write = "animelist.txt";
			}
			echo $_FILES[0][0];
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
				echo $_FILES[0];
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				
				if($check == false) {
					//echo "File is a movie - " . $check["mime"] . ".<br>"; checks for an image but i dont know how to change
					$uploadOk = 1;
				} else {
					echo "File is not a " . $target_dir . "<br>";
					$uploadOk = 0;
				}
			}
			// Check if file already exists
			if (file_exists($target_file)) {
				echo $target_dir . " already exists.<br>";
				$uploadOk = 0;
			} 
					
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 5368709120) {
				echo "Your " . $target_dir . "is too large.<br>";
				$uploadOk = 0;
			}
			
			// Allow certain file formats
			if($imageFileType != "mp4" && $imageFileType != "mkv" && $imageFileType != "avi" && $imageFileType != "m4v"
			&& $imageFileType != "avi") {
					echo "Only mp4, mkv, m4v, and avi" . $target_dir . "are allowed.<br>";
					$uploadOk = 0;
			} 
			
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your" . $target_dir . "was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					echo "The movie, ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br>";
					update($target_file, $file_to_write);
					echo "Repository updated. You can now watch the" . $target_dir . "from the selection list";

				} else {
					echo "Sorry, there was an error uploading your " . $target_dir . "<br>";
				}
			}
			
			function update($target_file, $file_to_write){
				
				if ($file = fopen($file_to_write,"a+")){
					echo "<!-- Found the file -->";
				}
				fwrite($file, "\n");
				fwrite($file, $target_file);
				fclose($file);
			}
		?>

		<a href="https://192.168.43.169"><p>Return to homepage</p></a>
	</body>
</html>