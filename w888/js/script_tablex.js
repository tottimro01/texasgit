function header2rows(){
    return React.createElement("tr",null , 
                    React.createElement("th" , {width :'6%'} , txt_lang_sport[42]),
                    React.createElement("th" , {width :'34%' , colSpan :'2' , style:{'text-align' : 'left'} , className:"even"} , txt_lang_sport[40]),
                    React.createElement("th" , {style : {'min-width': "78px", 'max-width': "90px" , 'white-space' : 'nowrap'} , title:txt_lang_sport[122] , className:"text-ellipsis"} , "FT. HDP"),
                    React.createElement("th" , {style :{'min-width':'78px','max-width':'90px' , 'white-space' : 'nowrap'} , title:txt_lang_sport[123] , className:"text-ellipsis"} , "FT. O/U"),
                    React.createElement("th" , {style :{'min-width':'48px','max-width':'60px' , 'white-space' : 'nowrap'} , title:txt_lang_sport[124] , className:"text-ellipsis"} , "FT. 1X2"),
                    React.createElement("th" , {style :{'min-width':'78px','max-width':'90px' , 'white-space' : 'nowrap'} , title:txt_lang_sport[125] , className:"even tabt_L text-ellipsis"} , "1H. HDP"),
                    React.createElement("th" , {style :{'min-width':'78px','max-width':'90px' , 'white-space' : 'nowrap'} , title:txt_lang_sport[126] , className:"even tabt_L text-ellipsis"} , "1H. O/U"),
                    React.createElement("th" , {style :{'min-width':'48px','max-width':'60px' , 'white-space' : 'nowrap'} , title:txt_lang_sport[127] , className:"even tabt_L text-ellipsis"} , "1H. 1X2"),
                    React.createElement("th" , {width :'1%'} , "")
                  );
}
function header1rows(){
    var tr0 =  React.createElement("tr",{className : "thead_hdp-ou_single-line"} , 
                    React.createElement("th" , {rowSpan :'2' , className : "th_time" , title:txt_lang_sport[42]} , 
                      React.createElement("span" , null , txt_lang_sport[42])),
                    React.createElement("th" , {rowSpan :'2' , className:"th_event even" , title:txt_lang_sport[40]} , 
                      React.createElement("span" , null , txt_lang_sport[40])),
                    React.createElement("th" , {colSpan :'6' , className:"th_full-time" , title:txt_lang_sport[44]} , 
                      React.createElement("span" , null , txt_lang_sport[44])),
                    React.createElement("th" , {colSpan :'6' , className:"th_half-time even" , title:txt_lang_sport[43]} , 
                      React.createElement("span" , null , txt_lang_sport[43])),
                    React.createElement("th" , {rowSpan :'2' , className:"th_last"} , null));
      var tr1 =      React.createElement("tr",null,
                    React.createElement("th" , {title:txt_lang_sport[116]} , 
                      React.createElement("span" , null , txt_lang_sport[116])),
                    React.createElement("th" , {title:txt_lang_sport[117]} , 
                      React.createElement("span" , null , txt_lang_sport[117])),
                    React.createElement("th" , {title:txt_lang_sport[118]} , 
                      React.createElement("span" , null , txt_lang_sport[118])),
                    React.createElement("th" , {title:txt_lang_sport[119]} , 
                      React.createElement("span" , null , txt_lang_sport[119])),
                    React.createElement("th" , {title:txt_lang_sport[120]} , 
                      React.createElement("span" , null ,txt_lang_sport[120])),
                    React.createElement("th" , {title:txt_lang_sport[121]} , 
                      React.createElement("span" , null , txt_lang_sport[121])),
                    React.createElement("th" , {title:txt_lang_sport[116] , className:"even"} , 
                      React.createElement("span" , null , txt_lang_sport[116])),
                    React.createElement("th" , {title:txt_lang_sport[117] , className:"even"} , 
                      React.createElement("span" , null , txt_lang_sport[117])),
                    React.createElement("th" , {title:txt_lang_sport[118] , className:"even"} , 
                      React.createElement("span" , null , txt_lang_sport[118])),
                    React.createElement("th" , {title:txt_lang_sport[119] , className:"even"} , 
                      React.createElement("span" , null , txt_lang_sport[119])),
                    React.createElement("th" , {title:txt_lang_sport[120] , className:"even"} , 
                      React.createElement("span" , null , txt_lang_sport[120])),
                    React.createElement("th" , {title:txt_lang_sport[121] , className:"even"} , 
                      React.createElement("span" , null , txt_lang_sport[121])));

          return [tr0 , tr1];
}
function header1rowsFT(){
    var tr0 =  React.createElement("tr",{className : "thead_hdp-ou_single-line"} , 
                    React.createElement("th" , {rowSpan :'2' , className : "th_time" , title:txt_lang_sport[42]} , 
                      React.createElement("span" , null , txt_lang_sport[42])),
                    React.createElement("th" , {rowSpan :'2' , className:"th_event even" , title:txt_lang_sport[40]} , 
                      React.createElement("span" , null , txt_lang_sport[40])),
                    React.createElement("th" , {colSpan :'6' , className:"th_full-time" , title:txt_lang_sport[44]} , 
                      React.createElement("span" , null , txt_lang_sport[44])),
                    React.createElement("th" , {rowSpan :'2' , className:"th_last"} , null));
      var tr1 =      React.createElement("tr",null,
                    React.createElement("th" , {title:txt_lang_sport[116]} , 
                      React.createElement("span" , {className : "fh1"} , txt_lang_sport[116])),
                    React.createElement("th" , {title:txt_lang_sport[117]} , 
                      React.createElement("span" , {className : "fh1"} , txt_lang_sport[117])),
                    React.createElement("th" , {title:txt_lang_sport[118]} , 
                      React.createElement("span" , {className : "fh1"} , txt_lang_sport[118])),
                    React.createElement("th" , {title:txt_lang_sport[119]} , 
                      React.createElement("span" , {className : "fh1"} , txt_lang_sport[119])),
                    React.createElement("th" , {title:txt_lang_sport[120]} , 
                      React.createElement("span" , {className : "fh1"} ,txt_lang_sport[120])),
                    React.createElement("th" , {title:txt_lang_sport[121]} ,
                      React.createElement("span" , {className : "fh1"} , txt_lang_sport[121])));

          return [tr0 , tr1];
}
function header1rowsHT(){
    var tr0 =  React.createElement("tr",{className : "thead_hdp-ou_single-line"} , 
                    React.createElement("th" , {rowSpan :'2' , className : "th_time" , title:txt_lang_sport[42]} , 
                      React.createElement("span" , null , txt_lang_sport[42])),
                    React.createElement("th" , {rowSpan :'2' , className:"th_event even" , title:txt_lang_sport[40]} , 
                      React.createElement("span" , null , txt_lang_sport[40])),
                    React.createElement("th" , {colSpan :'6' , className:"th_half-time even" , title:txt_lang_sport[43]} , 
                      React.createElement("span" , null , txt_lang_sport[43])),
                    React.createElement("th" , {rowSpan :'2' , className:"th_last"} , null));
      var tr1 =      React.createElement("tr",null,
                    React.createElement("th" , {title:txt_lang_sport[116] , className:"even"} , 
                      React.createElement("span" , {className : "fh1"} , txt_lang_sport[116])),
                    React.createElement("th" , {title:txt_lang_sport[117] , className:"even"} , 
                      React.createElement("span" , {className : "fh1"} , txt_lang_sport[117])),
                    React.createElement("th" , {title:txt_lang_sport[118] , className:"even"} , 
                      React.createElement("span" , {className : "fh1"} , txt_lang_sport[118])),
                    React.createElement("th" , {title:txt_lang_sport[119] , className:"even"} , 
                      React.createElement("span" , {className : "fh1"} , txt_lang_sport[119])),
                    React.createElement("th" , {title:txt_lang_sport[120] , className:"even"} , 
                      React.createElement("span" , {className : "fh1"} , txt_lang_sport[120])),
                    React.createElement("th" , {title:txt_lang_sport[121] , className:"even"} , 
                      React.createElement("span" , {className : "fh1"} , txt_lang_sport[121])));

          return [tr0 , tr1];
}
function header1x2(){
    var tr0 =  React.createElement("tr",{className : "thead_hdp-ou_single-line"} , 
                    React.createElement("th" , {rowSpan :'2' , className : "th_time" , title:txt_lang_sport[42]} , 
                      React.createElement("span" , null , txt_lang_sport[42])),
                    React.createElement("th" , {rowSpan :'2' , className:"th_event even" , title:txt_lang_sport[40]} , 
                      React.createElement("span" , null , txt_lang_sport[40])),
                    React.createElement("th" , {colSpan :'3' , className:"th_full-time" , title:txt_lang_sport[44]} , 
                      React.createElement("span" , null , txt_lang_sport[44])),
                    React.createElement("th" , {colSpan :'3' , className:"th_half-time even" , title:txt_lang_sport[43]} , 
                      React.createElement("span" , null , txt_lang_sport[43])),
                    React.createElement("th" , {rowSpan :'2' , className:"th_last"} , null));
      var tr1 =      React.createElement("tr",null,
                    React.createElement("th" , {title:txt_Hwin} , 
                      React.createElement("span" , null , txt_Hwin)),
                    React.createElement("th" , {title:txt_draw} , 
                      React.createElement("span" , null , txt_draw)),
                    React.createElement("th" , {title:txt_Awin} , 
                      React.createElement("span" , null , txt_Awin)),
                    React.createElement("th" , {title:txt_Hwin , className:"even"} , 
                      React.createElement("span" , null , txt_Hwin)),
                    React.createElement("th" , {title:txt_draw , className:"even"} , 
                      React.createElement("span" , null , txt_draw)),
                    React.createElement("th" , {title:txt_Awin , className:"even"} , 
                      React.createElement("span" , null , txt_Awin)));

          return [tr0 , tr1];
}
function headerOE(){
    var tr0 =  React.createElement("tr",{className : "thead_hdp-ou_single-line"} , 
                    React.createElement("th" , {rowSpan :'2' , className : "th_time" , title:txt_lang_sport[42]} , 
                      React.createElement("span" , null , txt_lang_sport[42])),
                    React.createElement("th" , {rowSpan :'2' , className:"th_event even" , title:txt_lang_sport[40]} , 
                      React.createElement("span" , null , txt_lang_sport[40])),
                    React.createElement("th" , {colSpan :'2' , className:"th_full-time" , title:txt_lang_sport[44]} , 
                      React.createElement("span" , null , txt_lang_sport[44])),
                    React.createElement("th" , {colSpan :'2' , className:"th_half-time even" , title:txt_lang_sport[43]} , 
                      React.createElement("span" , null , txt_lang_sport[43])),
                    React.createElement("th" , {rowSpan :'2' , className:"th_last"} , null));
      var tr1 =      React.createElement("tr",null,
                    React.createElement("th" , {title:txt_Odd} , 
                      React.createElement("span" , null , txt_Odd)),
                    React.createElement("th" , {title:txt_Even} , 
                      React.createElement("span" , null , txt_Even)),
                    React.createElement("th" , {title:txt_Odd , className:"even"} , 
                      React.createElement("span" , null , txt_Odd)),
                    React.createElement("th" , {title:txt_Even , className:"even"} , 
                      React.createElement("span" , null , txt_Even)));

          return [tr0 , tr1];
}
function td2rows(ball_data , old_data){
  var id_tr = 'id_' + ball_data["b_id"] + '_' + ball_data["b_add"];
  /*###############################################################################################################*/
  if (ball_data["b_live"] != 0) {
    if (ball_data["b_live"] == 1 || ball_data["b_live"] == 3) {

      var td0 = React.createElement("td" , {id : id_tr + '_ts' , className:'text_time' , style:{'text-align' : 'center'}} ,
        React.createElement("font" , {color :'red'} , ball_data["b_run_score_full"]),
        React.createElement("br"),
        ball_data["b_live_string"]+"'"
      );

    } else {

      var td0 = React.createElement("td" , {id : id_tr + '_ts' , className:'text_time' , style:{'text-align' : 'center'}} ,
        React.createElement("font" , {color :'red'} , ball_data["b_run_score_full"]),
        React.createElement("br"),
        React.createElement("span" , {style:{ 'color':'#106cbb' , 'font-weight':'bold' }} , ball_data["b_live_string"])
      );

    }
  } else {
    var date_data_1 = new Date(ball_data["b_date_play"] * 1000);
    var hours_data_1 = "0" + date_data_1.getHours();
    var minutes_data_1 = "0" + date_data_1.getMinutes();
    var formattedTime = hours_data_1.substr(-2) + ':' + minutes_data_1.substr(-2);

    var td0 = React.createElement("td" , {id : id_tr + '_ts' , className:'text_time' , style:{'text-align' : 'center'}} ,
      React.createElement("font" , {color :'red'} , "LIVE"),
      React.createElement("br"),
      formattedTime
    );
  }

  /*###############################################################################################################*/
  var className_t1 = "";
  var className_t2 = "";
  if (ball_data["b_zone"] == 1) {
      className_t1 = "FavTeamClass";
      className_t2 = "UdrDogTeamClass";
  }else{
      if (ball_data["b_big"] == 1) {
          className_t1 = "FavTeamClass";
      } else {
          className_t1 = "UdrDogTeamClass";
      }
      if (ball_data["b_big"] == 2) {
          className_t2 = "FavTeamClass";
      } else {
          className_t2 = "UdrDogTeamClass";
      }
  }

  if ((ball_data["b_1x2_1"] > 0 && ball_data["b_1x2_x"] > 0 && ball_data["b_1x2_2"] > 0) || (ball_data["b_1h_1x2_1"] > 0 && ball_data["b_1h_1x2_x"] > 0 && ball_data["b_1h_1x2_2"] > 0)) {
      var _draw = React.createElement("div" , {id :id_tr + '_draw' , className:"HdpGoalClass"} , txt_draw);
  } else {

      var _draw = React.createElement("div" , {id :id_tr + '_draw'} , "");

  }


  if(ball_data["card_r"]!=null){
    var ex_card_r = ball_data["card_r"].split(",");
  }else{
    var ex_card_r = "";
  }
  

  if(parseInt(ex_card_r[0])>0){
      var card_r_h = React.createElement("div" , {className :'card_gif red'} , ex_card_r[0]);
  }else{
      var card_r_h = "";
  }

  if(parseInt(ex_card_r[1])>0){
      var card_r_a = React.createElement("div" , {className :'card_gif red'} , ex_card_r[1]);
  }else{
      var card_r_a = "";
  }



  var td1 = React.createElement("td" , {colSpan : '2' , style : {"verticalAlign":"top"}} , 
    React.createElement("div" , {id :id_tr + '_home' , className:className_t1} , 
      React.createElement("span" , null , (ball_data["b_name_1_th"]=="" ? ball_data["b_name_1_en"] : ball_data["b_name_1_th"])),
      card_r_h
    ),
    React.createElement("div" , {id :id_tr + '_away' , className:className_t2} , 
      React.createElement("span" , null , (ball_data["b_name_2_th"]=="" ? ball_data["b_name_2_en"] : ball_data["b_name_2_th"])),
      card_r_a
    ),
    _draw
  );


  /*###############################################################################################################*/
  if (ball_data["b_hdc"] != "" && ball_data["b_hdc_1"] != "" && ball_data["b_hdc_2"] != "") {
    if (ball_data["b_big"] == 2) {
      var br_hdc = React.createElement("br");
    } else {
      var br_hdc = "";
    }

    

    var val_hdc_1 = (ball_data["b_hdc_1"] == 0 ? "" : formatMoney(_mtr(ball_data["b_hdc_1"] , Odds_type , anam), 2));
    var val_hdc_2 = (ball_data["b_hdc_2"] == 0 ? "" : formatMoney(_mtr(ball_data["b_hdc_2"] , Odds_type , anam), 2));

    if (val_hdc_1 < 0) {
      var a_hdc1_className = "FavOddsClass";
    } else {
      var a_hdc1_className = "UdrDogOddsClass";
    }

    if (val_hdc_2 < 0) {
      var a_hdc2_className = "FavOddsClass";
    } else {
      var a_hdc2_className = "UdrDogOddsClass";
    }
  // console.log(anam)

    if(val_hdc_1==0.00 || val_hdc_2==0.00){
      val_hdc_1 = "";
      val_hdc_2 = "";
    }

    var classBlibk = "";
    if(old_data!=null){

      var old_hdc_1 = (old_data["b_hdc_1"] == 0 ? "" : formatMoney(_mtr(old_data["b_hdc_1"] , Odds_type , anam), 2));
      var old_hdc_2 = (old_data["b_hdc_2"] == 0 ? "" : formatMoney(_mtr(old_data["b_hdc_2"] , Odds_type , anam), 2));

      if(ball_data["b_hdc"]!=old_data["b_hdc"] || val_hdc_1!=old_hdc_1 || val_hdc_2!=old_hdc_2){
        classBlibk = "show_blink";
        var blink_data = {};
        blink_data["id"] = id_tr+"_ghdc";
        blink_data["ctime"] = 5;
        arr_blink.push(blink_data);
        
        if(busket_tang["data"]["d_"+ball_data["b_id"]]!=undefined){
          if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_hdc_1"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_hdc_1;
            parent.leftx.change_odd(val_hdc_1 , id_tr+"_hdc_1" , blink_data , ball_data , 1 , busket_tang["type"]);
          }else if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_hdc_2"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_hdc_2;
            parent.leftx.change_odd(val_hdc_2 , id_tr+"_hdc_2" , blink_data , ball_data , 1 , busket_tang["type"]);
          }
        }
      }
    }

    
    var td2 = React.createElement("td" , { className : 'none_rline' , style : {"verticalAlign":"top"}},
      React.createElement("div" , {id :id_tr + '_hdc' , className:"line_divL HdpGoalClass"},
      br_hdc, ball_data["b_hdc"]),
      React.createElement("div" , {className:"line_divR OddsDiv "+id_tr+"_ghdc "+classBlibk},
        React.createElement("a" , {id :id_tr + '_hdc_1' , className:a_hdc1_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_1"] + "','h','" + val_hdc_1 + "',1,'"+id_tr+"_ghdc','"+id_tr+"_hdc_1')"} , val_hdc_1),
        React.createElement("a" , {id :id_tr + '_hdc_2' , className:a_hdc2_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_1"] + "','a','" + val_hdc_2 + "',1,'"+id_tr+"_ghdc','"+id_tr+"_hdc_2')"} , val_hdc_2)
      )
    );
    

  }else{
    var td2 = React.createElement("td" , { className : 'none_rline' , style : {"verticalAlign":"top"}});
  }
  /*###############################################################################################################*/
  if (ball_data["b_goal"] != "" && ball_data["b_goal_1"] != "" && ball_data["b_goal_2"] != "") {
    

    var val_goal_1 = (ball_data["b_goal_1"] == 0 ? "" : formatMoney(_mtr(ball_data["b_goal_1"] , Odds_type , anam), 2));
    var val_goal_2 = (ball_data["b_goal_2"] == 0 ? "" : formatMoney(_mtr(ball_data["b_goal_2"] , Odds_type , anam), 2));

    if (val_goal_1 < 0) {
      var a_goal1_className = "FavOddsClass";
    } else {
      var a_goal1_className = "UdrDogOddsClass";
    }

    if (val_goal_2 < 0) {
      var a_goal2_className = "FavOddsClass";
    } else {
      var a_goal2_className = "UdrDogOddsClass";
    }

    if(val_goal_1==0.00 || val_goal_2==0.00){
      val_goal_1 = "";
      val_goal_2 = "";
    }

    var classBlibk = "";
    if(old_data!=null){

      var old_goal_1 = (old_data["b_goal_1"] == 0 ? "" : formatMoney(_mtr(old_data["b_goal_1"] , Odds_type , anam), 2));
      var old_goal_2 = (old_data["b_goal_2"] == 0 ? "" : formatMoney(_mtr(old_data["b_goal_2"] , Odds_type , anam), 2));

      /*if(old_goal_1==0.00 || old_goal_2==0.00){
        old_goal_1 = "";
        old_goal_2 = "";
      }*/

      if(ball_data["b_goal"]!=old_data["b_goal"] || val_goal_1!=old_goal_1 || val_goal_2!=old_goal_2){
        classBlibk = "show_blink";
        var blink_data = {};
        blink_data["id"] = id_tr+"_ggoal";
        blink_data["ctime"] = 5;
        arr_blink.push(blink_data);
        
        if(busket_tang["data"]["d_"+ball_data["b_id"]]!=undefined){
          if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_goal_1"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_goal_1;
            parent.leftx.change_odd(val_goal_1 , id_tr+"_goal_1" , blink_data , ball_data , 2 , busket_tang["type"]);
          }else if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_goal_2"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_goal_2;
            parent.leftx.change_odd(val_goal_2 , id_tr+"_goal_2" , blink_data , ball_data , 2 , busket_tang["type"]);
          }
        }

      }
    }

    var td3 = React.createElement("td" , { className : 'none_rline' , style : {"verticalAlign":"top"}},
      React.createElement("div" , {id :id_tr + '_goal' , className:"line_divL HdpGoalClass"},
        ball_data["b_goal"],
        React.createElement("br"), txt_lang_sport[21]),
      React.createElement("div" , {className:"line_divR OddsDiv "+id_tr+"_ggoal "+classBlibk},
        React.createElement("a" , {id :id_tr + '_goal_1' , className:a_goal1_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_2"] + "','h','" +val_goal_1+ "',2,'"+id_tr+"_goal','"+id_tr+"_goal_1')"} , val_goal_1),
        React.createElement("a" , {id :id_tr + '_goal_2' , className:a_goal2_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_2"] + "','a','" +val_goal_2+ "',2,'"+id_tr+"_goal','"+id_tr+"_goal_2')"} , val_goal_2)
      )
    );

  }else{
    var td3 = React.createElement("td" , { className : 'none_rline' , style : {"verticalAlign":"top"}});
  }
  /*###############################################################################################################*/
  if ((ball_data["b_1x2_1"] > 0 && ball_data["b_1x2_x"] > 0 && ball_data["b_1x2_2"] > 0) || (ball_data["b_1x2_1"] != 0 && ball_data["b_1x2_2"] != 0)) {

    

    var val_1x2_1 = (ball_data["b_1x2_1"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1x2_1"] , 1 , anam), 2));
    var val_1x2_x = (ball_data["b_1x2_x"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1x2_x"] , 1 , anam), 2));
    var val_1x2_2 = (ball_data["b_1x2_2"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1x2_2"] , 1 , anam), 2));

    if (val_1x2_1 < 0) {
      var a_1x21_className = "FavOddsClass";
    } else {
      var a_1x21_className = "UdrDogOddsClass";
    }

    if (val_1x2_2 < 0) {
      var a_1x22_className = "FavOddsClass";
    } else {
      var a_1x22_className = "UdrDogOddsClass";
    }

    if (val_1x2_x < 0) {
      var a_1x2x_className = "FavOddsClass";
    } else {
      var a_1x2x_className = "UdrDogOddsClass";
    }

    if(val_1x2_1<=1.00 || val_1x2_x<=1.00 || val_1x2_2<=1.00){
      val_1x2_1 = "";
      val_1x2_x = "";
      val_1x2_2 = "";
    }

    var classBlibk = "";
    if(old_data!=null){

      var old_1x2_1 = (old_data["b_1x2_1"] == 0 ? "" : formatMoney(_mtr(old_data["b_1x2_1"] , 1 , anam), 2));
      var old_1x2_x = (old_data["b_1x2_x"] == 0 ? "" : formatMoney(_mtr(old_data["b_1x2_x"] , 1 , anam), 2));
      var old_1x2_2 = (old_data["b_1x2_2"] == 0 ? "" : formatMoney(_mtr(old_data["b_1x2_2"] , 1 , anam), 2));

      if(old_1x2_1<=1.00 || old_1x2_x<=1.00 || old_1x2_2<=1.00){
        old_1x2_1 = "";
        old_1x2_x = "";
        old_1x2_2 = "";
      }

      if(val_1x2_1!=old_1x2_1 || val_1x2_x!=old_1x2_x || val_1x2_2!=old_1x2_2){
        classBlibk = "show_blink";
        var blink_data = {};
        blink_data["id"] = id_tr+"_g1x2";
        blink_data["ctime"] = 5;
        arr_blink.push(blink_data);
        
        if(busket_tang["data"]["d_"+ball_data["b_id"]]!=undefined){
          if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1x2_1"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1x2_1;
            parent.leftx.change_odd(val_1x2_1 , id_tr+"_1x2_1" , blink_data , ball_data , 3 , busket_tang["type"]);
          }else if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1x2_x"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1x2_x;
            parent.leftx.change_odd(val_1x2_x , id_tr+"_1x2_x" , blink_data , ball_data , 3 , busket_tang["type"]);
          }else if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1x2_2"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1x2_2;
            parent.leftx.change_odd(val_1x2_2 , id_tr+"_1x2_2" , blink_data , ball_data , 3 , busket_tang["type"]);
          }
        }
      }
    }

    var td4 = React.createElement("td" , { className : 'tabt_R' , style : {"verticalAlign":"top"}},
      React.createElement("div" , {className:"line_divR OddsDiv "+id_tr+"_g1x2 "+classBlibk},
        React.createElement("a" , {id :id_tr + '_1x2_1' , className:a_1x21_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_3"] + "','1','" + val_1x2_1 + "',3,'"+id_tr+"_g1x2','"+id_tr+"_1x2_1')"} , val_1x2_1),
        React.createElement("a" , {id :id_tr + '_1x2_2' , className:a_1x22_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_3"] + "','2','" + val_1x2_2 + "',3,'"+id_tr+"_g1x2','"+id_tr+"_1x2_2')"} , val_1x2_2),
        React.createElement("a" , {id :id_tr + '_1x2_x' , className:a_1x2x_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_3"] + "','X','" + val_1x2_x + "',3,'"+id_tr+"_g1x2','"+id_tr+"_1x2_x')"} , val_1x2_x),
      )
    );

  }else{
    var td4 = React.createElement("td" , { className : 'tabt_R' , style : {"verticalAlign":"top"}});
  }
  
  /*###############################################################################################################*/
  if (ball_data["b_1h_hdc"] != "" && ball_data["b_1h_hdc_1"] != "" && ball_data["b_1h_hdc_2"] != "") {
    if (ball_data["b_1h_big"] == 2) {
      var br_1h_hdc = React.createElement("br");
    } else {
      var br_1h_hdc = "";
    }

    

    var val_1h_hdc_1 = (ball_data["b_1h_hdc_1"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1h_hdc_1"] , Odds_type , anam), 2));
    var val_1h_hdc_2 = (ball_data["b_1h_hdc_2"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1h_hdc_2"] , Odds_type , anam), 2));

    if (val_1h_hdc_1 < 0) {
      var a_1h_hdc1_className = "FavOddsClass";
    } else {
      var a_1h_hdc1_className = "UdrDogOddsClass";
    }

    if (val_1h_hdc_2 < 0) {
      var a_1h_hdc2_className = "FavOddsClass";
    } else {
      var a_1h_hdc2_className = "UdrDogOddsClass";
    }

    if(val_1h_hdc_1==0.00 || val_1h_hdc_2==0.00){
      val_1h_hdc_1 = "";
      val_1h_hdc_2 = "";
    }

    var classBlibk = "";
    if(old_data!=null){

      var old_1h_hdc_1 = (old_data["b_1h_hdc_1"] == 0 ? "" : formatMoney(_mtr(old_data["b_1h_hdc_1"] , Odds_type , anam), 2));
      var old_1h_hdc_2 = (old_data["b_1h_hdc_2"] == 0 ? "" : formatMoney(_mtr(old_data["b_1h_hdc_2"] , Odds_type , anam), 2));

      if(ball_data["b_1h_hdc"]!=old_data["b_1h_hdc"] || val_1h_hdc_1!=old_1h_hdc_1 || val_1h_hdc_2!=old_1h_hdc_2){
        classBlibk = "show_blink";
        var blink_data = {};
        blink_data["id"] = id_tr+"_1h_ghdc";
        blink_data["ctime"] = 5;
        arr_blink.push(blink_data);
        
        if(busket_tang["data"]["d_"+ball_data["b_id"]]!=undefined){
          if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1h_hdc_1"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1h_hdc_1;
            parent.leftx.change_odd(val_1h_hdc_1 , id_tr+"_1h_hdc_1" , blink_data , ball_data , 5 , busket_tang["type"]);
          }else if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1h_hdc_2"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1h_hdc_2;
            parent.leftx.change_odd(val_1h_hdc_2 , id_tr+"_1h_hdc_2" , blink_data , ball_data , 5 , busket_tang["type"]);
          }
        }
      }
    }

    var td5 = React.createElement("td" , { className : 'none_rline' , style : {"verticalAlign":"top"}},
      React.createElement("div" , {id :id_tr + '_1h_hdc' , className:"line_divL HdpGoalClass"},
      br_1h_hdc, ball_data["b_1h_hdc"]),
      React.createElement("div" , {className:"line_divR OddsDiv "+id_tr+"_1h_ghdc "+classBlibk},
        React.createElement("a" , {id :id_tr + '_1h_hdc_1' , className:a_1h_hdc1_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_5"] + "','h','" + val_1h_hdc_1 + "',5,'"+id_tr+"_1h_hdc','"+id_tr+"_1h_hdc_1')"} , val_1h_hdc_1),
        React.createElement("a" , {id :id_tr + '_1h_hdc_2' , className:a_1h_hdc2_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_5"] + "','a','" + val_1h_hdc_2 + "',5,'"+id_tr+"_1h_hdc','"+id_tr+"_1h_hdc_2')"} , val_1h_hdc_2)
      )
    );

  }else{
    var td5 = React.createElement("td" , { className : 'none_rline' , style : {"verticalAlign":"top"}});
  }
  /*###############################################################################################################*/
  if (ball_data["b_1h_goal"] != "" && ball_data["b_1h_goal_1"] != "" && ball_data["b_1h_goal_2"] != "") {
    

    var val_1h_goal_1 = (ball_data["b_1h_goal_1"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1h_goal_1"] , Odds_type , anam), 2));
    var val_1h_goal_2 = (ball_data["b_1h_goal_2"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1h_goal_2"] , Odds_type , anam), 2));

    if (val_1h_goal_1 < 0) {
      var a_1h_goal1_className = "FavOddsClass";
    } else {
      var a_1h_goal1_className = "UdrDogOddsClass";
    }

    if (val_1h_goal_2 < 0) {
      var a_1h_goal2_className = "FavOddsClass";
    } else {
      var a_1h_goal2_className = "UdrDogOddsClass";
    }

    if(val_1h_goal_1==0.00 || val_1h_goal_2==0.00){
      val_1h_goal_1 = "";
      val_1h_goal_2 = "";
    }

    var classBlibk = "";
    if(old_data!=null){

      var old_1h_goal_1 = (old_data["b_1h_goal_1"] == 0 ? "" : formatMoney(_mtr(old_data["b_1h_goal_1"] , Odds_type , anam), 2));
      var old_1h_goal_2 = (old_data["b_1h_goal_2"] == 0 ? "" : formatMoney(_mtr(old_data["b_1h_goal_2"] , Odds_type , anam), 2));

      if(ball_data["b_1h_goal"]!=old_data["b_1h_goal"] || val_1h_goal_1!=old_1h_goal_1 || val_1h_goal_2!=old_1h_goal_2){
        classBlibk = "show_blink";
        var blink_data = {};
        blink_data["id"] = id_tr+"_1h_ggoal";
        blink_data["ctime"] = 5;
        arr_blink.push(blink_data);
        
        if(busket_tang["data"]["d_"+ball_data["b_id"]]!=undefined){
          if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1h_goal_1"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1h_goal_1;
            parent.leftx.change_odd(val_1h_goal_1 , id_tr+"_1h_goal_1" , blink_data , ball_data , 6 , busket_tang["type"]);
          }else if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1h_goal_2"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1h_goal_2;
            parent.leftx.change_odd(val_1h_goal_2 , id_tr+"_1h_goal_2" , blink_data , ball_data , 6 , busket_tang["type"]);
          }
        }
      }
    }

    var td6 = React.createElement("td" , { className : 'none_rline' , style : {"verticalAlign":"top"}},
      React.createElement("div" , {id :id_tr + '_1h_goal' , className:"line_divL HdpGoalClass"},
        ball_data["b_1h_goal"],
        React.createElement("br"), txt_lang_sport[21]),
      React.createElement("div" , {className:"line_divR OddsDiv "+id_tr+"_1h_ggoal "+classBlibk},
        React.createElement("a" , {id :id_tr + '_1h_goal_1' , className:a_1h_goal1_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_6"] + "','h','" + val_1h_goal_1 + "',6,'"+id_tr+"_1h_ggoal','"+id_tr+"_1h_goal_1')"} , val_1h_goal_1),
        React.createElement("a" , {id :id_tr + '_1h_goal_2' , className:a_1h_goal2_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_6"] + "','a','" + val_1h_goal_2 + "',6,'"+id_tr+"_1h_ggoal','"+id_tr+"_1h_goal_2')"} , val_1h_goal_2)
      )
    );

  }else{
    var td6 = React.createElement("td" , { className : 'none_rline' , style : {"verticalAlign":"top"}});
  }
  /*###############################################################################################################*/
  if ((ball_data["b_1h_1x2_1"] > 0 && ball_data["b_1h_1x2_x"] > 0 && ball_data["b_1h_1x2_2"] > 0) || (ball_data["b_1h_1x2_1"] != 0 && ball_data["b_1h_1x2_2"] != 0)) {

    

    var val_1h_1x2_1 = (ball_data["b_1h_1x2_1"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1h_1x2_1"] , 1 , anam), 2));
    var val_1h_1x2_x = (ball_data["b_1h_1x2_x"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1h_1x2_x"] , 1 , anam), 2));
    var val_1h_1x2_2 = (ball_data["b_1h_1x2_2"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1h_1x2_2"] , 1 , anam), 2));

    if (ball_data["b_1h_1x2_1"] < 0) {
      var a_1h_1x21_className = "FavOddsClass";
    } else {
      var a_1h_1x21_className = "UdrDogOddsClass";
    }

    if (ball_data["b_1h_1x2_2"] < 0) {
      var a_1h_1x22_className = "FavOddsClass";
    } else {
      var a_1h_1x22_className = "UdrDogOddsClass";
    }

    if (ball_data["b_1h_1x2_x"] < 0) {
      var a_1h_1x2x_className = "FavOddsClass";
    } else {
      var a_1h_1x2x_className = "UdrDogOddsClass";
    }

    if(val_1h_1x2_1<=1.00 || val_1h_1x2_x<=1.00 || val_1h_1x2_2<=1.00){
      val_1h_1x2_1 = "";
      val_1h_1x2_x = "";
      val_1h_1x2_2 = "";
    }

    var classBlibk = "";
    if(old_data!=null){

      var old_1h_1x2_1 = (old_data["b_1h_1x2_1"] == 0 ? "" : formatMoney(_mtr(old_data["b_1h_1x2_1"] , 1 , anam), 2));
      var old_1h_1x2_x = (old_data["b_1h_1x2_x"] == 0 ? "" : formatMoney(_mtr(old_data["b_1h_1x2_x"] , 1 , anam), 2));
      var old_1h_1x2_2 = (old_data["b_1h_1x2_2"] == 0 ? "" : formatMoney(_mtr(old_data["b_1h_1x2_2"] , 1 , anam), 2));

      if(old_1h_1x2_1<=1.00 || old_1h_1x2_x<=1.00 || old_1h_1x2_2<=1.00){
        old_1h_1x2_1 = "";
        old_1h_1x2_x = "";
        old_1h_1x2_2 = "";
      }

      if(val_1h_1x2_1!=old_1h_1x2_1 || val_1h_1x2_x!=old_1h_1x2_x || val_1h_1x2_2!=old_1h_1x2_2){
        classBlibk = "show_blink";
        var blink_data = {};
        blink_data["id"] = id_tr+"_1h_g1x2";
        blink_data["ctime"] = 5;
        arr_blink.push(blink_data);
        
        if(busket_tang["data"]["d_"+ball_data["b_id"]]!=undefined){
          if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1h_1x2_1"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1h_1x2_1;
            parent.leftx.change_odd(val_1h_1x2_1 , id_tr+"_1h_1x2_1" , blink_data , ball_data , 7 , busket_tang["type"]);
          }else if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1h_1x2_x"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1h_1x2_x;
            parent.leftx.change_odd(val_1h_1x2_x , id_tr+"_1h_1x2_x" , blink_data , ball_data , 7 , busket_tang["type"]);
          }else if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1h_1x2_2"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1h_1x2_2;
            parent.leftx.change_odd(val_1h_1x2_2 , id_tr+"_1h_1x2_2" , blink_data , ball_data , 7 , busket_tang["type"]);
          }
        }
      }
    }

    var td7 = React.createElement("td" , { className : 'tabt_R' , style : {"verticalAlign":"top"}},
      React.createElement("div" , {className:"line_divR OddsDiv "+id_tr+"_1h_g1x2 "+classBlibk},
        React.createElement("a" , {id :id_tr + '_1h_1x2_1' , className:a_1h_1x21_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_7"] + "','1','" + val_1h_1x2_1 + "',7,'"+id_tr+"_1h_g1x2','"+id_tr+"_1h_1x2_1')"} , val_1h_1x2_1),
        React.createElement("a" , {id :id_tr + '_1h_1x2_2' , className:a_1h_1x22_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_7"] + "','2','" + val_1h_1x2_2 + "',7,'"+id_tr+"_1h_g1x2','"+id_tr+"_1h_1x2_2')"} , val_1h_1x2_2),
        React.createElement("a" , {id :id_tr + '_1h_1x2_x' , className:a_1h_1x2x_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_7"] + "','X','" + val_1h_1x2_x + "',7,'"+id_tr+"_1h_g1x2','"+id_tr+"_1h_1x2_x')"} , val_1h_1x2_x),
      )
    );

  }else{
    var td7 = React.createElement("td" , { className : 'tabt_R' , style : {"verticalAlign":"top"}});
  }
  /*###############################################################################################################*/
  if (ball_data["b_add"] == 1) {
    var td8 = React.createElement("td" , {className : 'breakLine' , style:{'text-align' : 'center'}} , 
      React.createElement("a" , { href : "javascript:openStatsInfo('" + ball_data["b_id"] + "')"} , 
        React.createElement("span" , {className:'iconOdds stats'} , null)
      )
    );
  }else{
    var td8 = React.createElement("td");
  }
  /*###############################################################################################################*/

  return [td0 , td1 , td2 , td3 , td4 , td5 , td6 , td7 , td8];
}
function td1rows(ball_data , old_data , dp){
  var id_tr = 'id_' + ball_data["b_id"] + '_' + ball_data["b_add"];
  /*###############################################################################################################*/
  if (ball_data["b_live"] != 0) {
    if (ball_data["b_live"] == 1 || ball_data["b_live"] == 3) {

      var td0 = React.createElement("td" , {id : id_tr + '_ts' , className:'text_time' , style:{'text-align' : 'center'}} ,
        React.createElement("font" , {color :'red'} , ball_data["b_run_score_full"]),
        React.createElement("br"),
        ball_data["b_live_string"]+"'"
      );

    } else {

      var td0 = React.createElement("td" , {id : id_tr + '_ts' , className:'text_time' , style:{'text-align' : 'center'}} ,
        React.createElement("font" , {color :'red'} , ball_data["b_run_score_full"]),
        React.createElement("br"),
        React.createElement("span" , {style:{ 'color':'#106cbb' , 'font-weight':'bold' }} , ball_data["b_live_string"])
      );

    }
  } else {
    var date_data_1 = new Date(ball_data["b_date_play"] * 1000);
    var hours_data_1 = "0" + date_data_1.getHours();
    var minutes_data_1 = "0" + date_data_1.getMinutes();
    var formattedTime = hours_data_1.substr(-2) + ':' + minutes_data_1.substr(-2);

    var td0 = React.createElement("td" , {id : id_tr + '_ts' , className:'text_time' , style:{'text-align' : 'center'}} ,
      React.createElement("font" , {color :'red'} , "LIVE"),
      React.createElement("br"),
      formattedTime
    );
  }
  /*###############################################################################################################*/
  var className_t1 = "";
  var className_t2 = "";
  if (ball_data["b_zone"] == 1) {
      className_t1 = "FavTeamClass";
      className_t2 = "UdrDogTeamClass";
  }else{
      if (ball_data["b_big"] == 1) {
          className_t1 = "FavTeamClass";
      } else {
          className_t1 = "UdrDogTeamClass";
      }
      if (ball_data["b_big"] == 2) {
          className_t2 = "FavTeamClass";
      } else {
          className_t2 = "UdrDogTeamClass";
      }
  }

  if(ball_data["card_r"]!=null){
    var ex_card_r = ball_data["card_r"].split(",");
  }else{
    var ex_card_r = "";
  }


  if(parseInt(ex_card_r[0])>0){
      var card_r_h = React.createElement("div" , {className :'card_gif red'} , ex_card_r[0]);
  }else{
      var card_r_h = "";
  }

  if(parseInt(ex_card_r[1])>0){
      var card_r_a = React.createElement("div" , {className :'card_gif red'} , ex_card_r[1]);
  }else{
      var card_r_a = "";
  }

  var td1 = React.createElement("td" , {style : {"verticalAlign":"top"}} , 
    React.createElement("div" , {id :id_tr + '_home' , className:className_t1} , 
      React.createElement("span" , null , (ball_data["b_name_1_th"]=="" ? ball_data["b_name_1_en"] : ball_data["b_name_1_th"])),
      card_r_h
    ),
    React.createElement("div" , {id :id_tr + '_away' , className:className_t2} , 
      React.createElement("span" , null , (ball_data["b_name_2_th"]=="" ? ball_data["b_name_2_en"] : ball_data["b_name_2_th"])),
      card_r_a
    )
  );
  /*###############################################################################################################*/
  if (ball_data["b_hdc"] != "" && ball_data["b_hdc_1"] != "" && ball_data["b_hdc_2"] != "" && dp!="1H") {

    var td2 = React.createElement("td" , {id :id_tr + '_hdc' , className : 'HdpGoalClass' , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},ball_data["b_hdc"]);

    if (ball_data["b_big"] == 2) {
      var br_hdc = React.createElement("br");
    } else {
      var br_hdc = "";
    }

    

    var val_hdc_1 = (ball_data["b_hdc_1"] == 0 ? "" : formatMoney(_mtr(ball_data["b_hdc_1"] , Odds_type , anam), 2));
    var val_hdc_2 = (ball_data["b_hdc_2"] == 0 ? "" : formatMoney(_mtr(ball_data["b_hdc_2"] , Odds_type , anam), 2));

    if (val_hdc_1 < 0) {
      var a_hdc1_className = "FavOddsClass";
    } else {
      var a_hdc1_className = "UdrDogOddsClass";
    }

    if (val_hdc_2 < 0) {
      var a_hdc2_className = "FavOddsClass";
    } else {
      var a_hdc2_className = "UdrDogOddsClass";
    }

    if(val_hdc_1==0.00 || val_hdc_2==0.00){
      val_hdc_1 = "";
      val_hdc_2 = "";
    }

    var classBlibk = "";
    if(old_data!=null){

      var old_hdc_1 = (old_data["b_hdc_1"] == 0 ? "" : formatMoney(_mtr(old_data["b_hdc_1"] , Odds_type , anam), 2));
      var old_hdc_2 = (old_data["b_hdc_2"] == 0 ? "" : formatMoney(_mtr(old_data["b_hdc_2"] , Odds_type , anam), 2));

      if(ball_data["b_hdc"]!=old_data["b_hdc"] || val_hdc_1!=old_hdc_1 || val_hdc_2!=old_hdc_2){
        classBlibk = "show_blink";
        var blink_data = {};
        blink_data["id"] = id_tr+"_ghdc";
        blink_data["ctime"] = 5;
        arr_blink.push(blink_data);
        
        if(busket_tang["data"]["d_"+ball_data["b_id"]]!=undefined){
          if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_hdc_1"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_hdc_1;
            parent.leftx.change_odd(val_hdc_1 , id_tr+"_hdc_1" , blink_data , ball_data , 1 , busket_tang["type"]);
          }else if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_hdc_2"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_hdc_2;
            parent.leftx.change_odd(val_hdc_2 , id_tr+"_hdc_2" , blink_data , ball_data , 1 , busket_tang["type"]);
          }
        }
      }
    }

    var td3 = React.createElement("td" , {className : id_tr+"_ghdc "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},
                React.createElement("a" , {id :id_tr + '_hdc_1' , className:a_hdc1_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_1"] + "','h','" + val_hdc_1 + "',1,'"+id_tr+"_ghdc','"+id_tr+"_hdc_1')"} , val_hdc_1));

    var td4 = React.createElement("td" , {className : id_tr+"_ghdc "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},
                React.createElement("a" , {id :id_tr + '_hdc_2' , className:a_hdc2_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_1"] + "','a','" + val_hdc_2 + "',1,'"+id_tr+"_ghdc','"+id_tr+"_hdc_2')"} , val_hdc_2));

  }else{
    var td2 = React.createElement("td" , {className : 'HdpGoalClass' , style : {'white-space' : 'nowrap'}});
    var td3 = React.createElement("td" , {style : {'white-space' : 'nowrap'}});
    var td4 = React.createElement("td" , {style : {'white-space' : 'nowrap'}});
  }

  /*###############################################################################################################*/
  if (ball_data["b_goal"] != "" && ball_data["b_goal_1"] != "" && ball_data["b_goal_2"] != "" && dp!="1H") {

    var td5 = React.createElement("td" , {id :id_tr + '_goal' , className : 'HdpGoalClass' , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},ball_data["b_goal"]);

    

    var val_goal_1 = (ball_data["b_goal_1"] == 0 ? "" : formatMoney(_mtr(ball_data["b_goal_1"] , Odds_type , anam), 2));
    var val_goal_2 = (ball_data["b_goal_2"] == 0 ? "" : formatMoney(_mtr(ball_data["b_goal_2"] , Odds_type , anam), 2));

    if (val_goal_1 < 0) {
      var a_goal1_className = "FavOddsClass";
    } else {
      var a_goal1_className = "UdrDogOddsClass";
    }

    if (val_goal_2 < 0) {
      var a_goal2_className = "FavOddsClass";
    } else {
      var a_goal2_className = "UdrDogOddsClass";
    }

    if(val_goal_1==0.00 || val_goal_2==0.00){
      val_goal_1 = "";
      val_goal_2 = "";
    }

    var classBlibk = "";
    if(old_data!=null){

      var old_goal_1 = (old_data["b_goal_1"] == 0 ? "" : formatMoney(_mtr(old_data["b_goal_1"] , Odds_type , anam), 2));
      var old_goal_2 = (old_data["b_goal_2"] == 0 ? "" : formatMoney(_mtr(old_data["b_goal_2"] , Odds_type , anam), 2));

      if(ball_data["b_goal"]!=old_data["b_goal"] || val_goal_1!=old_goal_1 || val_goal_2!=old_goal_2){
        classBlibk = "show_blink";
        var blink_data = {};
        blink_data["id"] = id_tr+"_ggoal";
        blink_data["ctime"] = 5;
        arr_blink.push(blink_data);
        
        if(busket_tang["data"]["d_"+ball_data["b_id"]]!=undefined){
          if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_goal_1"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_goal_1;
            parent.leftx.change_odd(val_goal_1 , id_tr+"_goal_1" , blink_data , ball_data , 2 , busket_tang["type"]);
          }else if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_goal_2"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_goal_2;
            parent.leftx.change_odd(val_goal_2 , id_tr+"_goal_2" , blink_data , ball_data , 2 , busket_tang["type"]);
          }
        }
      }
    }

    var td6 = React.createElement("td" , {className : id_tr+"_ggoal "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},
                React.createElement("a" , {id :id_tr + '_goal_1' , className:a_goal1_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_2"] + "','h','" + val_goal_1 + "',2,'"+id_tr+"_goal','"+id_tr+"_goal_1')"} , val_goal_1));

    var td7 = React.createElement("td" , {className : id_tr+"_ggoal "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},
                React.createElement("a" , {id :id_tr + '_goal_2' , className:a_goal2_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_2"] + "','a','" + val_goal_2 + "',2,'"+id_tr+"_goal','"+id_tr+"_goal_2')"} , val_goal_2));

  }else{
    var td5 = React.createElement("td" , {className : 'HdpGoalClass' , style : {'white-space' : 'nowrap'}});
    var td6 = React.createElement("td" , {style : {'white-space' : 'nowrap'}});
    var td7 = React.createElement("td" , {style : {'white-space' : 'nowrap'}});
  }
  /*###############################################################################################################*/
  if (ball_data["b_1h_hdc"] != "" && ball_data["b_1h_hdc_1"] != "" && ball_data["b_1h_hdc_2"] != "" && dp!="1F") {

    var td8 = React.createElement("td" , {id :id_tr + '_1h_hdc' , className : 'HdpGoalClass' , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},ball_data["b_1h_hdc"]);


    if (ball_data["b_1h_big"] == 2) {
      var br_1h_hdc = React.createElement("br");
    } else {
      var br_1h_hdc = "";
    }

    

    var val_1h_hdc_1 = (ball_data["b_1h_hdc_1"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1h_hdc_1"] , Odds_type , anam), 2));
    var val_1h_hdc_2 = (ball_data["b_1h_hdc_2"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1h_hdc_2"] , Odds_type , anam), 2));

    if (val_1h_hdc_1 < 0) {
      var a_1h_hdc1_className = "FavOddsClass";
    } else {
      var a_1h_hdc1_className = "UdrDogOddsClass";
    }

    if (val_1h_hdc_2 < 0) {
      var a_1h_hdc2_className = "FavOddsClass";
    } else {
      var a_1h_hdc2_className = "UdrDogOddsClass";
    }

    if(val_1h_hdc_1==0.00 || val_1h_hdc_2==0.00){
      val_1h_hdc_1 = "";
      val_1h_hdc_2 = "";
    }

    var classBlibk = "";
    if(old_data!=null){

      var old_1h_hdc_1 = (old_data["b_1h_hdc_1"] == 0 ? "" : formatMoney(_mtr(old_data["b_1h_hdc_1"] , Odds_type , anam), 2));
      var old_1h_hdc_2 = (old_data["b_1h_hdc_2"] == 0 ? "" : formatMoney(_mtr(old_data["b_1h_hdc_2"] , Odds_type , anam), 2));

      if(ball_data["b_1h_hdc"]!=old_data["b_1h_hdc"] || val_1h_hdc_1!=old_1h_hdc_1 || val_1h_hdc_2!=old_1h_hdc_2){
        classBlibk = "show_blink";
        var blink_data = {};
        blink_data["id"] = id_tr+"_1h_ghdc";
        blink_data["ctime"] = 5;
        arr_blink.push(blink_data);
        
        if(busket_tang["data"]["d_"+ball_data["b_id"]]!=undefined){
          if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1h_hdc_1"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1h_hdc_1;
            parent.leftx.change_odd(val_1h_hdc_1 , id_tr+"_1h_hdc_1" , blink_data , ball_data , 5 , busket_tang["type"]);
          }else if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1h_hdc_2"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1h_hdc_2;
            parent.leftx.change_odd(val_1h_hdc_2 , id_tr+"_1h_hdc_2" , blink_data , ball_data , 5 , busket_tang["type"]);
          }
        }
      }
    }

    var td9 = React.createElement("td" , {className : id_tr+"_1h_ghdc "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},
                React.createElement("a" , {id :id_tr + '_1h_hdc_1' , className:a_1h_hdc1_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_5"] + "','h','" + val_1h_hdc_1 + "',5,'"+id_tr+"_1h_hdc','"+id_tr+"_1h_hdc_1')"} , val_1h_hdc_1));

    var td10 = React.createElement("td" , {className : id_tr+"_1h_ghdc "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},
                React.createElement("a" , {id :id_tr + '_1h_hdc_2' , className:a_1h_hdc2_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_5"] + "','a','" + val_1h_hdc_2 + "',5,'"+id_tr+"_1h_hdc','"+id_tr+"_1h_hdc_2')"} , val_1h_hdc_2));

  }else{
    var td8 = React.createElement("td" , {className : 'HdpGoalClass' , style : {'white-space' : 'nowrap'}});
    var td9 = React.createElement("td" , {style : {'white-space' : 'nowrap'}});
    var td10 = React.createElement("td" , {style : {'white-space' : 'nowrap'}});
  }
  /*###############################################################################################################*/
  if (ball_data["b_1h_goal"] != "" && ball_data["b_1h_goal_1"] != "" && ball_data["b_1h_goal_2"] != "" && dp!="1F") {

    var td11 = React.createElement("td" , {id :id_tr + '_1h_goal' , className : 'HdpGoalClass' , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},ball_data["b_1h_goal"]);

   

    var val_1h_goal_1 = (ball_data["b_1h_goal_1"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1h_goal_1"] , Odds_type , anam), 2));
    var val_1h_goal_2 = (ball_data["b_1h_goal_2"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1h_goal_2"] , Odds_type , anam), 2));

     if (val_1h_goal_1 < 0) {
      var a_1h_goal1_className = "FavOddsClass";
    } else {
      var a_1h_goal1_className = "UdrDogOddsClass";
    }

    if (val_1h_goal_2 < 0) {
      var a_1h_goal2_className = "FavOddsClass";
    } else {
      var a_1h_goal2_className = "UdrDogOddsClass";
    }

    if(val_1h_goal_1==0.00 || val_1h_goal_2==0.00){
      val_1h_goal_1 = "";
      val_1h_goal_2 = "";
    }

    var classBlibk = "";
    if(old_data!=null){

      var old_1h_goal_1 = (old_data["b_1h_goal_1"] == 0 ? "" : formatMoney(_mtr(old_data["b_1h_goal_1"] , Odds_type , anam), 2));
      var old_1h_goal_2 = (old_data["b_1h_goal_2"] == 0 ? "" : formatMoney(_mtr(old_data["b_1h_goal_2"] , Odds_type , anam), 2));

      if(ball_data["b_1h_goal"]!=old_data["b_1h_goal"] || val_1h_goal_1!=old_1h_goal_1 || val_1h_goal_2!=old_1h_goal_2){
        classBlibk = "show_blink";
        var blink_data = {};
        blink_data["id"] = id_tr+"_1h_ggoal";
        blink_data["ctime"] = 5;
        arr_blink.push(blink_data);
        
        if(busket_tang["data"]["d_"+ball_data["b_id"]]!=undefined){
          if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1h_goal_1"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1h_goal_1;
            parent.leftx.change_odd(val_1h_goal_1 , id_tr+"_1h_goal_1" , blink_data , ball_data , 6 , busket_tang["type"]);
          }else if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1h_goal_2"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1h_goal_2;
            parent.leftx.change_odd(val_1h_goal_2 , id_tr+"_1h_goal_2" , blink_data , ball_data , 6 , busket_tang["type"]);
          }
        }
      }
    }


    var td12 = React.createElement("td" , {className : id_tr+"_1h_ggoal "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},
                React.createElement("a" , {id :id_tr + '_1h_goal_1' , className:a_1h_goal1_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_6"] + "','h','" + val_1h_goal_1 + "',6,'"+id_tr+"_1h_ggoal','"+id_tr+"_1h_goal_1')"} , val_1h_goal_1));

    var td13 = React.createElement("td" , {className : id_tr+"_1h_ggoal "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},
                React.createElement("a" , {id :id_tr + '_1h_goal_2' , className:a_1h_goal2_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_6"] + "','a','" + val_1h_goal_2 + "',6,'"+id_tr+"_1h_ggoal','"+id_tr+"_1h_goal_2')"} , val_1h_goal_2));

  }else{
    var td11 = React.createElement("td" , {className : 'HdpGoalClass' , style : {'white-space' : 'nowrap'}});
    var td12 = React.createElement("td" , {style : {'white-space' : 'nowrap'}});
    var td13 = React.createElement("td" , {style : {'white-space' : 'nowrap'}});
  }
  /*###############################################################################################################*/
  if (ball_data["b_add"] == 1) {
    var td14 = React.createElement("td" , {className : 'breakLine' , style:{'text-align' : 'center'}} , 
      React.createElement("a" , { href : "javascript:openStatsInfo('" + ball_data["b_id"] + "')"} , 
        React.createElement("span" , {className:'iconOdds stats'} , null)
      )
    );
  }else{
    var td14 = React.createElement("td");
  }
  /*###############################################################################################################*/

  return [td0 , td1 , td2 , td3 , td4 , td5 , td6 , td7 , td8 , td9 , td10 , td11 , td12 , td13 , td14];
}
function td1rowsFT(ball_data , old_data , dp){
  var id_tr = 'id_' + ball_data["b_id"] + '_' + ball_data["b_add"];
  /*###############################################################################################################*/
  if (ball_data["b_live"] != 0) {
    if (ball_data["b_live"] == 1 || ball_data["b_live"] == 3) {

      var td0 = React.createElement("td" , {id : id_tr + '_ts' , className:'text_time' , style:{'text-align' : 'center'}} ,
        React.createElement("font" , {color :'red'} , ball_data["b_run_score_full"]),
        React.createElement("br"),
        ball_data["b_live_string"]+"'"
      );

    } else {

      var td0 = React.createElement("td" , {id : id_tr + '_ts' , className:'text_time' , style:{'text-align' : 'center'}} ,
        React.createElement("font" , {color :'red'} , ball_data["b_run_score_full"]),
        React.createElement("br"),
        React.createElement("span" , {style:{ 'color':'#106cbb' , 'font-weight':'bold' }} , ball_data["b_live_string"])
      );

    }
  } else {
    var date_data_1 = new Date(ball_data["b_date_play"] * 1000);
    var hours_data_1 = "0" + date_data_1.getHours();
    var minutes_data_1 = "0" + date_data_1.getMinutes();
    var formattedTime = hours_data_1.substr(-2) + ':' + minutes_data_1.substr(-2);

    var td0 = React.createElement("td" , {id : id_tr + '_ts' , className:'text_time' , style:{'text-align' : 'center'}} ,
      React.createElement("font" , {color :'red'} , "LIVE"),
      React.createElement("br"),
      formattedTime
    );
  }
  /*###############################################################################################################*/
  var className_t1 = "";
  var className_t2 = "";
  if (ball_data["b_zone"] == 1) {
      className_t1 = "FavTeamClass";
      className_t2 = "UdrDogTeamClass";
  }else{
      if (ball_data["b_big"] == 1) {
          className_t1 = "FavTeamClass";
      } else {
          className_t1 = "UdrDogTeamClass";
      }
      if (ball_data["b_big"] == 2) {
          className_t2 = "FavTeamClass";
      } else {
          className_t2 = "UdrDogTeamClass";
      }
  }

  if(ball_data["card_r"]!=null){
    var ex_card_r = ball_data["card_r"].split(",");
  }else{
    var ex_card_r = "";
  }


  if(parseInt(ex_card_r[0])>0){
      var card_r_h = React.createElement("div" , {className :'card_gif red'} , ex_card_r[0]);
  }else{
      var card_r_h = "";
  }

  if(parseInt(ex_card_r[1])>0){
      var card_r_a = React.createElement("div" , {className :'card_gif red'} , ex_card_r[1]);
  }else{
      var card_r_a = "";
  }

  var td1 = React.createElement("td" , {style : {"verticalAlign":"top"}} , 
    React.createElement("div" , {id :id_tr + '_home' , className:className_t1} , 
      React.createElement("span" , null , (ball_data["b_name_1_th"]=="" ? ball_data["b_name_1_en"] : ball_data["b_name_1_th"])),
      card_r_h
    ),
    React.createElement("div" , {id :id_tr + '_away' , className:className_t2} , 
      React.createElement("span" , null , (ball_data["b_name_2_th"]=="" ? ball_data["b_name_2_en"] : ball_data["b_name_2_th"])),
      card_r_a
    )
  );
  /*###############################################################################################################*/
  if (ball_data["b_hdc"] != "" && ball_data["b_hdc_1"] != "" && ball_data["b_hdc_2"] != "" && dp!="1H") {

    var td2 = React.createElement("td" , {id :id_tr + '_hdc' , className : 'HdpGoalClass' , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},ball_data["b_hdc"]);

    if (ball_data["b_big"] == 2) {
      var br_hdc = React.createElement("br");
    } else {
      var br_hdc = "";
    }

    

    var val_hdc_1 = (ball_data["b_hdc_1"] == 0 ? "" : formatMoney(_mtr(ball_data["b_hdc_1"] , Odds_type , anam), 2));
    var val_hdc_2 = (ball_data["b_hdc_2"] == 0 ? "" : formatMoney(_mtr(ball_data["b_hdc_2"] , Odds_type , anam), 2));

    if (val_hdc_1 < 0) {
      var a_hdc1_className = "FavOddsClass";
    } else {
      var a_hdc1_className = "UdrDogOddsClass";
    }

    if (val_hdc_2 < 0) {
      var a_hdc2_className = "FavOddsClass";
    } else {
      var a_hdc2_className = "UdrDogOddsClass";
    }

    if(val_hdc_1==0.00 || val_hdc_2==0.00){
      val_hdc_1 = "";
      val_hdc_2 = "";
    }

    var classBlibk = "";
    if(old_data!=null){

      var old_hdc_1 = (old_data["b_hdc_1"] == 0 ? "" : formatMoney(_mtr(old_data["b_hdc_1"] , Odds_type , anam), 2));
      var old_hdc_2 = (old_data["b_hdc_2"] == 0 ? "" : formatMoney(_mtr(old_data["b_hdc_2"] , Odds_type , anam), 2));

      if(ball_data["b_hdc"]!=old_data["b_hdc"] || val_hdc_1!=old_hdc_1 || val_hdc_2!=old_hdc_2){
        classBlibk = "show_blink";
        var blink_data = {};
        blink_data["id"] = id_tr+"_ghdc";
        blink_data["ctime"] = 5;
        arr_blink.push(blink_data);
        
        if(busket_tang["data"]["d_"+ball_data["b_id"]]!=undefined){
          if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_hdc_1"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_hdc_1;
            parent.leftx.change_odd(val_hdc_1 , id_tr+"_hdc_1" , blink_data , ball_data , 1 , busket_tang["type"]);
          }else if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_hdc_2"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_hdc_2;
            parent.leftx.change_odd(val_hdc_2 , id_tr+"_hdc_2" , blink_data , ball_data , 1 , busket_tang["type"]);
          }
        }
      }
    }

    var td3 = React.createElement("td" , {className : id_tr+"_ghdc "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},
                React.createElement("a" , {id :id_tr + '_hdc_1' , className:a_hdc1_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_1"] + "','h','" + val_hdc_1 + "',1,'"+id_tr+"_ghdc','"+id_tr+"_hdc_1')"} , val_hdc_1));

    var td4 = React.createElement("td" , {className : id_tr+"_ghdc "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},
                React.createElement("a" , {id :id_tr + '_hdc_2' , className:a_hdc2_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_1"] + "','a','" + val_hdc_2 + "',1,'"+id_tr+"_ghdc','"+id_tr+"_hdc_2')"} , val_hdc_2));

  }else{
    var td2 = React.createElement("td" , {className : 'HdpGoalClass' , style : {'white-space' : 'nowrap'}});
    var td3 = React.createElement("td" , {style : {'white-space' : 'nowrap'}});
    var td4 = React.createElement("td" , {style : {'white-space' : 'nowrap'}});
  }

  /*###############################################################################################################*/
  if (ball_data["b_goal"] != "" && ball_data["b_goal_1"] != "" && ball_data["b_goal_2"] != "" && dp!="1H") {

    var td5 = React.createElement("td" , {id :id_tr + '_goal' , className : 'HdpGoalClass' , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},ball_data["b_goal"]);

    

    var val_goal_1 = (ball_data["b_goal_1"] == 0 ? "" : formatMoney(_mtr(ball_data["b_goal_1"] , Odds_type , anam), 2));
    var val_goal_2 = (ball_data["b_goal_2"] == 0 ? "" : formatMoney(_mtr(ball_data["b_goal_2"] , Odds_type , anam), 2));

    if (val_goal_1 < 0) {
      var a_goal1_className = "FavOddsClass";
    } else {
      var a_goal1_className = "UdrDogOddsClass";
    }

    if (val_goal_2 < 0) {
      var a_goal2_className = "FavOddsClass";
    } else {
      var a_goal2_className = "UdrDogOddsClass";
    }

    if(val_goal_1==0.00 || val_goal_2==0.00){
      val_goal_1 = "";
      val_goal_2 = "";
    }

    var classBlibk = "";
    if(old_data!=null){

      var old_goal_1 = (old_data["b_goal_1"] == 0 ? "" : formatMoney(_mtr(old_data["b_goal_1"] , Odds_type , anam), 2));
      var old_goal_2 = (old_data["b_goal_2"] == 0 ? "" : formatMoney(_mtr(old_data["b_goal_2"] , Odds_type , anam), 2));

      if(ball_data["b_goal"]!=old_data["b_goal"] || val_goal_1!=old_goal_1 || val_goal_2!=old_goal_2){
        classBlibk = "show_blink";
        var blink_data = {};
        blink_data["id"] = id_tr+"_ggoal";
        blink_data["ctime"] = 5;
        arr_blink.push(blink_data);
        
        if(busket_tang["data"]["d_"+ball_data["b_id"]]!=undefined){
          if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_goal_1"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_goal_1;
            parent.leftx.change_odd(val_goal_1 , id_tr+"_goal_1" , blink_data , ball_data , 2 , busket_tang["type"]);
          }else if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_goal_2"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_goal_2;
            parent.leftx.change_odd(val_goal_2 , id_tr+"_goal_2" , blink_data , ball_data , 2 , busket_tang["type"]);
          }
        }
      }
    }

    var td6 = React.createElement("td" , {className : id_tr+"_ggoal "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},
                React.createElement("a" , {id :id_tr + '_goal_1' , className:a_goal1_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_2"] + "','h','" + val_goal_1 + "',2,'"+id_tr+"_goal','"+id_tr+"_goal_1')"} , val_goal_1));

    var td7 = React.createElement("td" , {className : id_tr+"_ggoal "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},
                React.createElement("a" , {id :id_tr + '_goal_2' , className:a_goal2_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_2"] + "','a','" + val_goal_2 + "',2,'"+id_tr+"_goal','"+id_tr+"_goal_2')"} , val_goal_2));

  }else{
    var td5 = React.createElement("td" , {className : 'HdpGoalClass' , style : {'white-space' : 'nowrap'}});
    var td6 = React.createElement("td" , {style : {'white-space' : 'nowrap'}});
    var td7 = React.createElement("td" , {style : {'white-space' : 'nowrap'}});
  }
  /*###############################################################################################################*/
  if (ball_data["b_add"] == 1) {
    var td14 = React.createElement("td" , {className : 'breakLine' , style:{'text-align' : 'center'}} , 
      React.createElement("a" , { href : "javascript:openStatsInfo('" + ball_data["b_id"] + "')"} , 
        React.createElement("span" , {className:'iconOdds stats'} , null)
      )
    );
  }else{
    var td14 = React.createElement("td");
  }
  /*###############################################################################################################*/

  return [td0 , td1 , td2 , td3 , td4 , td5 , td6 , td7 , td14];
}
function td1rowsHT(ball_data , old_data , dp){
  var id_tr = 'id_' + ball_data["b_id"] + '_' + ball_data["b_add"];
  /*###############################################################################################################*/
  if (ball_data["b_live"] != 0) {
    if (ball_data["b_live"] == 1 || ball_data["b_live"] == 3) {

      var td0 = React.createElement("td" , {id : id_tr + '_ts' , className:'text_time' , style:{'text-align' : 'center'}} ,
        React.createElement("font" , {color :'red'} , ball_data["b_run_score_full"]),
        React.createElement("br"),
        ball_data["b_live_string"]+"'"
      );

    } else {

      var td0 = React.createElement("td" , {id : id_tr + '_ts' , className:'text_time' , style:{'text-align' : 'center'}} ,
        React.createElement("font" , {color :'red'} , ball_data["b_run_score_full"]),
        React.createElement("br"),
        React.createElement("span" , {style:{ 'color':'#106cbb' , 'font-weight':'bold' }} , ball_data["b_live_string"])
      );

    }
  } else {
    var date_data_1 = new Date(ball_data["b_date_play"] * 1000);
    var hours_data_1 = "0" + date_data_1.getHours();
    var minutes_data_1 = "0" + date_data_1.getMinutes();
    var formattedTime = hours_data_1.substr(-2) + ':' + minutes_data_1.substr(-2);

    var td0 = React.createElement("td" , {id : id_tr + '_ts' , className:'text_time' , style:{'text-align' : 'center'}} ,
      React.createElement("font" , {color :'red'} , "LIVE"),
      React.createElement("br"),
      formattedTime
    );
  }
  /*###############################################################################################################*/
  var className_t1 = "";
  var className_t2 = "";
  if (ball_data["b_zone"] == 1) {
      className_t1 = "FavTeamClass";
      className_t2 = "UdrDogTeamClass";
  }else{
      if (ball_data["b_big"] == 1) {
          className_t1 = "FavTeamClass";
      } else {
          className_t1 = "UdrDogTeamClass";
      }
      if (ball_data["b_big"] == 2) {
          className_t2 = "FavTeamClass";
      } else {
          className_t2 = "UdrDogTeamClass";
      }
  }

  if(ball_data["card_r"]!=null){
    var ex_card_r = ball_data["card_r"].split(",");
  }else{
    var ex_card_r = "";
  }


  if(parseInt(ex_card_r[0])>0){
      var card_r_h = React.createElement("div" , {className :'card_gif red'} , ex_card_r[0]);
  }else{
      var card_r_h = "";
  }

  if(parseInt(ex_card_r[1])>0){
      var card_r_a = React.createElement("div" , {className :'card_gif red'} , ex_card_r[1]);
  }else{
      var card_r_a = "";
  }

  var td1 = React.createElement("td" , {style : {"verticalAlign":"top"}} , 
    React.createElement("div" , {id :id_tr + '_home' , className:className_t1} , 
      React.createElement("span" , null , (ball_data["b_name_1_th"]=="" ? ball_data["b_name_1_en"] : ball_data["b_name_1_th"])),
      card_r_h
    ),
    React.createElement("div" , {id :id_tr + '_away' , className:className_t2} , 
      React.createElement("span" , null , (ball_data["b_name_2_th"]=="" ? ball_data["b_name_2_en"] : ball_data["b_name_2_th"])),
      card_r_a
    )
  );
  /*###############################################################################################################*/
  if (ball_data["b_1h_hdc"] != "" && ball_data["b_1h_hdc_1"] != "" && ball_data["b_1h_hdc_2"] != "" && dp!="1F") {

    var td8 = React.createElement("td" , {id :id_tr + '_1h_hdc' , className : 'HdpGoalClass' , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},ball_data["b_1h_hdc"]);


    if (ball_data["b_1h_big"] == 2) {
      var br_1h_hdc = React.createElement("br");
    } else {
      var br_1h_hdc = "";
    }

    

    var val_1h_hdc_1 = (ball_data["b_1h_hdc_1"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1h_hdc_1"] , Odds_type , anam), 2));
    var val_1h_hdc_2 = (ball_data["b_1h_hdc_2"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1h_hdc_2"] , Odds_type , anam), 2));

    if (val_1h_hdc_1 < 0) {
      var a_1h_hdc1_className = "FavOddsClass";
    } else {
      var a_1h_hdc1_className = "UdrDogOddsClass";
    }

    if (val_1h_hdc_2 < 0) {
      var a_1h_hdc2_className = "FavOddsClass";
    } else {
      var a_1h_hdc2_className = "UdrDogOddsClass";
    }

    if(val_1h_hdc_1==0.00 || val_1h_hdc_2==0.00){
      val_1h_hdc_1 = "";
      val_1h_hdc_2 = "";
    }

    var classBlibk = "";
    if(old_data!=null){

      var old_1h_hdc_1 = (old_data["b_1h_hdc_1"] == 0 ? "" : formatMoney(_mtr(old_data["b_1h_hdc_1"] , Odds_type , anam), 2));
      var old_1h_hdc_2 = (old_data["b_1h_hdc_2"] == 0 ? "" : formatMoney(_mtr(old_data["b_1h_hdc_2"] , Odds_type , anam), 2));

      if(ball_data["b_1h_hdc"]!=old_data["b_1h_hdc"] || val_1h_hdc_1!=old_1h_hdc_1 || val_1h_hdc_2!=old_1h_hdc_2){
        classBlibk = "show_blink";
        var blink_data = {};
        blink_data["id"] = id_tr+"_1h_ghdc";
        blink_data["ctime"] = 5;
        arr_blink.push(blink_data);
        
        if(busket_tang["data"]["d_"+ball_data["b_id"]]!=undefined){
          if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1h_hdc_1"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1h_hdc_1;
            parent.leftx.change_odd(val_1h_hdc_1 , id_tr+"_1h_hdc_1" , blink_data , ball_data , 5 , busket_tang["type"]);
          }else if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1h_hdc_2"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1h_hdc_2;
            parent.leftx.change_odd(val_1h_hdc_2 , id_tr+"_1h_hdc_2" , blink_data , ball_data , 5 , busket_tang["type"]);
          }
        }
      }
    }

    var td9 = React.createElement("td" , {className : id_tr+"_1h_ghdc "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},
                React.createElement("a" , {id :id_tr + '_1h_hdc_1' , className:a_1h_hdc1_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_5"] + "','h','" + val_1h_hdc_1 + "',5,'"+id_tr+"_1h_hdc','"+id_tr+"_1h_hdc_1')"} , val_1h_hdc_1));

    var td10 = React.createElement("td" , {className : id_tr+"_1h_ghdc "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},
                React.createElement("a" , {id :id_tr + '_1h_hdc_2' , className:a_1h_hdc2_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_5"] + "','a','" + val_1h_hdc_2 + "',5,'"+id_tr+"_1h_hdc','"+id_tr+"_1h_hdc_2')"} , val_1h_hdc_2));

  }else{
    var td8 = React.createElement("td" , {className : 'HdpGoalClass' , style : {'white-space' : 'nowrap'}});
    var td9 = React.createElement("td" , {style : {'white-space' : 'nowrap'}});
    var td10 = React.createElement("td" , {style : {'white-space' : 'nowrap'}});
  }
  /*###############################################################################################################*/
  if (ball_data["b_1h_goal"] != "" && ball_data["b_1h_goal_1"] != "" && ball_data["b_1h_goal_2"] != "" && dp!="1F") {

    var td11 = React.createElement("td" , {id :id_tr + '_1h_goal' , className : 'HdpGoalClass' , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},ball_data["b_1h_goal"]);

   

    var val_1h_goal_1 = (ball_data["b_1h_goal_1"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1h_goal_1"] , Odds_type , anam), 2));
    var val_1h_goal_2 = (ball_data["b_1h_goal_2"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1h_goal_2"] , Odds_type , anam), 2));

     if (val_1h_goal_1 < 0) {
      var a_1h_goal1_className = "FavOddsClass";
    } else {
      var a_1h_goal1_className = "UdrDogOddsClass";
    }

    if (val_1h_goal_2 < 0) {
      var a_1h_goal2_className = "FavOddsClass";
    } else {
      var a_1h_goal2_className = "UdrDogOddsClass";
    }

    if(val_1h_goal_1==0.00 || val_1h_goal_2==0.00){
      val_1h_goal_1 = "";
      val_1h_goal_2 = "";
    }

    var classBlibk = "";
    if(old_data!=null){

      var old_1h_goal_1 = (old_data["b_1h_goal_1"] == 0 ? "" : formatMoney(_mtr(old_data["b_1h_goal_1"] , Odds_type , anam), 2));
      var old_1h_goal_2 = (old_data["b_1h_goal_2"] == 0 ? "" : formatMoney(_mtr(old_data["b_1h_goal_2"] , Odds_type , anam), 2));

      if(ball_data["b_1h_goal"]!=old_data["b_1h_goal"] || val_1h_goal_1!=old_1h_goal_1 || val_1h_goal_2!=old_1h_goal_2){
        classBlibk = "show_blink";
        var blink_data = {};
        blink_data["id"] = id_tr+"_1h_ggoal";
        blink_data["ctime"] = 5;
        arr_blink.push(blink_data);
        
        if(busket_tang["data"]["d_"+ball_data["b_id"]]!=undefined){
          if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1h_goal_1"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1h_goal_1;
            parent.leftx.change_odd(val_1h_goal_1 , id_tr+"_1h_goal_1" , blink_data , ball_data , 6 , busket_tang["type"]);
          }else if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1h_goal_2"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1h_goal_2;
            parent.leftx.change_odd(val_1h_goal_2 , id_tr+"_1h_goal_2" , blink_data , ball_data , 6 , busket_tang["type"]);
          }
        }
      }
    }


    var td12 = React.createElement("td" , {className : id_tr+"_1h_ggoal "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},
                React.createElement("a" , {id :id_tr + '_1h_goal_1' , className:a_1h_goal1_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_6"] + "','h','" + val_1h_goal_1 + "',6,'"+id_tr+"_1h_ggoal','"+id_tr+"_1h_goal_1')"} , val_1h_goal_1));

    var td13 = React.createElement("td" , {className : id_tr+"_1h_ggoal "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center'}},
                React.createElement("a" , {id :id_tr + '_1h_goal_2' , className:a_1h_goal2_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_6"] + "','a','" + val_1h_goal_2 + "',6,'"+id_tr+"_1h_ggoal','"+id_tr+"_1h_goal_2')"} , val_1h_goal_2));

  }else{
    var td11 = React.createElement("td" , {className : 'HdpGoalClass' , style : {'white-space' : 'nowrap'}});
    var td12 = React.createElement("td" , {style : {'white-space' : 'nowrap'}});
    var td13 = React.createElement("td" , {style : {'white-space' : 'nowrap'}});
  }
  /*###############################################################################################################*/
  if (ball_data["b_add"] == 1) {
    var td14 = React.createElement("td" , {className : 'breakLine' , style:{'text-align' : 'center'}} , 
      React.createElement("a" , { href : "javascript:openStatsInfo('" + ball_data["b_id"] + "')"} , 
        React.createElement("span" , {className:'iconOdds stats'} , null)
      )
    );
  }else{
    var td14 = React.createElement("td");
  }
  /*###############################################################################################################*/

  return [td0 , td1 , td8 , td9 , td10 , td11 , td12 , td13 , td14];
}
function td1x2(ball_data , old_data){
  var id_tr = 'id_' + ball_data["b_id"] + '_' + ball_data["b_add"];
  /*###############################################################################################################*/
  if (ball_data["b_live"] != 0) {
    if (ball_data["b_live"] == 1 || ball_data["b_live"] == 3) {

      var td0 = React.createElement("td" , {id : id_tr + '_ts' , className:'text_time' , style:{'text-align' : 'center'}} ,
        React.createElement("font" , {color :'red'} , ball_data["b_run_score_full"]),
        React.createElement("br"),
        ball_data["b_live_string"]+"'"
      );

    } else {

      var td0 = React.createElement("td" , {id : id_tr + '_ts' , className:'text_time' , style:{'text-align' : 'center'}} ,
        React.createElement("font" , {color :'red'} , ball_data["b_run_score_full"]),
        React.createElement("br"),
        React.createElement("span" , {style:{ 'color':'#106cbb' , 'font-weight':'bold' }} , ball_data["b_live_string"])
      );

    }
  } else {
    var date_data_1 = new Date(ball_data["b_date_play"] * 1000);
    var hours_data_1 = "0" + date_data_1.getHours();
    var minutes_data_1 = "0" + date_data_1.getMinutes();
    var formattedTime = hours_data_1.substr(-2) + ':' + minutes_data_1.substr(-2);

    var td0 = React.createElement("td" , {id : id_tr + '_ts' , className:'text_time' , style:{'text-align' : 'center'}} ,
      React.createElement("font" , {color :'red'} , "LIVE"),
      React.createElement("br"),
      formattedTime
    );
  }
  /*###############################################################################################################*/
  var className_t1 = "UdrDogTeamClass";
  var className_t2 = "UdrDogTeamClass";
  /*if (ball_data["b_zone"] == 1) {
      className_t1 = "FavTeamClass";
      className_t2 = "UdrDogTeamClass";
  }else{
      if (ball_data["b_big"] == 1) {
          className_t1 = "FavTeamClass";
      } else {
          className_t1 = "UdrDogTeamClass";
      }
      if (ball_data["b_big"] == 2) {
          className_t2 = "FavTeamClass";
      } else {
          className_t2 = "UdrDogTeamClass";
      }
  }*/

  if(ball_data["card_r"]!=null){
    var ex_card_r = ball_data["card_r"].split(",");
  }else{
    var ex_card_r = "";
  }


  if(parseInt(ex_card_r[0])>0){
      var card_r_h = React.createElement("div" , {className :'card_gif red'} , ex_card_r[0]);
  }else{
      var card_r_h = "";
  }

  if(parseInt(ex_card_r[1])>0){
      var card_r_a = React.createElement("div" , {className :'card_gif red'} , ex_card_r[1]);
  }else{
      var card_r_a = "";
  }

  var td1 = React.createElement("td" , {style : {"verticalAlign":"top"}} , 
    React.createElement("div" , {id :id_tr + '_home' , className:className_t1} , 
      React.createElement("span" , null , (ball_data["b_name_1_th"]=="" ? ball_data["b_name_1_en"] : ball_data["b_name_1_th"])),
      card_r_h
    ),
    React.createElement("div" , {id :id_tr + '_away' , className:className_t2} , 
      React.createElement("span" , null , (ball_data["b_name_2_th"]=="" ? ball_data["b_name_2_en"] : ball_data["b_name_2_th"])),
      card_r_a
    )
  );
  /*###############################################################################################################*/
  if ((ball_data["b_1x2_1"] > 0 && ball_data["b_1x2_2"] > 0) || (ball_data["b_1x2_1"] != 0 && ball_data["b_1x2_2"] != 0)) {

    

    var val_1x2_1 = (ball_data["b_1x2_1"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1x2_1"] , 1 , anam), 2));
    var val_1x2_x = (ball_data["b_1x2_x"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1x2_x"] , 1 , anam), 2));
    var val_1x2_2 = (ball_data["b_1x2_2"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1x2_2"] , 1 , anam), 2));

    if (val_1x2_1 < 0) {
      var a_1x21_className = "FavOddsClass";
    } else {
      var a_1x21_className = "UdrDogOddsClass";
    }

    if (val_1x2_2 < 0) {
      var a_1x22_className = "FavOddsClass";
    } else {
      var a_1x22_className = "UdrDogOddsClass";
    }

    if (val_1x2_x < 0) {
      var a_1x2x_className = "FavOddsClass";
    } else {
      var a_1x2x_className = "UdrDogOddsClass";
    }

    if(val_1x2_1<=1.00 || val_1x2_x<=1.00 || val_1x2_2<=1.00){
      val_1x2_1 = "";
      val_1x2_x = "";
      val_1x2_2 = "";
    }

    var classBlibk = "";
    if(old_data!=null){

      var old_1x2_1 = (old_data["b_1x2_1"] == 0 ? "" : formatMoney(_mtr(old_data["b_1x2_1"] , 1 , anam), 2));
      var old_1x2_x = (old_data["b_1x2_x"] == 0 ? "" : formatMoney(_mtr(old_data["b_1x2_x"] , 1 , anam), 2));
      var old_1x2_2 = (old_data["b_1x2_2"] == 0 ? "" : formatMoney(_mtr(old_data["b_1x2_2"] , 1 , anam), 2));

      if(old_1x2_1<=1.00 || old_1x2_x<=1.00 || old_1x2_2<=1.00){
        old_1x2_1 = "";
        old_1x2_x = "";
        old_1x2_2 = "";
      }

      if(val_1x2_1!=old_1x2_1 || val_1x2_x!=old_1x2_x || val_1x2_2!=old_1x2_2){
        classBlibk = "show_blink";
        var blink_data = {};
        blink_data["id"] = id_tr+"_g1x2";
        blink_data["ctime"] = 5;
        arr_blink.push(blink_data);
        
        if(busket_tang["data"]["d_"+ball_data["b_id"]]!=undefined){
          if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1x2_1"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1x2_1;
            parent.leftx.change_odd(val_1x2_1 , id_tr+"_1x2_1" , blink_data , ball_data , 3 , busket_tang["type"]);
          }else if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1x2_x"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1x2_x;
            parent.leftx.change_odd(val_1x2_x , id_tr+"_1x2_x" , blink_data , ball_data , 3 , busket_tang["type"]);
          }else if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1x2_2"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1x2_2;
            parent.leftx.change_odd(val_1x2_2 , id_tr+"_1x2_2" , blink_data , ball_data , 3 , busket_tang["type"]);
          }
        }
      }
    }

    var td2 = React.createElement("td" , {className : id_tr+"_g1x2 "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center' , 'width' : '60px'}},
                React.createElement("a" , {id :id_tr + '_1x2_1' , className:a_1x21_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_3"] + "','1','" + val_1x2_1 + "',3,'"+id_tr+"_g1x2','"+id_tr+"_1x2_1')"} , val_1x2_1));

    var td3 = React.createElement("td" , {className : id_tr+"_g1x2 "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center' , 'width' : '60px'}},
                React.createElement("a" , {id :id_tr + '_1x2_x' , className:a_1x2x_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_3"] + "','X','" + val_1x2_x + "',3,'"+id_tr+"_g1x2','"+id_tr+"_1x2_x')"} , val_1x2_x));

    var td4 = React.createElement("td" , {className : id_tr+"_g1x2 "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center' , 'width' : '60px'}},
                React.createElement("a" , {id :id_tr + '_1x2_2' , className:a_1x22_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_3"] + "','2','" + val_1x2_2 + "',3,'"+id_tr+"_g1x2','"+id_tr+"_1x2_2')"} , val_1x2_2));

  }else{
    var td2 = React.createElement("td" , {style : {'white-space' : 'nowrap' , 'width' : '60px'}});
    var td3 = React.createElement("td" , {style : {'white-space' : 'nowrap' , 'width' : '60px'}});
    var td4 = React.createElement("td" , {style : {'white-space' : 'nowrap' , 'width' : '60px'}});
  }

  /*###############################################################################################################*/
  if ((ball_data["b_1h_1x2_1"] > 0 && ball_data["b_1h_1x2_2"] > 0) || (ball_data["b_1h_1x2_1"] != 0 && ball_data["b_1h_1x2_2"] != 0)) {

    

    var val_1h_1x2_1 = (ball_data["b_1h_1x2_1"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1h_1x2_1"] , 1 , anam), 2));
    var val_1h_1x2_x = (ball_data["b_1h_1x2_x"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1h_1x2_x"] , 1 , anam), 2));
    var val_1h_1x2_2 = (ball_data["b_1h_1x2_2"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1h_1x2_2"] , 1 , anam), 2));

    if (val_1h_1x2_1 < 0) {
      var a_1h_1x21_className = "FavOddsClass";
    } else {
      var a_1h_1x21_className = "UdrDogOddsClass";
    }

    if (val_1h_1x2_2 < 0) {
      var a_1h_1x22_className = "FavOddsClass";
    } else {
      var a_1h_1x22_className = "UdrDogOddsClass";
    }

    if (val_1h_1x2_x < 0) {
      var a_1h_1x2x_className = "FavOddsClass";
    } else {
      var a_1h_1x2x_className = "UdrDogOddsClass";
    }

    if(val_1h_1x2_1<=1.00 || val_1h_1x2_x<=1.00 || val_1h_1x2_2<=1.00){
      val_1h_1x2_1 = "";
      val_1h_1x2_x = "";
      val_1h_1x2_2 = "";
    }

    var classBlibk = "";
    if(old_data!=null){

      var old_1h_1x2_1 = (old_data["b_1h_1x2_1"] == 0 ? "" : formatMoney(_mtr(old_data["b_1h_1x2_1"] , 1 , anam), 2));
      var old_1h_1x2_x = (old_data["b_1h_1x2_x"] == 0 ? "" : formatMoney(_mtr(old_data["b_1h_1x2_x"] , 1 , anam), 2));
      var old_1h_1x2_2 = (old_data["b_1h_1x2_2"] == 0 ? "" : formatMoney(_mtr(old_data["b_1h_1x2_2"] , 1 , anam), 2));

      if(old_1h_1x2_1<=1.00 || old_1h_1x2_x<=1.00 || old_1h_1x2_2<=1.00){
        old_1h_1x2_1 = "";
        old_1h_1x2_x = "";
        old_1h_1x2_2 = "";
      }

      if(val_1h_1x2_1!=old_1h_1x2_1 || val_1h_1x2_x!=old_1h_1x2_x || val_1h_1x2_2!=old_1h_1x2_2){
        classBlibk = "show_blink";
        var blink_data = {};
        blink_data["id"] = id_tr+"_1h_g1x2";
        blink_data["ctime"] = 5;
        arr_blink.push(blink_data);


        if(busket_tang["data"]["d_"+ball_data["b_id"]]!=undefined){
          if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1h_1x2_1"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1h_1x2_1;
            parent.leftx.change_odd(val_1h_1x2_1 , id_tr+"_1h_1x2_1" , blink_data , ball_data , 7 , busket_tang["type"]);
          }else if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1h_1x2_x"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1h_1x2_x;
            parent.leftx.change_odd(val_1h_1x2_x , id_tr+"_1h_1x2_x" , blink_data , ball_data , 7 , busket_tang["type"]);
          }else if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1h_1x2_2"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1h_1x2_2;
            parent.leftx.change_odd(val_1h_1x2_2 , id_tr+"_1h_1x2_2" , blink_data , ball_data , 7 , busket_tang["type"]);
          }
        }
      }
    }

    var td5 = React.createElement("td" , {className : id_tr+"_1h_g1x2 "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center' , 'width' : '60px'}},
                React.createElement("a" , {id :id_tr + '_1h_1x2_1' , className:a_1h_1x21_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_7"] + "','1','" + val_1h_1x2_1 + "',7,'"+id_tr+"_1h_g1x2','"+id_tr+"_1h_1x2_1')"} , val_1h_1x2_1));

    var td6 = React.createElement("td" , {className : id_tr+"_1h_g1x2 "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center' , 'width' : '60px'}},
                React.createElement("a" , {id :id_tr + '_1h_1x2_x' , className:a_1h_1x2x_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_7"] + "','X','" + val_1h_1x2_x + "',7,'"+id_tr+"_1h_g1x2','"+id_tr+"_1h_1x2_x')"} , val_1h_1x2_x));

    var td7 = React.createElement("td" , {className : id_tr+"_1h_g1x2 "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center' , 'width' : '60px'}},
                React.createElement("a" , {id :id_tr + '_1h_1x2_2' , className:a_1h_1x22_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_7"] + "','2','" + val_1h_1x2_2 + "',7,'"+id_tr+"_1h_g1x2','"+id_tr+"_1h_1x2_2')"} , val_1h_1x2_2));

  }else{
    var td5 = React.createElement("td" , {style : {'white-space' : 'nowrap' , 'width' : '60px'}});
    var td6 = React.createElement("td" , {style : {'white-space' : 'nowrap' , 'width' : '60px'}});
    var td7 = React.createElement("td" , {style : {'white-space' : 'nowrap' , 'width' : '60px'}});
  }
  /*###############################################################################################################*/
  if (ball_data["b_add"] == 1) {
    var td8 = React.createElement("td" , {className : 'breakLine' , style:{'text-align' : 'center'}} , 
      React.createElement("a" , { href : "javascript:openStatsInfo('" + ball_data["b_id"] + "')"} , 
        React.createElement("span" , {className:'iconOdds stats'} , null)
      )
    );
  }else{
    var td8 = React.createElement("td");
  }
  /*###############################################################################################################*/

  return [td0 , td1 , td2 , td3 , td4 , td5 , td6 , td7 , td8];
}
function tdOE(ball_data , old_data){
  var id_tr = 'id_' + ball_data["b_id"] + '_' + ball_data["b_add"];
  /*###############################################################################################################*/
  if (ball_data["b_live"] != 0) {
    if (ball_data["b_live"] == 1 || ball_data["b_live"] == 3) {

      var td0 = React.createElement("td" , {id : id_tr + '_ts' , className:'text_time' , style:{'text-align' : 'center'}} ,
        React.createElement("font" , {color :'red'} , ball_data["b_run_score_full"]),
        React.createElement("br"),
        ball_data["b_live_string"]+"'"
      );

    } else {

      var td0 = React.createElement("td" , {id : id_tr + '_ts' , className:'text_time' , style:{'text-align' : 'center'}} ,
        React.createElement("font" , {color :'red'} , ball_data["b_run_score_full"]),
        React.createElement("br"),
        React.createElement("span" , {style:{ 'color':'#106cbb' , 'font-weight':'bold' }} , ball_data["b_live_string"])
      );

    }
  } else {
    var date_data_1 = new Date(ball_data["b_date_play"] * 1000);
    var hours_data_1 = "0" + date_data_1.getHours();
    var minutes_data_1 = "0" + date_data_1.getMinutes();
    var formattedTime = hours_data_1.substr(-2) + ':' + minutes_data_1.substr(-2);

    var td0 = React.createElement("td" , {id : id_tr + '_ts' , className:'text_time' , style:{'text-align' : 'center'}} ,
      React.createElement("font" , {color :'red'} , "LIVE"),
      React.createElement("br"),
      formattedTime
    );
  }
  /*###############################################################################################################*/
  var className_t1 = "UdrDogTeamClass";
  var className_t2 = "UdrDogTeamClass";
  /*if (ball_data["b_zone"] == 1) {
      className_t1 = "FavTeamClass";
      className_t2 = "UdrDogTeamClass";
  }else{
      if (ball_data["b_big"] == 1) {
          className_t1 = "FavTeamClass";
      } else {
          className_t1 = "UdrDogTeamClass";
      }
      if (ball_data["b_big"] == 2) {
          className_t2 = "FavTeamClass";
      } else {
          className_t2 = "UdrDogTeamClass";
      }
  }*/

  if(ball_data["card_r"]!=null){
    var ex_card_r = ball_data["card_r"].split(",");
  }else{
    var ex_card_r = "";
  }


  if(parseInt(ex_card_r[0])>0){
      var card_r_h = React.createElement("div" , {className :'card_gif red'} , ex_card_r[0]);
  }else{
      var card_r_h = "";
  }

  if(parseInt(ex_card_r[1])>0){
      var card_r_a = React.createElement("div" , {className :'card_gif red'} , ex_card_r[1]);
  }else{
      var card_r_a = "";
  }

  var td1 = React.createElement("td" , {style : {"verticalAlign":"top"}} , 
    React.createElement("div" , {id :id_tr + '_home' , className:className_t1} , 
      React.createElement("span" , null , (ball_data["b_name_1_th"]=="" ? ball_data["b_name_1_en"] : ball_data["b_name_1_th"])),
      card_r_h
    ),
    React.createElement("div" , {id :id_tr + '_away' , className:className_t2} , 
      React.createElement("span" , null , (ball_data["b_name_2_th"]=="" ? ball_data["b_name_2_en"] : ball_data["b_name_2_th"])),
      card_r_a
    )
  );
  /*###############################################################################################################*/
  if (ball_data["b_odd"] != "" && ball_data["b_even"] != "") {

    

    var val_odd = (ball_data["b_odd"] == 0 ? "" : formatMoney(_mtr(ball_data["b_odd"] , Odds_type , anam), 2));
    var val_even = (ball_data["b_even"] == 0 ? "" : formatMoney(_mtr(ball_data["b_even"] , Odds_type , anam), 2));

    if (val_odd < 0) {
      var a_odd_className = "FavOddsClass";
    } else {
      var a_odd_className = "UdrDogOddsClass";
    }

    if (val_even < 0) {
      var a_even_className = "FavOddsClass";
    } else {
      var a_even_className = "UdrDogOddsClass";
    }

    if(val_odd==0.00 || val_even==0.00){
      val_odd = "";
      val_even = "";
    }

    var classBlibk = "";
    if(old_data!=null){

      var old_odd = (old_data["b_odd"] == 0 ? "" : formatMoney(_mtr(old_data["b_odd"] , Odds_type , anam), 2));
      var old_even = (old_data["b_even"] == 0 ? "" : formatMoney(_mtr(old_data["b_even"] , Odds_type , anam), 2));

      if(val_odd!=old_odd || val_even!=old_even){
        classBlibk = "show_blink";
        var blink_data = {};
        blink_data["id"] = id_tr+"_goe";
        blink_data["ctime"] = 5;
        arr_blink.push(blink_data);
        
        if(busket_tang["data"]["d_"+ball_data["b_id"]]!=undefined){
          if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_odd"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_odd;
            parent.leftx.change_odd(val_odd , id_tr+"_odd" , blink_data , ball_data , 4 , busket_tang["type"]);
          }else if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_even"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_even;
            parent.leftx.change_odd(val_even , id_tr+"_even" , blink_data , ball_data , 4 , busket_tang["type"]);
          }
        }
      }
    }

    var td2 = React.createElement("td" , {className : id_tr+"_goe "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center' , 'width' : '90px'}},
                React.createElement("a" , {id :id_tr + '_odd' , className:a_odd_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_4"] + "','h','" + val_odd + "',4,'"+id_tr+"_goe','"+id_tr+"_odd')"} , val_odd));

    var td3 = React.createElement("td" , {className : id_tr+"_goe "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center' , 'width' : '90px'}},
                React.createElement("a" , {id :id_tr + '_even' , className:a_even_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_4"] + "','a','" + val_even + "',4,'"+id_tr+"_goe','"+id_tr+"_even')"} , val_even));

  }else{
    var td2 = React.createElement("td" , {style : {'white-space' : 'nowrap' , 'width' : '90px'}});
    var td3 = React.createElement("td" , {style : {'white-space' : 'nowrap' , 'width' : '90px'}});
  }

  /*###############################################################################################################*/
  if (ball_data["b_1h_odd"] != "" && ball_data["b_1h_even"] != "") {

    

    var val_1h_odd = (ball_data["b_1h_odd"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1h_odd"] , Odds_type , anam), 2));
    var val_1h_even = (ball_data["b_1h_even"] == 0 ? "" : formatMoney(_mtr(ball_data["b_1h_even"] , Odds_type , anam), 2));

    if (val_1h_odd < 0) {
      var a_odd_1h_className = "FavOddsClass";
    } else {
      var a_odd_1h_className = "UdrDogOddsClass";
    }

    if (val_1h_even < 0) {
      var a_even_1h_className = "FavOddsClass";
    } else {
      var a_even_1h_className = "UdrDogOddsClass";
    }

    if(val_1h_odd==0.00 || val_1h_even==0.00){
      val_1h_odd = "";
      val_1h_even = "";
    }

    var classBlibk = "";
    if(old_data!=null){

      var old_1h_odd = (old_data["b_1h_odd"] == 0 ? "" : formatMoney(_mtr(old_data["b_1h_odd"] , Odds_type , anam), 2));
      var old_1h_even = (old_data["b_1h_even"] == 0 ? "" : formatMoney(_mtr(old_data["b_1h_even"] , Odds_type , anam), 2));

      if(val_1h_odd!=old_1h_odd || val_1h_even!=old_1h_even){
        classBlibk = "show_blink";
        var blink_data = {};
        blink_data["id"] = id_tr+"_1h_goe";
        blink_data["ctime"] = 5;
        arr_blink.push(blink_data);
        
        if(busket_tang["data"]["d_"+ball_data["b_id"]]!=undefined){
          if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1h_odd"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1h_odd;
            parent.leftx.change_odd(val_1h_odd , id_tr+"_1h_odd" , blink_data , ball_data , 8 , busket_tang["type"]);
          }else if(busket_tang["data"]["d_"+ball_data["b_id"]][6]==id_tr+"_1h_even"){
            busket_tang["data"]["d_"+ball_data["b_id"]][3] = val_1h_even;
            parent.leftx.change_odd(val_1h_even , id_tr+"_1h_even" , blink_data , ball_data , 8 , busket_tang["type"]);
          }
        }
      }
    }

    var td4 = React.createElement("td" , {className : id_tr+"_1h_goe "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center' , 'width' : '90px'}},
                React.createElement("a" , {id :id_tr + '_1h_odd' , className:a_odd_1h_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_8"] + "','h','" + val_1h_odd + "',8,'"+id_tr+"_1h_goe','"+id_tr+"_1h_odd')"} , val_1h_odd));

    var td5 = React.createElement("td" , {className : id_tr+"_1h_goe "+classBlibk , style : {'white-space' : 'nowrap' , 'text-align' : 'center' , 'width' : '90px'}},
                React.createElement("a" , {id :id_tr + '_1h_even' , className:a_even_1h_className , href : "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_8"] + "','a','" + val_1h_even + "',8,'"+id_tr+"_1h_goe','"+id_tr+"_1h_even')"} , val_1h_even));

  }else{
    var td4 = React.createElement("td" , {style : {'white-space' : 'nowrap' , 'width' : '90px'}});
    var td5 = React.createElement("td" , {style : {'white-space' : 'nowrap' , 'width' : '90px'}});
  }

  /*###############################################################################################################*/
  if (ball_data["b_add"] == 1) {
    var td6 = React.createElement("td" , {className : 'breakLine' , style:{'text-align' : 'center'}} , 
      React.createElement("a" , { href : "javascript:openStatsInfo('" + ball_data["b_id"] + "')"} , 
        React.createElement("span" , {className:'iconOdds stats'} , null)
      )
    );
  }else{
    var td6 = React.createElement("td");
  }
  /*###############################################################################################################*/

  return [td0 , td1 , td2 , td3 , td4 , td5 , td6];
}