<?php
	/* $n_date2 = explode("-", $_GET['zday']);
	$n_dmy2 = $n_date2[2]."-".$n_date2[1]."-".$n_date2[0];
	$_GET['zday'] = $n_dmy2;
	$z_date = $_GET['zday']; */
	
	$n_date2 = explode("-", $_GET['zday']);
		if($n_date2[0] < 100){
			$n_dmy2 = $n_date2[2]."-".$n_date2[1]."-".$n_date2[0];
			$_GET['zday'] = $n_dmy2;
		}
		$z_date = $_GET['zday'];
		$a_date = $z_date;
		
	$n_date3 = explode("-", $a_date);
		if($n_date3[0] > 100){
			$n_dmy3 = $n_date3[2]."-".$n_date3[1]."-".$n_date3[0];
			$a_date = $n_dmy3;
		}
		$s_date = $a_date;
		
?>
<div>
	<center style='margin-top:20px;'><h3>ປະຫວັດການປັບປ່ຽນລາຄາວັນທີ <?php echo $s_date; ?></h3></center>
	<table width='100%'>
		<tr>
			<td valign="top">
				<form action="" method='get' width='50%'>
				  ວັນທີ:
				  <input style='height:33px;' type="date" name="zday" value='<?=$z_date; ?>'>
				  <input type="submit" class='btn1' value='ຄົ້ນຫາ' name='zsubmit'>
				</form>
			</td>
			<td valign="top" align='right' width='50%'><button onclick="history.back();" class='btn2'>ກັບຄືນ</button></td>
		</tr>
	</table>	
</div>