<?php 

 $_lv= $_POST["level"];
 $q =  $_POST['q'];
 $gametype =  $_POST['gametype'];
 $rowPerPage =  $_POST['rowPerPage'];
 $page =  $_POST['page'];
 $_id = $_POST['_id'];
 
 
 
$xsum1=array();
$xsum2=array();
$xsum3=array();
$xsum4=array();
$xsum5=array();
$xsum6=array();
$xsum7=array();
$xsum8=array();

$header = "<tr>
                <th rowspan=\"2\" width=\"10%\"> $lang_ag[1396] 99 </th>
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




$sql= "select r_id , r_agent_id , r_user , r_name ,r_level from bom_tb_agent where r_agent_id like '%".$_SESSION['r_agent_id']."%' and r_level = '".$_lv."' and r_id='".$_id."'";
$re_agent=sql_array($sql);

if($q != "")
{
  $q_a = "and r_user like '%$q%'";
  $q_m = "and m_user like '%$q%'";
}

$r_agent_id = $re_agent["r_agent_id"].$re_agent["r_id"]."*";
$lv = intval($re_agent["r_level"])+1;

// นับแถว

$sql= "select count(r_id) as num from bom_tb_agent where  r_agent_id like '%$r_agent_id%' $q_a and r_level=".$lv."";
$ag_num = sql_array($sql);
$ag_num_row =   intval($ag_num['num']);
// $pagi_data["chknum"]["sql_a"] = $sql;

$sql= "select count(m_id) as num from bom_tb_member where  m_agent_id like '%$r_agent_id%' $q_m and m_level=".$lv."";
$mem_num = sql_array($sql); 
$mem_num_row =   intval($mem_num['num']);

$pagi_data["chknum"]["ag_num_row"]  =   intval($ag_num['num']);
$pagi_data["chknum"]["mem_num_row"]  = intval($mem_num['num']);

// $pagi_data["chknum"]["sql_m"] = $sql;
$rowPerPage = intval($_POST["rowPerPage"]);
$page       = intval($_POST["page"]);
$start      = ($page-1)*$rowPerPage;

$num_row = $ag_num_row + $mem_num_row;

$pagi_data["numrow"] =  $num_row;
$pagi_data["rowPerPage"] =  $rowPerPage;
$pagi_data["total_page"] = ceil($num_row/$rowPerPage); 
$pagi_data["active_page"] = $page;
$pagi_data["start_page"]  = $start; 


$list = "";
$headMemberList = "<span class=\"label label-yellow arrowed-right arrowed-in\" data-value=\"".$re_agent["r_level"]."\"  onclick=\"loadData('".$_POST["gametype"]."','".$re_agent["r_id"]."','".$re_agent["r_level"]."');\"><strong>".$re_agent["r_user"]."</strong></span>";

$option = array(
			"headMemberList" =>  $headMemberList,
			"level" => $re_agent["r_level"],
			"suser" => "",
			"usertype" =>  "A",
			"gametype" =>  $gametype,
			"_lv" =>  $_lv,
			"_id" =>  $_id,
		);

