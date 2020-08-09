<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?


include('inc_head.php');

if($_GET[ac]=="del"){
    $sql="delete from bom_tb_news where n_id='$_GET[id]'";
    sql_query($sql);
  
 
  for($x=1;$x<=count($sport_type);$x++){
    ####################################
      $js1=array();
      $url_file1="../json/news/football_$x.json";  
      $sql=sql_query("select * from bom_tb_news where b_zone = 1 and b_sport=$x  order by n_id desc limit 100");
     while($rs=sql_fetch($sql)){ 
        $js1[]=array("n_id"=>"".$rs["n_id"]."","n_date"=>"".$rs["n_date"]."","n_note_en"=>"".$rs["n_note_en"]."","n_note_th"=>"".$rs["n_note_th"]."","n_note_cn"=>"".$rs["n_note_cn"]."","n_type"=>"".$rs["n_type"]."","b_sport"=>"".$rs["b_sport"]."");
    }
    ####################################    
    $txt1=json_encode($js1);
    write($url_file1 ,$txt1,"w+"); 
    ####################################
  }



  ######################ALL
  ####################################
  $js1=array();
  $url_file1="../json/news/football.json"; 
   $sql=sql_query("select * from bom_tb_news where b_zone = 1  order by n_id desc limit 100");
  while($rs=sql_fetch($sql)){ 
  $js1[]=array("n_id"=>"".$rs["n_id"]."","n_date"=>"".$rs["n_date"]."","n_note_en"=>"".$rs["n_note_en"]."","n_note_th"=>"".$rs["n_note_th"]."","n_note_cn"=>"".$rs["n_note_cn"]."","n_type"=>"".$rs["n_type"]."","b_sport"=>"".$rs["b_sport"]."");
  }
  ####################################    
  $txt1=json_encode($js1);
  write($url_file1 ,$txt1,"w+"); 
  ####################################
  
  $js1=array();
  $url_file1="../json/news/lotto.json";  
   $sql=sql_query("select * from bom_tb_news where b_zone = 2  order by n_id desc limit 100");
  while($rs=sql_fetch($sql)){ 
  $js1[]=array("n_id"=>"".$rs["n_id"]."","n_date"=>"".$rs["n_date"]."","n_note_en"=>"".$rs["n_note_en"]."","n_note_th"=>"".$rs["n_note_th"]."","n_note_cn"=>"".$rs["n_note_cn"]."","n_type"=>"".$rs["n_type"]."","b_sport"=>"".$rs["b_sport"]."");
  }
  ####################################    
  $txt1=json_encode($js1);
  write($url_file1 ,$txt1,"w+"); 
  
  ####################################
  $js1=array();
  $url_file1="../json/news/games.json";  
   $sql=sql_query("select * from bom_tb_news where b_zone = 3  order by n_id desc limit 100");
  while($rs=sql_fetch($sql)){ 
  $js1[]=array("n_id"=>"".$rs["n_id"]."","n_date"=>"".$rs["n_date"]."","n_note_en"=>"".$rs["n_note_en"]."","n_note_th"=>"".$rs["n_note_th"]."","n_note_cn"=>"".$rs["n_note_cn"]."","n_type"=>"".$rs["n_type"]."","b_sport"=>"".$rs["b_sport"]."");
  }
  ####################################    
  $txt1=json_encode($js1);
  write($url_file1 ,$txt1,"w+"); 
  
  ####################################
  $js1=array();
  $url_file1="../json/news/casino.json"; 
   $sql=sql_query("select * from bom_tb_news where b_zone = 4  order by n_id desc limit 100");
  while($rs=sql_fetch($sql)){ 
  $js1[]=array("n_id"=>"".$rs["n_id"]."","n_date"=>"".$rs["n_date"]."","n_note_en"=>"".$rs["n_note_en"]."","n_note_th"=>"".$rs["n_note_th"]."","n_note_cn"=>"".$rs["n_note_cn"]."","n_type"=>"".$rs["n_type"]."","b_sport"=>"".$rs["b_sport"]."");
  }
  ####################################    
  $txt1=json_encode($js1);
  write($url_file1 ,$txt1,"w+"); 
  
  header("Location: main.php?p=MessageList&g_p=MessageList");
}


