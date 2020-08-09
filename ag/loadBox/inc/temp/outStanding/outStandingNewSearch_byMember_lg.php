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
			                        ".$lang_g["bet_type"]["lg"]."  <span class=\"badge badge-danger\">2,000.00</span>
			                    </a>
			                </li>
			            </ul>
			            <div class=\"tab-content\">
			            	<div id=\"Soccer\" class=\"tab-pane fade in active \">
			                    <div class=\"table-responsive\">
			                        <table id=\"tbSoccer\" class=\"table table-striped table-bordered table-hover\">
			                            <thead>
			                                
			                                <tr>
			                                    <th align=\"center\"> $lang_ag[2078] </th>
			                                    <th align=\"center\"> $lang_ag[185] </th>
			                                    <th align=\"center\"> $lang_ag[1388] </th>
			                                    <th align=\"center\"> $lang_ag[205] </th>
			                                    <th align=\"center\"> $lang_ag[227] </th>
			                                    <th align=\"center\"> $lang_ag[2079] </th>
			                                    <th align=\"center\"> $lang_ag[191] </th>
			                                    <th align=\"center\"> $lang_ag[2080] </th>
			                                    <th align=\"center\"> $lang_ag[197] </th>
			                                </tr>
			                            </thead>
			                            <tbody>
			                            	<tr align=\"center\" class=\"tr_lot\">
                							  	<td>49</td>
                							    <td>26/09/2019 17:08:17</td>
                							    <td>7</td>
      											<td>3โต๊ด</td>
      											<td>200</td>
      											<td align=\"right\"><span class=\"cr\">-50.00</span></td>
      											<td align=\"right\"><span class=\"cb\">17.50</span></td>
        										<td align=\"right\"><span class=\"cb\">0</span></td>
      											<td align=\"right\"><span class=\"cr\">-32.50</span></td>
                 							 </tr>
			
			                            </tbody>
			                            <tfoot>
			                                <tr>
			                                    <td colspan=\"5\" align=\"center\"><strong>{$lang_ag[197]}</strong></td>
			                                    <td align=\"center\"><strong><font id=\"totalSoccerStake\">2,000.00</font></strong></td>
			                                    <td align=\"center\"><strong><font id=\"totalSoccerStake\">2,000.00</font></strong></td>
			                                    <td align=\"center\"><strong><font id=\"totalSoccerStake\">2,000.00</font></strong></td>
			                                    <td align=\"center\"><strong><font id=\"totalSoccerStake\">2,000.00</font></strong></td>
			                                </tr>
			                            </tfoot>
			                        </table>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </td>
			</tr>";



			$data = array(
			  "status"  =>  true,
			  "list"  =>  $list,
			  "option" => $option,
			  "footer" => $footer,
			  "pagi_data" => $pagi_data,
			); 

 ?>			