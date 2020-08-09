<? 

if($_POST["session"]["AGlang"]=="")
  {
    $_POST["session"]["AGlang"]="th";
  }

  
  require('../../conn.php');
  require('../../function.php');

  require('../../../lang/ag_'.$_POST["session"]["AGlang"].'.php');
  require('../../../../lang/function_'.$_POST["session"]["AGlang"].'_new.php');


  $user = $_POST["user"];
  $id = $_POST["id"];
  $futype = $_POST["futype"];
  if($futype == 'M'){
    $query = "select * from bom_tb_payment where m_id = '{$id}' ORDER BY p_id desc";
    $data_payments = sql_query($query);

    $query_member = "select * from bom_tb_member";
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
                                    <th><?=$lang_userList[14];?></th>
                                    <th><?=$lang_userList[8];?></th>
                                    <th><?=$lang_userList[76];?></th>
                                    <th><?=$lang_userList[38];?></th>
                                    <th><?=$lang_userList[69];?></th>
                                    <th><?=$lang_userList[70];?></th>
                                    <th>IP</th>
                                    <th><?=$lang_userList[71];?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?
                            while($data_payment = sql_fetch($data_payments))
                            {
                              if($data_payment["p_id"] != "")
                              {

                                if($data_payment['u_id'] != "")
                                {
                                   $sql="SELECT * FROM `bom_tb_agent_use` where u_id = '".$data_payment['u_id']."'";
                                   $rex=sql_array($sql);

                                   $u_name = $rex["u_name"]; 
                                }else{
                                   $u_name = ""; 
                                }
                               

                                $no++;
                                echo $list = "
                                  <tr>
                                    <td align='center'>{$no}</td>
                                    <td align='center'>".$data_payment['p_by']."</td>
                                    <td align='center'>".$u_name."</td>
                                    <td align='center'>".$data_payment["p_comment"]."</td>
                                    <td align='right' class='digits'>".$data_payment["p_pay"]."</td>
                                    <td align='center'>".$data_payment['p_date']."</td>
                                    <td align='center'>183.88.10.143</td>
                                    <td align='center'>{$lang_userList[2]}</td>
                                  </tr>
                                ";
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
