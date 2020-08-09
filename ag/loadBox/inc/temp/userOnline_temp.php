<?php require('inc_head.php');

$dir = "../../../json/online/r/*.json";
$agent_json = glob($dir);
$a_online_id = [];

$up_r_agent_id = $_POST["session"]["r_agent_id"].$_POST["session"]["rid"]."*";  // r_agent_id ของ level ถัดไป

foreach($agent_json as $file){
 
    $exText_a = explode(".json",basename($file));   

    if (stripos($exText_a["0"], "rid_") !== false) { // เอาเฉพาะ ไฟล์ที่เป็น agent

         $myfile = fopen($file, "r") or die("Unable to open file!");  // เปิดไฟล์ 
         $json_data = json_decode(fread($myfile,filesize($file)), true);  // อ่านไฟล์ ดึง json 
         if($json_data[0]["r_agent_id"] == $up_r_agent_id)  // ตรวจสอบว่า เป็นตัวแทนของ agent ที่  Login อยู่หรือไม่
         {
            $a_online_id[] = $json_data[0]["m_id"];  // ข้อมูลสำหรับนำไปแสดง
         }
         fclose($myfile);
    }

}


$dir = "../../../json/online/m/*.json";
$member_json = glob($dir);
$member_online = count($member_json);
$m_online_id = [];
foreach($member_json as $file){


     $myfile = fopen($file, "r") or die("Unable to open file!");  // เปิดไฟล์ 
     $json_data = json_decode(fread($myfile,filesize($file)), true);  // อ่านไฟล์ ดึง json 
     if($json_data[0]["r_agent_id"] == $up_r_agent_id)  // ตรวจสอบว่า เป็นสมาชิกของ agent ที่  Login อยู่หรือไม่
     {
        $m_online_id[] = $json_data[0]["m_id"];  // ข้อมูลสำหรับนำไปแสดง
     }
     fclose($myfile);
}

?>

<style>

    .label.label-ag {
        color: #56646d;
        border: 1px solid #abbac3;
        background-color: #f2f5f6;
        border-right-width: 1px;
        border-left-width: 2px;
         margin-bottom: 5px;
    }

    .label.label-m {
        color: #56656e;
        border: 1px solid #879399;
        background-color: #cacfd1;
        border-right-width: 1px;
        border-left-width: 2px;
         margin-bottom: 5px;
    }

    

</style>
<div class="row pdTop">
    <div class="col-xs-12">
        <div class="widget-box widget-color-blue2">
            <div class="widget-header">
                <h4 class="widget-title lighter"><?=$lang_ag[90];?></h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <div class="row">
                        <div class="col-xs-12">
                            <p>
                                </p>

                                <div class="infobox infobox-blue infobox-small infobox-dark">
                                    <div class="infobox-icon">
                                        <i class="ace-icon fa fa-users"></i>
                                    </div>
                                    <div class="infobox-data">
                                        <div class="infobox-content"><?=$lang_ag[440];?></div>
                                        <div class="infobox-content"><?=count($a_online_id);?></div>
                                    </div>
                                </div>

                                <div class="infobox infobox-blue infobox-small infobox-dark">
                                    <div class="infobox-icon">
                                        <i class="ace-icon fa fa-user"></i>
                                    </div>
                                    <div class="infobox-data">
                                        <div class="infobox-content"><?=$lang_ag[440];?></div>
                                        <div class="infobox-content"><?=count($m_online_id);?></div>
                                    </div>
                                </div>

                            <p></p>
                            <p>

                            <?php 
                                $sql = "SELECT r_user  FROM `bom_tb_agent` WHERE `r_id` IN (".implode(',',$a_online_id).")";
                                $re=sql_query($sql); 
                                while($rs=sql_fetch_as($re)){
                                   ?>
                                            <span class="label label-xlg label-ag">
                                                <i class="ace-icon fa fa-users"> &nbsp;&nbsp; <?=$rs["r_user"];?></i>  
                                            </span>
                                   <?
                                }
                             ?>    
                            
                            <?php 
                                $sql = "SELECT m_user  FROM `bom_tb_member` WHERE `m_id` IN (".implode(',',$m_online_id).")";
                                $re=sql_query($sql); 
                                while($rs=sql_fetch_as($re)){
                                   ?>
                                            <span class="label label-xlg label-m">
                                                <i class="ace-icon fa fa-user"> &nbsp;&nbsp; <?=$rs["m_user"];?></i>  
                                            </span>
                                   <?
                                }
                             ?>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>