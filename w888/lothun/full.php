
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
                // $zone=$_SESSION["zone_hun"];
                // $rob=$_SESSION["rob_hun"];
                $zone=$_GET['zone_send'];
                $rob=$_GET['rob_send'];
                $arr=array();
                $sql = sql_query_lot("select * from bom_tb_".$zone."_sa where   s_sum<10  and lot_rob='$rob' order by lot_type asc, play_number asc");
                while($rs=sql_fetch($sql)){ 
                  $arr[$rs['lot_type']][]=$rs['play_number'];
                }
        	      // for($type=1;$type<=count($lot_type[$_SESSION['lang']][$zone]);$type++){		
                foreach ($lot_type[$_SESSION['lang']][$zone] as $type => $value) {
                  if(@count($arr[$type])>0){
              ?>
              <div style="margin:auto; height:25px; background:#8e2c22; text-align:center; margin:5px; line-height:25px; color:#fff;"><?=$value;?></div>
              <?
                foreach($arr[$type] as $num){
                  echo   "$num , ";
                  }
				      ?>
                <br>
              <? 
                  }
                }
              ?>
                
             </td>
            </tr>
          </tbody>
        </table></td>
    </tr>
  </tbody>
</table>
