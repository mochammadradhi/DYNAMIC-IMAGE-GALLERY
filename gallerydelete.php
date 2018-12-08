<?php

$mykey1=$_REQUEST['key1'];
$mykey2=$_REQUEST['key2'];
$status='delete';

include 'connect.php';
mysqli_query($con,"update tbl_gallery set status='$status' where gid = '$mykey1'");
echo "<script>location.href='viewsgimages.php?ids=$mykey2'</script>"

?> 