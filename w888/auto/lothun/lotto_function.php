<?
date_default_timezone_set("Asia/Bangkok");
$timezone=0;
$time_stam=mktime(date("H")+$timezone,date("i"),date("s"),date("m"),date("d"),date("Y"));

$lot_zone["th"]= array(1 =>"หวยไทย",2 =>"หวยหุ้นไทย",3 =>"หวยลาว" ,4=>"หวยมาเลเซีย",5=>"หวยเวียดนาม",6=>"หุ้นนิเคอิ",7=>"หุ้นฮั่งเส็ง",8=>"หุ้นดาวโจนส์",9=>"หุ้นสิงคโปร์",10=>"หุ้นอียิปต์",11=>"หุ้นรัสเซีย",12=>"หุ้นเยอรมัน",13=>"หุ้นอังกฤษ",14=>"หุ้นเกาหลี",15=>"หุ้นใต้หวัน",16=>"หุ้นจีน",17=>"หุ้นอินเดีย",18=>"จับยี่กี",19=>"หวยรายวัน"); 

$lot_zone_bet= array(1 =>1,2 =>4,3 =>1 ,4=>1,5=>1,6=>2,7=>2,8=>1,9=>1,10=>1,11=>1,12=>1,13=>1,14=>1,15=>1,16=>2,17=>1,18=>96,19=>11); 


$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง", 8 =>"ปักหลักหน่วย", 9 =>"ปักหลักสิบ", 10 =>"ปักหลักร้อย", 11 =>"2โต๊ด", 12 =>"3ใน4", 13 =>"3ใน5" , 14 =>"1ตัวบน สูง-ต่ำ" , 15 =>"2ตัวบน สูง-ต่ำ", 16 =>"3ตัวบน สูง-ต่ำ", 17 =>"2ตัวล่าง สูง-ต่ำ", 19 =>"คี่-คู่");
#เลขชุด=วิ่ง+1สูง-ต่ำ+1คี่-คู่

