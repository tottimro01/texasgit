<?php 

 $_lv= $_POST["level"];
 $q =  $_POST['q'];
 $gametype =  $_POST['gametype'];
 $rowPerPage =  $_POST['rowPerPage'];
 $page =  $_POST['page'];
 $_id = $_POST['_id'];


$sql= "select m_id , m_agent_id , m_user , m_name ,m_level from bom_tb_member where m_agent_id like '%".$_SESSION['r_agent_id']."%' and m_level = '".$_lv."' and m_id='".$_id."'";
$re_member=sql_array($sql);


$headMemberList = "<span class=\"label label-yellow arrowed-right arrowed-in\" data-value=\"".$re_member["m_level"]."\"  onclick=\"loadData('".$_POST["gametype"]."','".$re_member["m_id"]."','".$re_member["m_level"]."','M');\"><strong>".$re_member["m_user"]."</strong></span>";
$option = array(
	"headMemberList" =>  $headMemberList,
	"level" => $re_member["m_level"],
	"suser" => "",
	"usertype" =>  "M",
	"gametype" =>  $gametype,
	"_lv" =>  $_lv,
	"_id" =>  $_id,
);


// $pagi_data["chknum"]["sql_m"] = $sql;
$rowPerPage = intval($_POST["rowPerPage"]);
$page       = intval($_POST["page"]);
$start      = ($page-1)*$rowPerPage;

$num_row = 50;

$pagi_data["numrow"] =  $num_row;
$pagi_data["rowPerPage"] =  $rowPerPage;
$pagi_data["total_page"] = ceil($num_row/$rowPerPage); 
$pagi_data["active_page"] = $page;
$pagi_data["start_page"]  = $start; 


$list = "<tr>
				<td colspan=\"10\" class=\"tdNoHover\">
					        <div class=\"tabbable\">
			            <ul class=\"nav nav-tabs\" id=\"myTab\"> 
			            	<li class=\"active\">
			                    <a data-toggle=\"tab\" href=\"#\">
			                        <i class=\"green ace-icon fa fa-futbol-o bigger-120\"></i>
			                        ".$lang_g["bet_type"]["sp"]."   <span id=\"sum_panal\" class=\"badge badge-danger\">0.00</span>
			                    </a>
			                </li>
			            </ul>
			            <div class=\"tab-content\">
			            	<div id=\"Soccer\" class=\"tab-pane fade in active \">
			                    <div class=\"table-responsive\">
			                        <table id=\"tbSoccer\" class=\"table table-striped table-bordered table-hover\">
			                            <thead>
			                                
			                                <tr>
			                                    <th align=\"center\"> $lang_ag[1404] </th>
			                                    <th align=\"center\"> $lang_ag[189] </th>
			                                    <th align=\"center\"> $lang_ag[403] </th>
			                                    <th align=\"center\"> $lang_ag[177] </th>
			                                    <th align=\"center\"> $lang_ag[2088] </th>
			                                    <th align=\"center\"> $lang_ag[2089] </th>
			                                    <th align=\"center\"> $lang_ag[429]  </th>
			                                    <th align=\"center\"> $lang_ag[184] </th>
			                                </tr>
			                            </thead>
			                            <tbody>";



			                 $no = 1;
$sum = 0;
$sql_bill = sql_query("select * from bom_tb_football_bill_live where m_id = '$re_member[m_id]' and b_confirm != 1  and b_accept=1 and b_zone <> 6 and b_zone <> 1 and b_numstep = 1 and b_status = 5 order by bill_id desc");
while($rs_bill = sql_fetch_as($sql_bill)){

	if($rs['b_accept']==1){
		   $mbonus=-$rs['b_sum'];
			}else{
		   $mbonus=0;		
			}

$rs_bill_play = sql_array("select * from bom_tb_football_bill_play_live where bill_id = '".$rs_bill["bill_id"]."'");

$list .= "


			                            		<tr>
			                                            <td align=\"center\" style=\"vertical-align:middle\"> ".number_format($no)." </td>
			                                            <td align=\"center\" style=\"vertical-align:middle\"> $re_member[m_user] </td>
			                                            <td align=\"center\">
			                                                <font><strong>BetID:".$rs_bill["bill_id"]."</strong></font><br>
			                                                <font><strong>".$sport_type[$rs_bill_play["b_zone"]]."</strong></font><br>
			                                                <font>".$rs_bill["b_datenow"]."</font><br>
			                                            </td><td align=\"center\">";


require("list_bill_play.php");



	$list .= "		                                            </td> <td align=\"center\" class=\"digits\" style=\"vertical-align:middle\">
			                                            	<font color=\"".($rs_bill["b_sum_pay"]<0 ? "red" : "")."\">".number_format($rs_bill["b_sum_pay"] , 2)."</font>
			                                            </td>
			                                            <td align=\"center\" class=\"digits\" style=\"vertical-align:middle\">
			                                            	".number_format($rs_bill["b_total"] , 2)."
			                                            </td>
			                                            <td align=\"center\" id=\"soccerStake\" style=\"vertical-align:middle\">
			                                            	"._cbn($mbonus,2)."
			                                            </td>
			                                            <td align=\"center\" style=\"vertical-align:middle\">
			                                                <span class=\"cb\">".$ball_bill[$rs_bill['b_status']]."</span><br>
        													<span class=\"txtip\">".$rs_bill["b_ip"]."</span>
			                                            </td>
			                                            
			                                    </tr>";
$no++;
$sum = $sum+$rs_bill["b_total"];
}

$list .= "


			
			                            </tbody>
			                            <tfoot>
			                                <tr>
			                                    <td colspan=\"4\" align=\"center\"><strong>{$lang_ag[197]}</strong></td>
			                                    <td align=\"center\"></td>
			                                    <td align=\"center\"><strong><font id=\"totalSoccerStake\">".number_format($sum , 2)."</font></strong></td>

			                                    <td colspan=\"2\" align=\"center\"></td>
			                                </tr>
			                            </tfoot>
			                        </table>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </td>
			</tr>";

$option["sum"] = $sum;

			$data = array(
			  "status"  =>  true,
			  "list"  =>  $list,
			  "option" => $option,
			  "footer" => $footer,
			  "pagi_data" => $pagi_data,
			); 

 ?>			