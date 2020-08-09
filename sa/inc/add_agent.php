<style>
  
.nav-tabs-custom>.nav-tabs>li.active>a, .nav-tabs-custom>.nav-tabs>li.active:hover>a {
    background-color: #fcfcfc;
    color: #444;
}

.nav-tabs-custom>.tab-content
{
  background-color: #fcfcfc;
}

.tab-pane .col-lg-1, .tab-pane .col-lg-10, .tab-pane .col-lg-11, .tab-pane .col-lg-12, .tab-pane .col-lg-2, .tab-pane .col-lg-3, .tab-pane .col-lg-4, .tab-pane .col-lg-5, .tab-pane .col-lg-6, .tab-pane .col-lg-7, .tab-pane .col-lg-8, .tab-pane .col-lg-9, .tab-pane .col-md-1, .tab-pane .col-md-10, .tab-pane .col-md-11, .tab-pane .col-md-12, .tab-pane .col-md-2, .tab-pane .col-md-3, .tab-pane .col-md-4, .tab-pane .col-md-5, .tab-pane .col-md-6, .tab-pane .col-md-7, .tab-pane .col-md-8, .tab-pane .col-md-9, .tab-pane .col-sm-1, .tab-pane .col-sm-10, .tab-pane .col-sm-11, .tab-pane .col-sm-12, .tab-pane .col-sm-2, .tab-pane .col-sm-3, .tab-pane .col-sm-4, .tab-pane .col-sm-5, .tab-pane .col-sm-6, .tab-pane .col-sm-7, .tab-pane .col-sm-8, .tab-pane .col-sm-9, .tab-pane .col-xs-1, .tab-pane .col-xs-10, .tab-pane .col-xs-11, .tab-pane .col-xs-12, .tab-pane .col-xs-2, .tab-pane .col-xs-3, .tab-pane .col-xs-4, .tab-pane .col-xs-5, .tab-pane .col-xs-6, .tab-pane .col-xs-7, .tab-pane .col-xs-8, .tab-pane .col-xs-9
{
  margin-bottom: 15px;
}


.with-border.custom
{
    border-bottom: 1px solid #cdcdcd;
}

</style>


 <!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    สร้างตัวแทน
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
    <li class="active">สร้างตัวแทน</li>
  </ol>
</section>

 <!-- Main content -->
