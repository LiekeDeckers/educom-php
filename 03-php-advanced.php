<!DOCTYPE html>
<html> 
    <body>

<?php
// Date and time
echo "Today is " . date("d/m/Y") . "<br>";
echo "The time is " . date("h:i:sa") . "<br>";

$d = mktime(11, 14, 54, 8, 12, 2023);
echo "The created date is ". date("d/m/Y", $d) . "<br>";

$d=strtotime("next Saturday");
echo date("d-m-Y h:i:sa", $d) . "<br>";
?>

// Include files
<p> Inlcude the file called 'footer.php':</p>
<?php include 'footer.php';?>

// File handling
<?php echo readfile("webdictionary.txt") ?>

<?php
$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("webdictionary.txt"));
fclose($myfile);

$myfile = fopen("testfile.txt", "w")
?>

// File upload
<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

<?php
$target_dir = "uploads/";
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

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
?>

<?php
// Cookies


?>





</body>
</html>
