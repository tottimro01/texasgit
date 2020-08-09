<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

 if($_SESSION["AGlang"]==""){
        $_SESSION["AGlang"]="th";
    }
  require('../../conn.php');
  require('../../function.php');
  require('../../ag_function.php');
  require('../../../lang/ag_lang.php');


   $list_type = array(); 
   if($_POST["sc"]!= "") { $list_type[] = $_POST["sc"]; }  // ประเภทเกมส์ ฟุตบอล
   if($_POST["sp"]!= "") { $list_type[] = $_POST["sp"]; }  // ประเภทเกมส์ กีฬา
   if($_POST["bx"]!= "") { $list_type[] = $_POST["bx"]; }  // ประเภทเกมส์ มวยไทย
   if($_POST["st"]!= "") { $list_type[] = $_POST["st"]; }  // ประเภทเกมส์ สเต็ป
   if($_POST["lg"]!= "") { $list_type[] = $_POST["lg"]; }  // ประเภทเกมส์ หวย
   if($_POST["ls"]!= "") { $list_type[] = $_POST["ls"]; }  // ประเภทเกมส์ หวยหุ้น
   if($_POST["ll"]!= "") { $list_type[] = $_POST["ll"]; }  // ประเภทเกมส์ หวยชุด
   if($_POST["gm"]!= "") { $list_type[] = $_POST["gm"]; }  // ประเภทเกมส์ เกมส์
   if($_POST["cn"]!= "") { $list_type[] = $_POST["cn"]; }  // ประเภทเกมส์ คาสิโน
   if($_POST["suggest"]!= "") { $list_type[] = $_POST["suggest"]; }  // ประเภทเกมส์ แนะนำเพื่อน
   
  # print_r($list_type);
   
 $sc=$_POST["sc"];
  $sp=$_POST["sp"];
   $bx=$_POST["bx"];
    $st=$_POST["st"];
	 $lg=$_POST["lg"];
	  $ls=$_POST["ls"];
	   $ll=$_POST["ll"];
	    $gm=$_POST["gm"];
		 $cn=$_POST["cn"];
		 $af=$_POST["suggest"];

   $lv= $_POST["ulv"];  // เลเวล ของคนที่เรากดดู
   $q =  $_POST['suser'];  // ค้นหาตามรหัส
   $userlist = $_POST['userlist'];   // ค่าที่ระบุว่า agent ที่กดดู อยู่ภายใต้กี่ขั้น 

   $e= $_POST["begin"];  // วันที่เริ่มต้น
   $d= $_POST["end"];  // วันที่สิ้นสุด

   $grouptype= $_POST["grouptype"];  // รหัส วันที่ หรือ ประเภท เกมส์   *-ยังไมได่้เอาไปใช้ตรงใหน-*

  $rowPerPage = intval($_POST["rowPerPage"]);  // จำนวนข้อมูลที่จะแสดง ต่อ หน้า
  $page       = intval($_POST["page"]);       // ระบุว่า เราอยู่ หน้าใหน
  


  #####################DATE
$sdd=@explode("-",$e); 
$edate=$sdd[2].'-'.$sdd[1].'-'.$sdd[0]; 

$edd=@explode("-",$d); 
$ddate=$edd[2].'-'.$edd[1].'-'.$edd[0]; 


  $logs = array(
            'sc' => $_POST['sc']." : ประเภทเกมส์ ฟุตบอล", 
            'sp' => $_POST['sp']." : ประเภทเกมส์  กีฬา", 
            'bx' => $_POST['bx']." : ประเภทเกมส์  มวยไทย", 
            'st' => $_POST['st']." : ประเภทเกมส์  สเต็ป", 
            'lg' => $_POST['lg']." : ประเภทเกมส์  หวย", 
            'ls' => $_POST['ls']." : ประเภทเกมส์  หวยหุ้น", 
            'll' => $_POST['ll']." : ประเภทเกมส์  หวยชุด", 
            'gm' => $_POST['gm']." : ประเภทเกมส์  เกมส์", 
            'cn' => $_POST['cn']." : ประเภทเกมส์  คาสิโน", 
            'suggest' => $_POST['suggest']." : ประเภทเกมส์  แนะนำเพื่อน", 
            'ulv' => $_POST['ulv']." : เลเวล ของคนที่เรากดดู", 
            'suser' => $_POST['suser']." : ค้นหาตามรหัส", 
            'begin' => $_POST['begin']." : วันที่เริ่มต้น", 
            'end' => $_POST['end']." : วันที่สิ้นสุด", 
            'grouptype' => $_POST['grouptype']." : รหัส วันที่ หรือ ประเภท เกมส์   *-ยังไมได่้เอาไปใช้ตรงใหน-*", 
            'rowPerPage' => $_POST['rowPerPage']." : จำนวนข้อมูลที่จะแสดง ต่อ หน้า", 
            'page' => $_POST['page']." : ระบุว่า เราอยู่ หน้าใหน", 
            'userlist' => $_POST['userlist']." : คนที่เรากดเข้ามาดู", 
          );

   /*
      $userlist เป็นค่าที่ระบุว่า agent ที่กดดู อยู่ภายใต้กี่ขั้น 
        อาทิเช่น 
        - 2_ab|3_abaaa^aasg^A
          - explode ด้วย |
            - 2_ab  หมายถึง  LV = 2  user = ab
            - 3_abaaa^aasg^A    หมายถึง  LV = 3 , user = abaaa , ชื่อ = aasg , เป็น Agent

        -2_ab|3_abtm123^1111^M
          - explode ด้วย |
            - 2_ab  หมายถึง  LV = 2  user = ab
            - 3_abtm123^1111^M    หมายถึง  LV = 3 , user = 3_abtm123 , ชื่อ = 1111 , เป็น Member

   */
   
