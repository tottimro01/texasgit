<?
	session_start();
	header("Cotnent-type: text/html");

	require('../../../inc/conn.php');
	require('../../../inc/function.php');

	require 'compress_page.php';

	if(isset($_POST["date"]) && isset($_POST["type"]) && $_POST["type"] != "billDetails") {
		include 'checkLang.php';
		
		$date = $_POST["date"];
		$pname = $_POST["pname"];
		$pid = $_POST["pid"];
		$type = $_POST["type"];

		if($type == 'full') {
			$url = $_SESSION["url"].'getBillAll.php';
			$lang_post           = trim($_COOKIE["lang"]);
			if($lang_post==""){
				$lang_post = "th";
			}
			require("../../../lang/".$lang_post.".php");
			$mid = $_SESSION["mid"];
			$date = $_POST["date"];	
			$zone=$_SESSION[zone];
			$rob=$_SESSION[rob];
			$bill_cus_name = trim($_POST["pname"]);
			$bill_no = trim($_POST["pid"]);
			$nbill = "";
			$obill = "";
			$cbill = "21fd95";
			if($bill_cus_name!=""){
				$qqname=" and  b_name='$bill_cus_name'";
				}
			if($bill_no!=""){
				$qqno=" and  b_no='$bill_no'";
				}

			$arr = array();
			$i = 0;

			$ball_type3= array(1 =>"ได้","ได้ครึ่ง","คืนทุน", "เสีย", "เสียครึ่ง", "ยกเลิก", "รอ"); 
			if($zone==1){
			$sql="select * from bom_tb_lotto_bill_play_live where b_date='$date' and  m_id='$mid'   and b_accept=1 $qqname $qqno  order by play_id desc";
			}else{
				$sql="select * from bom_tb_lotto_hun_bill_play_live where b_date='$date' and  m_id='$mid'  and  lot_zone = '$zone' and  lot_rob = '$rob' and b_accept=1 $qqname $qqno  order by play_id desc";
			}
			 $num=sql_num($sql);
			 if($num==0){
				 if($zone==1){
			$sql="select * from bom_tb_lotto_bill_play where b_date='$date' and  m_id='$mid'   and b_accept=1 $qqname $qqno  order by play_id desc";
				 }else{
					$sql="select * from bom_tb_lotto_hun_bill_play where b_date='$date' and  m_id='$mid' and  lot_zone = '$zone' and  lot_rob = '$rob'  and b_accept=1 $qqname $qqno  order by play_id desc"; 
				 }
			 }
			$re=sql_query($sql);
			$x=1;
			$sum1=array();
			$sum2=array();
			$sum3=array();
			 while($rs_bill=sql_fetch($re)){
				 $sum1[]=-$rs_bill["b_total"];
				 $sum2[]=$rs_bill["b_total"]-$rs_bill["b_pay"];
				 $sum3[]=(-$rs_bill["b_pay"])+$rs_bill["b_bonus"];

				$arr[$i]["Nid"] = $rs_bill["bill_id"];
				$arr[$i]["Ndate"] = date("d/m/Y" , $rs_bill["play_timestam"]);
				$arr[$i]["Ntime"] = date("H:i" , $rs_bill["play_timestam"]);
				$arr[$i]["Ntype"] = $lot_type["th"][$rs_bill[lot_type]];
				$arr[$i]["Nnum"] = _dt($rs_bill[play_number]);
				$arr[$i]["Ntb"] = number_format(-$rs_bill["b_total"]);
				$arr[$i]["Ndis"] = number_format($rs_bill["b_total"]-$rs_bill["b_pay"]);
				$arr[$i]["Ntotal"] = number_format((-$rs_bill["b_pay"])+$rs_bill["b_bonus"]);
				 $arr[$i]["Nno"] = $rs_bill["b_no"] ?: $rs_bill["b_no"]="";	
				if($arr[$i]["Nno"]!=""){
					$nbill = $arr[$i]["Nno"];
					if($obill==$nbill || $obill==""){
						$obill = $nbill;
					}else{
						if($cbill=="21fd95"){
							$cbill = "f36811";
						}else{
							$cbill = "21fd95";
						}
						$obill = $nbill;
					}

					$arr[$i]["Ncolor"] = $cbill;


				}else{
					$arr[$i]["Ncolor"] = "";
				}
				$i++;
			}

			$arr[$i]["Nid"] = "";
			$arr[$i]["Ndate"] = "";
			$arr[$i]["Ntime"] = "";
			$arr[$i]["Ntype"] = "";
			$arr[$i]["Nnum"] = "";
			$arr[$i]["Ntb"] = number_format(@array_sum($sum1));
			$arr[$i]["Ndis"] = number_format(@array_sum($sum2));
			$arr[$i]["Ntotal"] = number_format(@array_sum($sum3));
			$arr[$i]["Nno"] = "";
			$arr[$i]["Ncolor"] = "";
			
			
			
			
		}else if ($type == "normal") {
			$url = $_SESSION["url"].'getBill.php';
			
			$lang_post           = trim($_COOKIE["lang"]);
			if($lang_post==""){
				$lang_post = "th";
			}
			require("../../../lang/".$lang_post.".php");

			$mid = $_SESSION["mid"];
			$date = $_POST["date"];	
			$bill_cus_name = trim($_POST['pname']);
			$bill_no = trim($_POST['pid']);
			$nbill = "21fd95";
			$zone=$_SESSION[zone];
			$rob=$_SESSION[rob];


			if($bill_cus_name!=""){
				$qqname=" and  b_name='$bill_cus_name'";
				}
			if($bill_no!=""){
				$qqno=" and  b_no='$bill_no'";
				}


			$arr = array();
			$i = 0;

			$ball_type3= array(1 =>"ได้","ได้ครึ่ง","คืนทุน", "เสีย", "เสียครึ่ง", "ยกเลิก", "รอ"); 
			if($zone==1){
				$sql="select * from bom_tb_lotto_bill_live where b_date='$date' and  m_id='$mid' and b_total > 0   and b_accept=1 $qqname $qqno  order by bill_id desc";
			}else{
				$sql="select * from bom_tb_lotto_hun_bill_live where b_date='$date' and  m_id='$mid' and b_total > 0 and  lot_zone = '$zone' and  lot_rob = '$rob' and b_accept=1 $qqname $qqno  order by bill_id desc";
			}
			$num=sql_num($sql);
			 if($num==0){
				 if($zone==1){
			$sql="select * from bom_tb_lotto_bill where b_date='$date' and  m_id='$mid' and b_total > 0   and b_accept=1 $qqname $qqno  order by bill_id desc";
				 }else{
					 $sql="select * from bom_tb_lotto_hun_bill where b_date='$date' and  m_id='$mid' and b_total > 0  and  lot_zone = '$zone' and  lot_rob = '$rob' and b_accept=1 $qqname $qqno  order by bill_id desc";
				 }
			 }
			$re=sql_query($sql);
			$x=1;
			$sum1=array();
			$sum2=array();
			$sum3=array();
			$sum4=array();
			 while($rs_bill=sql_fetch($re)){

				 $sum1[]=-$rs_bill["b_total"];
				 $sum2[]=$rs_bill["b_total"]-$rs_bill["b_pay"];
				 $sum3[]=$rs_bill["b_bonus"];
				 $sum4[]=(-$rs_bill["b_pay"])+$rs_bill["b_bonus"];

				$arr[$i]["Nid"] = $rs_bill["bill_id"];
				 if($num==0){
				$arr[$i]["Ndate"] = date("d/m/Y" , $rs_bill["b_timestam"]);
				$arr[$i]["Ntime"] = date("H:i" , $rs_bill["b_timestam"]);
				 }else{
				$arr[$i]["Ndate"] = date("d/m/Y" , $rs_bill["b_timestam"]);
				$arr[$i]["Ntime"] = date("H:i" , $rs_bill["b_timestam"]);
				 }
				$arr[$i]["Ntb"] = number_format(-$rs_bill["b_total"]);
				$arr[$i]["Ndis"] = number_format($rs_bill["b_total"]-$rs_bill["b_pay"]);
				$arr[$i]["Nbonus"] = number_format($rs_bill[b_bonus]);
				$arr[$i]["Ntotal"] = number_format((-$rs_bill["b_pay"])+$rs_bill["b_bonus"]);
				$arr[$i]["Nstatus"] = $rs_bill["b_status"];	
				$arr[$i]["Nno"] = $rs_bill["b_no"] ?: $rs_bill["b_no"]="";	
				$arr[$i]["Nname"] = $rs_bill["b_name"] ?: $rs_bill["b_name"]="";	
				if($arr[$i]["Nno"]!=""){
					if($nbill=="21fd95"){
						$arr[$i]["Ncolor"] = "21fd95";
						$nbill = "f36811";
					}else{
						$arr[$i]["Ncolor"] = "f36811";
						$nbill = "21fd95";
					}
				}else{
					$arr[$i]["Ncolor"] = "";
				}
				$i++;
			}

			$arr[$i]["Nid"] = "";
			$arr[$i]["Ndate"] = "";
			$arr[$i]["Ntime"] = "";
			$arr[$i]["Ntb"] = number_format(@array_sum($sum1));
			$arr[$i]["Ndis"] = number_format(@array_sum($sum2));
			$arr[$i]["Nbonus"] = number_format(@array_sum($sum3));
			$arr[$i]["Ntotal"] = number_format(@array_sum($sum4));
			$arr[$i]["Nstatus"] = "";
			$arr[$i]["Nno"] = "";
			$arr[$i]["Ncolor"] = "";
			
			
			
		}else {	
			die();
		}
		
		
		$datax = json_encode($arr);
		$data = json_decode($datax, true);
	
		/*$url = $url.'?mid='.$_SESSION["mid"].'&d='.$date.'&pname='.$pname.'&pid='.$pid;
		$data = file_get_contents($url);
		$data = json_decode($data, true);*/
		
		
		
		
		
		
		
		$c = count($data);

		if($c<=1){die();}

		if ($type == 'full') { //Full
			$tmpId = "";
			$tmpColor = "#f36811";
?>
		<table>
<?
		for ($i=0; $i < $c; $i++) { 
			if($i != ($c-1)) {
?>
			<tr>
				<td>
					<div class="bill-cells" style="margin-top: <?=($i==0) ? "3px" : "";?>">
						<div class="bill-time"><?=$data[$i]["Ntime"];?></div>

						<? 	
							if($tmpId != $data[$i]["Nid"])
							{ $tmpColor = $tmpColor == "#f36811" ? "#21fd95" : "#f36811"; }
							$tmpId = $data[$i]["Nid"];

						if($data[$i]["Nno"] != ""){ 
						?>
							<div class="bill-no" style="background-color: <?=$tmpColor;?>"><?=$data[$i]["Nno"];?></div>
						<? } ?>

						<div class="bill-date" style="line-height: <?=($data[$i]["Nno"])=="" ? "30px" : "";?>"><?=$data[$i]["Ndate"];?></div>
						<div class="bill-id"><?=($i+1);?></div>
					</div>
				</td>
				<td>
					<div class="bill-cells" style="margin-top: <?=($i==0) ? "3px" : "";?>">
						<?=$data[$i]["Ntype"];?>
					</div>
				</td>
				<td>
					<div class="bill-cells" style="margin-top: <?=($i==0) ? "3px" : "";?>">
						<?=$data[$i]["Nnum"];?>
					</div>
				</td>
				<td>
					<div class="bill-cells" style="margin-top: <?=($i==0) ? "3px" : "";?>; color: red;">
						<?=$data[$i]["Ntb"];?>
					</div>
				</td>
				<td>
					<div class="bill-cells" style="margin-top: <?=($i==0) ? "3px" : "";?>">
						<?=$data[$i]["Ndis"];?>
					</div>
				</td>
				<td>
					<div class="bill-cells" style="margin-top: <?=($i==0) ? "3px" : "";?>; color: red;">
						<?=$data[$i]["Ntotal"];?>
					</div>
				</td>
			</tr>
<? }else { ?>
			<tr>
				<td class="sum-cells" colspan="3">
					<div >
						<?=$lang_data["sum"];?>
					</div>
				</td>
				<td class="sum-cells">
					<div style="color: red;">
						<?=$data[$i]["Ntb"];?>
					</div>
				</td>
				<td class="sum-cells">
					<div>
						<?=$data[$i]["Ndis"];?>
					</div>
				</td>
				<td class="sum-cells">
					<div style="color: red;">
						<?=$data[$i]["Ntotal"];?>
					</div>
				</td>
			</tr>
<?  } } ?>			
		</table>
<?			
		}else { // Normal
			$tmpColor = "#f36811";
?>
			<table>
<?
			for ($i=0; $i < $c; $i++) { 
				if($i != ($c-1)) {
?>
				<tr data-billid=<?=$data[$i]["Nid"];?>>
					<td>
					<div class="bill-cells" style="margin-top: <?=($i==0) ? "3px" : "";?>">
							<div class="bill-time"><?=$data[$i]["Ntime"];?></div>
							
							<div style="display: flex; width: 100%;">
							<? if($data[$i]["Nname"] != ""){ ?>
								<div class="bill-name"><?=$data[$i]["Nname"];?></div>
							<? }else { ?>
								<div style="flex: 1;"></div>
							<?	} ?>

							<? if($data[$i]["Nno"] != ""){ 
								$tmpColor = $tmpColor == "#f36811" ? "#21fd95" : "#f36811";
							?>
								<div class="bill-no" style="background-color: <?=$tmpColor;?>"><?=$data[$i]["Nno"];?></div>
							<? } ?>
							</div>
							

							<div class="bill-date" <?if($data[$i]["Nno"]=="" && $data[$i]["Nname"]==""){?> style="line-height:30px;" <?}?>><?=$data[$i]["Ndate"];?></div>
							<div class="bill-id"><?=($i+1);?></div>
						</div>
					</td>
					<td>
						<div class="bill-cells" style="margin-top: <?=($i==0) ? "3px" : "";?>; color: red;">
							<?=$data[$i]["Ntb"];?>
						</div>
					</td>
					<td>
						<div class="bill-cells" style="margin-top: <?=($i==0) ? "3px" : "";?>">
							<?=$data[$i]["Ndis"]; ?>
						</div>
					</td>
					<td>
						<div class="bill-cells" style="margin-top: <?=($i==0) ? "3px" : "";?>">
							<?=$data[$i]["Nbonus"];?>
						</div>
					</td>
					<td>
						<div class="bill-cells" style="margin-top: <?=($i==0) ? "3px" : "";?>; color: red;">
							<?=$data[$i]["Ntotal"];?>
						</div>
					</td>
				</tr>
<?	}else { #summary ?>
				<tr>
					<td class="sum-cells">
						<div >
							<?=$lang_data["sum"];?>
						</div>
					</td>
					<td class="sum-cells">
						<div style="color: red;">
							<?=$data[$i]["Ntb"];?>
						</div>
					</td>
					<td class="sum-cells">
						<div>
							<?=$data[$i]["Ndis"];?>
						</div>
					</td>
					<td class="sum-cells">
						<div>
							<?=$data[$i]["Nbonus"];?>
						</div>
					</td>
					<td class="sum-cells">
						<div style="color: red;">
							<?=$data[$i]["Ntotal"];?>
						</div>
					</td>
				</tr>
<? } } ?>
			</table> 

<? } } # -------------------------------- ?>

