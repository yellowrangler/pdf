<?php

$filename = $_FILES["filename"]["name"];

if (file_exists("files/uploads/" . $_FILES["filename"]["name"]))
{
	// log later
}

move_uploaded_file($_FILES["filename"]["tmp_name"], "files/uploads/" . $_FILES["filename"]["name"]);
// echo "Stored in: " . "files/" . $_FILES["file"]["name"];

echo $filename;
?>