<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>

<?php require('inc_head.php');?>
<?php 

/*
$lot_type["th"][3]= array(1 =>"3บน", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย"
,25 =>"4ตัว", 26 =>"4โต๊ด", 31 =>"หวยชุด"
);
*/

#print_r($lotHun_typeArry);


$rob=$_POST["post_val"]["l_rob"];
if($rob=="null" || $rob==""){
	$rob=1;
	}
$zone=$_POST["post_val"]["l_zone"];
if($zone=="null" || $zone==""){
	$zone=2;
	}
$level=$_POST["session"]["r_level"];



$date=$_GET['d'];
if($date!=""){
$dd=" and ok_date='$date'";
}
$sql="select * from bom_tb_lotto_ok where lot_zone='$zone' and lot_rob='$rob' $dd  order by ok_id desc limit 1";
$re_ok=sql_array($sql);


$ok_id=$re_ok['ok_id'];
$o_active=$re_ok['o_active'];
if($o_active==0){
	$tb="bom_tb_lotto_bill_play_live";
	}else{
	$tb="bom_tb_lotto_bill_play";	
		}


$mo_array=array();
$num_array=array();

$sql="select 
*,
   (
      ROUND(  (b_total)*((b_myshare_".$level.")/100) ,10)
   ) as r1 
 from $tb where     b_accept=1  and ok_id='$ok_id' and  r_agent_id like  '%*".$_POST["session"]["r_id"]."*%'  and  r_id !=  '".$_POST["session"]["r_id"]."' and lot_type!=31 order by lot_type asc , play_number asc ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
  $mo_array[$rs['lot_type']][$rs['play_number']][]= $rs['r1'];
  $num_array[$rs['lot_type']][]=$rs['play_number'];
}

 $sql="select 
*,
   (
      ROUND(  (b_total)*((b_share_m)/100) ,10)
   ) as r1 
 from $tb where     b_accept=1  and ok_id='$ok_id' and  r_id =  '".$_POST["session"]["r_id"]."'  and lot_type!=31  order by lot_type asc , play_number asc ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
  $mo_array[$rs['lot_type']][$rs['play_number']][]= $rs['r1'];
  $num_array[$rs['lot_type']][]=$rs['play_number'];
}


############ หาเลข
$s_num=array();

foreach ($lotHun_typeArry as $x => $value){ 
  if(count($num_array[$x])>0){
    $s_num[$x] = @array_unique($num_array[$x]);
  }
}
################# รวมยอด
$asum=array();


$_GET[tcut1]=str_replace(',','',trim($_GET[tcut1]));
$_GET[tcut2]=str_replace(',','',trim($_GET[tcut2]));
$_GET[tcut3]=str_replace(',','',trim($_GET[tcut3]));
$_GET[tcut4]=str_replace(',','',trim($_GET[tcut4]));
$_GET[tcut5]=str_replace(',','',trim($_GET[tcut5]));
$_GET[tcut6]=str_replace(',','',trim($_GET[tcut6]));
$_GET[tcut7]=str_replace(',','',trim($_GET[tcut7]));
$_GET[tcut8]=str_replace(',','',trim($_GET[tcut8]));
$_GET[tcut9]=str_replace(',','',trim($_GET[tcut9]));
$_GET[tcut10]=str_replace(',','',trim($_GET[tcut10]));
$_GET[tcut11]=str_replace(',','',trim($_GET[tcut11]));
$_GET[tcut12]=str_replace(',','',trim($_GET[tcut12]));
$_GET[tcut13]=str_replace(',','',trim($_GET[tcut13]));
$_GET[tcut14]=str_replace(',','',trim($_GET[tcut14]));
$_GET[tcut15]=str_replace(',','',trim($_GET[tcut15]));
$_GET[tcut16]=str_replace(',','',trim($_GET[tcut16]));
$_GET[tcut17]=str_replace(',','',trim($_GET[tcut17]));
$_GET[tcut18]=str_replace(',','',trim($_GET[tcut18]));
$_GET[tcut19]=str_replace(',','',trim($_GET[tcut19]));
$_GET[tcut20]=str_replace(',','',trim($_GET[tcut20]));
$_GET[tcut21]=str_replace(',','',trim($_GET[tcut21]));
$_GET[tcut22]=str_replace(',','',trim($_GET[tcut22]));
$_GET[tcut23]=str_replace(',','',trim($_GET[tcut23]));
$_GET[tcut24]=str_replace(',','',trim($_GET[tcut24]));
$_GET[tcut25]=str_replace(',','',trim($_GET[tcut25]));
$_GET[tcut26]=str_replace(',','',trim($_GET[tcut26]));
$_GET[tcut27]=str_replace(',','',trim($_GET[tcut27]));
$_GET[tcut28]=str_replace(',','',trim($_GET[tcut28]));
$_GET[tcut29]=str_replace(',','',trim($_GET[tcut29]));
$_GET[tcut30]=str_replace(',','',trim($_GET[tcut30]));
$_GET[tcut31]=str_replace(',','',trim($_GET[tcut31]));
$_GET[tcut32]=str_replace(',','',trim($_GET[tcut32]));
$_GET[tcut33]=str_replace(',','',trim($_GET[tcut33]));
$_GET[tcut34]=str_replace(',','',trim($_GET[tcut34]));
$_GET[tcut35]=str_replace(',','',trim($_GET[tcut35]));