if(isset($_POST[b_add])){
  $_POST[tnews]=trim($_POST[tnews]);
   $_POST[tnewsth]=trim($_POST[tnewsth]);
    $_POST[tnewscn]=trim($_POST[tnewscn]);
  if($_POST[tzone] != 1){
    $_POST[tsport] = 1;
  }

  $_POST[tnews] =  sql_escape_str($_POST[tnews]);
  $_POST[tnewsth] =sql_escape_str($_POST[tnewsth]);
  $_POST[tnewscn] =sql_escape_str($_POST[tnewscn]);
  $_POST[tsport] = sql_escape_str($_POST[tsport]);
  $_POST[ttype] =  sql_escape_str($_POST[ttype]);
  $_POST[tzone] =  sql_escape_str($_POST[tzone]);
  $_POST[msg_id] = sql_escape_str($_POST[msg_id]);

  $sql="INSERT IGNORE INTO bom_tb_news (n_date, n_note_en, n_note_th, n_note_cn  ,b_sport, n_type,b_zone) values(now(),'$_POST[tnews]','$_POST[tnewsth]','$_POST[tnewscn]','$_POST[tsport]','$_POST[ttype]','$_POST[tzone]')";

  sql_query($sql);
  
  for($x=1;$x<=count($sport_type);$x++){
  ####################################
  $js1=array();
  $url_file1="../json/news/football_$x.json";  
   $sql=sql_query("select * from bom_tb_news where b_zone = 1 and b_sport=$x  order by n_id desc limit 100");
  while($rs=sql_fetch($sql)){ 
  $js1[]=array("n_id"=>"".$rs["n_id"]."","n_date"=>"".$rs["n_date"]."","n_note_en"=>"".$rs["n_note_en"]."","n_note_th"=>"".$rs["n_note_th"]."","n_note_cn"=>"".$rs["n_note_cn"]."","n_type"=>"".$rs["n_type"]."","b_sport"=>"".$rs["b_sport"  ]."");
  }
  ####################################    
  $txt1=json_encode($js1);
  write($url_file1 ,$txt1,"w+"); 
  ####################################
  
  }
  
  ######################ALL
  ####################################
  $js1=array();
  $url_file1="../json/news/football.json"; 
   $sql=sql_query("select * from bom_tb_news where b_zone = 1  order by n_id desc limit 100");
  while($rs=sql_fetch($sql)){ 
  $js1[]=array("n_id"=>"".$rs["n_id"]."","n_date"=>"".$rs["n_date"]."","n_note_en"=>"".$rs["n_note_en"]."","n_note_th"=>"".$rs["n_note_th"]."","n_note_cn"=>"".$rs["n_note_cn"]."","n_type"=>"".$rs["n_type"]."","b_sport"=>"".$rs["b_sport"  ]."");
  }
  ####################################    
  $txt1=json_encode($js1);
  write($url_file1 ,$txt1,"w+"); 

  ####################################
  
  $js1=array();
  $url_file1="../json/news/lotto.json";  
   $sql=sql_query("select * from bom_tb_news where b_zone = 2  order by n_id desc limit 100");
  while($rs=sql_fetch($sql)){ 
  $js1[]=array("n_id"=>"".$rs["n_id"]."","n_date"=>"".$rs["n_date"]."","n_note_en"=>"".$rs["n_note_en"]."","n_note_th"=>"".$rs["n_note_th"]."","n_note_cn"=>"".$rs["n_note_cn"]."","n_type"=>"".$rs["n_type"]."","b_sport"=>"".$rs["b_sport"  ]."");
  }
  ####################################    
  $txt1=json_encode($js1);
  write($url_file1 ,$txt1,"w+"); 
  
  ####################################
  $js1=array();
  $url_file1="../json/news/games.json";  
   $sql=sql_query("select * from bom_tb_news where b_zone = 3  order by n_id desc limit 100");
  while($rs=sql_fetch($sql)){ 
  $js1[]=array("n_id"=>"".$rs["n_id"]."","n_date"=>"".$rs["n_date"]."","n_note_en"=>"".$rs["n_note_en"]."","n_note_th"=>"".$rs["n_note_th"]."","n_note_cn"=>"".$rs["n_note_cn"]."","n_type"=>"".$rs["n_type"]."","b_sport"=>"".$rs["b_sport"  ]."");
  }
  ####################################    
  $txt1=json_encode($js1);
  write($url_file1 ,$txt1,"w+"); 
  
  ####################################
  $js1=array();
  $url_file1="../json/news/casino.json"; 
   $sql=sql_query("select * from bom_tb_news where b_zone = 4  order by n_id desc limit 100");
  while($rs=sql_fetch($sql)){ 
  $js1[]=array("n_id"=>"".$rs["n_id"]."","n_date"=>"".$rs["n_date"]."","n_note_en"=>"".$rs["n_note_en"]."","n_note_th"=>"".$rs["n_note_th"]."","n_note_cn"=>"".$rs["n_note_cn"]."","n_type"=>"".$rs["n_type"]."","b_sport"=>"".$rs["b_sport"  ]."");
  }
  ####################################    
  $txt1=json_encode($js1);
  write($url_file1 ,$txt1,"w+"); 
  header("Location: main.php?p=MessageList&g_p=MessageList");
}


