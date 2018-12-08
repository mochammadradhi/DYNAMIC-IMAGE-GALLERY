<?php session_start();
if(isset($_SESSION['uname']))
{
?>
<?php include "header1.php"; ?>
<?php include "menu/menu3.php"; ?>
<?php 
$mykey1=$_REQUEST['key0'];
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update Image</h1>
                </div>
                
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <script type="application/javascript">
function img_up(){var fup = document.getElementById('upload');var fileName = fup.value;var ext = fileName.substring(fileName.lastIndexOf('.') + 1);if(ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext== "PNG" ||  ext=="png"){return true;}else{alert("Image format not supported!");fup.focus();return false;}}</script>
<?php
//echo $user;
if(isset($_POST['submit']))
{



// This is the temporary file created by PHP
$uploadedfile = $_FILES['upload']['tmp_name'];
// Create an Image from it so we can do the resize
$src = imagecreatefromjpeg($uploadedfile);

// Capture the original size of the uploaded image
list($width,$height)=getimagesize($uploadedfile);

// For our purposes, I have resized the image to be
// 600 pixels wide, and maintain the original aspect
// ratio. This prevents the image from being "stretched"
// or "squashed". If you prefer some max width other than
// 600, simply change the $newwidth variable
$newwidth=300;
$newheight=($height/$width)*300;
$tmp=imagecreatetruecolor($newwidth,$newheight);

// this line actually does the image resizing, copying from the original
// image into the $tmp image
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

// now write the resized image to disk. I have assumed that you want the
// resized, uploaded image file to reside in the ./images subdirectory.
$filename = "ecatch/". $_FILES['upload']['name'];
imagejpeg($tmp,$filename,100);
imagedestroy($src);
imagedestroy($tmp); // NOTE: PHP will clean up the temp file it created when the request
// has completed.
	$photo=$_FILES['upload']['name'];
	move_uploaded_file($_FILES["upload"]["tmp_name"],"eupload/".$_FILES["upload"]["name"]);


include "connect.php";

mysqli_queryi($con,"update tbl_events set images='$photo' where eventid = '$mykey1'");
echo "<script>location.href='viewallevents.php'</script>";
//echo " <div class='alert alert-success'>Your New Event Is Successfully Added. <a href='viewallevents.php'>View events</a> |<a href='addevent.php'> Add new events</a></div>";
}
	
?>

            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Fill This Form To Add Event
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="#" method="post" enctype="multipart/form-data" name="upload">
                                       
                                      <div class="form-group">
                                            <label>Event Image</label>
                                            <input type="file" name="upload"  id="upload"/>
                
                                            <p class="help-block">Example "Recomended Image Size in pixel 400 X 300"</p>
                                        </div>
                                       
                                       
                                        
                                        <button type="submit" class="btn btn-primary" name="submit">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
<?php
}
else
{
header("location:login.php");
}
?>
</body>
</html>