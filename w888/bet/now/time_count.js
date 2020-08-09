// JavaScript Document
var time_livefull,time_todayfull;
var tmlive_count,tmtoday_count,tmtodaystep_count;
/*
function tmlivecount(){
	//alert($("#nbl").val())
	if($("#nbl").val()!=0){
		if(document.getElementById('tmlive')){
			var show_place=parseInt(document.getElementById('tmlive').innerHTML);
			if(show_place>0){
				var v = show_place-1;
				document.getElementById('tmlive').innerHTML = v;
				if (tmlive_count) { clearTimeout(tmlive_count); }
				tmlive_count=setTimeout("tmlivecount()",1000);
				if(show_place==10 || show_place==20){ 
					RefreshDifLive(); 
				}
			}else{	
				if (tmlive_count) { clearTimeout(tmlive_count); }			
				document.getElementById('tmlive').innerHTML = 10;
				if (tmlive_count) { clearTimeout(tmlive_count); }
				tmlive_count=setTimeout("tmlivecount()",1000);		 	
				Refl();
			} 
		}
	}
}
*/
function tmtodaycount(){
	if($("#nbt").val()!=0){
		var show_place=parseInt(document.getElementById('tmtoday').innerHTML);
		if(show_place>0){
			var v = show_place-1;
			document.getElementById('tmtoday').innerHTML = v;
			if (tmtoday_count) { clearTimeout(tmtoday_count); }
			tmtoday_count=setTimeout("tmtodaycount()",1000);
			if(show_place==2 || show_place==4 || show_place==6 || show_place==8){ 
				RefreshDifToday(); 
			}
		}else{	
			if (tmtoday_count) { clearTimeout(tmtoday_count); }	
			document.getElementById('tmtoday').innerHTML = 15;
			if (tmtoday_count) { clearTimeout(tmtoday_count); }
			tmtoday_count=setTimeout("tmtodaycount()",1000);
			Reft();
		} 
	}
}

/*
var show_place2=3600;
function tmtodaycount2(){
	if($("#nbt").val()!=0){
		var show_place=parseInt(document.getElementById('tmtoday').innerHTML);
		
		if(show_place>0){
			var v = show_place-1;
			document.getElementById('tmtoday').innerHTML = v;
			if (tmtoday_count) { clearTimeout(tmtoday_count); }
			//tmtoday_count=setTimeout("tmtodaycount()",1000);
			_bgg2();
		}else{	
			if (tmtoday_count) { clearTimeout(tmtoday_count); }	
			document.getElementById('tmtoday').innerHTML = 10;
			if (tmtoday_count) { clearTimeout(tmtoday_count); }
			//tmtoday_count=setTimeout("tmtodaycount()",1000);
			_bgg1();
		} 
		
		if(show_place2>0){
			show_place2=show_place2-1;
			if (tmtoday_count2) { clearTimeout(tmtoday_count2); }
			tmtoday_count2=setTimeout("tmtodaycount2()",1000);
		}else{	
			if (tmtoday_count2) { clearTimeout(tmtoday_count2); }
			show_place2 = 3600;	
			if (tmtoday_count2) { clearTimeout(tmtoday_count2); }
			tmtoday_count2=setTimeout("tmtodaycount2()",1000);
			Reft();
		} 
	}
}

*/
/*
function tmtodaystepcount(){
	if($("#nbs").val()!=0){
		var show_place=parseInt(document.getElementById('tmtodaystep').innerHTML);
		if(show_place>0){
			var v = show_place-1;
			document.getElementById('tmtodaystep').innerHTML = v;
		
			if (tmtodaystep_count) { clearTimeout(tmtodaystep_count); }
			tmtodaystep_count=setTimeout("tmtodaystepcount()",1000);
		     }else{	
			if (tmtodaystep_count) { clearTimeout(tmtodaystep_count); }	
			document.getElementById('tmtodaystep').innerHTML = 30;
			if (tmtodaystep_count) { clearTimeout(tmtodaystep_count); }
			tmtodaystep_count=setTimeout("tmtodaystepcount()",1000);
			Refs(); 
			//send_today();
			 console.log("bomload" ); // John
		} 
	}
}
*/
function myStopFunction(ty)
{
	if(ty==1){
		clearInterval(tmlive_count);
	}else if(ty==2){
		clearInterval(tmtoday_count);
	}else if(ty==3){
		clearInterval(tmtodaystep_count);
	}
}