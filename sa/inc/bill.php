<?
  ob_start(); if (!isset($_SESSION)) { session_start(); }
  if($_SESSION["AGlang"]=="")
  {
    $_SESSION["AGlang"]="th";
  }

  if($_GET['d'] =="")
  {
    $_GET['d'] = $view_date;
  }

  if($_GET['page'] =="")
  {
    $_GET['page'] = 1;
  }

  if($_GET[ac]=="ac_last"){
		
			$sql="update bom_tb_football_bill_play_live set b_accept=1, b_status=5  where b_accept=3 and bill_id='$_GET[id]'  and play_status!=6  ";
			sql_query($sql);

			$sql="update bom_tb_football_bill_live set b_accept=1 where b_accept=3  and bill_id='$_GET[id]'";
			sql_query($sql);
	}


	if($_GET[ac]=="not"){
		$id=$_GET[id];	
		$sql="update bom_tb_football_bill_play_live set b_accept=2 where b_accept=3 and bill_id='$id'  ";
		sql_query($sql);

		#############STEP2
		$sql="select * from bom_tb_football_bill_live where  bill_id='$id' ";
		$re=sql_query($sql);
		
		while($rs=sql_fetch($re)){
	
				
				$sql="select * from  bom_tb_football_bill_live   where  bill_id='$rs[bill_id]' ";
				$lock=sql_array($sql);
				
				if($lock[b_accept]!=2){
					
					############## UPDATE
					$sql="update bom_tb_football_bill_live set b_accept=2 where b_accept=3 and bill_id='$rs[bill_id]' ";
					sql_query($sql);
					
					$sql="update bom_tb_member set m_count=m_count+ $rs[b_total]  where  m_id='$rs[m_id]' ";
					sql_query($sql);
					
					############################บัญชี
					$sql="select * from bom_tb_member where m_id='$rs[m_id]' ";
					$rec=sql_array($sql);
					
					$rec[r_id]=99998;
					
					$mtxt="SAคืนบิล";
					$q_count=$rs[b_total];
					$sum_count=$rec[m_count];
					$typeby=1;#ฝาก
					#$typeby=2;#ถอน
					$bill=$rs[bill_id];
					$sql="insert into bom_tb_databet_live (d_date	,bill_id	,m_id	,d_in	,d_sum, d_by,d_txt,r_agent_id) values (now(),'$bill','$rec[m_id]','$q_count','$sum_count','$typeby','$mtxt','$rec[r_id]');";
					sql_query($sql);
				############################บัญชี
				
				}
		}


	}


  if($_GET[ac]=="del"){

			$not=0;	
			$time_stopxxx=20000;
			$sql="select * from bom_tb_football_bill_play_live where bill_id='$_GET[id]'  ";
			$re=sql_query($sql);

			// echo $sql;

			while($rs=sql_fetch($re)){

					$sql="select * from bom_tb_ball_list_score where b_id='$rs[b_id]'   ";
					$re2=sql_array_sp($sql);	
					if($re2['b_id']==""){
					$sql="select * from bom_tb_ball_list where b_id='$rs[b_id]'   ";
					$re2=sql_array_sp($sql);	
						}
					$time_stop=$re2[b_date_play]+(60*$time_stopxxx);

					// echo $sql;
					if($time_stop<$time_stam)
					{
							$not=1;
					}
			}

			if($not==0){

				########################Update

				#$sql="delete from bom_tb_football_bill  where bill_id='$_GET[id]'  ";
				$sql="update bom_tb_football_bill_live set b_accept=2  , b_can_date=now() , b_can_rid='$_SESSION[aid]00'   where  bill_id='$_GET[id]' ";
				sql_query($sql);
				#$sql="delete from bom_tb_football_bill_play  where bill_id='$_GET[id]'  ";
				$sql="update bom_tb_football_bill_play_live set b_accept=2  , b_can_date=now() , b_can_rid='$_SESSION[aid]00'   where  bill_id='$_GET[id]' ";
				sql_query($sql);

        $sql="select b_zone from bom_tb_football_bill_live where bill_id='$_GET[id]' ";
        $reb=sql_array($sql);

        $sql="select m_id,m_count,m_agent_id,r_id from bom_tb_member where m_id='$_GET[xmid]' ";
        $rec=sql_array($sql);
        $rs_ag = sql_array("select r_agent_id from bom_tb_agent where r_id = '$rec[r_id]'");
        $log_sum=$rec[m_count]+$_GET[cc];
        ######################LOG ใหม่
        $sql="INSERT IGNORE INTO bom_tb_all_payment (
        bap_date, bap_ip, bap_type  ,m_id ,r_id,  m_agent_id, r_agent_id, 
        bap_before, bap_in ,bap_after,bap_comment,
        bill_id,bap_play_type,bap_zone,
        bap_code,bap_by_type,bap_by_id) values(
        now(),'"._bIP()."', '11', '$rec[m_id]','$rec[r_id]','$rec[m_agent_id]','$rs_ag[r_agent_id]',
        '$rec[m_count]' ,'$_GET[cc]','$log_sum','ปฏิเสธพนันกีฬา',
        '$_GET[id]' , 1 , $reb[b_zone] ,
        'CPB',4,'$_SESSION[aid]') ";
        sql_query($sql);  
        ######################LOG ใหม่ 



				$sql="update bom_tb_member set m_count=m_count+$_GET[cc]  where  m_id='$_GET[xmid]'  ";

				sql_query($sql);


			
			
				############################บัญชี
				/*$sql="select * from bom_tb_member where m_id='$_GET[xmid]' ";
				$rec=sql_array($sql);

				$mtxt="คืนบิล";
				$q_count=$_GET[cc];
				$sum_count=$rec[m_count];
				$typeby=1;#ฝาก
				#$typeby=2;#ถอน
				$bill=$_GET[id];
				$sql="insert into bom_tb_databet_live (d_date	,bill_id	,m_id	,d_in	,d_sum, d_by,d_txt,r_agent_id) values (now(),'$bill','$rec[m_id]','$q_count','$sum_count','$typeby','$mtxt','99999');";

				// echo $sql;
				sql_query($sql);*/
				############################บัญชี
			}

      @header("Location: main.php?p=".$_GET['p']."&g_p=".$_GET['g_p']."&d=".$_GET['d']."&b=".$_GET['b']."&q=".$_GET['q']."&bmem=".$_GET['bmem']."&shop=".$_GET['shop']."&orderby=".$_GET['orderby']."&page=".$_GET['page']);
      exit();

  }


  if($_GET[ac]=="pay"){
		if($_GET[ss]==0){$ss=1;}else{$ss=0;}
		// $sql="update bom_tb_football_bill_live  set b_admin='$ss' where bill_id='$_GET[id]' ";
		// sql_query($sql);
    $sql="update bom_tb_football_bill  set b_admin='$ss' where bill_id='$_GET[id]' ";
    sql_query($sql);
	}

  if($_GET[ac]=="accept"){
    $ss=$_GET[act];
    $sql="update bom_tb_football_bill_live set b_accept=$ss  where  bill_id='$_GET[id]'";
    #sql_query($sql);
    $sql="update bom_tb_football_bill_play_live set b_accept=$ss  where  bill_id='$_GET[id]'";
    #sql_query($sql);
  }
  
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    บิลรายการ
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
    <li><a href="#"><i class="fa fa-file-text"></i> บิล</a></li>
    <li class="active">บิลรายการ</li>
  </ol>
