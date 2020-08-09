<?php
 require('inc_head_bySession.php');

if(empty($_POST["gametype"])) 
{

	require('outStanding/outStandingNewSearch_byType.php');

}else if($_POST["gametype"] != "")  
{
	if($_POST["user_type"] == "A") 
	{
		require('outStanding/outStandingNewSearch_byAgent.php');

	}else if($_POST["user_type"] == "M")
	{
		require('outStanding/outStandingNewSearch_byMember_'.$_POST["gametype"].'.php');
	} 	
}

echo json_encode($data);

		




  ?>