if($_GET[tcut1]>=0){$x_cut1=$_GET[tcut1];}
else{$x_cut1=0;}
if($_GET[tcut2]>=0){$x_cut2=$_GET[tcut2];}
else{$x_cut2=0;}
if($_GET[tcut3]>=0){$x_cut3=$_GET[tcut3];}
else{$x_cut3=0;}
if($_GET[tcut4]>=0){$x_cut4=$_GET[tcut4];}
else{$x_cut4=0;}
if($_GET[tcut5]>=0){$x_cut5=$_GET[tcut5];}
else{$x_cut5=0;}
if($_GET[tcut6]>=0){$x_cut6=$_GET[tcut6];}
else{$x_cut6=0;}
if($_GET[tcut7]>=0){$x_cut7=$_GET[tcut7];}
else{$x_cut7=0;}
if($_GET[tcut8]>=0){$x_cut8=$_GET[tcut8];}
else{$x_cut8=0;}
if($_GET[tcut9]>=0){$x_cut9=$_GET[tcut9];}
else{$x_cut9=0;}
if($_GET[tcut10]>=0){$x_cut10=$_GET[tcut10];}
else{$x_cut10=0;}
if($_GET[tcut11]>=0){$x_cut11=$_GET[tcut11];}
else{$x_cut11=0;}
if($_GET[tcut12]>=0){$x_cut12=$_GET[tcut12];}
else{$x_cut12=0;}
if($_GET[tcut13]>=0){$x_cut13=$_GET[tcut13];}
else{$x_cut13=0;}
if($_GET[tcut14]>=0){$x_cut14=$_GET[tcut14];}
else{$x_cut14=0;}
if($_GET[tcut15]>=0){$x_cut15=$_GET[tcut15];}
else{$x_cut16=0;}
if($_GET[tcut17]>=0){$x_cut17=$_GET[tcut17];}
else{$x_cut17=0;}
if($_GET[tcut18]>=0){$x_cut18=$_GET[tcut18];}
else{$x_cut18=0;}
if($_GET[tcut19]>=0){$x_cut19=$_GET[tcut19];}
else{$x_cut19=0;}
if($_GET[tcut20]>=0){$x_cut20=$_GET[tcut20];}
else{$x_cut20=0;}
if($_GET[tcut21]>=0){$x_cut21=$_GET[tcut21];}
else{$x_cut21=0;}
if($_GET[tcut22]>=0){$x_cut22=$_GET[tcut22];}
else{$x_cut22=0;}
if($_GET[tcut23]>=0){$x_cut23=$_GET[tcut23];}
else{$x_cut23=0;}
if($_GET[tcut24]>=0){$x_cut24=$_GET[tcut24];}
else{$x_cut24=0;}
if($_GET[tcut25]>=0){$x_cut25=$_GET[tcut25];}
else{$x_cut25=0;}
if($_GET[tcut26]>=0){$x_cut26=$_GET[tcut26];}
else{$x_cut26=0;}
if($_GET[tcut27]>=0){$x_cut27=$_GET[tcut27];}
else{$x_cut27=0;}
if($_GET[tcut28]>=0){$x_cut28=$_GET[tcut28];}
else{$x_cut28=0;}
if($_GET[tcut29]>=0){$x_cut29=$_GET[tcut29];}
else{$x_cut29=0;}
if($_GET[tcut30]>=0){$x_cut30=$_GET[tcut30];}
else{$x_cut30=0;}
if($_GET[tcut31]>=0){$x_cut31=$_GET[tcut31];}
else{$x_cut31=0;}
if($_GET[tcut32]>=0){$x_cut32=$_GET[tcut32];}
else{$x_cut32=0;}
if($_GET[tcut33]>=0){$x_cut33=$_GET[tcut33];}
else{$x_cut33=0;}
if($_GET[tcut34]>=0){$x_cut34=$_GET[tcut34];}
else{$x_cut34=0;}
if($_GET[tcut35]>=0){$x_cut35=$_GET[tcut35];}
else{$x_cut35=0;}


