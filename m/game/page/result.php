<select name="jumpMenu" id="jumpMenu" onchange="window.location.href = '?cmd=<?=$_GET[cmd];?>&vvw=<?=$_GET[vvw];?>&zone='+this.value;" class="form-control thaisan" style="background-color:goldenrod;color: #6A4806; height:37px; font-size:15px; margin-top:15px">
       <option value="">ทั้งหมด</option>
                                        <? for($x=1;$x<=5;$x++){?>
                                    <option value="<?=$x?>" <? if($_GET[zone]==$x){echo'selected="selected"';}?>><?=$game_zone[$x]?></option>
                                    <? }?>
      </select>

<br>
<table class="table table-striped table-bordered" cellspacing="0" width="100%" style="color:#333333; font-size:10px">

<thead style="background-color:goldenrod; color: #6A4806" class="thaisan">
<tr class="tb_title_lotto">
    <th style="white-space:nowrap"><center>วันที่</center></th>
    <th style="white-space:nowrap"><center>Bet ID</center></th>
    <th style="white-space:nowrap"><center>เกมส์</center></th>
    <th style="white-space:nowrap"><center>ผล</center></th>
  </tr>
  </thead>
  <tbody>
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
  