<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    ยอดเล่นค้าง
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
    <li><a href="#"><i class="fa fa-file-text"></i> บิล</a></li>
    <li class="active">ยอดเล่นค้าง</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">      
    <div class="box-header">
      <h3 class="box-title">รายการยอดเล่นค้าง</h3>

      <span id="panal"> 

      <?php 
           $h = $_GET['h'];
           $ex_h_1 = explode("|", $h);
           $h_echo = "";

           foreach ($ex_h_1 as $key => $value) {
              $h_echo .= $value."|";
              if($key == 0)
              {
                ?>
                <a href="?p=outstanding&g_p=bill">
                  <span class="panal_list">
                     <?=$bet_type[$value];?>   
                  </span>
                </a> 
                <?
              }else{

                $ex_h_2 = explode("^", $value);
                
                if($ex_h_2[3] == "A")
                {
                  $icon = "<i class=\"fa fa-user-secret\"></i>";
                  $path = "?p=outstanding_user&g_p=bill";
                }else{
                  $icon = "<i class=\"fa fa-user\"></i>";
                  $path = "?p=outstandingM&g_p=bill";
                }

                ?>
                <a href="<?=$path;?>&level=<?=$ex_h_2[0];?>&id=<?=$ex_h_2[2];?>&b=<?=$ex_h_1[0];?>&h=<?=substr($h_echo, 0, -1);?>">
                  <span class="panal_list arrowed-in ">
                     <?=$icon;?> <?=$ex_h_2[1];?>   
                  </span>
                </a>  
                <?

              }

           }
       ?>
      
      </span> 
     
      <button type="button" class="btn btn-block btn-primary pull-right" style="width: 120px;" onclick="javascript:history.go(-1)">
        <i class="fa fa-chevron-left" style="font-size: 14px; margin-right: 10px;"></i> ย้อนกลับ
      </button>
      
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <?php

          $mid = $_GET["id"];
          $sql       = "select m_id , m_agent_id , m_user , m_name ,m_level from bom_tb_member where  m_id='" . $mid . "'";
          $re_member = sql_array($sql);

          include "outstanding/outstanding_byMember_".$_GET["b"].".php";
      ?>
    </div>
            <!-- /.box-body -->
  </div>

</section>
<!-- /.content -->

<script>
   $('#table_data').DataTable({'ordering'    : false,})
</script>