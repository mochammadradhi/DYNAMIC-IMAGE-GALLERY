<?php session_start();
if(isset($_SESSION['uname']))
{
?>
<?php include "header1.php"; ?>
<?php include "menu/gmenu2.php"; ?>
<?php $agid=$_REQUEST['id']; ?>
<?php
include"connect.php";
$sql = "select * from tbl_album where albumid='$agid'";
$rs_result = mysqli_query ($con,$sql);
?>
<?php
while ($row = mysqli_fetch_assoc($rs_result)) {
?>
<?php $aname=$row["name"]; ?>
<?php };?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Gallery</h1>
                </div>
                
                <!-- /.col-lg-12 -->
            </div>
           

<?php
$gid=$agid;
$gname=$aname;
$gdate = date('Y-m-d H:i:s');
$status='process';
include"connect.php";
$rd=rand();
if(isset($_FILES['upload1'])){
    $errors= array();
	foreach($_FILES['upload1']['tmp_name'] as $key => $tmp_name){
		$file_name = $key.$rd.$_FILES['upload1']['name'][$key];
		$file_size =$_FILES['upload1']['size'][$key];
		$file_tmp =$_FILES['upload1']['tmp_name'][$key];
		$file_type=$_FILES['upload1']['type'][$key];	
		
        if($file_size > 2097152){
			$errors[]='File size must be less than 2 MB';
        }	
		
        $desired_dir="gupload";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 'gupload');		
            }
            if(is_dir("$desired_dir/".$file_name)==false){
			
$src = imagecreatefromjpeg($tmp_name);
list($width,$height)=getimagesize($tmp_name);
$newwidth=($width/$height)*150;
$newheight=150;
$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
$rd=rand();
$filename = "gcatch/".$file_name;
imagejpeg($tmp,$filename,100);
imagedestroy($src);
move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else{									// rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;				
            }
			  $query="INSERT into tbl_gallery(`gid`,`aid`,`gname`,`gimages`,`date`,`status`) VALUES('','$gid','$gname','$file_name','$gdate','$status')";
		 mysqli_query($con,$query);			
        }
		else
		{
         
		 print_r($errors);
		
        }
    }
	if(empty($errors)){
	echo " <div class='alert alert-success'>Your Photos Is Successfully Uploded. <a href='viewphotos.php'>View Photos</a> |<a href='addevent.php'> Add new Photos</a></div>";
	
	}
}

	
?>






            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Fill This Form To Add Gallery
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="#" method="post" enctype="multipart/form-data" name="upload">
                                       
                                        
                                        <div class="form-group">
                                            <label>Gallery Image</label>
                                            <input type="file" name="upload1[]" multiple  id="upload" />
                
                                            <p class="help-block">Example "Recomended Image Size in pixel 400 X 300"</p>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary" name="submit">Submit Button</button>
                                        
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
