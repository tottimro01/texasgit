// JavaScript Document
var c=90;
var t;
var _c=15;
var _t;
function Today_Besball_List(){
	c=91;
	_c=15;
	clearTimeout(t);
	clearTimeout(_t);
	_timedCount();
	$(".img_ref_today").addClass('image');
	BesballToday.location="data/sport_data.php?sc=bbt&t="+Math.random();
}
function ShowBetListToday(Nt){
	/*var lg;
	var leag;
	var tm1;
	var tm2;
	for(var i=0;i<Nt.length;i++){
		var p = 0;
		try
  {
			leag=th[Nt[i][0]][0];
			tm1=th[Nt[i][0]][1];		
			tm2=th[Nt[i][0]][2];		
			
  }catch(err){
	  		leag=Nt[i][4];
			tm1=Nt[i][5];
			tm2=Nt[i][6];
	 }
		Nt[i][41] = leag;
		Nt[i][42] = tm1;
		Nt[i][43] = tm2;
	}*/
	Nt2=Nt;
	if(Nt2.length>0){
		$("#t_ref_today").css('display' , 'block');
		load_today(view_ball , 1);
	}else{
		clearTimeout(_t);
		c=90;
		_c=15;
		$("#t_ref_today").css('display' , 'none');
		timedCount(0);
	}
}
function load_today(file_req , nload){
	var url;
	if(file_req==1){
		url = "inc/besball_today_singleLine.php?t="+Math.random();
	}else if(file_req==2){
		url = "inc/besball_today_twoLine.php?t="+Math.random();
	}else if(file_req==3){
		url = "inc/besball_today_fullTime.php?t="+Math.random();
	}else if(file_req==4){
		url = "inc/besball_today_halfTime.php?t="+Math.random();
	}else if(file_req==5){
		url = "inc/besball_today_1x2.php?t="+Math.random();
	}else if(file_req==6){
		url = "inc/besball_today_kk.php?t="+Math.random();
	}
	$.ajax({
		type: "POST",
		url: url,
		data: { 'ball[]': Nt2 , 'ty': "today" , "tprice" : tprice },
		timeout: 15000,
		cache: false,	// Clear cache IE
		beforeSend: function(){
			if(nload==1){
				$(".img_ref_today").addClass('image');
			}
		},
		success: function(data){
			if(nload==1){
				clearTimeout(_t);
				$(".img_ref_today").removeClass('image');
				$("#t_ref_today span").html(c);
				/*if(file_req==6){
					timedCount(0);
				}else{*/
					timedCount(1);
				//}
			}
			$("#main_today").html(data);
			$("#sele").css('display' , 'block');
		}
	});	
}
function _timedCount()
{
	//console.log(_c);
	_c=_c-1;
	if (_c <= 0){ 
		Today_Besball_List();
	}else{
    		_t=setTimeout("_timedCount()",1000);
	}
}
function timedCount(lv)
{
	c=c-1;
	$("#t_ref_today span").html(c);
	if (c <= 0){ 
		Today_Besball_List();
	}else{
		//var show_place=parseInt(document.getElementById('ref').innerHTML);
    		t=setTimeout("timedCount("+lv+")",1000);
		if((c==15 || c==30 || c==45 || c==60 || c==75) && lv == 1){ 
			Today_Besball_Refresh(); 
		}
	}
}

function Today_Besball_Refresh(){ 
	if(document.getElementById("main_today").innerHTML != ""){
		BesballTodayRefresh.location ="data/sport_data.php?sc=bbtr&t="+Math.random();
	}	
}
function Tchang_valbg(id,idbet,val,haou,idrunning,ty,ball){
	var idbet= idbet.substring(0,idbet.length-2);
	var oo=[];
	for (var key in Nt2) {
		//console.log(Nt2[key][0],idbet);
		if(Nt2[key][0]==idbet){
			oo = Nt2[key];
			//console.log(oo);
			var	le=oo[4];
			var	tm1=oo[5];		
			var	tm2=oo[6];	
			var tor = oo[18];
			var play_date = oo[7];
			var b_sport = oo[46];
			var b_date_play = oo[47];
			var add = oo[1];
			break;
		}
	}
	
	var dis_hdp = 0; 
	$("#"+id).html(_mix(val));
	
		if(parent.leftx.document.getElementById("pc_"+id)){
				parent.leftx.document.getElementById("pc_"+id).innerHTML = _mix(val);
				var nr = parent.leftx.document.getElementById("nr").value;
				var hdp_all = 1;
				for(var n=0;n<nr;n++){
					var hdp_r = $('.shdp'+n+' strong', parent.leftx.document).html();
					hdp_all = hdp_all*parseFloat(hdp_r);
				}
				$('.p_all', parent.leftx.document).html(parseFloat(hdp_all).toFixed(3));
				//parent.leftx.document.getElementById("ps_"+id).innerHTML = _mix(valnew);
				
				var bg2=_red(_mix(val)); 
				$('#pc_'+id, parent.leftx.document).attr("class" , bg2);
		}
	
	var bg=_red(_mix(val)); 
	$("#"+id).attr("class" , bg);
	//console.log( "setshowprice('"+le+"','"+tm1+"','"+tm2+"','"+tor+"','',this,'T','',"+idrunning+","+ty+",'"+idbet+"','"+id+"','"+play_date+"' ,'"+ball+"','','"+b_sport+"','"+b_date_play+"','"+add+"')");
	$("#"+id).attr("onclick" , "setshowprice('"+le+"','"+tm1+"','"+tm2+"','"+tor+"','',this,'T','',"+idrunning+","+ty+",'"+idbet+"','"+id+"','"+play_date+"' ,'"+ball+"','','"+b_sport+"','"+b_date_play+"','"+add+"')");
	
	if(val==""){ 
		$("#"+id).html(""); 
		$("#"+id).attr("onclick","");
	}
}