<?php
  ob_start(); if (!isset($_SESSION)) { session_start(); }
  
 if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
  }

  require('../lang/ag_'.$_SESSION["AGlang"].'.php');
  require('../inc/conn.php');
  require('../inc/function.php');

    $data = [];

    $agent_ico = "[<i class=\"ace-icon fa fa-users bigger-140 bg-icon\"></i>] ";
    $member_ico = "[<i class=\"ace-icon fa fa-user bigger-140 bg-icon\"></i>] ";
  $head = "
    <tr>
      <th rowspan='3' class='center'> {$lang_memberUserKeep[14]} </th>
      <th rowspan='3' class='center'>{$lang_memberUserKeep[15]} </th>
      <th rowspan='3'> {$lang_memberUserKeep[16]} </th>
      <th colspan='100%'><center> {$lang_memberUserKeep[17]} </center></th>
    </tr>
    <tr>";
     foreach ($lang_g["list_share"] as $key => $value) {
        $head .="<th>
                   <div class='checkbox'>
                     <label> 
                       <input class='ace ace-checkbox-2' type='checkbox' onchange=\"ckGames('setup_".$key."');\" id='cka_setup_".$key."'>  
                       <span class='lbl'> ".$value." </span>
                     </label> 
                   </div>
                 </th> ";
     }
$head .= "</tr>
<tr>";
     foreach ($lang_g["list_share"] as $key => $value) {
        $head .="<th>
                    <table width='100%'>
                      <thead>
                        <tr>
                          <th></th>
                          <td>
                            <button type='button' class='btn btn-light btn-success btn-block btn-xs ck_setup_".$key."' onclick=\"setAllSl('setup_".$key."','min');\" disabled='disabled'>{$lang_memberUserKeep[18]}</button>
                          </td>
                          <td>
                            <button type='button' class='btn btn-light btn-success btn-block btn-xs ck_setup_".$key."' onclick=\"setAllSl('setup_".$key."','max');\" disabled='disabled'>{$lang_memberUserKeep[19]}</button>
                          </td>
                        </tr>
                     </thead>
                   </table>
                 </th> ";
     }
