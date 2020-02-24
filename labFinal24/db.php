<?php 

session_start();





 ?>
<?php
$target_dir = "D:/Pro/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}











?>

<?php
$serverName="localhost";
$username="root";
$password="";
$databaseName="mydatabase";

function executeNonQuery($query)
{
	global $serverName,$username,$password,$databaseName;
	$result=false;
	$connection=mysqli_connect($serverName,$username,$password,$databaseName);
	if($connection)
		{
    		$result=mysqli_query($connection,$query);
		}
	return $result;
}


?>

<?php

$query="INSERT INTO Registration(name,email,gender,password,File)VALUES('$_SESSION[Name]','$_SESSION[Email]','$_SESSION[Gender]','$_SESSION[Password]',$target_file)";
 executeNonQuery($query);

print_r($_SESSION);
		echo "<img src=$target_file>";
		$dd="../../../../";

?>