</section>

<!-- Main content -->

<section class="content">
  <div class="box">      
    <div class="box-header">
      <h3 class="box-title">บิลรายการ</h3>
      <?php if($lv > 1){ ?>
      <button type="button" class="btn btn-block btn-primary pull-right" style="width: 120px;" onclick="javascript:history.go(-1)">
        <i class="fa fa-chevron-left" style="font-size: 14px; margin-right: 10px;"></i> ย้อนกลับ
      </button>
      <?php } ?>
    </div>
    <div class="box-header">
      <div class="col-md-2 col-sm-12 col-xs-12 mb-1">

           <form action="" id="mainForm" onsubmit="return false;">
           <div class="input-group date">
             <div class="input-group-addon">
               <i class="fa fa-calendar"></i>
             </div>
             <input type="text" class="form-control pull-right datepicker" name="d" id="d" value="<?=$_GET['d'];?>" autocomplete="off">
           </div>

           <input name="p" type="hidden" value="<?=$_GET[p];?>" />
           <input name="b" type="hidden" value="<?=$_GET[b];?>" />
           <input name="rob" type="hidden" value="<?=$_GET[rob];?>" />
           <input name="mid" type="hidden" value="<?=$_GET[mid];?>" />
           <input name="shop" type="hidden" value="<?=$_GET[shop];?>" />
           <input name="view" type="hidden" value="1" />

         </div>

         <!-- <div class="col-md-1 col-sm-12 col-xs-12 mb-1">
           <select class="form-control" name="view" id="view">
             <option value="" selected="selected">ย่อ</option>
             <option value="1">เต็ม</option>
           </select>
         </div> -->


         <?php 

             $sql = "SELECT * FROM `bom_tb_agent` WHERE `r_level` = 1";
             $re_agent = sql_query($sql);

          ?>

         <div class="col-md-2 col-sm-12 col-xs-12 mb-1">
           <select class="form-control" name="shop" id="shop">
             <option value="">ตัวแทนทั้งหมด</option>

             <? 
             		foreach($re_agent as $value): 
             		$slt = ($value['r_id'] == $_GET["shop"]) ? "selected = '' " : "";	 	
             ?>

               <option value="<?=$value['r_id'];?>" <?=$slt;?> ><?=$value['r_user'];?>[ <?=$value['r_name'];?> ]</option>
             <? endforeach; ?>

           </select>
         </div>

         <div class="col-md-2 col-sm-12 col-xs-12 mb-1">
           <select class="form-control" name="b" id="b">
             <option value=""  <?=($_GET[b]=="") ? "selected=\"selected\"" : "";?> >บิล ทั้งหมด</option>
             <option value="1" <?=($_GET[b]==1) ? "selected=\"selected\"" : "";?>>บิล เต็ง</option>
             <option value="2" <?=($_GET[b]==2) ? "selected=\"selected\"" : "";?>>บิล สเต็ป</option>
           </select>
         </div>

         <div class="col-md-2 col-sm-12 col-xs-12 mb-1">
           <select class="form-control" id="orderby" name="orderby">
             <option value="1" <?=($_GET[orderby]==1) ? "selected=\"selected\"" : "";?> >ตามชนะ</option>
             <option value="2" <?=($_GET[orderby]==2) ? "selected=\"selected\"" : "";?> >ตามเวลา</option>
           </select>
         </div>

         <div class="col-md-2 col-sm-12 col-xs-12 mb-1">
           <input type="text" name="q" placeholder="Search" id="SearchUser" class="form-control" value="<?=$_GET[q];?>">
         </div>
          </form>
         <div class="col-md-2 col-sm-12 col-xs-12 mb-1">
           <button type="submit" class="btn btn1 btn-primary billSearch-btn" onclick="get_data();">
             <span class="glyphicon glyphicon-search"></span>ค้นหา
           </button>
         </div>

      </div>

    <!-- /.box-header -->

    <div class="box-body table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th class="vaign_m" rowspan="2" width="10%">รหัสบิล</th>
            <th class="vaign_m" rowspan="2" width="10%" id="shop-title">ตัวแทน</th>
            <th class="vaign_m" rowspan="2" width="35%">รหัสทีม</th>
            <th class="vaign_m" width="10%">ราคา</th>
            <th class="vaign_m" width="10%">เวลา</th>
            <th class="vaign_m" width="10%">สถานะ</th>
            <th class="vaign_m" width="10%">จ่าย</th>
            <th class="vaign_m" width="10%">ลบ</th>
          </tr>
        </thead>
        <tbody id="loadData">  
        </tbody>
        <tfoot>
          <tr class="col_footer">
            <td class="aign_r"></td>
            <td class="aign_r"></td>
            <td class="vaign_m">รวมยอดเล่น</td>
            <td align="center" id="sum1">


            </td>
            <td class="aign_r"></td>
            <td class="vaign_m">รวมชนะ</td>
            <td class="aign_r" id="sum2"><?php echo number_format($ree1[bonus]+$ree2[bonus]); ?></td>
            <td class="aign_r"></td>
          </tr>
        </tfoot>
      </table>
			
			<div id="pagination"></div>

    </div>

    <!-- /.box-body -->

  </div>

