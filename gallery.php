<?php $aid=$_REQUEST['id']; ?>

<!DOCTYPE html>
<html lang="en"> 
<head>

	
	<meta charset="utf-8">
	<title>DotCode - Gallery</title>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	


		
		
		
		<link href="litebox-master/assets/css/litebox.css" rel="stylesheet" type="text/css" media="all" />
		

	<!-- The Menu -->
	<link href="stylesheets/styles.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="pe-icon-7-stroke/css/pe-icon-7-stroke.css">

	<!-- Optional - Adds useful class to manipulate icon font display -->
	<link rel="stylesheet" href="pe-icon-7-stroke/css/helper.css">


	
</head>
<body>



<div class="header">
	 <div class="container">
		 <div class="logo">
			 <a href="index.php"><h2>&lt;DOTCODE&gt;</h2></a>
		 </div>
		 <div class="top-menu">
				<span class="menu"> </span>
				<ul>
					 <li><a href="#.html">HOME</a></li>
					 <li><a href="#.html">ABOUT US</a></li>
					 <li class="active"><a href="index.php">GALLERY</a></li>					
					 <li><a href="#.html">BLOG</a></li>					 
					 <li><a href="#.html">CONTACT</a></li>
                     <li>|</li>		
                     <li><a href="admin/login.php">Admin panel</a></li>			 
				 </ul>
		 </div>
		 <div class="clearfix"></div>
			 <!--script-nav-->
		 <script>
		 $("span.menu").click(function(){
		 $(".top-menu ul").slideToggle("slow" , function(){
		 });
		 });
		 </script>		  
	 </div>
</div>		<!-- Blog Section
	================================================== -->
<div class="gallery-head">
	 <div class="gallery-info">
		 <div class="container">
			 <a href="gallery.php">Home/</a>
                       <?php  
include 'connect.php';
$sql = "SELECT * FROM tbl_album where albumid='$aid'";
$rs_result = $con->query($sql);



		
####### Fetch Results From Table ########

while ($row = $rs_result->fetch_assoc()) 
{
$aimage=$row['image'];
$aname=$row['name'];
$adesc=$row['adesc'];
$astatus=$row['status'];

?>
				<h2>
				<?php echo "$aname"; ?> 
				</h2>
            
             
           			 
		 </div>		 
	 </div>
	 <div class="gallery-text">
		 
	 </div>

		<div class="container">
			<div class="one-whole text-center">
            
            <p><?php echo "$adesc"; ?></p>
				<?php } ?>
                <hr style="border:solid 1px;margin-top:0px;">
<p style="margin-left:75px">
				<?php  
		include "connect.php";

$sql = "SELECT * FROM tbl_gallery where aid=$aid and status='process'";
$num_rows = mysqli_num_rows(mysqli_query($con,$sql));		
####### Fetch Results From Table ########

$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result))
{
$gimage=$row['gimages'];

?>	
	
<?php	echo "<a href='admin/gupload/$gimage' target='_self' class='inline-block litebox' data-litebox-group='group-1'><img src='admin/gcatch/$gimage' class='inline-block' /></a> ";?>			
<?php } ?>				
</p>
				
</div>			
</div>
<div class="clearfix"></div>
</div>	
</div>	





	
	<!-- Bottom Footer Section
	================================================== -->
<div class="bottom_footer_section">
	<div class="container">
	<div class="sixteen columns bottom_line_dev">	
		
<br/><br/>		
<hr style="border:solid 1px;margin-top:0px">
<br/>
<br/>
<br/>
		</div>	
        
	</div>	
</div>	


	<!-- Primary Page Layout
	================================================== -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script src="litebox-master/assets/js/smoothscroll.min.js" type="text/javascript"></script>
		<script src="litebox-master/assets/js/images-loaded.min.js" type="text/javascript"></script>
		<script src="litebox-master/assets/js/tipsy.min.js" type="text/javascript"></script>
		<script src="litebox-master/assets/js/backbone.js" type="text/javascript"></script>
		<script src="litebox-master/assets/js/litebox.min.js" type="text/javascript"></script>

		<script type="text/javascript">
			$('.litebox').liteBox();
		</script>
	
<!-- JavaScript
	================================================== -->
	<script src="js/jquery-main.js" type="text/javascript"></script>
	<script type='text/javascript' src="js/jquery-latest.min.js"></script>
	<script type='text/javascript' src='js/menu_jquery.js'></script>
	<script src="js/car/jquery-1.7.2.min.js" type="text/javascript"></script> <!-- jQuery -->
    <script src="js/car/jquery.easing.1.3.js" type="text/javascript"></script> <!-- jQuery easing -->
    <script src="js/car/custom.js" type="text/javascript"></script> <!-- jQuery initialization -->
	<script src="js/ticker.js" type="text/javascript"></script>
	<script type='text/javascript' src='js/jquery.common.min.js'></script>


<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = '../../apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>



<!-- End Document
================================================== -->
</body>

</html>