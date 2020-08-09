
<div class="row">
	<div class="panel panel-default">
	<div class="panel-heading">
		<h1 class="panel-title thaisan" align="center" style="font-size:32px; color:#000"><strong><i class="fa fa-rss"></i> <!-- ข่าวสาร --><?=$lang_member[441];?></strong></h1>
    </div>

    <div class="panel-body">
    
                <? #$sqlnews = sql_query("SELECT * FROM bom_tb_news ORDER BY n_date DESC");?>
                <? #while($objnews = sql_fetch($sqlnews)){ ?>
<?
$i=1;
# $sql_ok=sql_query("select * from bom_tb_news where n_type =2  $ddd order by n_id desc limit 100");
#while($rs=sql_fetch($sql_ok)){
$url_file1="../../../json/news/lotto.json";	
$ok_js=file_get_contents2($url_file1);
$ok_bet = json_decode2($ok_js, true);
foreach($ok_bet as $rs){

?>
                	<div class="row" style="margin:0px; padding:0px; border-bottom:1px solid #E0E0E0; color:#333333">
                    	<div class="col-xs-12 thaisan" align="left" style="margin-top:10px; margin-bottom:10px">
                        <?=$rs["n_note"];?><br />
						<span style="float:right"><strong><?=$rs[n_date];?></strong></span>                     
                        </div>
                    </div>
                 <? } ?>   

	</div>
</div>
</div>

<br />