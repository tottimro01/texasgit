<?
/*session_start();
require('inc/function.php');
require('inc/conn_dd.php');
if($_GET['Market']=='l' && $_GET['Sport']=='1' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['MainLeague']=='0' && $_GET['key']=='lodds'){
	echo file_get_contents2($server_soccer."UnderOver_data_L_1.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}else if($_GET['Market']=='t' && $_GET['Sport']=='1' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['key']=='dodds' && $_GET['MainLeague']=='0'){
	echo file_get_contents2($server_soccer."UnderOver_data_T_1.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}else if($_GET['Market']=='e' && $_GET['Sport']=='1' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['key']=='dodds' && $_GET['MainLeague']=='0'){
	echo file_get_contents2($server_soccer."UnderOver_data_E_1.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']."&DT=".$_GET['DT']);
	
// new ------------------------------------------------------------------------------------------
}elseif($_GET['Market']=='l' && $_GET['Sport']=='1' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['MainLeague']=='0' && $_GET['key']=='lodds'){
	echo file_get_contents2($server_soccer."UnderOver_data_LR_1.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);

}elseif($_GET['Market']=='t' && $_GET['Sport']=='1' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['key']=='dodds'){
	echo file_get_contents2($server_soccer."UnderOver_data_TR_1.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}elseif($_GET['Market']=='e' && $_GET['Sport']=='1' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['key']=='dodds'){
	echo file_get_contents2($server_soccer."UnderOver_data_ER_1.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']."&DT=".$_GET['DT']);
}

$pagename = strtolower(basename(__FILE__));
$sportId = $_GET['Sport'];
$market =  $_GET['Market'];
$savedSelectLeagueArray = (isset($_SESSION['selectleague'][$sportId][$pagename][$market]) && $_SESSION['selectleague'][$sportId][$pagename][$market]!="") ? explode(",",  $_SESSION['selectleague'][$sportId][$pagename][$market]) : array();

if($_GET['SelectLeague']=='0'){
	if(count($savedSelectLeagueArray)>0){
		$arr_League = array();
	}else{
		$arr_League = array('0');
	}
}else{
	$arr_League = explode(",", $_GET['SelectLeague']);
}
foreach ($savedSelectLeagueArray as $kl => $vl){
	if(!in_array($vl, $arr_League)){
		 $arr_League[] = $vl;
	}	
}*/
?>

<script>//parent.arr_League=<? echo json_encode($arr_League); ?>;</script>