$head .= "</tr>";


    $list_sort = $_POST["list_sort"];                                     
    $qq = "";
    if($_POST["fuser"] != "")
    {
      $serch_text = $_POST["fuser"];
      $qq_ag  = "and (r_user like '%$serch_text%' or r_name like '%$serch_text%')";
    }                                  
                                      
    $sort = "";
    if($list_sort == 1) // เรียงตามวันที่สร้าง มาก-น้อย
    {
        $sort_ag  = " order by `r_regis` desc";
    }else  if($list_sort == 2) //เรียงตามวันที่สร้าง น้อย - มาก
    {
        $sort_ag  = " order by `r_regis` asc";
    }else  if($list_sort == 3) // เรียงตามชื่อ มาก - น้อย
    {
        $sort_ag  = " order by `r_name` desc";
    } else  if($list_sort == 4) // เรียงตามชื่อ น้อย - มาก
    {
        $sort_ag  = " order by `r_name` asc";
    } 

    if($_POST["fuactive"] == '')
    {
         $qq1_ag = "";
    }else if($_POST["fuactive"] == 1) // เปิดใช้งาน
    {
         $qq1_ag  = "and (r_active = 1)";
    }else if($_POST["fuactive"] == 0) // ระงับ
    {
          $qq1_ag   = "and (r_active = 0)";
    }  

      $r_agent_id = $_SESSION["r_agent_id"].$_SESSION["r_id"]."*";
      $lv = intval($_SESSION["r_level"])+1;

      $sql="select count(r_id) as num from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_level=$lv $qq_ag $qq1_ag";
      $ag_num = sql_array($sql);
      $ag_num_row =   intval($ag_num['num']);

      $rowPerPage = intval($_POST["rowPerPage"]);
      $page       = intval($_POST["thisPage"]);
      $start      = ($page-1)*$rowPerPage;

      // $num_row = $ag_num_row + $mem_num_row;
      $num_row = $ag_num_row;

      $pagi_data["numrow"] =  $num_row;
      $pagi_data["rowPerPage"] =  $rowPerPage;
      $pagi_data["total_page"] = ceil($num_row/$rowPerPage); 
      $pagi_data["active_page"] = $page;
      $pagi_data["start_page"]  = $start;

          $futype = "A";

          $sql_limit= "select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' $qq_ag $qq1_ag and r_level=$lv $sort_ag LIMIT {$start} , {$rowPerPage}";
          $re=sql_query($sql_limit);

          $list="";
          $no = $rowPerPage*($page-1);
          $up_lv = $lv+1;

          while($rs=sql_fetch($re)){
             $no ++;  
             $rs["r_name"] = ($rs["r_name"] != "") ? $rs["r_name"] : $lang_memberUserKeep[20];

             $share = [];
             $ex_r_sport_share = explode(",", $rs["r_sport_share"]);
             $ex_r_sport_share_live = explode(",", $rs["r_sport_share_live"]);
             $ex_r_lotto_share = explode(",", $rs["r_lotto_share"]);
             $ex_r_lotto_hun_share = explode(",", $rs["r_lotto_hun_share"]);
             $ex_r_lotto_hun_set_share = explode(",", $rs["r_lotto_hun_set_share"]);
             $ex_r_games_share = explode(",", $rs["r_games_share"]);
             $ex_r_casino_share = explode(",", $rs["r_casino_share"]);


             $share[1] = $ex_r_sport_share[1];
             $share[2] = $ex_r_sport_share_live[1];
             $share[3] = $ex_r_sport_share[2];
             $share[4] = $ex_r_sport_share_live[2];
             $share[5] = $ex_r_sport_share[3];
             $share[6] = $ex_r_sport_share_live[3];
             $share[7] = $ex_r_sport_share[4];
             $share[8] = $ex_r_lotto_share[1];
             $share[9] = $ex_r_lotto_hun_share[1];
             $share[10] = $ex_r_lotto_hun_set_share[1];
             $share[11] = $ex_r_games_share[1];

             foreach ($ex_r_casino_share as $key => $value) {
                if($key > 0){ $share[]=$value; }
             }

             // r_sport_share
             // r_sport_share_live
             // r_games_share
             // r_lotto_share
             // r_lotto_hun_share
             // r_lotto_hun_set_share
             // r_casino_share

             // $xxx = implode(",",$share);

      $list.= "
        <tr>
          <td align='center' style='vertical-align:middle;'>{$no}</td>
          <td>
            <div class='ace-settings-item center'>
              <input type='checkbox' class='ace ace-checkbox-2' onchange=\"ckEdit('{$rs['r_user']}',{$rs['r_id']});\" id='{$rs['r_user']}'>
              <label class='lbl' for='ace-settings-navbar'></label>
            </div>
          </td>
          <td class='text-left'>{$agent_ico}<strong>{$rs['r_user']}</strong>({$rs['r_name']})</td>";
           foreach ($lang_g["list_share"] as $key => $value) {
              $_value = ($share[$key] == "") ? 0 : $share[$key];
              $list.= " <td>
                  <select class='form-control col-xs-12 col-sm-4 input-sm select_{$rs['r_user']}' id='{$rs['r_user']}_setup_".$key."' name='setup_".$key."' disabled='disabled' onchange=\"setSl('setup_".$key."','{$rs['r_user']}','{$rs['r_id']}','ag');\">
                     <option value='$_value' selected='selected'>$_value</option>
                  </select>
                </td>";
            } 
     $list.= "     
        </tr>
      ";   
      }

    if($list == "")
    {
      $list = "
        <tr>
          <td align='center' class='text-danger' colspan='100%'> {$lang_message[1]} </td>
        </tr>
      ";
    }

      $data = array(
      "head"        =>  $head,
      "status"      =>  true, 
      "list"        =>  $list,
      "pagi_data"   =>  $pagi_data
    );


  echo json_encode($data);
?>