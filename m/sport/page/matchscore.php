<div class="row" align="center">
<div class="col-xs-12ths thaisan" style="background-color:#666666"><font color="#FFFF00" class="thaisan" style="font-weight:bold; margin-top:10px; margin-bottom:10px">ผลบอล</font></div>
<? $sqlmatchscore = sql_array("SELECT * FROM tb_matchscore 
				INNER JOIN tb_matchtopic ON
				tb_matchscore .mats_topic = tb_matchtopic.matt_code 
				WHERE mats_topic = 'MAT01' ORDER BY mats_time ASC");?>

<div class="col-xs-12 thaisan" align="center" style="background-color:#3b5998; padding-top:5px; padding-bottom:5px"><?=$sqlmatchscore["matt_detail"];?></div>


<? $sqlmatchscore = sql_query("SELECT * FROM tb_matchscore WHERE mats_topic = 'MAT01' ORDER BY mats_time ASC");?>
                
<? while($objmatchscore = sql_fetch($sqlmatchscore)){ ?>
<div class="row" style="margin:0px; padding:0px; border-bottom:1px solid #E0E0E0; color:#333333; background-color:#EFEFEF">
<div class="col-xs-1sths" style="margin-top:10px"><?=substr($objmatchscore["mats_time"], 0, 5);?></div>
<div class="col-xs-8ths thaisan">

<? if($objmatchscore["mats_team1scorea"] > $objmatchscore["mats_team2scorea"]){ ?><u><font color="#FF0000"><?=$objmatchscore["mats_teamname1"];?></font></u>
<br />
<?=$objmatchscore["mats_teamname2"];?>
<? }elseif($objmatchscore["mats_team2scorea"] > $objmatchscore["mats_team1scorea"]){ ?><?=$objmatchscore["mats_teamname1"];?>
<br />
<u><font color="#FF0000"><?=$objmatchscore["mats_teamname2"];?></font></u>
<? }else{ ?>
<?=$objmatchscore["mats_teamname1"];?><br />
<?=$objmatchscore["mats_teamname2"];?>
<? } ?>

</div>
<div class="col-xs-1sths" style="margin-top:10px; color:#006600">HF.</div>
<div class="col-xs-1sths">
<font color="#3b5998"><strong><?=$objmatchscore["mats_team1scoreb"];?></strong></font><br />
<font color="#3b5998"><strong><?=$objmatchscore["mats_team2scoreb"];?></strong></font>
</div>
<div class="col-xs-1sths" style="margin-top:10px; color:#FF0000">FT.</div>
<div class="col-xs-1sths">
<font color="#3b5998"><strong><?=$objmatchscore["mats_team1scoreb"];?></strong></font><br />
<font color="#3b5998"><strong><?=$objmatchscore["mats_team2scoreb"];?></strong></font>
</div>
</div>
<? } ?>

<? $sqlmatchscore2 = sql_array("SELECT * FROM tb_match 
				INNER JOIN tb_matchtopic ON
				tb_match.mat_topic = tb_matchtopic.matt_code 
				WHERE mat_topic = 'MAT02' ORDER BY mat_time ASC");?>


<div class="col-xs-12 thaisan" align="center" style="background-color:#3b5998; padding-top:5px; padding-bottom:5px"><?=$sqlmatchscore2["matt_detail"];?></div>      
 
<? $sqlmatchscores2 = sql_query("SELECT * FROM tb_matchscore WHERE mats_topic = 'MAT02' ORDER BY mats_time ASC");?>
                
<? while($objmatchscore2 = sql_fetch($sqlmatchscores2)){ ?>
<div class="row" style="margin:0px; padding:0px; border-bottom:1px solid #E0E0E0; color:#333333; background-color:#EFEFEF">
<div class="col-xs-1sths" style="margin-top:10px"><?=substr($objmatchscore2["mats_time"], 0, 5);?></div>
<div class="col-xs-8ths thaisan">
<? if($objmatchscore2["mats_team1scorea"] > $objmatchscore2["mats_team2scorea"]){ ?><u><font color="#FF0000"><?=$objmatchscore2["mats_teamname1"];?></font></u>
<br />
<?=$objmatchscore2["mats_teamname2"];?>
<? }elseif($objmatchscore2["mats_team2scorea"] > $objmatchscore2["mats_team1scorea"]){ ?><?=$objmatchscore2["mats_teamname1"];?>
<br />
<u><font color="#FF0000"><?=$objmatchscore2["mats_teamname2"];?></font></u>
<? }else{ ?>
<?=$objmatchscore2["mats_teamname1"];?><br />
<?=$objmatchscore2["mats_teamname2"];?>
<? } ?>
</div>
<div class="col-xs-1sths" style="margin-top:10px; color:#006600">HF.</div>
<div class="col-xs-1sths">
<font color="#3b5998"><strong><?=$objmatchscore2["mats_team1scoreb"];?></strong></font><br />
<font color="#3b5998"><strong><?=$objmatchscore2["mats_team2scoreb"];?></strong></font>
</div>
<div class="col-xs-1sths" style="margin-top:10px; color:#FF0000">FT.</div>
<div class="col-xs-1sths">
<font color="#3b5998"><strong><?=$objmatchscore2["mats_team1scoreb"];?></strong></font><br />
<font color="#3b5998"><strong><?=$objmatchscore2["mats_team2scoreb"];?></strong></font>
</div>
</div>
<? } ?>               
                
</div>