<? 
require("/home/ohoking/domains/texasbetx.com/public_html/w888/admin_lang/export/lang_member_".$_SESSION['lang'].".php");
$sx_file = $_SESSION['lang'];

$lang_banks = array(1 => $lang_member[663], 2 => $lang_member[664], 3 => $lang_member[665], 4 => $lang_member[666], 5 => $lang_member[667], 6 => $lang_member[668]);

##############################################################################################
#############################################TRANFER##########################################
##############################################################################################
$lang_months = array($lang_member[1218], $lang_member[1219], $lang_member[1220], $lang_member[1221], $lang_member[1222], $lang_member[1223], $lang_member[1224], $lang_member[1225], $lang_member[1226], $lang_member[1227], $lang_member[1228], $lang_member[1229]);
$lang_months_short = array($lang_member[1230], $lang_member[1231], $lang_member[1232], $lang_member[1233], $lang_member[1234], $lang_member[1235], $lang_member[1236], $lang_member[1237], $lang_member[1238], $lang_member[1239], $lang_member[1240], $lang_member[1241]);
$lang_days = array($lang_member[1242], $lang_member[1243], $lang_member[1244], $lang_member[1245], $lang_member[1246], $lang_member[1247], $lang_member[1248]);
$lang_days_short = array($lang_member[1249], $lang_member[1250], $lang_member[1251], $lang_member[1252], $lang_member[1253], $lang_member[1254], $lang_member[1255]);


##############################################################################################
#############################################CASINO###########################################
##############################################################################################

$ca_status= array(1 =>  $lang_member[780],$lang_member[780]."½",$lang_member[346],$lang_member[783],$lang_member[783]."½",$lang_member[65],$lang_member[352] ); 
$ca_type= array(1 =>  $lang_member[355],$lang_member[355],$lang_member[355],$lang_member[355],$lang_member[355],$lang_member[355],$lang_member[355]
 ,21 =>  $lang_member[1214],$lang_member[1214],$lang_member[1214]
 ,31 =>  $lang_member[1215]." ".$lang_member[1216],$lang_member[1215]." ".$lang_member[1216],$lang_member[1215]." ".$lang_member[1216]
 ,51 =>  $lang_member[1217],$lang_member[1217],$lang_member[1217] ); 
 
 $ca_id= array(1 =>  "BAC","BAC","BAC","BAC","BAC","BAC","BAC"
 ,21 =>  "InsBAC","InsBAC","InsBAC"
 ,31 =>  "DT","DT","DT"
 ,51 =>  "SIC","SIC","SIC" ); 
  $ca_bet[1]= array(1 =>  "BAC","BAC","BAC","BAC","BAC","BAC","BAC"
 ,21 =>  "InsBAC","InsBAC","InsBAC"
 ,31 =>  "DT","DT","DT"
 ,51 =>  "Sic Bo","Sic Bo","Sic Bo" ); 
 
