<? 

if($_POST["session"]["AGlang"]=="")
  {
    $_POST["session"]["AGlang"]="th";
  }

  
  require('../../conn.php');
  require('../../function.php');

  require('../../../lang/ag_lang.php');
  require('../../../lang/function_array.php');


  $user = $_POST["user"];
  $id = $_POST["id"];
  $futype = $_POST["futype"];
  if($futype == 'M'){
    $query = "select * from bom_tb_all_payment where m_id = '{$id}' ORDER BY bap_date desc , bap_id desc limit 1000";
    $data_payments = sql_query($query);



    $query_member = "select * from bom_tb_member  where m_id = '{$id}' ";
    $result_members = sql_query($query_member);
    while($result_member = sql_fetch($result_members))
    {
      if($result_member["m_id"] == $id)
      {
        $data_member = array(
          'm_id'  =>  $result_member["m_id"],
          'm_user'  =>  $result_member["m_user"],
          'm_name'  =>  $result_member["m_name"],
        );
      }
    }
    $data_member["m_name"] = ($data_member["m_name"] != "") ? $data_member["m_name"] : $lang_userList[15];
  }


 ?>

<style type="text/css">

  .table-responsive.log_table
  {
    max-height: 70vh;
  }
  @media (min-width: 992px) { 
    #divViewLog{
      width:40%;
    }
  }
</style>
<div class="modal fade in" id="viewLogModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: block; padding-right: 17px;">
  <div class="modal-backdrop fade in" style="height: auto;"></div>
     <div class="modal-dialog" role="document" id="divViewLog">
          <div class="modal-content">
               <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel"><strong> <?=$lang_userList[74];?> <font style="color:#c90000"> <?=$data_member["m_user"];?> (<?=$data_member["m_name"];?>)</font></strong> </h4>
               </div>
               <div class="modal-body">
                    <div class="table-responsive log_table">
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th><?=$lang_ag[1404]?></th>
                                     <th><?=$lang_ag[205];?></th>
                                    
                                    <th><?=$lang_ag[423]?> <?=$lang_ag[1907]?></th>
                                    <th><?=$lang_ag[423]?> <?=$lang_ag[1908]?></th>
                                    <th><?=$lang_ag[423]?> <?=$lang_ag[1909]?></th>
                                    <th><?=$lang_ag[423]?> <?=$lang_ag[197]?></th>
                                    
                                    <th><?=$lang_ag[185];?></th>
                                    <th>IP</th>
                                    <th><?=$lang_ag[30]?></th>
                                     <th><?=$lang_ag[455];?></th>
                                </tr>
                            </thead>
                            <tbody>                             
                            <?
                            while($data_payment = sql_fetch($data_payments))
                            {
                              
                              if($data_payment["bap_id"] != "")
                              {
                                if($data_payment[bap_by_id]=="99999" || $data_payment[bap_by_id]=="99991" || $data_payment[bap_by_id]=="99992" || $data_payment[bap_by_id]=="99993" || $data_payment[bap_by_id]=="99994"){
                                  $rs_ag["r_user"] = "Auto";
                                }else{
                                  if($data_payment[bap_by_type]==1){
                                    $rs_ag = sql_array("select r_user from bom_tb_agent where r_id = '$data_payment[r_id]'");
                                  }else if($data_payment[bap_by_type]==4){
                                    $rs_ag["r_user"] = "Admin";
                                  }else{
                                    $rs_ag = sql_array("select r_user from bom_tb_agent where r_id = '$data_payment[bap_by_id]'");
                                  }
                                  
                                }
                                

                                $no++;
                                echo $list = "
                                  <tr>
                                    <td align='center'>".$data_payment['bap_id']."</td>
                                    <td align='center'>".$all_payment[$data_payment["bap_type"]]."</td>
									
                                    <td align='right' class='digits'>".$data_payment["bap_before"]."</td>
									 <td align='right' class='digits'>".$data_payment["bap_in"]."</td>
									 <td align='right' class='digits'>".$data_payment["bap_out"]."</td>
									<td align='right' class='digits'>".$data_payment["bap_after"]."</td>
									
                                    <td align='center'>".$data_payment['bap_date']."</td>
                                    <td align='center'>".$data_payment["bap_ip"]."</td>
                                    <td align='center'>".$data_payment["bap_comment"]." ".$data_payment["bill_id"]."</td>
									  <td align='center'>".$rs_ag["r_user"]."</td>
                                  </tr>
                                "; #<td align='center'>{$lang_userList[2]}</td>
                              }
                            }
                            if($list == "")
                            {
                              echo $list = "
                                <tr>
                                  <td align='center' class='text-danger' colspan='100%'> {$lang_ag[01]} </td>
                                </tr>
                              ";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_ag[284];?></button>
               </div>
          </div>
     </div>
</div>
<script type="text/javascript">
    $(".digits").digits();
</script>
