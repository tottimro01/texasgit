<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>

<?

require('inc/conn.php');
require('inc/function.php');


  if($_POST["futype"] == "M")
  {

      $data = [];

      $optionPage["listCount"] = 4;
      $optionPage["page"] = "1";


      $head = "<tr>
                    <th class=\"center\">ลำดับ </th>
                    <th>ชื่อผู้ใช้</th>
                    <th>&nbsp;&nbsp;สถานะ&nbsp;&nbsp;</th>
                    <th>เครดิต</th>
                    <th>กำไรขาดทุน</th>
                    <th>เครดิตพนัน</th>
                    <th>ยอดเล่นค้าง</th>
                    <th> การจัดการ </th>
               </tr>";

    $list_sort = $_POST["list_sort"];                                     
    $qq = "";
    if($_POST["fuser"] != "")
    {
      $serch_text = $_POST["fuser"];
      $qq = "and (m_user like '%$serch_text%' or m_name like '%$serch_text%')";
    }                                  
                                      
    $sort = "";
    if($list_sort == 1) // เรียงตามวันที่สร้าง มาก-น้อย
    {
        $sort = " order by `m_regis` desc";
    }else  if($list_sort == 2) //เรียงตามวันที่สร้าง น้อย - มาก
    {
        $sort = " order by `m_regis` asc";
    }else  if($list_sort == 3) // เรียงตามชื่อ มาก - น้อย
    {
        $sort = " order by `m_name` desc";
    } else  if($list_sort == 4) // เรียงตามชื่อ น้อย - มาก
    {
        $sort = " order by `m_name` asc";
    } 

    if($_POST["fuactive"] == '')
    {
         $qq1 = "";
    }else if($_POST["fuactive"] == 1) // เปิดใช้งาน
    {
         $qq1 = "and (m_active = 1)";
    }else if($_POST["fuactive"] == 0) // ระงับ
    {
          $qq1 = "and (m_active = 0)";
    }    
      
      $r_agent_id = $_SESSION["r_agent_id"].$_SESSION["r_id"]."*";

      $sql="select m_id from bom_tb_member   where  m_agent_id = '$r_agent_id' $qq $qq1";   
      $num_row = sql_num($sql); 


       //// pageination //

      $rowPerPage = $_POST["rowPerPage"];
      $page       = $_POST["thisPage"];
      $start      = ($page-1)*$rowPerPage;

      $pagi_data["numrow"] =  $num_row;
      $pagi_data["rowPerPage"] =  $rowPerPage;
      $pagi_data["total_page"] = ceil($num_row/$rowPerPage); 
      $pagi_data["active_page"] = intval($page);
      $pagi_data["start_page"]  = $start; 

     //// pageination //

      $sql_limit= "select * from bom_tb_member   where  m_agent_id = '$r_agent_id' $qq $qq1 $sort LIMIT {$start} , {$rowPerPage}";
      $re=sql_query($sql_limit);
      $list="";

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


        $list .= "<tr>
                                   <td align='center' style='vertical-align:middle;'> {$no} </td>
                                   <td align='left' width='20%' style='vertical-align:middle;'>
                                         <strong>{$rs["m_user"]}</strong> ({$rs["m_name"]})
                                       </td>
                                    <td align='center' width='9%' style='vertical-align:middle;'>
                                         <select class='form-control sm-select input-sm' id='' name='' onchange=\"changeStatus('{$rs["m_id"]}','M',this);\">
                                              <option value=\"1\" ".$m_active1.">เปิดใช้งาน</option>
                                              <option value=\"0\" ".$m_active2.">ระงับ</option>
                                        </select>
                                    </td>
                                   <td align='right' style='vertical-align:middle;'>
                                       ".number_format($rs["m_count"],2)." &nbsp;&nbsp;
                                           <span class='label label-sm label-info ' style='cursor:pointer' onclick=\"editCredit('{$rs["m_id"]}','M','{$rs["m_count"]}','i');\"> 
                                             <i class='fa fa-plus' aria-hidden='true'></i> 
                                           </span>
                                       <span class='label label-sm label-info ' style='cursor:pointer' onclick=\"editCredit('{$rs["m_id"]}','M','{$rs["m_count"]}','r');\"> 
                                         <i class='fa fa-minus' aria-hidden='true'></i> 
                                       </span>
                                       </td>
                                   <td align='right' style='vertical-align:middle;'> 9999 </td>
                                   <td align='right' style='vertical-align:middle;'> 9999</td>
                                   <td align='right' style='vertical-align:middle;'><font id='outstanding'> 9999 </font></td>
                                    <th align='center' width='' style='vertical-align:middle;'>
                                        <center>
                                           <a onclick=\"getMenu('editMember/member_detail','?id={$rs["m_id"]}&futype={$_POST["futype"]}');\">
                                                 <button class='btn btn-white' style='padding:2px 5px;'>
                                                 <i class='fa fa-pencil' aria-hidden='true'></i> รายละเอียด </button>
                                             </a>
                                           <button class='btn btn-white' style='padding:2px 5px;' onclick=\"viewLogUser('{$rs["m_user"]}','{$rs["m_id"]}','{$_POST["futype"]}');\">
                                              <i class='fa fa-search-plus' aria-hidden='true'></i> ประวัติ </button>
                                               <button class='btn btn-white' style='padding:2px 5px;' onclick=\"changePaswd('{$rs["m_user"]}','{$rs["m_id"]}','{$_POST["futype"]}');\">
                                             <i class='fa fa-key' aria-hidden='true'></i> เปลี่ยนรหัส </button>
                                               <button class='btn btn-white' style='padding:2px 5px;' onclick=\"copyUser('{$rs["m_id"]}','{$_POST["futype"]}');\">
                                               <i class='fa fa-copyright' aria-hidden='true'></i> คัดลอก </button>
                                           </center>
                                   </th>
                            </tr> "; 

      }     

      if($list == "")
      {
            $list = "<tr>
                           <td align='center' class='text-danger' colspan='100%'> ไม่พบข้อมูล </td>
                     </tr> "; 
      }
      $data = array(
        "head" => $head,
        "optionPage" => $optionPage, 
        "status" => true, 
        "list" => $list,
        "pagi_data" => $pagi_data
      );

      echo json_encode($data);

  }
