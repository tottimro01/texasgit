<?
// header("Content-type: application/json");
require('../inc/conn.php');
require('../inc/function.php');

#$menu_data = file_get_contents2("http://97.74.233.176/~maxbet/maxbet_data/Menu_data.json");
$menu_data = file_get_contents2($x_process."json/sport/Menu_data.json");
$menu_data = json_decode($menu_data, true);
$M = $menu_data['M']; 
$M = str_replace("'", "\"", $menu_data['M']);
$M = json_decode($M, true);
$use_sports = array(44, 1, 2, 5, 6, 9, 4, 24, 14, 'P', 16);

$P_E = 0;
$P_T = 0;

foreach ($M as $key => $value) {
	if(!in_array($key, $use_sports)){
		unset($M[$key]);
	}else{

		$sc = json_encode($M[$key]);
		$sc = json_decode($sc, true);

		// ตัดเมนูย่อยของฟุตบอล
		if($key==1){
			$sc_type = array('E', 'T', 'L', 'E_1X2', 'T_1X2', 'E_OE', 'T_OE', 'E_P', 'T_P');
			foreach ($sc as $key2 => $value2) {
				if(!in_array($key2, $sc_type)){
					unset($M[$key][$key2]);
				}
			}
		}

		if($key!='P'){
			$P_E += (isset($M[$key]['E_P'])) ? intval($M[$key]['E_P']) : 0;
			$P_T += (isset($M[$key]['T_P'])) ? intval($M[$key]['T_P']) : 0;
		}

		// ตัด เอาท์ไรท์
		$block_type = array('OT');
		foreach ($sc as $key3 => $value3) {
			if(in_array($key3, $block_type)){
				unset($M[$key][$key3]);
			}
		}
	}
}

$M['P']['E'] = "$P_E";
$M['P']['T'] = "$P_T";
$M['P'][':L'] = "$P_T";

$M = json_encode($M);
$menu_data['M'] = $M;
$menu_data = json_encode($menu_data);
echo($menu_data);
die();
?>
{
"DefaultVSport":"194",
"ImgSrc":"template/sportsbook/th/images/",
"SportOrder":"44,1,161,18X,43,2,8,3,4,29,5,9,6,7,11,50,47,99,10,16,26,25,18,48,49,51,30,28,24,32,22,12,14,15,17,20,33,31,23,34,21,35,36,37,38,39,40,41,19,42,13",
"IsOlympicDay":"true",
"IsEuroCupDay":"true",
"IsWorldCupDay":"true",
"ShowLiveCasino":"false",
"CanSeeVirtualSports":"false",
"M":"{'OT':{'E':'0','T':'0'},'P':{'E':'141','T':'79','L':'79'},'0':{'TV':'1','TotalLive':'16','TotalToday':'506','TotalEarly':'662'},'1':{'E':'589','T':'72','L':'1','E_1X2':'468','E_CS':'391','E_OE':'470','E_TG':'391','E_HTFT':'391','E_HTFTOE':'391','E_FGLG':'391','E_P':'141','T_1X2':'47','T_CS':'0','T_OE':'49','T_TG':'0','T_HTFT':'0','T_HTFTOE':'0','T_FGLG':'0','T_P':'14','OT':'0'},'15X':{},'151':{},'152':{},'153':{},'154':{},'161':{'T':'0','L':'0'},'164':{'T':'0'},'2':{'T':'59','T_P':'4'},'32':{},'3':{},'26':{'E':'0','T':'0','T_P':'0','OT':'0'},'4':{'T':'0'},'47':{},'28':{'E':'1','T':'1'},'5':{'E':'3','T':'8','L':'1','TV':'107159','T_P':'7','OT':'6'},'6':{'T':'3'},'7':{'T':'0','T_P':'0','OT':'0'},'8':{'E':'0','OT':'0'},'9':{'T':'99','L':'6','TV':'214414'},'22':{},'12':{},'16':{'E':'6'},'10':{'T':'0','T_P':'0','OT':'0'},'11':{'E':'0','T':'0','OT':'0'},'14':{'E':'1','T':'1'},'15':{},'17':{},'18':{},'48':{},'49':{},'51':{'T':'0'},'19':{},'20':{},'21':{},'23':{},'24':{'T':'5'},'25':{'T':'0','T_P':'0','OT':'0'},'27':{},'29':{},'30':{},'31':{},'33':{},'34':{},'35':{},'36':{},'37':{},'38':{},'39':{},'40':{},'41':{},'42':{},'43':{'T':'0','L':'0','E_Item':['Outright_1'],'T_Item':['OU_59','0_59','1_8','2_20','3_25','4_3','99_3','Parlay_14','Outright_1'],'T_P':'0','OT':'0'},'44':{'T':'8'},'45':{},'46':{},'50':{'E':'0','T':'0','T_P':'0','OT':'0'},'52':{},'53':{},'54':{},'55':{},'56':{},'99':{},'201':{},'160':{},'13':{},'999':{}}",
"MenuKey":"a5424aecd0a36b3e47748ad6a88b6ba0"
}
