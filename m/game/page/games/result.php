<br> <select class="txtq2"  onchange="window.location.href = '?tlot=<?=$_GET[tlot];?>&vvw=<?=$_GET[vvw];?>&zone='+this.value;" >
        <option value="">ทั้งหมด</option>
                                        <? for($x=1;$x<=5;$x++){?>
                                    <option value="<?=$x?>" <? if($_GET[zone]==$x){echo'selected="selected"';}?>><?=$game_zone[$x]?></option>
                                    <? }?>
      </select>
<table width="100%" border="0" cellspacing="1" cellpadding="5" class="bg_table">
<tbody>
<tr class="tb_title_lotto">
    <td width="25%" align="center" height="25">วันที่</td>
    <td width="25%" align="center">Bet ID</td>
    <td width="25%" align="center">เกมส์</td>
    <td width="25%" align="center">ผล</td>
  </tr>
  <?
  if($_GET[zone]!=""){
	  $qq=" where game_zone='$_GET[zone]' ";
	  }
$sql="select * from bom_tb_games_bet   $qq  order by bet_id desc limit 50";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	$ex=explode("," , $rs["bet_win"]);
	$exw=explode("," , $rs["bet_win_score"]);
	
?>

  
   <? if($rs[game_zone]==1){?>
<tr class="tr_lot">
    <td align="center"><?=$rs[b_date];?></td>
   <td align="center"><?=$rs[bet_id];?></td>
   <td align="center"><?=$game_zone[$rs[game_zone]];?></td>
        
    <td align="center"><img src="img/2hit/<?=$ex[1]?>.png" height="30"></td>
  </tr>
  
  <? }elseif($rs[game_zone]==2){?>
  
<tr class="tr_lot">
    <td align="center"><?=$rs[b_date];?></td>
   <td align="center"><?=$rs[bet_id];?></td>
   <td align="center"><?=$game_zone[$rs[game_zone]];?></td>
        
    <td align="center"><img src="img/bacarat/card/<?=$ex[1]?>.jpg?v=1" height="35"> -vs- <img src="img/bacarat/card/<?=$ex[2]?>.jpg?v=1" height="35">&nbsp;
    <? if($exw[1]>$exw[2]){?>
    <img src="img/red.png?v=1" height="25">
    <? }elseif($exw[1]<$exw[2]){?>
    <img src="img/yellow.png?v=1" height="25">
    <? }else{?>
    <img src="img/green.png?v=1" height="25">
    <? }?>
    </td>
  </tr>
  
    <? }elseif($rs[game_zone]==3){?>  
    <tr class="tr_lot">
    <td align="center"><?=$rs[b_date];?></td>
   <td align="center"><?=$rs[bet_id];?></td>
   <td align="center"><?=$game_zone[$rs[game_zone]];?></td>
        
    <td align="center" class="cca<?=$rs[bet_win];?>">
    <img src="img/bacarat/card/<?=$ex[1]?>.jpg?v=1" height="35"><img src="img/bacarat/card/<?=$ex[2]?>.jpg?v=1" height="35">
     -vs- 
     <img src="img/bacarat/card/<?=$ex[3]?>.jpg?v=1" height="35"><img src="img/bacarat/card/<?=$ex[4]?>.jpg?v=1" height="35"></td>
  </tr>
      <? }elseif($rs[game_zone]==4){

		  ?>
<tr class="tr_lot">
    <td align="center"><?=$rs[b_date];?></td>
   <td align="center"><?=$rs[bet_id];?></td>
   <td align="center"><?=$game_zone[$rs[game_zone]];?></td>
        
    <td align="center"><img src="img/hilo/hilo<?=$ex[1]?>.png" height="30"> <img src="img/hilo/hilo<?=$ex[2]?>.png" height="30"> <img src="img/hilo/hilo<?=$ex[3]?>.png" height="30"></td>
  </tr>
        <? }elseif($rs[game_zone]==5){

			?>
<tr class="tr_lot">
    <td align="center"><?=$rs[b_date];?></td>
   <td align="center"><?=$rs[bet_id];?></td>
   <td align="center"><?=$game_zone[$rs[game_zone]];?></td>
        
    <td align="center"><img src="img/fish/<?=$ex[1]?>.png" height="30"> <img src="img/fish/<?=$ex[2]?>.png" height="30"> <img src="img/fish/<?=$ex[3]?>.png" height="30"></td>

  </tr>
  <? }?>
 <? }?>
  
  </tbody></table>