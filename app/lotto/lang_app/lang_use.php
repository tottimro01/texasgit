<?php
require("/home/ohoking/domains/wan1991.com/public_html/app/admin_lang/export/lang_member_".$_GET['lang'].".php");

	$arr = array();
			//***** Login *****
			$arr["login"] =$lang_member[2151];
			$arr["username"] =$lang_member[2152];
			$arr["password"] =$lang_member[73];
			$arr["input_username"] =$lang_member[1904];
			$arr["input_password"] =$lang_member[2179];
			$arr["alert_premiss_i"] =$lang_member[2180];
			$arr["alert_premiss_ii"] =$lang_member[2181];
			$arr["ok"] =$lang_member[321];
			$arr["exit_app"] =$lang_member[2182];
			$arr["no_internet"] =$lang_member[2183];
			$arr["aware"] =$lang_member[2184];


			//***** Main ****
			$arr["page_fast"] = $lang_member[483];                                //แทงด่วน
			$arr["page_3n"] =$lang_member[1349];
			$arr["page_2"] = $lang_member[2185];                                 //2 ตัว
			$arr["page_spec"] = $lang_member[564];                             //พิเศษ
			$arr["page_list"] =$lang_member[708];                                 //รายการ
			$arr["list_play"] =$lang_member[43];                               // รายการเล่น
			$arr["profile"] =$lang_member[2186];
			$arr["credit_balance"] =$lang_member[95]." ";                    //เครดิตคงเหลือ
			$arr["outstanding"] =$lang_member[53]." ";                        //รายการเล่นค้าง;
			$arr["credit_received"] =$lang_member[97]." ";                   //เครดิตที่ได้รับ
			$arr["baht"] =$lang_member[325];								    //บาท
			$arr["alert_exit_app"] =$lang_member[2187];
			$arr["poy"] =$lang_member[574]." : ";								//โพยที่ :
			$arr["name"] =$lang_member[118]." : ";								//ชื่อ :
			$arr["save_success"] =$lang_member[2188];
			$arr["select_zone"] =$lang_member[2189];
			$arr["menu_payrate"] =$lang_member[580];								//อัตราจ่าย
			$arr["menu_lotfull"] =$lang_member[414];							//เลขเต็ม
			$arr["menu_win"] =$lang_member[50];
			$arr["menu_news"] =$lang_member[441];								//ข่าวสาร
			$arr["menu_newpass"] =$lang_member[45];							//เปลี่ยนรหัสผ่าน
			$arr["menu_printer"] =$lang_member[2190];
			$arr["menu_pin"] =$lang_member[2191];
			$arr["menu_language"] =$lang_member[1078];								//ภาษา
			$arr["menu_logout"] =$lang_member[46];								//ออกจากระบบ
			$arr["cancel"] =$lang_member[65]; 									//ยกเลิก
			$arr["connecting_printer"] =$lang_member[2192]."...";
			$arr["connected_printer"] =$lang_member[2193];
			$arr["no_connect_printer"] =$lang_member[2194];


			//*****win*****
			$arr["results_lottery"] =$lang_member[2195];
			$arr["win1"] =$lang_member[2196];
			$arr["win2"] =$lang_member[2197];
			$arr["win3_down_first"] =$lang_member[461];
			$arr["win3_down"] =$lang_member[388];
			$arr["no_date_bill"] ="-- ".$lang_member[2198]." --";
			$arr["date_more"] =$lang_member[2199];
			$arr["months_f1"] =$lang_member[1218];
			$arr["months_f2"] =$lang_member[1219];
			$arr["months_f3"] =$lang_member[1220];
			$arr["months_f4"] =$lang_member[1221];
			$arr["months_f5"] =$lang_member[1222];
			$arr["months_f6"] =$lang_member[1223];
			$arr["months_f7"] =$lang_member[1224];
			$arr["months_f8"] =$lang_member[1225];
			$arr["months_f9"] =$lang_member[1226];
			$arr["months_f10"] =$lang_member[1227];
			$arr["months_f11"] =$lang_member[1228];
			$arr["months_f12"] =$lang_member[1229];
			$arr["months_s1"] =$lang_member[1230];
			$arr["months_s2"] =$lang_member[1231];
			$arr["months_s3"] =$lang_member[1232];
			$arr["months_s4"] =$lang_member[1233];
			$arr["months_s5"] =$lang_member[1234];
			$arr["months_s6"] =$lang_member[1235];
			$arr["months_s7"] =$lang_member[1236];
			$arr["months_s8"] =$lang_member[1237];
			$arr["months_s9"] =$lang_member[1238];
			$arr["months_s10"] =$lang_member[1239];
			$arr["months_s11"] =$lang_member[1240];
			$arr["months_s12"] =$lang_member[1241];

			//*****CloseTang*****
			$arr["close_bet"] =$lang_member[2200];

			//*****fast*****
			$arr["id_poy"] =$lang_member[574]." : ";                                              //"โพยที่ : ";
			$arr["name_poy"] =$lang_member[118]." : ";                                            //"ชื่อ : ";
			$arr["lesson"] =$lang_member[2198]." : ";											   //"งวด : ";
			$arr["close_lesson"] =$lang_member[1436]." : ";
			$arr["save"] = $lang_member[121];															//"บันทึก";
			$arr["back"] = $lang_member[492];															//"กลับ";
			$arr["copy"] = $lang_member[371];														//"คัดลอก";
			$arr["num"]  = $lang_member[381];														//"เลข";
			$arr["on"]   = $lang_member[448];													    //"บน";
			$arr["down"] = $lang_member[450];														//"ล่าง";
			$arr["tod"]  = $lang_member[209];                                                       //"โต๊ด";
			$arr["alert_input_data"] =$lang_member[439];

			//*****3หน้า*****
			$arr["first_on"]     = $lang_member[395];												//"หน้าบน";
			$arr["first_tod"]    = $lang_member[397];												//"หน้าโต๊ด";
			$arr["first_down"]   =$lang_member[461];

			//*****2ตัว*****
			$arr["lot2on"]       =$lang_member[2201];
			$arr["lot2tur_tod"]  =$lang_member[2202];
			$arr["lot2down"]     =$lang_member[2203];

			//*****พิเศษ*****
			$arr["lot3in5"]      =$lang_member[1348];
			$arr["lot3in4"]      =$lang_member[1346];
			$arr["lot19hang"]    =$lang_member[604];
			$arr["more"]         =$lang_member[2204];

			//*****3ใน5*****
			$arr["price"] =$lang_member[1655];

			//*****อื่นๆ*****
			$arr["back6"]                       =$lang_member[618];
			$arr["first"]                       = $lang_member[533];
			$arr["pi_nong"]                     = $lang_member[540];								//"เลขพี่น้อง";
			$arr["ww"]                          = $lang_member[541];                                //"เลขเบิ้ล";
			$arr["on1_high_low"]                =$lang_member[2205];
			$arr["on2_high_low"]                =$lang_member[2206];
			$arr["on3_high_low"]                =$lang_member[2207];
			$arr["down2_high_low"]              =$lang_member[2208];
			$arr["odd_even"]                    =$lang_member[2209];
			$arr["lot2tod"]                     =$lang_member[1377];
			$arr["puk_luk"]                     = $lang_member[484];								//"เลขปักหลัก";
			$arr["luk_unit"] 				    = $lang_member[534]." :";							//"หลักหน่วย :";
			$arr["luk_10"] 					    = $lang_member[535]." :";                           //"หลักสิบ :";
			$arr["luk_100"] 				    = $lang_member[536]." :";                           //"หลักร้อย :";
			$arr["high"] 						= $lang_member[314];									//"สูง";
			$arr["low"] 						= $lang_member[312];									//"ต่ำ";
			$arr["even"] 						= $lang_member[459];									//"คู่";
			$arr["odd"] 						= $lang_member[453];									//"คี่";
			$arr["enter_6back"]                 = $lang_member[2210];
			$arr["enter_yod_6back"]             = $lang_member[2211];
			$arr["bet_1on_high_low"]            = $lang_member[2212];
			$arr["enter_yod_1on_high_low"]      = $lang_member[2213];
			$arr["bet_2on_high_low"]            =$lang_member[2214];
			$arr["enter_yod_2on_high_low"]      =$lang_member[2215];
			$arr["bet_3on_high_low"]            =$lang_member[2216];
			$arr["enter_yod_3on_high_low"] 		=$lang_member[2217];
			$arr["bet_2down_high_low"] 			=$lang_member[2218];
			$arr["enter_yod_2down_high_low"] 	=$lang_member[2219];
			$arr["enter_2tod"] 					=$lang_member[2220];
			$arr["enter_yod_2tod"] 				=$lang_member[2221];
			$arr["bet_odd_even"]				=$lang_member[2222];
			$arr["enter_yod_odd_even"] 			=$lang_member[2223];
			$arr["bet_unit_number"]				=$lang_member[2224];
			$arr["enter_yod_unit_number"] 		=$lang_member[2225];
			$arr["bet_10_number"] 				=$lang_member[2226];
			$arr["enter_yod_10_number"] 		=$lang_member[2227];
			$arr["bet_100_number"] 				=$lang_member[2228];
			$arr["enter_yod_100_number"] 		=$lang_member[2229];

			//*****List Play*****
			$arr["search"] 						= $lang_member[293];									//"ค้นหา";
			$arr["list_bill"]                   =$lang_member[2230];
			$arr["list_bill_all"] 				= $lang_member[304];

			//*****List Bill*****
			$arr["date_time"] 					=$lang_member[407];
			$arr["yod_buy"] 					= $lang_member[529];								//"ยอดซื้อ";
			$arr["yod_win"] 					=$lang_member[2231];
			$arr["yod_total"]					=$lang_member[2232];
			$arr["sum"] 						= $lang_member[611];									//"รวม";

			//*****List Bill All*****
			$arr["type"] 						= $lang_member[160];								//"ประเภท";
			$arr["amount"] 						= $lang_member[559];								//"จำนวน";
			$arr["dis"] 						= $lang_member[610];									//"ส่วนลด";
			$arr["net"] 						=$lang_member[700];

			//*****Detail Bill*****
			$arr["detail_bill"] 				= $lang_member[2233]." ID : ";


			//*****PayRate*****
			$arr["pay"] 						= $lang_member[162];									//"จ่าย";
			$arr["pay_to_tor"] 					=$lang_member[162]." : ".$lang_member[548];
			$arr["win"] 						= $lang_member[514];								//"รางวัล";
			$arr["select"] 						=$lang_member[299];
			$arr["note"] 						=$lang_member[622];
			$arr["select_ok"] 					=$lang_member[626];
			//*****News****
			$arr["date"] 						= $lang_member[106];									//"วันที่";
			$arr["time"] 						= $lang_member[303];									//"เวลา";
			$arr["minute"] ="น.";

			//*****New Pass*****
			$arr["pass_old"]					=$lang_member[2234];
			$arr["pass_new"] 					= $lang_member[1045];									//"รหัสผ่านใหม่";
			$arr["confirm_pass"] 				= $lang_member[2235];
			$arr["enter_data_all"] 				= $lang_member[2236];
			$arr["old_pass_invalid"] 			= $lang_member[2237];


			//*****Printer*****
			$arr["paper"] 						= $lang_member[2238]." : ";
			$arr["paper_3"] 					= $lang_member[2239];
			$arr["paper_2"] 					= $lang_member[2240];
			$arr["searching"] 					= $lang_member[2241]."...";
			$arr["list_device"]					= $lang_member[2242];
			$arr["device_connected"] 			= $lang_member[2243];
			$arr["close_printer"] 				= $lang_member[2244];
			$arr["status_printing"] 			= $lang_member[2245]."...";

			//*****Pin*****
			$arr["open_pin"] 					= $lang_member[2246];
			$arr["off_pin"] 					= $lang_member[612];
			$arr["copy_bill"] 					= $lang_member[2247];
			$arr["enter_code"]					= $lang_member[2248];
			$arr["code_pin"] 					= $lang_member[2249];
			$arr["wait_pin"] 					= $lang_member[770];
			$arr["minute_pin"] 					= $lang_member[554];								//"นาที";


			//*****Dialog*****
			$arr["loading"] 					= $lang_member[1560]."...";


			//*** web ***
			$arr["success"] 					= $lang_member[629];									//"สำเร็จ";
			$arr["fail"]                        = $lang_member[810];
			$arr["error"] 						= $lang_member[67];
			$arr["user_incorrect"] 			    = $lang_member[2250];

			//****History*****
			$arr["history"] 					= $lang_member[2251];
			$arr["bill"] 						= $lang_member[2252]." :";
			$arr["yod_bet"] 					= $lang_member[2253];
			$arr["accept_pay"] 					= $lang_member[2254];
			$arr["second"] 						= $lang_member[1598];
			$arr["share"] 						= $lang_member[2255]."...";

			//*** oho55 *
			$arr["nextto"] 						= $lang_member[2256];
			$arr["delete"] 						= $lang_member[2257];
			$arr["Confirm"] 					= $lang_member[2258];
			$arr["yes"] 						= $lang_member[2259];
			$arr["no"] 							= $lang_member[2260];


			$arr["alert"] 						= $lang_member[2261];
			$arr["update_version"] 				= $lang_member[2262];
			$arr["alert_server"] 				= $lang_member[2263];
			$arr["alert_insert_login"] 			= $lang_member[2264];
			$arr["Confirm_box"] 				= $lang_member[64];
			$arr["Confirm_logout"] 				= $lang_member[2265];
			$arr["complete"] 					= $lang_member[2266];
			$arr["pass_defi"] 					= $lang_member[2267];
			$arr["change_success"] 				= $lang_member[2268];
			$arr["alert_not"] 					= $lang_member[2269];
			$arr["pin_open"] 					= $lang_member[1376];
			$arr["pin_close"] 					= $lang_member[2270];
			$arr["create_pass"] 				= $lang_member[2271];
			$arr["insert_pass_a"] 				= $lang_member[2272];
			$arr["insert_pass"]                 = $lang_member[2273];
			$arr["insert_pass_new"] 			= $lang_member[2274];
			$arr["confirm_pin_pass"] 			= $lang_member[2275];
			$arr["confirm_pin_pass_a"] 			= $lang_member[2276];
			$arr["confirm_pin_pass_new"]        = $lang_member[2235];
			$arr["confirm_pin_pass_new_a"] 		= $lang_member[2276];
			$arr["pin_pass_fail"] 				= $lang_member[2277];


			//*** เลือกหวย *
			$arr["t24hr"] 						= $lang_member[2278];
			$arr["open_tang"] 					= $lang_member[2279];
			$arr["rob"] 						= $lang_member[643];													//$lang_member[643]."";
			$arr["day"] 						= $lang_member[2129];

			$arr["save_bill"]					= $lang_member[2280];
			$arr["noscript"]					= $lang_member[2281];

			// ชื่อโซน
			$arr["block_zone_1"]				= $lang_member[1113];										//"แทงหวย";
			$arr["block_zone_2"]				= $lang_member[1093];
			$arr["block_zone_3"]				= $lang_member[684];
			$arr["block_zone_4"]				= $lang_member[683];
			$arr["block_zone_5"]				= $lang_member[686];

			$arr["zone_1"]  = $lang_member[568];
			$arr["zone_2"]  = $lang_member[1093];
			$arr["zone_3"]  = $lang_member[1094];
			$arr["zone_4"]  = $lang_member[1096];
			$arr["zone_5"]  = $lang_member[1097];
			$arr["zone_6"]  = $lang_member[1098];
			$arr["zone_7"]  = $lang_member[1099];
			$arr["zone_8"]  = $lang_member[1101];
			$arr["zone_9"]  = $lang_member[1102];
			$arr["zone_10"] = $lang_member[1104];
			$arr["zone_11"] = $lang_member[1105];
			$arr["zone_12"] = $lang_member[1106];
			$arr["zone_13"] = $lang_member[2282];
			$arr["zone_14"] = $lang_member[1109];
			$arr["zone_15"] = $lang_member[1110];
			$arr["zone_16"] = $lang_member[1111];
			$arr["zone_17"] = $lang_member[1112];

			// $arr["zone_18_96"]= "จับยี่กี";
			$arr["zone_18"]   	= $lang_member[686];
			$arr["zone_18_1"] 	=  $lang_member[688]." 1";
			$arr["zone_18_2"] 	=  $lang_member[688]." 2";
			$arr["zone_18_3"] 	=  $lang_member[688]." 3";
			$arr["zone_18_4"] 	=  $lang_member[688]." 4";
			$arr["zone_18_5"] 	=  $lang_member[688]." 5";
			$arr["zone_18_6"] 	=  $lang_member[688]." 6";
			$arr["zone_18_7"] 	=  $lang_member[688]." 7";
			$arr["zone_18_8"] 	=  $lang_member[688]." 8";
			$arr["zone_18_9"] 	=  $lang_member[688]." 9";
			$arr["zone_18_10"]	= $lang_member[688]." 10";
			$arr["zone_18_11"]	= $lang_member[688]." 11";
			$arr["zone_18_12"]	= $lang_member[688]." 12";
			$arr["zone_18_13"]	= $lang_member[688]." 13";
			$arr["zone_18_14"]	= $lang_member[688]." 14";
			$arr["zone_18_15"]	= $lang_member[688]." 15";
			$arr["zone_18_16"]	= $lang_member[688]." 16";
			$arr["zone_18_17"]	= $lang_member[688]." 17";
			$arr["zone_18_18"]	= $lang_member[688]." 18";
			$arr["zone_18_19"]	= $lang_member[688]." 19";
			$arr["zone_18_20"]	= $lang_member[688]." 20";
			$arr["zone_18_21"]	= $lang_member[688]." 21";
			$arr["zone_18_22"]	= $lang_member[688]." 22";
			$arr["zone_18_23"]	= $lang_member[688]." 23";
			$arr["zone_18_24"]	= $lang_member[688]." 24";
			$arr["zone_18_25"]	= $lang_member[688]." 25";
			$arr["zone_18_26"]	= $lang_member[688]." 26";
			$arr["zone_18_27"]	= $lang_member[688]." 27";
			$arr["zone_18_28"]	= $lang_member[688]." 28";
			$arr["zone_18_29"]	= $lang_member[688]." 29";
			$arr["zone_18_30"]	= $lang_member[688]." 30";
			$arr["zone_18_31"]	= $lang_member[688]." 31";
			$arr["zone_18_32"]	= $lang_member[688]." 32";
			$arr["zone_18_33"]	= $lang_member[688]." 33";
			$arr["zone_18_34"]	= $lang_member[688]." 34";
			$arr["zone_18_35"]	= $lang_member[688]." 35";
			$arr["zone_18_36"]	= $lang_member[688]." 36";
			$arr["zone_18_37"]	= $lang_member[688]." 37";
			$arr["zone_18_38"]	= $lang_member[688]." 38";
			$arr["zone_18_39"]	= $lang_member[688]." 39";
			$arr["zone_18_40"]	= $lang_member[688]." 40";
			$arr["zone_18_41"]	= $lang_member[688]." 41";
			$arr["zone_18_42"]	= $lang_member[688]." 42";
			$arr["zone_18_43"]	= $lang_member[688]." 43";
			$arr["zone_18_44"]	= $lang_member[688]." 44";
			$arr["zone_18_45"]	= $lang_member[688]." 45";
			$arr["zone_18_46"]	= $lang_member[688]." 46";
			$arr["zone_18_47"]	= $lang_member[688]." 47";
			$arr["zone_18_48"]	= $lang_member[688]." 48";
			$arr["zone_18_49"]	= $lang_member[688]." 49";
			$arr["zone_18_50"]	= $lang_member[688]." 50";
			$arr["zone_18_51"]	= $lang_member[688]." 51";
			$arr["zone_18_52"]	= $lang_member[688]." 52";
			$arr["zone_18_53"]	= $lang_member[688]." 53";
			$arr["zone_18_54"]	= $lang_member[688]." 54";
			$arr["zone_18_55"]	= $lang_member[688]." 55";
			$arr["zone_18_56"]	= $lang_member[688]." 56";
			$arr["zone_18_57"]	= $lang_member[688]." 57";
			$arr["zone_18_58"]	= $lang_member[688]." 58";
			$arr["zone_18_59"]	= $lang_member[688]." 59";
			$arr["zone_18_60"]	= $lang_member[688]." 60";
			$arr["zone_18_61"]	= $lang_member[688]." 61";
			$arr["zone_18_62"]	= $lang_member[688]." 62";
			$arr["zone_18_63"]	= $lang_member[688]." 63";
			$arr["zone_18_64"]	= $lang_member[688]." 64";
			$arr["zone_18_65"]	= $lang_member[688]." 65";
			$arr["zone_18_66"]	= $lang_member[688]." 66";
			$arr["zone_18_67"]	= $lang_member[688]." 67";
			$arr["zone_18_68"]	= $lang_member[688]." 68";
			$arr["zone_18_69"]	= $lang_member[688]." 69";
			$arr["zone_18_70"]	= $lang_member[688]." 70";
			$arr["zone_18_71"]	= $lang_member[688]." 71";
			$arr["zone_18_72"]	= $lang_member[688]." 72";
			$arr["zone_18_73"]	= $lang_member[688]." 73";
			$arr["zone_18_74"]	= $lang_member[688]." 74";
			$arr["zone_18_75"]	= $lang_member[688]." 75";
			$arr["zone_18_76"]	= $lang_member[688]." 76";
			$arr["zone_18_77"]	= $lang_member[688]." 77";
			$arr["zone_18_78"]	= $lang_member[688]." 78";
			$arr["zone_18_79"]	= $lang_member[688]." 79";
			$arr["zone_18_80"]	= $lang_member[688]." 80";
			$arr["zone_18_81"]	= $lang_member[688]." 81";
			$arr["zone_18_82"]	= $lang_member[688]." 82";
			$arr["zone_18_83"]	= $lang_member[688]." 83";
			$arr["zone_18_84"]	= $lang_member[688]." 84";
			$arr["zone_18_85"]	= $lang_member[688]." 85";
			$arr["zone_18_86"]	= $lang_member[688]." 86";
			$arr["zone_18_87"]	= $lang_member[688]." 87";
			$arr["zone_18_88"]	= $lang_member[688]." 88";
			$arr["zone_18_89"]	= $lang_member[688]." 89";
			$arr["zone_18_90"]	= $lang_member[688]." 90";
			$arr["zone_18_91"]	= $lang_member[688]." 91";
			$arr["zone_18_92"]	= $lang_member[688]." 92";
			$arr["zone_18_93"]	= $lang_member[688]." 93";
			$arr["zone_18_94"]	= $lang_member[688]." 94";
			$arr["zone_18_95"]	= $lang_member[688]." 95";
			$arr["zone_18_96"]	= $lang_member[688]." 96";

			$arr["zone_19"]    = $lang_member[683];
			$arr["zone_19_1"]  = $lang_member[643]." 12:00";
			$arr["zone_19_2"]  = $lang_member[643]." 13:00";
			$arr["zone_19_3"]  = $lang_member[643]." 14:00";
			$arr["zone_19_4"]  = $lang_member[643]." 15:00";
			$arr["zone_19_5"]  = $lang_member[643]." 16:00";
			$arr["zone_19_6"]  = $lang_member[643]." 17:00";
			$arr["zone_19_7"]  = $lang_member[643]." 18:00";
			$arr["zone_19_8"]  = $lang_member[643]." 19:00";
			$arr["zone_19_9"]  = $lang_member[643]." 20:00";
			$arr["zone_19_10"] = $lang_member[643]." 21:00";
			$arr["zone_19_11"] = $lang_member[643]." 22:00";

			//ปฏิทิน
			$arr["monday"] =$lang_member[1250];
			$arr["tuesday"] =$lang_member[1251];
			$arr["wednesday"] =$lang_member[1252];
			$arr["thursday"] =$lang_member[1253];
			$arr["friday"] =$lang_member[1254];
			$arr["saturday"] =$lang_member[1255];
			$arr["sunday"] =$lang_member[1249];

			$arr["win_day"] =$lang_member[2283];
			$arr["win_type"] =$lang_member[2284];

			$arr["lot3on"] =$lang_member[2285];
			$arr["laoset"] =$lang_member[640];
			$arr["num_order"] =$lang_member[425];

			//ฝาก-ถอน
			$arr["deposit_withdraw"] =$lang_member[39];
			$arr["inform_deposit"] =$lang_member[965];
			$arr["inform_withdraw"] =$lang_member[966];
			$arr["deposit_into_bank"] =$lang_member[975];
			$arr["deposit_balance"] =$lang_member[969];
			$arr["minimum_deposit"] =$lang_member[1659];
			$arr["maximum_deposit"] =$lang_member[1660];
			$arr["withdraw_to_bank"] =$lang_member[981];
			$arr["withdraw_code_4digit"] =$lang_member[974];
			$arr["minimum_withdraw"] =$lang_member[1661];
			$arr["maximum_withdraw"] =$lang_member[1662];
			$arr["deposit_bank_4digit"] =$lang_member[976];
			$arr["date_time_save"] =$lang_member[971];
			$arr["bank"] =$lang_member[77];
			$arr["status"] =$lang_member[301];
			$arr["withdrawal_bank"] =$lang_member[972];
			$arr["blocked_contact_agent"] =$lang_member[59];
			$arr["blocking"] =$lang_member[58];
			$arr["scan"] =$lang_member[2380];
			$arr["confirm_msg"] =$lang_member[2381];
			$arr["select_picture"] =$lang_member[2382];
			$arr["take_picture"] =$lang_member[2383];



	echo json_encode($arr);
?>
