
<style>
  .ball_c1
  {
    background: #f8dbe6;
  }
  .ball_c2
  {
    background: #cdedff;
  }
  .ball_c3
  {
    background : #dbf8e3;
  }

  .ball_c4
  {
    background : #d9d9d9;
    text-align: center;
  }

  .ball_c5
  {
    background : #c7c7c7;
    text-align: center;
  }
  
  .acenter {
    text-align: center;
  }
  .txt_none {
      width: 95%;
      outline: none;
      border: none;
      background: none;
      font-size: 12px;
      font-family: tahoma, "Microsoft Sans Serif", Vanessa;
  }

</style>

<?php 

if($_GET['sport']!=""){
  $xzone=$_GET['sport'];
}else{
  $xzone=6;
}


if($_GET['d'] =="")
{
  $_GET['d'] = $view_date;
}

 ?>
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         ผลบอล 
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="#"><i class="fa fa-soccer-ball-o"></i> ฟุตบอล</a></li>
        <li class="active"> ผลบอล </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

  

          <div class="box">
            <div class="box-header">
                <div class="row">
                     <div class="col-md-10">
                          <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                               <label>ผลบอลันที่:</label>
                               <div class="input-group date">
                                 <div class="input-group-addon">
                                   <i class="fa fa-calendar"></i>
                                 </div>
                                 <input type="text" class="form-control pull-right datepicker" name="d" id="d" value="<?=$_GET['d'];?>" autocomplete="off">
                               </div>
                             </div>
                          </div>

                          <div class="col-sm-12 col-md-3">
                                <label>กีฬา</label>
                                <select class="form-control" name="sport_zone" id="sport_zone"  onChange="window.location.href='?p=score&g_p=football&d=<?=$view_date;?>&sport='+this.value;">
                                  <?php 
                                      foreach ($arr_sp_zone as $x => $v) {
                                        ?>
                                            <option value="<?=$x;?>" <? if($xzone==$x){echo'selected="selected"';}?>><?=$v;?></option>
                                        <?
                                      }
                                   ?>
                                 </select>
                          </div>

                      </div> 
                      <div class="col-sm-12 col-md-2">
                          <div class="col-sm-12 col-md-12">
                                <button type="button" class="btn btn-default btn-block" style="margin-top: 25px;" onclick="sch_table()">ค้นหา</button>
                          </div>
                      </div>

                      <div class="col-sm-12 col-md-12">
                          <div class="col-sm-12 col-md-2">
                                <button type="button" class="btn btn-block btn-primary" style="margin-top: 25px;" onclick="_score();">ดึงผล <?=$view_date;?></button>
                          </div>
                          <div class="col-sm-12 col-md-2">
                                <button type="button" class="btn btn-block btn-primary" style="margin-top: 25px;" onclick="_pay0();">pay = 0</button>
                          </div>
                          <div class="col-sm-12 col-md-2">
                                <button type="button" class="btn btn-block btn-primary" style="margin-top: 25px;" onclick="_w('?p=score&g_p=football&d=<?=$view_date;?>&pro=1');">Process=0</button>
                          </div>
                          <div class="col-sm-12 col-md-2">
                                <button type="button" class="btn btn-block btn-primary" style="margin-top: 25px;" onclick="_payok();">Pay=OK</button>
                          </div>
                      </div>
                </div>

            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th class="vaign_m">เวลา</th>
                    <th class="vaign_m"> </th>
                    <th class="vaign_m">ครึ่งแรก  </th>
                    <th class="vaign_m">เต็มเวลา</th>
                    <th class="vaign_m">สถานะ</th>
                  </tr>
                </thead>
                <tbody>

                <?php 
                  
                  $sql="select * from bom_tb_ball_list where b_add=1 and b_date='".$_GET['d']."' and  b_zone='$xzone'  and b_score_half!='' group by  b_zone_en order by  b_asc asc";
                  $re=sql_query_sp($sql);
                  $c =0;
                  while($rs=sql_fetch($re)){
                    $c++;
                      ?>
                        <tr>
                          <td height="20" colspan="100%" class="txt_back11b ball_c5" bgcolor="#FFFFFF" style="padding-left:80px;">
                            <strong><?=$rs["b_zone_th"];?></strong>
                          </td>
                        </tr>  
                      <?
                      $sql="select * from bom_tb_ball_list where b_add=1 and b_date='".$_GET['d']."' and  b_zone='$xzone'   and   md5(b_zone_en)='".md5($rs['b_zone_en'])."' and b_score_half!=''  order by  b_date_play asc";

                      $re2=sql_query_sp($sql);
                      while($rs2=sql_fetch($re2)){
                        ?>
                              <tr>
                                <td class="aign_c  ball_c4">
                                  <?=date("d/m/Y H:i",$rs2["b_date_play"]);?>
                                    <br>
                                    <?=$rs2["b_id"];?>
                                        <br>
                                    Date=<?=$rs2["b_date_play"];?>

                                  </td>
                                <td class="aign_l ball_c3">
                                      <?php 

                                          $team1 = ($rs2["b_name_1_th"] != "") ? $rs2["b_name_1_th"] : $rs2["b_name_1_en"]; 
                                          $team2 = ($rs2["b_name_2_th"] != "") ? $rs2["b_name_2_th"] : $rs2["b_name_2_en"]; 

                                          echo $team1." -vs- ".$team2;
                                       ?>
                                </td>
                                <td class="aign_c ball_c1">
                                  
                                    <input type="text" class="txt_none acenter" onclick="c_score=1;" onkeypress="return set_score(event,this,1,<?=$rs2["b_id"];?>)" id="s1h_<?=$rs2["b_id"];?>" value="<?=$rs2["b_score_half"];?>">
                                  </td>
                                <td class="aign_c ball_c2">

                                  <input type="text" class="txt_none acenter" onclick="c_score=1;" onkeypress="return set_score(event,this,2,<?=$rs2["b_id"];?>)" id="sft_<?=$rs2["b_id"];?>" value="<?=$rs2["b_score_full"];?>">
                                  
                                    
                                  </td>
                                <td class="aign_c ball_c3">
                                  
                                    <? 
                                    if($rs2['b_score_full']=="can" or $rs2['b_process']==2){
                                      echo'<span class="cr">ยกเลิก</span>';
                                    }else if($rs2['b_score_full']!=""){
                                      echo'<span class="cg">จบ</span>';
                                    }?>


                                </td>
                              </tr>
                        <?
                      }

                  }

                  if($c == 0)
                  {
                    ?>
                        <tr>
                          <td height="20" colspan="100%" class="txt_back11b" bgcolor="#FFFFFF" style="text-align: center;">
                            <strong>ไม่มีข้อมูล</strong>
                          </td>
                        </tr>  
                    <?
                  }
                ?>
                 
              </tbody>
             
            </table>
            </div>
            <!-- /.box-body -->
          </div>
		



 </section>
 <!-- /.content -->

 <script>
   //Date picker
 $( ".datepicker" ).datepicker({
    autoclose: true,
    format: 'dd-mm-yyyy',
 });



