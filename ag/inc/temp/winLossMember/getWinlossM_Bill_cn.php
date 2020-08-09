<?php 

$muser = $_GET["muser"];
$mlevel = $_GET["mlevel"];
$ulist = $_GET['ulist'];
// $b_date = $_GET["begin"];
// $e_date = $_GET["end"];


// if($_GET["begin"]!=""){
//   $edf=@explode('-',$b_date);
//   $edt=@explode('-',$e_date);
// }else{
//   $edf=@explode('-',_bdate());
//   $edt=@explode('-',_bdate());
// }  
  
//   $dbg=mktime(0,0,0,$edf[1],$edf[0],$edf[2]);
//   $xc1=date("d/m/Y",$dbg);
//   $xc1a=date("Y-m-d H:i:s",$dbg);
  
  
//   $dbt=mktime(23,59,59,$edt[1],$edt[0],$edt[2]);
//   $xc2=date("d/m/Y",$dbt);
//   $xc2a=date("Y-m-d H:i:s",$dbt);

$e = $_GET["begin"];
$d = $_GET["end"];


$sdd=@explode("-",$e); 
$edate=$sdd[2].'-'.$sdd[1].'-'.$sdd[0]; 

$edd=@explode("-",$d); 
$ddate=$edd[2].'-'.$edd[1].'-'.$edd[0]; 
#and play_datenow BETWEEN '$edate' and '$ddate' 
$date = " and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";


$sql = "SELECT * FROM `bom_tb_member`  where m_user = '$muser' and m_level =  '$mlevel' ";
$rs_m = sql_array($sql);
$m_id = $rs_m["m_id"];

$r_level=$rs_m['m_level'];
$ag_level=$rs_m['m_level']-1;
include("inc_ag_share.php");


// $sql = "SELECT * FROM `bom_tb_casino_bill_play` where m_id = $m_id and b_accept=1 $date order by bet_id DESC";
// $re = sql_query($sql);


 $template = "
     <thead>
       <tr>
           <th rowspan=\"2\"> ".$lang_ag[238]." </th>
           <th rowspan=\"2\"> ".$lang_ag[477]." </th>
           <th rowspan=\"2\"> ".$lang_ag[255]." </th>
           <th colspan=\"4\"> ".$lang_ag[189]." </th>
           <th colspan=\"4\"> ".$lang_ag[455]." </th>
           <th colspan=\"2\"> ".$lang_ag[1415]." </th>
       </tr>
       <tr>
           <th>".$lang_ag[190]."</th>
           <th>".$lang_ag[210]."</th>
           <th>".$lang_ag[248]."</th>
           <th>".$lang_ag[197]."</th>
           <th>".$lang_ag[190]."</th>
           <th>".$lang_ag[210]."</th>
           <th>".$lang_ag[248]."</th>
           <th>".$lang_ag[197]."</th>
           <th>".$lang_ag[210]."</th>
           <th>".$lang_ag[197]."</th>
       </tr>
    </thead>
    ";
    $data_table = "";

    $sum_total = 0;
    $sum_bonus = 0;
    $l = 0;

    $ubill = $mlevel.'_'.$muser;


    $total0 = 0;
    $total1 = 0;
    $total2 = 0;
    $total3 = 0;
    $total4 = 0;
    $total5 = 0;
    $total6 = 0;
    $total7 = 0;
    $total8 = 0;
    $total9 = 0;
    $total10 = 0;


    foreach ($lang_g["casino_share"] as $key => $value) {

     include("inc_cn_byZone.php");

     $sum0 = removeComma($sum0);

     $total0 +=intval(removeComma($sum0));
     $total1 +=intval(removeComma($sum1));
     $total2 +=intval(removeComma($sum2));
     $total3 +=intval(removeComma($sum3));
     $total4 +=intval(removeComma($sum4));
     $total5 +=intval(removeComma($sum5));
     $total6 +=intval(removeComma($sum6));
     $total7 +=intval(removeComma($sum7));
     $total8 +=intval(removeComma($sum8));
     $total9 +=intval(removeComma($sum9));
     $total10 +=intval(removeComma($sum10));

      
     $data_table .= "
       <tr>
    <td class=\"text-center tb_ball\"><a href=\"#\" onclick=\"getBill('".trim($ubill)."','cn',50,1,'".$ulist."',".$key.");\">".$value."</a></td>
    <td class=\"text-center\">".$lang_ag[172]."</td>
    <td class=\"text-right num\">"._cbp($sum0,2)."</td>
    <td class=\"text-right num\">"._cbp($sum1,2)."</td>
    <td class=\"text-right num\">"._cbp($sum2,2)."</td>
    <td class=\"text-right num\">"._cbp($sum3,2)."</td>
    <td class=\"text-right num\">"._cbp($sum4,2)."</td>
    <td class=\"text-right num\">"._cbp($sum5,2)."</td>
    <td class=\"text-right num\">"._cbp($sum6,2)."</td>
    <td class=\"text-right num\">"._cbp($sum7,2)."</td>
    <td class=\"text-right num\">"._cbp($sum8,2)."</td>
    <td class=\"text-right num\">"._cbp($sum9,2)."</td>
    <td class=\"text-right num\">"._cbp($sum10,2)."</td>
</tr>
         ";
    }
   
     $data_table .="<tfoot>
                    <tr>
                        <td colspan=\"2\" class=\"text-strong\">รวม </td>
                        <td class=\"text-right text-strong fnum\">"._cbp($total0,2)."</td>
                        <td class=\"text-right text-strong fnum\">"._cbp($total1,2)."</td>
                        <td class=\"text-right text-strong fnum\">"._cbp($total2,2)."</td>
                        <td class=\"text-right text-strong fnum\">"._cbp($total3,2)."</td>
                        <td class=\"text-right text-strong fnum\">"._cbp($total4,2)."</td>
                        <td class=\"text-right text-strong fnum\">"._cbp($total5,2)."</td>
                        <td class=\"text-right text-strong fnum\">"._cbp($total6,2)."</td>
                        <td class=\"text-right text-strong fnum\">"._cbp($total7,2)."</td>
                        <td class=\"text-right text-strong fnum\">"._cbp($total8,2)."</td>
                        <td class=\"text-right text-strong fnum\">"._cbp($total9,2)."</td>
                        <td class=\"text-right text-strong fnum\">"._cbp($total10,2)."</td>
                    </tr>
                </tfoot>";

    $full= $template.$data_table."</tbody>";







 ?>