foreach ($lotHun_typeArry as $x => $value){      
    if(count($s_num[$x])>0)
    {
      foreach($s_num[$x] as $num)
      {
        $sum=@array_sum($mo_array[$x][$num]);

        if($x==1){$x_cut=$x_cut1;}
        elseif($x==2){$x_cut=$x_cut2;}
        elseif($x==3){$x_cut=$x_cut3;}
        elseif($x==4){$x_cut=$x_cut4;}
        elseif($x==5){$x_cut=$x_cut5;}
        elseif($x==6){$x_cut=$x_cut6;}
        elseif($x==7){$x_cut=$x_cut7;}
        elseif($x==8){$x_cut=$x_cut8;}
        elseif($x==9){$x_cut=$x_cut9;}
        elseif($x==10){$x_cut=$x_cut10;}
        elseif($x==11){$x_cut=$x_cut11;}
        elseif($x==12){$x_cut=$x_cut12;}
        elseif($x==13){$x_cut=$x_cut13;}
        elseif($x==14){$x_cut=$x_cut14;}
        elseif($x==15){$x_cut=$x_cut15;}
        elseif($x==16){$x_cut=$x_cut16;}
        elseif($x==17){$x_cut=$x_cut17;}
        elseif($x==18){$x_cut=$x_cut18;}
        elseif($x==19){$x_cut=$x_cut19;}
        elseif($x==20){$x_cut=$x_cut20;}
        elseif($x==21){$x_cut=$x_cut21;}
        elseif($x==22){$x_cut=$x_cut22;}
        elseif($x==23){$x_cut=$x_cut23;}
        elseif($x==24){$x_cut=$x_cut24;}
        elseif($x==25){$x_cut=$x_cut25;}
        elseif($x==26){$x_cut=$x_cut26;}
        elseif($x==27){$x_cut=$x_cut27;}
        elseif($x==28){$x_cut=$x_cut28;}
        elseif($x==29){$x_cut=$x_cut29;}
        elseif($x==30){$x_cut=$x_cut30;}
        elseif($x==31){$x_cut=$x_cut31;}
        elseif($x==32){$x_cut=$x_cut32;}
        elseif($x==33){$x_cut=$x_cut33;}
        elseif($x==34){$x_cut=$x_cut34;}
        elseif($x==35){$x_cut=$x_cut35;}

        if($sum>=$x_cut and $x_cut!=""){
          $sum_cut=$x_cut;
        }else{
          $sum_cut=$sum;  
        }
          
        $asum['sum'][$x][$num]=$sum_cut;
        $asum['num'][$x][$sum_cut]=$num;
        }
    }
}

/*
foreach ($lotHun_typeArry as $x => $value){
  if(count($asum['num'][$x])>0){  
    if($_GET['asc']!=1){
      arsort($asum['sum'][$x]);###มาก หา น้อย 
    }
  }
}

*/

