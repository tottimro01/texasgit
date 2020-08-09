<?
   $e= $_GET["d"];  // วันที่เริ่มต้น
   $d= $_GET["e"];  // วันที่สิ้นสุด

     #####################DATE
$sdd=@explode("-",$e); 
$edate=$sdd[2].'-'.$sdd[1].'-'.$sdd[0]; 

$edd=@explode("-",$d); 
$ddate=$edd[2].'-'.$edd[1].'-'.$edd[0]; 
?>
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
          <input type="hidden" name="b" value="<?=$_GET[b];?>">
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
            <?php $chk = ($_GET["cb_" . $key] == 1) ? "checked" : "";?>
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
    $chk = ($_GET["chk_currency_" . $key] == 1) ? "checked" : "";
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
        $h      = $_GET['h'];
        $ex_h_1 = explode("|", $h);
        $h_echo = "";
        
        $count_ex_h_1 = count($ex_h_1);
        
        $c = 0;
        foreach ($ex_h_1 as $key => $value) {
        
            if ($value == $_GET["b"]) {
                $h_echo .= $value;
                ?>
            <a href="#">
               <span class="panal_list arrowed-in">
                 <?=$bet_type[$value];?> 
              </span>
            </a> 
              <?
        
            } else {
        
                $h_echo .= $value . "|";
        
                $ex_h_2 = explode("^", $value);
        
                if ($ex_h_2[3] == "A") {
                    $icon = "<i class=\"fa fa-user-secret\"></i>";
                    $path = "?p=winloss&g_p=winloss";
                } else {
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
              <span class="panal_list <?=($c != 0) ? "arrowed-in" : "";?>">
                 <?=$icon;?> <?=$ex_h_2[1];?> 
              </span>
             </a> 
              <?
                $c++;
            }
        
        }
        
  ?>

</div>

<?php

//1^b^78^A|2^bb^79^A|3^bbb^80^A|4^bbbb^81^A|5^bbbb0010^141^M|sc

$mid = $_GET["id"];

$sql       = "select m_id , m_agent_id , m_user , m_name ,m_level from bom_tb_member where  m_id='" . $mid . "'";
$re_member = sql_array($sql);

$ex_ulist = explode("|", $_GET["h"]);


$arr_winloss_user            = array();
$arr_winloss_user[0]["id"]   = $re_member["m_id"];
$arr_winloss_user[0]["user"] = $re_member["m_user"];

$x      = 1;


for ($i = 0; $i < (count($ex_ulist) - 2); $i++) {
    $ex_s = explode("^", $ex_ulist[$i]);

    $arr_winloss_user[$x]["id"]   = $ex_s[2];
    $arr_winloss_user[$x]["user"] = $ex_s[1];

    $x++;
}


include "winloss/winloss_byMember_" . $_GET["b"] . ".php";
?>

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

</script>