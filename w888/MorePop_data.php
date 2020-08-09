<?php
require('inc/function.php');

echo file_get_contents2("http://97.74.233.176/~maxbet/maxbet_th/MorePop_data.php?matchid=".$_GET['matchid']."&Market=L&tag=GetSoccerMore&isparlay=0&_=".rand(111111111111,999999999999));

?>
