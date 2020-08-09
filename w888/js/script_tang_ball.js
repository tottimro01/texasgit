// JavaScript Click Ball Step
var vrob = 1;
var ball_step = 0;
var step_ball=[];
function setshowprice(leage,team1,team2,team_tor,ball_no,ele,hdp_dis,score,team,ty,idball,id,tdate , type_step,time_p,b_sport,b_date_play,badd){
	//console.log(ball);
	var hdp = $(ele).html();
	var ball;
	if(ball_step==0){
		ball = $("#"+type_step).html();
	}else{
		ball = ball_no;
	}
	//console.log(ball);
	if(hdp!=""){
	//idball , leage , team1 , team2 , team_tor = h เจ้าบ้าน a ทีมเยือน , ball , hdp , hdp_dis = T วันนี้ L กำลังเตะ , score , team = ตำแหน่งที่เลือก , ty = ชนิดที่เลือก , id = ตัวกระพริบ , tdate = วันเวลาเตะ , type_step ,time_p = เวลากำลังเตะ , tprice = 1 MY 2 HK 3 EU ,b_sport  = กีฬา , b_date_play,badd,vrob,vp= 1 ปกติ 2 mix  , ball_step = 10 บอลสเต็ป
		step_ball[0] =  [idball , leage , team1 , team2 , team_tor , ball , hdp , hdp_dis , score , team , ty , id , tdate , type_step ,time_p , tprice ,b_sport , b_date_play,badd,vrob,vp,ball_step];
		send_ar(step_ball);
	}
}

function send_ar(sd){
	$.post("sess.php" , { 'ball[]': sd , 'ty' : vp },
		function(data){
		//	console.log( data.type ); // John
		//	console.log( data.maxstep ); // John
			if(data.type=="f"){
				alert("Mix Parlay max : "+data.maxstep+" ");
			}else{
				if(vp==1){
					$(".tr_ball").css("background" , "");
				}
				$(".tr"+$.trim(data.type)).css("background" , "url(img/bgro.png)");
				parent.leftx.load_bet(view_ball , 1 , sport_t);
				//parent.parent.leftx.location.href="view_menu_mix.php";
			}
	}, "json");	
}


function delselect(id,arr){
	$(".tr"+id).css("background" , "");
	//step_ball[arr] = null;
	$.post("del_step.php" , { 'arr': arr , 'dd': '1' , 'ty' : vp},
		function(data){
			parent.leftx.load_bet(view_ball , data , sport_t);
	});
}
function pagenones(){
	$(".tr_ball").css("background" , "");	
	step_ball = [];
}