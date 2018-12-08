<?php
$ab=$_POST['gname'];

echo $ab;
header( "Location:addgimages.php?id=$ab" );
?>