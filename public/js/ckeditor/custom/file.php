<?php
$target_dir = $_SERVER['DOCUMENT_ROOT']."/sust/database_project/public/uploads/";
$target_file = $target_dir . basename($_FILES["upload"]["name"]);

if (file_exists($target_file))
{
 echo "Please Change the File Name,Close this Panel, then Open the Panel Again and Upload";
 echo "<script>alert('Please Change the File Name,Close this Panel, then Open the Panel Again and Upload');</script>";
}
else
{
/* move_uploaded_file($_FILES["upload"]["tmp_name"],
 "http://localhost/sust/database_project/public/uploads/" . $_FILES["upload"]["name"]);
 echo "Stored in: " . "uploads/" . $_FILES["upload"]["name"];
 */
 
 if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["upload"]["name"]). " has been uploaded.";
		 echo "<script>alert('File Upload Done');</script>";

 } else {
        echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
 }
 
 $funcNum = $_GET['CKEditorFuncNum'] ;
// Optional: instance name (might be used to load a specific configuration file or anything else).
$CKEditor = $_GET['CKEditor'] ;
// Optional: might be used to provide localized messages.
$langCode = $_GET['langCode'] ;
 
// Check the $_FILES array and save the file. Assign the correct path to a variable ($url).
$url = 'http://localhost/sust/database_project/public/uploads/'.basename($_FILES["upload"]["name"]);
// Usually you will only assign something here if the file could not be uploaded.
$message = '';
 
echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";

}

?>