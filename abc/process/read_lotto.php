<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require('../inc/conn.php');
require('../inc/function.php');


	$paht="sound/lothun/";
	$paht2="sound/power/";
	$dd=date("D",$time_stam);
	$ii=date("i",$time_stam);
	$hh=date("H",$time_stam);
	$hi=date("Hi",$time_stam);

	##################หวยหุ้นไทย
	if($dd!="Sat" and $dd!="Sun"){
	if($hi==1010){
echo'<audio autoplay><source src="'.$hostserver.$paht.'2/1.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1240){
###############ปิด
	}elseif($hi==1440){
echo'<audio autoplay><source src="'.$hostserver.$paht.'2/3.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1640){
###############ปิด
	}
	}
	
	
	##################หวยลาว
	if($dd=="Wed"){
	if($hi==2030){
echo'<audio autoplay><source src="'.$hostserver.$paht.'3.mp3" type="audio/mpeg">Not</audio>';
	}
	}
	
	##################หวยมาเลเซีย
 if($dd=="Wed" or  $dd=="Sat" or $dd=="Sun"){
	if($hi==1820){
echo'<audio autoplay><source src="'.$hostserver.$paht.'4.mp3" type="audio/mpeg">Not</audio>';
	}
	}
	
	##################หวยเวียดนาม

	if($hi==1821){
echo'<audio autoplay><source src="'.$hostserver.$paht.'5.mp3" type="audio/mpeg">Not</audio>';
	}
	
	##################หุ้นนิเคอิ
 if($dd!="Sat" and $dd!="Sun"){
	if($hi==940){
echo'<audio autoplay><source src="'.$hostserver.$paht.'6/1.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1315){
echo'<audio autoplay><source src="'.$hostserver.$paht.'6/2.mp3" type="audio/mpeg">Not</audio>';
	}
	}
	
		##################หุ้นฮั่งเส็ง
 if($dd!="Sat" and $dd!="Sun"){
	if($hi==1115){
echo'<audio autoplay><source src="'.$hostserver.$paht.'7/1.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1515){
echo'<audio autoplay><source src="'.$hostserver.$paht.'7/2.mp3" type="audio/mpeg">Not</audio>';
	}
	}


	##################หุ้นดาวโจนส์
 if($dd!="Sun"){
	if($hi==401){
echo'<audio autoplay><source src="'.$hostserver.$paht.'8.mp3" type="audio/mpeg">Not</audio>';
	}
	}
	
	
		##################หุ้นสิงคโปร์
 if($dd!="Sat" and $dd!="Sun"){
	if($hi==1615){
echo'<audio autoplay><source src="'.$hostserver.$paht.'9.mp3" type="audio/mpeg">Not</audio>';
	}
	}
	
		##################หุ้นอียิปต์
 if($dd=="Sun" or $dd=="Mon" or $dd=="Tue" or $dd=="Wed" or $dd=="Thu" ){
	if($hi==1822){
echo'<audio autoplay><source src="'.$hostserver.$paht.'10.mp3" type="audio/mpeg">Not</audio>';
	}
	}
	
		##################หุ้นรัสเซีย
 if($dd!="Sat" and $dd!="Sun"){
	if($hi==2230){
echo'<audio autoplay><source src="'.$hostserver.$paht.'11.mp3" type="audio/mpeg">Not</audio>';
	}
	}
		##################หุ้นเยอรมัน
 if($dd!="Sat" and $dd!="Sun"){
	if($hi==2240){
echo'<audio autoplay><source src="'.$hostserver.$paht.'12.mp3" type="audio/mpeg">Not</audio>';
	}
	}
	
			##################หุ้นอังกฤษ
 if($dd!="Sat" and $dd!="Sun"){
	if($hi==2241){
echo'<audio autoplay><source src="'.$hostserver.$paht.'13.mp3" type="audio/mpeg">Not</audio>';
	}
	}
	
			##################หุ้นเกาหลี
 if($dd!="Sat" and $dd!="Sun"){
	if($hi==1310){
echo'<audio autoplay><source src="'.$hostserver.$paht.'14.mp3" type="audio/mpeg">Not</audio>';
	}
	}
	
			##################หุ้นใต้หวัน
 if($dd!="Sat" and $dd!="Sun"){
	if($hi==1230){
echo'<audio autoplay><source src="'.$hostserver.$paht.'15.mp3" type="audio/mpeg">Not</audio>';
	}
	}
	
			##################หุ้นจีน
 if($dd!="Sat" and $dd!="Sun"){
	if($hi==1025){
echo'<audio autoplay><source src="'.$hostserver.$paht.'16/1.mp3" type="audio/mpeg">Not</audio>';
	}else	if($hi==1405){
echo'<audio autoplay><source src="'.$hostserver.$paht.'16/2.mp3" type="audio/mpeg">Not</audio>';
	}
	}
	
				##################หุ้นอินเดีย
 if($dd!="Sat" and $dd!="Sun"){
	if($hi==1701){
echo'<audio autoplay><source src="'.$hostserver.$paht.'17.mp3" type="audio/mpeg">Not</audio>';
	}
	}
	
	
	##################หวยรายวัน	
	/*
	if($hi==1203){
echo'<audio autoplay><source src="'.$hostserver.$paht.'19/1.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1303){
echo'<audio autoplay><source src="'.$hostserver.$paht.'19/2.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1403){
echo'<audio autoplay><source src="'.$hostserver.$paht.'19/3.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1503){
		echo'<audio autoplay><source src="'.$hostserver.$paht.'19/4.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1603){
		echo'<audio autoplay><source src="'.$hostserver.$paht.'19/5.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1703){
		echo'<audio autoplay><source src="'.$hostserver.$paht.'19/6.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1803){
		echo'<audio autoplay><source src="'.$hostserver.$paht.'19/7.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1903){
		echo'<audio autoplay><source src="'.$hostserver.$paht.'19/8.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==2003){
		echo'<audio autoplay><source src="'.$hostserver.$paht.'19/9.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==2103){
		echo'<audio autoplay><source src="'.$hostserver.$paht.'19/10.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==2203){
		echo'<audio autoplay><source src="'.$hostserver.$paht.'19/11.mp3" type="audio/mpeg">Not</audio>';
	}

*/

	##################จับยี่กี
	if($hi==16){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/1.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==31){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/2.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==46){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/3.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==101){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/4.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==116){
echo'<audio autoplay><source src="'.$hostserver.$paht.'18/5.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==131){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/6.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==146){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/7.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==201){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/8.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==216){
echo'<audio autoplay><source src="'.$hostserver.$paht.'18/9.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==231){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/10.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==246){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/11.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==301){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/12.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==316){
echo'<audio autoplay><source src="'.$hostserver.$paht.'18/13.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==331){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/14.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==346){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/15.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==401){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/16.mp3" type="audio/mpeg">Not</audio>';
#########################################
	}elseif($hi==616){
echo'<audio autoplay><source src="'.$hostserver.$paht.'18/17.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==631){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/18.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==646){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/19.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==701){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/20.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==716){
echo'<audio autoplay><source src="'.$hostserver.$paht.'18/21.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==731){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/22.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==746){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/23.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==801){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/24.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==816){
echo'<audio autoplay><source src="'.$hostserver.$paht.'18/25.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==831){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/26.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==846){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/27.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==901){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/28.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==916){
echo'<audio autoplay><source src="'.$hostserver.$paht.'18/29.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==931){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/30.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==946){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/31.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==1001){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/32.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1016){
echo'<audio autoplay><source src="'.$hostserver.$paht.'18/33.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1031){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/34.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==1046){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/35.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==1101){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/36.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1116){
echo'<audio autoplay><source src="'.$hostserver.$paht.'18/37.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1131){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/38.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==1146){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/39.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==1201){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/40.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1216){
echo'<audio autoplay><source src="'.$hostserver.$paht.'18/41.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1231){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/42.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==1246){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/43.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==1301){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/44.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1316){
echo'<audio autoplay><source src="'.$hostserver.$paht.'18/45.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1331){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/46.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==1346){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/47.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==1401){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/48.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1416){
echo'<audio autoplay><source src="'.$hostserver.$paht.'18/49.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1431){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/50.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==1446){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/51.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==1501){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/52.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1516){
echo'<audio autoplay><source src="'.$hostserver.$paht.'18/53.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1531){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/54.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==1546){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/55.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==1601){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/56.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1616){
echo'<audio autoplay><source src="'.$hostserver.$paht.'18/57.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1631){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/58.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==1646){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/59.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==1701){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/60.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1716){
echo'<audio autoplay><source src="'.$hostserver.$paht.'18/61.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1731){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/62.mp3" type="audio/mpeg">Not</audio>';
			}elseif($hi==1746){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/63.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==1801){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/64.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1816){
echo'<audio autoplay><source src="'.$hostserver.$paht.'18/65.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1831){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/66.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==1846){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/67.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==1901){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/68.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1916){
echo'<audio autoplay><source src="'.$hostserver.$paht.'18/69.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==1931){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/70.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==1946){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/71.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==2001){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/72.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==2016){
echo'<audio autoplay><source src="'.$hostserver.$paht.'18/73.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==2031){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/74.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==2046){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/75.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==2101){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/76.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==2116){
echo'<audio autoplay><source src="'.$hostserver.$paht.'18/77.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==2131){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/78.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==2146){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/79.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==2201){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/80.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==2216){
echo'<audio autoplay><source src="'.$hostserver.$paht.'18/81.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==2231){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/82.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==2246){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/83.mp3" type="audio/mpeg">Not</audio>';
		}elseif($hi==2301){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/84.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==2316){
echo'<audio autoplay><source src="'.$hostserver.$paht.'18/85.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==2331){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/86.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==2346){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/87.mp3" type="audio/mpeg">Not</audio>';
	}elseif($hi==0){
	echo'<audio autoplay><source src="'.$hostserver.$paht.'18/88.mp3" type="audio/mpeg">Not</audio>';
	
	}


###################ไฟออฟฟิต
/*
if($hi==1925){
	echo'<audio autoplay><source src="'.$hostserver.$paht2.'open.mp3" type="audio/mpeg">Not</audio>';
	}
	
	if($hi==825){
	echo'<audio autoplay><source src="'.$hostserver.$paht2.'close.mp3" type="audio/mpeg">Not</audio>';
	}
	*/
###################เติมน้ำและเจลพัดลม
/*
if($hi==901){
	echo'<audio autoplay><source src="'.$hostserver.$paht2.'fan900.mp3" type="audio/mpeg">Not</audio>';
	}
	
	if($hi==2101){
	echo'<audio autoplay><source src="'.$hostserver.$paht2.'fan2100.mp3" type="audio/mpeg">Not</audio>';
	}
	*/
###################ปิดประตูรั้ว
/*
if($hi==830){
	echo'<audio autoplay><source src="'.$hostserver.$paht2.'open_rua.mp3" type="audio/mpeg">Not</audio>';
	}
	
	if($hi==2030){
	echo'<audio autoplay><source src="'.$hostserver.$paht2.'close_rua.mp3" type="audio/mpeg">Not</audio>';
	}
	*/
?>  