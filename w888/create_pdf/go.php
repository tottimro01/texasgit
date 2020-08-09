<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('fpdf181/fpdf.php');

$_SESSION["sum_2up"] = array();
$_SESSION["sum_2down"] = array();
class PDF extends FPDF
{

// Load data
function LoadData($file)
{
	// Read file lines
	//$lines = file($file);
	$data = array();

	for($i=0;$i<=49;$i++){
	/*
		if($i<10){
			$num = "0".$i;
		}else{
			$num = $i;
		}
		*/
		$num =sprintf("%02d",$i);
		
		
		$data[$i][0] = $num;
		$data[$i][1] = "1.00";
		$data[$i][2] = "1.00";

		$data[$i][3] = $num+50;
		$data[$i][4] = "1.00";
		$data[$i][5] = "1.00";
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
		$this->Cell($w[1],4.5,$row[1],1,0,'C');
		$this->Cell($w[2],4.5,$row[2],1,0,'C');
		$this->Cell(10,4.5,'',0,0,'C');
		$this->Cell($w[0],4.5,$row[3],1,0,'C');
		$this->Cell($w[1],4.5,$row[4],1,0,'C');
		$this->Cell($w[2],4.5,$row[5],1,0,'C');
		$this->Ln();
	}
}
function ChapterTitle($num, $label)
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

function PrintChapter($num, $title, $file)
{
	

	
	$header = array('หมายเลข', 'สองตัวบน', 'สองตัวล่าง');
	$data = $this->LoadData($file);

	$arr_sum1 = array();
	$arr_sum2 = array();

	foreach($data as $dds)
	{
		$arr_sum1[] = $dds[1];
		$arr_sum1[] = $dds[4];
		$arr_sum2[] = $dds[2];
		$arr_sum2[] = $dds[5];
	}

	$up2s = @array_sum($arr_sum1);
	$down2s = @array_sum($arr_sum2);
	
	$this->AddPage();

	$this->ChapterTitle($num,$title);
	$this->BasicTable($header,$data);
	$this->ChapterFooter($up2s ,$down2s);

	$_SESSION["sum_2up"][] = $up2s;
	$_SESSION["sum_2down"][] = $down2s;


}

function PrintEnd($num, $title, $file)
{
	
	$this->AddPage();

	$this->ChapterTitle($num,$title);

	$up2s = @array_sum($_SESSION["sum_2up"]);
	$down2s = @array_sum($_SESSION["sum_2down"]);

	$up2t = "รวมสองตัวบน : ".number_format($up2s,2);
	$down2t = "รวมสองตัวล่าง : ".number_format($down2s,2);
	$all2t = "รวมทั้งหมด : ".number_format($up2s+$down2s,2);
	//$this->Ln(5);
	$this->SetFont('angsab','',18);

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

}



$pdf = new PDF();


$pdf->PrintChapter(1,'24 มี.ค. 2559 ช่อง 9 รอบ 1 (เช้า) ตำแหน่ง i1','1');
$pdf->PrintChapter(2,'24 มี.ค. 2559 ช่อง 9 รอบ 1 (เช้า) ตำแหน่ง i2','2');

$pdf->PrintEnd('x','สรุปยอด','x');


//$pdf->Output();
$name_file = date("ymd-Hi");
$pdf->Output("file_save/LotZX_".$name_file.".pdf","F");
$pdf->Output("LotZX.pdf","F");
?>
