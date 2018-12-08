<?php session_start();
if(isset($_SESSION['uname']))
{
?>

<?php include "header1.php"; ?>
<?php include "menu/gmenu.php"; ?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Gallery</h1>
                </div>
                
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php
		
		if(isset($_POST['submit']))
{
$ename = $_POST['gname'];
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
                                    <form action="glink.php" method="post" enctype="multipart/form-data" name="upload">
                                       
                                        <div class="form-group">
                                            <label>Select Event Name or Title</label>
                           <?php
			include"connect.php";
			$sql = "select * from tbl_album where status='process'";
$rs_result = mysqli_query ($con,$sql);
echo "<select class='form-control' name='gname'>";
while ($row = mysqli_fetch_assoc($rs_result)) {


echo "<option value=$row[albumid]>$row[name]</option>";
                                        };
										echo "</select>";
										
										?>
                                        </div>
                                                                                
                                        <button type="submit" class="btn btn-primary" name="submit">Go Next</button>
                                        
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