if(isset($_POST[b_update])){
  $_POST[tnews]=trim($_POST[tnews]);
   $_POST[tnewsth]=trim($_POST[tnewsth]);
    $_POST[tnewscn]=trim($_POST[tnewscn]);
  if($_POST[tzone] != 1){
    $_POST[tsport] = 1;
  }

  $_POST[tnews] =  sql_escape_str($_POST[tnews]);
  $_POST[tnewsth] =sql_escape_str($_POST[tnewsth]);
  $_POST[tnewscn] =sql_escape_str($_POST[tnewscn]);
  $_POST[tsport] = sql_escape_str($_POST[tsport]);
  $_POST[ttype] =  sql_escape_str($_POST[ttype]);
  $_POST[tzone] =  sql_escape_str($_POST[tzone]);
  $_POST[msg_id] = sql_escape_str($_POST[msg_id]);

  $sql="UPDATE bom_tb_news SET n_date = now(), n_note_en = '$_POST[tnews]', n_note_th = '$_POST[tnewsth]', n_note_cn = '$_POST[tnewscn]', b_sport = '$_POST[tsport]', n_type = '$_POST[ttype]', b_zone = '$_POST[tzone]' WHERE n_id = '$_POST[msg_id]'";

  $s = sql_query($sql);
  
  for($x=1;$x<=count($sport_type);$x++){
  ####################################
  $js1=array();
  $url_file1="../json/news/football_$x.json";  
   $sql=sql_query("select * from bom_tb_news where b_zone = 1 and b_sport=$x  order by n_id desc limit 100");
  while($rs=sql_fetch($sql)){ 
  $js1[]=array("n_id"=>"".$rs["n_id"]."","n_date"=>"".$rs["n_date"]."","n_note_en"=>"".$rs["n_note_en"]."","n_note_th"=>"".$rs["n_note_th"]."","n_note_cn"=>"".$rs["n_note_cn"]."","n_type"=>"".$rs["n_type"]."","b_sport"=>"".$rs["b_sport"  ]."");
  }
  ####################################    
  $txt1=json_encode($js1);
  write($url_file1 ,$txt1,"w+"); 
  ####################################
  
  }
  
  ######################ALL
  ####################################
  $js1=array();
  $url_file1="../json/news/football.json"; 
   $sql=sql_query("select * from bom_tb_news where b_zone = 1  order by n_id desc limit 100");
  while($rs=sql_fetch($sql)){ 
  $js1[]=array("n_id"=>"".$rs["n_id"]."","n_date"=>"".$rs["n_date"]."","n_note_en"=>"".$rs["n_note_en"]."","n_note_th"=>"".$rs["n_note_th"]."","n_note_cn"=>"".$rs["n_note_cn"]."","n_type"=>"".$rs["n_type"]."","b_sport"=>"".$rs["b_sport"  ]."");
  }
  ####################################    
  $txt1=json_encode($js1);
  write($url_file1 ,$txt1,"w+"); 

  ####################################
  
  $js1=array();
  $url_file1="../json/news/lotto.json";  
   $sql=sql_query("select * from bom_tb_news where b_zone = 2  order by n_id desc limit 100");
  while($rs=sql_fetch($sql)){ 
  $js1[]=array("n_id"=>"".$rs["n_id"]."","n_date"=>"".$rs["n_date"]."","n_note_en"=>"".$rs["n_note_en"]."","n_note_th"=>"".$rs["n_note_th"]."","n_note_cn"=>"".$rs["n_note_cn"]."","n_type"=>"".$rs["n_type"]."","b_sport"=>"".$rs["b_sport"  ]."");
  }
  ####################################    
  $txt1=json_encode($js1);
  write($url_file1 ,$txt1,"w+"); 
  
  ####################################
  $js1=array();
  $url_file1="../json/news/games.json";  
   $sql=sql_query("select * from bom_tb_news where b_zone = 3  order by n_id desc limit 100");
  while($rs=sql_fetch($sql)){ 
  $js1[]=array("n_id"=>"".$rs["n_id"]."","n_date"=>"".$rs["n_date"]."","n_note_en"=>"".$rs["n_note_en"]."","n_note_th"=>"".$rs["n_note_th"]."","n_note_cn"=>"".$rs["n_note_cn"]."","n_type"=>"".$rs["n_type"]."","b_sport"=>"".$rs["b_sport"  ]."");
  }
  ####################################    
  $txt1=json_encode($js1);
  write($url_file1 ,$txt1,"w+"); 
  
  ####################################
  $js1=array();
  $url_file1="../json/news/casino.json"; 
   $sql=sql_query("select * from bom_tb_news where b_zone = 4  order by n_id desc limit 100");
  while($rs=sql_fetch($sql)){ 
  $js1[]=array("n_id"=>"".$rs["n_id"]."","n_date"=>"".$rs["n_date"]."","n_note_en"=>"".$rs["n_note_en"]."","n_note_th"=>"".$rs["n_note_th"]."","n_note_cn"=>"".$rs["n_note_cn"]."","n_type"=>"".$rs["n_type"]."","b_sport"=>"".$rs["b_sport"  ]."");
  }
  ####################################    
  $txt1=json_encode($js1);
  write($url_file1 ,$txt1,"w+"); 

  // header("Location: main.php?p=MessageList&g_p=MessageList");
}

