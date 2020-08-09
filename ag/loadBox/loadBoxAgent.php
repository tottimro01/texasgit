<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

 

header('Content-type: application/json');

 if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
  }



require('../inc/conn.php');
require('../inc/function.php');

require('../lang/ag_lang.php');
require('../lang/function_array.php');


if($_POST["type"] == "sport")
{
    require('loadBoxAgent_sport.php');

}else if($_POST["type"] == "step")
{
   require('loadBoxAgent_step.php');

}else if($_POST["type"] == "boxing")
{
   require('loadBoxAgent_boxing.php');

}else if($_POST["type"] == "casino")
{   
    require('loadBoxAgent_casino.php');

}else if($_POST["type"] == "game")
{
    require('loadBoxAgent_game.php');     

}else if($_POST["type"] == "lotto")
{
    require('loadBoxAgent_lotto.php');
    
}else if($_POST["type"] == "lottoSet")
{
    require('loadBoxAgent_lottoSet.php');

}else if($_POST["type"] == "lottoLao")
{
    require('loadBoxAgent_lottoLao.php');

}else if($_POST["type"] == "soccer")
{
    require('loadBoxAgent_soccer.php');
}

?>