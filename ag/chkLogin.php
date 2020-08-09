<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>

<?


require('inc/conn.php');
require('inc/function.php');
require('inc/function2.php');

// if($_SESSION["bocklogin"]>=5){
//       echo"<script language='JavaScript'> top.document.location='block_login.html';</script>";
//      exit();
// }


################OPEN BET maintenance 
$url_file="../json/maintenance.json";   
$mm_js=file_get_contents2($url_file);
$jsmm = json_decode2($mm_js, true);

/*
 if($jsmm["open"]==0){

    echo"<script language='JavaScript'>
         top.document.location='maintenance.html';
      </script>";
        exit(); 

 }
*/

$ar_user = $_REQUEST['cuser'];    
$ar_pass = $_REQUEST['cpass']; 


$sql="select * from bom_tb_agent where (r_user='$ar_user' and r_pass='$ar_pass')";
$re=sql_array($sql);

if(isset($re["r_id"])){

    if($re["r_active"]!=1){
        $alert='<span class="cr">E1-คุณถูกระงับการใช้งานกรุณาติดต่อผู้ดูแล</span>';
        $_SESSION["bocklogin"]=$_SESSION["bocklogin"]+1;    
    }else{

            @session_start();
            $_SESSION["rid"]=$re["r_id"];
            $_SESSION["r_id"]=$re["r_id"];
            $_SESSION["r_user"]=$re["r_user"];
            $_SESSION["r_name"]=$re["r_name"];
            $_SESSION["r_level"]=$re["r_level"];
            $_SESSION["r_type"]=$re["r_type"];
            $_SESSION["uplevel"]=$_SESSION["r_level"]+1;
            $_SESSION["rlevel"]=$re["r_level"];
            $_SESSION["dlevel"]=$_SESSION["r_level"]-1;
            
            $_SESSION["r_count"]=$re["r_count"];
            $_SESSION["r_agent_id"]=$re["r_agent_id"];
            $_SESSION["r_sport_delete_bill"]=$re["r_sport_delete_bill"];
            $_SESSION["r_currency"]=$re["r_currency"];
            $_SESSION["r_open"]=$re["r_open"];

            $_SESSION["uu_use"]=0;
            $_SESSION["uu_id"]=0;
            $_SESSION["uu_menu"]=0;
            
            $_SESSION["aaa"] ='aaaa';
            $_SESSION["r_lotto_hun_pay1_super"] = $re['r_lotto_hun_pay1_super'];
            $_SESSION["r_lotto_hun_pay1_senior"]= $re['r_lotto_hun_pay1_senior'];
            $_SESSION["r_lotto_hun_pay1_master"]= $re['r_lotto_hun_pay1_master'];
            $_SESSION["r_lotto_hun_pay1_agent"] = $re['r_lotto_hun_pay1_agent'];

            $sql="select sum(m_count_de) as xtotal from bom_tb_member where r_agent_id like '%*".$_SESSION["rid"]."*%'  ";
            #$re=sql_array($sql);
            $_SESSION["x_count"]=$_SESSION["r_count"]-$re["xtotal"];
            $_SESSION["xm_count"]=$re["xtotal"];
            
            
            $sql="select sum(b_total) as xtotal from bom_tb_football_bill where r_agent_id like '%*".$_SESSION["rid"]."*%' and b_status=5";
            #$re1=sql_array($sql);
            $_SESSION["x1_count"]=$re1["xtotal"];
            
            $sql="select sum(b_total) as xtotal from bom_tb_lotto_bill where r_agent_id like '%*".$_SESSION["rid"]."*%' and b_status=5";
            #$re2=sql_array($sql);
            $_SESSION["x2_count"]=$re2["xtotal"];

            $hijack=md5($_SERVER['REMOTE_ADDR']);
            $fo="../json/login/hjr_".$_SESSION["rid"].".php";
            write($fo,'<? $m_hijack="'.$hijack.'"; ?>',"w+"); 

            $token = md5(uniqid(rand(),1));
            $_SESSION["rtoken"]=$token;
            $fo="../json/login/rid_".$_SESSION["rid"].".php";
            @unlink($fo);
            write($fo,'<? $m_token="'.$token.'"; ?>',"w+"); 

            include("geoiploc.php"); // Must include this

            $ip = _bIP();
            $ipe = @explode(",",_bIP());
            $ipc=$ipe["0"];
            if($ipe["0"]==$ipe["1"]){
                 $ip =$ipe["0"]; 
            }elseif($ipe["1"]!=""){
                $ip =$ipe["1"];  
            }elseif($ipe["0"]!=""){
                $ip =$ipe["0"];      
            }

            $location=getCountryFromIP($ipc, " NamE ");
            $ua=getBrowser();
            
            $yourbrowser= $ua['name'] . "#" . $ua['version'] . "#" .$ua['platform2'];#$_SERVER[HTTP_USER_AGENT]
            $sql="INSERT IGNORE INTO bom_tb_login_ag (h_date,   h_ip    ,h_data, h_location ,r_id,r_level, r_agent_id) values(now(),'$ip','$yourbrowser','$location','".$_SESSION["rid"]."','".$_SESSION["r_level"]."' ,'".$_SESSION["r_agent_id"]."')";
            sql_query($sql);

        

            $sql="update IGNORE bom_tb_agent set r_login=now(), r_country='$location',  r_ip='$ip'  where r_id='".$_SESSION["rid"]."'";
            sql_query($sql); 

            echo"<script language='JavaScript'> top.document.location='main.php';</script>";

    }
}else{

    $sql="select * from bom_tb_agent_use where (u_user  ='$ar_user' and u_pass='$ar_pass')";
    $reu=sql_array($sql);

    if(isset($reu["u_id"])){
    
        if($reu["u_active"]!=1){
            $alert='<span class="cr">E1-คุณถูกระงับการใช้งานกรุณาติดต่อผู้ดูแล</span>';
            $_SESSION["bocklogin"]=$_SESSION["bocklogin"]+1;    
        }else if($reu["u_id"]!="" and $reu["u_active"]==1){ 

                @session_start();
                $_SESSION["uu_use"]=1;
                $_SESSION["uu_id"]=$reu["u_id"];
                $_SESSION["u_id"]=$reu["u_id"];
                $_SESSION["uu_menu"]=$reu["u_menu"];

            ####################Agent
                $sql="select * from bom_tb_agent where (r_id='$reu[r_id]')";
                $rer=sql_array($sql);

            ##################################
            
            @session_start();
            $_SESSION["rid"]=$rer["r_id"];
            $_SESSION["r_id"]=$rer["r_id"];
            $_SESSION["r_user"]=$reu["u_user"];
            $_SESSION["r_name"]=$reu["u_name"];
            $_SESSION["r_level"]=$rer["r_level"];
            $_SESSION["r_type"]=$rer["r_type"];
            $_SESSION["uplevel"]=$_SESSION["r_level"]+1;
            $_SESSION["rlevel"]=$rer["r_level"];
            $_SESSION["dlevel"]=$_SESSION["r_level"]-1;
            
            $_SESSION["r_count"]=$rer["r_count"];
            $_SESSION["r_agent_id"]=$rer["r_agent_id"];
            $_SESSION["r_sport_delete_bill"]=$rer["r_sport_delete_bill"];
            $_SESSION["r_currency"]=$rer["r_currency"];
            $_SESSION["r_open"]=$rer["r_open"];

            $sql="select sum(m_count_de) as xtotal from bom_tb_member where r_agent_id like '%*".$_SESSION["rid"]."*%'  ";
            #$re=sql_array($sql);
            $_SESSION["x_count"]=$_SESSION["r_count"]-$re["xtotal"];
            $_SESSION["xm_count"]=$re["xtotal"];
            
            
            $sql="select sum(b_total) as xtotal from bom_tb_football_bill where r_agent_id like '%*".$_SESSION["rid"]."*%' and b_status=5";
            #$re1=sql_array($sql);
            $_SESSION["x1_count"]=$re1["xtotal"];
            
            $sql="select sum(b_total) as xtotal from bom_tb_lotto_bill where r_agent_id like '%*".$_SESSION["rid"]."*%' and b_status=5";
            #$re2=sql_array($sql);
            $_SESSION["x2_count"]=$re2["xtotal"];


            $hijack=md5($_SERVER['REMOTE_ADDR']);
            $fo="../json/login/hjru_".$_SESSION["uu_id"].".php";
            write($fo,'<? $m_hijack="'.$hijack.'"; ?>',"w+"); 

            $token = md5(uniqid(rand(),1));
            $_SESSION["rtoken"]=$token;
            $fo="../json/login/ridu_".$_SESSION["u_id"].".php";
            @unlink($fo);
            write($fo,'<? $m_token="'.$token.'"; ?>',"w+"); 

            ################### 
            include("geoiploc.php"); // Must include this
            $ip = _bIP();
            $ipe = @explode(",",_bIP());
            $ipc=$ipe["0"];
            if($ipe["0"]==$ipe["1"]){
                $ip =$ipe["0"]; 
            }
            $location=getCountryFromIP($ipc, " NamE ");
            
            $ua=getBrowser();
            $yourbrowser= $ua['name'] . "#" . $ua['version'] . "#" .$ua['platform2'];#$_SERVER[HTTP_USER_AGENT]
            $sql="INSERT IGNORE INTO bom_tb_login_ag (h_date,   h_ip    ,h_data, h_location ,r_use,r_level, r_agent_id) values(now(),'$ip','$yourbrowser','$location','$_SESSION[u_id]','7' ,'$_SESSION[r_agent_id]')";
            sql_query($sql);

            $_SESSION["sql"]=$sql;  

            $sql="update IGNORE bom_tb_agent_use set u_login=now(),u_ip='$ip' where u_id='".$_SESSION["u_id"]."'";
            sql_query($sql);

            echo"<script language='JavaScript'> top.document.location='main.php';</script>"; 

        }

    }else{


        $sql="select * from bom_tb_agent where (r_user='$ar_user')";
        $sql88 =  $sql;
        $re=sql_array($sql);

        if(isset($re["r_id"])){  // ถ้า user ถูก รหัสผ่านผิด เก็บ log พยายามเข้าสู่ระบบ
    

             ################### 
            include("geoiploc.php"); // Must include this
            $ip = _bIP();
            $ipe = @explode(",",_bIP());
            $ipc=$ipe["0"];
            if($ipe["0"]==$ipe["1"]){
                $ip =$ipe["0"]; 
            }
            $location=getCountryFromIP($ipc, " NamE ");
            
            $ua=getBrowser();
            $yourbrowser= "มีผู้อื่นกำลังพยายามเข้าสู่ระบบ";
            $sql="INSERT IGNORE INTO bom_tb_login_ag (h_date,   h_ip    ,h_data, h_location ,r_id,r_level, r_agent_id) values(now(),'$ip','$yourbrowser','$location','".$re["r_id"]."','".$re["r_level"]."' ,'".$re["r_agent_id"]."')";
            sql_query($sql); 


        }else{ // เช้ค sub user
              
                $sql="select u_id , r_id from bom_tb_agent_use where (u_user ='$ar_user')";
                $re=sql_array($sql);

                if(isset($re["u_id"])){  // ถ้า user ถูก รหัสผ่านผิด เก็บ log พยายามเข้าสู่ระบบ
                
                   $sql="select * from bom_tb_agent where (r_id='$re[r_id]')";
                   $rer=sql_array($sql);

                   ################### 
                   include("geoiploc.php"); // Must include this
                   $ip = _bIP();
                   $ipe = @explode(",",_bIP());
                   $ipc=$ipe["0"];
                   if($ipe["0"]==$ipe["1"]){
                       $ip =$ipe["0"]; 
                   }
                   $location=getCountryFromIP($ipc, " NamE ");
            
                   $ua=getBrowser();
                   $yourbrowser= "มีผู้อื่นกำลังพยายามเข้าสู่ระบบ";

                  $sql="INSERT IGNORE INTO bom_tb_login_ag (h_date, h_ip,h_data, h_location ,r_use,r_level, r_agent_id) 
                        values(now(),'$ip','$yourbrowser','$location','".$re[u_id]."','7' ,'".$rer[r_agent_id]."')";
                  sql_query($sql);

                }

        }


        $alert='<strong style="color:red">E2-ชื่อเข้าใช้งานหรือรหัสผ่านผิด </strong>';
        $_SESSION["bocklogin"]=$_SESSION["bocklogin"]+1;
    } 

    
}

echo $alert;

?>