$ca_txt[1] = array(1=>$lang_member[361] , 2=>$lang_member[359]  , 3=>$lang_member[220] , 4=>$lang_member[1263] , 5=>$lang_member[1264] , 6=>$lang_member[1265] , 7=>$lang_member[1266] , 8=>$lang_member[363] , 9=>$lang_member[364] , 10=>$lang_member[1267] , 11=>$lang_member[1268]);
$ca_txt[2] = array(1=>$lang_member[361] , 2=>$lang_member[359]  , 3=>$lang_member[220] , 4=>$lang_member[1263] , 5=>$lang_member[1264] , 6=>$lang_member[1265] , 7=>$lang_member[1266] , 8=>$lang_member[363] , 9=>$lang_member[364] , 10=>$lang_member[1267] , 11=>$lang_member[1268]);
$ca_txt[3] = array(1=>$lang_member[361] , 2=>$lang_member[359]  , 3=>$lang_member[220] , 4=>$lang_member[1263] , 5=>$lang_member[1264] , 6=>$lang_member[1265] , 7=>$lang_member[1266] , 8=>$lang_member[363] , 9=>$lang_member[364] , 10=>$lang_member[1267] , 11=>$lang_member[1268]);
$ca_txt[4] = array(1=>$lang_member[361] , 2=>$lang_member[359]  , 3=>$lang_member[220] , 4=>$lang_member[1263] , 5=>$lang_member[1264] , 6=>$lang_member[1265] , 7=>$lang_member[1266] , 8=>$lang_member[363] , 9=>$lang_member[364] , 10=>$lang_member[1267] , 11=>$lang_member[1268]);
$ca_txt[5] = array(1=>$lang_member[361] , 2=>$lang_member[359]  , 3=>$lang_member[220] , 4=>$lang_member[1263] , 5=>$lang_member[1264] , 6=>$lang_member[1265] , 7=>$lang_member[1266] , 8=>$lang_member[363] , 9=>$lang_member[364] , 10=>$lang_member[1267] , 11=>$lang_member[1268]);
$ca_txt[6] = array(1=>$lang_member[361] , 2=>$lang_member[359]  , 3=>$lang_member[220] , 4=>$lang_member[1263] , 5=>$lang_member[1264] , 6=>$lang_member[1265] , 7=>$lang_member[1266] , 8=>$lang_member[363] , 9=>$lang_member[364] , 10=>$lang_member[1267] , 11=>$lang_member[1268]);
$ca_txt[7] = array(1=>$lang_member[361] , 2=>$lang_member[359]  , 3=>$lang_member[220] , 4=>$lang_member[1263] , 5=>$lang_member[1264] , 6=>$lang_member[1265] , 7=>$lang_member[1266] , 8=>$lang_member[363] , 9=>$lang_member[364] , 10=>$lang_member[1267] , 11=>$lang_member[1268]);

$ca_txt[21] = array(1=>$lang_member[361] , 2=>$lang_member[359]  , 3=>$lang_member[220] , 4=>$lang_member[1263] , 5=>$lang_member[1264] , 6=>$lang_member[1265] , 7=>$lang_member[1266] , 8=>$lang_member[363] , 9=>$lang_member[364] , 10=>$lang_member[1267] , 11=>$lang_member[1268]);
$ca_txt[22] = array(1=>$lang_member[361] , 2=>$lang_member[359]  , 3=>$lang_member[220] , 4=>$lang_member[1263] , 5=>$lang_member[1264] , 6=>$lang_member[1265] , 7=>$lang_member[1266] , 8=>$lang_member[363] , 9=>$lang_member[364] , 10=>$lang_member[1267] , 11=>$lang_member[1268]);

$ca_txt[31] = array(1=>$lang_member[1216] , 2=>$lang_member[1215]  , 3=>$lang_member[220]);
$ca_txt[32] = array(1=>$lang_member[1216] , 2=>$lang_member[1215]  , 3=>$lang_member[220]);
$ca_txt[33] = array(1=>$lang_member[1216] , 2=>$lang_member[1215]  , 3=>$lang_member[220]);

