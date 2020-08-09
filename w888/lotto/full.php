<table width="100%" border="0" align="left" cellpadding="0" cellspacing="1" class="bg_table">
  <tbody>
    <tr>
      <td height="25" align="center" class="tb_title_lotto"><?=$lang_member[414];?></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#ffffff"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
          <tbody>
            <tr align="center" class="txt_back12b">
              <td height="100" class="txt_red12b" align="center">
              <? 
$arr=array();
$sql = sql_query_lot("select * from bom_tb_1_sa where   s_sum<10  order by lot_type asc, play_number asc");
while($rs=sql_fetch($sql)){ 
$arr[$rs['lot_type']][]=$rs['play_number'];
}
				
        	for($type=1;$type<=count($lot_type[$_SESSION['lang']][1]);$type++){		
				  if(@count($arr[$type])>0){
				
				  ?>
              <div style="margin:auto; height:25px; background:#8e2c22; text-align:center; margin:5px; line-height:25px; color:#fff;"><?=$lot_type[$_SESSION['lang']][1][$type];?></div>
              <?
			    foreach($arr[$type] as $num){
				echo   "$num , ";
				}
				 ?>
                
                <br>
                <? }}?>
                
             </td>
            </tr>
          </tbody>
        </table></td>
    </tr>
  </tbody>
</table>
