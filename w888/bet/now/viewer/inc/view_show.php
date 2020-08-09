<?php
	//if(isset($_GET['zsubmit'])){
		$n_date = explode("-", $_GET['zday']);
		if($n_date[0] > 100){
			$n_dmy = $n_date[2]."-".$n_date[1]."-".$n_date[0];
			$_GET['zday'] = $n_dmy;
		}
		
	//}
	
	$z_sta = $_GET['sta'];
	$ball_id = $_GET['b_id'];
	$ball_add = $_GET['b_add'];
	$ball_type = $_GET['b_type'];
	$ad_id = $_GET['a_id'];
	$_date = $_GET['zday'];
	
	$sql_date = "zdate = '$_date'";

	$sql_log = "SELECT * FROM z_live_log WHERE $sql_date ORDER BY id_log DESC";
	
	if($z_sta == 1){
		$sql_log = "SELECT * FROM z_live_log WHERE id_usr = '$ad_id' and $sql_date ORDER BY id_log DESC";
	}
	if($z_sta == 2){
		$sql_log = "SELECT * FROM z_live_log WHERE id_ball = '$ball_id' and $sql_date ORDER BY id_log DESC";	
	}
	if($z_sta == 3){
		$sql_log = "SELECT * FROM z_live_log WHERE id_ball = '$ball_id' and z_live_log.add = '$ball_add' and $sql_date ORDER BY id_log DESC";
	}
	if($z_sta == 4){	
		$sql_log = "SELECT * FROM z_live_log WHERE id_ball = '$ball_id' and type = '$ball_type' and $sql_date ORDER BY id_log DESC";
	}	
	
	$l_log = sql_query($sql_log);
	$l_num = mysql_num_rows($l_log);
?>	
	<div class="table_a" >
        <table >
            <tr>
				<td>ເວລາ</td>
				<td style='width:90px;'>ວັນທີ</td>
				<td>ຊື່ຜູ້ໃຊ້ (L)</td>
				<td>ລີກ</td>
                <td style='width:170px;'>ບ້ານ (L)</td>
				<td>ຢາມ</td>
				<td style='width:55px;'>ລາຄາ (L)</td>
				<td style='width:85px;'>ປະເພດ (L)</td>
				<td>ກ່ອນແປງ</td>
				<td>ຫຼັງແປງ</td>
            </tr>  
<?php
	if($l_num != 0){	
		while($rw_log = sql_fetch($l_log)){

			$b_id = $rw_log['id_ball'];
			$b_add = $rw_log['add'];
			$a_id = $rw_log['id_usr']; 
			$t_id = $rw_log['type']; 
		
		/*==================Start สีพื้นหลังแต่ล่ะคน s=================*
		echo "<style>
			.table_a tr td{";
			if($a_id == 1){echo "background-color:#ffc;";}
			elseif($a_id == 2){echo "background-color:#fcf;";}
			elseif($a_id == 3){echo "background-color:#f9f;";}		
			elseif($a_id == 4){echo "background-color:#97FFFF;";}
			elseif($a_id == 5){echo "background-color:#FFE4E1;";}
			else{echo "background-color:#FFE4E1;";}
		echo "}
		</style>";
		*==================End สีพื้นหลังแต่ล่ะคน s=====================*/
			
			$sql_ball = sql_query("SELECT * FROM pha_tb_ball_list WHERE b_id = $b_id and b_add = $b_add");
			$rw_ball = sql_fetch($sql_ball);
			
			$sql_admin = sql_query("SELECT * FROM z_live_admin WHERE id_usr = $a_id");
			$rw_admin = sql_fetch($sql_admin);
			
			$sql_type = sql_query("SELECT * FROM z_type WHERE id = $t_id");
			$rw_type = sql_fetch($sql_type);
			
			$sql_h_team = sql_query("SELECT * FROM pha_tb_lao_name WHERE eng = '$rw_ball[b_name_1]'");  
			$ht_num = mysql_num_rows($sql_h_team);
			$rw_h_t = sql_fetch($sql_h_team);
			
			$sql_aw_team = sql_query("SELECT * FROM pha_tb_lao_name WHERE eng = '$rw_ball[b_name_2]'");  
			$awt_num = mysql_num_rows($sql_aw_team);
			$rw_aw_t = sql_fetch($sql_aw_team);
			
			$sql_leauge = sql_query("SELECT * FROM pha_tb_lao_zone WHERE eng LIKE '$rw_ball[b_zone]'");  
			$leg_num = mysql_num_rows($sql_leauge);
			$rw_leg = sql_fetch($sql_leauge);
			
			
			echo "<tr>
					<td>$rw_log[ztime]</td>
					<td>$rw_log[zdate]</td>
					<td><a href='./view.php?sta=1&a_id=$a_id&zday=$_date'   >$rw_admin[state]-$rw_admin[name]</a></td>
					<td>";
			if($leg_num != 0 && $rw_leg['lao'] != ""){
				echo "$rw_leg[lao]";
			}else{
				echo "$rw_ball[b_zone]";
			}		
					
				echo "</td>";
			
				echo "<td><a href='view.php?sta=2&b_id=$b_id&zday=$_date'   >";
			if($ht_num != 0 && $rw_h_t['lao'] != ""){
				echo "$rw_h_t[lao]";
			}else{
				echo "$rw_ball[b_name_1]";
			}	
					
				echo "</a></td>";
				echo "<td>";
			if($awt_num != 0 && $rw_aw_t['lao'] != ""){
				echo "$rw_aw_t[lao]";
			}else{
				echo "$rw_ball[b_name_2]";
			}	
			
				echo "</td>";
				echo "<td><a href='./view.php?sta=3&b_id=$b_id&b_add=$b_add&zday=$_date'   >$rw_ball[b_hdc]</a></td>
					<td><a href='./view.php?sta=4&b_id=$b_id&b_type=$t_id&zday=$_date'  ";
			if($t_id == 1){
				echo "style='color:#00f;'";
			}	
			else if($t_id == 2){
				echo "style='color:#f00;'";
			}
			else if($t_id == 3){
				echo "style='color:#080;'";
			}
			else if($t_id == 4){
				echo "style='color:#c09;'";
			}
			else if($t_id == 5){
				echo "style='color:#366;'";
			}
			else if($t_id == 6){
				echo "style='color:#606;'";
			}
			else if($t_id == 7){
				echo "style='color:#8B4513;'";
			}
				echo ">$rw_type[name]</a></td>
					<td>$rw_log[old]</td>
					<td>";
					
				if($rw_log['old'] < $rw_log['new']){
					echo "<img src='../img/u.gif' />";
				}
				if($rw_log['old'] > $rw_log['new']){
					echo "<img src='../img/d.gif' />";
				}
				echo " $rw_log[new]";	
				echo "</td>
				</tr> 
			";
		}
	}
	else{
		echo "
			<tr><td colspan='10'><center><br/><img src='../img/Alert.gif' /><h3>ບໍ່ພົບຂໍ້ມູນ</h3></center></td></tr>";
	}

?>			
        </table>
    </div>