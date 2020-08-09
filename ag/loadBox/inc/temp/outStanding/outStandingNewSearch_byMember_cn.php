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
			                        ".$lang_g["bet_type"]["cn"]."  <span class=\"badge badge-danger\">2,000.00</span>
			                    </a>
			                </li>
			            </ul>
			            <div class=\"tab-content\">
			            	<div id=\"Soccer\" class=\"tab-pane fade in active \">
			                    <div class=\"table-responsive\">
			                        <table id=\"tbSoccer\" class=\"table table-striped table-bordered table-hover\">
			                            <thead>
			                                
			                                <tr>
			                                    <th align=\"center\">$lang_ag[241]</th>
			                                    <th align=\"center\">$lang_ag[239]</th>
			                                    <th align=\"center\">$lang_ag[1867]	</th>
			                                    <th align=\"center\">$lang_ag[477]	</th>
			                                    <th align=\"center\">$lang_ag[1989]</th>
			                                    <th align=\"center\">$lang_ag[1388]</th>
			                                    <th align=\"center\">$lang_ag[2079]</th>
			                                    <th align=\"center\">$lang_ag[1658]</th>
			                                    <th align=\"center\">$lang_ag[2090]</th>
			                                    <th align=\"center\">$lang_ag[429]</th>
			                                    <th align=\"center\">$lang_ag[1675]</th>
			                                </tr>
			                            </thead>
			                            <tbody>
			                            		<tr id=\"transTemplate\" style=\"\" class=\"tb_ball\">
													<td>BAC-164</td>
													<td>27/09/2019 10:14:04</td>
													<td>1</td>
													<td>บาคาร่า</td>
													<td>12345</td>
													<td>1</td>
													<td class=\"banker bet\">เจ้ามือ</td>
													<td>50</td>
													<td>50.00</td>
                    						        <td class=\"\"></td>
													<td class=\"\">?</td>
												</tr>
			
			                            </tbody>
			                            <tfoot>
			                                <tr>
			                                	<td align=\"center\"><strong>$lang_ag[197]</strong></td>
			                                    <td colspan=\"6\" align=\"center\"></td>
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