<section class="content">


  

    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">ข้อมูลตัวแทน</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="" method="post" id="createAgent_form" onsubmit="cf('คุณต้องการเพิ่มข้อมูลนี้หรือไม่');  return false; ">
          <div class="box-body">
              
            <div class="col-sm-6 col-md-4">
               <div class="form-group">
                  <label for="username">ชื่อผู้ใช้</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="ชื่อผู้ใช้">
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="form-group">
                  <label for="username">รหัสผ่าน</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="รหัสผ่าน">
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
               <div class="form-group">
                  <label for="username">ชื่อ</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อ">
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
               <div class="form-group">
                  <label for="username">เบอร์โทร</label>
                  <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="เบอร์โทร">
                </div>
            </div>

            <div class="col-md-4">
               <div class="form-group">
                  <label for="username">เครดิต</label>
                  <input type="tel" class="form-control numeric input-num2digt" id="credit" value="0.00" name="credit" placeholder="เครดิต">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="username">สกุลเงิน</label>
                    <select class="form-control" id="tcurrency" name="tcurrency">
                        <?php 
                            foreach ($currency_list as $key => $value) {
                              ?>
                                <option value="<?=$key;?>"> <?=$key;?> - <?=$value;?> </option>
                              <?
                            }
                         ?>
                    </select>
                </div>
            </div>

             <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#soccer" data-toggle="tab">ฟุตบอล</a></li>
              <li><a href="#sport" data-toggle="tab">กีฬา</a></li>
              <li><a href="#boxing" data-toggle="tab">มวยไทย</a></li>
              <li><a href="#step" data-toggle="tab">สเต็ป</a></li>
              <li><a href="#lotto" data-toggle="tab">หวย</a></li>
              <li><a href="#lotto_set" data-toggle="tab">หวยหุ้น</a></li>
              <li><a href="#lotto_lao" data-toggle="tab">หวยชุด</a></li>
              <li><a href="#game" data-toggle="tab">เกมส์</a></li>
              <li><a href="#casino" data-toggle="tab">คาสิโน</a></li>
            </ul>
            <div class="tab-content">
            <!-- .tab-pane --> 
              <div class="active tab-pane" id="soccer">
                <div class="row"> <!-- row -->
                  <div class="col-sm-12">
                      <div class="checkbox inline">
                           <label>
                             <input type="checkbox" id="soccer_today_active" name="soccer_today_active" checked=""> บอลก่อนแข่ง
                           </label>
                      </div>
                       <div class="checkbox inline">
                          <label>
                            <input type="checkbox" id="soccer_live_active" name="soccer_live_active" checked=""> บอลกำลังแข่ง 
                          </label>
                      </div>

                      <!-- <div class="form-inline pull-right"><button type="button" class="btn btn-block btn-primary btn-custom-c" onclick="setMax('soccer');"> ค่าสูงสุด</button></div> -->
                  </div> 
                  <div class="col-md-4 col-sm-12"> <!-- col -->
                        <div class="row">
                            <div class="form-group col-sm-7">
                              <label for="today_share">หุ้นฟุตบอลวันนี้ </label>
                              <div class="input-group">
                                  <select class="form-control" id="today_share" name="today_share" onchange="setKeep('today_share');">
                                    <?php
                                        for($i=0;$i<=100;$i++)
                                        {
                                          ?>
                                            <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
                                          <?php
                                        }
    
                                     ?>
                                  </select>
                                  <span class="input-group-addon">%</span>
                              </div>
                            </div>
    
                            <div class="form-group col-sm-5">
                              <label for="k_today_share">ยอดเก็บ</label>
                              <div class="input-group">
                                  <select class="form-control" id="k_today_share" data-json="100" name="k_today_share" disabled >
                                    <?php
    
                                        for($i=0;$i<=100;$i++)
                                        {
                                           $slt = ($i == 100) ? "selected" : ""; 
                                          ?>
                                            <option value="<?php echo $i; ?>" <?php echo $slt;?> > <?php echo $i; ?></option>
                                          <?php
                                        }
    
                                     ?>
                                  </select>
                                  <span class="input-group-addon">%</span>
                              </div>
                            </div>
    
                            <div class="form-group col-sm-7">
                              <label for="live_share">หุ้นฟุตบอลกำลังแข่ง </label>
                              <div class="input-group">
                                  <select class="form-control" id="live_share" name="live_share" onchange="setKeep('live_share');">
                                    <?php
                                        for($i=0;$i<=100;$i++)
                                        {
                                          ?>
                                            <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
                                          <?php
                                        }
    
                                     ?>
                                  </select>
                                  <span class="input-group-addon">%</span>
                              </div>
                            </div>
    
                            <div class="form-group col-sm-5">
                              <label for="k_live_share">ยอดเก็บ</label>
                              <div class="input-group">
                                  <select class="form-control" id="k_live_share" data-json="100" name="k_live_share" disabled >
                                    <?php
    
                                        for($i=0;$i<=100;$i++)
                                        {
                                           $slt = ($i == 100) ? "selected" : ""; 
                                          ?>
                                            <option value="<?php echo $i; ?>" <?php echo $slt;?> > <?php echo $i; ?></option>
                                          <?php
                                        }
    
                                     ?>
                                  </select>
                                  <span class="input-group-addon">%</span>
                              </div>
                            </div>

                            <div class="form-group col-sm-12">
                              <label for="today_com">ค่าคอม </label>
                              <div class="input-group">
                                  <select class="form-control" id="today_com" name="today_com">

                                    <? 
                                      for($x=0;$x<=400;$x++)
                                      {
                                          $num=number_format($x*0.05,2);
                                          $rnum=number_format(2,2);
                                          if($rnum>=$num)
                                          {
                                              ?>
                                                  <option value="<?=$num;?>"><?=$num;?></option>
                                              <?
                                          }
                                      }
                                    ?>

                                  </select>
                                  <span class="input-group-addon">%</span>
                              </div>
                            </div>

                            <div class="form-group col-sm-8">
                                    <label for="torup">ยอดเก็บ ค่าน้ำ </label>
                                     <select class="form-control" id="r_nam" name="r_nam" onchange="setKeep('r_nam');" >
                                       <?php
                                           for($i=0;$i<=8;$i++)
                                           {
                                             ?>
                                               <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
                                             <?php
                                           }
    
                                        ?>
                                     </select>
                            </div>

                            <div class="form-group col-sm-4">
                                    <label for="torup"> ค่าน้ำ </label>
                                     <select class="form-control" id="k_r_nam" data-json="8" name="k_r_nam" disabled="" >
                                       <?php
                                           for($i=0;$i<=8;$i++)
                                           {  
                                              $slt = ($i == 8) ? "selected" : "";

                                             ?>
                                               <option value="<?php echo $i; ?>" <?=$slt;?> > <?php echo $i; ?></option>
                                             <?php
                                           }
    
                                        ?>
                                     </select>
                            </div>


                            <!-- <div class="form-group col-sm-12 col-md-6">
                                    <label for="torup">เพิ่มราคาทีมต่อ </label>
                                     <select class="form-control" id="torup" name="torup">
                                       <?php
                                           for($i=0;$i<=8;$i++)
                                           {
                                             ?>
                                               <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
                                             <?php
                                           }
    
                                        ?>
                                     </select>
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                    <label for="logup">เพิ่มราคาทีมรอง </label>
                                    <select class="form-control" id="logup" name="logup">
                                      <?php
                                          for($i=0;$i<=8;$i++)
                                          {
                                            ?>
                                              <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
                                            <?php
                                          }
    
                                       ?>
                                    </select>
                            </div> -->
                        </div> <!-- /row -->
                  </div> <!-- /col -->

                  <div class="col-md-4 col-sm-12"> <!-- col -->

                    <div class="form-group col-sm-12">
                      <label for="live_betmoneymax_pair">45 นาทีสูงสุด/คู่</label>
                          <input type="text"  value="<?=number_format($value_default);?>" class="form-control" id="live_betmoneymax_pair" name="live_betmoneymax_pair" placeholder="" onblur="chkMinMax(this,<?=$min_betmin_money;?>,<?=$max_betmax_money;?>);">
                          <span class="text-danger label-sm span_block" id="k_live_betmoneymax_pair" data-json="<?=$min_betmin_money;?>">( มากกว่าหรือเท่ากับ <?=number_format($min_betmin_money);?>) </span>
                    </div>

                    <div class="form-group col-sm-12">
                          <label for="live_betmax_money">45 นาทีสูงสุด/ไม้</label>
                              <input type="text" value="<?=number_format($value_default);?>" class="form-control" id="live_betmax_money" name="live_betmax_money" placeholder="" onblur="chkMinMax(this,<?=$min_betmin_money;?>,<?=$max_betmax_money;?>);">
                              <span class="text-danger label-sm span_block" id="k_live_betmax_money" data-json="<?=$min_betmin_money;?>">( มากกว่าหรือเท่ากับ <?=number_format($min_betmin_money);?>) </span>
                  </div>

                   <div class="form-group col-sm-12">
                     <label for="live_betmin_money">45 นาทีต่ำสุด/ไม้</label>
                         <input type="text" value="<?=number_format($min_betmin_money);?>" class="form-control" id="live_betmin_money" name="live_betmin_money" placeholder="" onblur="chkMinMax(this,<?=$min_betmin_money;?>,<?=$max_betmin_money;?>)">
                         <span class="text-danger label-sm span_block" id="k_live_betmin_money" data-json="<?=$min_betmin_money;?>">
                           ( <?=number_format($min_betmin_money);?> - <?=number_format($max_betmin_money);?> ) 
                         </span>
                   </div>

                    

                        
                  </div> <!-- /col -->

                  <div class="col-md-4 col-sm-12"> <!-- col -->

                       <div class="form-group col-sm-12">
                          <label for="live_betmoneymax_pair">90 นาทีสูงสุด/คู่</label>
                              <input type="text"  value="<?=number_format($value_default);?>" class="form-control" id="live_fbetmoneymax_pair" name="live_fbetmoneymax_pair" placeholder="" onblur="chkMinMax(this,<?=$min_betmin_money;?>,<?=$max_betmax_money;?>);">
                              <span class="text-danger label-sm span_block" id="k_live_fbetmoneymax_pair" data-json="<?=$min_betmin_money;?>">( มากกว่าหรือเท่ากับ <?=number_format($min_betmin_money);?>) </span>
                        </div> 

                        <div class="form-group col-sm-12">
                          <label for="live_fbetmax_money">90 นาทีสูงสุด/ไม้</label>
                              <input type="text" value="<?=number_format($value_default);?>" class="form-control" id="live_fbetmax_money" name="live_fbetmax_money" placeholder="" onblur="chkMinMax(this,<?=$min_betmin_money;?>,<?=$max_betmax_money;?>);">
                              <span class="text-danger label-sm span_block" id="k_live_fbetmax_money" data-json="<?=$min_betmin_money;?>">( มากกว่าหรือเท่ากับ <?=number_format($min_betmin_money);?>) </span>
                        </div>

                        <div class="form-group col-sm-12">
                          <label for="live_fbetmin_money">90 นาทีต่ำสุด/ไม้</label>
                              <input type="text" value="<?=number_format($min_betmin_money);?>" class="form-control" id="live_fbetmin_money" name="live_fbetmin_money"  placeholder="" onblur="chkMinMax(this,<?=$min_betmin_money;?>,<?=$max_betmin_money;?>)">
                              <span class="text-danger label-sm span_block" id="k_live_fbetmin_money" data-json="<?=$min_betmin_money;?>">
                                ( <?=number_format($min_betmin_money);?> - <?=number_format($max_betmin_money);?> ) 
                              </span>
                        </div>
                        
                  </div> <!-- /col -->
                </div>
              </div>
              
              <!-- .tab-pane -->  
              <div class="tab-pane" id="sport">
                <div class="row"> <!-- row -->
                  <div class="col-sm-12"><!-- col -->
                      <div class="checkbox inline">
                           <label>
                             <input type="checkbox" id="sport_today_active" name="sport_today_active" checked=""> กีฬาวันนี้
                           </label>
                      </div>
                       <div class="checkbox inline">
                          <label>
                            <input type="checkbox" id="sport_live_active" name="sport_live_active" checked=""> กีฬากำลังแข่ง 
                          </label>
                      </div>

                      <!-- <div class="form-inline pull-right"><button type="button" class="btn btn-block btn-primary btn-custom-c" onclick="setMax('sport');"> ค่าสูงสุด</button></div> -->
                  </div> <!-- /col -->

                  <div class="col-md-4 col-sm-12"> <!-- col -->
                        <div class="row">
                            <div class="form-group col-sm-7">
                              <label for="sporttoday_share">หุ้นกีฬาวันนี้ </label>
                              <div class="input-group">
                                  <select class="form-control" id="sporttoday_share" name="sporttoday_share" onchange="setKeep('sporttoday_share');">
                                    <?php
                                        for($i=0;$i<=100;$i++)
                                        {
                                          ?>
                                            <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
                                          <?php
                                        }
    
                                     ?>
                                  </select>
                                  <span class="input-group-addon">%</span>
                              </div>
                            </div>
    
                            <div class="form-group col-sm-5">
                              <label for="k_sporttoday_share">ยอดเก็บ</label>
                              <div class="input-group">
                                  <select class="form-control" id="k_sporttoday_share" name="k_sporttoday_share" data-json="100" disabled >
                                    <?php
    
                                        for($i=0;$i<=100;$i++)
                                        {
                                           $slt = ($i == 100) ? "selected" : ""; 
                                          ?>
                                            <option value="<?php echo $i; ?>" <?php echo $slt;?> > <?php echo $i; ?></option>
                                          <?php
                                        }
    
                                     ?>
                                  </select>
                                  <span class="input-group-addon">%</span>
                              </div>
                            </div>
    
                            <div class="form-group col-sm-7">
                              <label for="sportlive_share">หุ้นกีฬากำลังแข่ง </label>
                              <div class="input-group">
                                  <select class="form-control" id="sportlive_share" name="sportlive_share" onchange="setKeep('sportlive_share');">
                                    <?php
                                        for($i=0;$i<=100;$i++)
                                        {
                                          ?>
                                            <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
                                          <?php
                                        }
    
                                     ?>
                                  </select>
                                  <span class="input-group-addon">%</span>
                              </div>
                            </div>
    
                            <div class="form-group col-sm-5">
                              <label for="k_sportlive_share">ยอดเก็บ</label>
                              <div class="input-group">
                                  <select class="form-control" id="k_sportlive_share" name="k_sportlive_share" data-json="100" disabled >
                                    <?php
    
                                        for($i=0;$i<=100;$i++)
                                        {
                                           $slt = ($i == 100) ? "selected" : ""; 
                                          ?>
                                            <option value="<?php echo $i; ?>" <?php echo $slt;?> > <?php echo $i; ?></option>
                                          <?php
                                        }
    
                                     ?>
                                  </select>
                                  <span class="input-group-addon">%</span>
                              </div>
                            </div>

                          <div class="form-group col-sm-12">
                            <label for="sport_com">ค่าคอม </label>
                            <div class="input-group">
                                <select class="form-control" id="sport_com" name="sport_com">
                                  <? 
                                      for($x=0;$x<=400;$x++)
                                      {
                                          $num=number_format($x*0.05,2);
                                          $rnum=number_format(2,2);
                                          if($rnum>=$num)
                                          {
                                              ?>
                                                  <option value="<?=$num;?>"><?=$num;?></option>
                                              <?
                                          }
                                      }
                                  ?>
                                </select>
                                <span class="input-group-addon">%</span>
                            </div>
                          </div>

                        </div> <!-- /row -->
                  </div> <!-- /col -->
                    
                  <div class="col-md-4 col-sm-12"> <!-- col --> 
                      <div class="form-group col-sm-12">
                          <label for="live_betmoneymax_pair">สูงสุด/คู่ </label>
                          <input type="text" value="<?=number_format($value_default);?>" class="form-control" id="sport_betmoneymax_pair" name="sport_betmoneymax_pair" placeholder="" onblur="chkMinMax(this,<?=$min_betmin_money;?>,<?=$max_betmax_money;?>);">
                          <span class="text-danger label-sm span_block" id="k_sport_betmoneymax_pair" data-json="<?=$live_betmax_money_max;?>">( มากกว่าหรือเท่ากับ <?=number_format($min_betmin_money);?>) </span>
                      </div>
                  </div> <!-- /col -->

                  <div class="col-md-4 col-sm-12"> <!-- col --> 
                     
                      <div class="form-group col-sm-12">
                          <label for="live_betmoneymax_pair">สูงสุด/ไม้ </label>
                          <input type="text" value="<?=number_format($value_default);?>" class="form-control" id="sport_betmax_money" name="sport_betmax_money" placeholder="" onblur="chkMinMax(this,<?=$min_betmin_money;?>,<?=$max_betmax_money;?>);">
                          <span class="text-danger label-sm span_block" id="k_sport_betmax_money" data-json="<?=$min_betmin_money;?>">( มากกว่าหรือเท่ากับ <?=number_format($min_betmin_money);?>) </span>
                      </div>
                      <div class="form-group col-sm-12">
                          <label for="live_betmoneymax_pair">ต่ำสุด/ไม้</label>
                          <input type="text" value="<?=number_format($min_betmin_money);?>" class="form-control" id="sport_betmin_money" name="sport_betmin_money" placeholder="" onblur="chkMinMax(this,<?=$min_betmin_money;?>,<?=$max_betmin_money;?>)">
                          <span class="text-danger label-sm span_block" id="k_sport_betmin_money" data-json="<?=$min_betmin_money;?>">
                                ( <?=number_format($min_betmin_money);?> - <?=number_format($max_betmin_money);?> ) 
                          </span>
                      </div> 
                  </div> <!-- /col -->

                </div><!-- /row -->

              </div> <!-- /.tab-pane -->  


               <!-- .tab-pane -->  
              <div class="tab-pane" id="boxing">
                <div class="row"> <!-- row -->
                  <div class="col-sm-12"><!-- col -->
                      <div class="checkbox inline">
                           <label>
                             <input type="checkbox" id="boxing_today_active" name="boxing_today_active" checked=""> มวยไทยวันนี้
                           </label>
                      </div>
                       <div class="checkbox inline">
                          <label>
                            <input type="checkbox" id="boxing_live_active" name="boxing_live_active" checked=""> มวยไทยกำลังแข่ง 
                          </label>
                      </div>

                     <!--  <div class="form-inline pull-right"><button type="button" class="btn btn-block btn-primary btn-custom-c" onclick="setMax('boxing');">ค่าสูงสุด</button></div> -->
                  </div> <!-- /col -->

                  <div class="col-md-4 col-sm-12"> <!-- col -->
                        <div class="row">
                            <div class="form-group col-sm-7">
                              <label for="boxingtoday_share">หุ้นมวยไทยวันนี้ </label>
                              <div class="input-group">
                                  <select class="form-control" id="boxingtoday_share" name="boxingtoday_share" onchange="setKeep('boxingtoday_share');">
                                    <?php
                                        for($i=0;$i<=100;$i++)
                                        {
                                          ?>
                                            <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
                                          <?php
                                        }
    
                                     ?>
                                  </select>
                                  <span class="input-group-addon">%</span>
                              </div>
                            </div>
    
                            <div class="form-group col-sm-5">
                              <label for="k_sporttoday_share">ยอดเก็บ</label>
                              <div class="input-group">
                                  <select class="form-control" id="k_boxingtoday_share" name="k_boxingtoday_share" data-json="100" disabled >
                                    <?php
    
                                        for($i=0;$i<=100;$i++)
                                        {
                                           $slt = ($i == 100) ? "selected" : ""; 
                                          ?>
                                            <option value="<?php echo $i; ?>" <?php echo $slt;?> > <?php echo $i; ?></option>
                                          <?php
                                        }
    
                                     ?>
                                  </select>
                                  <span class="input-group-addon">%</span>
                              </div>
                            </div>
    
                            <div class="form-group col-sm-7">
                              <label for="boxinglive_share">หุ้นมวยไทยกำลังแข่ง </label>
                              <div class="input-group">
                                  <select class="form-control" id="boxinglive_share" name="boxinglive_share" onchange="setKeep('boxinglive_share');">
                                    <?php
                                        for($i=0;$i<=100;$i++)
                                        {
                                          ?>
                                            <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
                                          <?php
                                        }
    
                                     ?>
                                  </select>
                                  <span class="input-group-addon">%</span>
                              </div>
                            </div>
    
                            <div class="form-group col-sm-5">
                              <label for="k_sportlive_share">ยอดเก็บ</label>
                              <div class="input-group">
                                  <select class="form-control" id="k_boxinglive_share" name="k_boxinglive_share" data-json="100" disabled >
                                    <?php
    
                                        for($i=0;$i<=100;$i++)
                                        {
                                           $slt = ($i == 100) ? "selected" : ""; 
                                          ?>
                                            <option value="<?php echo $i; ?>" <?php echo $slt;?> > <?php echo $i; ?></option>
                                          <?php
                                        }
    
                                     ?>
                                  </select>
                                  <span class="input-group-addon">%</span>
                              </div>
                            </div>

                          <div class="form-group col-sm-12">
                            <label for="boxing_com">ค่าคอม </label>
                            <div class="input-group">
                                <select class="form-control" id="boxing_com" name="boxing_com">
                                  <? 
                                      for($x=0;$x<=400;$x++)
                                      {
                                          $num=number_format($x*0.05,2);
                                          $rnum=number_format(2,2);
                                          if($rnum>=$num)
                                          {
                                              ?>
                                                  <option value="<?=$num;?>"><?=$num;?></option>
                                              <?
                                          }
                                      }
                                    ?>
                                </select>
                                <span class="input-group-addon">%</span>
                            </div>
                          </div>

                        </div> <!-- /row -->
                  </div> <!-- /col -->
                    
                  <div class="col-md-4 col-sm-12"> <!-- col --> 
                      <div class="form-group col-sm-12">
                          <label for="boxing_betmoneymax_pair">สูงสุด/คู่ </label>
                          <input type="text" value="<?=number_format($value_default);?>" class="form-control" id="boxing_betmoneymax_pair" name="boxing_betmoneymax_pair" placeholder="" onblur="chkMinMax(this,<?=$min_betmin_money;?>,<?=$max_betmax_money;?>);">
                          <span class="text-danger label-sm span_block" id="k_boxing_betmoneymax_pair" data-json="<?=$boxing_betmoneymax_pair_max;?>">( มากกว่าหรือเท่ากับ <?=number_format($min_betmin_money);?>) </span>
                      </div>
                  </div> <!-- /col -->

                  <div class="col-md-4 col-sm-12"> <!-- col --> 
                     
                      <div class="form-group col-sm-12">
                          <label for="boxing_betmax_money">สูงสุด/ไม้ </label>
                          <input type="text" value="<?=number_format($value_default);?>" class="form-control" id="boxing_betmax_money" name="boxing_betmax_money" placeholder="" onblur="chkMinMax(this,<?=$min_betmin_money;?>,<?=$max_betmax_money;?>);">
                          <span class="text-danger label-sm span_block" id="k_boxing_betmax_money" data-json="<?=$min_betmin_money;?>">( มากกว่าหรือเท่ากับ <?=number_format($min_betmin_money);?>) </span>
                      </div>
                      <div class="form-group col-sm-12">
                          <label for="boxing_betmin_money">ต่ำสุด/ไม้</label>
                          <input type="text" value="<?=number_format($min_betmin_money);?>" class="form-control" id="boxing_betmin_money" name="boxing_betmin_money" placeholder="" onblur="chkMinMax(this,<?=$min_betmin_money;?>,<?=$max_betmin_money;?>)">
                          <span class="text-danger label-sm span_block" id="k_sport_betmin_money" data-json="<?=$min_betmin_money;?>">
                                ( <?=number_format($min_betmin_money);?> - <?=number_format($max_betmin_money);?> ) 
                          </span>
                      </div> 
                  </div> <!-- /col -->   

                </div><!-- /row -->

              </div> <!-- /.tab-pane -->  

 
              <!-- .tab-pane -->
              <div class="tab-pane" id="step">
                  <div class="row"> <!-- row -->
                      <div class="col-sm-12"><!-- col -->
                          <div class="checkbox inline">
                               <label>
                                 <input type="checkbox" id="step_active" name="step_active" checked="">  สเต็ป 
                               </label>
                          </div>
                         <!--  <div class="form-inline pull-right"><button type="button" class="btn btn-block btn-primary btn-custom-c" onclick="setMax('boxing');">ค่าสูงสุด</button></div> -->
                      </div> <!-- /col -->
                      <div class="col-md-4 col-sm-12"> <!-- col -->
                          <div class="row"> <!-- row -->
                              <div class="form-group col-sm-7">
                                <label for="today_share">แบ่งหุ้น </label>
                                <div class="input-group">
                                    <select class="form-control" id="step_share" name="step_share" onchange="setKeep('step_share');">
                                      <?php
                                          for($i=0;$i<=100;$i++)
                                          {
                                            ?>
                                              <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
                                            <?php
                                          }
                                       ?>
                                    </select>
                                    <span class="input-group-addon">%</span>
                                </div>
                              </div>
    
                              <div class="form-group col-sm-5">
                                <label for="k_step_share">ยอดเก็บ</label>
                                <div class="input-group">
                                    <select class="form-control" id="k_step_share" data-json="100" name="k_step_share" disabled >
                                      <?php
                                          for($i=0;$i<=100;$i++)
                                          {
                                             $slt = ($i == 100) ? "selected" : ""; 
                                            ?>
                                              <option value="<?php echo $i; ?>" <?php echo $slt;?> > <?php echo $i; ?></option>
                                            <?php
                                          }
                                       ?>
                                    </select>
                                    <span class="input-group-addon">%</span>
                                </div>
                              </div>

                              <div class="form-group col-sm-12">
                                  <label for="step_betmax_money">สูงสุด/ไม้</label>
                                  <input type="text" value="<?=number_format($value_default);?>" class="form-control" id="step_betmax_money" name="step_betmax_money" placeholder="" onblur="chkMinMax(this,<?=$min_betmin_money;?>,<?=$max_betmax_money;?>);">
                                  <span class="text-danger label-sm span_block" id="k_step_betmax_money" data-json="<?=$min_betmin_money;?>">( มากกว่าหรือเท่ากับ <?=number_format($min_betmin_money);?>) </span>
                              </div>

                              <div class="form-group col-sm-12">
                                  <label for="step_betmin_money">ต่ำสุด/ไม้</label>
                                  <input type="text" value="<?=number_format($min_betmin_money);?>" class="form-control" id="step_betmin_money" name="step_betmin_money" placeholder="" onblur="chkMinMax(this,<?=$min_betmin_money;?>,<?=$max_betmin_money;?>)">
                                  <span class="text-danger label-sm span_block" id="k_step_betmin_money" data-json="<?=$min_betmin_money;?>">
                                    ( <?=number_format($min_betmin_money);?> - <?=number_format($max_betmin_money);?> ) 
                                  </span>
                              </div>

                              <div class="form-group col-sm-12">
                                  <label for="step_daymax_money">เล่นได้สูงสุด/วัน</label>
                                  <input type="text" value="<?=number_format($value_default);?>" class="form-control" id="step_daymax_money" name="step_daymax_money" placeholder="" onblur="chkMinMax(this,<?=$min_betmin_money;?>,<?=$max_betmax_money;?>);">
                                  <span class="text-danger label-sm span_block" id="k_step_daymax_money" data-json="<?=$min_betmin_money;?>">( มากกว่าหรือเท่ากับ <?=number_format($min_betmin_money);?>) </span>
                              </div>

                              <div class="form-group col-sm-12">
                                  <label for="step_daymax_money">จ่ายสูงสุด/บิล</label>
                                  <input type="text" value="<?=number_format($value_default);?>" class="form-control" id="step_billmax_money" name="step_billmax_money" placeholder="" onblur="chkMinMax(this,<?=$min_betmin_money;?>,<?=$max_betmax_money;?>);">
                                  <span class="text-danger label-sm span_block" id="k_step_billmax_money" data-json="<?=$min_betmin_money;?>">( มากกว่าหรือเท่ากับ <?=number_format($min_betmin_money);?>) </span>
                              </div>

                          </div> <!-- row -->
                      </div> <!-- /col --> 

                      <div class="col-md-4 col-sm-12"> <!-- col -->
                          <div class="row"> <!-- row --> 
                                <div class="form-group col-sm-12 col-md-12">  
                                    <label for="step_min_pair">จำนวนคู่ต่ำสุด/บิล </label>
                                    <select class="form-control" id="step_min_pair" name="step_min_pair" onchange="change_set_min_pair(2,20);">
                                      <?php
                                          for($i=2;$i<=19;$i++)
                                          {
                                            ?>
                                              <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
                                            <?php
                                          }
    
                                       ?>
                                    </select>
                                </div>

                                <div class="form-group col-sm-12 col-md-12"> 
                                    <label for="step_max_pair">จำนวนคู่สูงสุด/บิล </label>
                                    <select class="form-control" id="step_max_pair" name="step_max_pair" onchange="change_set_min_pair(2,20);">
                                      <?php
                                          for($i=3;$i<=20;$i++)
                                          {
                                             $slt = ($i == 20) ? "selected" : ""; 
                                            ?>
                                              <option value="<?php echo $i; ?>" <?=$slt;?> > <?php echo $i; ?></option>
                                            <?php
                                          }
    
                                       ?>
                                    </select>
                                </div>
                          </div> <!-- row -->
                      </div> <!-- /col -->

                      <div class="col-md-4 col-sm-12"> <!-- col -->
                          <div class="row" id="add_step_dis"> <!-- row --> 

                          </div> <!-- row -->
                      </div> <!-- /col -->         

                  </div><!-- /row -->
              </div> 
              <!-- /.tab-pane -->  

              <!-- .tab-pane -->
              <div class="tab-pane" id="lotto">
                <div class="row"> <!-- row -->
                    <div class="col-sm-12"><!-- col -->
                      <div class="checkbox inline">
                           <label>
                             <input type="checkbox" id="lotto_active" name="lotto_active" checked=""> หวย
                           </label>
                      </div>
                      <!-- <div class="form-inline pull-right"><button type="button" class="btn btn-block btn-primary btn-custom-c" onclick="setMax('lotto');">ค่าสูงสุด</button></div> -->
                    </div> <!-- /col -->

                    <div class="col-sm-12"><!-- col -->
                       <div class="form-group col-sm-3">
                         <label for="7_lotto_share">แบ่งหุ้น </label>
                         <div class="input-group">
                             <select class="form-control" id="7_lotto_share" name="lotto_share" onchange="setKeep('7_lotto_share');">
                               <?php
                                   for($i=0;$i<=100;$i++)
                                   {
                                     ?>
                                       <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
                                     <?php
                                   }
    
                                ?>
                             </select>
                             <span class="input-group-addon">%</span>
                         </div>
                       </div>
    
                       <div class="form-group col-sm-3">
                         <label for="k_sporttoday_share">ยอดเก็บ</label>
                         <div class="input-group">
                             <select class="form-control" id="k_7_lotto_share" name="k_7_lotto_share" data-json="100" disabled >
                               <?php
    
                                   for($i=0;$i<=100;$i++)
                                   {
                                      $slt = ($i == 100) ? "selected" : ""; 
                                     ?>
                                       <option value="<?php echo $i; ?>" <?php echo $slt;?> > <?php echo $i; ?></option>
                                     <?php
                                   }
    
                                ?>
                             </select>
                             <span class="input-group-addon">%</span>
                         </div>
                       </div>

                       <div class="form-group col-sm-3">
                         <label for="k_sporttoday_share">สูงสุด/ไม้</label>
                         <div class="input-group">
                             <input type="text" value="<?=number_format($value_default);?>" class="form-control" id="lotto_betmax_money" name="lotto_betmax_money" placeholder="" onblur="chkMinMax(this,<?=$min_betmin_money;?>,<?=$max_betmax_money;?>);">
                             <span class="text-danger label-sm span_block" id="k_lotto_betmax_money" data-json="<?=$min_betmin_money;?>">( มากกว่าหรือเท่ากับ <?=number_format($min_betmin_money);?>) </span>
                          </div>
                       </div>

                       <div class="form-group col-sm-3">
                         <label for="k_sporttoday_share">ต่ำสุด/ไม้</label>
                         <div class="input-group">
                             <input type="text" value="<?=number_format($min_betmin_money);?>" class="form-control" id="lotto_betmin_money" name="lotto_betmin_money" placeholder="" onblur="chkMinMax(this,<?=$min_betmin_money;?>,<?=$max_betmin_money;?>)">
                             <span class="text-danger label-sm span_block" id="k_lotto_betmin_money" data-json="<?=$min_betmin_money;?>">
                                ( <?=number_format($min_betmin_money);?> - <?=number_format($max_betmin_money);?> ) 
                              </span>
                          </div>
                       </div>

                    </div> <!-- /col -->

                  <?php 
                    $data["lotto_type"] = $lot_type[$_SESSION["AGlang"]][1];
                  ?>
                    <div class="col-sm-4"><!-- col -->
                      <div class="box box-info" style="border: 1px solid #d9d9d9;">
                          <div class="box-header with-border custom bg-light-blue color-palette" style="text-align: center;">
                            <div class="checkbox inline">
                                  <label>
                                    <input type="checkbox" id="lotto_typeAOpen" name="lotto_typeAOpen" checked=""> แบบ A
                                  </label>
                            </div>
                          </div>
                          <div class="box-body">
                              <table class="table table-bordered table-hover">
                                  <tr>
                                     <th>รายการ</th>
                                     <th>อัตราจ่าย</th>
                                     <th>ค่าคอม</th>
                                   </tr>
                                   <tbody>
                                      <?php 
                                        $ex_lotto_pay = explode(",", $config_lotto_pay1);
                                        $ex_lotto_com = explode(",", $config_lotto_dis1);
                                        $ex_lotto_pay_max = explode(",", $config_lotto_pay1_max);
                                        $ex_lotto_com_max = explode(",", $config_lotto_dis1_max);
                                        foreach ($data["lotto_type"] as $key => $value) { 
                                         
                                        ?>
                                      <tr>
                                        <td style="vertical-align: middle;"><?=$value;?></td>
                                         <td>
                                          <input type="text" value="<?=addCommas($ex_lotto_pay[$key]);?>" class="form-control" id="lotto_pay1_<?=$key;?>" name="lotto_pay1_<?=$key;?>" placeholder="" onblur="chkMinMax(this,0,<?=$ex_lotto_pay_max[$key];?>)">
                                          <span class="text-danger label-sm maxtransfer" id="lotto_pay_info" data-json="<?=$ex_lotto_pay_max[$key];?>">(0-<?=addCommas($ex_lotto_pay_max[$key]);?>) </span>
                                        </td>
                                        <td>
                                          <input type="text" value="<?=addCommas($ex_lotto_com[$key]);?>" class="form-control" id="lotto_com1_<?=$key;?>" name="lotto_com1_<?=$key;?>" placeholder="" onblur="chkMinMax(this,0,<?=$ex_lotto_com_max[$key]; ?>)">
                                          <span class="text-danger label-sm maxtransfer" id="lotto_pay_info" data-json="<?=$ex_lotto_com_max[$key]; ?>">(0-<?=addCommas($ex_lotto_com_max[$key]); ?>) </span>
                                       
                                        </td>
                                      </tr>
                                      <?php } ?>
                                   </tbody>
                              </table>
                          </div>
                      </div>
                    </div> <!-- /col -->  

                    <div class="col-sm-4"><!-- col -->
                      <div class="box box-info" style="border: 1px solid #d9d9d9;">
                          <div class="box-header with-border custom bg-light-blue color-palette" style="text-align: center;">
                            <div class="checkbox inline">
                                  <label>
                                    <input type="checkbox" id="lotto_typeBOpen" name="lotto_typeBOpen" checked="" > แบบ B
                                  </label>
                            </div>
                          </div>
                          <div class="box-body">
                              <table class="table table-bordered table-hover">
                                  <tr>
                                     <th>รายการ</th>
                                     <th>อัตราจ่าย</th>
                                     <th>ค่าคอม</th>
                                   </tr>
                                   <tbody>
                                      <?php 
                                        $ex_lotto_pay = explode(",", $config_lotto_pay2);
                                        $ex_lotto_com = explode(",", $config_lotto_dis2);
                                        $ex_lotto_pay_max = explode(",", $config_lotto_pay2_max);
                                        $ex_lotto_com_max = explode(",", $config_lotto_dis2_max);
                                        foreach ($data["lotto_type"] as $key => $value) { ?>
                                      <tr>
                                        <td style="vertical-align: middle;"><?=$value;?></td>
                                         <td>
                                          <input type="text" value="<?=addCommas($ex_lotto_pay[$key]);?>" class="form-control" id="lotto_pay2_<?=$key;?>" name="lotto_pay2_<?=$key;?>" placeholder="" onblur="chkMinMax(this,0,<?=$ex_lotto_pay_max[$key];?>)">
                                          <span class="text-danger label-sm maxtransfer" id="lotto_pay_info" data-json="<?=$ex_lotto_pay_max[$key];?>">(0-<?=addCommas($ex_lotto_pay_max[$key]);?>) </span>
                                        </td>
                                        <td>
                                          <input type="text" value="<?=addCommas($ex_lotto_com[$key]); ?>" class="form-control" id="lotto_com2_<?=$key;?>" name="lotto_com2_<?=$key;?>" placeholder="" onblur="chkMinMax(this,0,<?=$ex_lotto_com_max[$key]; ?>)">
                                          <span class="text-danger label-sm maxtransfer" id="lotto_pay_info" data-json="<?=$ex_lotto_com_max[$key]; ?>">(0-<?=addCommas($ex_lotto_com_max[$key]); ?>) </span>
                                        </td>
                                      </tr>
                                      <?php } ?>
                                   </tbody>
                              </table>
                          </div>
                      </div>
                    </div> <!-- /col -->  

                    <div class="col-sm-4"><!-- col -->
                      <div class="box box-info" style="border: 1px solid #d9d9d9;">
                          <div class="box-header with-border custom bg-light-blue color-palette" style="text-align: center;">
                            <div class="checkbox inline">
                                  <label>
                                    <input type="checkbox" id="lotto_typeCOpen" name="lotto_typeCOpen" checked="" > แบบ C
                                  </label>
                            </div>
                          </div>
                          <div class="box-body">
                              <table class="table table-bordered table-hover">
                                  <tr>
                                     <th>รายการ</th>
                                     <th>อัตราจ่าย</th>
                                     <th>ค่าคอม</th>
                                   </tr>
                                   <tbody>
                                      <?php 
                                        $ex_lotto_pay = explode(",", $config_lotto_pay3);
                                        $ex_lotto_com = explode(",", $config_lotto_dis3);
                                        $ex_lotto_pay_max = explode(",", $config_lotto_pay3_max);
                                        $ex_lotto_com_max = explode(",", $config_lotto_dis3_max);
                                        foreach ($data["lotto_type"] as $key => $value) { ?>
                                      <tr>
                                        <td style="vertical-align: middle;"><?=$value;?></td>
                                         <td>
                                          <input type="text" value="<?=addCommas($ex_lotto_pay[$key]);?>" class="form-control" id="lotto_pay3_<?=$key;?>" name="lotto_pay3_<?=$key;?>" placeholder="" onblur="chkMinMax(this,0,<?=$ex_lotto_pay_max[$key];?>)">
                                          <span class="text-danger label-sm maxtransfer" id="lotto_pay_info" data-json="<?=$ex_lotto_pay_max[$key];?>">(0-<?=addCommas($ex_lotto_pay_max[$key]);?>) </span>
                                        </td>
                                        <td>
                                          <input type="text" value="<?=addCommas($ex_lotto_com[$key]); ?>" class="form-control" id="lotto_com3_<?=$key;?>" name="lotto_com3_<?=$key;?>" placeholder="" onblur="chkMinMax(this,0,<?=$ex_lotto_com_max[$key]; ?>)">
                                          <span class="text-danger label-sm maxtransfer" id="lotto_pay_info" data-json="<?=$ex_lotto_com_max[$key]; ?>">(0-<?=addCommas($ex_lotto_com_max[$key]); ?>) </span>
                                        </td>
                                      </tr>
                                      <?php } ?>
                                   </tbody>
                              </table>
                          </div>
                      </div>
                    </div> <!-- /col -->  
                </div><!-- /row -->

              </div>  
              <!-- /.tab-pane -->  

              <!-- .tab-pane -->
              <div class="tab-pane" id="lotto_set">
                <div class="row"> <!-- row -->
                    <div class="col-sm-12"><!-- col -->
                      <div class="checkbox inline">
                           <label>
                             <input type="checkbox" id="lotto_share_active" name="lotto_share_active" checked="">  หวยหุ้น 
                           </label>
                      </div>
                      <!-- <div class="form-inline pull-right"><button type="button" class="btn btn-block btn-primary btn-custom-c" onclick="setMax('lotto');">ค่าสูงสุด</button></div> -->
                    </div> <!-- /col -->

                    <div class="col-sm-12"><!-- col -->
                       <div class="form-group col-sm-3">
                         <label for="7_lotto_share">แบ่งหุ้น </label>
                         <div class="input-group">
                             <select class="form-control" id="8_lotto_share" name="lotto_share_hun" onchange="setKeep('8_lotto_share');">
                               <?php
                                   for($i=0;$i<=100;$i++)
                                   {
                                     ?>
                                       <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
                                     <?php
                                   }
    
                                ?>
                             </select>
                             <span class="input-group-addon">%</span>
                         </div>
                       </div>
    
                       <div class="form-group col-sm-3">
                         <label for="k_sporttoday_share">ยอดเก็บ</label>
                         <div class="input-group">
                             <select class="form-control" id="k_8_lotto_share" name="k_8_lotto_share" data-json="100" disabled >
                               <?php
    
                                   for($i=0;$i<=100;$i++)
                                   {
                                      $slt = ($i == 100) ? "selected" : ""; 
                                     ?>
                                       <option value="<?php echo $i; ?>" <?php echo $slt;?> > <?php echo $i; ?></option>
                                     <?php
                                   }
    
                                ?>
                             </select>
                             <span class="input-group-addon">%</span>
                         </div>
                       </div>

                       <div class="form-group col-sm-3">
                         <label for="k_sporttoday_share">สูงสุด/ไม้</label>
                         <div class="input-group">
                             <input type="text" value="<?=$value_default;?>" class="form-control" id="lotto_share_hun_betmax_money" name="lotto_share_hun_betmax_money" placeholder="" onblur="chkMinMax(this,<?=$min_betmin_money;?>,<?=$max_betmax_money;?>);">
                             <span class="text-danger label-sm span_block" id="k_lotto_share_hun_betmax_money" data-json="<?=$min_betmin_money;?>">( มากกว่าหรือเท่ากับ <?=number_format($min_betmin_money);?>) </span>
                          </div>
                       </div>

                       <div class="form-group col-sm-3">
                         <label for="k_sporttoday_share">ต่ำสุด/ไม้</label>
                         <div class="input-group">
                             <input type="text" value="<?=number_format($min_betmin_money);?>" class="form-control" id="lotto_share_hun_betmin_money" name="lotto_share_hun_betmin_money" placeholder="" onblur="chkMinMax(this,<?=$min_betmin_money;?>,<?=$max_betmin_money;?>)">
                             <span class="text-danger label-sm span_block" id="k_lotto_share_hun_betmin_money" ata-json="<?=$min_betmin_money;?>">
                                ( <?=number_format($min_betmin_money);?> - <?=number_format($max_betmin_money);?> ) 
                             </span>
                          </div>
                       </div>
                       
                    </div> <!-- /col -->

                  <?php 
                    $data["lotto_type"] = $lot_type[$_SESSION["AGlang"]][3];
                  ?>
                    <div class="col-sm-4"><!-- col -->
                      <div class="box box-info" style="border: 1px solid #d9d9d9;">
                          <div class="box-header with-border custom bg-light-blue color-palette" style="text-align: center;">
                            <div class="checkbox inline">
                                  <label>
                                    <input type="checkbox" id="lotto_hun_typeAOpen" name="lotto_hun_typeAOpen" checked=""> แบบ A
                                  </label>
                            </div>
                          </div>
                          <div class="box-body">
                              <table class="table table-bordered table-hover">
                                  <tr>
                                     <th>รายการ</th>
                                     <th>อัตราจ่าย</th>
                                     <th>ค่าคอม</th>
                                   </tr>
                                   <tbody>
                                      <?php 

                                      $ex_lotto_hun_pay = explode(",", $config_lotto_hun_pay1);
                                      $ex_lotto_hun_com = explode(",", $config_lotto_hun_dis1);
                                      $ex_lotto_hun_pay_max = explode(",", $config_lotto_hun_pay1_max);
                                      $ex_lotto_hun_com_max = explode(",", $config_lotto_hun_dis1_max);

                                      foreach ($data["lotto_type"] as $key => $value) {
                                        if($key == 31)
                                          {
                                            continue;
                                          }
                                       ?>
                                      <tr>
                                        <td style="vertical-align: middle;"><?=$value;?></td>
                                         <td>
                                          <input type="text" value="<?=addCommas($ex_lotto_hun_pay[$key]);?>" class="form-control" id="lotto_hun_pay1_<?=$key;?>" name="lotto_hun_pay1_<?=$key;?>" placeholder="" onblur="chkMinMax(this,0,<?=$ex_lotto_hun_pay_max[$key];?>)">
                                          <span class="text-danger label-sm maxtransfer" id="lotto_pay_info" data-json="<?=$ex_lotto_hun_pay_max[$key];?>">(0-<?=addCommas($ex_lotto_hun_pay_max[$key]);?>) </span>
                                        </td>
                                        <td>
                                          <input type="text" value="<?=addCommas($ex_lotto_hun_com[$key]);?>" class="form-control" id="lotto_hun_com1_<?=$key;?>" name="lotto_hun_com1_<?=$key;?>" placeholder="" onblur="chkMinMax(this,0,<?=$ex_lotto_hun_com_max[$key]; ?>)">
                                          <span class="text-danger label-sm maxtransfer" id="lotto_com_info" data-json="<?=$ex_lotto_hun_com_max[$key]; ?>">(0-<?=addCommas($ex_lotto_hun_com_max[$key]); ?>) </span>
                                        </td>
                                      </tr>
                                      <?php } ?>
                                   </tbody>
                              </table>
                          </div>
                      </div>
                    </div> <!-- /col -->  

                    <div class="col-sm-4"><!-- col -->
                      <div class="box box-info" style="border: 1px solid #d9d9d9;">
                          <div class="box-header with-border custom bg-light-blue color-palette" style="text-align: center;">
                            <div class="checkbox inline">
                                  <label>
                                    <input type="checkbox" id="lotto_hun_typeBOpen" name="lotto_hun_typeBOpen" checked="" > แบบ B
                                  </label>
                            </div>
                          </div>
                          <div class="box-body">
                              <table class="table table-bordered table-hover">
                                  <tr>
                                     <th>รายการ</th>
                                     <th>อัตราจ่าย</th>
                                     <th>ค่าคอม</th>
                                   </tr>
                                   <tbody>
                                      <?php 
                                       $ex_lotto_hun_pay = explode(",", $config_lotto_hun_pay2);
                                       $ex_lotto_hun_com = explode(",", $config_lotto_hun_dis2);
                                      $ex_lotto_hun_pay_max = explode(",", $config_lotto_hun_pay2_max);
                                      $ex_lotto_hun_com_max = explode(",", $config_lotto_hun_dis2_max);
                                      foreach ($data["lotto_type"] as $key => $value) { 
                                        if($key == 31)
                                          {
                                            continue;
                                          }
                                        ?>
                                      <tr>
                                        <td style="vertical-align: middle;"><?=$value;?></td>
                                         <td>
                                          <input type="text" value="<?=addCommas($ex_lotto_hun_pay[$key]);?>" class="form-control" id="lotto_hun_pay2_<?=$key;?>" name="lotto_hun_pay2_<?=$key;?>" placeholder="" onblur="chkMinMax(this,0,<?=$ex_lotto_hun_pay_max[$key];?>)">
                                          <span class="text-danger label-sm maxtransfer" id="lotto_pay_info" data-json="<?=$ex_lotto_hun_pay_max[$key];?>">(0-<?=addCommas($ex_lotto_hun_pay_max[$key]);?>) </span>
                                        </td>
                                        <td>
                                          <input type="text" value="<?=addCommas($ex_lotto_hun_com[$key]); ?>" class="form-control" id="ex_lotto_hun_com<?=$key;?>" name="lotto_hun_com2_<?=$key;?>" placeholder="" onblur="chkMinMax(this,0,<?=$ex_lotto_hun_com_max[$key]; ?>)">
                                          <span class="text-danger label-sm maxtransfer" id="lotto_com_info" data-json="<?=$ex_lotto_hun_com_max[$key]; ?>">(0-<?=addCommas($ex_lotto_hun_com_max[$key]); ?>) </span>
                                        </td>
                                      </tr>
                                      <?php } ?>
                                   </tbody>
                              </table>
                          </div>
                      </div>
                    </div> <!-- /col --> 

                    <div class="col-sm-4"><!-- col -->
                      <div class="box box-info" style="border: 1px solid #d9d9d9;">
                          <div class="box-header with-border custom bg-light-blue color-palette" style="text-align: center;">
                            <div class="checkbox inline">
                                  <label>
                                    <input type="checkbox" id="lotto_hun_typeCOpen" name="lotto_hun_typeCOpen" checked="" > แบบ C
                                  </label>
                            </div>
                          </div>
                          <div class="box-body">
                              <table class="table table-bordered table-hover">
                                  <tr>
                                     <th>รายการ</th>
                                     <th>อัตราจ่าย</th>
                                     <th>ค่าคอม</th>
                                   </tr>
                                   <tbody>
                                      <?php 
                                         $ex_lotto_hun_pay = explode(",", $config_lotto_hun_pay3);
                                         $ex_lotto_hun_com = explode(",", $config_lotto_hun_dis3);
                                        $ex_lotto_hun_pay_max = explode(",", $config_lotto_hun_pay3_max);
                                        $ex_lotto_hun_com_max = explode(",", $config_lotto_hun_dis3_max);
                                        foreach ($data["lotto_type"] as $key => $value) { 
                                        if($key == 31)
                                          {
                                            continue;
                                          }
                                        ?>
                                      <tr>
                                        <td style="vertical-align: middle;"><?=$value;?></td>
                                         <td>
                                          <input type="text" value="<?=addCommas($ex_lotto_hun_pay[$key]);?>" class="form-control" id="lotto_hun_pay3_<?=$key;?>" name="lotto_hun_pay3_<?=$key;?>" placeholder="" onblur="chkMinMax(this,0,<?=$ex_lotto_hun_pay_max[$key];?>)">
                                          <span class="text-danger label-sm maxtransfer" id="lotto_pay_info" data-json="<?=$ex_lotto_hun_pay_max[$key];?>">(0-<?=addCommas($ex_lotto_hun_pay_max[$key]);?>) </span>
                                        </td>
                                        <td>
                                          <input type="text" value="<?=addCommas($ex_lotto_hun_com[$key]); ?>" class="form-control" id="lotto_hun_com3_<?=$key;?>" name="lotto_hun_com3_<?=$key;?>" placeholder="" onblur="chkMinMax(this,0,<?=$ex_lotto_hun_com_max[$key]; ?>)">
                                          <span class="text-danger label-sm maxtransfer" id="lotto_com_info" data-json="<?=$ex_lotto_hun_com_max[$key]; ?>">(0-<?=addCommas($ex_lotto_hun_com_max[$key]); ?>) </span>
                                        </td>
                                      </tr>
                                      <?php } ?>
                                   </tbody>
                              </table>
                          </div>
                      </div>
                    </div> <!-- /col --> 

                </div><!-- /row -->
                
              </div>  
              <!-- /.tab-pane -->  

              <!-- .tab-pane -->
              <div class="tab-pane" id="lotto_lao">
                  <div class="row">
                      <div class="col-sm-12"><!-- col -->
                      <div class="checkbox inline">
                           <label>
                             <input type="checkbox" id="lotto_lao_active" name="lotto_lao_active" checked="">   หวยชุด  
                           </label>
                      </div>
                      <!-- <div class="form-inline pull-right"><button type="button" class="btn btn-block btn-primary btn-custom-c" onclick="setMax('lotto');">ค่าสูงสุด</button></div> -->
                    </div> <!-- /col -->

                    <div class="col-sm-12"><!-- col -->
                       <div class="form-group col-sm-3">
                         <label for="7_lotto_share">แบ่งหุ้น </label>
                         <div class="input-group">
                             <select class="form-control" id="9_lotto_share" name="lotto_hun_set_share" onchange="setKeep('9_lotto_share');">
                               <?php
                                   for($i=0;$i<=100;$i++)
                                   {
                                     ?>
                                       <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
                                     <?php
                                   }
    
                                ?>
                             </select>
                             <span class="input-group-addon">%</span>
                         </div>
                       </div>
    
                       <div class="form-group col-sm-3">
                         <label for="k_sporttoday_share">ยอดเก็บ</label>
                         <div class="input-group">
                             <select class="form-control" id="k_9_lotto_share" name="k_9_lotto_share" data-json="100" disabled >
                               <?php
    
                                   for($i=0;$i<=100;$i++)
                                   {
                                      $slt = ($i == 100) ? "selected" : ""; 
                                     ?>
                                       <option value="<?php echo $i; ?>" <?php echo $slt;?> > <?php echo $i; ?></option>
                                     <?php
                                   }
    
                                ?>
                             </select>
                             <span class="input-group-addon">%</span>
                         </div>
                       </div>

                       

                    </div> <!-- /col -->

                    <?php 
                    $data["lotto_type"] = $lang_g["setpay"];
                     ?>

                      <div class="col-sm-12"><!-- col -->
                        <div class="box box-info" style="border: 1px solid #d9d9d9;">
                            <div class="box-body">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                       <th>รายการ</th>
                                       <th>รางวัล , 0=ปิด</th>
                                       <th>ราคาส่ง</th>
                                     </tr>
                                     <tbody>
                                        <?php 
                                              $ex_lotto_hun_set_pay = explode(",", $config_lotto_hun_set_pay);
                                              $ex_lotto_hun_set_price = explode(",", $config_lotto_hun_set_price);
                                              $ex_lotto_hun_set_pay_max = explode(",", $config_lotto_hun_set_pay_max);
                                              $ex_lotto_hun_set_price_max = explode(",", $config_lotto_hun_set_price_max);
                                              
                                              foreach ($data["lotto_type"] as $key => $value) { 
                                              $index = $key+1;
                                          ?>
                                        <tr>
                                          <td style="vertical-align: middle;"><?=$value;?></td>
                                           <td>
                                            <input type="text" value="<?=addCommas($ex_lotto_hun_set_pay[$index]); ?>" class="form-control" id="lot_hun_set_pay<?=$index;?>" name="lot_hun_set_pay<?=$index;?>" placeholder="" onblur="chkMinMax(this,0,<?=$ex_lotto_hun_set_pay_max[$index]; ?>)">
                                            <span class="text-danger label-sm maxtransfer" id="lotto_com_info" data-json="<?=$ex_lotto_hun_set_pay_max[$index]; ?>">(0-<?=addCommas($ex_lotto_hun_set_pay_max[$index]); ?>) </span>


                                          </td>
                                          <?php if($index == 1){ ?>
                                          <td>
                                            <input type="text" value="<?=addCommas($ex_lotto_hun_set_price[$index]); ?>" class="form-control" id="lot_hun_set_price<?=$index;?>" name="lot_hun_set_price<?=$index;?>" placeholder="" onblur="chkMinMax(this,0,<?=$ex_lotto_hun_set_price_max[$index]; ?>)">
                                            <span class="text-danger label-sm maxtransfer" id="lotto_com_info" data-json="<?=$ex_lotto_hun_set_price_max[$index]; ?>">(0-<?=addCommas($ex_lotto_hun_set_price_max[$index]); ?>) </span>

                                          </td>
                                           <?php } ?>
                                        </tr>
                                        <?php } ?>
                                     </tbody>
                                </table>
                            </div>
                        </div>
                      </div> <!-- /col --> 
                  </div>
              </div> 
              <!-- /.tab-pane -->  
              
              <!-- .tab-pane -->
              <div class="tab-pane" id="game">
                    <div class="row">
                        <div class="col-sm-12"><!-- col -->
                          <div class="checkbox inline">
                               <label>
                                 <input type="checkbox" id="game_active" name="game_active" checked="">  เกมส์
                               </label>
                          </div>
                          <!-- <div class="form-inline pull-right"><button type="button" class="btn btn-block btn-primary btn-custom-c" onclick="setMax('lotto');">ค่าสูงสุด</button></div> -->
                        </div> <!-- /col -->

                        <div class="col-sm-12"><!-- col -->
                           <div class="form-group col-sm-3">
                             <label for="7_lotto_share">แบ่งหุ้น </label>
                             <div class="input-group">
                                 <select class="form-control" id="game_share" name="game_share" onchange="setKeep('game_share');">
                                   <?php
                                       for($i=0;$i<=100;$i++)
                                       {
                                         ?>
                                           <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
                                         <?php
                                       }
    
                                    ?>
                                 </select>
                                 <span class="input-group-addon">%</span>
                             </div>
                           </div>
    
                           <div class="form-group col-sm-3">
                             <label for="k_sporttoday_share">ยอดเก็บ</label>
                             <div class="input-group">
                                 <select class="form-control" id="k_game_share" name="k_game_share" data-json="100" disabled >
                                   <?php
    
                                       for($i=0;$i<=100;$i++)
                                       {
                                          $slt = ($i == 100) ? "selected" : ""; 
                                         ?>
                                           <option value="<?php echo $i; ?>" <?php echo $slt;?> > <?php echo $i; ?></option>
                                         <?php
                                       }
    
                                    ?>
                                 </select>
                                 <span class="input-group-addon">%</span>
                             </div>
                           </div>

                           <div class="form-group col-sm-3">
                             <label for="k_sporttoday_share">ค่าคอม</label>
                             <div class="input-group">
                                 <select class="form-control" id="game_com" name="game_com">
                                   <?php
    
                                       for($i=0;$i<=100;$i++)
                                       {
                                          $slt = ($i == 0) ? "selected" : ""; 
                                         ?>
                                           <option value="<?php echo $i; ?>" <?php echo $slt;?> > <?php echo $i; ?></option>
                                         <?php
                                       }
    
                                    ?>
                                 </select>
                                 <span class="input-group-addon">%</span>
                             </div>
                           </div>
                        </div> <!-- /col -->

                        <div class="col-sm-12"><!-- col -->
                            <div class="form-group col-sm-3">
                               <label for="k_sporttoday_share">สูงสุด/ไม้ :</label>
                               <div class="input-group">
                                   <input type="text" value="<?=number_format($value_default);?>" class="form-control" id="game_max" name="game_max" placeholder="" onblur="chkMinMax(this,<?=$min_betmin_money;?>,<?=$max_betmax_money;?>);">
                                    <span class="text-danger label-sm span_block" id="k_game_max" data-json="<?=$min_betmin_money;?>">( มากกว่าหรือเท่ากับ <?=number_format($min_betmin_money);?>) </span>
                               </div>
                            </div>



                            <div class="form-group col-sm-3">
                               <label for="k_sporttoday_share">ต่ำสุด/ไม้ :</label>
                               <div class="input-group">
                                   <input type="text" value="10" class="form-control" id="game_min" name="game_min" placeholder="" onblur="chkMinMax(this,<?=$min_betmin_money;?>,<?=$max_betmin_money;?>)">
                                    <span class="text-danger label-sm span_block" id="k_game_min" data-json="<?=$min_betmin_money;?>">
                                       ( <?=number_format($min_betmin_money);?> - <?=number_format($max_betmin_money);?> ) 
                                   </span>
                               </div>
                            </div>

                        </div> <!-- /col -->  
                    </div>
              </div> 
              <!-- /.tab-pane -->  
              
              <!-- .tab-pane -->
              <div class="tab-pane" id="casino">
                  <div class="row">
                      <div class="col-sm-12"><!-- col -->
                        <div class="checkbox inline">
                             <label>
                               <input type="checkbox" id="casino_active" name="casino_active" checked="">  คาสิโน
                             </label>
                        </div>
                        <!-- <div class="form-inline pull-right"><button type="button" class="btn btn-block btn-primary btn-custom-c" onclick="setMax('lotto');">ค่าสูงสุด</button></div> -->
                      </div> <!-- /col -->

                  <?php
                     foreach ($lang_g["casino_share"] as $key => $value)
                     {
                   ?>

                      <div class="col-sm-6"><!-- col -->
                          <div class="box box-info" style="border: 1px solid #d9d9d9;">
                              <div class="box-header with-border custom bg-light-blue color-palette" style="text-align: center;">
                                <div class="checkbox inline">
                                      <label>
                                       <?=$value;?>
                                      </label>

                                    <div class=" center chk-g" style="float: right; padding: 8px;">
                                      <input type="checkbox" class="ace" name="casino_open<?=$key;?>"  id="casino_open<?=$key;?>" checked >
                                      <label class="lbl" for="ace-settings-navbar"></label>
                                    </div>

                                </div>
                              </div>
                              <div class="box-body">

                                <div class="form-group col-sm-8">
                                   <label for="sporttoday_share">แบ่งหุ้น  </label>
                                   <div class="input-group">
                                       <select class="form-control" id="casino_share<?=$key;?>" name="casino_share<?=$key;?>" onchange="setKeep('casino_share<?=$key;?>'); ">
                                         <?php
                                             for($i=0;$i<=100;$i++)
                                             {
                                               ?>
                                                 <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
                                               <?php
                                             }
    
                                          ?>
                                       </select>
                                       <span class="input-group-addon">%</span>
                                   </div>
                                 </div>
                                   
                                 <div class="form-group col-sm-4">
                                   <label for="k_sporttoday_share">ยอดเก็บ</label>
                                   <div class="input-group">
                                       <select class="form-control" id="k_casino_share<?=$key;?>" name="k_casino_share<?=$key;?>" data-json="100" disabled >
                                         <?php
    
                                             for($i=0;$i<=100;$i++)
                                             {
                                                $slt = ($i == 100) ? "selected" : ""; 
                                               ?>
                                                 <option value="<?php echo $i; ?>" <?php echo $slt;?> > <?php echo $i; ?></option>
                                               <?php
                                             }
    
                                          ?>
                                       </select>
                                       <span class="input-group-addon">%</span>
                                   </div>
                                 </div>

                                 <div class="form-group col-sm-12">
                                   <label for="today_com">ค่าคอม </label>
                                   <div class="input-group">
                                       <select class="form-control" id="casino_com<?=$key;?>" name="casino_com<?=$key;?>">

                                         <? 
                                           for($x=0;$x<=400;$x++)
                                           {
                                               $num=number_format($x*0.05,2);
                                               $rnum=number_format($max_sport_com,2);
                                               if($rnum>=$num)
                                               {
                                                   ?>
                                                       <option value="<?=$num;?>"><?=$num;?></option>
                                                   <?
                                               }
                                           }
                                         ?>

                                       </select>
                                       <span class="input-group-addon">%</span>
                                   </div>
                                 </div>

                                 <div class="form-group col-sm-12">
                                    <label for="live_betmax_money">สูงสุด/ไม้</label>
                                    <input type="text" value="<?=number_format($value_default);?>" class="form-control" id="rcb_maxtransfer<?=$key;?>" name="rcb_maxtransfer<?=$key;?>" placeholder="" onblur="chkMinMax(this,<?=$casino_min[$key];?>,<?=$casino_max[$key];?>);">
                                      <span class="text-danger label-sm span_block" id="k_live_betmoneymax_pair" data-json="<?=$casino_min[$key];?>">( มากกว่าหรือเท่ากับ <?=number_format($casino_min[$key]);?>) </span>
                                  </div>

                                  <div class="form-group col-sm-12">
                                    <label for="live_betmax_money">ต่ำสุด/ไม้</label>
                                    <input type="text" value="<?=number_format($casino_min[$key]);?>" class="form-control" id="rcb_mintransfer<?=$key;?>" name="rcb_mintransfer<?=$key;?>" placeholder="" onblur="chkMinMax(this,<?=$casino_min[$key];?>,<?=$casino_max[$key];?>)">
                                      <span class="text-danger label-sm span_block" id="k_rcb_mintransfer<?=$key;?>" data-json="<?=$casino_min[$key];?>">
                                        ( <?=number_format($casino_min[$key]);?> - <?=number_format($casino_max[$key]);?> ) 
                                        
                                      </span>
                                  </div>

                                  
                              </div>
                          </div>
                        </div> <!-- /col --> 

                    <?php } ?>
                  </div>
              </div>  
              <!-- /.tab-content -->
            </div> 
            
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->





            
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button class="btn btn-primary pull-right" id="save">บันทึก</button>
          </div>
        </form>
    </div>




