<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require('../inc/function.php');
require('fpdf181/fpdf.php');

$_SESSION["sum_2up"] = array();
$_SESSION["sum_2down"] = array();
class PDF extends FPDF
{

// Load data
function LoadData($seti,$zone)
{
$view_date=date("d-m-Y");	
$rob=1;
$set_sum=array();
$sql="select 
*,
 (
   	   	case 
		when play_pay<=70  then  (
						ROUND( 		b_total  ,2)
		  	)
    else  (
						ROUND( 		b_total * (play_br_pay_1/70)  ,10)
	         )
    end	
   ) as s1

 from  bom_tb_lotto_hun_bill_play where  b_date='$view_date' and lot_rob='$rob'  and b_accept=1 and lot_zone = '$zone'  and lot_i like '%x$seti,%' order by play_id desc ";	
$re=sql_query($sql);
while($rs=sql_fetch($re)){
$set_sum[$rs[play_number]][$rs[lot_type]][]=$rs[s1];	
}

	$data = array();

	for($i=0;$i<=49;$i++){

		$num =sprintf("%02d",$i);
		
		
		$data["2ud"][$i][0] = $num;
		$data["2ud"][$i][1] = "".array_sum($set_sum[$num][4])."";
		$data["2ud"][$i][2] = "".array_sum($set_sum[$num][5])."";

		$data["2ud"][$i][3] = $num+50;
		$data["2ud"][$i][4] = "".array_sum($set_sum[($num+50)][4])."";
		$data["2ud"][$i][5] = "".array_sum($set_sum[($num+50)][5])."";
	}

	for($i=0;$i<=9;$i++){
		$data["rup"][$i][0] = "".array_sum($set_sum[$i][6])."";
		$data["rdown"][$i][0] = "".array_sum($set_sum[$i][7])."";

		$data["pug1"][$i][0] = "".array_sum($set_sum[$i][21])."";
		$data["pug2"][$i][0] = "".array_sum($set_sum[$i][22])."";

	}

	return $data;
}

// Simple table
function BasicTable($header, $data)
{
	$this->SetFont('angsa','',12);

	$w = array(20, 35, 35);
	// Header
	$i=0;
	foreach($header as $col){
		$this->Cell($w[$i],4.5,iconv( 'UTF-8','TIS-620',$col),1,0,'C');
		$i++;
	}
	$this->Cell(10,4.5,'',0,0,'C');
	$i=0;
	foreach($header as $col){
		$this->Cell($w[$i],4.5,iconv( 'UTF-8','TIS-620',$col),1,0,'C');
		$i++;
	}
	$this->Ln();
	// Data

	foreach($data as $row)
	{
		$this->Cell($w[0],4.5,$row[0],1,0,'C');
		$this->Cell($w[1],4.5,number_format($row[1],2),1,0,'C');
		$this->Cell($w[2],4.5,number_format($row[2],2),1,0,'C');
		$this->Cell(10,4.5,'',0,0,'C');
		$this->Cell($w[0],4.5,$row[3],1,0,'C');
		$this->Cell($w[1],4.5,number_format($row[4],2),1,0,'C');
		$this->Cell($w[2],4.5,number_format($row[5],2),1,0,'C');
		$this->Ln();
	}
}
function BasicTable2($data)
{
	$this->SetFont('angsa','',12);
	$this->Cell(90,4.5,iconv( 'UTF-8','TIS-620',"วิ่งบน"),1,0,'C');
	$this->Cell(10,4.5,'',0,0,'C');
	$this->Cell(90,4.5,iconv( 'UTF-8','TIS-620',"ปักหลักหน่วย"),1,0,'C');
	$this->Ln();
	$this->Cell(45,4.5,iconv( 'UTF-8','TIS-620',"หมายเลข"),1,0,'C');
	$this->Cell(45,4.5,iconv( 'UTF-8','TIS-620',"จำนวน"),1,0,'C');
	$this->Cell(10,4.5,'',0,0,'C');
	$this->Cell(45,4.5,iconv( 'UTF-8','TIS-620',"หมายเลข"),1,0,'C');
	$this->Cell(45,4.5,iconv( 'UTF-8','TIS-620',"จำนวน"),1,0,'C');
	$this->Ln();
	for($r=0;$r<10;$r++){
		$this->Cell(45,4.5,$r,1,0,'C');
		$this->Cell(45,4.5,number_format($data["rup"][$r][0],2),1,0,'C');
		$this->Cell(10,4.5,'',0,0,'C');
		$this->Cell(45,4.5,$r,1,0,'C');
		$this->Cell(45,4.5,number_format($data["pug1"][$r][0],2),1,0,'C');
		$this->Ln();
	}

	$this->Ln(8);


	$this->Cell(90,4.5,iconv( 'UTF-8','TIS-620',"วิ่งล่าง"),1,0,'C');
	$this->Cell(10,4.5,'',0,0,'C');
	$this->Cell(90,4.5,iconv( 'UTF-8','TIS-620',"ปักหลักสิบ"),1,0,'C');
	$this->Ln();
	$this->Cell(45,4.5,iconv( 'UTF-8','TIS-620',"หมายเลข"),1,0,'C');
	$this->Cell(45,4.5,iconv( 'UTF-8','TIS-620',"จำนวน"),1,0,'C');
	$this->Cell(10,4.5,'',0,0,'C');
	$this->Cell(45,4.5,iconv( 'UTF-8','TIS-620',"หมายเลข"),1,0,'C');
	$this->Cell(45,4.5,iconv( 'UTF-8','TIS-620',"จำนวน"),1,0,'C');
	$this->Ln();
	for($r=0;$r<10;$r++){
		$this->Cell(45,4.5,$r,1,0,'C');
		$this->Cell(45,4.5,number_format($data["rdown"][$r][0],2),1,0,'C');
		$this->Cell(10,4.5,'',0,0,'C');
		$this->Cell(45,4.5,$r,1,0,'C');
		$this->Cell(45,4.5,number_format($data["pug2"][$r][0],2),1,0,'C');
		$this->Ln();
	}
}
function ChapterTitle($seti, $label)
{
	// Arial 12

	$this->AddFont('angsa','','angsa.php');
	$this->AddFont('angsab','','angsab.php');
	$this->SetFont('angsab','',24);

	// Background color
	$this->SetFillColor(255,255,255);
	// Title
	$this->Cell(0,0,iconv( 'UTF-8','TIS-620',$label),0,1,'C',true);
	// Line break
	$this->Ln(8);
}

function ChapterFooter($up2, $down2)
{
	$up2t = "รวมสองตัวบน : ".number_format($up2,2);
	$down2t = "รวมสองตัวล่าง : ".number_format($down2,2);
	$all2t = "รวมทั้งหมด : ".number_format($up2+$down2,2);
	$this->Ln(5);
	$this->SetFont('angsab','',14);

	// Background color
	$this->SetFillColor(255,255,255);
	// Title
	$this->Cell(0,3,iconv( 'UTF-8','TIS-620',$up2t),0,1,'L',true);
	// Line break
	$this->Ln();
	$this->Cell(0,3,iconv( 'UTF-8','TIS-620',$down2t),0,1,'L',true);
	// Line break
	$this->Ln();
	$this->Cell(0,3,iconv( 'UTF-8','TIS-620',$all2t),0,1,'L',true);

}
function ChapterFooter2($runup, $rundown , $pug1 , $pug2)
{
	$runupt = "รวมวิ่งบน : ".number_format($runup,2);
	$rundownt = "รวมวิ่งล่าง : ".number_format($rundown,2);
	$pug1t = "รวมปักหลักหน่วย : ".number_format($pug1,2);
	$pug2t = "รวมปักหลักสิบ : ".number_format($pug2,2);
	$all2t = "รวมทั้งหมด : ".number_format($runup+$rundown+$pug1+$pug2,2);
	$this->Ln(5);
	$this->SetFont('angsab','',14);

	// Background color
	$this->SetFillColor(255,255,255);
	// Title
	$this->Cell(0,3,iconv( 'UTF-8','TIS-620',$runupt),0,1,'L',true);
	// Line break
	$this->Ln();
	$this->Cell(0,3,iconv( 'UTF-8','TIS-620',$rundownt),0,1,'L',true);
	// Line break
	$this->Ln();
	$this->Cell(0,3,iconv( 'UTF-8','TIS-620',$pug1t),0,1,'L',true);
	// Line break
	$this->Ln();
	$this->Cell(0,3,iconv( 'UTF-8','TIS-620',$pug2t),0,1,'L',true);
	// Line break
	$this->Ln();
	$this->Cell(0,3,iconv( 'UTF-8','TIS-620',$all2t),0,1,'L',true);

}

function PrintChapter($seti, $title,$zone)
{
	

	
	$header = array('หมายเลข', 'สองตัวบน', 'สองตัวล่าง');
	$data = $this->LoadData($seti,$zone);

	$arr_sum1 = array();
	$arr_sum2 = array();

	foreach($data["2ud"] as $dds)
	{
		$arr_sum1[] = $dds[1];
		$arr_sum1[] = $dds[4];
		$arr_sum2[] = $dds[2];
		$arr_sum2[] = $dds[5];
	}

	$up2s = @array_sum($arr_sum1);
	$down2s = @array_sum($arr_sum2);
	
	$this->AddPage();

	$this->ChapterTitle($seti ,$title);
	$this->BasicTable($header,$data["2ud"]);
	$this->ChapterFooter($up2s ,$down2s);

	$_SESSION["sum_2up"][] = $up2s;
	$_SESSION["sum_2down"][] = $down2s;

	#$this->AddPage();
	#$this->ChapterTitle($seti ,$title." อื่นๆ");
	#$this->BasicTable2($data);
	$arr_sum3 = array();
	$arr_sum4 = array();
	$arr_sum5 = array();
	$arr_sum6 = array();

	foreach($data["rup"] as $dds)
	{
		$arr_sum3[] = $dds[0];
	}
	foreach($data["rdown"] as $dds)
	{
		$arr_sum4[] = $dds[0];
	}
	foreach($data["pug1"] as $dds)
	{
		$arr_sum5[] = $dds[0];
	}
	foreach($data["pug2"] as $dds)
	{
		$arr_sum6[] = $dds[0];
	}

	$runups = @array_sum($arr_sum3);
	$rundowns = @array_sum($arr_sum4);
	$pug1s = @array_sum($arr_sum5);
	$pug2s = @array_sum($arr_sum6);

	

	$up2s = @array_sum($arr_sum1);
	$down2s = @array_sum($arr_sum2);
#	$this->ChapterFooter2($runups ,$rundowns,$pug1s,$pug2s);

	$_SESSION["sum_rup"][] = $runups;
	$_SESSION["sum_rdown"][] = $rundowns;
	$_SESSION["sum_pug1"][] = $pug1s;
	$_SESSION["sum_pug2"][] = $pug2s;
}

function PrintEnd($seti, $title)
{
	
	$this->AddPage();

	$this->ChapterTitle($seti,$title);

	$up2s = @array_sum($_SESSION["sum_2up"]);
	$down2s = @array_sum($_SESSION["sum_2down"]);

	$runups = @array_sum($_SESSION["sum_rup"]);
	$rundowns = @array_sum($_SESSION["sum_rdown"]);

	$pug1s = @array_sum($_SESSION["sum_pug1"]);
	$pug2s = @array_sum($_SESSION["sum_pug2"]);

	$up2t = "รวมสองตัวบน : ".number_format($up2s,2);
	$down2t = "รวมสองตัวล่าง : ".number_format($down2s,2);

	$runupt = "รวมวิ่งบน : ".number_format($runups,2);
	$rundownt = "รวมวิ่งล่าง : ".number_format($rundowns,2);
	$pug1t = "รวมปักหลักหน่วย : ".number_format($pug1s,2);
	$pug2t = "รวมปักหลักสิบ : ".number_format($pug2s,2);

	$all2t = "รวมทั้งหมด : ".number_format($up2s+$down2s+$runups+$rundowns+$pug1s+$pug2s,2);
	//$this->Ln(5);
	$this->SetFont('angsab','',18);

	// Background color
	$this->SetFillColor(255,255,255);
	// Title
	$this->Cell(0,3,iconv( 'UTF-8','TIS-620',$up2t),0,1,'L',true);
	// Line break
	$this->Ln();
	$this->Cell(0,3,iconv( 'UTF-8','TIS-620',$down2t),0,1,'L',true);
	
	/*
	// Line break
	$this->Ln();
	$this->Cell(0,3,iconv( 'UTF-8','TIS-620',$runupt),0,1,'L',true);
	// Line break
	$this->Ln();
	$this->Cell(0,3,iconv( 'UTF-8','TIS-620',$rundownt),0,1,'L',true);
	// Line break
	$this->Ln();
	$this->Cell(0,3,iconv( 'UTF-8','TIS-620',$pug1t),0,1,'L',true);
	// Line break
	$this->Ln();
	$this->Cell(0,3,iconv( 'UTF-8','TIS-620',$pug2t),0,1,'L',true);
	*/
	// Line break
	$this->Ln();
	$this->Cell(0,3,iconv( 'UTF-8','TIS-620',$all2t),0,1,'L',true);


}

}



$pdf = new PDF();

$rob=1;
$zone=1;

for($xx=1;$xx<=$lothun_set;$xx++){
$pdf->PrintChapter($xx ,'สายB '._cvf($time_stam, 5).' ช่อง 9 รอบ '.$rob.' ('.$lot_rob[$rob].') ตำแหน่ง i'.$xx.'', $zone);
}
#$pdf->PrintChapter(2,'24 มี.ค. 2559 ช่อง 9 รอบ 1 (เช้า) ตำแหน่ง i2','2');

$pdf->PrintEnd('','สรุปยอด');


//$pdf->Output();
$name_file = date("ymd-Hi");
$pdf->Output("file_save/OHO_".$name_file.".pdf","F");
$pdf->Output("OHO.pdf","F");
?>