/*
function _dt($num){
	$num2=str_replace(array('E','K','H','L'),array('คี่','คู่','สูง','ต่ำ'),$num);
	return $num2;
	}
*/


		
function _close($zone, $rob ){

		if($zone==1){
					   if($rob==1){  $hh=15;  $mm=20; 	}	
					   
			}elseif($zone==2){
				        if($rob==1){ $hh=9;   $mm=50;   }
					    elseif($rob==2){ $hh=12;   $mm=20;   }
						elseif($rob==3){ $hh=14;  $mm=20;   }
						elseif($rob==4){ $hh=16;   $mm=25;  }
						
	   	}elseif($zone==3){
	                   if($rob==1){ $hh=20;  $mm=00; }
					   
	   	}elseif($zone==4){
	                   if($rob==1){ $hh=18;  $mm=00;  }
					   
		 	}elseif($zone==5){
	                   if($rob==1){ $hh=18;  $mm=00;   }			
					   
	}elseif($zone==6){
            	if($rob==1){ $hh=9;   $mm=29;  }
	            elseif($rob==2){ $hh=12;  $mm=59;   } 
				
	   	}elseif($zone==7){
	                   if($rob==1){ $hh=10;   $mm=55;  }
					   elseif($rob==2){ $hh=14;   $mm=55;   }
					   
	   	}elseif($zone==8){
	                   if($rob==1){ $hh=1;    $mm=00;  } ## ออกตี 4
					   
		 	}elseif($zone==9){
	                   if($rob==1){ $hh=15;  $mm=55;   }
					   
		 	}elseif($zone==10){
	                   if($rob==1){ $hh=18;   $mm=00;  }
					   
		 	}elseif($zone==11){
	                   if($rob==1){ $hh=22;    $mm=10;  }
					   
		 	}elseif($zone==12){
	                   if($rob==1){ $hh=22;   $mm=20;  }
					   
		 	}elseif($zone==13){
	                   if($rob==1){ $hh=22;  $mm=20;   }
					   
		 	}elseif($zone==14){
	                    if($rob==1){ $hh=12;  $mm=40;   }
		 	}elseif($zone==15){
	                   if($rob==1){ $hh=12;  $mm=10;   }
					   
	   	}elseif($zone==16){
	                   if($rob==1){ $hh=10;   $mm=05;  }
					   elseif($rob==2){ $hh=13;   $mm=40;   }
					   
			 	}elseif($zone==17){
	                   if($rob==1){ $hh=16;  $mm=40;   }			
					   
			 	}elseif($zone==18){
	                   if($rob==1){ $hh=6;  $mm=14;   }		
					   elseif($rob==2){ $hh=6;   $mm=29;   } 
					   elseif($rob==3){ $hh=6;   $mm=44;   } 
					   elseif($rob==4){ $hh=6;   $mm=59;   } 
					   
					   	elseif($rob==5){ $hh=7;   $mm=14;   }
					   elseif($rob==6){ $hh=7;   $mm=29;   }
					   elseif($rob==7){ $hh=7;   $mm=44;   }
					   elseif($rob==8){ $hh=7;   $mm=59;   } 
					   
					    elseif($rob==9){ $hh=8;   $mm=14;   }
					   elseif($rob==10){ $hh=8;   $mm=29;   }
					   elseif($rob==11){ $hh=8;   $mm=44;   }
					   elseif($rob==12){ $hh=8;   $mm=59;   } 
					   
					   elseif($rob==13){ $hh=9;   $mm=14;   }
					   elseif($rob==14){ $hh=9;   $mm=29;   }
					   elseif($rob==15){ $hh=9;   $mm=44;   }
					   elseif($rob==16){ $hh=9;   $mm=59;   } 
					   
					   elseif($rob==17){ $hh=10;   $mm=14;   }
					   elseif($rob==18){ $hh=10;   $mm=29;   }
					   elseif($rob==19){ $hh=10;   $mm=44;   }
					   elseif($rob==20){ $hh=10;   $mm=59;   } 
					   
						elseif($rob==21){ $hh=11;   $mm=14;   }
					   elseif($rob==22){ $hh=11;   $mm=29;   }
					   elseif($rob==23){ $hh=11;   $mm=44;   }
					   elseif($rob==24){ $hh=11;   $mm=59;   } 
					   
					  elseif($rob==25){ $hh=12;   $mm=14;   }
					   elseif($rob==26){ $hh=12;   $mm=29;   }
					   elseif($rob==27){ $hh=12;   $mm=44;   }
					   elseif($rob==28){ $hh=12;   $mm=59;   } 
					   
					   elseif($rob==29){ $hh=13;   $mm=14;   }
					   elseif($rob==30){ $hh=13;   $mm=29;   }
					   elseif($rob==31){ $hh=13;   $mm=44;   }
					   elseif($rob==32){ $hh=13;   $mm=59;   } 
					   
					   elseif($rob==33){ $hh=14;   $mm=14;   }
					   elseif($rob==34){ $hh=14;   $mm=29;   }
					   elseif($rob==35){ $hh=14;   $mm=44;   }
					   elseif($rob==36){ $hh=14;   $mm=59;   } 
					   
					   elseif($rob==37){ $hh=15;   $mm=14;   }
					   elseif($rob==38){ $hh=15;   $mm=29;   }
					   elseif($rob==39){ $hh=15;   $mm=44;   }
					   elseif($rob==40){ $hh=15;   $mm=59;   } 
					   
					   elseif($rob==41){ $hh=16;   $mm=14;   }
					   elseif($rob==42){ $hh=16;   $mm=29;   }
					   elseif($rob==43){ $hh=16;   $mm=44;   }
					   elseif($rob==44){ $hh=16;   $mm=59;   } 
					   
					   elseif($rob==45){ $hh=17;   $mm=14;   }
					   elseif($rob==46){ $hh=17;   $mm=29;   }
					   elseif($rob==47){ $hh=17;   $mm=44;   }
					   elseif($rob==48){ $hh=17;   $mm=59;   } 
					   
					   elseif($rob==49){ $hh=18;   $mm=14;   }
					   elseif($rob==50){ $hh=18;   $mm=29;   }
					   elseif($rob==51){ $hh=18;   $mm=44;   }
					   elseif($rob==52){ $hh=18;   $mm=59;   } 
					   
					   elseif($rob==53){ $hh=19;   $mm=14;   }
					   elseif($rob==54){ $hh=19;   $mm=29;   }
					   elseif($rob==55){ $hh=19;   $mm=44;   }
					   elseif($rob==56){ $hh=19;   $mm=59;   } 
					   
					   elseif($rob==57){ $hh=20;   $mm=14;   }
					   elseif($rob==58){ $hh=20;   $mm=29;   }
					   elseif($rob==59){ $hh=20;   $mm=44;   }
					   elseif($rob==60){ $hh=20;   $mm=59;   } 
					   
					   elseif($rob==61){ $hh=21;   $mm=14;   }
					   elseif($rob==62){ $hh=21;   $mm=29;   }
					   elseif($rob==63){ $hh=21;   $mm=44;   }
					   elseif($rob==64){ $hh=21;   $mm=59;   } 
					   
					   elseif($rob==65){ $hh=22;   $mm=14;   }
					   elseif($rob==66){ $hh=22;   $mm=29;   }
					   elseif($rob==67){ $hh=22;   $mm=44;   }
					   elseif($rob==68){ $hh=22;   $mm=59;   } 
					   
					   elseif($rob==69){ $hh=23;   $mm=14;   }
					   elseif($rob==70){ $hh=23;   $mm=29;   }
					   elseif($rob==71){ $hh=23;   $mm=44;   }
					   elseif($rob==72){ $hh=23;   $mm=59;   } 
					   
					   elseif($rob==73){ $hh=0;   $mm=14;   }
					   elseif($rob==74){ $hh=0;   $mm=29;   }
					   elseif($rob==75){ $hh=0;   $mm=44;   }
					   elseif($rob==76){ $hh=0;   $mm=59;   } 
					   
					   elseif($rob==77){ $hh=1;   $mm=14;   }
					   elseif($rob==78){ $hh=1;   $mm=29;   }
					   elseif($rob==79){ $hh=1;   $mm=44;   }
					   elseif($rob==80){ $hh=1;   $mm=59;   } 
					   
					   elseif($rob==81){ $hh=2;   $mm=14;   }
					   elseif($rob==82){ $hh=2;   $mm=29;   }
					   elseif($rob==83){ $hh=2;   $mm=44;   }
					   elseif($rob==84){ $hh=2;   $mm=59;   } 
					   
					  elseif($rob==85){ $hh=3;   $mm=14;   }
					   elseif($rob==86){ $hh=3;   $mm=29;   }
					   elseif($rob==87){ $hh=3;   $mm=44;   }
					   elseif($rob==88){ $hh=3;   $mm=59;   } 
					   
					   	elseif($rob==89){ $hh=4;   $mm=14;   }
					   elseif($rob==90){ $hh=4;   $mm=29;   }
					   elseif($rob==91){ $hh=4;   $mm=44;   }
					   elseif($rob==92){ $hh=4;   $mm=59;   } 
					   
					   	 elseif($rob==93){ $hh=5;   $mm=14;   }
					   elseif($rob==94){ $hh=5;   $mm=29;   }
					   elseif($rob==95){ $hh=5;   $mm=44;   }
					   elseif($rob==96){ $hh=5;   $mm=59;   } 
					   
	   
					   
		 	}elseif($zone==19){
	                   if($rob==1){ $hh=11;  $mm=58;   }
					   elseif($rob==2){ $hh=12;   $mm=58;   }
						elseif($rob==3){ $hh=13;  $mm=58;   }
						elseif($rob==4){ $hh=14;   $mm=58;  }
						elseif($rob==5){ $hh=15;   $mm=58;  }
						elseif($rob==6){ $hh=16;   $mm=58;  }
						elseif($rob==7){ $hh=17;   $mm=58;  }
						elseif($rob==8){ $hh=18;   $mm=58;  }
						elseif($rob==9){ $hh=19;   $mm=58;  }
						elseif($rob==10){ $hh=20;   $mm=58;  }
						elseif($rob==11){ $hh=21;   $mm=58;  }
	
			}
			
	return array("hh"=>$hh,"mm"=>$mm);
	
	}
		
	

		
		
function write($path, $content, $mode="w+"){
    if (file_exists($path) && !is_writeable($path)){ return false; }
    if ($fp = fopen($path, $mode)){
        fwrite($fp, $content);
        fclose($fp);
    }
    else { return false; }
    return true;
}	



function file_get_contents2($url)
{
$context = stream_context_create(
    array(
        'http' => array(
            'max_redirects' => 101
        )
    )
);
$output=file_get_contents($url, false, $context);
    return $output;
}


?>