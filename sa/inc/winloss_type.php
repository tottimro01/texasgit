
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         ชนะแพ้ตามสมาชิก 
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="#"><i class="fa fa-retweet"></i> ชนะแพ้</a></li>
        <li class="active"> ชนะแพ้ตามสมาชิก </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          

          <div class="box">
            <div class="box-header">
              <form action="" method="GET" id="main_form">
                <div class="row">
                     <div class="col-md-12">
                        <input type="hidden" name="p" value="<?=$_GET[p];?>">
                        <input type="hidden" name="g_p" value="<?=$_GET[g_p];?>">
                        <input type="hidden" name="level" value="<?=$_GET[level];?>">
                        <input type="hidden" name="id" value="<?=$_GET[id];?>">
                        <input type="hidden" name="h" value="<?=$_GET[h];?>">


                          <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                               <label>จากวันที่:</label>
                               <div class="input-group date">
                                 <div class="input-group-addon">
                                   <i class="fa fa-calendar"></i>
                                 </div>
                                 <input type="text" class="form-control pull-right datepicker" name="d"  value="<?=$_GET["d"];?>" autocomplete="off">
                               </div>
                             </div>
                          </div>

                          <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                               <label>ถึง:</label>
                               <div class="input-group date">
                                 <div class="input-group-addon">
                                   <i class="fa fa-calendar"></i>
                                 </div>
                                 <input type="text" class="form-control pull-right datepicker" name="e"  value="<?=$_GET["e"];?>" autocomplete="off">
                               </div>
                             </div>
                          </div>
                      </div> 
                      <div class="col-md-12">
                        <div class="col-md-12">

                          <?php 
                             foreach ($lang_g["bet_type"] as $key => $value) {
                               ?>
                                  <div class="checkbox inline mr-1">
                                    <label>
                                      <?php  $chk = ($_GET["cb_".$key] == 1) ? "checked" : ""; ?>
                                      <input type="checkbox" id="cb_<?=$key;?>" name="cb_<?=$key;?>" value="1" <?=$chk;?>> <?=$value;?>
                                    </label>
                                  </div>
                               <?
                             }

                          ?>

                        <hr style="border-top: 1px solid #d3d3d3;">
                        </div>

                        <div class="col-md-8 mb-1">

                          <?php 

                            foreach ($currency_list as $key => $value) {
                                $chk = ($_GET["chk_currency_".$key] == 1) ? "checked" : "";
                              ?>
                                  <div class="checkbox inline mr-1">
                                    <label>
                                      <input type="checkbox" id="chk_currency_<?=$key;?>" name="chk_currency_<?=$key;?>" value="1" <?=$chk;?> > <?=$value;?> [<?=$key;?>] 
                                    </label>
                                  </div>
                              <?
                            }

                           ?>
                        </div> 

                        <div class="col-sm-12 col-md-2">
                            <button type="submit" class="btn btn-default btn-block" style="margin-bottom: 10px;">ค้นหา</button>
                        </div>

                       
                        <div class="col-sm-12 col-md-2">
                            <button type="button" class="btn btn-block btn-primary pull-left" style="width: 100%;" onclick="javascript:history.go(-1)">
                              <i class="fa fa-chevron-left" style="font-size: 14px; margin-right: 10px;"></i> ย้อนกลับ
                            </button>
                         </div>     
                       
                        
                      </div>
                </div>

              </form>


            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">

                <div id="panal" style="margin-bottom: 15px;"> 

      <?php 
          $first_link = "";
          foreach ($_GET as $key => $value) {              
            if($key != "p" && $key != "g_p" && $key != "id" && $key != "level" && $key != "h")
            {
                $first_link.=$key."=".$value."&";
            }               
          }
       ?>

       <span class="panal_list ">
          <a href="?p=winloss&g_p=winlos&<?=$first_link;?>">
            <i class="fa fa-user-secret"></i> เอเย่นต์
          </a>
       </span>


      <?php 
           $h = $_GET['h'];
           $ex_h_1 = explode("|", $h);
           $h_echo = "";

           $count_ex_h_1 = count($ex_h_1);

           $c = 0;
           foreach ($ex_h_1 as $key => $value) {

              if ($value ==  $_GET["b"]) {
                 $h_echo .= $value;
                ?>
                <a href="#">
                  <span class="panal_list arrowed-in">
                     <?=$bet_type[$value];?>
                  </span>
                 </a>    
                <?
                
              }else{

                $h_echo .= $value."|";


                $ex_h_2 = explode("^", $value);
                
                if($ex_h_2[3] == "A")
                {
                  $icon = "<i class=\"fa fa-user-secret\"></i>";
                  $path = "?p=winloss&g_p=winloss";
                }else{
                  $icon = "<i class=\"fa fa-user\"></i>";
                  $path = "?p=winloss_type&g_p=winloss";
                }

                $_link = "";
                foreach ($_GET as $key => $value) {              
                    if($key != "p" && $key != "g_p" && $key != "id" && $key != "level" && $key != "h")
                    {
                        $_link.=$key."=".$value."&";
                    }               
                }

                ?>
                <a href="<?=$path;?>&level=<?=$ex_h_2[0];?>&id=<?=$ex_h_2[2];?>&b=<?=$_GET['b'];?>&h=<?=substr($h_echo, 0, -1);?>&<?=$_link;?>">
                  <span class="panal_list <?=($c != 0) ? "arrowed-in" : ""; ?>">
                     <?=$icon;?> <?=$ex_h_2[1];?>
                  </span>
                </a>  
                <?
                $c++;
              }

           } 

       ?>
      
      </div> 

 
              <table class="table table-bordered table-hover">
                 <thead>
                   <tr>
                     <th class="vaign_m" rowspan="2" width="10%">ชื่อผู้ใช้</th>
                     <th class="vaign_m" rowspan="2" width="10%">ยอดเล่น</th>
                     <th class="vaign_m" colspan="3" width="30%">สมาชิก</th>
                     <th class="vaign_m" colspan="3" width="30%">เอเย่น</th>
                     <th class="vaign_m" rowspan="2" width="30%">เว็บไซต์</th>
                   </tr>

                   <tr>
                     <th class="vaign_m">ได้-เสีย</th>
                     <th class="vaign_m">ส่วนลด</th>
                     <th class="vaign_m">รวม</th>
                     <th class="vaign_m">ได้-เสีย</th>
                     <th class="vaign_m">ส่วนลด</th>
                     <th class="vaign_m" style="border-right-width:1px;">รวม</th>
                   </tr>
                 </thead>
                 <tbody>

                 <?php 
                   $e= $_GET["d"];  // วันที่เริ่มต้น
                   $d= $_GET["e"];  // วันที่สิ้นสุด
                   #####################DATE
                  $sdd=@explode("-",$e); 
                  $edate=$sdd[2].'-'.$sdd[1].'-'.$sdd[0]; 
                  
                  $edd=@explode("-",$d); 
                  $ddate=$edd[2].'-'.$edd[1].'-'.$edd[0]; 


                   // ดึง member
                   $sql= "select * from bom_tb_member where m_level=".$_GET[level]."  and m_id='".$_GET[id]."'";
                   $rs_m=sql_array($sql);

                   $r_level=$rs_m['m_level'];
                   $ag_level=$rs_m['m_level']-1;

                  include("winloss/inc_ag_share.php");
                     foreach ($bet_type as $key => $_value) {
                       // include "winloss/winloss_byType_".$key.".php";   
                            $value = $key;
                            ######################
                            include("winloss/inc_m5.php");

                            ######################
                            // $data['data'][$key] =array($value, "$sum1","$sum2","$sum3","$sum4","$sum5","$sum6","$sum7","$sum8","$sum9","$sum10");


                             ?>

                                  <tr>
                                     <?php 
                                         $_link = "?";
                                         foreach ($_GET as $key1 => $value1) {

                                           if($key1 == "p")
                                           {
                                             $value1 = "winloss_user";
                                           }else if($key1 == "h")
                                           {
                                              $h = $_GET['h'].'|'.$key;
                                              // $h = substr($h, 1);
                                              $value1 = $h;
                                           }

                                           $_link.=$key1."=".$value1."&";
                                         
                                         }

                                         $_link .= "b=".$key;

                                      ?>
                                         <td>
                                           <a href="<?=$_link;?>">
                                                <?=$_value;?>   
                                             </a>  
                                         </td>
                                         <td class="aign_r"> <?=_cbp($sum1,2);?></td>
                                         <td class="aign_r col_a"><?=_cbp($sum3,2);?></td>
                                         <td class="aign_r col_a"><?=_cbp($sum4,2);?></td>
                                         <td class="aign_r col_a"><?=_cbp($sum5,2);?></td>
                                         <td class="aign_r col_b"><?=_cbp($sum6,2);?></td>
                                         <td class="aign_r col_b"><?=_cbp($sum7,2);?></td>
                                         <td class="aign_r col_b"><?=_cbp($sum8,2);?></td>
                                         <td class="aign_r col_c"><?=_cbp($sum10,2);?></td>
                                   </tr>



                             <? 

                             $sum_total1 += $sum1;
                             $sum_total2 += $sum2;
                             $sum_total3 += $sum3;
                             $sum_total4 += $sum4;
                             $sum_total5 += $sum5;
                             $sum_total6 += $sum6;
                             $sum_total7 += $sum7;
                             $sum_total8 += $sum8;
                             $sum_total9 += $sum9;
                             $sum_total10 += $sum10;


                     }
                 ?>

                 </tbody>
                 <tfoot>
                   <tr class="col_footer">
                       <td class="vaign_m">รวม</td>
                       <td class="aign_r"><?=_cbp($sum_total1,2);?></td>
                       <td class="aign_r"><?=_cbp($sum_total3,2);?></td>
                       <td class="aign_r"><?=_cbp($sum_total4,2);?></td>
                       <td class="aign_r"><?=_cbp($sum_total5,2);?></td>
                       <td class="aign_r"><?=_cbp($sum_total6,2);?></td>
                       <td class="aign_r"><?=_cbp($sum_total7,2);?></td>
                       <td class="aign_r"><?=_cbp($sum_total8,2);?></td>
                       <td class="aign_r"><?=_cbp($sum_total10,2);?></td>
                   </tr>
                 </tfoot>
               </table>

             <div id="pagination">
             </div>


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


 // $('#table_data').DataTable({})

  // getData();
  function getData(page = 1)
  {
      var rowPerPage = 2000;
      get_loader("show");
      var data = $( "#main_form" ).serializeArray();
      data.push(
        {name: 'thisPage', value: page},
        {name: 'rowPerPage', value: rowPerPage},
      );

      $.ajax({
        url: 'inc/winloss/get_winloss.php',
        type: 'POST',
        dataType: 'json',
        data: data,
      })
      .done(function(res) {
        $("#load_data").text("").append(res.list);
        get_loader("hide");
         // var pagi_html = loadPagination(res.pagi_data);
         // $('#pagination').text('');
         // $('#pagination').html(pagi_html);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
  }

  function clickPage(page)
  {
      getData(page);
  }



 </script>