$ca_txt[51] = array(1=>$lang_member[1269] , 2=>$lang_member[453]  , 3=>$lang_member[459] , 4=>$lang_member[312] , 5=>$lang_member[314] , 6=>$lang_member[1270] , 7=>$lang_member[1271] , 8=>$lang_member[1272] , 9=>$lang_member[1273] , 10=>$lang_member[1274] , 11=>$lang_member[1275] , 12=>$lang_member[1276] , 13=>$lang_member[1277] , 14=>$lang_member[1278] , 15=>$lang_member[1279] , 16=>$lang_member[1280] , 17=>$lang_member[1281] , 18=>$lang_member[1282] , 19=>$lang_member[1283] , 20=>$lang_member[1284] , 21=>$lang_member[1285] , 22=>$lang_member[1286] , 23=>$lang_member[1287] , 24=>$lang_member[1288] , 25=>$lang_member[1289] , 26=>$lang_member[1290] , 27=>$lang_member[1291] , 28=>$lang_member[1292] , 29=>$lang_member[1293] , 30=>$lang_member[1294] , 31=>$lang_member[1295] , 32=>$lang_member[1296] , 33=>$lang_member[1297] , 34=>$lang_member[1298] , 35=>$lang_member[1299] , 36=>$lang_member[1300] , 37=>$lang_member[1301] , 38=>$lang_member[1302] , 39=>$lang_member[1303] , 40=>$lang_member[1304] , 41=>$lang_member[1305] , 42=>$lang_member[1306] , 43=>$lang_member[1307] , 44=>$lang_member[1308] , 45=>$lang_member[1309] , 46=>$lang_member[1310] , 47=>$lang_member[1311] , 48=>$lang_member[1312] , 49=>$lang_member[1313] , 50=>$lang_member[1314] , 51=>$lang_member[1315] , 52=>$lang_member[1316]);
$ca_txt[52] = array(1=>$lang_member[1269] , 2=>$lang_member[453]  , 3=>$lang_member[459] , 4=>$lang_member[312] , 5=>$lang_member[314] , 6=>$lang_member[1270] , 7=>$lang_member[1271] , 8=>$lang_member[1272] , 9=>$lang_member[1273] , 10=>$lang_member[1274] , 11=>$lang_member[1275] , 12=>$lang_member[1276] , 13=>$lang_member[1277] , 14=>$lang_member[1278] , 15=>$lang_member[1279] , 16=>$lang_member[1280] , 17=>$lang_member[1281] , 18=>$lang_member[1282] , 19=>$lang_member[1283] , 20=>$lang_member[1284] , 21=>$lang_member[1285] , 22=>$lang_member[1286] , 23=>$lang_member[1287] , 24=>$lang_member[1288] , 25=>$lang_member[1289] , 26=>$lang_member[1290] , 27=>$lang_member[1291] , 28=>$lang_member[1292] , 29=>$lang_member[1293] , 30=>$lang_member[1294] , 31=>$lang_member[1295] , 32=>$lang_member[1296] , 33=>$lang_member[1297] , 34=>$lang_member[1298] , 35=>$lang_member[1299] , 36=>$lang_member[1300] , 37=>$lang_member[1301] , 38=>$lang_member[1302] , 39=>$lang_member[1303] , 40=>$lang_member[1304] , 41=>$lang_member[1305] , 42=>$lang_member[1306] , 43=>$lang_member[1307] , 44=>$lang_member[1308] , 45=>$lang_member[1309] , 46=>$lang_member[1310] , 47=>$lang_member[1311] , 48=>$lang_member[1312] , 49=>$lang_member[1313] , 50=>$lang_member[1314] , 51=>$lang_member[1315] , 52=>$lang_member[1316]);
$ca_txt[53] = array(1=>$lang_member[1269] , 2=>$lang_member[453]  , 3=>$lang_member[459] , 4=>$lang_member[312] , 5=>$lang_member[314] , 6=>$lang_member[1270] , 7=>$lang_member[1271] , 8=>$lang_member[1272] , 9=>$lang_member[1273] , 10=>$lang_member[1274] , 11=>$lang_member[1275] , 12=>$lang_member[1276] , 13=>$lang_member[1277] , 14=>$lang_member[1278] , 15=>$lang_member[1279] , 16=>$lang_member[1280] , 17=>$lang_member[1281] , 18=>$lang_member[1282] , 19=>$lang_member[1283] , 20=>$lang_member[1284] , 21=>$lang_member[1285] , 22=>$lang_member[1286] , 23=>$lang_member[1287] , 24=>$lang_member[1288] , 25=>$lang_member[1289] , 26=>$lang_member[1290] , 27=>$lang_member[1291] , 28=>$lang_member[1292] , 29=>$lang_member[1293] , 30=>$lang_member[1294] , 31=>$lang_member[1295] , 32=>$lang_member[1296] , 33=>$lang_member[1297] , 34=>$lang_member[1298] , 35=>$lang_member[1299] , 36=>$lang_member[1300] , 37=>$lang_member[1301] , 38=>$lang_member[1302] , 39=>$lang_member[1303] , 40=>$lang_member[1304] , 41=>$lang_member[1305] , 42=>$lang_member[1306] , 43=>$lang_member[1307] , 44=>$lang_member[1308] , 45=>$lang_member[1309] , 46=>$lang_member[1310] , 47=>$lang_member[1311] , 48=>$lang_member[1312] , 49=>$lang_member[1313] , 50=>$lang_member[1314] , 51=>$lang_member[1315] , 52=>$lang_member[1316]);

