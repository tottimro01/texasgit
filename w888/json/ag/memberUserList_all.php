<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>

<?

 if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
  }
require('lang/ag_'.$_SESSION["AGlang"].'.php');
require('inc/conn.php');
require('inc/function.php');

      $data = [];

      $agent_ico = "[<i class=\"ace-icon fa fa-users bigger-140 bg-icon\"></i>] ";
      $member_ico = "[<i class=\"ace-icon fa fa-user bigger-140 bg-icon\"></i>] ";

      $head = "<tr>
                    <th class=\"center\">{$lang_userList[14]}</th>
                    <th>{$lang_userList[3]}</th>
                    <th>{$lang_userList[16]}</th>
                    <th>{$lang_userList[17]}</th>
                    <th>{$lang_userList[26]}</th>
                    <th>{$lang_userList[27]}</th>
                    <th>{$lang_userList[18]}</th>
                    <th>{$lang_userList[19]}</th>
                    <th>{$lang_userList[20]}</th>
                    <th>{$lang_userList[21]}</th>
               </tr>";

    $list_sort = $_POST["list_sort"];                                     
    $qq = "";
    if($_POST["fuser"] != "")
    {
      $serch_text = $_POST["fuser"];
      $qq     = "and (m_user like '%$serch_text%' or m_name like '%$serch_text%')";
      $qq_ag  = "and (r_user like '%$serch_text%' or r_name like '%$serch_text%')";
    }                                  
                                      
    $sort = "";
    if($list_sort == 1) // เรียงตามวันที่สร้าง มาก-น้อย
    {
        $sort     = " order by `m_regis` desc";
        $sort_ag  = " order by `r_regis` desc";
    }else  if($list_sort == 2) //เรียงตามวันที่สร้าง น้อย - มาก
    {
        $sort     = " order by `m_regis` asc";
        $sort_ag  = " order by `r_regis` asc";
    }else  if($list_sort == 3) // เรียงตามชื่อ มาก - น้อย
    {
        $sort     = " order by `m_name` desc";
        $sort_ag  = " order by `r_name` desc";
    } else  if($list_sort == 4) // เรียงตามชื่อ น้อย - มาก
    {
        $sort     = " order by `m_name` asc";
        $sort_ag  = " order by `r_name` asc";
    } 

    if($_POST["fuactive"] == '')
    {
         $qq1 = "";
         $qq1_ag = "";
    }else if($_POST["fuactive"] == 1) // เปิดใช้งาน
    {
         $qq1     = "and (m_active = 1)";
         $qq1_ag  = "and (r_active = 1)";
    }else if($_POST["fuactive"] == 0) // ระงับ
    {
          $qq1      = "and (m_active = 0)";
          $qq1_ag   = "and (r_active = 0)";
    }    
      
      $r_agent_id = $_SESSION["r_agent_id"].$_SESSION["r_id"]."*";
      $lv = intval($_SESSION["r_level"])+1;

      // $sql="select r_id from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_level=$lv $qq_ag $qq1_ag";
      // $ag_num_row = sql_num($sql); 

      // $sql="select m_id from bom_tb_member   where  m_agent_id = '$r_agent_id' $qq $qq1";   
      // $mem_num_row = sql_num($sql); 

      // $pagi_data["chknum"]["ag_num_row"]  =  $ag_num_row;
      // $pagi_data["chknum"]["mem_num_row"]  = $mem_num_row; 

      $sql="select count(r_id) as num from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_level=$lv $qq_ag $qq1_ag";
      $ag_num = sql_array($sql);
      $ag_num_row =   intval($ag_num['num']);

      $sql="select count(m_id) as num from bom_tb_member   where  m_agent_id = '$r_agent_id' $qq $qq1";   
      $mem_num = sql_array($sql); 
      $mem_num_row =   intval($mem_num['num']);

      $pagi_data["chknum"]["ag_num_row"]  =   intval($ag_num['num']);
      $pagi_data["chknum"]["mem_num_row"]  = intval($mem_num['num']);
      


      $rowPerPage = intval($_POST["rowPerPage"]);
      $page       = intval($_POST["thisPage"]);
      $start      = ($page-1)*$rowPerPage;

      $num_row = $ag_num_row + $mem_num_row;

      $pagi_data["numrow"] =  $num_row;
      $pagi_data["rowPerPage"] =  $rowPerPage;
      $pagi_data["total_page"] = ceil($num_row/$rowPerPage); 
      $pagi_data["active_page"] = $page;
      $pagi_data["start_page"]  = $start; 
      



      if(($start+$rowPerPage) <= $ag_num_row)   // ถ้าหน้าที่เลือกเป็น agent ทั้งหมด ########################################################
      {
        $pagi_data["load"]  = "ag"; 
        $futype = "A";

        $sql_limit= "select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' $qq_ag $qq1_ag and r_level=$lv $sort_ag LIMIT {$start} , {$rowPerPage}";
        $re=sql_query($sql_limit);

        $list="";
        $no = $rowPerPage*($page-1);
        $up_lv = $lv+1;

        while($rs=sql_fetch($re)){
            if($rs["r_active"]  == 1)
            {
                $active1 = "selected";
                $active2 = "";
            }else{
                $active1 = "";
                $active2 = "selected";
            }

  // ยอดเครดิตทีเปิดให้ member 
  $d_incre = strtotime("-7 day");
  $sql = "select sum(b_total) as btotal from bom_tb_football_bill where  m_agent_id like '%*".$rs["r_id"]."*%'  and r_cut_bet_4=0";
  $reb1 = sql_array($sql);
  $sql = "select sum(b_total) as btotal from bom_tb_lotto_bill_live where  m_agent_id like '%*".$rs["r_id"]."*%' and b_status=5";
  $reb2 = sql_array($sql);
  $sql = "select sum(b_total) as btotal from bom_tb_lotto_hun_bill where  m_agent_id like '%*".$rs["r_id"]."*%' and play_timestam >= $d_incre";
  $reb3 = sql_array($sql);
  $sql = "select sum(b_total) as btotal from bom_tb_games_bill_play where  m_agent_id like '%*".$rs["r_id"]."*%' and play_timestam >= $d_incre";
  $reb4 = sql_array($sql);
  $sum_kank2 = $reb1["btotal"] + $reb2["btotal"] + $reb3["btotal"] + $reb4["btotal"];

  $sql = "select r_count as xtotal , r_type from bom_tb_agent where r_id=".$rs["r_id"];
  $re4 = sql_array($sql);

  $rtype = "m_count";
  $sql = "select sum($rtype) as xtotal from bom_tb_member where  m_agent_id like '%*".$rs["r_id"]."*%'";
  $re5 = sql_array($sql);

  // ยอดรวมเครดิตที่โอนให้ member
  $x_count_member = ($re5["xtotal"] + $sum_kank2);


// ยอดเครดิตทีเปิดให้ agent 
            $sql="select sum(r_count) as xtotal from bom_tb_agent where   r_agent_id like '%*".$rs["r_id"]."*%' and r_level=$up_lv  ";
            $re3=sql_array($sql);
            $x_count=$rs["r_count"]-($x_count_member+$re3["xtotal"]);

            $no ++;
            $rs["r_name"] = ($rs["r_name"] != "") ? $rs["r_name"] : $lang_userList[15];
            $list .="<tr>
                <td align=\"center\" style=\"vertical-align:middle;\">{$no}</td>
                <td align=\"left\" width=\"15%\" style=\"vertical-align:middle;\">
                   {$agent_ico} <strong>{$rs["r_user"]}</strong> ({$rs["r_name"]}) </td>
                <td align=\"center\" width=\"9%\" style=\"vertical-align:middle;\">
                    <select class=\"form-control sm-select input-sm\" id=\"\" name=\"\" onchange=\"changeStatus('{$rs["r_id"]}','A',this);\">
                        <option value=\"1\" ".$active1.">{$lang_userList[5]}</option>
                        <option value=\"0\" ".$active2.">{$lang_userList[6]}</option>
                    </select>
                </td>
                <td align=\"right\" style=\"vertical-align:middle; text-align: center; min-width: 75px;\">
                    ".number_format($rs["r_count"],2)."
                    <div class='editCreditBox'>
                    <span class=\"label label-sm label-info \" style=\"cursor:pointer\" onclick=\"editCredit('{$rs["r_id"]}','A','{$rs["r_count"]}','i');\"> <i class=\"fa fa-plus\" aria-hidden=\"true\"></i> </span>
                    <span class=\"label label-sm label-info \" style=\"cursor:pointer\" onclick=\"editCredit('{$rs["r_id"]}','A','{$rs["r_count"]}','r');\"> <i class=\"fa fa-minus\" aria-hidden=\"true\"></i> </span>
                    </div>
                </td>
                <td align=\"right\" style=\"vertical-align:middle;\"> "._cbp($x_count_member+$re3["xtotal"],2)."</td>
                <td align=\"right\" style=\"vertical-align:middle;\"> "._cbp($x_count,2)."</td>
                <td align=\"right\" style=\"background: #f6f6f6; vertical-align:middle;\">  </td>
                <td align=\"right\" style=\"background: #f6f6f6; vertical-align:middle;\">  </td>
                <td align=\"right\" style=\"background: #f6f6f6; vertical-align:middle;\">  </td>
                <th align=\"center\" width=\"35%\" style=\"vertical-align:middle;\">
                    <center>
                        <a onclick=\"getMenu('editMember/member_detail','?id={$rs["r_id"]}&futype={$futype}&page={$page}');\">
                            <button class=\"btn btn-white\" style=\"padding:2px 5px;\">
                                <i class=\"fa fa-pencil\" aria-hidden=\"true\"></i> {$lang_userList[28]}
                            </button>
                        </a>
                         <a onclick=\"getMenu('memberUserList/editPercent','?rid={$rs["r_id"]}');\">
                            <button class=\"btn btn-white\" style=\"padding:2px 5px;\">
                                <i class=\"fa fa-pencil-square\" aria-hidden=\"true\"></i>  {$lang_userList[29]} 
                            </button>
                        </a>
                         <button style=\"display:none;\" class=\"btn btn-white\" style=\"padding:2px 5px;\" onclick=\"viewLogUser('{$rs["r_user"]}','{$rs["r_id"]}','{$futype}');\">
                            <i class=\"fa fa-search-plus\" aria-hidden=\"true\"></i> {$lang_userList[30]}  
                         </button>
                         <button class=\"btn btn-white\" style=\"padding:2px 5px;\" onclick=\"changePaswd('{$rs["r_user"]}','{$rs["r_id"]}','{$futype}');\">
                            <i class=\"fa fa-key\" aria-hidden=\"true\"></i> {$lang_userList[31]} 
                         </button>
                        <button class=\"btn btn-white\" style=\"padding:2px 5px;\" onclick=\"copyUser('{$rs["r_id"]}','a');\">
                            <i class=\"fa fa-copyright\" aria-hidden=\"true\"></i> {$lang_userList[32]}
                        </button>
                    </center>
                </th>
            </tr>"; 

        }


      }else{  // กรณีที่ มีทั้ง member และ agent  หรือ มีเฉพาะ member อย่างเดียว

       

        $row_mPerPage = ($start+$rowPerPage)-$ag_num_row;  // หาแถวที่เป้นแถวของ member
        $row_agPerPage = $rowPerPage-$row_mPerPage; // หาแถวที่เป้นแถวของ agent

        // ถ้าหน้าที่เลือก มีทั้ง agent และ member รวมกัน  ##############################################################################
        if($row_agPerPage > 0)    
        {  #####################


          ###################  load agent ################
           $futype = "A";
           $sql_limit= "select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' $qq_ag $qq1_ag and r_level=$lv $sort_ag LIMIT {$start} , {$row_agPerPage}";

            // $pagi_data["ag_sql_limit"]  = $sql_limit;  
            $re=sql_query($sql_limit);
    		 $pagi_data["load"]  = "mix"; 
            $list="";
            $no = $rowPerPage*($page-1);
            $up_lv = $lv+1;
    
            while($rs=sql_fetch($re)){
                if($rs["r_active"]  == 1)
                {
                    $active1 = "selected";
                    $active2 = "";
                }else{
                    $active1 = "";
                    $active2 = "selected";
                }
    
                 // ยอดเครดิตทีเปิดให้ member 
  $d_incre = strtotime("-7 day");
  $sql = "select sum(b_total) as btotal from bom_tb_football_bill where  m_agent_id like '%*".$rs["r_id"]."*%'  and r_cut_bet_4=0";
  $reb1 = sql_array($sql);
  $sql = "select sum(b_total) as btotal from bom_tb_lotto_bill_live where  m_agent_id like '%*".$rs["r_id"]."*%' and b_status=5";
  $reb2 = sql_array($sql);
  $sql = "select sum(b_total) as btotal from bom_tb_lotto_hun_bill where  m_agent_id like '%*".$rs["r_id"]."*%' and play_timestam >= $d_incre";
  $reb3 = sql_array($sql);
  $sql = "select sum(b_total) as btotal from bom_tb_games_bill_play where  m_agent_id like '%*".$rs["r_id"]."*%' and play_timestam >= $d_incre";
  $reb4 = sql_array($sql);
  $sum_kank2 = $reb1["btotal"] + $reb2["btotal"] + $reb3["btotal"] + $reb4["btotal"];

  $sql = "select r_count as xtotal , r_type from bom_tb_agent where r_id=".$rs["r_id"];
  $re4 = sql_array($sql);

  $rtype = "m_count";
  $sql = "select sum($rtype) as xtotal from bom_tb_member where  m_agent_id like '%*".$rs["r_id"]."*%'";
  $re5 = sql_array($sql);

  // ยอดรวมเครดิตที่โอนให้ member
  $x_count_member = ($re5["xtotal"] + $sum_kank2);

            $sql="select sum(r_count) as xtotal from bom_tb_agent where   r_agent_id like '%*".$rs["r_id"]."*%' and r_level=$up_lv  ";
            $re3=sql_array($sql);
            $x_count=$rs["r_count"]-($x_count_member+$re3["xtotal"]);
    
                $no ++;
                $rs["r_name"] = ($rs["r_name"] != "") ? $rs["r_name"] : $lang_userList[15];
    
                $list .="<tr>
                    <td align=\"center\" style=\"vertical-align:middle;\">{$no}</td>
                    <td align=\"left\" width=\"15%\" style=\"vertical-align:middle;\">
                       {$agent_ico} <strong>{$rs["r_user"]}</strong> ({$rs["r_name"]}) </td>
                    <td align=\"center\" width=\"9%\" style=\"vertical-align:middle;\">
                        <select class=\"form-control sm-select input-sm\" id=\"\" name=\"\" onchange=\"changeStatus('{$rs["r_id"]}','A',this);\">
                            <option value=\"1\" ".$active1.">{$lang_userList[5]}</option>
                            <option value=\"0\" ".$active2.">{$lang_userList[6]}</option>
                        </select>
                    </td>
                    <td align=\"right\" style=\"vertical-align:middle; text-align: center; min-width: 75px;\">
                        ".number_format($rs["r_count"],2)."
                        <div class='editCreditBox'>
                        <span class=\"label label-sm label-info \" style=\"cursor:pointer\" onclick=\"editCredit('{$rs["r_id"]}','A','{$rs["r_count"]}','i');\"> <i     class=\"fa fa-plus\" aria-hidden=\"true\"></i> </span>
                        <span class=\"label label-sm label-info \" style=\"cursor:pointer\" onclick=\"editCredit('{$rs["r_id"]}','A','{$rs["r_count"]}','r');\"> <i     class=\"fa fa-minus\" aria-hidden=\"true\"></i> </span>
                        </div>
                    </td>
                    <td align=\"right\" style=\"vertical-align:middle;\"> "._cbp($x_count_member+$re3["xtotal"],2)." </td>
                    <td align=\"right\" style=\"vertical-align:middle;\"> "._cbp($x_count,2)." </td>
                    <td align=\"right\" style=\"background: #f6f6f6; vertical-align:middle;\">  </td>
                    <td align=\"right\" style=\"background: #f6f6f6; vertical-align:middle;\">  </td>
                    <td align=\"right\" style=\"background: #f6f6f6; vertical-align:middle;\">  </td>
                    <th align=\"center\" width=\"35%\" style=\"vertical-align:middle;\">
                        <center>
                            <a onclick=\"getMenu('editMember/member_detail','?id={$rs["r_id"]}&futype={$futype}&page={$page}');\">
                                <button class=\"btn btn-white\" style=\"padding:2px 5px;\">
                                    <i class=\"fa fa-pencil\" aria-hidden=\"true\"></i> {$lang_userList[28]}
                                </button>
                            </a>
                             <a onclick=\"getMenu('memberUserList/editPercent','?rid={$rs["r_id"]}');\">
                                <button class=\"btn btn-white\" style=\"padding:2px 5px;\">
                                    <i class=\"fa fa-pencil-square\" aria-hidden=\"true\"></i>  {$lang_userList[29]} 
                                </button>
                            </a>
                             <button style=\"display:none;\" class=\"btn btn-white\" style=\"padding:2px 5px;\" onclick=\"viewLogUser('{$rs["r_user"]}','{$rs["r_id"]   }','{$futype}');\">
                                <i class=\"fa fa-search-plus\" aria-hidden=\"true\"></i> {$lang_userList[30]}  
                             </button>
                             <button class=\"btn btn-white\" style=\"padding:2px 5px;\" onclick=\"changePaswd('{$rs["r_user"]}','{$rs["r_id"]}','{$futype}   ');\">
                                <i class=\"fa fa-key\" aria-hidden=\"true\"></i> {$lang_userList[31]} 
                             </button>
                            <button class=\"btn btn-white\" style=\"padding:2px 5px;\" onclick=\"copyUser('{$rs["r_id"]}','a');\">
                                <i class=\"fa fa-copyright\" aria-hidden=\"true\"></i> {$lang_userList[32]}
                            </button>
                        </center>
                    </th>
                </tr>"; 
    
            }


            ###################  load member ################

            $start_member = 0; // กำหนดแถวแรกของ member ให้เป็นแถวที่ 0
            $futype = "M";
            $pagi_data["load"]  = "mix";
            $sql_limit= "select * from bom_tb_member   where  m_agent_id = '$r_agent_id' $qq $qq1 $sort LIMIT {$start_member} , {$row_mPerPage}";+
            $re=sql_query($sql_limit);

            while($rs=sql_fetch($re)){
              $no ++;

              if($rs["m_active"]  == 1)
              {
                  $m_active1 = "selected";
                  $m_active2 = "";
              }else{
                  $m_active1 = "";
                  $m_active2 = "selected";
              }

              $rs["m_name"] = ($rs["m_name"] != "") ? $rs["m_name"] : $lang_userList[15];

              $list .= "<tr>
                                         <td align='center' style='vertical-align:middle;'> {$no} </td>
                                         <td align='left' width='15%' style='vertical-align:middle;'>
                                              {$member_ico} <strong>{$rs["m_user"]}</strong> ({$rs["m_name"]})
                                             </td>
                                          <td align='center' width='9%' style='vertical-align:middle;'>
                                               <select class='form-control sm-select input-sm' id='' name='' onchange=\"changeStatus('{$rs["m_id"]}','M',this);\">
                                                    <option value=\"1\" ".$m_active1.">{$lang_userList[5]}</option>
                                                    <option value=\"0\" ".$m_active2.">{$lang_userList[6]}</option>
                                              </select>
                                          </td>
                                         <td align='right' style='vertical-align:middle;text-align: center; min-width: 75px;'>
                                             ".number_format($rs["m_count"],2)."
                                             <div class='editCreditBox'>
                                                 <span class='label label-sm label-info ' style='cursor:pointer' onclick=\"editCredit('{$rs["m_id"]}','M','{$rs["m_count"]}','i');\"> 
                                                   <i class='fa fa-plus' aria-hidden='true'></i> 
                                                 </span>
                                               
                                             <span class='label label-sm label-info ' style='cursor:pointer' onclick=\"editCredit('{$rs["m_id"]}','M','{$rs["m_count"]}','r');\"> 
                                               <i class='fa fa-minus' aria-hidden='true'></i> 
                                             </span>
                                             </div>  
                                             </td>
                                          <td align=\"right\" style=\"background: #f6f6f6; vertical-align:middle;\">  </td>
                                          <td align=\"right\" style=\"background: #f6f6f6; vertical-align:middle;\">  </td>    
                                         <td align='right' style='vertical-align:middle;'> 0.00 </td>
                                         <td align='right' style='vertical-align:middle;'> 0.00</td>
                                         <td align='right' style='vertical-align:middle;'><font id='outstanding'> 0.00 </font></td>
                                          <th align='center' width='' style='vertical-align:middle;'>
                                              <center>
                                                 <a onclick=\"getMenu('editMember/member_detail','?id={$rs["m_id"]}&futype={$futype}&page={$page}');\">
                                                       <button class='btn btn-white' style='padding:2px 5px;'>
                                                       <i class='fa fa-pencil' aria-hidden='true'></i> {$lang_userList[28]} </button>
                                                   </a>
                                                 <button class='btn btn-white' style='padding:2px 5px;' onclick=\"viewLogUser('{$rs["m_user"]}','{$rs["m_id"]}','{$futype}');\">
                                                    <i class='fa fa-search-plus' aria-hidden='true'></i> {$lang_userList[30]} </button>
                                                     <button class='btn btn-white' style='padding:2px 5px;' onclick=\"changePaswd('{$rs["m_user"]}','{$rs["m_id"]}','{$futype}');\">
                                                   <i class='fa fa-key' aria-hidden='true'></i> {$lang_userList[31]} </button>
                                                     <button class='btn btn-white' style='padding:2px 5px;' onclick=\"copyUser('{$rs["m_id"]}','{$futype}');\">
                                                     <i class='fa fa-copyright' aria-hidden='true'></i> {$lang_userList[32]} </button>
                                                 </center>
                                         </th>
                                  </tr> "; 

            }  

        }else // ถ้าหน้าที่เลือกมีเฉพาะ member ###############################################################################################
        {
            $row_mPerPage = ($start+$rowPerPage)-$ag_num_row;  // หาแถวที่เป้นแถวของ member
            $start = $row_mPerPage- $rowPerPage;  

            $futype = "M";
            $sql_limit= "select * from bom_tb_member   where  m_agent_id = '$r_agent_id' $qq $qq1 $sort LIMIT {$start} , {$rowPerPage}";
            $re=sql_query($sql_limit);
            // $list="";
             $pagi_data["load"]  = 'Member'; 
            $no = $rowPerPage*($page-1);
            while($rs=sql_fetch($re)){
              $no ++;

              if($rs["m_active"]  == 1)
              {
                  $m_active1 = "selected";
                  $m_active2 = "";
              }else{
                  $m_active1 = "";
                  $m_active2 = "selected";
              }

              $rs["m_name"] = ($rs["m_name"] != "") ? $rs["m_name"] : $lang_userList[15];

              $list .= "<tr>
                                         <td align='center' style='vertical-align:middle;'> {$no} </td>
                                         <td align='left' width='15%' style='vertical-align:middle;'>
                                               {$member_ico} <strong>{$rs["m_user"]}</strong> ({$rs["m_name"]})  
                                             </td>
                                          <td align='center' width='9%' style='vertical-align:middle;'>
                                               <select class='form-control sm-select input-sm' id='' name='' onchange=\"changeStatus('{$rs["m_id"]}','M',this);\">
                                                    <option value=\"1\" ".$m_active1.">{$lang_userList[5]}</option>
                                                    <option value=\"0\" ".$m_active2.">{$lang_userList[6]}</option>
                                              </select>
                                          </td>
                                         <td align='right' style='vertical-align:middle;text-align: center; min-width: 75px;'>
                                             ".number_format($rs["m_count"],2)." 
                                             <div class='editCreditBox'>
                                                 <span class='label label-sm label-info ' style='cursor:pointer' onclick=\"editCredit('{$rs["m_id"]}','M','{$rs["m_count"]}','i');\"> 
                                                   <i class='fa fa-plus' aria-hidden='true'></i> 
                                                 </span>
                                             <span class='label label-sm label-info ' style='cursor:pointer' onclick=\"editCredit('{$rs["m_id"]}','M','{$rs["m_count"]}','r');\"> 
                                               <i class='fa fa-minus' aria-hidden='true'></i> 
                                             </span>
                                             </div>
                                             </td>
                                          <td align=\"right\" style=\"background: #f6f6f6; vertical-align:middle;\">  </td>
                                          <td align=\"right\" style=\"background: #f6f6f6; vertical-align:middle;\">  </td>    
                                         <td align='right' style='vertical-align:middle;'> 0.00 </td>
                                         <td align='right' style='vertical-align:middle;'> 0.00</td>
                                         <td align='right' style='vertical-align:middle;'><font id='outstanding'> 0.00 </font></td>
                                          <th align='center' width='' style='vertical-align:middle;'>
                                              <center>
                                                 <a onclick=\"getMenu('editMember/member_detail','?id={$rs["m_id"]}&futype={$futype}&page={$page}');\">
                                                       <button class='btn btn-white' style='padding:2px 5px;'>
                                                       <i class='fa fa-pencil' aria-hidden='true'></i> {$lang_userList[28]} </button>
                                                   </a>
                                                 <button class='btn btn-white' style='padding:2px 5px;' onclick=\"viewLogUser('{$rs["m_user"]}','{$rs["m_id"]}','{$futype}');\">
                                                    <i class='fa fa-search-plus' aria-hidden='true'></i> {$lang_userList[30]} </button>
                                                     <button class='btn btn-white' style='padding:2px 5px;' onclick=\"changePaswd('{$rs["m_user"]}','{$rs["m_id"]}','{$futype}');\">
                                                   <i class='fa fa-key' aria-hidden='true'></i> {$lang_userList[31]} </button>
                                                     <button class='btn btn-white' style='padding:2px 5px;' onclick=\"copyUser('{$rs["m_id"]}','{$futype}');\">
                                                     <i class='fa fa-copyright' aria-hidden='true'></i> {$lang_userList[32]} </button>
                                                 </center>
                                         </th>
                                  </tr> "; 

            }  

        }
      }

      if($list == "")
      {
            $list = "<tr>
                           <td align='center' class='text-danger' colspan='100%'> {$lang_message[1]} </td>
                     </tr> "; 
      }


      $data = array(
        "head" => $head,
        "status" => true, 
        "list" => $list,
        "pagi_data" => $pagi_data
      );

      echo json_encode($data);

  
  ?>