<script type='text/javascript'>parent.NowTime='07/23/2019 00:41:32'; parent.arr_League=new Array('0');parent.IsSaveLeague=false;</script><script>if(parent.InITIAL!=null)parent.InITIAL=false;</script><script type='text/javascript'>
var Nt=[];
//กลุ่ม,b_id,ไม่รู้,b_add,b_asc,b_zone_th,b_name_1_th,b_name_2_th
Nt[0]=['0131432039','31432039','01040030M','1','83906','INTERNATIONAL CLUB FOOTBALL TOURNAMENT (IN JAPAN)','บาร์เซโลนา','เชลซี','201907230629','0','0','118732','<font color=red>LIVE</font> 06:30PM','0','','0','','False','0','0','0','0','0','0','0','66','True','False','0','False','True','0','207195835','0-0.5','0.76','-0.92','h','207195833','3.0','0.97','0.85','207195832','2.0300','3.4000','3.0000','207195830','0.0','0.7','-0.86','','207195829','1-1.5','0.97','0.85','207195823','2.6600','2.2200','3.4000'];
Nt[1]=['','31432039','','2','','','','','','','','','','0','','','','False','0','0','0','0','0','0','0','66','True','False','1','False','True','0','207196159','0.5','-0.96','0.8','h','207196307','2.5-3','0.74','-0.92','','','','','207197470','0-0.5','-0.86','0.7','h','207197534','1.0','0.65','-0.83','','','',''];
Nt[2]=['','31432039','','3','','','','','','','','','','0','','','','False','0','0','0','0','0','0','0','66','True','False','1','False','True','0','207235240','0.0','0.57','-0.73','','207235134','3-3.5','-0.81','0.63','','','','','','','','','','','','','','','','',''];
Nt[3]=['0131361225','31361225','011200','1','30546','อินเตอร์เนชั่นแนล แชมเปียนส์ คัพ','เรอัล มาดริด (แข่งสนามกลาง)','อาร์เซนอล','201907231859','1','1','1583995','<font color=red>LIVE</font> 07:00AM','1','','0','','False','0','0','0','0','0','0','0','68','True','False','3','False','True','0','206347699','0.5','-0.9','0.82','h','206347684','3-3.5','0.97','0.93','206347677','2.0900','3.5500','3.1000','206347660','0-0.5','-0.88','0.76','h','206347653','1-1.5','0.9','0.98','206347594','2.4000','2.4100','3.4500'];
Nt[4]=['','31361225','','2','','','','','','','','','','1','','','','False','0','0','0','0','0','0','0','68','True','False','1','False','True','0','207031558','0-0.5','0.81','-0.89','h','207031563','3.5','-0.83','0.73','','','','','207038990','0.0','0.63','-0.75','','207039027','1.5','-0.75','0.63','','','',''];
Nt[5]=['','31361225','','3','','','','','','','','','','1','','','','False','0','0','0','0','0','0','0','68','True','False','1','False','True','0','207200901','0.5-1','-0.73','0.65','h','207200925','3.0','0.72','-0.82','','','','','','','','','','','','','','','','',''];
Nt[6]=['0131361224','31361224','011201','1','','','บาเยิร์น มิวนิก (แข่งสนามกลาง)','เอซี มิลาน','201907232059','1','1','1596565','<font color=red>LIVE</font> 09:00AM','1','','0','','False','0','0','0','0','0','0','0','67','True','False','3','False','True','0','206347661','0.5-1','0.8','-0.88','h','206347649','3.0','0.86','-0.96','206347639','1.6400','3.7500','4.9500','206347625','0-0.5','0.77','-0.89','h','206347617','1-1.5','0.91','0.97','206347561','2.1400','2.4300','4.1500'];
Nt[7]=['','31361224','','2','','','','','','','','','','1','','','','False','0','0','0','0','0','0','0','67','True','False','1','False','True','0','207031559','1.0','-0.96','0.88','h','207031564','3-3.5','-0.89','0.79','','','','','207038999','0.5','-0.86','0.74','h','207039028','1.5','-0.75','0.63','','','',''];
Nt[8]=['','31361224','','3','','','','','','','','','','1','','','','False','0','0','0','0','0','0','0','67','True','False','1','False','True','0','207200902','0.5','0.65','-0.73','h','207200926','2.5-3','0.68','-0.78','','','','','','','','','','','','','','','','',''];
Nt[9]=['0131361230','31361230','011202','1','','','อัตเลตีโก มาดริด (แข่งสนามกลาง)','กัวดาลาจาร่า','201907232059','0','0','1596569','<font color=red>LIVE</font> 09:00AM','0','','0','','False','0','0','0','0','0','0','0','0','False','False','0','False','True','0','206347650','2.0','0.86','0.98','h','206347635','3.5','-0.99','0.81','','','','','','','','','','','','','','','','',''];
Nt[10]=['0131271454','31271454','013360','1','125','ซูเปอร์เร็ดเท่น สวีเดน','ยอนโคปิ้ง','วาสเทราส เอสเค','201907231259','1','1','107697','<font color=red>LIVE</font> 01:00AM','0','','0','','False','0','0','0','0','0','0','0','66','False','False','3','False','True','0','205283233','0.5-1','0.8','-0.88','h','205283231','2.5','0.94','0.96','205283230','1.6000','3.7500','5.4000','205283228','0-0.5','0.84','-0.96','h','205283227','1.0','0.97','0.91','205283220','2.2300','2.2000','5.1000'];
Nt[11]=['','31271454','','2','','','','','','','','','','0','','','','False','0','0','0','0','0','0','0','66','False','False','1','False','True','0','205840577','1.0','-0.88','0.8','h','205840596','2-2.5','0.75','-0.85','','','','','205873648','0.5','-0.8','0.68','h','205874076','0.5-1','0.62','-0.74','','','',''];
Nt[12]=['0131414479','31414479','014230','1','13','ยูฟ่า แชมเปียนส์ลีก รอบคัดเลือก','วิคตอเรีย พัลเซ่น','โอลิมเปียกอส','201907231259','1','0','1596669','<font color=red>LIVE</font> 01:00AM','0','','0','','False','0','0','0','0','0','0','0','11','False','False','0','False','True','0','206925210','0-0.5','-0.9','0.74','h','206925195','2-2.5','-0.94','0.76','206925184','2.3100','3.1000','2.7400','206925170','0.0','0.75','-0.91','','206925163','0.5-1','0.79','-0.97','206925109','3.1000','1.8800','3.7500'];
Nt[13]=['0131428474','31428474','014231','1','','','FC ซาเบอร์ทาโล ทบิลิซี (แข่งสนามกลาง)','ดินาโม ซาเกร็บ','201907231329','1','0','0','<font color=red>LIVE</font> 01:30AM','0','','0','','False','0','0','0','0','0','0','0','3','True','False','0','False','True','0','207114872','1.5','-0.85','0.69','a','207114870','3.0','-0.85','0.67','207114869','11.0000','5.7000','1.1900','207114867','0.5-1','0.79','-0.95','a','207114866','1-1.5','-0.88','0.7','207114860','7.0000','2.5000','1.7300'];
Nt[14]=['0131414481','31414481','014232','1','','','พีเอสวี ไอนด์โฮเฟ่น','บาเซิ่ล','201907231359','1','0','0','<font color=red>LIVE</font> 02:00AM','0','','0','','False','0','0','0','0','0','0','0','11','True','False','0','False','True','0','206926153','1.0','0.82','-0.98','h','206926138','2.5','0.7','-0.88','206926127','1.4700','4.2000','5.0000','206926111','0.5','-0.96','0.8','h','206926106','1.0','0.83','0.99','206926055','2.0300','2.2600','5.4000'];
Nt[15]=['0131414483','31414483','014233','1','','','เดอะ นิว เซนต์ส','เอฟซี โคเปนเฮเกน','201907231359','1','0','0','<font color=red>LIVE</font> 02:00AM','0','','0','','False','0','0','0','0','0','0','0','11','True','False','0','False','True','0','206927444','1.5','-0.9','0.74','a','206927423','2.5-3','0.85','0.97','206927406','8.2000','5.4000','1.2300','206927389','0.5','-0.86','0.7','a','206927379','1-1.5','-0.93','0.75','206927296','7.6000','2.5000','1.7000'];
Nt[16]=['0131414480','31414480','014234','1','','','ซูตเยสก้า นิคซิค','อโปเอล นิโคเซีย','201907231414','1','0','1598487','<font color=red>LIVE</font> 02:15AM','0','','0','','False','0','0','0','0','0','0','0','11','False','False','0','False','True','0','206928256','1.0','0.92','0.92','a','206928232','2-2.5','0.96','0.86','206928215','5.6000','3.7000','1.4900','206928189','0.5','0.71','-0.87','a','206928176','1.0','-0.88','0.7','206928078','5.9000','2.0700','2.1400'];
Nt[17]=['0131415652','31415652','014300','1','8922','ยูฟ่า ยูโรป้า ลีก รอบคัดเลือก','FC อารารัท อาร์เมเนีย','เอฟซี ลินคอล์น','201907231059','1','0','1596671','<font color=red>LIVE</font> 11:00PM','0','','0','','False','0','0','0','0','0','0','0','11','False','False','0','False','True','0','206984479','1.5-2','0.85','0.99','h','206984414','2.5-3','0.79','-0.97','206984365','1.1900','6.3000','8.1000','206984279','0.5-1','0.84','1','h','206984247','1-1.5','-0.93','0.75','206983948','1.6000','2.6500','8.5000'];
Nt[18]=['0131415678','31415678','014301','1','','','เอชบี ทอร์ชาฟน์','ลินฟีลด์','201907231144','1','0','0','<font color=red>LIVE</font> 11:45PM','0','','0','','False','0','0','0','0','0','0','0','3','True','False','0','False','True','0','206984680','0.0','0.62','-0.78','','206984625','2-2.5','0.9','0.92','206984586','2.1400','3.0500','3.0500','206984514','0.0','0.78','-0.94','','206984477','1.0','-0.88','0.7','206984181','3.0500','1.9600','3.5500'];
Nt[19]=['0131428229','31428229','014303','1','','','สเคดิยา (แข่งสนามกลาง)','F91 ดูเดแล็งก์','201907231154','1','0','0','<font color=red>LIVE</font> 11:55PM','0','','0','','False','0','0','0','0','0','0','0','11','True','False','0','False','True','0','207110836','0.5-1','0.75','-0.91','h','207110827','2.5','0.97','0.85','207110821','1.5700','3.5500','5.1000','207110812','0-0.5','0.81','-0.97','h','207110808','1.0','0.96','0.86','207110776','2.1300','2.1500','5.4000'];
parent.ShowBetList('W','07/23/2019 00:41:33','t',Nt);
parent.updateHour('00',false);
</script><script>
Nt[20]=['0131431451','31431451','014304','1','','','เอฟซี ซานต้า โคโลม่า (แข่งสนามกลาง)','แอสตาน่า','201907231359','1','0','0','<font color=red>LIVE</font> 02:00AM','0','','0','','False','0','0','0','0','0','0','0','11','True','False','0','False','True','0','207184514','1.5-2','-0.91','0.75','a','207184508','3.0','-0.98','0.8','207184503','10.0000','5.7000','1.1800','207184497','0.5-1','-0.99','0.83','a','207184494','1-1.5','-0.93','0.75','207184472','8.1000','2.6600','1.6000'];
Nt[21]=['0131431458','31431458','014305','1','','','เตร เพนน์ (แข่งสนามกลาง)','ซูดูว่า','201907231429','1','0','0','<font color=red>LIVE</font> 02:30AM','0','','0','','False','0','0','0','0','0','0','0','11','True','False','0','False','True','0','207186728','2.0','-0.92','0.76','a','207186726','3.0','0.91','0.91','207186725','14.0000','7.0000','1.1100','207186723','1.0','0.65','-0.81','a','207186722','1-1.5','0.91','0.91','207186716','8.5000','2.8000','1.5500'];
Nt[22]=['0131428796','31428796','014380','1','132','ลีกคัพ สก็อตแลนด์','อัลเบี้ยน โรเวอร์ส','เซนต์ เมียร์เรน','201907231444','1','0','0','<font color=red>LIVE</font> 02:45AM','0','','0','','False','0','0','0','0','0','0','0','11','False','False','0','False','True','0','207147214','1-1.5','0.94','0.9','a','207147190','2.5-3','0.84','0.98','207147172','6.4000','4.3500','1.3600','207147143','0.5','0.92','0.92','a','207147132','1-1.5','-0.9','0.72','207147028','6.1000','2.3200','1.9100'];
Nt[23]=['0131428805','31428805','014381','1','','','อัลลัว แอธเลติก','สแตร์ลิ่ง อัลเบี้ยน','201907231444','1','0','0','07/24 02:45AM','0','','0','','False','0','0','0','0','0','0','0','11','False','False','0','False','True','0','207147000','1.5-2','0.79','-0.95','h','207146978','3-3.5','0.81','-0.99','207146963','1.1900','5.9000','9.3000','207146940','0.5-1','0.91','0.93','h','207146930','1.5','-0.88','0.7','207146859','1.6200','2.7000','7.6000'];
Nt[24]=['0131428797','31428797','014382','1','','','แอนนัน แอธเลติก','กรีน็อค มอร์ตัน','201907231444','1','0','0','07/24 02:45AM','0','','0','','False','0','0','0','0','0','0','0','11','False','False','0','False','True','0','207147267','0.5','0.87','0.97','a','207147241','2.5-3','0.88','0.94','207147220','3.1000','3.5000','1.9600','207147192','0-0.5','0.72','-0.88','a','207147179','1-1.5','-0.88','0.7','207147078','3.8000','2.1800','2.5200'];
Nt[25]=['0131428810','31428810','014383','1','','','เบอร์วิค เรนเจอร์ส','ฟัลเคิร์ก','201907231444','1','0','0','07/24 02:45AM','0','','0','','False','0','0','0','0','0','0','0','1','False','False','0','False','True','0','207147875','3.5','-0.65','0.49','a','207147836','4.5-5','0.69','-0.87','','','','','','','','','','','','','','','','',''];
Nt[26]=['0131428801','31428801','014384','1','','','ดัมบาร์ตัน','มาเธอร์เวลล์','201907231444','1','0','0','<font color=red>LIVE</font> 02:45AM','0','','0','','False','0','0','0','0','0','0','0','11','False','False','0','False','True','0','207148236','2-2.5','-0.96','0.8','a','207148205','3.5','0.89','0.93','207148183','15.0000','8.2000','1.0800','207148145','1.0','0.83','-0.99','a','207148131','1.5','0.92','0.9','207148005','9.7000','3.0500','1.4600'];
Nt[27]=['0131428806','31428806','014385','1','','','ดันดี ยูไนเต็ด','อีสต์ ไฟฟ์','201907231444','1','0','0','<font color=red>LIVE</font> 02:45AM','0','','0','','False','0','0','0','0','0','0','0','11','False','False','0','False','True','0','207146906','1.5','0.79','-0.95','h','207146891','3.0','0.95','0.87','207146880','1.2300','5.2000','9.2000','207146858','0.5-1','-0.9','0.74','h','207146850','1-1.5','0.97','0.85','207146771','1.7500','2.4800','6.9000'];
Nt[28]=['0131428802','31428802','014386','1','','','อีดินเบิร์ก ซิตี้','อีสท์ คิลบริด','201907231444','1','0','0','07/24 02:45AM','0','','0','','False','0','0','0','0','0','0','0','11','False','False','0','False','True','0','207147358','1-1.5','0.84','1','h','207147330','2.5-3','0.82','1','207147312','1.3400','4.4500','6.7000','207147280','0.5','0.88','0.96','h','207147270','1-1.5','-0.9','0.72','207147161','1.8700','2.3600','6.2000'];
Nt[29]=['0131428804','31428804','014387','1','','','ฮิเบอร์เนียน','อาร์บรอท','201907231444','1','0','0','<font color=red>LIVE</font> 02:45AM','0','','0','','False','0','0','0','0','0','0','0','11','False','False','0','False','True','0','207147065','1-1.5','0.66','-0.82','h','207147038','2.5-3','0.7','-0.88','207147023','1.2700','5.0000','7.5000','207146999','0.5','0.72','-0.88','h','207146988','1-1.5','-0.96','0.78','207146910','1.7200','2.5000','7.2000'];
Nt[30]=['0131428799','31428799','014388','1','','','อินเวอร์เนสส์ คาเลโดเนียน ธิสเซิล','โคฟ เรนเจอร์','201907231444','1','0','0','07/24 02:45AM','0','','0','','False','0','0','0','0','0','0','0','11','False','False','0','False','True','0','207147116','1.5-2','0.71','-0.87','h','207147089','3.0','0.79','-0.97','207147068','1.1500','6.4000','12.0000','207147043','0.5-1','0.82','-0.98','h','207147031','1-1.5','0.89','0.93','207146947','1.5600','2.7300','9.2000'];
Nt[31]=['0131428807','31428807','014389','1','','','เรธโรเวอร์ส','ปีเตอร์เฮด','201907231444','1','0','0','07/24 02:45AM','0','','0','','False','0','0','0','0','0','0','0','11','False','False','0','False','True','0','207147752','0-0.5','-0.93','0.77','h','207147720','2.5','0.95','0.87','207147699','2.2500','3.2500','2.7200','207147669','0.0','0.79','-0.95','','207147651','1.0','0.95','0.87','207147528','2.9600','2.0500','3.4000'];
Nt[32]=['0131428798','31428798','014390','1','','','สแตรนแรร์','ลิฟวิงสตัน','201907231444','1','0','0','07/24 02:45AM','0','','0','','False','0','0','0','0','0','0','0','11','False','False','0','False','True','0','207147369','1-1.5','-0.9','0.74','a','207147343','2.5-3','0.84','0.98','207147323','7.2000','4.6000','1.3100','207147297','0.5','0.98','0.86','a','207147283','1-1.5','-0.9','0.72','207147185','6.3000','2.3800','1.8500'];
Nt[33]=['0131438189','31438189','014810','1','65832','แอลป์ ฟุตบอล เฟสติวัล (ที่ สวิสเซอร์แลนด์)','เอฟซี ซิยง','บาเลนเซีย','201907231244','0','0','0','<font color=red>LIVE</font> 12:45AM','0','','0','','False','0','0','0','0','0','0','0','67','False','False','0','False','True','0','207224491','0.5','-0.97','0.81','a','207224489','2.5','0.91','0.91','207224488','3.7000','3.4000','1.8000','207224486','0-0.5','0.8','-0.96','a','207224485','1.0','0.91','0.91','207224478','4.1500','2.1500','2.4000'];
Nt[34]=['0131428530','31428530','015440','1','24778','เยอรมัน ลีก บาวาเรีย','SV ซาลดิง ไฮน์นิ้ง','TSV Aubstadt','201907231229','1','0','0','<font color=red>LIVE</font> 12:30AM','0','','0','','False','0','0','0','0','0','0','0','11','False','False','0','False','True','0','207118035','0-0.5','0.94','0.9','h','207118010','2.5-3','0.84','0.98','207117989','2.0900','3.3000','2.9400','207117963','0.0','0.68','-0.84','','207117946','1-1.5','-0.91','0.73','207117826','2.7300','2.1000','3.6000'];
Nt[35]=['0131428537','31428537','015441','1','','','VfR การ์ชิง','SV Turkgucu Ataspor Munchen','201907231229','1','0','0','<font color=red>LIVE</font> 12:30AM','0','','0','','False','0','0','0','0','0','0','0','11','False','False','0','False','True','0','207117969','1.5','-0.95','0.79','a','207117945','3.0','0.84','0.98','207117926','8.3000','5.3000','1.2400','207117899','0.5-1','0.7','-0.86','a','207117884','1-1.5','0.82','1','207117771','6.0000','2.5000','1.8100'];
Nt[36]=['0131428531','31428531','015442','1','','','วิคตอเรีย แอสเชฟเฟนเบิร์ก','VFB ไอช์สตัตท์','201907231229','1','0','0','<font color=red>LIVE</font> 12:30AM','0','','0','','False','0','0','0','0','0','0','0','11','False','False','0','False','True','0','207118306','0.0','-0.94','0.78','','207118281','3.0','0.89','0.93','207118263','2.6600','3.2500','2.2800','207118239','0.0','-0.94','0.78','','207118230','1-1.5','0.92','0.9','207118136','3.3000','2.1500','2.8400'];
Nt[37]=['0131428546','31428546','015443','1','','','เมมมินเก้น','SpVgg เบย์เริดส์','201907231259','1','0','0','<font color=red>LIVE</font> 01:00AM','0','','0','','False','0','0','0','0','0','0','0','11','False','False','0','False','True','0','207118436','0.0','-0.92','0.76','','207118417','3.0','0.94','0.88','207118402','2.6900','3.2500','2.2600','207118379','0.0','0.97','0.87','','207118366','1-1.5','0.94','0.88','207118256','3.1500','2.1500','2.9800'];
Nt[38]=['0131428532','31428532','015444','1','','','ชไวน์เฟิร์ต 05','บวร์กเฮาเซ่น','201907231259','1','0','0','<font color=red>LIVE</font> 01:00AM','0','','0','','False','0','0','0','0','0','0','0','11','False','False','0','False','True','0','207119148','0.5-1','0.93','0.91','h','207119146','3.0','0.94','0.88','207119145','1.7100','3.6000','3.8500','207119143','0-0.5','0.82','-0.98','h','207119142','1-1.5','0.94','0.88','207119135','2.1100','2.3000','4.9000'];
Nt[39]=['0131428539','31428539','015445','1','','','SV Heimstetten','กรอยเธอร์ เฟือร์ธ AM','201907231259','1','0','0','<font color=red>LIVE</font> 01:00AM','0','','0','','False','0','0','0','0','0','0','0','11','False','False','0','False','True','0','207118462','0-0.5','0.8','-0.96','a','207118444','3.0','0.94','0.88','207118429','2.7300','3.3500','2.2000','207118409','0.0','-0.92','0.76','','207118398','1-1.5','0.94','0.88','207118291','3.3500','2.1500','2.8100'];
Nt[40]=['0131428534','31428534','015446','1','','','ทีเอสวี 1860 โรเซนไฮม์','TSV ไรน์ แอม เลช','201907231259','1','0','0','<font color=red>LIVE</font> 01:00AM','0','','0','','False','0','0','0','0','0','0','0','11','False','False','0','False','True','0','207118295','0.0','0.79','-0.95','','207118271','3.0','0.88','0.94','207118254','2.3000','3.2500','2.6400','207118231','0.0','0.9','0.94','','207118219','1-1.5','0.98','0.84','207118130','3.1000','2.0900','3.1500'];
Nt[41]=['0131428543','31428543','015447','1','','','TSV บูกบาก','เนิร์นแบร์ก AM','201907231259','1','0','0','<font color=red>LIVE</font> 01:00AM','0','','0','','False','0','0','0','0','0','0','0','11','False','False','0','False','True','0','207118472','0.0','0.88','0.96','','207118454','3.0','0.94','0.88','207118439','2.4100','3.2500','2.5100','207118422','0.0','0.81','-0.97','','207118412','1-1.5','0.94','0.88','207118313','2.8900','2.1500','3.2500'];
Nt[42]=['0131363486','31363486','016980','1','278','โคป้า ลิเบอร์ทาโดเรส','ริเวอร์เพลท','ครูไซโร่ MG','201907231814','1','1','1583911','<font color=red>LIVE</font> 06:15AM','0','','0','','False','0','0','0','0','0','0','0','67','True','False','3','False','True','0','206413105','0.5','0.78','-0.88','h','206413092','2.0','0.82','-0.94','206413081','1.7700','3.2500','4.8500','206413070','0-0.5','-0.96','0.84','h','206413064','0.5-1','0.8','-0.92','206413010','2.5800','1.9600','4.9500'];
Nt[43]=['','31363486','','2','','','','','','','','','','0','','','','False','0','0','0','0','0','0','0','67','True','False','1','False','True','0','207211238','0.5-1','-0.94','0.84','h','207211201','2-2.5','-0.82','0.7','','','','','207211240','0.5','-0.62','0.5','h','207211202','1.0','-0.68','0.56','','','',''];
Nt[44]=['0131363487','31363487','016981','1','','','โกดอย ครูซ','พัลไมรัส SP','201907232029','1','1','1596549','<font color=red>LIVE</font> 08:30AM','0','','0','','False','0','0','0','0','0','0','0','67','True','False','3','False','True','0','206413124','0.5','0.93','0.97','a','206413110','2-2.5','-0.95','0.83','206413102','3.8500','3.2500','1.9600','206413089','0-0.5','0.72','-0.84','a','206413083','0.5-1','0.85','-0.97','206413030','4.7500','1.9500','2.6600'];
Nt[45]=['','31363487','','2','','','','','','','','','','0','','','','False','0','0','0','0','0','0','0','67','True','False','1','False','True','0','207211243','0-0.5','-0.8','0.7','a','207211237','2.0','0.76','-0.88','','','','','207211244','0.0','-0.62','0.5','','207211239','1.0','-0.74','0.62','','','',''];
Nt[46]=['0131363488','31363488','016982','1','','','แอลดียู คีย์โต','โอลิมเปีย อาซันซิออง','201907232029','1','1','1596551','<font color=red>LIVE</font> 08:30AM','0','','0','','False','0','0','0','0','0','0','0','67','True','False','3','False','True','0','206413062','0.5','0.8','-0.9','h','206413049','2-2.5','-0.94','0.82','206413042','1.7900','3.3500','4.5000','206413029','0-0.5','-0.94','0.82','h','206413024','0.5-1','0.79','-0.91','206412975','2.5300','2.0000','4.9000'];
Nt[47]=['','31363488','','2','','','','','','','','','','0','','','','False','0','0','0','0','0','0','0','67','True','False','1','False','True','0','207211245','0.5-1','-0.94','0.84','h','207211241','2.0','0.76','-0.88','','','','','207211246','0.5','-0.64','0.52','h','207211242','1.0','-0.74','0.62','','','',''];
Nt[48]=['0131344462','31344462','017020','1','330','โคป้า ซูดาเมริกาน่า','ซูเลีย','สปอร์ติ้งคริสตัล','201907231559','1','1','1584001','<font color=red>LIVE</font> 04:00AM','0','','0','','False','0','0','0','0','0','0','0','66','True','False','3','False','True','0','206072912','0.0','0.89','-0.99','','206072905','2.0','-0.95','0.83','206072899','2.6600','2.8500','2.8300','206072892','0.0','0.8','-0.92','','206072888','0.5-1','0.93','0.95','206072861','3.3000','1.8500','3.8500'];
Nt[49]=['','31344462','','2','','','','','','','','','','0','','','','False','0','0','0','0','0','0','0','66','True','False','1','False','True','0','207211219','0-0.5','-0.82','0.72','h','207211211','1.5-2','0.73','-0.85','','','','','207211225','0-0.5','-0.62','0.5','h','207211216','1.0','-0.68','0.56','','','',''];
Nt[50]=['0131344463','31344463','017021','1','','','เพนาโรล','ฟลูมิเนนเซ RJ','201907232029','1','1','1596555','<font color=red>LIVE</font> 08:30AM','0','','0','','False','0','0','0','0','0','0','0','67','False','False','3','False','True','0','206072909','0.5','-0.97','0.87','h','206072902','2.0','-0.95','0.83','206072897','2.0200','2.9900','4.0000','206072889','0-0.5','-0.83','0.71','h','206072886','0.5-1','0.98','0.9','206072860','2.8200','1.8300','5.0000'];
Nt[51]=['','31344463','','2','','','','','','','','','','0','','','','False','0','0','0','0','0','0','0','67','False','False','1','False','True','0','207211230','0-0.5','0.72','-0.82','h','207211223','1.5-2','0.73','-0.85','','','','','207211232','0.0','0.5','-0.62','','207211226','1.0','-0.68','0.56','','','',''];
Nt[52]=['0131413237','31413237','017141','1','650','บราซิล ซีรี่ย์บี','กอริติบ้า PR','วิลา โนวา GO','201907231814','1','0','0','<font color=red>LIVE</font> 06:15AM','0','','0','','False','0','0','0','0','0','0','0','67','False','False','0','False','True','0','206901199','0.5','0.87','-0.97','h','206901189','2.0','0.98','0.9','206901180','1.8600','3.0500','4.3000','206901171','0-0.5','-0.94','0.82','h','206901166','0.5-1','0.94','0.94','206901120','2.5800','1.9000','4.8500'];
Nt[53]=['','31413237','','2','','','','','','','','','','0','','','','False','0','0','0','0','0','0','0','67','False','False','1','False','True','0','207226978','0.5-1','-0.82','0.72','h','207227106','1.5-2','0.69','-0.81','','','','','207226979','0.5','-0.62','0.5','h','207227105','1.0','-0.67','0.55','','','',''];
Nt[54]=['0131413238','31413238','017142','1','','','ฟิกูเรนเซ่ SC','ปาราน่า PR','201907231814','1','0','0','<font color=red>LIVE</font> 06:15AM','0','','0','','False','0','0','0','0','0','0','0','67','False','False','0','False','True','0','206901188','0.5','-0.97','0.87','h','206901178','2.0','0.95','0.93','206901169','2.0200','3.0000','3.6500','206901157','0-0.5','-0.84','0.72','h','206901153','0.5-1','0.88','1','206901111','2.7400','1.8800','4.5000'];
Nt[55]=['','31413238','','2','','','','','','','','','','0','','','','False','0','0','0','0','0','0','0','67','False','False','1','False','True','0','207226980','0-0.5','0.72','-0.82','h','207227108','1.5-2','0.68','-0.8','','','','','207226981','0.0','0.55','-0.67','','207227107','1.0','-0.72','0.6','','','',''];
Nt[56]=['0131413236','31413236','017143','1','','','กัวรานี่ SP','คุยอาบา MT','201907231814','1','0','0','<font color=red>LIVE</font> 06:15AM','0','','0','','False','0','0','0','0','0','0','0','66','False','False','0','False','True','0','206901187','0-0.5','0.97','0.93','h','206901177','2.0','0.98','0.9','206901168','2.2100','2.9500','3.2500','206901158','0.0','0.73','-0.85','','206901154','0.5-1','0.93','0.95','206901108','3.1500','1.8100','4.0000'];
Nt[57]=['','31413236','','2','','','','','','','','','','0','','','','False','0','0','0','0','0','0','0','66','False','False','1','False','True','0','207227102','0.0','0.63','-0.73','','207227110','1.5-2','0.68','-0.8','','','','','207227233','0-0.5','-0.72','0.6','h','207227109','1.0','-0.72','0.6','','','',''];
Nt[58]=['0131413239','31413239','017144','1','','','เซา เบนโต้ SP','โอเปราริโอ้ เฟอร์โรเวียริโอ้ อีซี','201907231814','1','0','0','<font color=red>LIVE</font> 06:15AM','0','','0','','False','0','0','0','0','0','0','0','66','False','False','0','False','True','0','206901167','0.0','0.82','-0.92','','206901155','2.0','0.93','0.95','206901149','2.4800','2.9000','2.8500','206901137','0.0','0.76','-0.88','','206901132','0.5-1','0.88','1','206901089','3.1500','1.8400','3.8500'];
Nt[59]=['','31413239','','2','','','','','','','','','','0','','','','False','0','0','0','0','0','0','0','66','False','False','1','False','True','0','207227104','0-0.5','-0.84','0.74','h','207227112','1.5-2','0.68','-0.8','','','','','207227103','0-0.5','-0.65','0.53','h','207227111','1.0','-0.72','0.6','','','',''];

window.setTimeout("parent.ShowBetList('W','07/23/2019 00:41:26','t',Nt)",10);
//201235478261
parent.updateHour('00',false);
</script><script> parent.REFRESH_INTERVAL_L=20000; parent.REFRESH_INTERVAL_D=90000; parent.REFRESH_INTERVAL=90000 ; </script>