?>
<style>
	.top-title-style{
		width: 100%;
		height: 38px;
		line-height: 38px;
		background-color: #d4c18a;
		color: #333;
		text-align: center;
	}

	.title-style{
		width: 100%;
		height: 38px;
		line-height: 38px;
		background-image: linear-gradient(to bottom,#fff 0,#eee 100%);
		background-repeat: repeat-x;
		filter: 
		color: #b68700;
		text-align: center;
		border-top: 1px solid #c5c5c5;
	}
	
	.m_table{
		width: 100%;
		margin-bottom: 10px;
	}

	.m_table thead tr{
		text-align: center;
		height: 25px;
		background: #b59a48;
		color: #333;
	}
	
	.m_table tbody tr{
		text-align: center;
		height: 26px;
	}
	
	.m_table tbody tr:nth-child(even){
		background: #ffffff;
	}

	.m_table tbody tr:nth-child(odd){
		background: #f9f9f9;
	}
	
	.m_table td , .m_table th{
		font-weight: 500;
	}

	.m_table tfoot tr{
		height: 25px;
		background: #909090;
		text-align: center;
		color: #333;
		background-image: linear-gradient(to bottom,#fff 0,#eee 100%);
		background-repeat: repeat-x;
		border-bottom: 0.5px solid #c5c5c5;
	}
	

	
	.normal-box{
		height: auto;
		padding: 5px;
	}
	
	.extra-box{
		padding: 5px;
		height: auto;
	}

	.box-color{
		background-color: #EFF3F8;
	}
</style>

<div class="row">
	
						<?php 
							if($_POST["post_val"]["l_zone"] !== null)
							{
								#print_r($_POST["post_val"]);
							}
							
                            $lot_zone = $lot_zone[$_POST["session"]["AGlang"]]["zone"];

                         ?>
                        <form class="form-horizontal" id="" method="post">
                            <div class="col-md-12 col-xs-12">
                            <div class="form-group" style="padding:5px 15px;">   
                                    <div class="mobile-padding input-box button-box xs-w-100 " style="float: left;">                              
                                    <label class="control-label text-left label-1"  style="min-width: 80px;" for="l_zone"><?=$lang_ag[1657];?> : </label>
                                    <select class="input-sm lot_sl xs-w-100 " style="height:30px; min-width: 100px;" id="l_zone" name="l_zone" onchange="set_rob(this.value);">
                                        <?php foreach ($lot_zone as $key => $value) {
                                          if($key != 1) {
                                            ?>
                                               <option value="<?=$key;?>"  <? if($zone==$key){echo'selected="selected"';}?>> <?=$value;?></option>
                                            <?  }   } ?>
                                    </select>

                                    <label class="control-label text-left label-1 rob" style="min-width: 80px;"><?=$lang_ag[1388];?> :</label>
                                    <select class="input-sm lot_sl rob" name="l_rob" id="l_rob" style="height:30px; min-width: 100px;" onchange="">
                                        
                                    </select>  

                                    <label class="control-label text-left label-1 rob" style="min-width: 80px;"></label>
                                        <button type="button" class="btn btn-primary btn-sm" id="btn_save" onclick="submit_form()">
                                            ค้นหา  
                                        </button>
                          

                                    </div>   
                                    
                                   
                            </div>
                            </div>
                            </form>
</div>
<div class="row">

	<div class="col-md-10 col-xs-12">
		<div class="top-title-style"><?=$lang_ag[219];?></div>
	</div>
	<div class="col-md-2 col-xs-12" >
		<div class="top-title-style"><?=$lang_ag[224];?></div>
	</div>
</div>
<div class="row">
		<div class="col-md-10 col-xs-12">
			<div class="normal-box box-color">		
			<?php 
$lot_ok = array(1,3,4,5,25,26);			
				foreach($lotHun_typeArry as $key => $value){
					

if (in_array($key, $lot_ok)) { 

$type=$key;
$sum_total=array();

$bom_asc=$asum['sum'][$type]; 

?>
<div class="col-md-2 col-xs-12">
<?
if(count($bom_asc)>0){		
			?>
				
					<div class="title-style"><?=$value;?></div>
					<table class="m_table">
						<thead>
							<tr>
								<th><?=$lang_ag[227];?></th>
								<th><?=$lang_ag[229];?></th>
							</tr>
						</thead>
						<tbody>
<?
foreach(array_keys($bom_asc) as $c_num){  

$g_sum=$asum['sum'][$type][$c_num];
$sum_total[]=$g_sum;
###############################

?>
							<tr>
								<td><?=$c_num;?></td>
								<td> <?=number_format(round($g_sum));?> </td>
							</tr>
<? }?>
						
						</tbody>
						<tfoot>
							<tr>
								<td><?=$lang_ag[197];?></td>
								<td><?=number_format(round(@array_sum($sum_total)));?></td>	
							</tr>
						</tfoot>
					</table>
				
	<? }
?>
</div>
<?
	 }}?>
	<div style="clear: both;"></div>
</div>
</div>
<div class="col-md-2 col-xs-12">
	<div class="normal-box box-color">		
	<div class="col-md-12 col-xs-12" >
		<div class="row">
			
			<?php 
$lot_ok = array(6,7,21,22,23);	
			
				foreach($lotHun_typeArry as $key => $value){
if (in_array($key, $lot_ok)) { 
$type=$key;
$sum_total=array();

$bom_asc=$asum['sum'][$type]; 


if(count($bom_asc)>0){		
			?>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="title-style"><?=$value;?></div>
						<table class="m_table">
							<thead>
								<tr>
									<th><?=$lang_ag[227];?></th>
									<th><?=$lang_ag[229];?></th>
								</tr>
							</thead>
							<tbody>
<?
foreach(array_keys($bom_asc) as $c_num){  

$g_sum=$asum['sum'][$type][$c_num];
$sum_total[]=$g_sum;
###############################

?>
							<tr>
								<td><?=$c_num;?></td>
								<td> <?=number_format(round($g_sum));?> </td>
							</tr>
<? }?>

							</tbody>
							<tfoot>
								<tr>
									<td><?=$lang_ag[197];?></td>
									<td><?=number_format(round(@array_sum($sum_total)));?></td>	
								</tr>
							</tfoot>
						</table>
					</div>
	<? } }}?>
	</div>
			</div>
			<div style="clear: both;"></div>
		</div>

	</div>
</div>
<script>
	
set_rob(<?=$zone;?>);

    function set_rob(zone)
    {
      var lot_zone_bet = <?=json_encode($lot_zone_bet);?>;
      var lang_rob = <?=json_encode($lang_lotHun['rob']);?>;
      var lot_robmun = <?=json_encode($lot_robmun);?>;
      var option = "";

      var rob_se = "<?=$rob?>";

      $(".rob").show(); 
      if(lot_zone_bet[zone] == 1)
      {
       $("#l_rob").text("");
       $(".rob").hide(); 
      }else if(lot_zone_bet[zone] == 2 || lot_zone_bet[zone] == 4)
      {
         $.each(lang_rob[lot_zone_bet[zone]],function(index, el) {
             option += "<option value=\""+index+"\" "+(rob_se==index ? 'selected="selected"':'')+">"+el+"</option>";
         });
      }else if(lot_zone_bet[zone] == 11)
      {
         $.each(lot_robmun,function(index, el) {
             option += "<option value=\""+index+"\" "+(rob_se==index ? 'selected="selected"':'')+">"+el+"</option>";
         });
      }else{
         for(var i=1; i<=96; i++)
         {
             option += "<option value=\""+i+"\" "+(rob_se==i ? 'selected="selected"':'')+">"+i+"</option>";
         }
      }
      $("#l_rob").text("").append(option);

    }


    function submit_form()
    {
    	var l_zone = $("#l_zone").val();
    	var l_rob = $("#l_rob").val();
    	var val = "?l_zone="+l_zone+"&l_rob="+l_rob+"";
    	getMenu('_money_hun',val);
    }


</script>