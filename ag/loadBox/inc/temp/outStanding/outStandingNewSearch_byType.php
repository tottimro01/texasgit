<?php 

$xsum1=array();
$xsum2=array();
$xsum3=array();
$xsum4=array();
$xsum5=array();
$xsum6=array();
$xsum7=array();
$xsum8=array();

$r_level=$_SESSION['r_level']+1;
$ag_level=$_SESSION['r_level'];

include("inc_ag_share1.php");

$header = "<tr>
                <th rowspan=\"2\" width=\"10%\"> $lang_ag[1396]  </th>
                <th rowspan=\"2\" width=\"10%\"> $lang_ag[255]  </th>
                <th colspan=\"3\" width=\"30%\"> $lang_ag[189]  </th>
                <th colspan=\"3\" width=\"30%\"> $lang_ag[455]  </th>
                <th rowspan=\"2\" width=\"30%\"> $lang_ag[1415] </th>
              </tr>
              <tr>
                <th> $lang_ag[214] </th>
                <th> $lang_ag[191] </th>
                <th> $lang_ag[197] </th>
                <th> $lang_ag[214] </th>
                <th> $lang_ag[191] </th>
                <th> $lang_ag[197] </th>
              </tr>";

	$list = "";
	foreach ($lang_g["bet_type"] as $key => $value) {
		include "outStandingNewSearch_byType_".$key.".php";  	
  }

    $headMemberList = "";
	// $headMemberList = "<span class=\"label label-yellow arrowed-right arrowed-in\" data-value=\"".$_SESSION['r_level']."\"  onclick=\"loadData('','','');\"><strong>".$_SESSION['r_user']."</strong></span>";
	$sum1=_cbn(@array_sum($xsum1),2);
	$sum2=_cbn(@array_sum($xsum2),2);
	$sum3=_cbn(@array_sum($xsum3),2);
	$sum4=_cbn(@array_sum($xsum4),2);
	$sum5=_cbn(@array_sum($xsum5),2);
	$sum6=_cbn(@array_sum($xsum6),2);
	$sum7=_cbn(@array_sum($xsum7),2);
	$sum8=_cbn(@array_sum($xsum8),2);

	$footer = " <td align=\"center\"><strong><span>{$lang_ag[197]}</span></strong></td>
			    <td align=\"right\" class=\"lvAll\"><strong> $sum1 </strong></td>
			    <td align=\"right\" class=\"sumLv3\"><strong> $sum2 </strong></td>
			    <td align=\"right\" class=\"sumLv4\"><strong> $sum3 </strong></td>
			    <td align=\"right\" class=\"sumLv5\"><strong> $sum4 </strong></td>
			    <td align=\"right\" class=\"sumLv3\"><strong> $sum5 </strong></td>
			    <td align=\"right\" class=\"sumLv4\"><strong> $sum6 </strong></td>
			    <td align=\"right\" class=\"sumLv5\"><strong> $sum7 </strong></td>
			    <td align=\"right\" class=\"sumLv6\"><strong> $sum8 </strong></td>";


	$option = array(
		"gametype" => "",
		"headMemberList" =>  $headMemberList,
		"level" => $_SESSION['r_level'],
		"suser" => "",
		"usertype" =>  "A"
	);

  	$data = array(
  	  "status"  =>  true,
  	  "list"  =>  $list,
  	  "option" => $option,
  	  "footer" => $footer,
  	  "header" => $header,
  	);


 ?>