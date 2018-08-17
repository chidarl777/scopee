<?php
$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
if(move_uploaded_file($fileTmpLoc, "test_uploads/$fileName")){
    echo "$fileName upload is complete";

echo'<video width="320" height="240" controls="controls">
  <source src="test_uploads/'.$fileName.'" type="video/mkv"><source src="movie.mp4" type="video/mp4">
  <source src="Pizza Without Oven Recipe By Food Fusion - YouTube" type="video/mkv">
  <source src="movie.webm" type="video/webm">
<object data="movie.mp4" width="320" height="240">
  <embed src="movie.swf" width="320" height="240">
</object> 
Your browser does not support the video tag.
</video>';
} else {
    echo "move_uploaded_file function failed";
}

 
?>