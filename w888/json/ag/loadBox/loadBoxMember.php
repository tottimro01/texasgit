<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
header('Content-type: application/json');

 if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
  }

require('../inc/conn.php');
require('../inc/function.php');

require('../lang/ag_'.$_SESSION["AGlang"].'.php');
require('../../lang/function_'.$_SESSION["AGlang"].'_new.php');


if($_POST["type"] == "sport")
{
    require('loadBoxMember_sport.php');

}else if($_POST["type"] == "step")
{
    require('loadBoxMember_step.php');
  
}else if($_POST["type"] == "boxing")
{
    require('loadBoxMember_boxing.php');
	
}else if($_POST["type"] == "casino")
{	
    require('loadBoxMember_casino.php');

}else if($_POST["type"] == "game")
{
    require('loadBoxMember_game.php');

}else if($_POST["type"] == "lotto")
{
    require('loadBoxMember_lotto.php');

}else if($_POST["type"] == "lottoSet")
{
    require('loadBoxMember_lottoSet.php');

}else if($_POST["type"] == "lottoLao")
{
    require('loadBoxMember_lottoLao.php');

}else if($_POST["type"] == "soccer")
{
     require('loadBoxMember_soccer.php');
}

 ?>