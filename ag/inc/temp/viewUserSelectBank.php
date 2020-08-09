<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<? 

if($_POST["session"]["AGlang"]=="")
{
  $_POST["session"]["AGlang"]="th";
}

  
  require('../conn.php');
  require('../function.php');

  require('../../lang/ag_lang.php');
  require('../../lang/function_array.php');

  $bank_id = $_POST["bank_id"];

  $sql = "SELECT * FROM `bom_tb_bank` WHERE `r_id` = ".$_SESSION["r_id"]."  and `bank_id` = $bank_id ORDER BY bank_id DESC";
  $bank_rs=sql_array($sql);
 

 ?>

<style type="text/css">

  .table-responsive.log_table
  {
    max-height: 70vh;
  }

  .modal-open .modal
  {
    overflow-y: hidden;
  }

  .bg_red
  {
  	background: #ffd5d5!important;
  }

  .ace-settings-item
  {
    position: relative;
  }

  .table-responsive {
    overflow-x: auto!important;
    overflow-y: auto!important;
    min-height: .01%;
  }

  .b_icon
  {
    width: 30px;
    height: auto;
  }
  @media (min-width: 992px) { 
    #divViewLog{
      width:40%;
    }
  }
</style>
<div class="modal fade in" id="viewLogModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: block;">
  <div class="modal-backdrop fade in" style="height: auto;"></div>
     <div class="modal-dialog" role="document" id="divViewLog">
          <div class="modal-content">
               <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel"><strong> <?=$lang_userList[74];?> <font style="color:#c90000"> <?=$bank_rs["bank_cname"];?> - <?=$arr_bank[$bank_rs["bank_name"]];?> </font></strong> </h4>
                    
               </div>
               <div class="modal-body">
                    <div class="table-responsive log_table">
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 100px;"><?=$lang_ag[1665];?></th>
                                    <th><?=$lang_ag[189];?></th>
                                    <th><?=$lang_ag[168];?></th>
                                    <th><?=$lang_ag[184];?></th>
                                </tr>
                            </thead>
                            <tbody>  
                              <?php 
                                $r_agent_id = $_SESSION["r_agent_id"].$_SESSION["r_id"]."*";
                                $sql="select m_id , m_name , m_user ,  m_b_bank ,  m_b_type , bank_id from bom_tb_member   where  m_agent_id = '$r_agent_id' and m_level = '$_SESSION[uplevel]'";  
                                $re=sql_query($sql);

                              

                                while($rs=sql_fetch_as($re))
                                {
                                  $chk = ($bank_rs["bank_id"] == $rs["bank_id"]) ? "checked" : "";
                                  $chk_class = ($bank_rs["bank_id"] != $rs["bank_id"]) ? "bg_red" : "";
                                  ?>
                                    <tr class="<?=$chk_class;?>">
                                         <td >
                                           <div class="ace-settings-item center">
                                               <input type="checkbox" class="ace ace-checkbox-2 select_user"  data-id="<?=$rs["m_id"];?>" data-bank-id="<?=$bank_rs["bank_id"];?>" <?=$chk;?> onchange="select_user(this)">
                                               <label class="lbl" for="ace-settings-navbar"></label>
                                           </div>
                                         </td>
                                         <td>
                                            <?=$rs["m_user"];?> (<?=$rs["m_name"];?>)
                                         </td>
                                         <td style="text-align: center;">
                                            <?php 

                                              if($rs["m_b_bank"] != 0)
                                              {
                                                ?>
                                                   <img src="<?=$main_url;?>/assets/images/bank_icon/<?=$rs["m_b_bank"];?>.png" alt="" class="b_icon"> 
                                                <?
                                              }else{
                                                echo $lang_ag[2373];
                                              }
                                           
                                            ?>

                                           
                                         </td>

                                         <td style="text-align: center;">
                                              <img src="<?=$main_url;?>/assets/images/m_b_type_icon/<?=$rs["m_b_type"];?>.png" alt="" class="b_icon"> 
                                         </td>
                                     </tr>   
                                  <?
                                 
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
