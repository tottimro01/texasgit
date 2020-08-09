<? 
 if($_POST["session"]["AGlang"]=="")
 {
   $_POST["session"]["AGlang"]="th";
 }
require('../conn.php');
require('../function.php');
require('../../lang/ag_'.$_POST["session"]["AGlang"].'.php');
// ยอดเครดิตทีเปิดให้ member 

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
$sql="select sum($rtype) as xtotal from bom_tb_member where  m_agent_id like '%*".$_POST["session"]["r_id"]."*%'";
$re5=sql_array($sql);

$x_count_member =($re5["xtotal"]+$sum_kank2); // ยอดรวมเครดิตที่โอนให้ member

// ยอดเครดิตทีเปิดให้ agent 

$lv = intval($_POST["session"]["r_level"])+1;

$sql="select sum(r_count) as xtotal from bom_tb_agent where   r_agent_id like '%*".$_POST["session"]["r_id"]."*%' and r_level=$lv ";
$re5=sql_array($sql);
$x_count2=$re4["xtotal"]-$re5["xtotal"]; // ยอดรวมเครดิตที่โอนให้ agent

$sql="select * from bom_tb_agent where  r_agent_id like '%*".$_POST["session"]["r_id"]."*%'  and   r_id='$_POST[id]' ";
$rex=sql_array($sql);

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
                        <th colspan="2"><center> <?=$lang_balance[1];?> </center></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="left"><?=$lang_balance[2];?></td>
                        <td align="right"><strong><?=$rex["r_user"];?></strong>  </td>
                    </tr>
                    <tr>
                        <td align="left"><?=$lang_balance[3];?></td>
                        <td align="right"><strong>THB</strong>  </td>
                    </tr>
                    <tr>
                        <td align="left"> <?=$lang_balance[4];?>  </td>
                        <td align="right" class="digits"> <?=number_format($rex["r_count"],2);?> </td>
                    </tr>
                    <tr>
                        <td align="left"> <?=$lang_balance[5];?> </td>
                        <td align="right" class="digits"> <?=number_format($x_count_agent,2);?> </td>
                    </tr>

                    <tr>
                        <td align="left"> <?=$lang_balance[6];?> </td>
                        <td align="right" class="digits"> <?=number_format($x_count_member,2);?> </td>
                    </tr>

                     <tr>
                        <td align="left"> <?=$lang_balance[7];?> </td>
                        <td align="right" class="digits"> <?=number_format($x_count_total,2);?> </td>
                    </tr>

                    <tr>
                        <td align="left"> <?=$lang_balance[8];?> </td>
                        <td align="right" class="digits"><?=number_format($x_count3,2);?></td>
                    </tr>
                    <tr>
                        <td align="left"> <?=$lang_balance[9];?> </td>
                        <td align="right" class="digits">  <?
                                $sql="select sum(b_total) as xtotal from bom_tb_football_bill where r_agent_id like '%*".$_POST["session"]["r_id"]."*%' and b_status=5";
                                $re1=sql_array($sql);

                                $sql="select sum(b_total) as xtotal from bom_tb_lotto_bill_live where r_agent_id like '%*".$_POST["session"]["r_id"]."*%' and b_status=5";
                                $re2=sql_array($sql);
                                echo number_format($re1["xtotal"]+$re2["xtotal"]);          
                        ?> </td>
                    </tr>
                    <tr>
                        <td align="left"> <?=$lang_balance[10];?> </td>
                        <td align="right" class="digits"> 361,311.62 </td>
                    </tr>
                    <tr>
                        <td align="left"> <?=$lang_balance[11];?> </td>
                        <td align="right" class="digits" style="color: rgb(204, 0, 0);"> -2,075,287.61 </td>
                    </tr>
                    <tr>
                        <td align="left"> <?=$lang_balance[12];?> </td>
                        <td align="right" class="digits"> 1,713,975.99 </td>
                    </tr>              
                </tbody>
                <thead>
                    <tr>
                        <th colspan="2"><center><?=$lang_balance[13];?></center></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="left"><?=$lang_balance[13];?></td>
                        <td align="right" class=""> <?=$lang_balance[14];?> </td>
                    </tr>
                    <tr>
                        <td align="left"><?=$lang_balance[15];?></td>
                        <td align="right" class=""> <?=$lang_balance[16];?> </td>
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



