<? 
 if($_POST["session"]["AGlang"]=="")
 {
   $_POST["session"]["AGlang"]="th";
 }
require('../conn.php');
require('../function.php');
require('../../lang/ag_lang.php');
// ยอดเครดิตทีเปิดให้ member 

$lv = intval($_POST["session"]["r_level"])+1;

$d_incre = strtotime("-7 day");
$sql="select sum(b_total) as btotal from bom_tb_football_bill where  m_agent_id like '%*".$_POST["session"]["r_id"]."*%'  and r_cut_bet_4=0";
$reb1=sql_array($sql);
$sql="select sum(b_total) as btotal from bom_tb_lotto_bill_live where  m_agent_id like '%*".$_POST["session"]["r_id"]."*%' and b_status=5";
$reb2=sql_array($sql);
$sql="select sum(b_total) as btotal from bom_tb_lotto_hun_bill where  m_agent_id like '%*".$_POST["session"]["r_id"]."*%' and play_timestam >= $d_incre";
$reb3=sql_array($sql);
$sql="select sum(b_total) as btotal from bom_tb_games_bill_play where  m_agent_id like '%*".$_POST["session"]["r_id"]."*%' and play_timestam >= $d_incre";
$reb4=sql_array($sql);
$sum_kank2=$reb1["btotal"]+$reb2["btotal"]+$reb3["btotal"]+$reb4["btotal"];
         
$sql="select r_count as xtotal , r_type  from bom_tb_agent where  r_id=".$_POST["session"]["r_id"];
$re4=sql_array($sql);

$rtype="m_count";
$sql="select sum($rtype) as xtotal from bom_tb_member where  m_agent_id like '%*".$_POST["session"]["r_id"]."*%' and m_level=$lv";
$re5=sql_array($sql);

$x_count_member =($re5["xtotal"]+$sum_kank2); // ยอดรวมเครดิตที่โอนให้ member

// ยอดเครดิตทีเปิดให้ agent 



$sql="select sum(r_count) as xtotal from bom_tb_agent where   r_agent_id like '%*".$_POST["session"]["r_id"]."*%' and r_level=$lv ";
$re5=sql_array($sql);
$x_count2=$re4["xtotal"]-$re5["xtotal"]; // ยอดรวมเครดิตที่โอนให้ agent

// $sql="select * from bom_tb_agent where  r_agent_id like '%*".$_POST["session"]["r_id"]."*%'  and   r_id='".$_POST["session"]["r_id"]."' ";
// $rex=sql_array($sql);

$x_count_agent = $re5["xtotal"];
$x_count_total = ($x_count_agent+$x_count_member);
$x_count3 = $re4["xtotal"]-$x_count_total; // เครดิตทั้งหมดที่มี ลบกับ  เครดิตที่ให้ member และ agent


$sql="select * from bom_tb_agent where  r_id=".$_POST["session"]["r_id"];
$rex=sql_array($sql);

?>

<div class="row">
    <div class="table-responsive col-xs-12 col-sm-6 hiden-boder"><br>
        <form class="form-horizontal" id="" method="get">
            <table id="simple-table" class="table  table-bordered table-hover">
                <thead>
                    <tr>
                        <th colspan="2"><center> <?=$lang_ag[1107];?></center></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="left"><?=$lang_ag[1134];?></td>
                        <td align="right"><strong><?=$rex["r_user"];?></strong>  </td>
                    </tr>
                    <tr>
                        <td align="left"><?=$lang_ag[1136];?></td>
                        <td align="right"><strong> <?=$_POST["session"]["r_currency"];?> </strong>  </td>
                    </tr>
                    <tr>
                        <td align="left"> <?=$lang_ag[1138];?>  </td>
                        <td align="right" class="digits"> <?=number_format($rex["r_count"],2);?> </td>
                    </tr>
                    <tr>
                        <td align="left"> <?=$lang_ag[1139];?> </td>
                        <td align="right" class="digits"> <?=number_format($x_count_agent,2);?> </td>
                    </tr>

                    <tr>
                        <td align="left"> <?=$lang_ag[516];?> </td>
                        <td align="right" class="digits"> <?=number_format($x_count_member,2);?> </td>
                    </tr>

                     <tr>
                        <td align="left"> <?=$lang_ag[1141];?> </td>
                        <td align="right" class="digits"> <?=number_format($x_count_total,2);?> </td>
                    </tr>

                    <tr>
                        <td align="left"> <?=$lang_ag[521];?> </td>
                        <td align="right" class="digits"><?=number_format($x_count3,2);?></td>
                    </tr>
                    <tr>
                        <td align="left"> <?=$lang_ag[27];?> </td>
                        <td align="right" class="digits">  
                            <?
                                $sql="select sum(b_total) as xtotal from bom_tb_football_bill where r_agent_id like '%*".$_POST["session"]["r_id"]."*%' and b_status=5";
                                $re1=sql_array($sql);

                                $sql="select sum(b_total) as xtotal from bom_tb_lotto_bill_live where r_agent_id like '%*".$_POST["session"]["r_id"]."*%' and b_status=5";
                                $re2=sql_array($sql);
                                echo number_format($re1["xtotal"]+$re2["xtotal"]); 
                            ?> 
                    </td>
                    </tr>
                    <tr>
                        <td align="left"> <?=$lang_ag[1147];?> </td>
                        <td align="right" class="digits"> 0 </td>
                    </tr>
                    <tr>
                        <td align="left"> <?=$lang_ag[1148];?> </td>
                        <td align="right" class="digits"> 0 </td>
                    </tr>
                    <tr>
                        <td align="left"> <?=$lang_ag[214];?> </td>
                        <td align="right" class="digits"> 0 </td>
                    </tr>              
                </tbody>
                <thead>
                    <tr>
                        <th colspan="2"><center><?=$lang_ag[184];?></center></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="left"><?=$lang_ag[184];?></td>
                        <td align="right" class=""> <?=$lang_ag[420];?> </td>
                    </tr>
                    <tr>
                        <td align="left"><?=$lang_ag[1154];?></td>
                        <td align="right" class=""> <?=$lang_ag[283];?> </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>



<script type="text/javascript">
    $(".digits").digits();
    jQuery(function($) {

    });



</script>