if(($start+$rowPerPage) <= $ag_num_row)   // ถ้าหน้าที่เลือกเป็น agent ทั้งหมด ########################################################
{
	
	 // ดึง agent;
      $sql= "select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' $q_a and r_level=".$lv." LIMIT {$start} , {$rowPerPage}";
      $re=sql_query($sql);
      $pagi_data["chknum"]["sql_m"] = $sql;
      $member_name = array();
      $val = array();

      while ($rs = sql_fetch_as($re)){
		  
				   $r_level=$rs['r_level'];
				   $ag_level=$rs['r_level']-1;
				######################
					include("inc_ag_share1.php");
                 	include("inc_ag.php");
					
 
      		$list .= "<tr>
				        <td align=\"\"> 
				        	<a class=\"btn btn-grey btn-minier\" href=\"#\"> @ </a>
				        	<span onclick=\"loadData('".$_POST["gametype"]."','".$rs['r_id']."','".$rs['r_level']."','A');\">
				        	<a class=\"cur\">".$rs['r_user']."</a>
				        	</span>
				        	(".$rs['r_name'].")
				        </td>
		        <td align=\"right\"> ".number_format($psum1,2)."</td>
		        <td align=\"right\">  ".number_format($psum2,2)."</td>
		        <td align=\"right\">  ".number_format($psum3,2)."</td>
		        <td align=\"right\">  ".number_format($psum4,2)."</td>
		        <td align=\"right\">  ".number_format($psum5,2)."</td>
		        <td align=\"right\">  ".number_format($psum6,2)."</td>
		        <td align=\"right\">  ".number_format($psum7,2)."</td>
		        <td align=\"right\">  ".number_format($psum8,2)."</td>
			</tr>";
        $c++;
      }
	  
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
	



}else{  // กรณีที่ มีทั้ง member และ agent  หรือ มีเฉพาะ member อย่างเดียว	

	 $row_mPerPage = ($start+$rowPerPage)-$ag_num_row;  // หาแถวที่เป้นแถวของ member
     $row_agPerPage = $rowPerPage-$row_mPerPage; // หาแถวที่เป้นแถวของ agent

     // ถ้าหน้าที่เลือก มีทั้ง agent และ member รวมกัน  ##############################################################################
       if($row_agPerPage > 0)    
       {  #####################
         ###################  load agent ################
           // ดึง agent;
          $sql= "select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' $q_a and r_level=".$lv." LIMIT {$start} , {$row_agPerPage}";
          $re=sql_query($sql);
          $member_name = array();
          $val = array();
          while ($rs = sql_fetch_as($re)){
			  
			  
				   $r_level=$rs['r_level'];
				   $ag_level=$rs['r_level']-1;
				######################
					include("inc_ag_share1.php");
					include("inc_ag.php");

			  

          	$list .= "<tr>
				        <td align=\"\"> 
				        	<a class=\"btn btn-grey btn-minier\" href=\"#\"> @ </a>
				        	<span onclick=\"loadData('".$_POST["gametype"]."','".$rs['r_id']."','".$rs['r_level']."','A');\">
				        	<a class=\"cur\">".$rs['r_user']."</a>
				        	</span>
				        	(".$rs['r_name'].")
				        </td>
		        <td align=\"right\"> ".number_format($psum1,2)."</td>
		        <td align=\"right\">  ".number_format($psum2,2)."</td>
		        <td align=\"right\">  ".number_format($psum3,2)."</td>
		        <td align=\"right\">  ".number_format($psum4,2)."</td>
		        <td align=\"right\">  ".number_format($psum5,2)."</td>
		        <td align=\"right\">  ".number_format($psum6,2)."</td>
		        <td align=\"right\">  ".number_format($psum7,2)."</td>
		        <td align=\"right\">  ".number_format($psum8,2)."</td>
			</tr>";

           
            $c++;
          }


       
          $start_member = 0; // กำหนดแถวแรกของ member ให้เป็นแถวที่ 0
          $futype = "M";
          $pagi_data["load"]  = "mix";
           // ดึง member
           $sql= "select * from bom_tb_member where  m_agent_id like '%$r_agent_id%' $q_m and m_level=".$lv." $sort LIMIT {$start_member} , {$row_mPerPage}";
           $re_m=sql_query($sql);

           while ($rs = sql_fetch_as($re_m)){
			   
					 $r_level=$rs['m_level'];
					 $ag_level=$rs['m_level']-1; 
					 
					 	include("inc_mem.php");
             
           	$list .= "<tr>
				        <td align=\"\"> 
				        	<a class=\"btn btn-grey btn-minier\" href=\"#\"> M </a>
				        	<span onclick=\"loadData('".$_POST["gametype"]."','".$rs['m_id']."','".$rs['m_level']."','M');\">
				        	<a class=\"cur\">".$rs['m_user']."</a>
				        	</span>
				        	(".$rs['m_name'].")
				        </td>
		        <td align=\"right\"> ".number_format($psum1,2)."</td>
		        <td align=\"right\">  ".number_format($psum2,2)."</td>
		        <td align=\"right\">  ".number_format($psum3,2)."</td>
		        <td align=\"right\">  ".number_format($psum4,2)."</td>
		        <td align=\"right\">  ".number_format($psum5,2)."</td>
		        <td align=\"right\">  ".number_format($psum6,2)."</td>
		        <td align=\"right\">  ".number_format($psum7,2)."</td>
		        <td align=\"right\">  ".number_format($psum8,2)."</td>
				</tr>";


             $c++;
           }

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

       }else // ถ้าหน้าที่เลือกมีเฉพาะ member ###############################################################################################
       {
           $row_mPerPage = ($start+$rowPerPage)-$ag_num_row;  // หาแถวที่เป้นแถวของ member
           $start = $row_mPerPage- $rowPerPage;  
           $futype = "M";

           // ดึง member
           $sql= "select * from bom_tb_member where  m_agent_id like '%$r_agent_id%' $q_m and m_level=".$lv." $sort LIMIT  {$start} , {$rowPerPage}";
           $re_m=sql_query($sql);

           while ($rs = sql_fetch_as($re_m)){
			   
					 $r_level=$rs['m_level'];
					 $ag_level=$rs['m_level']-1; 
					 
					include("inc_mem.php");
						
						
             $list .= "<tr>
				        <td align=\"\"> 
				        	<a class=\"btn btn-grey btn-minier\" href=\"#\"> M </a>
				        	<span onclick=\"loadData('".$_POST["gametype"]."','".$rs['m_id']."','".$rs['m_level']."','M');\">
				        	<a class=\"cur\">".$rs['m_user']."</a>
				        	</span>
				        	(".$rs['m_name'].")
				        </td>
		        <td align=\"right\"> ".number_format($psum1,2)."</td>
		        <td align=\"right\">  ".number_format($psum2,2)."</td>
		        <td align=\"right\">  ".number_format($psum3,2)."</td>
		        <td align=\"right\">  ".number_format($psum4,2)."</td>
		        <td align=\"right\">  ".number_format($psum5,2)."</td>
		        <td align=\"right\">  ".number_format($psum6,2)."</td>
		        <td align=\"right\">  ".number_format($psum7,2)."</td>
		        <td align=\"right\">  ".number_format($psum8,2)."</td>
				</tr>";

             $c++;
           }
		   
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


       }



}

		$data = array(
  		  "status"  =>  true,
  		  "list"  =>  $list,
  		  "option" => $option,
  		  "footer" => $footer,
  		  "pagi_data" => $pagi_data,
  		);
	

 ?>