// JavaScript Document
function RefreshDiff(vtype,varry5,varry6){
	var cnt=varry6.length;
	var cnl=varry5.length;
	for (i=0; i<cnl; i++) {
		var ball_id = varry5[i][0].substring(0,varry5[i][0].length-2);
		var ball_time = varry5[i][1];
		var ball_score = varry5[i][2];
		var ball_red_h = varry5[i][3];
		var ball_red_a = varry5[i][4];
		var ball_yellow_h = varry5[i][5];
		var ball_yellow_a = varry5[i][6];
		
		$(".time_p"+ball_id).html(ball_time);
		$(".score_p"+ball_id).html(ball_score);
		if(ball_red_h>0){
			$(".red_1p"+ball_id).html('<img src="img/card/redcard'+ball_red_h+'.gif" style="vertical-align: middle;" height="13">');
		}
		if(ball_red_a>0){
			$(".red_2p"+ball_id).html('<img src="img/card/redcard'+ball_red_a+'.gif" style="vertical-align: middle;" height="13">');
		}
		if(ball_red_h>0){
			$(".red_1p"+ball_id).html('<img src="img/card/redcard'+ball_red_h+'.gif" style="vertical-align: middle;" height="13">');
		}
		if(ball_yellow_h>0){
			$(".yellow_1p"+ball_id).html('<img src="img/card/yellow'+ball_yellow_h+'.gif" style="vertical-align: middle;" height="13">');
		}
		if(ball_yellow_a>0){
			$(".yellow_2p"+ball_id).html('<img src="img/card/yellow'+ball_yellow_a+'.gif" style="vertical-align: middle;" height="13">');
		}
	}
	var shwprice = ""; 
	if (vtype=='l'){
		for (i=0; i<cnt; i++) {
			var ball_type = varry6[i][0].slice(-1);
			var ball_id_full = varry6[i][0];
			var c1 = varry6[i][1];
			var c2 = varry6[i][2];
			var c3 = varry6[i][3];
			if (ball_type=='1') {				
				var bal='Lball_'+ball_id_full+'_1';
				var bal2='b_Lball_'+ball_id_full+'_1';
				var nid1='Lfhdp_'+ball_id_full+'_1';
				var nid2='Lfhdp_'+ball_id_full+'_2';	
				var nidp1='p_Lfhdp_'+ball_id_full+'_1';
				var nidp2='p_Lfhdp_'+ball_id_full+'_2';	
				var nidpc1='pc_Lfhdp_'+ball_id_full+'_1';
				var nidpc2='pc_Lfhdp_'+ball_id_full+'_2';			
				if (document.getElementById(nid1)) {
					document.getElementById(nid1).style.backgroundImage="url(img/newY.gif)";	
					document.getElementById(nid2).style.backgroundImage="url(img/newY.gif)";							
					document.getElementById(bal).innerHTML=c1;
					
					if(parent.leftx.document.getElementById(nidp1)){
						parent.leftx.document.getElementById(bal2).innerHTML=c1;
						parent.leftx.document.getElementById(nidp1).style.backgroundImage="url(img/newY.gif)";	
					}
					
					if(parent.leftx.document.getElementById(nidp2)){
						parent.leftx.document.getElementById(bal2).innerHTML=c1;
						parent.leftx.document.getElementById(nidp2).style.backgroundImage="url(img/newY.gif)";	
					}
					 
					Lchang_valbg(nid1,ball_id_full,c2,'h','1','1',bal);
					Lchang_valbg(nid2,ball_id_full,c3,'a','2','1',bal);
					
					setTimeout("clearbg('"+nid1+"');",10000);
					setTimeout("clearbg('"+nid2+"');",10000);	
					
					if(parent.leftx.document.getElementById(nidp1)){
						setTimeout("clearbg2('"+nidp1+"');",10000);			
					}
					
					if(parent.leftx.document.getElementById(nidp2)){
						setTimeout("clearbg2('"+nidp2+"');",10000);			
					}								
				}
			
			} else if (ball_type=='2') {
				var bal='Lball_'+ball_id_full+'_2';
				var bal2='b_Lball_'+ball_id_full+'_2';
				var nid1='Lfou_'+ball_id_full+'_3';
				var nid2='Lfou_'+ball_id_full+'_4';	
				var nidp1='p_Lfou_'+ball_id_full+'_3';
				var nidp2='p_Lfou_'+ball_id_full+'_4';	
				var nidpc1='pc_Lfou_'+ball_id_full+'_3';
				var nidpc2='pc_Lfou_'+ball_id_full+'_4';	
				if (document.getElementById(nid1)) {
					document.getElementById(nid1).style.backgroundImage="url(img/newY.gif)";	
					document.getElementById(nid2).style.backgroundImage="url(img/newY.gif)";							
					document.getElementById(bal).innerHTML=c1;		
					
					if(parent.leftx.document.getElementById(nidp1)){
						parent.leftx.document.getElementById(bal2).innerHTML=c1;
						parent.leftx.document.getElementById(nidp1).style.backgroundImage="url(img/newY.gif)";	
					}
					
					if(parent.leftx.document.getElementById(nidp2)){
						parent.leftx.document.getElementById(bal2).innerHTML=c1;
						parent.leftx.document.getElementById(nidp2).style.backgroundImage="url(img/newY.gif)";	
					}
					
					Lchang_valbg(nid1,ball_id_full,c2,'o','1','2',bal);
					Lchang_valbg(nid2,ball_id_full,c3,'u','2','2',bal);
					
					setTimeout("clearbg('"+nid1+"');",10000);
					setTimeout("clearbg('"+nid2+"');",10000);	
					
					if(parent.leftx.document.getElementById(nidp1)){
						setTimeout("clearbg2('"+nidp1+"');",10000);			
					}
					
					if(parent.leftx.document.getElementById(nidp2)){
						setTimeout("clearbg2('"+nidp2+"');",10000);			
					}																
				}	
			
			} else if (ball_type=='4') {
				//console.log('Lhhdp_'+varry6[i][3]+'_5');
				var bal='Lball_'+ball_id_full+'_3';
				var bal2='b_Lball_'+ball_id_full+'_3';
				var nid1='Lhhdp_'+ball_id_full+'_5';
				var nid2='Lhhdp_'+ball_id_full+'_6';	
				var nidp1='p_Lhhdp_'+ball_id_full+'_5';
				var nidp2='p_Lhhdp_'+ball_id_full+'_6';	
				var nidpc1='pc_Lhhdp_'+ball_id_full+'_5';
				var nidpc2='pc_Lhhdp_'+ball_id_full+'_6';	
				if (document.getElementById(nid1)){	
					document.getElementById(nid1).style.backgroundImage="url(img/newY.gif)";	
					document.getElementById(nid2).style.backgroundImage="url(img/newY.gif)";				
					document.getElementById(bal).innerHTML=c1;
					
					if(parent.leftx.document.getElementById(nidp1)){
						parent.leftx.document.getElementById(bal2).innerHTML=c1;
						parent.leftx.document.getElementById(nidp1).style.backgroundImage="url(img/newY.gif)";	
					}
					
					if(parent.leftx.document.getElementById(nidp2)){
						parent.leftx.document.getElementById(bal2).innerHTML=c1;
						parent.leftx.document.getElementById(nidp2).style.backgroundImage="url(img/newY.gif)";	
					}
					
					Lchang_valbg(nid1,ball_id_full,c2,'h','1','3',bal);
					Lchang_valbg(nid2,ball_id_full,c3,'a','2','3',bal);
					
					
					setTimeout("clearbg('"+nid1+"');",10000);
					setTimeout("clearbg('"+nid2+"');",10000);		
					
					if(parent.leftx.document.getElementById(nidp1)){
						setTimeout("clearbg2('"+nidp1+"');",10000);			
					}
					
					if(parent.leftx.document.getElementById(nidp2)){
						setTimeout("clearbg2('"+nidp2+"');",10000);			
					}													
				}	
			
			} else if (ball_type=='5') {
				var bal='Lball_'+ball_id_full+'_4';
				var bal2='b_Lball_'+ball_id_full+'_4';
				var nid1='Lhou_'+ball_id_full+'_7';
				var nid2='Lhou_'+ball_id_full+'_8';	
				var nidp1='p_Lhou_'+ball_id_full+'_7';
				var nidp2='p_Lhou_'+ball_id_full+'_8';	
				var nidpc1='pc_Lhou_'+ball_id_full+'_7';
				var nidpc2='pc_Lhou_'+ball_id_full+'_8';	
				if (document.getElementById(nid1)) {	
					document.getElementById(nid1).style.backgroundImage="url(img/newY.gif)";	
					document.getElementById(nid2).style.backgroundImage="url(img/newY.gif)";				
					document.getElementById(bal).innerHTML=c1;
					
					if(parent.leftx.document.getElementById(nidp1)){
						parent.leftx.document.getElementById(bal2).innerHTML=c1;
						parent.leftx.document.getElementById(nidp1).style.backgroundImage="url(img/newY.gif)";	
					}
					
					if(parent.leftx.document.getElementById(nidp2)){
						parent.leftx.document.getElementById(bal2).innerHTML=c1;
						parent.leftx.document.getElementById(nidp2).style.backgroundImage="url(img/newY.gif)";	
					}
					
					Lchang_valbg(nid1,ball_id_full,c2,'o','1','4',bal);
					Lchang_valbg(nid2,ball_id_full,c3,'u','2','4',bal);
					
					setTimeout("clearbg('"+nid1+"');",10000);
					setTimeout("clearbg('"+nid2+"');",10000);			
					
					if(parent.leftx.document.getElementById(nidp1)){
						setTimeout("clearbg2('"+nidp1+"');",10000);			
					}
					
					if(parent.leftx.document.getElementById(nidp2)){
						setTimeout("clearbg2('"+nidp2+"');",10000);			
					}											
				}			
			} else if (ball_type=='3') {				
				var vid1='Lf1_'+ball_id_full+'_1';
				var vid2='Lf2_'+ball_id_full+'_2';
				var vidx='Lfx_'+ball_id_full+'_3';	
				var vidp1='p_Lf1_'+ball_id_full+'_1';
				var vidp2='p_Lf2_'+ball_id_full+'_2';
				var vidpx='p_Lfx_'+ball_id_full+'_3';	
				var vidpc1='pc_Lf1_'+ball_id_full+'_1';
				var vidpc2='pc_Lf2_'+ball_id_full+'_2';
				var vidpcx='pc_Lfx_'+ball_id_full+'_3';							
				if (document.getElementById(vid1)) {
					document.getElementById(vid1).style.backgroundImage="url(img/newY.gif)";
					document.getElementById(vid2).style.backgroundImage="url(img/newY.gif)";	
					document.getElementById(vidx).style.backgroundImage="url(img/newY.gif)";	
					
					if(parent.leftx.document.getElementById(vidp1)){
						parent.leftx.document.getElementById(vidp1).style.backgroundImage="url(img/newY.gif)";	
					}
					
					if(parent.leftx.document.getElementById(vidp2)){
						parent.leftx.document.getElementById(vidp2).style.backgroundImage="url(img/newY.gif)";	
					}
					
					if(parent.leftx.document.getElementById(vidpx)){
						parent.leftx.document.getElementById(vidpx).style.backgroundImage="url(img/newY.gif)";	
					}
					
					Lchang_valbg(vid1,ball_id_full,c1,'h','1','5',bal);
					Lchang_valbg(vid2,ball_id_full,c2,'a','2','5',bal);
					Lchang_valbg(vidx,ball_id_full,c3,'x','3','5',bal);
					
					setTimeout("clearbg('"+vid1+"');",10000);
					setTimeout("clearbg('"+vid2+"');",10000);
					setTimeout("clearbg('"+vidx+"');",10000);	
					
					if(parent.leftx.document.getElementById(vidp1)){
						setTimeout("clearbg2('"+vidp1+"');",10000);			
					}
					
					if(parent.leftx.document.getElementById(vidp2)){
						setTimeout("clearbg2('"+vidp2+"');",10000);			
					}		
					
					if(parent.leftx.document.getElementById(vidpx)){
						setTimeout("clearbg2('"+vidpx+"');",10000);			
					}															
				}
			
			} else if (ball_type=='3') {
				var vid1='Lh1_'+ball_id_full+'_1';
				var vid2='Lh2_'+ball_id_full+'_2';
				var vidx='Lhx_'+ball_id_full+'_3';		
				var vidp1='p_Lh1_'+ball_id_full+'_1';
				var vidp2='p_Lh2_'+ball_id_full+'_2';
				var vidpx='p_Lhx_'+ball_id_full+'_3';	
				var vidpc1='pc_Lh1_'+ball_id_full+'_1';
				var vidpc2='pc_Lh2_'+ball_id_full+'_2';
				var vidpcx='pc_Lhx_'+ball_id_full+'_3';						
				if (document.getElementById(vid1)) {
					document.getElementById(vid1).style.backgroundImage="url(img/newY.gif)";
					document.getElementById(vid2).style.backgroundImage="url(img/newY.gif)";		
					document.getElementById(vidx).style.backgroundImage="url(img/newY.gif)";		
					
					if(parent.leftx.document.getElementById(vidp1)){
						parent.leftx.document.getElementById(vidp1).style.backgroundImage="url(img/newY.gif)";	
					}
					
					if(parent.leftx.document.getElementById(vidp2)){
						parent.leftx.document.getElementById(vidp2).style.backgroundImage="url(img/newY.gif)";	
					}
					
					if(parent.leftx.document.getElementById(vidpx)){
						parent.leftx.document.getElementById(vidpx).style.backgroundImage="url(img/newY.gif)";	
					}									
					
					Lchang_valbg(vid1,ball_id_full,c1,'h','1','6',bal);
					Lchang_valbg(vid2,ball_id_full,c2,'a','2','6',bal);
					Lchang_valbg(vidx,ball_id_full,c3,'x','3','6',bal);
						
					setTimeout("clearbg('"+vid1+"');",10000);
					setTimeout("clearbg('"+vid2+"');",10000);
					setTimeout("clearbg('"+vidx+"');",10000);				
					
					if(parent.leftx.document.getElementById(vidp1)){
						setTimeout("clearbg2('"+vidp1+"');",10000);			
					}
					
					if(parent.leftx.document.getElementById(vidp2)){
						setTimeout("clearbg2('"+vidp2+"');",10000);			
					}		
					
					if(parent.leftx.document.getElementById(vidpx)){
						setTimeout("clearbg2('"+vidpx+"');",10000);			
					}																				
				}			
			}				
		}
	} else if (vtype=='t') {
		for (i=0; i<cnt; i++) {
			var ball_type = varry6[i][0].slice(-1);
			var ball_id_full = varry6[i][0];
			var c1 = varry6[i][1];
			var c2 = varry6[i][2];
			var c3 = varry6[i][3];
			if (ball_type=='1') {				
				var bal='Tball_'+ball_id_full+'_1';
				var bal2='b_Tball_'+ball_id_full+'_1';
				var nid1='Tfhdp_'+ball_id_full+'_1';
				var nid2='Tfhdp_'+ball_id_full+'_2';			
				var nidp1='p_Tfhdp_'+ball_id_full+'_1';
				var nidp2='p_Tfhdp_'+ball_id_full+'_2';	
				var nidpc1='pc_Tfhdp_'+ball_id_full+'_1';
				var nidpc2='pc_Tfhdp_'+ball_id_full+'_2';	
				
				if (document.getElementById(nid1)) {
					
					///แต้มต่อ
					document.getElementById(nid1).style.backgroundImage="url(img/newY.gif)";	
					document.getElementById(nid2).style.backgroundImage="url(img/newY.gif)";	
					document.getElementById(bal).innerHTML=c1;
					
					///แต้มต่อรายการแทง
					if(parent.leftx.document.getElementById(nidp1)){
						parent.leftx.document.getElementById(bal2).innerHTML=c1;
						parent.leftx.document.getElementById(nidp1).style.backgroundImage="url(img/newY.gif)";	
					}
					if(parent.leftx.document.getElementById(nidp2)){
						parent.leftx.document.getElementById(bal2).innerHTML=c1;
						parent.leftx.document.getElementById(nidp2).style.backgroundImage="url(img/newY.gif)";	
					}
					
					
					/*Tchang_valbg(nid1,varry6[i][3],varry6[i][5],'h','1',varry6[i][5],varry6[i][1],nid1,varry6[i][4],'1',bal);
					Tchang_valbg(nid2,varry6[i][3],varry6[i][6],'a','2',varry6[i][6],varry6[i][1],nid2,varry6[i][4],'1',bal);	*/
					
					Tchang_valbg(nid1,ball_id_full,c2,'h','1','1',bal);
					Tchang_valbg(nid2,ball_id_full,c3,'a','2','1',bal);
					
					setTimeout("clearbg('"+nid1+"');",10000);
					setTimeout("clearbg('"+nid2+"');",10000);			
					
					if(parent.leftx.document.getElementById(nidp1)){
						setTimeout("clearbg2('"+nidp1+"');",10000);			
					}
					
					if(parent.leftx.document.getElementById(nidp2)){
						setTimeout("clearbg2('"+nidp2+"');",10000);			
					}					
				}
			
			} else if (ball_type=='2') {
				var bal='Tball_'+ball_id_full+'_2';
				var bal2='b_Tball_'+ball_id_full+'_2';
				var nid1='Tfou_'+ball_id_full+'_3';
				var nid2='Tfou_'+ball_id_full+'_4';	
				var nidp1='p_Tfou_'+ball_id_full+'_3';
				var nidp2='p_Tfou_'+ball_id_full+'_4';	
				var nidpc1='pc_Tfou_'+ball_id_full+'_3';
				var nidpc2='pc_Tfou_'+ball_id_full+'_4';	
				
				if (document.getElementById(nid1)) {
					document.getElementById(nid1).style.backgroundImage="url(img/newY.gif)";	
					document.getElementById(nid2).style.backgroundImage="url(img/newY.gif)";							
					document.getElementById(bal).innerHTML=c1;	
					
					if(parent.leftx.document.getElementById(nidp1)){
						parent.leftx.document.getElementById(bal2).innerHTML=c1;
						parent.leftx.document.getElementById(nidp1).style.backgroundImage="url(img/newY.gif)";	
					}
					
					if(parent.leftx.document.getElementById(nidp2)){
						parent.leftx.document.getElementById(bal2).innerHTML=c1;
						parent.leftx.document.getElementById(nidp2).style.backgroundImage="url(img/newY.gif)";	
					}
									
					//Tchang_valbg(nid1,varry6[i][3],varry6[i][5],'o','1',varry6[i][5],varry6[i][1],nid1,varry6[i][4],'2',bal);
					//Tchang_valbg(nid2,varry6[i][3],varry6[i][6],'u','2',varry6[i][6],varry6[i][1],nid2,varry6[i][4],'2',bal);	
					
					Tchang_valbg(nid1,ball_id_full,c2,'o','1','2',bal);
					Tchang_valbg(nid2,ball_id_full,c3,'u','2','2',bal);
					
					setTimeout("clearbg('"+nid1+"');",10000);
					setTimeout("clearbg('"+nid2+"');",10000);		
					
					if(parent.leftx.document.getElementById(nidp1)){
						setTimeout("clearbg2('"+nidp1+"');",10000);			
					}
					
					if(parent.leftx.document.getElementById(nidp2)){
						setTimeout("clearbg2('"+nidp2+"');",10000);			
					}			
																				
				}	
			} else if (ball_type=='3') {				
				var vid1='Tf1_'+ball_id_full+'_1';
				var vid2='Tf2_'+ball_id_full+'_2';
				var vidx='Tfx_'+ball_id_full+'_3';	
				var vidp1='p_Tf1_'+ball_id_full+'_1';
				var vidp2='p_Tf2_'+ball_id_full+'_2';
				var vidpx='p_Tfx_'+ball_id_full+'_3';	
				var vidpc1='pc_Tf1_'+ball_id_full+'_1';
				var vidpc2='pc_Tf2_'+ball_id_full+'_2';
				var vidpcx='pc_Tfx_'+ball_id_full+'_3';	
								
				if (document.getElementById(vid1)) {
					document.getElementById(vid1).style.backgroundImage="url(img/newY.gif)";
					document.getElementById(vid2).style.backgroundImage="url(img/newY.gif)";	
					document.getElementById(vidx).style.backgroundImage="url(img/newY.gif)";		
					
					if(parent.leftx.document.getElementById(vidp1)){
						parent.leftx.document.getElementById(vidp1).style.backgroundImage="url(img/newY.gif)";	
					}
					
					if(parent.leftx.document.getElementById(vidp2)){
						parent.leftx.document.getElementById(vidp2).style.backgroundImage="url(img/newY.gif)";	
					}
					
					if(parent.leftx.document.getElementById(vidpx)){
						parent.leftx.document.getElementById(vidpx).style.backgroundImage="url(img/newY.gif)";	
					}
					
					
					/*Tchang_valbg(vid1,varry6[i][3],varry6[i][4],'h','1',varry6[i][4],varry6[i][1],vid1,'','5','');						
					Tchang_valbg(vid2,varry6[i][3],varry6[i][5],'a','2',varry6[i][5],varry6[i][1],vid2,'','5','');		
					Tchang_valbg(vidx,varry6[i][3],varry6[i][6],'x','3',varry6[i][6],varry6[i][1],vidx,'','5','');	*/	
					
					Tchang_valbg(vid1,ball_id_full,c1,'h','1','5',bal);
					Tchang_valbg(vid2,ball_id_full,c2,'a','2','5',bal);
					Tchang_valbg(vidx,ball_id_full,c3,'x','3','5',bal);
								
					setTimeout("clearbg('"+vid1+"');",10000);
					setTimeout("clearbg('"+vid2+"');",10000);
					setTimeout("clearbg('"+vidx+"');",10000);		
					
					if(parent.leftx.document.getElementById(vidp1)){
						setTimeout("clearbg2('"+vidp1+"');",10000);			
					}
					
					if(parent.leftx.document.getElementById(vidp2)){
						setTimeout("clearbg2('"+vidp2+"');",10000);			
					}		
					
					if(parent.leftx.document.getElementById(vidpx)){
						setTimeout("clearbg2('"+vidpx+"');",10000);			
					}												
				}
			
			} else if (ball_type=='4') {
				var bal='Tball_'+ball_id_full+'_3';
				var bal2='b_Tball_'+ball_id_full+'_3';
				var nid1='Thhdp_'+ball_id_full+'_5';
				var nid2='Thhdp_'+ball_id_full+'_6';	
				var nidp1='p_Thhdp_'+ball_id_full+'_5';
				var nidp2='p_Thhdp_'+ball_id_full+'_6';	
				var nidpc1='pc_Thhdp_'+ball_id_full+'_5';
				var nidpc2='pc_Thhdp_'+ball_id_full+'_6';	
				if (document.getElementById(nid1)){	
					document.getElementById(nid1).style.backgroundImage="url(img/newY.gif)";	
					document.getElementById(nid2).style.backgroundImage="url(img/newY.gif)";				
					document.getElementById(bal).innerHTML=c1;
					
					if(parent.leftx.document.getElementById(nidp1)){
						parent.leftx.document.getElementById(bal2).innerHTML=c1;
						parent.leftx.document.getElementById(nidp1).style.backgroundImage="url(img/newY.gif)";	
					}
					
					if(parent.leftx.document.getElementById(nidp2)){
						parent.leftx.document.getElementById(bal2).innerHTML=c1;
						parent.leftx.document.getElementById(nidp2).style.backgroundImage="url(img/newY.gif)";	
					}
					
					/*Tchang_valbg(nid1,varry6[i][3],varry6[i][5],'h','1',varry6[i][5],varry6[i][1],nid1,varry6[i][4],'3',bal);
					Tchang_valbg(nid2,varry6[i][3],varry6[i][6],'a','2',varry6[i][6],varry6[i][1],nid2,varry6[i][4],'3',bal);*/
					
					Tchang_valbg(nid1,ball_id_full,c2,'h','1','3',bal);
					Tchang_valbg(nid2,ball_id_full,c3,'a','2','3',bal);
					
					setTimeout("clearbg('"+nid1+"');",10000);
					setTimeout("clearbg('"+nid2+"');",10000);	
					
					if(parent.leftx.document.getElementById(nidp1)){
						setTimeout("clearbg2('"+nidp1+"');",10000);			
					}
					
					if(parent.leftx.document.getElementById(nidp2)){
						setTimeout("clearbg2('"+nidp2+"');",10000);			
					}	
																			
				}	
			} else if (ball_type=='5') {
				var bal='Tball_'+ball_id_full+'_4';
				var bal2='b_Tball_'+ball_id_full+'_4';
				var nid1='Thou_'+ball_id_full+'_7';
				var nid2='Thou_'+ball_id_full+'_8';	
				var nidp1='p_Thou_'+ball_id_full+'_7';
				var nidp2='p_Thou_'+ball_id_full+'_8';	
				var nidpc1='pc_Thou_'+ball_id_full+'_7';
				var nidpc2='pc_Thou_'+ball_id_full+'_8';	
				if (document.getElementById(nid1)) {	
					document.getElementById(nid1).style.backgroundImage="url(img/newY.gif)";	
					document.getElementById(nid2).style.backgroundImage="url(img/newY.gif)";				
					document.getElementById(bal).innerHTML=c1;	
					
					if(parent.leftx.document.getElementById(nidp1)){
						parent.leftx.document.getElementById(bal2).innerHTML=c1;
						parent.leftx.document.getElementById(nidp1).style.backgroundImage="url(img/newY.gif)";	
					}
					
					if(parent.leftx.document.getElementById(nidp2)){
						parent.leftx.document.getElementById(bal2).innerHTML=c1;
						parent.leftx.document.getElementById(nidp2).style.backgroundImage="url(img/newY.gif)";	
					}
					
					/*Tchang_valbg(nid1,varry6[i][3],varry6[i][5],'o','1',varry6[i][5],varry6[i][1],nid1,varry6[i][4],'4',bal);
					Tchang_valbg(nid2,varry6[i][3],varry6[i][6],'u','2',varry6[i][6],varry6[i][1],nid2,varry6[i][4],'4',bal);	*/
					
					Tchang_valbg(nid1,ball_id_full,c2,'o','1','4',bal);
					Tchang_valbg(nid2,ball_id_full,c3,'u','2','4',bal);
					
					setTimeout("clearbg('"+nid1+"');",10000);
					setTimeout("clearbg('"+nid2+"');",10000);			
					
					if(parent.leftx.document.getElementById(nidp1)){
						setTimeout("clearbg2('"+nidp1+"');",10000);			
					}
					
					if(parent.leftx.document.getElementById(nidp2)){
						setTimeout("clearbg2('"+nidp2+"');",10000);			
					}			
																	
				}			
			} else if (ball_type=='6') {
				var vid1='Th1_'+ball_id_full+'_1';
				var vid2='Th2_'+ball_id_full+'_2';
				var vidx='Thx_'+ball_id_full+'_3';		
				var vidp1='p_Th1_'+ball_id_full+'_1';
				var vidp2='p_Th2_'+ball_id_full+'_2';
				var vidpx='p_Thx_'+ball_id_full+'_3';	
				var vidpc1='pc_Th1_'+ball_id_full+'_1';
				var vidpc2='pc_Th2_'+ball_id_full+'_2';
				var vidpcx='pc_Thx_'+ball_id_full+'_3';		
				
				if (document.getElementById(vid1)) {
					document.getElementById(vid1).style.backgroundImage="url(img/newY.gif)";
					document.getElementById(vid2).style.backgroundImage="url(img/newY.gif)";		
					document.getElementById(vidx).style.backgroundImage="url(img/newY.gif)";		
					
					
					if(parent.leftx.document.getElementById(vidp1)){
						parent.leftx.document.getElementById(vidp1).style.backgroundImage="url(img/newY.gif)";	
					}
					
					if(parent.leftx.document.getElementById(vidp2)){
						parent.leftx.document.getElementById(vidp2).style.backgroundImage="url(img/newY.gif)";	
					}
					
					if(parent.leftx.document.getElementById(vidpx)){
						parent.leftx.document.getElementById(vidpx).style.backgroundImage="url(img/newY.gif)";	
					}
							
					/*Tchang_valbg(vid1,varry6[i][3],varry6[i][4],'h','1',varry6[i][4],varry6[i][1],vid1,'','6','');						
					Tchang_valbg(vid2,varry6[i][3],varry6[i][5],'a','2',varry6[i][5],varry6[i][1],vid2,'','6','');		
					Tchang_valbg(vidx,varry6[i][3],varry6[i][6],'x','3',varry6[i][6],varry6[i][1],vidx,'','6','');	*/
					
					Tchang_valbg(vid1,ball_id_full,c1,'h','1','6',bal);
					Tchang_valbg(vid2,ball_id_full,c2,'a','2','6',bal);
					Tchang_valbg(vidx,ball_id_full,c3,'x','3','6',bal);
																									
					setTimeout("clearbg('"+vid1+"');",10000);
					setTimeout("clearbg('"+vid2+"');",10000);
					setTimeout("clearbg('"+vidx+"');",10000);		
					
					if(parent.leftx.document.getElementById(vidp1)){
						setTimeout("clearbg2('"+vidp1+"');",10000);			
					}
					
					if(parent.leftx.document.getElementById(vidp2)){
						setTimeout("clearbg2('"+vidp2+"');",10000);			
					}		
					
					if(parent.leftx.document.getElementById(vidpx)){
						setTimeout("clearbg2('"+vidpx+"');",10000);			
					}																						
				}	
			} else if (ball_type=='7') {
				var vid1='Tfkk_'+ball_id_full+'_1';
				var vid2='Tfkk_'+ball_id_full+'_2';
				var vidp1='p_Tfkk_'+ball_id_full+'_1';
				var vidp2='p_Tfkk_'+ball_id_full+'_2';
				var vidpc1='pc_Tfkk_'+ball_id_full+'_1';
				var vidpc2='pc_Tfkk_'+ball_id_full+'_2';
				
				if (document.getElementById(vid1)) {
					document.getElementById(vid1).style.backgroundImage="url(img/newY.gif)";
					document.getElementById(vid2).style.backgroundImage="url(img/newY.gif)";		
					
					
					if(parent.leftx.document.getElementById(vidp1)){
						parent.leftx.document.getElementById(vidp1).style.backgroundImage="url(img/newY.gif)";	
					}
					
					if(parent.leftx.document.getElementById(vidp2)){
						parent.leftx.document.getElementById(vidp2).style.backgroundImage="url(img/newY.gif)";	
					}
					
					
					Tchang_valbg(vid1,ball_id_full,c1,'ku','1','7',bal);
					Tchang_valbg(vid2,ball_id_full,c2,'ke','2','7',bal);
																									
					setTimeout("clearbg('"+vid1+"');",10000);
					setTimeout("clearbg('"+vid2+"');",10000);
					
					if(parent.leftx.document.getElementById(vidp1)){
						setTimeout("clearbg2('"+vidp1+"');",10000);			
					}
					
					if(parent.leftx.document.getElementById(vidp2)){
						setTimeout("clearbg2('"+vidp2+"');",10000);			
					}																				
				}	
			} else if (ball_type=='8') {
				var vid1='Thkk_'+ball_id_full+'_1';
				var vid2='Thkk_'+ball_id_full+'_2';
				var vidp1='p_Thkk_'+ball_id_full+'_1';
				var vidp2='p_Thkk_'+ball_id_full+'_2';
				var vidpc1='pc_Thkk_'+ball_id_full+'_1';
				var vidpc2='pc_Thkk_'+ball_id_full+'_2';
				
				if (document.getElementById(vid1)) {
					document.getElementById(vid1).style.backgroundImage="url(img/newY.gif)";
					document.getElementById(vid2).style.backgroundImage="url(img/newY.gif)";		
					
					
					if(parent.leftx.document.getElementById(vidp1)){
						parent.leftx.document.getElementById(vidp1).style.backgroundImage="url(img/newY.gif)";	
					}
					
					if(parent.leftx.document.getElementById(vidp2)){
						parent.leftx.document.getElementById(vidp2).style.backgroundImage="url(img/newY.gif)";	
					}
					
					
					Tchang_valbg(vid1,ball_id_full,c1,'ku','1','8',bal);
					Tchang_valbg(vid2,ball_id_full,c2,'ke','2','8',bal);
																									
					setTimeout("clearbg('"+vid1+"');",10000);
					setTimeout("clearbg('"+vid2+"');",10000);
					
					if(parent.leftx.document.getElementById(vidp1)){
						setTimeout("clearbg2('"+vidp1+"');",10000);			
					}
					
					if(parent.leftx.document.getElementById(vidp2)){
						setTimeout("clearbg2('"+vidp2+"');",10000);			
					}																				
				}		
			}				
		}
		//TodayImg_hidden();		
	}
}
function clearbg(id){
	if(document.getElementById(id)){
		document.getElementById(id).style.backgroundImage="";
	}
}
function clearbg2(id){
	if(parent.leftx.document.getElementById(id)){
		parent.leftx.document.getElementById(id).style.backgroundImage="";
	}
}
function _red(val){
	if(val<-0.000){
		return "red";
	}else{
		return "black";
	}
}
function _mix(val){
	val = price_ball(parseFloat(val) , tprice);
	var n = parseFloat(val).toFixed(3);
	return n;
}
function price_ball(val , t){
	
	if(val!=""){
		if(t==1){
			return my(val);	
		}else if(t==2){
			return hk(val);	
		}else if(t==3){
			return eu(val);	
		}
	}else{
		return "";	
	}
}
function my(val){
	return val;	
}
function hk(val){
	if(val<0){
		return (1+(val))+1;
	}else{
		return val;	
	}
}
function eu(val){
	if(val<0){
		return (1+(val))+2;
	}else{
		return val+1;	
	}
}