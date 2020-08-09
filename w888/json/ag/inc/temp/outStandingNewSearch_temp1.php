<?php
 require('inc_head_bySession.php');

if(empty($_POST["gametype"])) 
{
	$list = "<tr>
		        <td align=\"\">
		        	<span onclick=\"searchDataByType('sc','','9');\">
		        		<a class=\"cur\"> ฟุตบอล </a>
		        	</span>
		        </td>
		        <td align=\"right\" class=\"lvAll\"> 2,714.00</td>
		        <td align=\"right\" class=\"lv3\"> 0.00</td>
		        <td align=\"right\" class=\"lv4\"> 0.00</td>
		        <td align=\"right\" class=\"lv5\"> 2,361.00</td>
		        <td align=\"right\" class=\"lv6\"> 353.00</td>
		</tr>

		<tr>
		        <td align=\"\">
		        	<span onclick=\"searchDataByType('cn','','9');\">
		        		<a class=\"cur\"> กีฬา </a>
		        	</span>
		        </td>
		        <td align=\"right\" class=\"lvAll\"> 0.00</td>
		        <td align=\"right\" class=\"lv3\"> 0.00</td>
		        <td align=\"right\" class=\"lv4\"> 0.00</td>
		        <td align=\"right\" class=\"lv5\"> 0.00</td>
		        <td align=\"right\" class=\"lv6\"> 0.00</td>
		</tr>

		<tr>
		        <td align=\"\">
		        	<span onclick=\"searchDataByType('cn','','9');\">
		        		<a class=\"cur\"> มวยไทย </a>
		        	</span>
		        </td>
		        <td align=\"right\" class=\"lvAll\"> 0.00</td>
		        <td align=\"right\" class=\"lv3\"> 0.00</td>
		        <td align=\"right\" class=\"lv4\"> 0.00</td>
		        <td align=\"right\" class=\"lv5\"> 0.00</td>
		        <td align=\"right\" class=\"lv6\"> 0.00</td>
		</tr>

		<tr>
		        <td align=\"\">
		        	<span onclick=\"searchDataByType('cn','','9');\">
		        		<a class=\"cur\"> สเต็ป </a>
		        	</span>
		        </td>
		        <td align=\"right\" class=\"lvAll\"> 0.00</td>
		        <td align=\"right\" class=\"lv3\"> 0.00</td>
		        <td align=\"right\" class=\"lv4\"> 0.00</td>
		        <td align=\"right\" class=\"lv5\"> 0.00</td>
		        <td align=\"right\" class=\"lv6\"> 0.00</td>
		</tr>

		<tr>
		        <td align=\"\">
		        	<span onclick=\"searchDataByType('cn','','9');\">
		        		<a class=\"cur\"> หวย </a>
		        	</span>
		        </td>
		        <td align=\"right\" class=\"lvAll\"> 0.00</td>
		        <td align=\"right\" class=\"lv3\"> 0.00</td>
		        <td align=\"right\" class=\"lv4\"> 0.00</td>
		        <td align=\"right\" class=\"lv5\"> 0.00</td>
		        <td align=\"right\" class=\"lv6\"> 0.00</td>
		</tr>

		<tr>
		        <td align=\"\">
		        	<span onclick=\"searchDataByType('cn','','9');\">
		        		<a class=\"cur\"> หวยหุ้น </a>
		        	</span>
		        </td>
		        <td align=\"right\" class=\"lvAll\"> 0.00</td>
		        <td align=\"right\" class=\"lv3\"> 0.00</td>
		        <td align=\"right\" class=\"lv4\"> 0.00</td>
		        <td align=\"right\" class=\"lv5\"> 0.00</td>
		        <td align=\"right\" class=\"lv6\"> 0.00</td>
		</tr>

		<tr>
		        <td align=\"\">
		        	<span onclick=\"searchDataByType('cn','','9');\">
		        		<a class=\"cur\"> หวยชุด </a>
		        	</span>
		        </td>
		        <td align=\"right\" class=\"lvAll\"> 0.00</td>
		        <td align=\"right\" class=\"lv3\"> 0.00</td>
		        <td align=\"right\" class=\"lv4\"> 0.00</td>
		        <td align=\"right\" class=\"lv5\"> 0.00</td>
		        <td align=\"right\" class=\"lv6\"> 0.00</td>
		</tr>

		<tr>
		        <td align=\"\">
		        	<span onclick=\"searchDataByType('cn','','9');\">
		        		<a class=\"cur\"> เกมส์ </a>
		        	</span>
		        </td>
		        <td align=\"right\" class=\"lvAll\"> 0.00</td>
		        <td align=\"right\" class=\"lv3\"> 0.00</td>
		        <td align=\"right\" class=\"lv4\"> 0.00</td>
		        <td align=\"right\" class=\"lv5\"> 0.00</td>
		        <td align=\"right\" class=\"lv6\"> 0.00</td>
		</tr>

		<tr>
		        <td align=\"\">
		        	<span onclick=\"searchDataByType('cn','','9');\">
		        		<a class=\"cur\"> คาสิโน </a>
		        	</span>
		        </td>
		        <td align=\"right\" class=\"lvAll\"> 1,000.00</td>
		        <td align=\"right\" class=\"lv3\"> 0.00</td>
		        <td align=\"right\" class=\"lv4\"> 500.00</td>
		        <td align=\"right\" class=\"lv5\"> 100.00</td>
		        <td align=\"right\" class=\"lv6\"> 400.00</td>
		</tr>";

	$headMemberList = "<span class=\"label label-yellow arrowed-right arrowed-in\" data-value=\"9\"  onclick=\"searchDataByType('','','');\"><strong></strong></span>";

	$footer = " <td align=\"center\"><strong><span>รวม</span></strong></td>
			    <td align=\"right\" class=\"lvAll\"><strong> 3,000.00 </strong></td>
			    <td align=\"right\" class=\"sumLv3\"><strong> 0.00 </strong></td>
			    <td align=\"right\" class=\"sumLv4\"><strong> 500.00 </strong></td>
			    <td align=\"right\" class=\"sumLv5\"><strong> 1,840.00 </strong></td>
			    <td align=\"right\" class=\"sumLv6\"><strong> 660.00 </strong></td>";


	$option = array(
		"gametype" => "",
		"headMemberList" =>  $headMemberList,
		"level" => "9",
		"suser" => "",
		"usertype" =>  "A"
	);

  	$data = array(
  	  "status"  =>  true,
  	  "list"  =>  $list,
  	  "option" => $option,
  	  "footer" => $footer,
  	);

  	
}else if($_POST["gametype"] != "")  
{
	if(empty($_POST["member"]) && $_POST["level"] == 9) 
	{
		$headMemberList = "<span class=\"label label-yellow arrowed-right arrowed-in\" data-value=\"9\"  onclick=\"searchDataByType('".$_POST["gametype"]."','','');\"><strong></strong></span>";

		$option = array(
			"gametype" => $_POST["gametype"],
			"headMemberList" =>  $headMemberList,
			"level" => "9",
			"suser" => "",
			"usertype" =>  "A"
		);

		$list = "<tr>
					        <td align=\"\"> 
					        	<a class=\"btn btn-grey btn-minier\" href=\"#\"> @ </a>
					        	<span onclick=\"searchDataByType('".$_POST["gametype"]."','ohoPan','9');\">
					        	<a class=\"cur\">ohoPan</a>
					        	</span>
					        	(หน่อง)
					        </td>
					        <td align=\"right\" class=\"lvAll\"> 2,000.00</td>
					        <td align=\"right\" class=\"lv3\"> 0.00</td>
					        <td align=\"right\" class=\"lv4\"> 0.00</td>
					        <td align=\"right\" class=\"lv5\"> 1,740.00</td>
					        <td align=\"right\" class=\"lv6\"> 260.00</td>
				</tr>";

		$footer = " <td align=\"center\"><strong><span>รวม</span></strong></td>
			    <td align=\"right\" class=\"lvAll\"><strong> 2,000.00 </strong></td>
			    <td align=\"right\" class=\"sumLv3\"><strong> 0.00 </strong></td>
			    <td align=\"right\" class=\"sumLv4\"><strong> 500.00 </strong></td>
			    <td align=\"right\" class=\"sumLv5\"><strong> 1,740.00 </strong></td>
			    <td align=\"right\" class=\"sumLv6\"><strong> 260.00 </strong></td>";		


		$data = array(
  		  "status"  =>  true,
  		  "list"  =>  $list,
  		  "option" => $option,
  		  "footer" => $footer,
  		);
	}else if(isset($_POST["member"]) && $_POST["level"] == 9) {

		$headMemberList = "<span class=\"label label-yellow arrowed-right arrowed-in\" data-value=\"10\"  onclick=\"searchDataByType('".$_POST["gametype"]."','ohoPan','9');\"><strong>ohoPan</strong></span>";

		$option = array(
			"gametype" => $_POST["gametype"],
			"headMemberList" =>  $headMemberList,
			"level" => "10",
			"suser" => "ohoPan",
			"usertype" =>  "A"
		);

		$list = "<tr>
					   <td align=\"\"> 
					   	<a class=\"btn btn-grey btn-minier\" href=\"#\"> M </a>
					   	<span onclick=\"searchDataByType('".$_POST["gametype"]."','ohoPan10','10');\">
					   		<a class=\"cur\">ohoPan10</a>
					   	</span> (Qคิว)
					   </td>
					   <td align=\"right\" class=\"lvAll\"> 2,000.00</td>
					   <td align=\"right\" class=\"lv3\"> 0.00</td>
					   <td align=\"right\" class=\"lv4\"> 0.00</td>
					   <td align=\"right\" class=\"lv5\"> 1,740.00</td>
					   <td align=\"right\" class=\"lv6\"> 260.00</td>
				</tr>";

		$footer = " <td align=\"center\"><strong><span>รวม</span></strong></td>
			    <td align=\"right\" class=\"lvAll\"><strong> 2,000.00 </strong></td>
			    <td align=\"right\" class=\"sumLv3\"><strong> 0.00 </strong></td>
			    <td align=\"right\" class=\"sumLv4\"><strong> 500.00 </strong></td>
			    <td align=\"right\" class=\"sumLv5\"><strong> 1,740.00 </strong></td>
			    <td align=\"right\" class=\"sumLv6\"><strong> 260.00 </strong></td>";		


		$data = array(
  		  "status"  =>  true,
  		  "list"  =>  $list,
  		  "option" => $option,
  		  "footer" => $footer,
  		);
	}else if(isset($_POST["member"]) && $_POST["level"] == 10) {

		if($_POST["gametype"] == "sc")
		{
			$headMemberList = "<span class=\"label label-yellow arrowed-right arrowed-in\" data-value=\"11\"  onclick=\"searchDataByType('".$_POST["gametype"]."','ohoPan10','10');\"><strong>ohoPan10</strong></span>";

			$option = array(
				"gametype" => $_POST["gametype"],
				"headMemberList" =>  $headMemberList,
				"level" => "11",
				"suser" => "ohoPan10",
				"usertype" =>  "M"
			);

			$list = "<tr>
					<td colspan=\"10\" class=\"tdNoHover\">
						<!-- soccer -->
						        <div class=\"tabbable\">
				            <ul class=\"nav nav-tabs\" id=\"myTab\"> 
				            	<li class=\"active\">
				                    <a data-toggle=\"tab\" href=\"#\">
				                        <i class=\"green ace-icon fa fa-futbol-o bigger-120\"></i>
				                        ฟุตบอล  <span class=\"badge badge-danger\">2,000.00</span>
				                    </a>
				                </li>
				            </ul>
				            <div class=\"tab-content\">
				            	<div id=\"Soccer\" class=\"tab-pane fade in active \">
				                    <div class=\"table-responsive\">
				                        <table id=\"tbSoccer\" class=\"table table-striped table-bordered table-hover\">
				                            <thead>
				                                
				                                <tr>
				                                    <th align=\"center\">{$lang_outStandingNew[5]}</th>
				                                    <th align=\"center\">{$lang_outStandingNew[6]}</th>
				                                    <th align=\"center\">{$lang_outStandingNew[7]}</th>
				                                    <th align=\"center\">{$lang_outStandingNew[8]}</th>
				                                    <th align=\"center\">{$lang_outStandingNew[9]}</th>
				                                    <th align=\"center\">{$lang_outStandingNew[10]}</th>
				                                    <th align=\"center\">{$lang_outStandingNew[11]}</th>
				                                    <th align=\"center\">{$lang_outStandingNew[12]}</th>
				                                </tr>
				                            </thead>
				                            <tbody>
				                            		<tr>
				                                            <td align=\"center\" style=\"vertical-align:middle\">1</td>
				                                            <td align=\"center\" style=\"vertical-align:middle\">ohoPan10</td>
				                                            <td align=\"center\">
				                                                <font><strong>100285773</strong></font><br>
				                                                <font><strong>บอล</strong></font><br>
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
				                                    <td colspan=\"4\" align=\"center\"><strong>รวม</strong></td>
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
				        
				        <!-- step -->
				        
				        <!-- sport -->
				        
				        <!-- game -->
				       	
				        <!-- lottory -->
				        
				        <!-- lotto -->
				        
				        <!-- lotto set -->
				        
				        <!-- lotto lao -->
				        
				        <!-- casino -->
				    </td>
				</tr>";


			$data = array(
			  "status"  =>  true,
			  "list"  =>  $list,
			  "option" => $option,
			);

		}else if($_POST["gametype"] == "cn")
		{
			$headMemberList = "<span class=\"label label-yellow arrowed-right arrowed-in\" data-value=\"11\"  onclick=\"searchDataByType('".$_POST["gametype"]."','ohoPan10','10');\"><strong>ohoPan10</strong></span>";

			$option = array(
				"gametype" => $_POST["gametype"],
				"headMemberList" =>  $headMemberList,
				"level" => "11",
				"suser" => "ohoPan10",
				"usertype" =>  "M"
			);

			$list = "<tr>
			<td colspan=\"10\" class=\"tdNoHover\">
				<!-- soccer -->
				
		        <!-- step -->
		        
		        <!-- sport -->
		        
		        <!-- game -->
		       	
		        <!-- lottory -->
		        
		        <!-- lotto -->
		        
		        <!-- lotto set -->
		        
		        <!-- lotto lao -->
		        
		        <!-- casino -->
		        <div class=\"tabbable\">
		            <ul class=\"nav nav-tabs\" id=\"myTab\"> 
		            	<li class=\"active\">
		                    <a data-toggle=\"tab\" href=\"#\">
		                        <i class=\"green ace-icon fa fa-gavel bigger-120\"></i>
		                        คาสิโน <span class=\"badge badge-danger\">1,000.00</span>
		                    </a>
		                </li>
		            </ul>
		            <div class=\"tab-content\">
		            <div id=\"Casino\" class=\"tab-pane fade in active\">
		                    <div class=\"table-responsive\">
		                        <table id=\"tbCasino\" class=\"table table-striped table-bordered table-hover\">
		                            <thead>
		                                <tr>
		                                    <th align=\"center\">{$lang_outStandingNew[5]}</th>
		                                    <th align=\"center\">{$lang_outStandingNew[6]}</th>
		                                    <th align=\"center\">{$lang_outStandingNew[7]}</th>
		                                    <th align=\"center\">{$lang_outStandingNew[13]}</th>
		                                    <th align=\"center\">{$lang_outStandingNew[10]}</th>
		                                    <th align=\"center\">{$lang_outStandingNew[11]}</th>
		                                    <th align=\"center\">{$lang_outStandingNew[12]}</th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <tr>
		                                    <td align=\"center\">1</td>
		                                    <td align=\"center\">ohoPan10</td>
		                                    <td align=\"center\">9244654</td>
		                                    <td align=\"center\">2019-05-23 05:06:26</td>
		                                    <td align=\"center\" class=\"digits\" id=\"casinoStake\">1,000.00</td>
		                                    <td align=\"center\">
		                                        <font color=\"blue\"><strong> Rinning </strong></font>
		                                        <br>
		                                        223.24.165.159 
		                                    </td>
		                                    <td align=\"center\">
		                                        100 /
		                                        10 %
		                                    </td>
		                                </tr>
		                            </tbody>
		                            <tfoot>
		                                <tr>
		                                    <td colspan=\"4\" align=\"center\"><strong>รวม</strong></td>
		                                    <td align=\"center\"><strong><font id=\"totalCasinoStake\">1,000.00</font></strong></td>
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
			);
		}  

	}



}

echo json_encode($data);

		




  ?>
