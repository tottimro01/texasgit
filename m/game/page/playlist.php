<br>
<form action="" method="get">
<input name="tlot" type="hidden" value="<?=$_GET[tlot];?>" />
<input name="vvw" type="hidden" value="<?=$_GET[vvw];?>" />
<input name="cmd" type="hidden" value="<?=$_GET[cmd];?>" />
<div class="input-group input-group">
                <input name="q" class="form-control" id="q" value="<?=$_GET[q];?>"  type="text" >
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-warning btn-flat">ค้นหา</button>
                    </span>
              </div>
</form>
<br>
<table class="table table-striped table-bordered" cellspacing="0" width="100%" style="color:#333333; font-size:10px">
<thead style="background-color:goldenrod; color: #6A4806" class="thaisan">
            <tr>    
                    <th style="white-space:nowrap"><center>วัน-เวลา</center></th>
                    <th style="white-space:nowrap"><center>Bet ID</center></th>
                    <th style="white-space:nowrap"><center>Play ID</center></th>
                    <th style="white-space:nowrap"><center>เกมส์</center></th>
                    <th style="white-space:nowrap"><center>เลือก</center></th>
                    <th style="white-space:nowrap"><center>เดิมพัน</center></th>
                    <th style="white-space:nowrap"><center>สถานะ</center></th>
                </tr>
        </thead>
<tbody>
 <?
   if($_GET[q]!=""){
      $qq=" and bet_id like '%$_GET[q]%' ";
      }
      
$re=sql_page(" bom_tb_games_bill_play where  m_id='$_SESSION[mid]' $qq   ","play_id","desc",50);
while($rs=sql_fetch($re[re])){
  ?>
 <? if($rs[game_zone]==1){?>
<tr class="tr_lot">
  <td align="center"><?=$rs[play_datenow];?></td>
    <td align="center"><?=$rs[bet_id];?></td>
      <td align="center"><?=$rs[play_id];?></td>
        <td align="center"><?=$game_zone[$rs[game_zone]];?></td>
        
    <td align="center"><img src="img/2hit/<?=$rs["play_bet"]?>.png" height="22"></td>
    <td align="center"><?=number_format($rs[b_total]);?></td>
    <td align="center"><?=$games_type[$rs[play_status]];?></td>
  </tr>
  
  <? }elseif($rs[game_zone]==2){?>
  
<tr class="tr_lot">
  <td align="center"><?=$rs[play_datenow];?></td>
    <td align="center"><?=$rs[bet_id];?></td>
      <td align="center"><?=$rs[play_id];?></td>
        <td align="center"><?=$game_zone[$rs[game_zone]];?></td>
        
    <td align="center">
      <img src="img/dragon/<?=$rs["play_bet"]?>.png?v=1" height="22">
</td>
    <td align="center"><?=number_format($rs[b_total]);?></td>
    <td align="center"><?=$games_type[$rs[play_status]];?></td>
  </tr>
  
    <? }elseif($rs[game_zone]==3){?>  
    <tr class="tr_lot">
      <td align="center"><?=$rs[play_datenow];?></td>
    <td align="center"><?=$rs[bet_id];?></td>
      <td align="center"><?=$rs[play_id];?></td>
        <td align="center"><?=$game_zone[$rs[game_zone]];?></td>
        
    <td align="center" ><img src="img/bacarat/b<?=$rs[play_bet]?>.png" height="22"></td>
    <td align="center"><?=number_format($rs[b_total]);?></td>
    <td align="center"><?=$games_type[$rs[play_status]];?></td>
  </tr>
      <? }elseif($rs[game_zone]==4){
    $ex=explode("," , $rs["play_bet"]);
          ?>
<tr class="tr_lot">
  <td align="center"><?=$rs[play_datenow];?></td>
    <td align="center"><?=$rs[bet_id];?></td>
      <td align="center"><?=$rs[play_id];?></td>
        <td align="center"><?=$game_zone[$rs[game_zone]];?></td>
        
    <td align="center"><? foreach ($ex as &$value) { ?><img src="img/hilo/hilo<?=$value?>.png" height="22"><? } ?></td>
    <td align="center"><?=number_format($rs[b_total]);?></td>
    <td align="center"><?=$games_type[$rs[play_status]];?></td>
  </tr>
        <? }elseif($rs[game_zone]==5){
             $ex=explode("," , $rs["play_bet"]);
            ?>
<tr class="tr_lot">
  <td align="center"><?=$rs[play_datenow];?></td>
    <td align="center"><?=$rs[bet_id];?></td>
      <td align="center"><?=$rs[play_id];?></td>
        <td align="center"><?=$game_zone[$rs[game_zone]];?></td>
        
    <td align="center"><? foreach ($ex as &$value) { ?><img src="img/fish/<?=$value?>.png" height="22"><? } ?></td>
    <td align="center"><?=number_format($rs[b_total]);?></td>
    <td align="center"><?=$games_type[$rs[play_status]];?></td>
  </tr>
  <? }?>
  <? }?>
  
  </tbody></table>
  <div style="color:#000;">
   <p>   <?=_page("&cmd=playlist&$_GET[tlot]&tlot=$_GET[tlot]&vvw=$_GET[vvw]",$re[page]);?></p>
   </div>
  