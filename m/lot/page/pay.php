<table class="table table-striped table-bordered" cellspacing="0" width="100%" style="color:#333333;">
        <thead style="background-color:goldenrod; color: #6A4806" class="thaisan">
            <tr>	
                    <th style="white-space:nowrap"><center><?=$lang_member[160];?></center></th>
                    <th style="white-space:nowrap"><center><?=$lang_member[162];?></center></th>
                    <th style="white-space:nowrap"><center><?=$lang_member[610];?></center></th>
                </tr>
        </thead>
     <? 
 ################Config Member
$url_file="../../../json/config/member/LottoConfig_".$_SESSION[mid].".json";	
$lot6_js=file_get_contents2($url_file);
$lot_m = json_decode2($lot6_js, true);

  
 $empay=@explode(',',$lot_m['m_lotto_pay_member']); 
 $emdis=@explode(',',$lot_m['m_lotto_dis_member']); 
 
 
  for($x=1;$x<=count($lot_type["th"]);$x++){?>
  <? if($empay[$x]>0){ ?>
        <tbody>
                <tr>
               
                    <td style="white-space:nowrap"><?=$lot_type["th"][$x];?></td>
                    <td align="center" style="white-space:nowrap"><?=$empay[$x];?></td>
                    <td align="center" style="white-space:nowrap"><?=$emdis[$x];?></td>
                </tr>
  <? } }?>
        </tbody>
        	<tbody>
            </tbody>
        </table>
        
        <br><br><br>