$ca_color[1] = array(1=>"banker" , 2=>"player"  , 3=>"tie" , 4=>"banker" , 5=>"player" , 6=>"banker" , 7=>"player" , 8=>"other" , 9=>"other" , 10=>"other" , 11=>"other");
$ca_color[2] = array(1=>"banker" , 2=>"player"  , 3=>"tie" , 4=>"banker" , 5=>"player" , 6=>"banker" , 7=>"player" , 8=>"other" , 9=>"other" , 10=>"other" , 11=>"other");
$ca_color[3] = array(1=>"banker" , 2=>"player"  , 3=>"tie" , 4=>"banker" , 5=>"player" , 6=>"banker" , 7=>"player" , 8=>"other" , 9=>"other" , 10=>"other" , 11=>"other");
$ca_color[4] = array(1=>"banker" , 2=>"player"  , 3=>"tie" , 4=>"banker" , 5=>"player" , 6=>"banker" , 7=>"player" , 8=>"other" , 9=>"other" , 10=>"other" , 11=>"other");
$ca_color[5] = array(1=>"banker" , 2=>"player"  , 3=>"tie" , 4=>"banker" , 5=>"player" , 6=>"banker" , 7=>"player" , 8=>"other" , 9=>"other" , 10=>"other" , 11=>"other");
$ca_color[6] = array(1=>"banker" , 2=>"player"  , 3=>"tie" , 4=>"banker" , 5=>"player" , 6=>"banker" , 7=>"player" , 8=>"other" , 9=>"other" , 10=>"other" , 11=>"other");
$ca_color[7] = array(1=>"banker" , 2=>"player"  , 3=>"tie" , 4=>"banker" , 5=>"player" , 6=>"banker" , 7=>"player" , 8=>"other" , 9=>"other" , 10=>"other" , 11=>"other");

$ca_color[21] = array(1=>"banker" , 2=>"player"  , 3=>"tie" , 4=>"banker" , 5=>"player" , 6=>"banker" , 7=>"player" , 8=>"other" , 9=>"other" , 10=>"other" , 11=>"other");
$ca_color[22] = array(1=>"banker" , 2=>"player"  , 3=>"tie" , 4=>"banker" , 5=>"player" , 6=>"banker" , 7=>"player" , 8=>"other" , 9=>"other" , 10=>"other" , 11=>"other");

$ca_color[31] = array(1=>"banker" , 2=>"player"  , 3=>"tie");
$ca_color[32] = array(1=>"banker" , 2=>"player"  , 3=>"tie");
$ca_color[33] = array(1=>"banker" , 2=>"player"  , 3=>"tie");

##############################################################################################
#############################################CASINO###########################################
##############################################################################################


$sc_lang= array(1 =>  $lang_member[1317],$lang_member[1318],$lang_member[1319]);
$ab_status= array(1 =>$lang_member[629], "<span class='cr'>".$lang_member[67]."</span>", $lang_member[352]); 
$ab_bet= array(0 =>$lang_member[629], $lang_member[352], "<span class='cr'>".$lang_member[65]."</span>"); 
$ab_type= array(1 =>$lang_member[1371], $lang_member[1372]); 
$man_type= array(0 =>$lang_member[1373], $lang_member[1374]); 
$active_bet= array(0 => "<span class='cr'>".$lang_member[1320]."</span>",$lang_member[1375]); 

