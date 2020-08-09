<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

  if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
  }


  include "inc/function.php";
  include "inc/conn.php";
  require('lang/ag_lang.php');
  require('lang/function_array.php');
 
  $pagi_data["this_page"]  = $_GET;
  //เช็คหัว ว่าผิดรับบิลมั้ย
 $r_agent_id_level = explode("*", $_SESSION['r_agent_id'].$_SESSION['rid']."*");
 $sql = "select r_id, r_sport_delete_bill from bom_tb_agent where r_id in (".implode(",",array_filter($r_agent_id_level)).")";
 $re_delete_bin = sql_query($sql);
 $is_delete_bin = true;
  while($rs = sql_fetch($re_delete_bin)){
     if($rs['r_sport_delete_bill'] == 0)
     {
        $is_delete_bin = false;
     }
  }


  $cc=1;
  $c_date=" and b_date='$_GET[d]'";

  if($_GET[q]!=""){
    $qq="and (bill_id like '$_GET[q]' )";
    $c_date=" ";
  }

  #if($_GET[type]!=""){ $type="and b_rob='$_GET[rob]'";}
  if($_GET[b]!=""){ 
    if($_GET[b]==1){
       $bet="and b_numstep='$_GET[b]'";   
      }else{
       $bet="and b_numstep>='$_GET[b]'";   
     }
  }

  $user = array();
  $sql = "SELECT `m_id`,`m_name`,`m_user` FROM `bom_tb_member` ";
    $re = sql_query($sql);
    while($rs=sql_fetch($re)){
      $user[$rs['m_id']]['user'] = $rs['m_user'];
    }

  

  if($_GET[mid]!=""){ $xmid="and m_id='$_GET[mid]'";}
  if($_GET[out]==1){ $b_out="and b_status=5 ";}
  if($_GET[bill]!=""){ $xbill=' and bill_id in ('.$_GET[bill].')';}

  $arr_payok=array();

  $r_agent_id = $_SESSION["r_agent_id"].$_SESSION["r_id"]."*";

  if($_GET[orderby]==1){  // ตามชนะ หรือ เวลา
      $sql_num = "SELECT count(bill_id) as num FROM `bom_tb_football_bill_live` where 1 $c_date  and r_agent_id = '$r_agent_id' and b_accept = 2 $type $bet  $shop  $qq   $xmid $xbill  $b_out";
  }else{
      $sql_num = "SELECT count(bill_id) as num FROM `bom_tb_football_bill_live` where 1 $c_date  and r_agent_id = '$r_agent_id' and b_accept = 2 $type $bet  $shop  $qq   $xmid $xbill  $b_out";
  }

  // แบ่งหน้า

  $num = sql_array($sql_num);
  $num_row =   intval($num['num']);

  $rowPerPage = $_GET["rowPerPage"];
  $page       = $_GET["this_page"];
  $start      = ($page-1)*$rowPerPage;

  $pagi_data["numrow"] =  $num_row;
  $pagi_data["rowPerPage"] =  $rowPerPage;
  $pagi_data["total_page"] = ceil($num_row/$rowPerPage); 
  $pagi_data["active_page"] = intval($page);
  $pagi_data["start_page"]  = $start; 


  // แบ่งหน้า    

  if($_GET[orderby]==1){  // ตามชนะ หรือ เวลา
      $sql_bill = "SELECT * FROM `bom_tb_football_bill_live` where 1 $c_date  and r_agent_id = '$r_agent_id' and b_accept = 2 $type $bet  $shop  $qq   $xmid $xbill  $b_out ORDER BY `bill_id` desc LIMIT {$start} , {$rowPerPage}";

  }else{
      $sql_bill = "SELECT * FROM `bom_tb_football_bill_live` where 1 $c_date  and r_agent_id = '$r_agent_id' and b_accept = 2 $type $bet  $shop  $qq   $xmid $xbill  $b_out ORDER BY b_status asc,bill_id desc LIMIT {$start} , {$rowPerPage}";
  }



  
  $re22 = sql_query($sql_bill); 
  $count = 0;
  // $array_item = array();
  while($rs=sql_fetch($re22)){
    $count ++;
    $ee=explode("+",$rs["b_code"]);
    if($rs[b_accept]==2){
      $last='style="background:#ffb7b7;"';
    }else if($rs[b_accept]==0){
      $last='style="background:#e2ffe3;"';
    }else{
      $last='';
    }
    
    ?>
      <tr <? if($_GET[view]==""){?>class="cu" <? }?> height="30"<?=$last;?>  >
          <td align="center"><?=_bu($rs["bill_id"],$rs["bill_out"]);?></td>
          <td align="center">
          
            <? 
              echo $user[$rs["m_id"]]["user"];  
            ?>
          </td>
          <td  width="35%" onClick="MM_openBrWindow('<?=$main_url;?>/inc/temp/sport_bill/bill_popup.php?id=<?=$rs[bill_id];?>','','scrollbars=yes,resizable=yes,width=350,height=400')"  style="cursor: pointer;">
            <? //foreach($ee as $cc){echo'<div class="cd">'.$cc.'</div>';}?>
              <div style="float:right;">
                IP: <?=$rs["b_ip"];?>
              </div>

              <? 
                if($_GET[view]!="")
                {
              ?> 
                  <div>
                      <div style="clear:both"></div> <hr>
                      <?php 
                          $sql="select * from bom_tb_football_bill_play_live  where bill_id='$rs[bill_id]'   group by play_id order by play_id asc";
                          $re2=sql_query($sql);

                          $x2=1;
                          while($rs2=sql_fetch($re2)){  // while

                              $sql_ball_list = "SELECT * FROM `bom_tb_ball_list` where b_id = '".$rs2[b_id]."' ";
                              $reb = sql_array_sp($sql_ball_list);
    
                              $k3=_type_ball($rs2[play_type],$rs2[play_bet],$reb[b_score_full],$reb[b_score_half]);

                              $w1='';
                              $w2='';

                              if($rs2[b_big]==1 and $rs2[play_type]==1){
                                $w1='<u class="cr">ต่อ ';
                                $w2='</u>';
                              }elseif($rs2[b_big]==2 and $rs2[play_type]==2){
                                $w1='<u class="cr">ต่อ ';
                                $w2='</u>';
                              }elseif($rs2[b_big]==2 and $rs2[play_type]==1){
                                $w1='<span class="cb">รอง ';
                                $w2='</span>';
                              }elseif($rs2[b_big]==1 and $rs2[play_type]==2){
                                $w1='<span class="cb">รอง ';
                                $w2='</span>';
                              }elseif($rs2[b_big]==1 and $rs2[play_type]==11){
                                $w1='<u class="cr">ต่อ 1H ';
                                $w2='</u>';
                              }elseif($rs2[b_big]==2 and $rs2[play_type]==12){
                                $w1='<u class="cr">ต่อ 1H ';
                                $w2='</u>';
                              }elseif($rs2[b_big]==2 and $rs2[play_type]==11){
                                $w1='<span class="cb">รอง 1H ';
                                $w2='</span>';
                              }elseif($rs2[b_big]==1 and $rs2[play_type]==12){
                                $w1='<span class="cb">รอง 1H ';
                                $w2='</span>';
                              }else{
                                $w1='<span class="cb">รอง ';
                                $w2='</span>';
                              }

                              $name1 = ($reb["b_name_1_".$_SESSION["AGlang"]] != "") ? $reb["b_name_1_".$_SESSION["AGlang"]] : $reb["b_name_1_en"];
                              $name2 = ($reb["b_name_2_".$_SESSION["AGlang"]] != "") ? $reb["b_name_2_".$_SESSION["AGlang"]]  : $reb["b_name_2_en"];

                              if($rs2[b_big]==1){ 
                                $tbet="<u class='cr'>$name1</u> -vs- $name2<br>";
                              }else{
                                $tbet="$name1 -vs- <u  class='cr'>$name2</u><br>";
                              }



                              if($rs2[play_type]==1){$tn="$w1$name1$w2";}
                              elseif($rs2[play_type]==2){$tn="$w1$name2$w2";} 
                              elseif($rs2[play_type]==3){$tn="<b>[ สูง ] </b> $name1";}
                              elseif($rs2[play_type]==4){$tn="<b>[ ต่ำ ] </b>  $name1";} 
                              elseif($rs2[play_type]==5){$tn="<b>[ เจ้าบ้านชนะ ] </b>  $name1";} 
                              elseif($rs2[play_type]==6){$tn="<b>[ เสมอ ] </b>  $name1";} 
                              elseif($rs2[play_type]==7){$tn="<b>[ เยือนชนะ ] </b>  $name2";} 
                              elseif($rs2[play_type]==8){$tn="<b>[ คี่ ] </b>  $name1";} 
                              elseif($rs2[play_type]==9){$tn="<b>[ คู่ ] </b>  $name1";} 
                              elseif($rs2[play_type]==11){$tn="$w1$name1$w2";}
                              elseif($rs2[play_type]==12){$tn="$w1$name2$w2";} 
                              elseif($rs2[play_type]==13){$tn="<b>[ สูง 1H ] </b> $name1";}
                              elseif($rs2[play_type]==14){$tn="<b>[ ต่ำ1H ] </b>  $name1";} 
                              elseif($rs2[play_type]==15){$tn="<b>[ เจ้าบ้านชนะ 1H ] </b>  $name1";} 
                              elseif($rs2[play_type]==16){$tn="<b>[ เสมอ 1H ] </b>  $name1";} 
                              elseif($rs2[play_type]==17){$tn="<b>[ เยือนชนะ 1H ] </b>  $name2";} 
                              elseif($rs2[play_type]==18){$tn="<b>[ คี่ 1H ] </b>  $name1";} 
                              elseif($rs2[play_type]==19){$tn="<b>[ คู่ 1H ] </b>  $name1";}

                              if($rs2[play_type]>10){
                                $hf='<img src="assets/img/p1.png" />';
                              }else{
                                $hf='<img src="assets/img/p2.png" />';  
                              }

                              if($rs2[b_time_play]>0){ 
                                $live="<br>ADD=$rs2[b_add]<b class='cr'>!Live</b>[".$rs2[b_score_live]."]  <img src='assets/img/time.png'/>$rs2[b_time_play] ";
                              }else{
                                $live="";
                              }

                              $txt="$tbet   <b>[ $rs2[play_code] ]</b> $hf $tn $live<br><b>"._cg2($rs2[play_bet], $rs2[play_type])." </b>";

                              if($reb[b_score_full]==""){
                                $reb[b_score_half]='?-?';
                                $reb[b_score_full]='?-?';
                              }

                              if($rs2[b_accept]==2){
                                  $last2='style="background:#ffb7b7;"';
                              }else if($rs2[b_accept]==1){
                                  $last2='style="background:#ffffff;"'; 
                              }else if($rs2[b_accept]==0){
                                  $last2='style="background:#e2ffe3;"';
                              }else{
                                  $last2='';
                              } 
                              
                              ?>
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="bill_data table-bordered table-hover" >
                                  <tr <?=$last2;?> class="cb" >
                                      <td width="12%" align="center" class="sb2"><?=$x2;?></td>
                                      <td width="69%" class="sb2" style="padding:5px;">  <?=$txt;?>.
                                        <? if($rs2[play_pay]>=0.000){echo'<b class="cb">';}else{echo'<b class="cr">';}?>
                                           @<?=number_format($rs2[play_pay]+$rs2[play_nam],2);?></b> 
                                           เตะ <b class="cbu">[ <?=date("d-m-Y , H:i",$reb[b_date_play]);?> ]
                                          <?php if($reb["b_live_showtime"]>0){?>  
                                              <br> 
                                              <span style="background-color:#FEFF9D">
                                                <b><?=$reb["b_live_showtime"];?>'&nbsp;&nbsp;FT <?=str_replace('-',':',$reb["b_t_score_full"]);?></b><br/>
                                              </span>
                                          <?php }?>
                                      </td>
                                      
                                      <td width="19%" align="center" class="sb2"><?=$ball_type2[$rs2[play_status]];?>
                                              <br><b class="cr">FT [ <?=$reb[b_score_full];?> ]</b>
                                              <br><b class="cr">1H [ <?=$reb[b_score_half];?> ]</b>
                                      </td>

                                  </tr>
                                <? $x2++;?>
                                </table>  
  
                              <? 
    
                          } // end while
                       ?>
                  </div>
              <?}?> 
          </td>
          <td align="center"><?=number_format($rs[b_total]);?></td>

          <td align="center"><?=date("H:i",$rs[b_timestam]);?>
              <? if($rs[b_map_lat]!=""){?>
                  <img src="assets/img/world.png" width="30" height="24"  style="float:right;" onclick="_o('https://www.google.co.th/?gws_rd=ssl#q=<?=$rs[b_map_lat];?>%2C<?=$rs[b_map_lon];?>');"/>
             <? }?>
          </td>
          <td align="center">
            <?php 
        
                if($rs[b_accept]==1){
                  echo $f_status[$rs[b_status]]; 
                }else if($rs[b_accept]==0){
                  ?>
                     
                    <?=$f_accept[$rs[b_accept]];?>
                    <span onclick="bill_action('?p=<?=$_GET[p];?>&type=<?=$_GET[type];?>&bill=<?=$_GET[bill];?>&b=<?=$_GET[b];?>&mid=<?=$_GET[mid];?>&pg=<?=$_GET[pg];?>&d=<?=$_GET[d];?>&view=<?=$_GET[view];?>&q=<?=$_GET[q];?>&orderby=<?=$_GET[orderby];?>&amp;ac=accept&amp;act=1&amp;id=<?=$rs[bill_id];?>&amp;mid=<?=$rs[m_id];?>&perpapge=<?=$_GET[perpapge];?>','ยืนยันยกเลิกรับตั๋ว')">
                      <img src="assets/img/1.png" />
                    </span>
                                
                  <?
                }else{
                  echo $f_accept[$rs[b_accept]]; 
                }
            ?>

            <!-- 99 -->
          </td>

          <td align="center">

            &nbsp;
            <?  if($rs[br_bonus_1]>0 )
                {
                  echo number_format($rs[br_bonus_1]);
                  if($rs[b_admin]==0)
                  {
                    ?>
                    
                    <span onclick="bill_action('?p=<?=$_GET[p];?>&d=<?=$_GET[d];?>&type=<?=$_GET[type];?>&bill=<?=$_GET[bill];?>&b=<?=$_GET[b];?>&pg=<?=$_GET[pg];?>&view=<?=$_GET[view];?>&shop=<?=$_GET[shop];?>&mid=<?=$_GET[mid];?>&orderby=<?=$_GET[orderby];?>&amp;ac=pay&amp;id=<?=$rs[bill_id];?>&amp;ss=<?=$rs[b_admin];?>&perpapge=<?=$_GET[perpapge];?>','ยืนยันการจ่ายเงิน')">
                      <img src="assets/img/<?=$rs[b_admin];?>.png" alt="จ่ายเงิน" />
                    </span>
  
           <?     }else{
                    ?>
                      <img src="assets/img/<?=$rs[b_admin];?>.png" alt="จ่ายเงิน" />
                    <?
                 }
               }
            ?>
          </td>

          <td align="center">

             <?  if($rs[b_status]==5 and $rs[b_accept]==1 and $is_delete_bin != false){?>
  

              <span onclick="bill_action('?p=<?=$_GET[p];?>&d=<?=$_GET[d];?>&b=<?=$_GET[b];?>&type=<?=$_GET[type];?>&bill=<?=$_GET[bill];?>&pg=<?=$_GET[pg];?>&view=<?=$_GET[view];?>&mid=<?=$_GET[mid];?>&shop=<?=$_GET[shop];?>&orderby=<?=$_GET[orderby];?>&pg=<?=$_GET[pg];?>&q=<?=$_GET[q];?>&amp;ac=del&amp;id=<?=$rs[bill_id];?>&amp;cc=<?=$rs[b_total];?>&amp;xmid=<?=$rs[m_id];?>&perpapge=<?=$_GET[perpapge];?>','ยืนยันการยกเลิก')">
                <img src="assets/img/false.png" />
              </span>


            <? }?>

    
            <?  if($rs[b_accept]==3){?>

              <?/*
              <a href="?p=<?=$_GET[p];?>&d=<?=$_GET[d];?>&b=<?=$_GET[b];?>&type=<?=$_GET[type];?>&bill=<?=$_GET[bill];?>&pg=<?=$_GET[pg];?>&view=<?=$_GET[view];?>&mid=<?=$_GET[mid];?>&shop=<?=$_GET[shop];?>&orderby=<?=$_GET[orderby];?>&pg=<?=$_GET[pg];?>&q=<?=$_GET[q];?>&amp;ac=ac_last&amp;id=<?=$rs[bill_id];?>&amp;cc=<?=$rs[b_total];?>&amp;xmid=<?=$rs[m_id];?>"  onclick="return confirm('ยืนยันรับตั๋ว');">
                  <img src="assets/img/button100.png" />
              </a>

            <span onclick="bill_action('?p=<?=$_GET[p];?>&d=<?=$_GET[d];?>&b=<?=$_GET[b];?>&type=<?=$_GET[type];?>&bill=<?=$_GET[bill];?>&pg=<?=$_GET[pg];?>&view=<?=$_GET[view];?>&mid=<?=$_GET[mid];?>&shop=<?=$_GET[shop];?>&orderby=<?=$_GET[orderby];?>&pg=<?=$_GET[pg];?>&q=<?=$_GET[q];?>&amp;ac=ac_last&amp;id=<?=$rs[bill_id];?>&amp;cc=<?=$rs[b_total];?>&amp;xmid=<?=$rs[m_id];?>&perpapge=<?=$_GET[perpapge];?>','ยืนยันรับตั๋ว')">
                <img src="assets/img/button100.png" />
            </span> */?>

              &nbsp;&nbsp;
            <?/*
            <a href="?p=<?=$_GET[p];?>&d=<?=$_GET[d];?>&b=<?=$_GET[b];?>&type=<?=$_GET[type];?>&bill=<?=$_GET[bill];?>&pg=<?=$_GET[pg];?>&view=<?=$_GET[view];?>&mid=<?=$_GET[mid];?>&shop=<?=$_GET[shop];?>&orderby=<?=$_GET[orderby];?>&pg=<?=$_GET[pg];?>&q=<?=$_GET[q];?>&amp;ac=not&amp;id=<?=$rs[bill_id];?>&amp;cc=<?=$rs[b_total];?>&amp;xmid=<?=$rs[m_id];?>"  onclick="return confirm('ยืนยันการยกเลิก');">
                <img src="assets/img/cancel.png" />
            </a>

            <span onclick="bill_action('?p=<?=$_GET[p];?>&d=<?=$_GET[d];?>&b=<?=$_GET[b];?>&type=<?=$_GET[type];?>&bill=<?=$_GET[bill];?>&pg=<?=$_GET[pg];?>&view=<?=$_GET[view];?>&mid=<?=$_GET[mid];?>&shop=<?=$_GET[shop];?>&orderby=<?=$_GET[orderby];?>&pg=<?=$_GET[pg];?>&q=<?=$_GET[q];?>&amp;ac=not&amp;id=<?=$rs[bill_id];?>&amp;cc=<?=$rs[b_total];?>&amp;xmid=<?=$rs[m_id];?>&perpapge=<?=$_GET[perpapge];?>','ยืนยันการยกเลิก')">
                <img src="assets/img/cancel.png" />
            </span> */?>
          <? }?>
          </td>
      </tr>
    <?
    

  }

  if($count == 0)
    {
      ?>
      <tr>
       <td colspan="100%" class="text-danger" style="text-align: center;">ไม่พบข้อมูล</td>
      </tr>
      <?
    }
 ?>



  <script type="text/javascript">   
     var pagi_data = <?=json_encode($pagi_data);?>;  // ส่ง js array กลับไปยังไฟล์ทีเ่รียก

    // console.log(pagi_data)
    console.log('9999')
  </script>





