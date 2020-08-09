// JavaScript Document
var c2=30;
var t2;
var _c2=15;
var _t2;
var Nl2 = [];
function Live_Ball_List(){
	 c2=30;
	_c2=15;
	clearTimeout(t2);
	clearTimeout(_t2);
	_timedCount2();
	$(".img_ref_live").addClass('image');
	BallLive.location="data/sport_data.php?sc=al&t="+Math.random();
}
function ShowBetListLive(Nl,Li){
	//alert("ddd")
	var lg;
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
	}
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
		url = "inc/fav_live_singleLine.php?t="+Math.random();
	}else if(file_req==2){
		url = "inc/fav_live_twoLine.php?t="+Math.random();
	}else if(file_req==3){
		url = "inc/fav_live_fullTime.php?t="+Math.random();
	}else if(file_req==4){
		url = "inc/fav_live_halfTime.php?t="+Math.random();
	}else if(file_req==5){
		url = "inc/fav_live_1x2.php?t="+Math.random();
	}
	
	$.ajax({
		type: "POST",
		url: url,
		data: { 'ball[]': Nl2 , 'ty': "live" , "tprice" : tprice , "ball_fav" : ball_fav },
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
		Live_Ball_List();
	}else{
    		_t2=setTimeout("_timedCount2()",1000);
	}
}
function timedCount2(lv)
{
	c2=c2-1;
	$("#t_ref_live span").html(c2);
	if (c2 <= 0){ 
		Live_Ball_List();
	}else{
		//var show_place=parseInt(document.getElementById('ref').innerHTML);
    		t2=setTimeout("timedCount2("+lv+")",1000);
		if((c2==10 || c2==20) && lv == 1){ 
			Live_Ball_Refresh(); 
		}
	}
}

function Live_Ball_Refresh(){ 
	if(document.getElementById("main_live").innerHTML != ""){
		BallLiveRefresh.location ="data/sport_data.php?sc=alr&t="+Math.random();
	}	
}
function Lchang_valbg(id,idbet,val,haou,idrunning,valnew,idball,tim,ball,ty,bl){
	var oo=[];
	try
  {
	var le = th[idball][0];
	var tm1 = th[idball][1];
	var tm2 = th[idball][2];
	
  }catch(err){
	 	var	le=Nl2[0][4];
		var	tm1=Nl2[0][5];		
		var	tm2=Nl2[0][6];	
	 }
	 
	for (var key in Nl2) {
		if(Nl2[key][0]==idball){
			oo = Nl2[key];
			var tor = oo[18];
			var score = oo[10]+"-"+oo[11];
			var play_date = oo[7];
			var play_date2 = oo[8];
			break;
		}
	}
	var dis_hdp = 0; 
	
	$("#"+id).html(_mix(valnew));
	
	if(parent.leftx.document.getElementById("pc_"+id)){
				parent.leftx.document.getElementById("pc_"+id).innerHTML = _mix(valnew);
				var nr = parent.leftx.document.getElementById("nr").value;
				var hdp_all = 0;
				for(var n=0;n<nr;n++){
					var hdp_r = $('.shdp'+n+' strong', parent.leftx.document).html();
					hdp_all = hdp_all+parseFloat(hdp_r);
				}
				$('.p_all', parent.leftx.document).html(parseFloat(hdp_all).toFixed(3));
				//console.log(hdp_all);
				
				var bg2=_red(_mix(valnew)); 
				$('#pc_'+id, parent.leftx.document).attr("class" , bg2);
		}
	
	var bg=_red(_mix(valnew)); 
	
	var play_date3 = play_date2.replace("'", "");
	$("#"+id).attr("class" , bg);
	$("#"+id).attr("onclick" , "setshowprice('"+le+"','"+tm1+"','"+tm2+"','"+tor+"','"+ball+"',this.innerHTML,'L','"+score+"',"+idrunning+","+ty+",'"+idball+"','"+tim+"','"+play_date+"' ,'"+bl+"',$('.time_p"+idball+"').html())");
	
	if(valnew==""){ 
		$("#"+id).html(""); 
		$("#"+id).attr("onclick","");
	}
}