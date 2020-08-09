<?php

require('inc_head_bySession.php');

$_lv= $_SESSION['r_level'];
$q =  $_POST['q'];

include("transferList_temp_ag_share.php");
   
// $gametype =  $_POST['gametype'];
$rowPerPage =  $_POST['rowPerPage'];
$page =  $_POST['page'];
$_id = $_SESSION['r_id'];

$sql= "select r_id , r_agent_id , r_user , r_name ,r_level from bom_tb_agent where r_agent_id like '%".$_SESSION['r_agent_id']."%' and r_level = '".$_lv."' and r_id='".$_id."'";
$re_agent=sql_array($sql);

if($q != "")
{
  $q_a = "and r_user like '%$q%'";
  $q_m = "and m_user like '%$q%'";
}

$r_agent_id = $re_agent["r_agent_id"].$re_agent["r_id"]."*";
$lv = intval($re_agent["r_level"])+1;


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
$c = 0;

$sumToday = array();
$sumYesterday = array();
$sumCashBalance = array();
$sumOutstanding = array();
$sumGivenCredit = array();


    $row_agPerPage = $rowPerPage; 
    $ag_num_row = 0;

   
         ###################  load agent ################
           // ดึง agent;
         $sql= "select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' $q_a and r_level=".$lv." LIMIT {$start} , {$row_agPerPage}";
         $re=sql_query($sql);
         $member_name = array();
         $val = array();
         while ($rs = sql_fetch_as($re)){
    			  
    			   $r_id=$rs['r_id'];
    			   ############เล่นค้าง R
    			   
    			       include("transferList_temp_r_winloss.php");
    				if($sum_r_winloss!=0){
    			       include("transferList_temp_r_yesterday.php");
    			       include("transferList_temp_r_today.php");
    			       include("transferList_temp_r_outstanding.php");
            
                  $tmoney_yesterday = _cbp($sum_r_yesterday,2);
                  $tmoney_today = _cbp($sum_r_today,2);
                  $cashBalance = _cbp($sum_r_winloss,2);
                  $outstanding = _cbp(-$sum_r_outStanding,2);
                  $givenCredit = number_format($rs['r_count'],2);


                  $sumYesterday[] = $sum_r_yesterday;
                  $sumToday[] = $sum_r_today;
                  $sumCashBalance[] = $sum_r_winloss;
                  $sumOutstanding[] = -$sum_r_outStanding;
                  $sumGivenCredit[] = $rs['r_count'];

                  $chk_yesterday = "";
                  if($sum_r_yesterday!=0)
                  {
                    $chk_yesterday = "<label>
                                      <input name='yesterday' id='chkboxYesterday_".$rs['r_id']."' class='ace ace-checkbox-2 chkboxYesterday' data-userType='A' data-id='".$rs['r_id']."' data-username='".$rs['r_user']."'  data-tmoney='".$tmoney_yesterday."' type='checkbox'>
                                      <span class='lbl'></span>
                                  </label>";
                  }

                  $chk_today = "";
                  if($sum_r_today!=0)
                  {
                    $chk_today = "<label>
                                      <input name='todaychkboxToday' id='chkboxToday_".$rs['r_id']."' class='ace ace-checkbox-2 chkboxToday' data-userType='A' data-id='".$rs['r_id']."' data-username='".$rs['r_user']."'  data-tmoney='".$tmoney_today."' type='checkbox'>
                                      <span class='lbl'></span>
                                  </label> ";
                  }

                  if($sum_r_yesterday!=0 || $sum_r_today!=0)
                  {
                    $chk_btn_user = "<button type='button' class='btn btn-xs btn-primary' onclick=\"transferMoney_byuser(this,'".$rs['r_id']."','A');\">
                                      <i class='fa fa-check-square' aria-hidden='true'></i>
                                      <span class='bigger-110'> $lang_ag[29] </span>
                                  </button>";
                  }else{
                    $chk_btn_user = "<button type='button' class='btn btn-xs'>
                                      <i class='fa fa-check-square' aria-hidden='true'></i>
                                      <span class='bigger-110'> $lang_ag[29] </span>
                                  </button>";
                  }

                  $list.= "<tr>
                              <td colspan='2'>
                                  [<i class=\"ace-icon fa fa-users bigger-140 bg-icon\"></i>]
                                      
                                  <a class=\"cur\">".$rs['r_user']."</a>
                                  </span>
                                  (".$rs['r_name'].")
                              </td>
                              <td align='right' >".$tmoney_yesterday."</td>
                              <td class='text-center' >
                                  ".$chk_yesterday."
                              </td>
                              <td align='right' >".$tmoney_today."</td>
                              <td class='text-center' >
                                    ".$chk_today."
                              </td>
                              <td align='right' >".$cashBalance."</td>
                              <td align='right' >".$outstanding."</td>
                              <td align='right' >".$givenCredit."</td>
                              <td align='center' >  
                                  ".$chk_btn_user."
                              </td>
                          </tr>";
                
                      ######################
                
                  $c++;

                   $ag_num_row++;
            }# if($sum_m_winloss!=0){
		    }

        $row_mPerPage = $rowPerPage-$ag_num_row;  // หาแถวที่เป้นแถวของ member
       
          $start_member = 0; // กำหนดแถวแรกของ member ให้เป็นแถวที่ 0
          $futype = "M";
          $pagi_data["load"]  = "mix";
           // ดึง member
           $sql= "select * from bom_tb_member where  m_agent_id like '%$r_agent_id%' $q_m and m_level=".$lv." $sort LIMIT {$start_member} , {$row_mPerPage}";
           $re_m=sql_query($sql);

           while ($rs = sql_fetch_as($re_m)){
			   
			        $m_id=$rs['m_id'];
			        ############เล่นค้าง M
			        include("transferList_temp_m_winloss.php");
			        if($sum_m_winloss!=0){
			           include("transferList_temp_m_yesterday.php");
			           include("transferList_temp_m_today.php");
			           include("transferList_temp_m_outstanding.php");
         
                 $tmoney_yesterday = _cbp($sum_m_yesterday,2);
                 $tmoney_today = _cbp($sum_m_today,2);
                 $cashBalance = _cbp($sum_m_winloss,2);
                 $outstanding = _cbp(-$sum_m_outStanding,2);
                 $givenCredit = number_format($rs['m_count'],2);


                 $sumYesterday[] = $sum_m_yesterday;
                 $sumToday[] = $sum_m_today;
                 $sumCashBalance[] = $sum_m_winloss;
                 $sumOutstanding[] = -$sum_m_outStanding;
                 $sumGivenCredit[] = $rs['m_count'];

                 $chk_yesterday = "";
                 if($sum_m_yesterday!=0)
                 {
                   $chk_yesterday = " <label>
                                     <input name='yesterday' id='chkboxYesterday_".$rs['m_id']."' class='ace ace-checkbox-2 chkboxYesterday' data-userType='M' data-id='".$rs['m_id']."' data-username='".$rs['m_user']."'  data-tmoney='".$tmoney_yesterday."' type='checkbox'>
                                     <span class='lbl'></span>
                                 </label>";
                 }

                 $chk_today = "";
                 if($sum_m_today!=0)
                 {
                   $chk_today = "<label>
                                     <input name='todaychkboxToday' id='chkboxToday_".$rs['m_id']."' class='ace ace-checkbox-2 chkboxToday' data-userType='M' data-id='".$rs['m_id']."' data-username='".$rs['m_user']."'  data-tmoney='".$tmoney_today."' type='checkbox'>
                                     <span class='lbl'></span>
                                 </label>";
                 }


                 if($sum_m_yesterday!=0 || $sum_m_today!=0 || $sum_m_winloss!=0)
                 {
                   $chk_btn_user = "<button type='button' class='btn btn-xs btn-primary' onclick=\"transferMoney_byuser(this,'".$rs['m_id']."','M');\">
                                     <i class='fa fa-check-square' aria-hidden='true'></i>
                                     <span class='bigger-110'> $lang_ag[29] </span>
                                   </button>";
                 }else{
                   $chk_btn_user = "<button type='button' class='btn btn-xs'>
                                     <i class='fa fa-check-square' aria-hidden='true'></i>
                                     <span class='bigger-110'> $lang_ag[29] </span>
                                   </button>";
                 }


                 $list.= "<tr>
                             <td colspan='2'>
                                 [<i class=\"ace-icon fa fa-user bigger-140 bg-icon\"></i>]
                                     
                                 <a class=\"cur\">".$rs['m_user']."</a>
                                 </span>
                                 (".$rs['m_name'].")
                             </td>
                             <td align='right' >".$tmoney_yesterday."</td>
                             <td class='text-center' >
                                 ".$chk_yesterday."
                             </td>
                             <td align='right' >".$tmoney_today."</td>
                             <td class='text-center' >
                                    ".$chk_today."
                             </td>
                             <td align='right' >".$cashBalance."</td>
                             <td align='right' >".$outstanding."</td>
                             <td align='right' >".$givenCredit."</td>
                             <td align='center' >  
                                 ".$chk_btn_user."
                             </td>
                         </tr>";
             
                ######################


                $c++;
			      }# if($sum_m_winloss!=0){
          }



   $total  = array(
      'sumToday' => _cbn(@array_sum($sumToday),2) , 
      'sumYesterday' => _cbn(@array_sum($sumYesterday),2) , 
      'sumCashBalance' => _cbn(@array_sum($sumCashBalance),2) , 
      'sumOutstanding' => _cbn(@array_sum($sumOutstanding),2) , 
      'sumGivenCredit' => _cbn(@array_sum($sumGivenCredit),2) , 
   
   );   

  $data = array(
    "list"        =>  $list,
    "status"      =>  true,
    "pagi_data" => $pagi_data,
    "total" => $total,
    // "total_all" => $total_all,
  );
  echo json_encode($data);