$sport_man = array(
1 =>"FT.HDC[".$lang_member[1321]."]", 2 =>"FT.HDC[".$lang_member[1322]."]", 3 =>"FT.GOAL[".$lang_member[314]."]", 4 =>"FT.GOAL[".$lang_member[312]."]"
,5 =>"FT.ODD[".$lang_member[453]."]", 6=>"FT.EVEN[".$lang_member[459]."]", 7 =>"FT.1X2[".$lang_member[1323]."]", 8 =>"FT.1X2[".$lang_member[220]."]", 9 =>"FT.1X2[".$lang_member[1324]."]"
,11 =>"1H.HDC[".$lang_member[1321]."]", 12 =>"1H.HDC[".$lang_member[1322]."]", 13 =>"1H.GOAL[".$lang_member[314]."]", 14 =>"1H.GOAL[".$lang_member[312]."]"
,15 =>"1H.ODD[".$lang_member[453]."]", 16=>"1H.EVEN[".$lang_member[459]."]", 17 =>"1H.1X2[".$lang_member[1323]."]", 18 =>"1H.1X2[".$lang_member[220]."]", 19 =>"1H.1X2[".$lang_member[1324]."]"
);

$sport_zone = array(1 =>$lang_member[1325], 2 =>$lang_member[881]);

$ball_billb= array(1 =>$lang_member[780],$lang_member[346], $lang_member[783], $lang_member[65], $lang_member[682]); 
$ball_playb= array(1 =>$ball_billb[1],$lang_member[344],$ball_billb[2], $ball_billb[3], $lang_member[349], $ball_billb[4], $ball_billb[5]); 

$ball_bill= array(1 =>"<span class='cg'>".$ball_billb[1]."</span>","<span class='cbu'>".$ball_billb[2]."</span>", "<span class='cr'>".$ball_billb[3]."</span>", "<span class='cr'>".$ball_billb[4]."</span>", "<span class='cb'>".$ball_billb[5]."</span>"); 
$ball_play= array(1 =>"<span class='cg'>".$ball_billb[1]."</span>","<span class='cg'>".$ball_playb[2]."</span>","<span class='cbu'>".$ball_billb[2]."</span>", "<span class='cr'>".$ball_billb[3]."</span>", "<span class='cr'>".$ball_playb[5]."</span>", "<span class='cr'>".$ball_billb[4]."</span>", "<span class='cb'>".$ball_billb[5]."</span>"); 

$pay_mentr= array(1 =>$lang_member[1371],$lang_member[1372], $lang_member[1326], $lang_member[1327], $lang_member[445]); 

$x_level= array(1 => $lang_member[1328],$lang_member[1329], $lang_member[1330],$lang_member[1331],$lang_member[1332]); 
$n_news= array(1 => $lang_member[1333],$lang_member[1334]); 
$m_active= array(0 =>"<span class='red'>".$lang_member[1320]."</span>" ,$lang_member[1376]); 
$sport_mix = array(1 =>$lang_member[1335], 2 =>$lang_member[1336]);
$ab_bank= array(1=>$lang_member[1208],$lang_member[1209],$lang_member[1210],$lang_member[1211],$lang_member[1212],$lang_member[1213]); 
$n_date= array("Mon"=>$lang_member[1243],"Tue"=>$lang_member[1244],"Wed"=>$lang_member[1245],"Thu"=>$lang_member[1246],"Fri"=>$lang_member[1247],"Sat"=>$lang_member[1248],"Sun"=>$lang_member[1242]); 

$lot_type["th"]= array(1 =>$lang_member[1337], 2 =>$lang_member[451], 3 =>$lang_member[1338], 4 =>$lang_member[1339], 5 =>$lang_member[1340], 6 =>$lang_member[399], 7 =>$lang_member[401]
, 8 =>$lang_member[1341] , 9 =>$lang_member[1342], 10 =>$lang_member[1343], 11 =>$lang_member[1344], 12 =>$lang_member[453]."-".$lang_member[459], 13 =>$lang_member[1370], 14 =>$lang_member[1346], 15 =>$lang_member[1348], 16 =>$lang_member[1349], 17 =>$lang_member[1350], 18 =>$lang_member[1351], 19 =>$lang_member[1352], 20 =>$lang_member[1353], 21 =>$lang_member[1354], 22 =>$lang_member[1355], 23 =>$lang_member[1356], 24 =>$lang_member[1377]);