function set_score(event,e,type,id)
{
  <?php 
    // type 1 = ครึ่งเวลา , 2 = เต็มเวลา
   ?>
    event = event || window.event;
    if (event.keyCode == 13)
    {
      var r = confirm("ต้องการแก้ไขผลบอลหรือไม่!");
      if(r == true)
      {
        $.ajax({
          url: 'inc/set_score.php',
          type: 'post',
          dataType: 'json',
          data: {
                  type: type,
                  id: id,
                  val: $(e).val(),
                },
        })
        .done(function() {
          console.log("success");

        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
        
         $(e).blur(); 
      }


        return false;
    }
    return true;
}

 function sch_table()
 {
    let d = $("#d").val();
    let sport = $("#sport_zone").val();
    window.location.href="?p=score&g_p=football&d="+d+"&sport="+sport;
 }


 function _score(){
    $(this).load("inc/get_score.php?d=<?=$_GET[d];?>" , function(){
      location.reload();
    });
 }

function _process(){
  // $(".loader").show();
  // $("#b_process").hide();
  $(this).load("inc/get_process.php?d=<?=$_GET[d];?>" , function(){
    location.reload();
    //$(".loader").hide();
  });
}
  
  
function _pay0(){
  // $(".loader").show();
  // $("#b_process").hide();
  $(this).load("inc/get_pay0.php?d=<?=$_GET[d];?>" , function(){
    location.reload();
    //$(".loader").hide();
  });
}
  
  
function _payok(){
  // $(".loader").show();
  // $("#b_process").hide();
  $(this).load("inc/get_process_pay.php?d=<?=$_GET[d];?>" , function(){
    location.reload();
    //$(".loader").hide();
  });
}

 </script>