#####################################

   
   
   
   
   
   if($userlist =="" )  // ถ้า โหลดครั้งแรก userlist จะไม่ถูกส่งมา แสดงว่า เป็น user ของคนที่ login 
   {
      $_lv = $_SESSION['r_level'];  // เลเวล ของคนที่ login
      $_user = $_SESSION['r_user'];  // user  ของคนที่ login
      $_name = $_SESSION['r_name']; // ชื่อ ของคนที่ login
      $type_user= "A";
      $userlist = $_lv."_".$_user;

   }else{  // ถ้า userlist ถูฏส่งมา แสดงว่า คลิกดู agent ภายใต้ของคนที่ login

      $ex_userlist = explode('|', $userlist);
      $last_userlist = end($ex_userlist);
      $ex2_user = explode('^', $last_userlist);

      $ex_last_userlist = explode('_', $ex2_user[0]);
      $_lv = $ex_last_userlist[0];
      $_user = $ex_last_userlist[1];
      $type_user = $ex2_user[2];  // อาจจะเป็น A หรือ M อยู่ที่เรากด user เข้ามาเป็น เอเย่นหรือ เมเมเบอร์

   }


      if($type_user == "A") //  ถ้า user ที่เรากดเข้ามาเป็น AGENT
      {

      # echo $_SESSION['r_id'];
	    $sql= "select r_id , r_agent_id , r_user , r_name ,r_level from bom_tb_agent where r_agent_id like '%".$_SESSION['r_agent_id']."%' and r_level = '".$_lv."' and r_user='".$_user."'";
        $re_agent=sql_array($sql);

        if($q != "")
        {
          $q_a = "and r_user like '%$q%'";
          $q_m = "and m_user like '%$q%'";
        }

        $r_agent_id = $re_agent["r_agent_id"].$re_agent["r_id"]."*";
		 $r_id = $re_agent["r_id"];
        $lv = intval($re_agent["r_level"])+1;

        // นับแถว

        $sql= "select count(r_id) as num from bom_tb_agent where  r_agent_id like '%$r_agent_id%' $q_a and r_level=".$lv."";
        $ag_num = sql_array($sql);
        $ag_num_row =   intval($ag_num['num']);

        $sql= "select count(m_id) as num from bom_tb_member where  m_agent_id like '%$r_agent_id%' $q_m and m_level=".$lv."";
        $mem_num = sql_array($sql); 
        $mem_num_row =   intval($mem_num['num']);

        $pagi_data["chknum"]["ag_num_row"]  =   intval($ag_num['num']);
        $pagi_data["chknum"]["mem_num_row"]  = intval($mem_num['num']);

       
        $start      = ($page-1)*$rowPerPage;

        $num_row = $ag_num_row + $mem_num_row;

        $pagi_data["numrow"] =  $num_row;
        $pagi_data["rowPerPage"] =  $rowPerPage;
        $pagi_data["total_page"] = ceil($num_row/$rowPerPage); 
        $pagi_data["active_page"] = $page;
        $pagi_data["start_page"]  = $start; 


        /*

        */
        if(($start+$rowPerPage) <= $ag_num_row)   // ถ้าหน้าที่เลือกเป็น agent ทั้งหมด ########################################################
        {

            // ดึง agent;
           $sql= "select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' $q_a and r_level=".$lv." LIMIT {$start} , {$rowPerPage}";
            $re=sql_query($sql);

            $member_name = array();
            $val = array();

            while ($rs = sql_fetch_as($re)){
				   $r_level=$rs['r_level'];
				   $ag_level=$rs['r_level']-1;
				######################
				include("inc_ag_share.php");
				include("inc_m1.php");
				if($sum1>0.00){
				######################
              $name = $rs['r_user']."^".$rs['r_name']."^A";
              $member_name[] = $name;
              $val[] = array($name, "$sum1","$sum2","$sum3","$sum4","$sum5","$sum6","$sum7","$sum8","$sum9","$sum10");   // ข้อมูลในตาราง แก้ตรงนี้  
              $c++;
				}
            }


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
				include("inc_ag_share.php");
				include("inc_m1.php");
				######################
					if($sum1>0.00){
                 $name = $rs['r_user']."^".$rs['r_name']."^A";
                 $member_name[] = $name;
                 $val[] = array($name, "$sum1","$sum2","$sum3","$sum4","$sum5","$sum6","$sum7","$sum8","$sum9","$sum10");  // ข้อมูลในตาราง แก้ตรงนี้ 
                 $c++;
				 }
               }
            
               $start_member = 0; // กำหนดแถวแรกของ member ให้เป็นแถวที่ 0
               $futype = "M";
               $pagi_data["load"]  = "mix";
                // ดึง memberand m_id=75
                $sql= "select * from bom_tb_member where  m_agent_id like '%$r_agent_id%'   $q_m and m_level=".$lv." $sort LIMIT {$start_member} , {$row_mPerPage}";
                $re_m=sql_query($sql);

                while ($rs = sql_fetch_as($re_m)){
				 $r_level=$rs['m_level'];
				 $ag_level=$rs['m_level']-1;
				######################
				include("inc_ag_share.php");
				include("inc_m3.php");
				######################
					if($sum1>0.00){
                  $name = $rs['m_user']."^".$rs['m_name']."^M";
                  $member_name[] = $name;
                  $val[] = array($name, "$sum1","$sum2","$sum3","$sum4","$sum5","$sum6","$sum7","$sum8","$sum9","$sum10");  // ข้อมูลในตาราง แก้ตรงนี้ 
                  $c++;
					}
                }

            }else // ถ้าหน้าที่เลือกมีเฉพาะ member ###############################################################################################
            {
                $row_mPerPage = ($start+$rowPerPage)-$ag_num_row;  // หาแถวที่เป้นแถวของ member
                $start = $row_mPerPage- $rowPerPage;  
                $futype = "M";

                // ดึง member and m_id=75
                $sql= "select * from bom_tb_member where  m_agent_id like '%$r_agent_id%'     $q_m and m_level=".$lv." $sort LIMIT  {$start} , {$rowPerPage}";
                $re_m=sql_query($sql);

                while ($rs = sql_fetch_as($re_m)){
					 $r_level=$rs['m_level'];
					 $ag_level=$rs['m_level']-1;
				######################
				include("inc_ag_share.php");
				include("inc_m3.php");
				######################
					if($sum1>0.00){
                  $name = $rs['m_user']."^".$rs['m_name']."^M";
                  $member_name[] = $name;
                  $val[] = array($name, "$sum1","$sum2","$sum3","$sum4","$sum5","$sum6","$sum7","$sum8","$sum9","$sum10");
                  $c++;
					}
                }
            }

        }  

        // // ดึง agent;

        // $data['grouptype'] = 'u';   // ใช้อ้างอิงว่าค่าที่ส่งกลับมา เป็นรายการสมาชิก หรือ รายการประเเภทกีฬา
        $data['listtype'] = 'userList'; // ใช้อ้างอิงว่าค่าที่ส่งกลับมา เป็นรายการสมาชิก หรือ รายการประเเภทกีฬา
        // $data['sql'] = $sql;
        $data['userlist'] = $userlist;  
        $data['member_name'] = $member_name;
        $data['data'] = $val;
        $data['pagi_data'] = $pagi_data;  // ส่งกลับไปเขียน หัวตาราง

         $datas = array(
          "status"  => true,
          "result"  => $data,
          "logs" => $logs
        ); 
        echo json_encode($datas);

      }else{  //  ถ้า user ที่เรากดเข้ามาเป็น MEMBER  แสดงข้อมูล รายการกีฬา
        
            // ดึง member
             $sql= "select * from bom_tb_member where  m_agent_id like '%*".$_SESSION['r_id']."*%' and m_level=".$_lv."  and m_user='".$_user."'";
             $rs_m=sql_array($sql);
			 
              $r_level=$rs_m['m_level'];
              $ag_level=$rs_m['m_level']-1;
			  include("inc_ag_share.php");
            $data = array();
             foreach($list_type as $key => $value){
				 if($key<9){
				######################
				include("inc_m5.php");
				######################
               $data['data'][$key] =array($value, "$sum1","$sum2","$sum3","$sum4","$sum5","$sum6","$sum7","$sum8","$sum9","$sum10");
				 }
             }

             // $data['grouptype'] = 'g'; // ใช้อ้างอิงว่าค่าที่ส่งกลับมา เป็นรายการสมาชิก หรือ รายการประเเภทกีฬา
             $data['listtype'] = 'gameList'; // ใช้อ้างอิงว่าค่าที่ส่งกลับมา เป็นรายการสมาชิก หรือ รายการประเเภทกีฬา
             $data['userlist'] = $userlist;  // ส่งกลับไปเขียน หัวตาราง
             $datas = array(
               "status"  => true,
               "result"  => $data,
               "log" => $logs
             );
             echo json_encode($datas);

     
      }
	  
	# print_r($list_type);

?>