?>



 <!-- Content Header (Page header) -->


    <section class="content-header">
      <h1>
        สร้างข้อความ
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li class="active">สร้างข้อความ</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">

  <div class="col-xs-12">
        
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">เพิ่มข้อความ</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="mainform" action="" method="post" onsubmit="return confirm('คุณต้องการบันทึกข้อความนี้หรือไม่?');">
              <div class="box-body">
                <div class="form-group">
                    <div class="col-sm-6">
                       <label>โซน</label>
                       <select class="form-control" name="tzone" id="tzone">
                        <? for($x=1;$x<=count($m_news);$x++){?>
                          <option value="<?=$x;?>" <? if($_POST[tzone]==$x){echo'selected';}?>><?=$m_news[$x];?></option>
                         <? }?>
                       </select>
                     </div>
                     <div class="col-sm-6">
                       <label>ประเภท</label>
                       <select class="form-control" name="ttype" id="ttype">
                         <? for($x=1;$x<=count($n_news);$x++){?>
                            <option value="<?=$x;?>" <? if($_POST[ttype]==$x){echo'selected';}?>><?=$n_news[$x];?></option>
                         <? }?>
                       </select>

                       <!-- <span id="hh" style="display: none;">
                         กีฬา:<select name="tsport" id="tsport">
                         <? for($x=1;$x<=count($sport_type);$x++){?>
                           <option value="<?=$x;?>"  <? if($_POST[tsport]==$x){echo'selected';}?>><?=$sport_type[$x];?></option>
                           <? }?>
                         </select>
                      </span> -->
                     </div> 

                     <div class="col-sm-6" id="zone_sport" style="display: none;">
                       <label>กีฬา</label>
                       <select class="form-control" name="tsport" id="tsport">
                         <? for($x=1;$x<=count($arr_sp_zone);$x++){?>
                            <option value="<?=$x;?>" <? if($_POST[tsport]==$x){echo'selected';}?>><?=$arr_sp_zone[$x];?></option>
                         <? }?>
                       </select>
                     </div>

                     <div class="col-sm-12">
                        <label>ข้อความ EN</label>
                        <textarea class="form-control" name="tnews" id="tnews" rows="3"  placeholder="ข้อความ ..." required=""></textarea>
                     </div>
                        <div class="col-sm-12">
                        <label>ข้อความ TH</label>
                        <textarea class="form-control" name="tnewsth" id="tnewsth" rows="3"  placeholder="ข้อความ ..." required=""></textarea>
                     </div>
                          <div class="col-sm-12">
                        <label>ข้อความ CN</label>
                        <textarea class="form-control" name="tnewscn" id="tnewscn" rows="3"  placeholder="ข้อความ ..." required=""></textarea>
                     </div>
                </div>              
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" name="b_add" id="b_add">บันทึก</button>
              </div>
              <!-- /.box-footer -->
              <input type="hidden" name="msg_id" id="msg_id" />
            </form>
          </div>

      </div>
      
      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">รายการข้อความ</h3>
            <div class="box-body table-responsive">
              <table id="messageList_data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>วันที่</th>
                  <th>โซน</th>
                  <th>กีฬา</th>
                  <th width="50%">ข่าว</th>
                  <th>ประเภทข้อความ</th>
                  <th style="text-align: center;" >ลบ</th>
                </tr>
                </thead>
                <tbody>

                  <?php 
                  /*
                    for($i = 1; $i <0; $i++)
                    {
                      ?>
                      <tr>
                        <td>183</td>
                        <td>11-7-2014</td>
                        <td></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        <td><span class="label label-success">Approved</span></td>
                        <td align="center">
                          <a href="?p=MessageList&g_p=MessageList&amp;ac=del&amp;id=35"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                      <?
                    }
*/
                   ?>
                </tbody>
               
              </table>
            </div>
           
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>


    </div>
  
    
    


    </section>
    <!-- /.content -->


