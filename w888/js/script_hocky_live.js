// JavaScript Document
var c2=30;
var t2;
var _c2=15;
var _t2;
var Nl2 = [];
function Live_Hocky_List(){
	 c2=30;
	_c2=15;
	clearTimeout(t2);
	clearTimeout(_t2);
	_timedCount2();
	$(".img_ref_live").addClass('image');
	HockyLive.location="data/sport_data.php?sc=hkl&t="+Math.random();
}
function ShowBetListLive(Nl,Li){
	//alert("ddd")
	/*var lg;
	var tm1;
	var tm2;
	for(var i=0;i<Nl.length;i++){
		try
  {
			lg=th[Nl[i][0]][0];
		tm1=th[Nl[i][0]][1];		
		tm2=th[Nl[i][0]][2];		
			
  }catch(err){
	  		lg=Nl[i][4];
			tm1=Nl[i][5];
			tm2=Nl[i][6];
			
	 }
		Nl[i][41] = lg;
		Nl[i][42] = tm1;
		Nl[i][43] = tm2;
	}*/
	Nl2=Nl;
	if(Nl2.length>0){
		$("#t_ref_live").css('display' , 'block');
		load_live(view_ball , 1);
	}else{
		clearTimeout(_t2);
		c2=30;
		_c2=15;
		$("#t_ref_live").css('display' , 'none');
		timedCount2(0);
	}
}
function load_live(file_req , nload){
	var url;
	if(file_req==1){
		url = "inc/hocky_live_singleLine.php?t="+Math.random();
	}else if(file_req==2){
		url = "inc/hocky_live_twoLine.php?t="+Math.random();
	}else if(file_req==3){
		url = "inc/hocky_live_fullTime.php?t="+Math.random();
	}else if(file_req==4){
		url = "inc/hocky_live_halfTime.php?t="+Math.random();
	}else if(file_req==5){
		url = "inc/hocky_live_1x2.php?t="+Math.random();
	}
	
	$.ajax({
		type: "POST",
		url: url,
		data: { 'ball[]': Nl2 , 'ty': "live" , "tprice" : tprice },
		timeout: 15000,
		cache: false,	// Clear cache IE
		beforeSend: function(){
			if(nload==1){
				$(".img_ref_live").addClass('image');
			}
		},
		success: function(data){
			if(nload==1){
				clearTimeout(_t2);
				$(".img_ref_live").removeClass('image');
				$("#t_ref_live span").html(c2);
				timedCount2(1);
			}
			$("#main_live").html(data);	
			$("#sele").css('display' , 'block');
		}/*,statusCode: {
			404: function() {
				$("#t_ref_live span").html(c2);
				$(".img_ref_live").removeClass('image');
				clearTimeout(_t2);
				alert( "ไม่พบหน้าที่ต้องการ" );
			}
		},error: function (error) {
			alert( "ผิดพลาด" );
		}*/
	});	
}
function _timedCount2()
{
	//console.log(_c2);
	_c2=_c2-1;
	if (_c2 <= 0){ 
		Live_Hocky_List();
	}else{
    		_t2=setTimeout("_timedCount2()",1000);
	}
}
function timedCount2(lv)
{
	c2=c2-1;
	$("#t_ref_live span").html(c2);
	if (c2 <= 0){ 
		Live_Hocky_List();
	}else{
		//var show_place=parseInt(document.getElementById('ref').innerHTML);
    		t2=setTimeout("timedCount2("+lv+")",1000);
		if((c2==10 || c2==20) && lv == 1){ 
			Live_Hocky_Refresh(); 
		}
	}
}





function Live_Hocky_Refresh(){ 
	if(document.getElementById("main_live").innerHTML != ""){
		HockyLiveRefresh.location ="data/sport_data.php?sc=hklr&t="+Math.random();
	}	
}
function Lchang_valbg(id,idbet,val,haou,idrunning,ty,ball){
	var oo=[];
	 var idbet= idbet.substring(0,idbet.length-2);
	for (var key in Nl2) {
		if(Nl2[key][0]==idbet){
			oo = Nl2[key];
			var score = oo[10]+"-"+oo[11];
			var play_date2 = oo[8];
			
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
				//console.log(hdp_all);
				
				var bg2=_red(_mix(val)); 
				$('#pc_'+id, parent.leftx.document).attr("class" , bg2);
		}
	
	var bg=_red(_mix(val)); 
	
	var play_date3 = play_date2.replace("'", "");
	$("#"+id).attr("class" , bg);
	//console.log(score);
	
	//$(".score_p"+idball).html(score);
	
	$("#"+id).attr("onclick" , "setshowprice('"+le+"','"+tm1+"','"+tm2+"','"+tor+"','',this,'L',$('.score_p"+idbet+"').html(),"+idrunning+","+ty+",'"+idbet+"','"+id+"','"+play_date+"' ,'"+ball+"',$('.time_p"+idbet+"').html(),'"+b_sport+"','"+b_date_play+"','"+add+"')");
	
	if(val==""){ 
		$("#"+id).html(""); 
		$("#"+id).attr("onclick","");
	}
}