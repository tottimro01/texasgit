<?php   ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
echo $b_date=date("d-m-Y" , strtotime("-1 day"));
?>