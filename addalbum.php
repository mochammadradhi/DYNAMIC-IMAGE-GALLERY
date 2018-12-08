<?php session_start();
if(isset($_SESSION['uname']))
{
?>
<?php include "header1.php"; ?>
<?php include "menu/amenu1.php"; ?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Album</h1>
                </div>
                
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <script type="application/javascript">
function img_up(){var fup = document.getElementById('upload');var fileName = fup.value;var ext = fileName.substring(fileName.lastIndexOf('.') + 1);if(ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG"){return true;}else{alert("only jpeg format supported!");fup.focus();return false;}}</script>
<?php
if(isset($_POST['submit']))
{
$aname = $_POST['aname'];
$adesc = $_POST['adesc'];
$adate = date('Y-m-d H:i:s');
$status='process';
$rd=rand();

$uploadedfile = $_FILES['upload']['tmp_name'];

$src = @imagecreatefromjpeg($uploadedfile);

list($width,$height)=@getimagesize($uploadedfile);


$newwidth=290;
$newheight=($height/$width)*300;
$tmp=@imagecreatetruecolor($newwidth,$newheight);

@imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

$filename = "acatch/".$rd. $_FILES['upload']['name'];
@imagejpeg($tmp,$filename,100);

@imagedestroy($src);
@imagedestroy($tmp); 
$photo=$rd.$_FILES['upload']['name'];
move_uploaded_file($_FILES["upload"]["tmp_name"],"aupload/".$rd.$_FILES["upload"]["name"]);

if (empty($aname))
{
 echo " <div class='alert alert-danger'><strong>ERROR</strong> - Empty fields are not allowed !</div>"; 
 }
else
{
include "connect.php";

$query="INSERT INTO tbl_album(name,adesc,image,date,status) VALUES ('$aname','$adesc','$photo','$adate','$status')";
if(mysqli_query($con,$query))
	{
echo " <div class='alert alert-success'>Your New Album Is Successfully Added. <a href='viewallalbums.php'>View albums</a> |<a href='addevent.php'> Add new album</a></div>";
	}
	else
	{
		echo "error";
		print mysql_error();
	}

// echo "<script>location.href='addevent.php </script";
   }
}	
?>

            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Fill This Form To Add Album (Only upload jpg files only)
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="#" method="post" enctype="multipart/form-data" name="upload">
                                       
                                        <div class="form-group">
                                            <label>Album Name or Title</label>
                                            <input class="form-control" placeholder="Enter Title" name="aname">
                                                <p class="help-block">Example "Sunset pics"</p>
                                        
                                        </div>
                                        <div class="form-group">
                                        
                                            <label>Event Description</label>
                                             <p class="help-block" style="font-weight:bold">Max 1000 Character Allow </p>
                                             <textarea class="form-control" rows="3" placeholder="Enter Description" name="adesc" maxlength="1000"></textarea>
                                            
                                               
                                        
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Album Image</label>
                                            <input type="file" name="upload"  id="upload" />
                
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