<?
	# bill details
	if(isset($_POST["billid"]) && isset($_POST["type"]) && $_POST["type"] == "billDetails") {
		/*$url = $_SESSION["url"].'getBillD2.php?mid='.$_SESSION["mid"].'&bid='.$_POST["billid"];
		$data = file_get_contents($url);
		$data = json_decode($data, true);*/
		
		
		$lang_post           = trim($_COOKIE["lang"]);
		if($lang_post==""){
			$lang_post = "th";
		}
		require("../../../lang/".$lang_post.".php");
		$mid = $_SESSION["mid"];
		$bid = $_POST["billid"];	
		$zone=$_SESSION[zone];
		$rob=$_SESSION[rob];
		$arr = array();
		$i = 0;


		$sql             = "select * from bom_tb_member where m_id='$mid'";
		$re_m            = sql_array($sql);

		$url_file="../../../json/config/member/LottoConfig_".$mid.".json";	
		$lot6_js=file_get_contents2($url_file);
		$lot_m = json_decode2($lot6_js, true);

		$empay=@explode(',',$lot_m['m_lotto_pay_member']); 
		$emdis=@explode(',',$lot_m['m_lotto_dis_member']); 


		$ball_type3= array(1 =>"ได้","ได้ครึ่ง","คืนทุน", "เสีย", "เสียครึ่ง", "ยกเลิก", "รอ"); 
		if($zone==1){
		$sql="select * from bom_tb_lotto_bill_play_live where bill_id='$bid' and  m_id='$mid'   and b_accept=1  order by lot_type asc, play_number asc";
		}else{
			$sql="select * from bom_tb_lotto_hun_bill_play_live where bill_id='$bid' and  m_id='$mid' and  lot_zone = '$zone' and  lot_rob = '$rob'  and b_accept=1  order by lot_type asc, play_number asc";
		}
		 $num=sql_num($sql);
		 if($num==0){
			 if($zone==1){
		$sql="select * from bom_tb_lotto_bill_play where bill_id='$bid' and  m_id='$mid'   and b_accept=1  order by lot_type asc, play_number asc";
			 }else{
				$sql="select * from bom_tb_lotto_hun_bill_play where bill_id='$bid' and  m_id='$mid' and  lot_zone = '$zone' and  lot_rob = '$rob'  and b_accept=1  order by lot_type asc, play_number asc"; 
			 }
		 }
		$re=sql_query($sql);
		$x=1;
		$sum1=array();
		while($rs_bill=sql_fetch($re)){


			if($re_m[m_bet_tou]==1 and ($rs_bill[lot_type]==4 or $rs_bill[lot_type]==5 or $rs_bill[lot_type]==18) and $zone==1){

				$sum1[]=-($rs_bill["b_pay"]);
			}else{
				$sum1[]=-$rs_bill["b_total"];
			}

			$arr[$i]["Nid"] = $rs_bill["bill_id"];
			$arr[$i]["Ndate"] = date("d/m/Y" , $rs_bill["play_timestam"]);
			$arr[$i]["Ntime"] = date("H:i" , $rs_bill["play_timestam"]);
			$arr[$i]["Ntype"] = $lot_type["th"][$rs_bill[lot_type]];
			$arr[$i]["Nnum"] = _dt($rs_bill[play_number]);

		if($re_m[m_bet_tou]==1 and ($rs_bill[lot_type]==4 or $rs_bill[lot_type]==5 or $rs_bill[lot_type]==18) and $zone==1){
		$rPay =(1000/$empay[$rs_bill[lot_type]]);
		$arr[$i]["Ntb"] = number_format($rs_bill[b_total]/$rPay).' ตัว';
		}else{
		$arr[$i]["Ntb"] = number_format(-$rs_bill[b_total],2);
			}
		#$arr[$i]["Ntb"] = number_format(-$rs_bill[b_total]);	

			$i++;
		}

		$arr[$i]["Nid"] = "";
		$arr[$i]["Ndate"] = "";
		$arr[$i]["Ntime"] = "";
		$arr[$i]["Ntype"] = "";
		$arr[$i]["Nnum"] = "";
		$arr[$i]["Ntb"] = number_format(@array_sum($sum1),2);

		
		$datax = json_encode($arr);
		$data = json_decode($datax, true);
		
		
		$c = count($data);

	if($c<=1){die();}
		for ($i=0; $i < $c; $i++) { 
			if($i != ($c-1)) {
?>
			<tr>
				<td><?=$data[$i]["Ntype"]?></td>
				<td><?=$data[$i]["Nnum"]?></td>
				<td <?if(is_numeric($data[$i]["Ntb"])&&intval($data[$i]["Ntb"])<0){?> style="color: red;" <?}?>><?=$data[$i]["Ntb"]?></td>
			</tr>
	<? }else { ?>
			<tr>
				<td colspan="2" class="summary"><?=$lang_data["sum"];?></td>
				<td class="summary" style="color: red;"><?=$data[$i]["Ntb"]?></td>

			</tr>
<? } } } ?>

	