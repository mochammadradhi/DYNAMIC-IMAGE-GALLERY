<?php
$ab=$_POST['gname'];

echo $ab;
header( "Location:viewsgimages.php?ids=$ab" );
?>