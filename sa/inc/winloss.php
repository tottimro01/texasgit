
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Winloss By Agent 
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-retweet"></i> Winloss</a></li>
        <li class="active"> Winloss By Agent  </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          <?php 
                    $_POST["d"] = ($_POST["d"] == "") ? $view_date : $_POST["d"];
                    $_POST["e"] = ($_POST["e"] == "") ? $view_date : $_POST["e"];

                    $lv = sql_escape_str($_GET["level"]);
                    $id = ($_GET['id'] == "") ? " " :  sql_escape_str($_GET["id"]);
                    
                    if($id== "" || $lv == "") // gt level1
                    {
                      $lv = 1;
                      $sql = "SELECT * FROM `bom_tb_agent` WHERE 1 and r_level = $lv";
                      $re=sql_query($sql);

                    }else  
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
                               <label>Date from: </label>
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
                               <label> to : </label>
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

                          <div class="checkbox inline mr-1">
                            <label>
                              <?php  $chk = ($_GET["cb_all"] == 1) ? "checked" : ""; ?>
                              <input type="checkbox" id="cb_all" name="cb_all" class="cb_check_all" value="1" <?=$chk;?> onclick="checkAll('cb_check','all');"> All
                            </label>
                          </div>

                          <?php 
						  
$lang_g["bet_type"]["sc"] = "Soccer";
$lang_g["bet_type"]["sp"] = "Sports";
$lang_g["bet_type"]["bx"] = "Muay thai";
$lang_g["bet_type"]["st"] = "Mix";
$lang_g["bet_type"]["lg"] = "Lotto";
$lang_g["bet_type"]["ls"] = "Lotto Market";
$lang_g["bet_type"]["ll"] = "Lotto Set";
$lang_g["bet_type"]["gm"] = "Games";
$lang_g["bet_type"]["cn"] = "Casino";
$lang_g["bet_type"]["suggest"] = "Affiliate";
						  
                             foreach ($lang_g["bet_type"] as $key => $value) {
                               ?>
                                  <div class="checkbox inline mr-1">
                                    <label>
                                      <?php  $chk = ($_GET["cb_".$key] == 1) ? "checked" : ""; ?>
                                      <input type="checkbox" id="cb_<?=$key;?>" name="cb_<?=$key;?>" class="cb_check" value="1" <?=$chk;?> onclick="checkAll('cb_check');"> <?=$value;?>
                                    </label>
                                  </div>
                               <?
                             }

                          ?>

                        <hr style="border-top: 1px solid #d3d3d3;">
                        </div>

                        <div class="col-md-8 mb-1">

                           <div class="checkbox inline mr-1">
                            <label>
                              <?php  $chk = ($_GET["chk_currency_all"] == 1) ? "checked" : ""; ?>
                              <input type="checkbox" id="chk_currency_all" name="chk_currency_all" class="chk_currency_all" value="1" <?=$chk;?> onclick="checkAll('chk_currency','all');"> All
                            </label>
                          </div>

                          <?php 

                            foreach ($currency_list as $key => $value) {
                                $chk = ($_GET["chk_currency_".$key] == 1) ? "checked" : "";
                              ?>
                                  <div class="checkbox inline mr-1">
                                    <label>
                                      <input type="checkbox" id="chk_currency_<?=$key;?>" name="chk_currency_<?=$key;?>" class="chk_currency" value="1" <?=$chk;?> onclick="checkAll('chk_currency');" > <?=$value;?> [<?=$key;?>] 
                                    </label>
                                  </div>
                              <?
                            }

                           ?>
                        </div> 

                        <div class="col-sm-12 col-md-2">
                            <button type="submit" class="btn btn-default btn-block" style="margin-bottom: 10px;">Search</button>
                        </div>

                        <?php if($lv > 1){ ?>
                        <div class="col-sm-12 col-md-2">
                            <button type="button" class="btn btn-block btn-primary pull-left" style="width: 100%;" onclick="javascript:history.go(-1)">
                              <i class="fa fa-chevron-left" style="font-size: 14px; margin-right: 10px;"></i> Back
                            </button>
                         </div>     
                        <?php } ?>
                        
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

        if(!empty($_GET['h']))
        {
           $c = 0;
           foreach ($ex_h_1 as $key => $value) {

              if ($value ==  $_GET["b"]) {
                 $h_echo .= $value;
                ?>
                  <span class="panal_list arrowed-in">
                    <a href="#"> <?=$bet_type[$value];?> </a>  
                  </span>
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
                <a href="<?=$path;?>&level=<?=$ex_h_2[0];?>&id=<?=$ex_h_2[2];?>&h=<?=substr($h_echo, 0, -1);?>&<?=$_link;?>">
                  <span class="panal_list arrowed-in ">
                      <?=$icon;?> <?=$ex_h_2[1];?>
                  </span>
                </a>  
                <?
                $c++;
              }

           } 

        }

       ?>
      
      </div> 

              <table class="table table-bordered table-hover" id="table_data">
                <thead>
                  <tr>
                    <th class="vaign_m" rowspan="2" width="15%">Username</th>
                    <th class="vaign_m" rowspan="2" width="10%">Currency</th>
                    <th class="vaign_m" rowspan="2" width="10%">Stake</th>
                    <th class="vaign_m" colspan="4" width="30%">Agent</th>
                    <th class="vaign_m" colspan="4" width="30%">Company</th>
                  </tr>

                  <tr>
                    <th class="vaign_m">Keep</th>
                    <th class="vaign_m">Comm</th>
                    <th class="vaign_m">Win</th>
                    <th class="vaign_m">Total</th>
                    <th class="vaign_m">Keep</th>
                    <th class="vaign_m">Comm</th>
                    <th class="vaign_m">Win</th>
                    <th class="vaign_m">Total</th>
                  </tr>
                </thead>
                <tbody id="load_data">
                
                </tbody>
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

  getData();
  function getData(page = 1)
  {
      var rowPerPage = 2000;
      get_loader("show");
      var data = $( "#main_form" ).serializeArray();
      data.push(
        {name: 'thisPage', value: page},
        {name: 'rowPerPage', value: rowPerPage},
        {name: 'h', value: '<?=$_GET['h'];?>'},
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


  function checkAll(_class,type){
        if(type == 'all'){
            $('.'+_class).prop('checked', $('.'+_class+'_all').prop("checked"));
        }else{
            var chk = true;
            $('.'+_class).each(function(){
                if(!$(this).prop('checked')){
                    chk = false;
                }
            });
            $('.'+_class+'_all').prop("checked",chk);
        }
    }


 </script>