<?
  ob_start(); if (!isset($_SESSION)) { session_start(); }
  if($_SESSION["AGlang"]=="")
  {
    $_SESSION["AGlang"]="th";
  }

  $sql = "select * from bom_tb_config where con_id = '1'";
  $re_config = sql_array($sql);
  $re_config_sp = sql_array_sp($sql);
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    ควบคุมระบบ
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
    <li class="active">ควบคุมระบบ</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
	<style>
		.content .row .mb
		{
			margin-bottom: 10px;
      padding: 0 5px;

		}
    .bg-w
    {
      background-color: #fff;
      width: 100%;
      float: right;
    }
    .checkbox, .radio
    {
      margin: 0 10px;
    }
	</style>
  <!-- start row -->
  <div class="row">
    <div class="col-sm-12" style="margin: 15px 0;">
      <div class="mb col-sm-3">
        <!-- <input type="button" value="[1].รีข้อมูล" class="btn btn-block btn-primary" onclick="_w_control('http://173.212.207.198/~steppro/livezx/re.php?d=<?=$view_date;?>');" > -->
        <input type="button" value="[1].รีข้อมูล" class="btn btn-block btn-primary" onclick="_o('<?=$x_process;?>sport_process/re.php?d=<?=$view_date;?>');" >
      </div>
      <div class="mb col-sm-3">
        <!-- <input type="button" value="[3].ยกเลิกบอล+เวลาผิด" class="btn btn-block btn-primary" onclick="_w_control('http://173.212.207.198/~steppro/livezx/not.php');"> -->
        <input type="button" value="[3].ยกเลิกบอล+เวลาผิด" class="btn btn-block btn-primary" onclick="_w_control('inc/not.php');">
      </div>
      <div class="mb col-sm-3">
        <!-- <input type="button" value="[4].สร้างรหัส" class="btn btn-block btn-primary"  onclick="_w_control('?p=code');"> -->
        <input type="button" value="[4].สร้างรหัสใหม่หมด" class="btn btn-block btn-primary"  onclick="_w_control('inc/code.php');">
      </div>
      <div class="mb col-sm-3"> 
        <!-- <input type="button" value="10. โปรแกรมรีโมท" class="btn btn-block btn-primary" onclick="_o('https://download.teamviewer.com/download/TeamViewer_Setup_th-tcw.exe');" > -->
        <input type="button" value="10. Return Lothun" class="btn btn-block btn-primary" onclick="_o('<?=$x_process;?>lotto/process_hun_re.php');" >
      </div>
      <div class="mb col-sm-3">
        <!--  <input type="button" value="[2].Reject" class="btn btn-block btn-primary" onclick="_w_control('http://173.212.207.198/~steppro/livezx/reject.php');" > -->
        <input type="button" value="[2].Reject" class="btn btn-block btn-primary" onclick="_w_control('inc/reject.php');" >
      </div>
      <div class="mb col-sm-3">
        <!-- <input type="button" value="[4].Reject Return" class="btn btn-block btn-primary" onclick="_w_control('http://173.212.207.198/~steppro/livezx/reject_return.php');"> -->
        <input type="button" value="[4].Reject Return" class="btn btn-block btn-primary" onclick="_w_control('inc/reject_return.php');">
      </div>
      <div class="mb col-sm-3">
        <!-- <input type="button" value="[4].สร้างรหัส+ไม่มีเลข" class="btn btn-block btn-primary" onclick="_w_control('?p=code_not');"> -->
        <input type="button" value="[4].สร้างรหัส+ไม่มีเลข" class="btn btn-block btn-primary" onclick="_w_control('inc/code_not.php');">
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-12" style="margin: 15px 0;">
      <div class="mb col-sm-3">
        <input type="button" value="Reboot 220" class="btn btn-block btn-primary" onclick="_w_control('inc/reboot.php?ip=220');" >
      </div>
      <div class="mb col-sm-3">
        <input type="button" value="Reboot 221" class="btn btn-block btn-primary" onclick="_w_control('inc/reboot.php?ip=221');">
      </div>
      <div class="mb col-sm-3">
        <input type="button" value="Start Node" class="btn btn-block btn-success"  onclick="_w_control('inc/node.php?t=start');">
      </div>
      <div class="mb col-sm-3"> 
        <input type="button" value="Stop Node" class="btn btn-block btn-danger" onclick="_w_control('inc/node.php?t=stop');" >
      </div>
    </div>
  </div>


  <!-- end row -->

  <!-- start row -->
  <div class="row">
    <div class="col-sm-12">
      <!-- general form elements -->
      <div class="box box-primary col-sm-6">
        <div class="box-header with-border">
          <h3 class="box-title">Server IP</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table table-bordered table-hover">
            <tbody>
              <tr>
                <th>IP Address</th>
                <th style="text-align: center;">ลบ</th>
              </tr>
              <tr>
                <td>207.180.201.36</td>
                <td align="center">
                  <a href="?p=control&g_p=control&ac=delip&id=35"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
              <tr>
                <td>207.180.206.85</td>
                <td align="center">
                  <a href="?p=control&g_p=control&ac=delip&id=35"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
              <tr>
                <td>207.180.243.69</td>
                <td align="center">
                  <a href="?p=control&g_p=control&ac=delip&id=35"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
              <tr>
                <td>173.249.1.168</td>
                <td align="center">
                  <a href="?p=control&g_p=control&ac=delip&id=35"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- form start -->
        <form role="form" method="post" action="">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">หมายเลขเลข IP Address</label>
              <input type="text" class="form-control" name="t_ip" placeholder="IP Address">
            </div>           
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" name="b_add" class="btn btn-primary">บันทึก</button>
          </div>
        </form>
      </div>
      <!-- /.box -->
    </div>

    <div class="col-sm-12">
      <div class="box box-primary col-sm-6">
        <div class="box-header with-border">
          <h3 class="box-title">ตั้งค่า [ +- ] ค่าน้ำ</h3>
        </div>
        <form role="form" method="post" action="">
          <div class="box-body">
            <div class="col-sm-6">
              <div class="box-body">
                <div class="form-group">
                  <label for="t_hdc">HDC = FT + 1H</label>
                  <select class="form-control" id="t_hdc" name="t_hdc">
                    <?php 
                      for($i=1; $i<=50; $i++)
                      {
                        ?>
                          <option value="<?=$i;?>"><?=$i;?></option>
                        <?
                      }
                    ?>
                  </select>
                </div> 
                <div class="form-group">
                  <label for="t_goal">GOAL = FT + 1H</label>
                  <select class="form-control" id="t_goal" name="t_goal">
                    <?php 
                      for($i=1; $i<=50; $i++)
                      {
                        ?>
                          <option value="<?=$i;?>"><?=$i;?></option>
                        <?
                      }
                      ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="t_1x2">1X2 = FT + 1H</label>
                  <select class="form-control" id="t_1x2" name="t_1x2">
                    <?php 
                      for($i=1; $i<=50; $i++)
                      {
                        ?>
                          <option value="<?=$i;?>"><?=$i;?></option>
                        <?
                      }
                      ?>
                  </select>
                </div>  
                <div class="form-group">
                  <label for="t_oe">Odd Even = FT</label>
                  <select class="form-control" id="t_oe" name="t_oe">
                    <?php 
                      for($i=1; $i<=50; $i++)
                      {
                        ?>
                          <option value="<?=$i;?>"><?=$i;?></option>
                        <?
                      }
                      ?>
                  </select>
                </div> 
                <div class="form-group">
                  <label for="t_max">แทงสูงสุดต่อคู่</label>
                  <input type="text" class="form-control" name="t_max" value="400000">
                </div>
                <div class="form-group">
                  <label for="t_ap">แทงสูงสุดต่อคู่</label>
                  <input type="text" class="form-control" name="t_ap" value="15">
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="t_max" >ครึ่งแรก 1H</label>
                    <div class="form-group">
                      <div class="radio" style="display: inline-block;">
                        <label>
                          <input type="radio" name="thf"  value="1" checked="">
                          เปิดปกติ
                        </label>
                      </div>
                      <div class="radio" style="display: inline-block;">
                        <label>
                          <input type="radio" name="thf" value="0">
                          ปิด
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="t_max" >ราคา 1X2</label>
                    <div class="form-group">
                      <div class="radio" style="display: inline-block;">
                        <label>
                          <input type="radio" name="t1x2"  value="1" checked="">
                          เปิดปกติ
                        </label>
                      </div>
                      <div class="radio" style="display: inline-block;">
                        <label>
                          <input type="radio" name="t1x2" value="0">
                          ปิด
                        </label>
                      </div>              
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="t_max" >ราคา คี่/คู่</label>
                    <div class="form-group">
                      <div class="radio" style="display: inline-block;">
                        <label>
                          <input type="radio" name="toe"  value="1" checked="">
                          เปิดปกติ
                        </label>
                      </div>
                      <div class="radio" style="display: inline-block;">
                        <label>
                          <input type="radio" name="toe" value="0">
                          ปิด
                        </label>
                      </div>              
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="t_max" >ราคา AFB cash</label>
                    <div class="form-group">
                      <div class="radio" style="display: inline-block;">
                        <label>
                          <input type="radio" name="tball"  value="1" checked="">
                          Home164
                        </label>
                      </div>
                      <div class="radio" style="display: inline-block;">
                        <label>
                          <input type="radio" name="tball" value="2">
                          Home164+ล้าง
                        </label>
                      </div>
                      <div class="radio" style="display: inline-block;">
                        <label>
                          <input type="radio" name="tball" value="3">
                          ISC2
                        </label>
                      </div>   
                      <div class="radio" style="display: inline-block;">
                        <label>
                          <input type="radio" name="tball" value="4">
                          ISC2+ล้าง
                        </label>
                      </div>   
                      <div class="radio" style="display: inline-block;">
                        <label>
                          <input type="radio" name="tball" value="5">
                          Server132
                        </label>
                      </div>   
                      <div class="radio" style="display: inline-block;">
                        <label>
                          <input type="radio" name="tball" value="6">
                          Server132+ล้าง
                        </label>
                      </div>   
                      <div class="radio" style="display: inline-block;">
                        <label>
                          <input type="radio" name="tball" value="0">
                          ปิด
                        </label>
                      </div>                 
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="t_max" >ราคา Live AFB cash</label>
                    <div class="form-group">
                      <div class="radio" style="display: inline-block;">
                        <label>
                          <input type="radio" name="tball2"  value="1" checked="">
                          Home164
                        </label>
                      </div>
                      <div class="radio" style="display: inline-block;">
                        <label>
                          <input type="radio" name="tball2" value="2">
                          Fifa55
                        </label>
                      </div>
                      <div class="radio" style="display: inline-block;">
                        <label>
                          <input type="radio" name="tball2" value="3">
                          ISC2
                        </label>
                      </div>   
                      <div class="radio" style="display: inline-block;">
                        <label>
                          <input type="radio" name="tball2" value="4">
                          Server132
                        </label>
                      </div>   
                      <div class="radio" style="display: inline-block;">
                        <label>
                          <input type="radio" name="tball2" value="5">
                          Json888
                        </label>
                      </div>   
                      <div class="radio" style="display: inline-block;">
                        <label>
                          <input type="radio" name="tball2" value="0">
                          ปิด
                        </label>
                      </div>                 
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="t_max" >รับตั๋ว AUTO</label>
                    <div class="form-group">
                      <div class="radio" style="display: inline-block;">
                        <label>
                          <input type="radio" name="taccept"  value="1" checked="">
                          เปิดปกติ
                        </label>
                      </div>
                      <div class="radio" style="display: inline-block;">
                        <label>
                          <input type="radio" name="taccept" value="0">
                          ปิด
                        </label>
                      </div>              
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="t_max" >ปิดปรับปรุงระบบ</label>
                    <div class="form-group">
                      <div class="radio" style="display: inline-block;">
                        <label>
                          <input type="radio" name="tser"  value="1" checked="">
                          เปิดปกติ
                        </label>
                      </div>
                      <div class="radio" style="display: inline-block; margin-bottom: 10px;">
                        <label>
                          <input type="radio" name="tser" value="0">
                          ปิด
                        </label>
                      </div> 
    
                      <input type="text" class="form-control" name="tservice" placeholder="ตัวอย่าง 00.00-12.00">             
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" name="b_add" class="btn btn-primary">บันทึก</button>
          </div>
        </form>
      </div>
    </div> 

    <div class="col-sm-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">ohoking_db | bom_tb_config</h3>
        </div>
        <form id="control_config_db_form" method="post" action="" onsubmit="return false;">
          <div class="box-body">
            <div class="col-sm-6">
              <div class="box-body">
                <div class="form-group">
                  <label>con_note</label>
                  <textarea name="con_note" class="form-control" rows="2" ><?=$re_config['con_note'];?></textarea>
                </div>
               <!--  <div class="form-group">
                  <label>con_open_lotto_hun_new</label>
                  <input name="con_open_lotto_hun_new" value="<?=$re_config['con_open_lotto_hun_new'];?>" type="text" class="form-control" readonly>
                </div> -->
              
                <div class="form-group">
                  <p><label>con_open_lotto_hun_new</label></p>
                  <?php 

                      $ex_con_open_lotto_hun_new = explode(",", $re_config['con_open_lotto_hun_new'] );
                      foreach ($lot_zone["th"]["zone"] as $key => $value) {
                        if($key <= 1)
                        {
                          continue;
                        }

                        $chk = ($ex_con_open_lotto_hun_new[$key] == 1) ? "checked" : "";

                        ?>
                          <div class="radio" style="display: inline-block; min-width: 130px;">
                            <label>
                              <input name="_con_open_lotto_hun_new_<?=$key;?>" type="checkbox" value="1" <?=$chk;?> >
                                <?=$value; ?>
                            </label>
                          </div>
                        <?
                      }
                         
                   ?>
                </div> 
                <div class="form-group">
                  <label>con_time_games</label>
                  <input name="con_time_games" value="<?=$re_config['con_time_games'];?>" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>con_id_games</label>
                  <input name="con_id_games" value="<?=$re_config['con_id_games'];?>" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>con_ser_note</label>
                  <textarea name="con_ser_note" class="form-control" rows="2"><?=$re_config['con_ser_note'];?></textarea>
                </div>
                <div class="form-group">
                  <label>con_end</label>
                  <input name="con_end" value="<?=$re_config['con_end'];?>" type="text" class="form-control">
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="box-body">
                <div class="form-group">
                  <label>con_service</label>
                  <div class="form-group">
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_service" type="radio" value="1" <?=($re_config['con_service'] == true) ? 'checked' : '';?>>
                        เปิดปกติ
                      </label>
                    </div>
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_service" type="radio" value="0" <?=($re_config['con_service'] != true) ? 'checked' : '';?>>
                        ปิด
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>con_open_lotto</label>
                  <div class="form-group">
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_open_lotto" type="radio" value="1" <?=($re_config['con_open_lotto'] == true) ? 'checked' : '';?>>
                        เปิดปกติ
                      </label>
                    </div>
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_open_lotto" type="radio" value="0" <?=($re_config['con_open_lotto'] != true) ? 'checked' : '';?>>
                        ปิด
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>con_open_lotto_hun</label>
                  <div class="form-group">
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_open_lotto_hun" type="radio" value="1" <?=($re_config['con_open_lotto_hun'] == true) ? 'checked' : '';?>>
                        เปิดปกติ
                      </label>
                    </div>
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_open_lotto_hun" type="radio" value="0" <?=($re_config['con_open_lotto_hun'] != true) ? 'checked' : '';?>>
                        ปิด
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>con_open_sport</label>
                  <div class="form-group">
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_open_sport" type="radio" value="1" <?=($re_config['con_open_sport'] == true) ? 'checked' : '';?>>
                        เปิดปกติ
                      </label>
                    </div>
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_open_sport" type="radio" value="0" <?=($re_config['con_open_sport'] != true) ? 'checked' : '';?>>
                        ปิด
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>con_open_casino</label>
                  <div class="form-group">
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_open_casino" type="radio" value="1" <?=($re_config['con_open_casino'] == true) ? 'checked' : '';?>>
                        เปิดปกติ
                      </label>
                    </div>
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_open_casino" type="radio" value="0" <?=($re_config['con_open_casino'] != true) ? 'checked' : '';?>>
                        ปิด
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>con_open_games</label>
                  <div class="form-group">
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_open_games" type="radio" value="1" <?=($re_config['con_open_games'] == true) ? 'checked' : '';?>>
                        เปิดปกติ
                      </label>
                    </div>
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_open_games" type="radio" value="0" <?=($re_config['con_open_games'] != true) ? 'checked' : '';?>>
                        ปิด
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>con_open_tranfer</label>
                  
                  <div class="form-group">
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_open_tranfer" type="radio" value="1" <?=($re_config['con_open_tranfer'] == true) ? 'checked' : '';?>>
                        เปิดปกติ
                      </label>
                    </div>
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_open_tranfer" type="radio" value="0" <?=($re_config['con_open_tranfer'] != true) ? 'checked' : '';?>>
                        ปิด
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>con_open_af</label>
                  
                  <div class="form-group">
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_open_af" type="radio" value="1" <?=($re_config['con_open_af'] == true) ? 'checked' : '';?>>
                        เปิดปกติ
                      </label>
                    </div>
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_open_af" type="radio" value="0" <?=($re_config['con_open_af'] != true) ? 'checked' : '';?>>
                        ปิด
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>con_live</label>
                  <div class="form-group">
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_live" type="radio" value="1" <?=($re_config['con_live'] == true) ? 'checked' : '';?>>
                        เปิดปกติ
                      </label>
                    </div>
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_live" type="radio" value="0" <?=($re_config['con_live'] != true) ? 'checked' : '';?>>
                        ปิด
                      </label>
                    </div>
                  </div>

                </div> 

                <div class="form-group">
                  <label>casino SA</label>
                  <div class="form-group">
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="casino_serv1" type="radio" value="1" <?=($re_config['casino_serv1'] == true) ? 'checked' : '';?>>
                        เปิดปกติ
                      </label>
                    </div>
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="casino_serv1" type="radio" value="0" <?=($re_config['casino_serv1'] != true) ? 'checked' : '';?>>
                        ปิด
                      </label>
                    </div>
                  </div>
                </div> 

                <div class="form-group">
                  <label>casino SEXY</label>
                  <div class="form-group">
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="casino_serv2" type="radio" value="1" <?=($re_config['casino_serv2'] == true) ? 'checked' : '';?>>
                        เปิดปกติ
                      </label>
                    </div>
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="casino_serv2" type="radio" value="0" <?=($re_config['casino_serv2'] != true) ? 'checked' : '';?>>
                        ปิด
                      </label>
                    </div>
                  </div>
                </div> 

                <div class="form-group">
                  <label>slot JOKER</label>
                  <div class="form-group">
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="casino_serv3" type="radio" value="1" <?=($re_config['casino_serv3'] == true) ? 'checked' : '';?>>
                        เปิดปกติ
                      </label>
                    </div>
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="casino_serv3" type="radio" value="0" <?=($re_config['casino_serv3'] != true) ? 'checked' : '';?>>
                        ปิด
                      </label>
                    </div>
                  </div>
                </div> 

                <div class="form-group">
                  <label>slot XO</label>
                  <div class="form-group">
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="casino_serv4" type="radio" value="1" <?=($re_config['casino_serv4'] == true) ? 'checked' : '';?>>
                        เปิดปกติ
                      </label>
                    </div>
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="casino_serv4" type="radio" value="0" <?=($re_config['casino_serv4'] != true) ? 'checked' : '';?>>
                        ปิด
                      </label>
                    </div>
                  </div>
                </div> 


              </div>              
            </div>              
            <div class="col-xs-12 col-sm-12">
              <div class="box-footer">
                <button onclick="submit_data()" type="submit" name="b_up" class="btn btn-primary">บันทึก</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="col-sm-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">ohoking_sp | bom_tb_config</h3>
        </div>
        <form id="control_config_sp_form" method="post" action="" onsubmit="return false;">
          <div class="box-body">
            <div class="col-sm-6">
              <div class="box-body">
                <div class="form-group">
                  <label>con_service</label>
                  <div class="form-group">
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_service" type="radio" value="1" <?=($re_config_sp['con_service'] == true) ? 'checked' : '';?>>
                        เปิดปกติ
                      </label>
                    </div>
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_service" type="radio" value="0" <?=($re_config_sp['con_service'] != true) ? 'checked' : '';?>>
                        ปิด
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>con_open_sport</label>
                  <div class="form-group">
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_open_sport" type="radio" value="1" <?=($re_config_sp['con_open_sport'] == true) ? 'checked' : '';?>>
                        เปิดปกติ
                      </label>
                    </div>
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_open_sport" type="radio" value="0" <?=($re_config_sp['con_open_sport'] != true) ? 'checked' : '';?>>
                        ปิด
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>con_live</label>
                  <div class="form-group">
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_live" type="radio" value="1" <?=($re_config_sp['con_live'] == true) ? 'checked' : '';?>>
                        เปิดปกติ
                      </label>
                    </div>
                    <div class="radio" style="display: inline-block;">
                      <label>
                        <input name="con_live" type="radio" value="0" <?=($re_config_sp['con_live'] != true) ? 'checked' : '';?>>
                        ปิด
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>c_number</label>
                  <input name="c_number" value="<?=$re_config_sp['c_number'];?>" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>con_muay_hide</label>
                  <input name="con_muay_hide" value="<?=$re_config_sp['con_muay_hide'];?>" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>con_acept_confirm</label>
                  <input name="con_acept_confirm" value="<?=$re_config_sp['con_acept_confirm'];?>" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>con_acept_running1</label>
                  <input name="con_acept_running1" value="<?=$re_config_sp['con_acept_running1'];?>" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>con_acept_running2</label>
                  <input name="con_acept_running2" value="<?=$re_config_sp['con_acept_running2'];?>" type="text" class="form-control">
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="box-body">
                <div class="form-group">
                  <label>con_acept_running3</label>
                  <input name="con_acept_running3" value="<?=$re_config_sp['con_acept_running3'];?>" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>con_soccer_close1h</label>
                  <input name="con_soccer_close1h" value="<?=$re_config_sp['con_soccer_close1h'];?>" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>con_soccer_close2h</label>
                  <input name="con_soccer_close2h" value="<?=$re_config_sp['con_soccer_close2h'];?>" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>con_step_close</label>
                  <input name="con_step_close" value="<?=$re_config_sp['con_step_close'];?>" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>con_step_hide</label>
                  <input name="con_step_hide" value="<?=$re_config_sp['con_step_hide'];?>" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>con_basket_closeq</label>
                  <input name="con_basket_closeq" value="<?=$re_config_sp['con_basket_closeq'];?>" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>con_basket_hide</label>
                  <input name="con_basket_hide" value="<?=$re_config_sp['con_basket_hide'];?>" type="text" class="form-control">
                </div>
              </div>              
            </div>              
            <div class="col-xs-12 col-sm-12">
              <div class="box-footer">
                <button onclick="submit_data_sp()" type="submit" name="b_up" class="btn btn-primary">บันทึก</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
  <!-- end row -->
</section>
<!-- /.content -->

<script>
function _w_control(url=null)
{
	if(url!=null)
	{
      $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        // data: {param1: 'value1'},
      })
      .done(function(res) {
        console.log("success");
        alert(res.message)
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
	}
}

function submit_data(type)
{
  var x = $("#control_config_db_form").serializeArray();
  $.ajax({
    url: 'inc/control_config_save_DB.php',
    type: 'POST',
    dataType: 'json',
    data: x,
  })
  .done(function(res) {
    console.log("success");
    if(res.status)
    {
      alert(res.msg);
      location.reload();
    }
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
}

function submit_data_sp(type)
{
  var x = $("#control_config_sp_form").serializeArray();
  $.ajax({
    url: 'inc/control_config_save_SP.php',
    type: 'POST',
    dataType: 'json',
    data: x,
  })
  .done(function(res) {
    console.log("success");
    if(res.status)
    {
      alert(res.msg);
      location.reload();
    }
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
}

</script>