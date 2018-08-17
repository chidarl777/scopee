<?php
$editData = $_FILE['data'];
move_uploaded_file($editData,'');
 
// Add your validation and save data to database
 
echo $editData;
?>
