<?

if($_POST["lang"]==""){
    $_SESSION["AGlang"]="th";
}else{
    $_SESSION["AGlang"]=$_POST["lang"];
}   

require('../../lang/sa_lang.php');
require('../conn.php');
require('../function.php');
require('../../../lang/function_array.php');

$view_date=_bdate();

  $cb_sc = $_POST["cb_sc"]; // ประเภทเกมส์ ฟุตบอล
  $cb_sp = $_POST["cb_sp"]; // ประเภทเกมส์ กีฬา
  $cb_bx = $_POST["cb_bx"]; // ประเภทเกมส์ มวยไทย
  $cb_st = $_POST["cb_st"]; // ประเภทเกมส์ สเต็ป
  $cb_lg = $_POST["cb_lg"]; // ประเภทเกมส์ หวย
  $cb_ls = $_POST["cb_ls"]; // ประเภทเกมส์ หวยหุ้น
  $cb_ll = $_POST["cb_ll"]; // ประเภทเกมส์ หวยชุด
  $cb_gm = $_POST["cb_gm"]; // ประเภทเกมส์ เกมส์
  $cb_cn = $_POST["cb_cn"]; // ประเภทเกมส์ คาสิโน
  $cb_suggest= $_POST["cb_suggest"]; // ประเภทเกมส์ แนะนำเพื่อน

  $chk_currency_THB = $_POST["chk_currency_THB"]; // สกุลเงิน
  $chk_currency_USD = $_POST["chk_currency_USD"]; // สกุลเงิน
  $chk_currency_MOP = $_POST["chk_currency_MOP"]; // สกุลเงิน
  $chk_currency_HKD = $_POST["chk_currency_HKD"]; // สกุลเงิน
  $chk_currency_CNY = $_POST["chk_currency_CNY"]; // สกุลเงิน
  $chk_currency_MMK = $_POST["chk_currency_MMK"]; // สกุลเงิน
  $chk_currency_LAK = $_POST["chk_currency_LAK"]; // สกุลเงิน
  $chk_currency_KHR = $_POST["chk_currency_KHR"]; // สกุลเงิน
  $chk_currency_VND = $_POST["chk_currency_VND"]; // สกุลเงิน
  $chk_currency_IDR = $_POST["chk_currency_IDR"]; // สกุลเงิน
  $chk_currency_MYR = $_POST["chk_currency_MYR"]; // สกุลเงิน
  $chk_currency_EUR = $_POST["chk_currency_EUR"]; // สกุลเงิน
  
  if($chk_currency_THB==1){
	  $cu1="THB";
	  }
  if($chk_currency_USD==1){
	  $cu2="USD";
	  }
  if($chk_currency_MOP==1){
	  $cu3="MOP";
	  }
  if($chk_currency_HKD==1){
	  $cu4="HKD";
	  }
  if($chk_currency_CNY==1){
	  $cu5="CNY";
	  }
  if($chk_currency_MMK==1){
	  $cu6="MMK";
	  }
  if($chk_currency_LAK==1){
	  $cu7="LAK";
	  }
  if($chk_currency_KHR==1){
	  $cu8="KHR";
	  }
  if($chk_currency_VND==1){
	  $cu9="VND";
	  }
  if($chk_currency_IDR==1){
	  $cu10="IDR";
	  }
  if($chk_currency_MYR==1){
	  $cu11="MYR";
	  }
  if($chk_currency_EUR==1){
	  $cu12="EUR";
	  }

  $lv = sql_escape_str($_POST["level"]);  // เลเวล ของคนที่เรากดดู
  $id = ($_POST['id'] == "") ? " " :  sql_escape_str($_POST["id"]);  // id ของคนที่เรากดดู

  $e= $_POST["d"];  // วันที่เริ่มต้น
  $d= $_POST["e"];  // วันที่สิ้นสุด
  
  #####################DATE
$sdd=@explode("-",$e); 
$edate=$sdd[2].'-'.$sdd[1].'-'.$sdd[0]; 