########################################################################################## 
  else 
  {
      $data = [];

      $optionPage["listCount"] = 4;
      $optionPage["page"] = "1";


      $head = "<tr>
                  <th class=\"center\">ลำดับ </th>
                  <th>ชื่อผู้ใช้ ".$sql."</th>
                  <th>&nbsp;&nbsp;สถานะ&nbsp;&nbsp;</th>
                  <th>เครดิต</th>
                  <th>เครดิตที่เปิดให้สมาชิกทั้งหมด</th>
                  <th>เครดิตคงเหลือ</th>
                  <th> การจัดการ </th>
              </tr>";


    $lv = intval($_SESSION["r_level"])+1;

    $list_sort = $_POST["list_sort"];                                     
    $qq = "";
    if($_POST["fuser"] != "")
    {
      $serch_text = $_POST["fuser"];
      $qq = "and (r_user like '%$serch_text%' or r_name like '%$serch_text%')";
    }                                  
                                      
    $sort = "";
    if($list_sort == 1) // เรียงตามวันที่สร้าง มาก-น้อย
    {
        $sort = " order by `r_regis` desc";
    }else  if($list_sort == 2) //เรียงตามวันที่สร้าง น้อย - มาก
    {
        $sort = " order by `r_regis` asc";
    }else  if($list_sort == 3) // เรียงตามชื่อ มาก - น้อย
    {
        $sort = " order by `r_name` desc";
    } else  if($list_sort == 4) // เรียงตามชื่อ น้อย - มาก
    {
        $sort = " order by `r_name` asc";
    } 

    if($_POST["fuactive"] == '')
    {
         $qq1 = "";
    }else if($_POST["fuactive"] == 1) // เปิดใช้งาน
    {
         $qq1 = "and (r_active = 1)";
    }else if($_POST["fuactive"] == 0) // ระงับ
    {
          $qq1 = "and (r_active = 0)";
    }

    $r_agent_id = $_SESSION["r_agent_id"].$_SESSION["r_id"]."*";
    $sql="select r_id from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_level=$lv $qq $qq1";
    $num_row = sql_num($sql); 

     //// pageination //

      $rowPerPage = $_POST["rowPerPage"];
      $page       = $_POST["thisPage"];
      $start      = ($page-1)*$rowPerPage;

      $pagi_data["numrow"] =  $num_row;
      $pagi_data["rowPerPage"] =  $rowPerPage;
      $pagi_data["total_page"] = ceil($num_row/$rowPerPage); 
      $pagi_data["active_page"] = intval($page);
      $pagi_data["start_page"]  = $start; 
      $pagi_data["sql"]  = $sql; 

     //// pageination //

     

      $sql_limit= "select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' $qq $qq1 and r_level=$lv $sort LIMIT {$start} , {$rowPerPage}";

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

         $sql="select sum(r_count) as xtotal from bom_tb_agent where   r_agent_id like '%*".$rs["r_id"]."*%' and r_level=$up_lv  ";
         $re3=sql_array($sql);
         $x_count=$rs["r_count"]-$re3["xtotal"];

      $no ++;
        $list .="<tr>
                <td align=\"center\" style=\"vertical-align:middle;\">{$no}</td>
                <td align=\"left\" width=\"15%\" style=\"vertical-align:middle;\">
                    <strong>{$rs["r_user"]}</strong> ({$rs["r_name"]}) </td>
                <td align=\"center\" width=\"9%\" style=\"vertical-align:middle;\">
                    <select class=\"form-control sm-select input-sm\" id=\"\" name=\"\" onchange=\"changeStatus('{$rs["r_id"]}','A',this);\">
                        <option value=\"1\" ".$active1.">เปิดใช้งาน</option>
                        <option value=\"0\" ".$active2.">ระงับ</option>
                    </select>
                </td>
                <td align=\"right\" style=\"vertical-align:middle;\">
                    ".number_format($rs["r_count"],2)." &nbsp;&nbsp;
                    <span class=\"label label-sm label-info \" style=\"cursor:pointer\" onclick=\"editCredit('{$rs["r_id"]}','A','{$rs["r_count"]}','i');\"> <i class=\"fa fa-plus\" aria-hidden=\"true\"></i> </span>
                    <span class=\"label label-sm label-info \" style=\"cursor:pointer\" onclick=\"editCredit('{$rs["r_id"]}','A','{$rs["r_count"]}','r');\"> <i class=\"fa fa-minus\" aria-hidden=\"true\"></i> </span>
                </td>
                <td align=\"right\" style=\"vertical-align:middle;\"> 9999 </td>
                <td align=\"right\" style=\"vertical-align:middle;\"> "._cbp($x_count,2)." </td>
                <th align=\"center\" width=\"35%\" style=\"vertical-align:middle;\">
                    <center>
                        <a onclick=\"getMenu('editMember/member_detail','?id={$rs["r_id"]}&futype={$_POST["futype"]}');\">
                            <button class=\"btn btn-white\" style=\"padding:2px 5px;\">
                                <i class=\"fa fa-pencil\" aria-hidden=\"true\"></i> รายละเอียด
                            </button>
                        </a>
                         <a onclick=\"getMenu('memberUserList/editPercent','?rid={$rs["r_id"]}');\">
                            <button class=\"btn btn-white\" style=\"padding:2px 5px;\">
                                <i class=\"fa fa-pencil-square\" aria-hidden=\"true\"></i>  เปอร์เซ็นต์ 
                            </button>
                        </a>
                         <button style=\"display:none;\" class=\"btn btn-white\" style=\"padding:2px 5px;\" onclick=\"viewLogUser('{$rs["r_user"]}','{$rs["r_id"]}','{$_POST["futype"]}');\">
                            <i class=\"fa fa-search-plus\" aria-hidden=\"true\"></i> ประวัติ  
                         </button>
                         <button class=\"btn btn-white\" style=\"padding:2px 5px;\" onclick=\"changePaswd('{$rs["r_user"]}','{$rs["r_id"]}','{$_POST["futype"]}');\">
                            <i class=\"fa fa-key\" aria-hidden=\"true\"></i> เปลี่ยนรหัส 
                         </button>
                        <button class=\"btn btn-white\" style=\"padding:2px 5px;\" onclick=\"copyUser('{$rs["r_id"]}','a');\">
                            <i class=\"fa fa-copyright\" aria-hidden=\"true\"></i> คัดลอก
                        </button>
                    </center>
                </th>
            </tr>"; 

    }

      if($list == "")
      {
            $list = "<tr>
                           <td align='center' class='text-danger' colspan='100%'> ไม่พบข้อมูล </td>
                     </tr> "; 
      }
     $data = array(
        "head" => $head,
        "optionPage" => $optionPage, 
        "status" => true, 
        "list" => $list,
        "pagi_data" => $pagi_data
      );

      echo json_encode($data);         
  }


 ?>