</section>

<!-- /.content -->



<script>

  $(document).ajaxStart(function () {
    // Pace.restart();
  })
 
  var d = new Date();
  strDate = d.getFullYear() + "/" + (d.getMonth()) + "/" + d.getDate();
  var sd = new Date(strDate)

  $( ".datepicker" ).datepicker({
    autoclose: true,
    format: 'dd-mm-yyyy',
    startDate : sd,
    endDate  : d 
  });


 get_data(<?=$_GET['page'];?>);
 

  function get_data(this_page=1)
  {
    
  	var rowPerPage = 30;
  	var d = $("#d").val();
  	var q = $("#SearchUser").val();
  	var b = $("#b").val();
  	var shop = $("#shop").val();
  	var orderby = $("#orderby").val();

  	var new_url = "?p=bill&groupP=bill&d="+d+"&b="+b+"&q="+q+"&bmem=1&shop="+shop+"&orderby="+orderby+"&page="+this_page+"";

  	changeUrlParam(new_url);

    var data = $("#mainForm").serializeArray();
   		  data.push(
   		  	{name: 'this_page', value: this_page},
   		  	{name: 'rowPerPage', value: rowPerPage},
   		  );

    if(shop == "")
    {
    	$("#shop-title").text("ตัวแทน");
    }else{
    	$("#shop-title").text("สมาชิก");
    }

    $.ajax({
      url: 'inc/get_data/get_bill.php',
      type: 'GET',
      dataType: 'html',
      data: data,
    })
    .done(function(res) {
      	$("#loadData").text("").append(res);
      	var pagi_html = loadPagination(pagi_data);
        $('#pagination').text('');
        $('#pagination').html(pagi_html);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

    $.ajax({
      url: 'inc/get_data/get_bill_total.php',
      type: 'GET',
      dataType: 'json',
      data: data,
    })
    .done(function(res) {
       $("#sum1").text("").append(res.sum1);
       $("#sum2").text("").append(res.sum2);
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
          get_data(page);
  }

  function loadLiveScore(b_id){
    // console.log(b_id)
      $('#modal_livescore .modal-body').html('<div style="text-align: center">กำลังโหลด ...</div>');

    $.ajax({
      url: 'inc/get_data/get_livescore.php',
      type: 'get',
      dataType: 'html',
      data: {b_id: b_id},
    })
    .done(function(res) {
      console.log(res);
      $('#modal_livescore .modal-body').html(res);
    })
    .fail(function() {
      $('#modal_livescore .modal-body').html('<div style="text-align: center">เกิดข้อผิดพลาด!</div>');
    })
    .always(function() {
      console.log("complete");
    });
    
  }

</script>
<!-- The modal -->
<div class="modal fade" id="modal_livescore" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title" id="modalLabel">ผลการแข่งขัน</h4>
</div>
<div class="modal-body">
<div style="text-align: center">กำลังโหลด ...</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
</div>
</div>
</div>
</div>