$lang_menu = array(1=>$lang_member[747] , 2=>$lang_member[1379]  , 3=>$lang_member[1358] , 4=>$lang_member[1359] , 5=>$lang_member[1360] , 6=>$lang_member[1361] , 7=>$lang_member[766] , 8=>$lang_member[760] , 9=>$lang_member[749] , 10=>$lang_member[1362] , 11=>$lang_member[1363] , 12=>$lang_member[754] , 13=>$lang_member[762] , 14=>$lang_member[752] , 15=>$lang_member[1364] , 16=>$lang_member[1365] , 17=>$lang_member[1366] , 18=>$lang_member[1367]);


$sport_type = array(1=>$lang_member[747] , 2=>$lang_member[1379]  , 3=>$lang_member[1358] , 4=>$lang_member[1359] , 5=>$lang_member[1360] , 6=>$lang_member[1361] , 7=>$lang_member[766] , 8=>$lang_member[760] , 9=>$lang_member[749] , 10=>$lang_member[1362] , 11=>$lang_member[1363] , 12=>$lang_member[754] , 13=>$lang_member[762] , 14=>$lang_member[752] , 15=>$lang_member[1364] , 16=>$lang_member[1365] , 17=>$lang_member[1366] , 18=>$lang_member[1367] , 19=>$lang_member[2068] , 20=>$lang_member[2069]);
$sport_type_today = array(1=>$lang_member[2093] , 2=>$lang_member[2094]  , 3=>$lang_member[2095] , 4=>$lang_member[2096] , 5=>$lang_member[2097] , 6=>$lang_member[2098] , 7=>$lang_member[2099] , 8=>$lang_member[2100] , 9=>$lang_member[2101] , 10=>$lang_member[2102] , 11=>$lang_member[2103] , 12=>$lang_member[2104] , 13=>$lang_member[2105] , 14=>$lang_member[2106] , 15=>$lang_member[2107] , 16=>$lang_member[2108] , 17=>$lang_member[2109] , 18=>$lang_member[2110] , 19=>$lang_member[2111] , 20=>$lang_member[2292]);


$m_news= array(1=>$lang_member[35],$lang_member[36],$lang_member[37],$lang_member[38]); 


$lang_g['lotZone'][1] = $lang_member[568];
$lang_g['lotZone'][2] = $lang_member[1093];
$lang_g['lotZone'][3] = $lang_member[1094];
$lang_g['lotZone'][4] = $lang_member[1096];
$lang_g['lotZone'][5] = $lang_member[1097];
$lang_g['lotZone'][6] = $lang_member[1098];
$lang_g['lotZone'][7] = $lang_member[1099];
$lang_g['lotZone'][8] = $lang_member[1101];
$lang_g['lotZone'][9] = $lang_member[1102];
$lang_g['lotZone'][10] = $lang_member[1104];
$lang_g['lotZone'][11] = $lang_member[1105];
$lang_g['lotZone'][12] = $lang_member[1106];
$lang_g['lotZone'][13] = $lang_member[1108];
$lang_g['lotZone'][14] = $lang_member[1109];
$lang_g['lotZone'][15] = $lang_member[1110];
$lang_g['lotZone'][16] = $lang_member[1111];
$lang_g['lotZone'][17] = $lang_member[1112];
$lang_g['lotZone'][18] = $lang_member[686];
$lang_g['lotZone'][19] = $lang_member[683];

$lang_g['_lotZone'][3] = $lang_member[684];
$lang_g['_rob']        = $lang_member[688];

