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
    $query = "select * from bom_tb_databet_live where m_id = '{$id}' ORDER BY d_id desc limit 1000";
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

  .table-responsive
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
                    <div class="table-responsive">
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th><?=$lang_ag[1404]?></th>
                                     <th><?=$lang_userList[38];?></th>
                                    
                                    <th><?=$lang_ag[423]?> <?=$lang_ag[1907]?></th>
                                    <th><?=$lang_ag[423]?> <?=$lang_ag[1908]?></th>
                                    <th><?=$lang_ag[423]?> <?=$lang_ag[1909]?></th>
                                    <th><?=$lang_ag[423]?> <?=$lang_ag[197]?></th>
                                    
                                    <th><?=$lang_userList[70];?></th>
                                    <th>IP</th>
                                    <th><?=$lang_ag[30]?></th>
                                     <th>เอเย่น</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?
                            while($data_payment = sql_fetch($data_payments))
                            {
                              if($data_payment["d_id"] != "")
                              {



                                $no++;
                                echo $list = "
                                  <tr>
                                    <td align='center'>".$data_payment['d_id']."</td>
                                    <td align='center'>".$data_payment["d_by"]."</td>
									
                                    <td align='right' class='digits'>".$data_payment["d_count"]."</td>
									 <td align='right' class='digits'>".$data_payment["d_in"]."</td>
									 <td align='right' class='digits'>".$data_payment["d_out"]."</td>
									<td align='right' class='digits'>".$data_payment["d_sum"]."</td>
									
                                    <td align='center'>".$data_payment['d_date']."</td>
                                    <td align='center'>".$data_payment["d_ip"]."</td>
                                    <td align='center'>".$data_payment["d_txt"]."</td>
									  <td align='center'>".$data_payment["d_user"]."</td>
                                  </tr>
                                "; #<td align='center'>{$lang_userList[2]}</td>
                              }
                            }
                            if($list == "")
                            {
                              echo $list = "
                                <tr>
                                  <td align='center' class='text-danger' colspan='100%'> {$lang_userList[75]} </td>
                                </tr>
                              ";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_userList[68];?></button>
               </div>
          </div>
     </div>
</div>
<script type="text/javascript">
    $(".digits").digits();
</script>