</section>
<!-- /.content -->

<script>

function cf(message)
{
  let cf = confirm(message);

  if(cf)
  {
     saveAgent();

  }
}


function saveAgent(){

    var serializeFrm = $("#createAgent_form").serializeArray();
    $.ajax({
      url: 'inc/add_agent_save.php',
      type: 'POST',
      dataType: 'json',
      data: serializeFrm,
    })
    .done(function(res) {
      
        if(res.status){
             alert(res.msg)
             location.reload();
        }else{

          if(res.warningInput){
             alertWrongInput(res.tab,res.id);
          }
          alert(res.msg);
        }
        

    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
}
  
function setMax(val=null)
{

}

function setKeep(id){
    var diff = 0;
    var share = $('#'+id).val();
    var keep  = $('#k_'+id).data('json'); 
    diff = keep - share;
    $('#k_'+id).val(diff);

    console.log('diff '+diff)
}

change_set_min_pair(2,20);

function change_set_min_pair(_min_df,_max_df){
    var data_min = +$("#step_min_pair").val();
    var data_max = +$("#step_max_pair").val();

    var min_sl = ""
    for(i=_min_df; i<=(data_max-1); i++) {
      var sl = (data_min == i) ? "selected = 'selected'" : '';
      min_sl += "<option "+sl+" value="+i+">"+i+"</option>";

      // console.log(i)
    }

    $('#step_min_pair').html('');
    $("#step_min_pair").append(min_sl);


    var max_sl = ""
      for(i=(data_min+1); i<=_max_df; i++) {
      var sl = (data_max == i) ? "selected = 'selected'" : '';
      max_sl += "<option "+sl+" value="+i+">"+i+"</option>";
    }
    $('#step_max_pair').html('');
    $("#step_max_pair").append(max_sl);


    $.ajax({
      url: 'inc/create_dis_step.php',
      type: 'POST',
      dataType: 'html',
      data: {data_min: data_min , data_max :data_max},
    })
    .done(function(data) {
      $('#add_step_dis').text('')
      $('#add_step_dis').append(data);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });


    // console.log(data_min)
}


function changeLowerValue(e)
{
    var thisVal = $(e).val();
    var thisIndex = $(e).attr("data-index");
    $("#step .sl_step").each(function(i,e) {
        var index = $(this).attr("data-index");
        if(parseInt(index) > parseInt(thisIndex))
        {
          $('#stepcom'+index+'').val(thisVal); 
        }
    }); 
}

</script>