
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
<?
  $lv = sql_escape_str($_GET["level"]);
  $id = ($_GET['id'] == "") ? " " :  sql_escape_str($_GET["id"]);
                    
  if($id== "" || $lv == "") // gt level1
  {
    $lv = 1;
    $sql = "SELECT * FROM `bom_tb_agent` WHERE 1 and r_level = $lv";
    $re=sql_query($sql);



  }
  else  
  {
    $sql= "select r_id , r_agent_id , r_user ,r_level from bom_tb_agent where r_id = '".$id."' and r_level = '".$lv."' ";
    $re_agent=sql_array($sql);

    $r_agent_id = $re_agent["r_agent_id"].$re_agent["r_id"]."*";
    $lv = intval($re_agent["r_level"])+1;

    // ดึง agent;
    $sql= "select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_level=".$lv."";
    $re=sql_query($sql);

    // ดึง member
    $sql= "select * from bom_tb_member where  m_agent_id like '%$r_agent_id%' and m_level=".$lv."";
    $re_m=sql_query($sql);
  }
?>
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
                  <span class="panal_list arrowed-in">
                     <?=$icon;?> <?=$ex_h_2[1];?> 
                  </span>
                </a>    
                <?

              }

           }
       ?>
      
      </span> 

     
     
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">

      <div class="row">

        <div class="col-md-2 col-sm-12 col-xs-12 mb-1">
           <input type="text" name="q" placeholder="Search" id="SearchUser" class="form-control" value="<?=$_GET[q];?>">
         </div>
      
         <div class="col-md-2 col-sm-12 col-xs-12 mb-1">
           <button type="submit" class="btn btn1 btn-primary billSearch-btn" onclick="getData();">
             <span class="glyphicon glyphicon-search"></span>ค้นหา
           </button>
         </div>
          
        <div class="col-md-8 col-sm-12 col-xs-12 mb-1">
          <button type="button" class="btn btn-block btn-primary pull-right" style="width: 120px;" onclick="javascript:history.go(-1)">
            <i class="fa fa-chevron-left" style="font-size: 14px; margin-right: 10px;"></i> ย้อนกลับ
         </button>
         </div>
      </div>

      <table class="table table-bordered table-hover" id="table_data1">
              <thead>
                <tr>
                  <th class="vaign_m" rowspan="2" width="10%">ชื่อผู้ใช้</th>
                  <th class="vaign_m" rowspan="2" width="10%">ยอดเล่น</th>
                  <th class="vaign_m" colspan="3" width="30%">เอเย่น</th>
                  <th class="vaign_m" colspan="3" width="30%">เว็บไซต์</th>
                </tr>
                <tr>
                  <th class="vaign_m">ได้-เสีย</th>
                  <th class="vaign_m">ส่วนลด</th>
                  <th class="vaign_m">รวม</th>
                  <th class="vaign_m">ได้-เสีย</th>
                  <th class="vaign_m">ส่วนลด</th>
                  <th class="vaign_m">รวม</th>
                </tr>
              </thead>
              <tbody id="load_data">
                 
             </tbody>
      </table>

    <!--   <div id="pagination">
      </div> -->


    </div>
    <!-- /.box-body -->
  </div>
</section>
    <!-- /.content -->

<script>
   $('#table_data').DataTable({'ordering'    : false,})


   getData();

   function getData(page = 1)
   {
      var rowPerPage = 2000;

      $.ajax({
        url: 'inc/outstanding/get_outstanding_user.php',
        type: 'POST',
        dataType: 'json',
        data: {
            thisPage: page,
            rowPerPage: rowPerPage,
            // d: '<?=$_GET["d"];?>',
            // e: '<?=$_GET["e"];?>',
            h: '<?=$_GET["h"];?>',
            level: '<?=$_GET["level"];?>',
            id: '<?=$_GET["id"];?>',
            b: '<?=$_GET["b"];?>',
            q: $("#SearchUser").val(),
          },
      })
      .done(function(res) {
        $("#load_data").text("").append(res.list);
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