<script>

  get_data();

  function get_data()
  {
    let search = $("#search").val();
    var table = $("#messageList_data tbody");
    $.ajax({
      url: 'inc/get_data/get_MessageList.php',
      type: 'POST',
      dataType: 'json',
      data: {q: search},
    })
    .done(function(res) {
        // let table_html = loadTable(res);
        table.empty();
         $.each(res, function (key, value) {
                table.append("<tr class='msg_row' data-nkey=\""+value.n_id+"\" data-nsport=\""+value.n_sport+"\">"+
                    "<td>"+(key+1)+"</td>" +
                    "<td>"+value.n_date+"</td>"+
                    "<td data-n_zone=\""+value.n_zone+"\">" + value.n_zone_text + "</td>" +
                    "<td data-nsport=\""+value.n_sport+"\">" + value.n_sport_text + "</td>" +
                    "<td data-n_note_th=\""+escapeHtml(value.n_note_th)+"\" data-n_note_cn=\""+escapeHtml(value.n_note_cn)+"\">" + value.n_note_en + "</td>" +
                    "<td>" + value.n_type + "</td>" +
                    "<td align=\"center\" class=\"del_cell\">" + value.n_del + "</td>" +
                   "</tr>");
        });

        $('#messageList_data').DataTable({"pageLength": 50})

    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
  }

  $(document).on('click', '.msg_row > td:not(.del_cell)', function(event){
    event.preventDefault();
    $('#b_update, #b_reset, #b_add').remove();
    
    var row = $(this).parent('tr')[0];
    var cell = $(row).find('td'); 
    var id =   row.dataset.nkey;
    var zone = cell[2].dataset.n_zone;;
    var type = cell[5].innerText;
    var sport = row.dataset.nsport;
    var msg_en =  cell[4].innerText;
    var msg_th =  cell[4].dataset.n_note_th;
    var msg_cn =  cell[4].dataset.n_note_cn; 
    // if(zone != 1){
    //   $('#zone_sport').hide();
    // }else{
    //   $('#zone_sport').show();
    // }

    $('#msg_id').val(id);
    $('#tnews').val(msg_en);
    $('#tnewsth').val(msg_th);
    $('#tnewscn').val(msg_cn);
    $('#tzone').val(zone);
    var typeVal = $('#ttype option').filter(function () { return $(this).html() == type; }).val();
    $('#ttype').val(typeVal);
    $('#tsport').val(sport);
    $('#tzone').trigger('change');
    
    var updateBtn = document.createElement('button');
    updateBtn.type = 'submit';
    updateBtn.id = 'b_update';
    updateBtn.name = 'b_update';
    updateBtn.className = 'btn btn-info pull-right';
    updateBtn.innerText = 'แก้ไข';

    var cancelUpdateBtn = document.createElement('button');
    cancelUpdateBtn.type = 'reset';
    cancelUpdateBtn.id = 'b_reset';
    cancelUpdateBtn.name = 'b_reset';
    cancelUpdateBtn.className = 'btn btn-info pull-right';
    cancelUpdateBtn.innerText = 'ยกเลิก';
    cancelUpdateBtn.onclick = function(){resetMsgForm()};
    cancelUpdateBtn.style = 'margin-right: 5px';

    $('.box-footer').append(updateBtn);
    $('.box-footer').append(cancelUpdateBtn);

    $([document.documentElement, document.body]).animate({
      scrollTop: $("#mainform").offset().top
    }, 200);
    $('#tnews').focus();
  });

  function resetMsgForm(){
    $('#b_update, #b_reset, #b_add').remove();
    $('#ttype').val('');
    document.getElementById('mainform').reset();
    var addBtn = document.createElement('button');
    addBtn.type = 'submit';
    addBtn.id = 'b_add';
    addBtn.name = 'b_add';
    addBtn.className = 'btn btn-info pull-right';
    addBtn.innerText = 'บันทึก';
    $('.box-footer').append(addBtn);
  }

  $(document).on('change', '#tzone', function(event) {
    event.preventDefault();
    if($(this).val() == 1){
      $('#zone_sport').show();
    }else{
      $('#zone_sport').hide();
    }
  });
  $('#tzone').trigger('change');
</script>

