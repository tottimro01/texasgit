<?
	session_start();
	header("Content-type: application/json");

	require_once '../inc/lang.php';
  require_once '../inc/rsc.php';
  require_once '../inc/function.php';
  require_once '../inc/conn.php';

  require_once '../inc/function_array.php';
  require_once '../inc/variable_lang.php';

	$mid = $_SESSION["m_id"];
	$zone=$_SESSION['zone_hun'];
	$rob=$_SESSION['rob_hun'];
	
	$arr = array();

	// $url_file1	=	$json_dir."transfer/".$_SESSION['m_id']."/draw.json";	
	// $fo = $json_dir."login/token_bet/".$mid.".php";
	// @require_once($fo);
	// if($_SESSION['bettoken']!=$bet_token){ 
	// 	$arr = array('status' => 0, 'msg' => 'Bet token');
	// 	echo json_encode($arr);
	// 	exit();
	// }

	$rs_cset = sql_array("select * from bom_tb_agent where r_id = '".$_SESSION['cr_id']."'");

	$sql="select * from bom_tb_member where m_id='".$mid."'";
  $re_m=sql_array($sql);

  if($re_m['m_b_pass']!=$_POST['tcode']){
    $arr['status'] = 0;
    $arr['msg'] = $lang_member[974]." ".$lang_member[980];
  }else{
    
    $_POST['tcount']=str_replace(",","",$_POST['tcount']);
    
    if($_POST['tcount']!="" and $_POST['tcode']!=""){
      if($_POST['tcount']<$rs_cset["r_m_withdraw_min"]){
        $arr['status'] = 0;
        $arr['msg'] = "*".$lang_member[1661]." ".$rs_cset["r_m_withdraw_min"]." ".$_SESSION['m1']['m_currency']."!";
      }else if($_POST['tcount']>$rs_cset["r_m_withdraw_max"]){
        $arr['status'] = 0;
        $arr['msg'] = "*".$lang_member[1662]." ".$rs_cset["r_m_withdraw_max"]." ".$_SESSION['m1']['m_currency']."!";
      }else{

        if($re_m['m_count']>=$_POST['tcount']){
            $sql="select * from bom_tb_trans where t_type=2 and m_id='".$mid."' and t_status=3";
            $num=sql_num($sql);  
            if($num==0){
              $c_date=date("Y-m-d");
              $txt="PASS:".$re_m['m_b_pass']."=".$_POST['tcode']."@".$re_m['m_b_code']."@".$re_m['m_b_name'];
             
              $sql="INSERT IGNORE INTO bom_tb_trans (t_bank, t_note, t_date_bet ,t_date,t_count,t_type,m_id,r_id, t_ip,r_agent_id ) values ('".$re_m['m_b_bank']."', '$txt', now() ,now() , '".$_POST['tcount']."'  , 2 , '".$mid."' , '".$_SESSION['cr_id']."','"._bIP()."','".$_SESSION['r_agent_id']."')";
              sql_query($sql);

              $ag_update = "UPDATE `bom_tb_agent` SET `r_alert_out`= r_alert_out+1 where r_id = '".$_SESSION['cr_id']."'"; 
              sql_query($ag_update);
              
              $mem_update = "UPDATE `bom_tb_member` SET `m_count`= m_count-$_POST[tcount] where m_id = '".$mid."'"; 
              sql_query($mem_update);
              
              $rs_tran=sql_array("select * from bom_tb_trans where t_type=2 and m_id='".$mid."' order by t_id desc limit 1");
              $rs_ag = sql_array("select r_agent_id from bom_tb_agent where r_id = '".$mid."'");
                $log_sum=$re_m['m_count']-$_POST[tcount];
                ######################LOG ใหม่
                $sql="INSERT IGNORE INTO bom_tb_all_payment (
                bap_date, bap_ip, bap_type  ,m_id ,r_id,  m_agent_id, r_agent_id, 
                bap_before, bap_out ,bap_after,bap_comment,
                bap_code,trans_id) values(
                now(),'"._bIP()."', '2', '$re_m[m_id]','$re_m[r_id]','$re_m[m_agent_id]','$rs_ag[r_agent_id]',
                '$re_m[m_count]' ,'-$_POST[tcount]','$log_sum','สมาชิกแจ้งถอนผ่านหน้าเว็บไซต์',
                'MOT','$rs_tran[t_id]') ";
                sql_query($sql);  
                ######################LOG ใหม่ 
              
              
              #######################ccccccccccccccccccccc#####
              $fo=$json_dir."login/draw/".$_SESSION['crid'].".php";
              if( 0 != @filesize($fo)){
                @require_once($fo);
                $alert_txt=intval($m_draw)+1;
                $fp = @fopen($fo, 'w');
                @fwrite($fp, '<? $m_draw="'.$alert_txt.'"; ?>');
                @fclose($fp);

              }else{
                $fp = @fopen($fo, 'w');
                @fwrite($fp, '<? $m_draw="1"; ?>');
                @fclose($fp);
              }
              #######################ccccccccccccccccccccc##### 
              $arr['status'] = 1;
              $arr['msg'] = $lang_member[88];
              
              ####################################
              $js1=array();
              
              $re=sql_page("bom_tb_trans where m_id='".$mid."'  and t_type=2     ","t_id"," desc, t_status desc",100);
              while($rs=sql_fetch($re['re']))
              { 
                $js1[]=array("t_bank"=>"".$rs["t_bank"]."","t_date_bet"=>"".$rs["t_date_bet"]."","t_date"=>"".$rs["t_date"]."","t_count"=>"".$rs["t_count"]."","t_status"=>"".$rs["t_status"]."","    t_note"=>"".$rs["t_note"]."");
              }
              ####################################    
              $txt1=json_encode($js1);
              write($url_file1 ,$txt1,"w+"); 
 
             }else{#  if($num==0){
              $arr['status'] = 0;
              $arr['msg'] = $lang_member[962];
           }  
        }else{# if($re_m[m_count]<$_POST[tcount]){
            $arr['status'] = 0;
            $arr['msg'] = $lang_member[963];
        }
      }# if ($_POST['tcount']<$rs_cset["r_m_withdraw_min"])
    }else{#if( $_POST[tcount]!="" and $_POST[tcode]!="" and $_POST[tcount]>=1000){
      $arr['status'] = 0;
      $arr['msg'] = $lang_member[964];
    }
  }
      	
  	echo json_encode($arr);

?>