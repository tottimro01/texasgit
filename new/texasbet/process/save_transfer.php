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

	// $url_file1	=	$json_dir."transfer/".$_SESSION['m_id']."/tranfer.json";	
	// $fo = $json_dir."login/token_bet/".$mid.".php";
	// @require_once($fo);
	// if($_SESSION['bettoken']!=$bet_token){ 
	// 	$arr = array('status' => 0, 'msg' => 'Bet token');
	// 	echo json_encode($arr);
	// 	exit();
	// }

	$rs_cset = sql_array("select * from bom_tb_agent where r_id = '".$_SESSION['cr_id']."'");

	$_POST['tcount']=str_replace(",","",$_POST['tcount']);

  	if($_POST['tcount']<$rs_cset["r_m_deposit_min"]){
  		$arr['status'] = 0;
  		$arr['msg'] = "*".$lang_member[1659]." ".$rs_cset["r_m_deposit_min"]." ".$_SESSION['m1']['m_currency']."!";
  	}else if($_POST['tcount']>$rs_cset["r_m_deposit_max"]){
  		$arr['status'] = 0;
  		$arr['msg'] = "*".$lang_member[1660]." ".$rs_cset["r_m_deposit_max"]." ".$_SESSION['m1']['m_currency']."!";
  	}else{
      	if($_POST['tbank']!="" and $_POST['tcount']!="" and $_POST['tdd']!="" and $_POST['thh']!=""){
      
    		$sql="select * from bom_tb_trans where t_type=1 and m_id='".$mid."' and t_status=3";
    		$num=sql_num($sql);
    		
    		if($num==0){
    		  	$txt="BC=".$_POST['tbankcode'];
    		  	$tdate_bet=$_POST['tdd']." ".$_POST['thh'].":".$_POST['tmm'].":00";
    		      $sql="INSERT IGNORE INTO bom_tb_trans (t_bank, t_note, t_date_bet ,t_date,t_count,t_type,m_id,r_id, t_ip,r_agent_id ) values ('".$_POST['tbank']."', '$txt', '$tdate_bet' ,now() , '"    .$_POST['tcount']."'  , 1 , '".$mid."' , '".$_SESSION['cr_id']."','"._bIP()."' ,'".$_SESSION['r_agent_id']."')";
    		  	sql_query($sql);
    		    
    		    $ag_update = "UPDATE `bom_tb_agent` SET `r_alert_in`= r_alert_in+1 where r_id = '".$_SESSION['cr_id']."'"; 
    		    sql_query($ag_update);
    		  
    		    ############################
    		    $arr['status'] = 1;
    		    $arr['msg'] = $lang_member[88];
    		       
    		    ####################################
    		    $js1=array();
    		    $re=sql_page("bom_tb_trans where m_id='".$mid."'  and t_type=1     ","t_id"," desc, t_status desc",100);
    		    while($rs=sql_fetch($re['re'])){	
    		    $js1[]=array("t_bank"=>"".$rs["t_bank"]."","t_date_bet"=>"".$rs["t_date_bet"]."","t_date"=>"".$rs["t_date"]."","t_count"=>"".$rs["t_count"]."","t_status"=>"".$rs["t_status"]."");
    		    }
    		    
    		    ####################################		
    		    $txt1=json_encode($js1);
    		    write($url_file1 ,$txt1,"w+"); 
    		  
    		  
    		}else{
    		  	$arr['status'] = 0;
    		    $arr['msg'] = $lang_member[962];
    		}
      	}
  	}

  	echo json_encode($arr);

?>