$edd=@explode("-",$d); 
$ddate=$edd[2].'-'.$edd[1].'-'.$edd[0]; 
  

  $rowPerPage = intval($_POST["rowPerPage"]);  // จำนวนข้อมูลที่จะแสดง ต่อ หน้า
  $page       = intval($_POST["thisPage"]); // ระบุว่า เราอยู่ หน้าใหน

                    
  if($id== "" || $lv == "") // gt level1
  {
    $lv = 1;
  }
  else  
  {
    $sql= "select r_id , r_agent_id , r_user ,r_level from bom_tb_agent where r_id = '".$id."' and r_level = '".$lv."' ";
    $re_agent=sql_array($sql);

    $r_agent_id = $re_agent["r_agent_id"].$re_agent["r_id"]."*";
    $lv = intval($re_agent["r_level"])+1;
  }


  
  $start      = ($page-1)*$rowPerPage;

  $num_row = 0;

  $pagi_data["numrow"] =  $num_row;
  $pagi_data["rowPerPage"] =  $rowPerPage;
  $pagi_data["total_page"] = 1; 
  $pagi_data["active_page"] = $page;
  $pagi_data["start_page"]  = $start;


        
        $row_agPerPage = $rowPerPage; 
        $ag_num_row = 0;
        $ar_sum = array();


             // ดึง agent;
             $sql= "select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_level=".$lv." LIMIT {$start} , {$row_agPerPage}";
             $re=sql_query($sql);
             $list = "";
             while($rs=sql_fetch($re)){

               $_link = "?";
               foreach ($_POST as $key => $value) {

                 if($key == "id")
                 {
                   $value = $rs['r_id'];
                 }else if($key == "level")
                 {
                   $value = $rs['r_level'];
                 }else if($key == "h")
                 {
                    $h = $value.'|'.$rs['r_level'].'^'.$rs['r_user'].'^'.$rs['r_id'].'^A';
                    if(empty($_POST['level']))
                    {
                      $h = substr($h, 1);
                    }
                    
                    $value = $h;
                 }

                 $_link.=$key."=".$value."&";
               
               }

               $h = $_POST['h'].'|'.$rs['r_level'].'^'.$rs['r_user'].'^'.$rs['r_id'].'^A';
               $h = substr($h, 1);
			   
			   
				   $r_level=$rs['r_level'];
				   $ag_level=$rs['r_level'];
				######################
				include("inc_ag_share.php");
				include("inc_m1.php");
          if($sum0>0.00){ 
              $ar_sum["sum0"][] = $sum0;
			  
			        $ar_sum["sum1"][] = $sum1;
              $ar_sum["sum2"][] = $sum2;
              $ar_sum["sum3"][] = $sum3;
              $ar_sum["sum4"][] = $sum4;
			  
			         $ar_sum["sum5"][] = $sum5;
              $ar_sum["sum6"][] = $sum6;
              $ar_sum["sum7"][] = $sum7;
              $ar_sum["sum8"][] = $sum8;


               $list .= "<tr>
                            <td>
                              <a href='$_link'>
                                  <i class='fa fa-user-secret'></i> ".$rs['r_user']." [ ".$rs['r_name']." ]
                              </a>
                            </td>
                            <td class='aign_r'>".$rs['r_currency']."</td>
                            <td class='aign_r'>"._cbp($sum0,2)."</td>
							
                            <td class='aign_r col_a'>"._cbp($sum1,2)."</td>
                            <td class='aign_r col_a'>"._cbp($sum2,2)."</td>
                            <td class='aign_r col_a'>"._cbp($sum3,2)."</td>
                            <td class='aign_r col_a'>"._cbp($sum4,2)."</td>
							
                            <td class='aign_r col_b'>"._cbp($sum5,2)."</td>
                            <td class='aign_r col_b'>"._cbp($sum6,2)."</td>
                            <td class='aign_r col_b'>"._cbp($sum7,2)."</td>
                            <td class='aign_r col_b'>"._cbp($sum8,2)."</td>
                      </tr>";

                      $ag_num_row++;

             }
            }


             $row_mPerPage = $rowPerPage-$ag_num_row;  // หาแถวที่เป้นแถวของ member
			  
			 

            $start_member = 0; // กำหนดแถวแรกของ member ให้เป็นแถวที่ 0
            $sql= "select * from bom_tb_member where  m_agent_id like '%$r_agent_id%' and m_level=".$lv." LIMIT {$start_member} , {$row_mPerPage}";
            $re_m=sql_query($sql);

            while($rs=sql_fetch($re_m)){
               $_link = "?";
               foreach ($_POST as $key => $value) {

                 if($key == "id")
                 {
                   $value = $rs['m_id'];
                 }else if($key == "level")
                 {
                   $value = $rs['m_level'];
                 }else if($key == "p")
                 {
                   $value = "winloss_type";
                 }else if($key == "h")
                 {
                    $h = $_POST['h'].'|'.$rs['m_level'].'^'.$rs['m_user'].'^'.$rs['m_id'].'^M';
                    if(empty($_POST['level']))
                    {
                      $h = substr($h, 1);
                    }
                    $value = $h;
                 }

                 $_link.=$key."=".$value."&";
               
               }
			   
				 $r_level=$rs['m_level'];
				 $ag_level=$rs['m_level']-1;
				######################
				include("inc_ag_share.php");
				include("inc_m3.php");
				######################
       	    if($sum0>0.00){ 

              $ar_sum["sum0"][] = $sum0;
			  
			        $ar_sum["sum1"][] = $sum1;
              $ar_sum["sum2"][] = $sum2;
              $ar_sum["sum3"][] = $sum3;
              $ar_sum["sum4"][] = $sum4;
			  
			        $ar_sum["sum5"][] = $sum5;
              $ar_sum["sum6"][] = $sum6;
              $ar_sum["sum7"][] = $sum7;
              $ar_sum["sum8"][] = $sum8;

                $list .= "<tr>
                             <td>
                                <a href='$_link'>
                                  <i class='fa fa-user'></i> ".$rs['m_user']." [ ".$rs['m_name']." ]
                                </a>
                             </td>
                             <td class='aign_r'>".$rs['m_currency']."</td>
                            <td class='aign_r'>"._cbp($sum0,2)."</td>
							
                            <td class='aign_r col_a'>"._cbp($sum1,2)."</td>
                            <td class='aign_r col_a'>"._cbp($sum2,2)."</td>
                            <td class='aign_r col_a'>"._cbp($sum3,2)."</td>
                            <td class='aign_r col_a'>"._cbp($sum4,2)."</td>
							
                            <td class='aign_r col_b'>"._cbp($sum5,2)."</td>
                            <td class='aign_r col_b'>"._cbp($sum6,2)."</td>
                            <td class='aign_r col_b'>"._cbp($sum7,2)."</td>
                            <td class='aign_r col_b'>"._cbp($sum8,2)."</td>
                       </tr>";
				    }
        }



        if($list == "")
        {

             $list .= "<tr >
                            <td class='aign_c' colspan='100%'> ไม่พบข้อมูล </td>
                       </tr>";
        }


            $list .= "<tr class=\"col_footer\">
                    <td class=\"vaign_m\"  colspan=\"2\">Total</td>
                    <td class=\"aign_r\">"._cbp(@array_sum($ar_sum["sum0"]),2)."</td>
					
                    <td class=\"aign_r\">"._cbp(@array_sum($ar_sum["sum1"]),2)."</td>
                    <td class=\"aign_r\">"._cbp(@array_sum($ar_sum["sum2"]),2)."</td>
                    <td class=\"aign_r\">"._cbp(@array_sum($ar_sum["sum3"]),2)."</td>
                    <td class=\"aign_r\">"._cbp(@array_sum($ar_sum["sum4"]),2)."</td>
					
                    <td class=\"aign_r\">"._cbp(@array_sum($ar_sum["sum5"]),2)."</td>
                    <td class=\"aign_r\">"._cbp(@array_sum($ar_sum["sum6"]),2)."</td>
                    <td class=\"aign_r\">"._cbp(@array_sum($ar_sum["sum7"]),2)."</td>
                    <td class=\"aign_r\">"._cbp(@array_sum($ar_sum["sum8"]),2)."</td>
                  </tr>";





  $data = array(
    "status" => true, 
    "list" => $list,
    "pagi_data" => $pagi_data,
    // "sql" => $sql,
    "logs" => $logs 
  );

  echo json_encode($data);

?>