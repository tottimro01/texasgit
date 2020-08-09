<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
  
  if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
  }
  require('../../conn.php');
  require('../../function.php');
  require('../../ag_function.php');
  require('../../../lang/ag_lang.php');
  require('../../../lang/function_array.php');



//ถ้า เข้าสู่ระบบด้วย เอเย่นสำรอง
if($_SESSION["uu_use"]!=0)
{
  $r_agent_id = $_SESSION["r_agent_id"];
  $sql="select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_id = ".$_SESSION["rid"]." and r_level=".intval($_SESSION["r_level"])."";
  $rs = sql_array($sql);

  $r_name = $rs["r_user"];
}else{
  $r_name = $_SESSION["r_user"];  
}

			//ดึง credit 
		//$re4["xtotal"] คือ ยอดเครดิตทั้งหมด
		//$x_count_agent คือ ยอดเครดิตที่เปิดให้ agent
		//$x_count_member คือ ยอดเครดิตที่เปิดให้ member
		//$x_count3  คือ ยอดเครดิตคงเหลือ (ยอดเครดิตทั้งหมด หักลบ เครดิตที่เปิดให้ agent และ member)

		$d_incre = strtotime("-7 day");
		$sql = "select sum(b_total) as btotal from bom_tb_football_bill where  m_agent_id like '%*".$_SESSION["r_id"]."*%'  and r_cut_bet_4=0";
		$reb1 = sql_array($sql);
		$sql = "select sum(b_total) as btotal from bom_tb_lotto_bill_live where  m_agent_id like '%*".$_SESSION["r_id"]."*%' and b_status=5";
		$reb2 = sql_array($sql);
		$sql = "select sum(b_total) as btotal from bom_tb_lotto_hun_bill where  m_agent_id like '%*".$_SESSION["r_id"]."*%' and play_timestam >= $d_incre";
		$reb3 = sql_array($sql);
		$sql = "select sum(b_total) as btotal from bom_tb_games_bill_play where  m_agent_id like '%*".$_SESSION["r_id"]."*%' and play_timestam >= $d_incre";
		$reb4 = sql_array($sql);
		$sum_kank2 = $reb1["btotal"] + $reb2["btotal"] + $reb3["btotal"] + $reb4["btotal"];
		
		$sql = "select r_count as xtotal , r_type from bom_tb_agent where r_id=".$_SESSION["r_id"];
		$re4 = sql_array($sql);
		
		$rtype = "m_count";
		$sql = "select sum($rtype) as xtotal from bom_tb_member where  m_agent_id like '%*".$_SESSION["r_id"]."*%'";
		$re5 = sql_array($sql);
		
		// ยอดรวมเครดิตที่โอนให้ member
		$x_count_member = ($re5["xtotal"] + $sum_kank2);
		
		// ยอดเครดิตทีเปิดให้ agent 
		$lv = intval($_SESSION["r_level"])+1;
		$sql = "select sum(r_count) as xtotal from bom_tb_agent where r_agent_id like '%*".$_SESSION["r_id"]."*%' and r_level=$lv ";
		$re5 = sql_array($sql);
		// ยอดรวมเครดิตที่โอนให้ agent
		$x_count2 = $re4["xtotal"] - $re5["xtotal"];
		
		$sql = "select * from bom_tb_agent where  r_agent_id like '%*".$_SESSION["r_id"]."*%'  and   r_id='".$_POST["id"]."' ";
		$rex = sql_array($sql);
		
		$x_count_agent = $re5["xtotal"];
		// เครดิตทั้งหมดที่มี ลบกับ  เครดิตที่ให้ member และ agent
		$x_count3 = $re4["xtotal"] - ($x_count_agent + $x_count_member);
		
		if($x_count3 <=0 )
		{
		  $x_count3=0;
		}



  $r_agent_id = $_SESSION["r_agent_id"].$_SESSION["r_id"]."*";
  $lv = intval($_SESSION["r_level"])+1;

  $sql="select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_level=$lv ORDER by `r_id` DESC";
  
  $re=sql_query($sql);
  $list_agent = "<option value=''> {$lang_ag[1103]} </option>";
  while($rs=sql_fetch($re)){
    $agent_name = ($rs["r_name"] != "") ? $rs["r_name"] : $lang_ag[273];
    $list_agent .= "<option value='".$rs["r_id"]."'>".$rs["r_user"]." (".$agent_name.")</option>";
  }


  $template = 
  "
    <style>
        .form-group.copy-group .input-group
        {
            width: 90%!important;
            display: inline-flex;
        }
        @media (max-width: 990px) { 
         .form-group.copy-group div{
           padding-top: 0%!important;

          }
        }
    </style>

    <br>
    <div class='widget-box'>
      <div class='widget-header widget-header-blue widget-header-flat'>
        <h4 class='widget-title lighter'><strong> {$lang_ag[1912]}  $sql1 <font style='color:#c90000'></font> </strong></h4>
      </div>
      <div class='widget-body'>
        <form class='form-horizontal' id=' action=' method='post'>
          <div class='widget-main'>
            <div class='row'>
              
                <div class='form-group copy-group'>
                  <label class='col-xs-12 col-sm-4 control-label no-padding-right'>
                    <strong>{$lang_ag[847]} : </strong>
                  </label>
                  <div class='selectize-control col-xs-12 col-sm-6 repositories single'>
                      <select id='select-user' name='sl_rid' class='repositories selectized input-sm' tabindex='-1' style='width: 90%!important;'>
                        {$list_agent}
                      </select>
                      <span class=\"text-danger\">  * </span>
                  </div>
                </div> 
                <div class='form-group copy-group'>
                  <label class='col-xs-12 col-sm-4 control-label no-padding-right'>
                    <strong>{$lang_ag[1396]} : </strong>
                  </label>
                  <div class='col-xs-12 col-sm-6'>
                    <div class='input-group'>
                      <span class='input-group-addon'>
                        <strong> {$r_name} </strong>
                        <input type='hidden' name='usermain' value='{$_SESSION["r_user"]}'>
                      </span>
                      <input type='text' maxlength='5' id='regis_usernameCopy' name='regis_usernameCopy' class='col-xs-12 col-sm-12 inputEngNum'>
                    </div>
                    <span class=\"text-danger\">  * </span>
                  </div>
                </div>
                <div class='form-group copy-group'>
                  <label class='col-xs-12 col-sm-4 control-label no-padding-right'><strong>{$lang_ag[1393]} : </strong></label>
                  <div class='col-xs-12 col-sm-6'>
                    <div class='input-group'>
                      <input type='password' id='regis_password' name='regis_password' class='col-xs-12 col-sm-12'>
                    </div> 
                    <span class=\"text-danger\">  * </span>
                  </div>
                </div>
                <div class='form-group copy-group'>
                  <label class='col-xs-12 col-sm-4 control-label no-padding-right'><strong>{$lang_ag[423]} : </strong></label>
                  <div class='col-xs-12 col-sm-6'>
                    <input type='text' id='regis_credit' name='regis_credit' class='col-xs-12 col-sm-12 numeric input-num2digt' value='0.00' onkeyup=\"calCredit(this,".$x_count3.");\" onblur=\"addDigit(this)\" style=\"width: 90%!important;\">
                    <br> <span class='text-danger' id='max_credit' data-json='0.00' style=\"display: inline-block;\"> (Max = ".number_format($x_count3,2).") </span> 
                  </div>
                </div>
                <div class='form-group copy-group'>
                  <label class='col-xs-12 col-sm-4 control-label no-padding-right'><strong>{$lang_ag[405]} : </strong></label>
                  <div class='col-xs-12 col-sm-6'>
                    <div class='input-group'>
                      <input type='text' id='regis_name' name='regis_name' class='col-xs-12 col-sm-12'>
                    </div> 
                    <span class=\"text-danger\">  * </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script src='assets/js/selectize.js'></script>
    <script type='text/javascript'>
     /* $('.numeric').autoNumeric();
      $('#select-user').selectize({
        valueField: 'u_username',
        labelField: 'u_username',
        searchField:'u_username',
        options: [],
        create: false,
        render: {
          option: function(item, escape) {
            return '<div>' +
            '<span class=\'title\'>' +
            '<span class=\'name\'>' + escape(item.u_username) + '</span>' +
            '</span>'+
            '</div>';
          }
        },
        load: function(query, callback) {
          if (!query.length) return callback();
          $.ajax({
            url: 'memberAgent/getUser.php',
            type: 'GET',
            data: {user: encodeURIComponent(query)},
            error: function() {
              callback();
            },
            success: function(res) {
              callback(res.slice(0, 10));
            }
          });
        }
      });*/
    </script>
  ";
  $data = array(
    "result"  =>  $template
  );
  echo json_encode($data);