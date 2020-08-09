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
			                        ".$lang_g["bet_type"]["sp"]."  <span class=\"badge badge-danger\">2,000.00</span>
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
			                            <tbody>
			                            		<tr>
			                                            <td align=\"center\" style=\"vertical-align:middle\">1</td>
			                                            <td align=\"center\" style=\"vertical-align:middle\">ohoPan10</td>
			                                            <td align=\"center\">
			                                                <font><strong>100285773</strong></font><br>
			                                                <font><strong>{$lang_outStandingNew[24]}</strong></font><br>
			                                                <font>2019-05-23 09:32:13</font><br>
			                                            </td>
			                                            <td align=\"center\">
			                                            	<font color=\"blue\">Handicap</font>
			                                            	<font color=\"red\"><strong>เฟรสโน เอฟซี -0.5</strong></font>
			                                            	<font color=\"blue\"><strong> Live! @ 0 - 0</strong></font>
			                                                    <br>
			                                                <font color=\"red\">เฟรสโน เอฟซี</font> -vs-
			                                                <font color=\"\">อัสติน โบลด์ เอฟซี</font>
			                                                	<br>
			                                                <font color=\"red\">ยูไนเต็ด ซ็อคเกอร์ ลีก แชมเปี้ยนชิพ @ 2019-05-22</font> 
			                                            </td>
			                                            <td align=\"center\" class=\"digits\" style=\"vertical-align:middle\">
			                                            	0.97
			                                            </td>
			                                            <td align=\"center\" id=\"soccerStake\" style=\"vertical-align:middle\">2,000.00</td>
			                                            <td align=\"center\" style=\"vertical-align:middle\">
			                                                <font color=\"blue\"> <strong>Running</strong> </font> 
			                                            </td>
			                                            <td align=\"center\" style=\"vertical-align:middle\">1,740</td>
			                                    </tr>
			
			                            </tbody>
			                            <tfoot>
			                                <tr>
			                                    <td colspan=\"4\" align=\"center\"><strong>{$lang_ag[197]}</strong></td>
			                                    <td align=\"center\"></td>
			                                    <td align=\"center\"><strong><font id=\"totalSoccerStake\">2,000.00</font></strong></td>
			                                    <td align=\"center\"></td>
			                                    <td align=\"center\"></td>
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