<?
################################# บอล


 $sql="select 
 sum( 
(ROUND(  b_sum ,10))	
   ) as t1 ,
sum(
   	ROUND( 	( -b_sum )*(( $mem_share )/100) ,10)
   ) as m2 ,  
  sum(
   	ROUND( 	(  br_pay_1)*(( $mem_share )/100) ,10)
   ) as m3  , 
sum(
   	ROUND( 	( b_sum )*((b_myshare_1)/100) ,10)
   ) as r2 ,  
sum(
   	ROUND( 	(  -br_pay_1)*((b_myshare_1)/100) ,10)
   ) as r3  , 
sum(
   	ROUND( 	( b_sum )*(($keep_share)/100) ,10)
   ) as w2 ,  
sum(
   	ROUND( 	(  -br_pay_1)*(($keep_share)/100) ,10)
   ) as w3 
 from bom_tb_football_bill_live where  b_accept=1 and b_confirm != 1  and b_status=5 and b_numstep=1 and  b_zone=6   ";
$rs1=sql_array($sql);


$psum1=$rs1[t1];
$psum2=$rs1[m2];
$psum3=$rs1[m3];
$psum4=$psum2+$psum3;
$psum5=$rs1[r2];
$psum6=$rs1[r3];
$psum7=$psum5+$psum6;
$psum8=($rs1[w2]+$rs1[w3]);



$xsum1[]=$psum1;
$xsum2[]=$psum2;
$xsum3[]=$psum3;
$xsum4[]=$psum4;
$xsum5[]=$psum5;
$xsum6[]=$psum6;
$xsum7[]=$psum7;
$xsum8[]=$psum8;
?>  <tr>
        <td>
          <a href="?p=outstanding_user&g_p=bill&level=<?=$_GET['level'];?>&id=<?=$_GET['id'];?>&d=<?=$_GET['d'];?>&e=<?=$_GET['e'];?>&b=<?=$key;?>&h=<?=$key;?>">
               <?=$value;?>
            </a>  
        </td>
        <td class="aign_r"><?=_cbp($psum1,2);?></td>
        <td class="aign_r col_a"><?=_cbp($psum2,2);?></td>
        <td class="aign_r col_a"><?=_cbp($psum3,2);?></td>
        <td class="aign_r col_a"><?=_cbp($psum4,2);?></td>
        <td class="aign_r col_b"><?=_cbp($psum5,2);?></td>
        <td class="aign_r col_b"><?=_cbp($psum6,2);?></td>
        <td class="aign_r col_b"><?=_cbp($psum7,2);?></td>
        <td class="aign_r col_c"><?=_cbp($psum8,2);?></td>
  </tr>