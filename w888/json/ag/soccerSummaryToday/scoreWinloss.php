<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

  if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
  }

  require('../lang/ag_'.$_SESSION["AGlang"].'.php');
  include "../inc/function.php";
  include "../inc/conn.php";

$list = "<div class='table-responsive'>
			<i class='fa fa-times' aria-hidden='true' style='font-size:25px;color:red;right: 2px;position: absolute;margin-top: -13px;cursor:pointer;' onclick='hideScore();'></i>    
			<table class='table table-striped table-bordered table-hover' style='margin-bottom: 0px;'>
				<tr style='background-color: #CCCCCC;'>
					<td data-value='{'bettype':'HDP','hf':'F','bill_type':'T','matchid':'29550658','uscore':'0:0'}'>
						<strong>BET / <a class='cur' onclick=\"showBetList(this);\"> {$lang_soccerSummaryToday[9]} </a></strong>
					</td>
					<td><strong>5 : 0</strong></td>
					<td><strong>4 : 0</strong></td>
					<td><strong>3 : 0</strong></td>
					<td><strong>2 : 0</strong></td>
					<td><strong>1 : 0</strong></td>
					<td><strong>0 : 0</strong></td>
					<td><strong>0 : 1</strong></td>
					<td><strong>0 : 2</strong></td>
					<td><strong>0 : 3</strong></td>
					<td><strong>0 : 4</strong></td>
					<td><strong>0 : 5</strong></td>
				</tr>        
				<tr style='background-color: #FFFFFF;'>
					<td align='right' class='digits'  >87</td>
					<td align='right' class='digits'  >87</td>
					<td align='right' class='digits'  >87</td>
					<td align='right' class='digits'  >87</td>
					<td align='right' class='digits'  >87</td>
					<td align='right' class='digits'  >87</td>
					<td align='right' class='digits' style='background-color:#ecd666;' >87</td> 
					<td align='right' class='digits'  >44</td>
					<td align='right' class='digits'  >-75</td>
					<td align='right' class='digits'  >-75</td>
					<td align='right' class='digits'  >-75</td>
					<td align='right' class='digits'  >-75</td>
				</tr>    
			</table>
		</div>
		<script type='text/javascript'>    
			$('.digits').digits();
		</script>";

$data = [];
$data = array(
    'list' => $list,
    'status' => true,
);


echo json_encode($data);


 ?>