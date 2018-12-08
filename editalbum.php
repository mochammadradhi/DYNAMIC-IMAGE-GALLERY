<?php session_start();
if(isset($_SESSION['uname']))
{
?>
<?php include "header1.php"; ?>
<?php include "menu/amenu2.php"; ?>
<?php 
$mykey1=$_REQUEST['key0'];
$mykey2=$_REQUEST['key1'];
$mykey3=$_REQUEST['key2'];
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update Album</h1>
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
$aname = $_POST['aname'];
$adesc = $_POST['adesc'];
$adate = date('Y-m-d H:i:s');
$status='progress';
// This is the temporary file created by PHP
if (empty($aname))

{
 echo " <div class='alert alert-danger'><strong>ERROR</strong> - Empty fields are not allowed !</div>"; 
 
}
else
{

include "connect.php";

mysqli_query($con,"update tbl_album set name='$aname',adesc='$adesc' where albumid = '$mykey1'");
echo "<script>location.href='viewallalbums.php'</script>";
//echo " <div class='alert alert-success'>Your New Event Is Successfully Added. <a href='viewallevents.php'>View events</a> |<a href='addevent.php'> Add new events</a></div>";

}
}	
?>

            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Fill This Form To Add Album
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="#" method="post" enctype="multipart/form-data" name="upload">
                                       
                                        <div class="form-group">
                                            <label>Album Name or Title</label>
                                            <input class="form-control" placeholder="Enter Title" name="aname" value="<? echo $mykey2 ?>">
                                                <p class="help-block">Example "Friendship day"</p>
                                        
                                        </div>
                                       <div class="form-group">
                                        
                                            <label>Event Description</label>
                                             <p class="help-block" style="font-weight:bold">Max 1000 Character Allow </p>
                                             <textarea class="form-control" rows="3" placeholder="Enter Description" name="adesc" maxlength="1000"><? echo $mykey3 ?></textarea>
                                            
                                               
                                        
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