$lang_g['lottype'][1] = $lang_member[568];
$lang_g['getZone'][1] = $lang_member[1113];

$lang_g['sendAlert_sl'][0] = $lang_member[1114];
$lang_g['sendAlert_sl'][1] = $lang_member[1115];
$lang_g['sendAlert_sl'][2] = $lang_member[1116];

$lang_g['sendAlert'][1] = $lang_member[1117];
$lang_g['sendAlert'][2] = $lang_member[1118];
$lang_g['sendAlert'][3] = $lang_member[1119];

$lang_fn_g['month'] = $lang_member[1120];
$lang_fn_g['BE'] = $lang_member[1121];

$lang_g['lotrob'][1] = $lang_member[689];
$lang_g['lotrob'][2] = $lang_member[691];
$lang_g['lotrob'][3] = $lang_member[692];
$lang_g['lotrob'][4] = $lang_member[694];

$lang_g['Msg'][1]   = $lang_member[1123];
$lang_g['Msg'][2]   = $lang_member[1124];
$lang_g['Msg'][3]   = $lang_member[1125];
$lang_g['Msg'][4]   = $lang_member[1126];
$lang_g['Msg'][5]   = $lang_member[1127];
$lang_g['Msg'][6]   = $lang_member[1128];
$lang_g['Msg'][7]   = $lang_member[1129];
$lang_g['Msg'][8]   = $lang_member[1130];
$lang_g['Msg'][9]   = $lang_member[1131];
$lang_g['Msg'][10]  = $lang_member[1132];
$lang_g['Msg'][11]  = $lang_member[68];

$lang_g['game'][1]  = $lang_member[1133];
$lang_g['game'][2]  = $lang_member[319];
$lang_g['game'][3]  = $lang_member[324];
$lang_g['game'][4]  = $lang_member[327];
$lang_g['game'][5]  = $lang_member[331];

$lang_g['game_zone'][1] = $lang_member[353];
$lang_g['game_zone'][2] = $lang_member[338];
$lang_g['game_zone'][3] = $lang_member[355];
$lang_g['game_zone'][4] = $lang_member[341];
$lang_g['game_zone'][5] = $lang_member[340];

$lang_g['game_Msg'][1]  = $lang_member[1135];
$lang_g['game_Msg'][2]  = $lang_member[1137];
$lang_g['game_Msg'][3]  = $lang_member[1142];
$lang_g['game_Msg'][4]  = $lang_member[1144];

$lang_g['mobile_game_menu'][1]  = $lang_member[1146];

$lang_g["laoset"] =$lang_member[640];
$lang_g["price"] =$lang_member[1655];
########################เลขชุด
$lang_g["settext"][1] =$lang_member[1149];
$lang_g["settext"][2] =$lang_member[1151];
$lang_g["settext"][3] =$lang_member[1152];
$lang_g["settext"][4] =$lang_member[1153];
$lang_g["settext"][5] =$lang_member[1155];
$lang_g["settext"][6] =$lang_member[1156];
$lang_g["settext"][7] =$lang_member[1158];
$lang_g["settext"][8] =$lang_member[1159];
$lang_g["settext"][9] =$lang_member[1160];



$lang_g["setpay"][0] =$lang_member[1162];
$lang_g["setpay"][1] =$lang_member[1163];
$lang_g["setpay"][2] =$lang_member[1165];
$lang_g["setpay"][3] =$lang_member[1166];
$lang_g["setpay"][4] =$lang_member[1168];
$lang_g["setpay"][5] =$lang_member[1169];
$lang_g["setpay"][6] =$lang_member[1171];

$lang_g["setwin"][0] ="100,000";
$lang_g["setwin"][1] ="4,500";
$lang_g["setwin"][2] ="40,000";
$lang_g["setwin"][3] ="2,000";
$lang_g["setwin"][4] ="3,500";
$lang_g["setwin"][5] ="1,500";
$lang_g["setwin"][6] ="1,500";

$lang_g["text"]["count"] =$lang_member[1183];
?>