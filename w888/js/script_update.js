function update_team(oldD , newD ,id_tr){

  if(newD["b_name_1_th"]==""){
    newD["b_name_1_th"] = newD["b_name_1_en"];
  }
  if(newD["b_name_2_th"]==""){
    newD["b_name_2_th"] = newD["b_name_2_en"];
  }

  if(newD["b_zone"]==1){
    $("#"+id_tr+"_home").attr("class" , "FavTeamClass");
    $("#"+id_tr+"_away").attr("class" , "UdrDogTeamClass");
  }else{
    if(newD["b_big"]==1){
      $("#"+id_tr+"_home").attr("class" , "FavTeamClass");
    }else{
      $("#"+id_tr+"_home").attr("class" , "UdrDogTeamClass");
    }

    if(newD["b_big"]==2){
      $("#"+id_tr+"_away").attr("class" , "FavTeamClass");
    }else{
      $("#"+id_tr+"_away").attr("class" , "UdrDogTeamClass");
    }
  }

  var ex_card_r = newD["card_r"].split(",");

    if(parseInt(ex_card_r[0])>0){
        var card_r_h = "<div class='card_gif red'>"+ex_card_r[0]+"</div>";
    }else{
        var card_r_h = "";
    }

    if(parseInt(ex_card_r[1])>0){
        var card_r_a = "<div class='card_gif red'>"+ex_card_r[1]+"</div>";
    }else{
        var card_r_a = "";
    }

  $("#"+id_tr+"_home").html("<span>"+newD["b_name_1_th"]+"</span>"+card_r_h);
  $("#"+id_tr+"_away").html("<span>"+newD["b_name_2_th"]+"</span>"+card_r_a);

  if((newD["b_1x2_1"]>0 && newD["b_1x2_x"]>0 && newD["b_1x2_2"]>0) || (newD["b_1h_1x2_1"]>0 && newD["b_1h_1x2_x"]>0 && newD["b_1h_1x2_2"]>0)){
    $("#"+id_tr+"_draw").html(txt_draw);
    $("#"+id_tr+"_draw").attr("class" , "HdpGoalClass");
  }else{
    $("#"+id_tr+"_draw").html("");
  }
}
function update_hdp(oldD , newD ,id_tr){

  if(oldD["b_hdc"]!=newD["b_hdc"] || oldD["b_hdc_1"]!=newD["b_hdc_1"] || oldD["b_hdc_2"]!=newD["b_hdc_2"]){

    if(newD["b_hdc"]!="" && newD["b_hdc_1"]!="" && newD["b_hdc_2"]!=""){
      if(newD["b_big"]==2){
        $("#"+id_tr+"_hdc").html("<br>"+newD["b_hdc"]);
      }else{
        $("#"+id_tr+"_hdc").html(newD["b_hdc"]);
      }
    }else{
      $("#"+id_tr+"_hdc").html("");
    }


    newD["b_hdc_1"] = (newD["b_hdc_1"]==0 ? "" : formatMoney(newD["b_hdc_1"],2));
    newD["b_hdc_2"] = (newD["b_hdc_2"]==0 ? "" : formatMoney(newD["b_hdc_2"],2));

    if(newD["b_hdc_1"]<0){
      $("#"+id_tr+"_hdc_1").attr("class" , "FavOddsClass");
    }else{
      $("#"+id_tr+"_hdc_1").attr("class" , "UdrDogOddsClass");
    }
    $("#"+id_tr+"_hdc_1").html(newD["b_hdc_1"]);
    $("#"+id_tr+"_hdc_1").attr("href" , "javascript:bet("+step_mode+",'"+newD["b_id"]+"','"+newD["id_type_1"]+"','h','"+newD["b_hdc_1"]+"',1,'"+id_tr+"_ghdc','"+id_tr+"_hdc_1')");

    if(newD["b_hdc_2"]<0){
      $("#"+id_tr+"_hdc_2").attr("class" , "FavOddsClass");
    }else{
      $("#"+id_tr+"_hdc_2").attr("class" , "UdrDogOddsClass");
    }
    $("#"+id_tr+"_hdc_2").html(newD["b_hdc_2"]);
    $("#"+id_tr+"_hdc_2").attr("href" , "javascript:bet("+step_mode+",'"+newD["b_id"]+"','"+newD["id_type_1"]+"','a','"+newD["b_hdc_2"]+"',1,'"+id_tr+"_ghdc','"+id_tr+"_hdc_2')");

    if(old_arr_data.length>0){
      $("."+id_tr+"_ghdc").addClass("show_blink");
      var blink_data = {};
      blink_data["id"] = id_tr+"_ghdc";
      blink_data["ctime"] = 5;
      arr_blink.push(blink_data);

      if(busket_tang["data"]["d_"+newD["b_id"]]!=undefined){
        if(busket_tang["data"]["d_"+newD["b_id"]][6]==id_tr+"_hdc_1"){
          busket_tang["data"]["d_"+newD["b_id"]][3] = newD["b_hdc_1"];
          parent.leftx.change_odd(newD["b_hdc_1"] , id_tr+"_hdc_1" , blink_data , newD , 1 , busket_tang["type"]);
        }else if(busket_tang["data"]["d_"+newD["b_id"]][6]==id_tr+"_hdc_2"){
          busket_tang["data"]["d_"+newD["b_id"]][3] = newD["b_hdc_2"];
          parent.leftx.change_odd(newD["b_hdc_2"] , id_tr+"_hdc_2" , blink_data , newD , 1 , busket_tang["type"]);
        } 
      }
    }

  }

  if(oldD["b_1h_hdc"]!=newD["b_1h_hdc"] || oldD["b_1h_hdc_1"]!=newD["b_1h_hdc_1"] || oldD["b_1h_hdc_2"]!=newD["b_1h_hdc_2"]){

    if(newD["b_1h_hdc"]!="" && newD["b_1h_hdc_1"]!="" && newD["b_1h_hdc_2"]!=""){
      if(newD["b_big"]==2){
        $("#"+id_tr+"_1h_hdc").html("<br>"+newD["b_1h_hdc"]);
      }else{
        $("#"+id_tr+"_1h_hdc").html(newD["b_1h_hdc"]);
      }
    }else{
      $("#"+id_tr+"_1h_hdc").html("");
    }


    newD["b_1h_hdc_1"] = (newD["b_1h_hdc_1"]==0 ? "" : formatMoney(newD["b_1h_hdc_1"],2));
    newD["b_1h_hdc_2"] = (newD["b_1h_hdc_2"]==0 ? "" : formatMoney(newD["b_1h_hdc_2"],2));

    if(newD["b_1h_hdc_1"]<0){
      $("#"+id_tr+"_1h_hdc_1").attr("class" , "FavOddsClass");
    }else{
      $("#"+id_tr+"_1h_hdc_1").attr("class" , "UdrDogOddsClass");
    }
    $("#"+id_tr+"_1h_hdc_1").html(newD["b_1h_hdc_1"]);
    $("#"+id_tr+"_1h_hdc_1").attr("href" , "javascript:bet("+step_mode+",'"+newD["b_id"]+"','"+newD["id_type_5"]+"','h','"+newD["b_1h_hdc_1"]+"',5,'"+id_tr+"_1h_ghdc','"+id_tr+"_1h_hdc_1')");

    if(newD["b_1h_hdc_2"]<0){
      $("#"+id_tr+"_1h_hdc_2").attr("class" , "FavOddsClass");
    }else{
      $("#"+id_tr+"_1h_hdc_2").attr("class" , "UdrDogOddsClass");
    }
    $("#"+id_tr+"_1h_hdc_2").html(newD["b_1h_hdc_2"]);
    $("#"+id_tr+"_1h_hdc_2").attr("href" , "javascript:bet("+step_mode+",'"+newD["b_id"]+"','"+newD["id_type_5"]+"','a','"+newD["b_1h_hdc_2"]+"',5,'"+id_tr+"_1h_ghdc','"+id_tr+"_1h_hdc_2')");

    if(old_arr_data.length>0){
      $("."+id_tr+"_1h_ghdc").addClass("show_blink");
      var blink_data = {};
      blink_data["id"] = id_tr+"_1h_ghdc";
      blink_data["ctime"] = 5;
      arr_blink.push(blink_data);

      if(busket_tang["data"]["d_"+newD["b_id"]]!=undefined){
        if(busket_tang["data"]["d_"+newD["b_id"]][6]==id_tr+"_1h_hdc_1"){
          busket_tang["data"]["d_"+newD["b_id"]][3] = newD["b_1h_hdc_1"];
          parent.leftx.change_odd(newD["b_1h_hdc_1"] , id_tr+"_1h_hdc_1" , blink_data , newD , 5 , busket_tang["type"]);
        }else if(busket_tang["data"]["d_"+newD["b_id"]][6]==id_tr+"_1h_hdc_2"){
          busket_tang["data"]["d_"+newD["b_id"]][3] = newD["b_1h_hdc_2"];
          parent.leftx.change_odd(newD["b_1h_hdc_2"] , id_tr+"_1h_hdc_2" , blink_data , newD , 5 , busket_tang["type"]);
        } 
      }
    }
  }

}
function update_goal(oldD , newD ,id_tr){

  if(oldD["b_goal"]!=newD["b_goal"] || oldD["b_goal_1"]!=newD["b_goal_1"] || oldD["b_goal_2"]!=newD["b_goal_2"]){
    if(newD["b_goal"]!="" && newD["b_goal_1"]!="" && newD["b_goal_2"]!=""){
      if(dp_mode=="3"){
        $("#"+id_tr+"_goal").html(newD["b_goal"]+"<br>ต่ำ");
      }else{
        $("#"+id_tr+"_goal").html(newD["b_goal"]);
      }
      
    }else{
      $("#"+id_tr+"_goal").html("");
    }


    newD["b_goal_1"] = (newD["b_goal_1"]==0 ? "" : formatMoney(newD["b_goal_1"],2));
    newD["b_goal_2"] = (newD["b_goal_2"]==0 ? "" : formatMoney(newD["b_goal_2"],2));

    if(newD["b_goal_1"]<0){
      $("#"+id_tr+"_goal_1").attr("class" , "FavOddsClass");
    }else{
      $("#"+id_tr+"_goal_1").attr("class" , "UdrDogOddsClass");
    }
    $("#"+id_tr+"_goal_1").html(newD["b_goal_1"]);
    $("#"+id_tr+"_goal_1").attr("href" , "javascript:bet("+step_mode+",'"+newD["b_id"]+"','"+newD["id_type_2"]+"','h','"+newD["b_goal_1"]+"',2,'"+id_tr+"_ggoal','"+id_tr+"_goal_1')");

    if(newD["b_goal_2"]<0){
      $("#"+id_tr+"_goal_2").attr("class" , "FavOddsClass");
    }else{
      $("#"+id_tr+"_goal_2").attr("class" , "UdrDogOddsClass");
    }
    $("#"+id_tr+"_goal_2").html(newD["b_goal_2"]);
    $("#"+id_tr+"_goal_2").attr("href" , "javascript:bet("+step_mode+",'"+newD["b_id"]+"','"+newD["id_type_2"]+"','a','"+newD["b_goal_2"]+"',2,'"+id_tr+"_ggoal','"+id_tr+"_goal_2')");

    if(old_arr_data.length>0){
      $("."+id_tr+"_ggoal").addClass("show_blink");
      var blink_data = {};
      blink_data["id"] = id_tr+"_ggoal";
      blink_data["ctime"] = 5;
      arr_blink.push(blink_data);
      
      if(busket_tang["data"]["d_"+newD["b_id"]]!=undefined){
        if(busket_tang["data"]["d_"+newD["b_id"]][6]==id_tr+"_goal_1"){
          busket_tang["data"]["d_"+newD["b_id"]][3] = newD["b_goal_1"];
          parent.leftx.change_odd(newD["b_goal_1"] , id_tr+"_goal_1" , blink_data , newD , 2 , busket_tang["type"]);
        }else if(busket_tang["data"]["d_"+newD["b_id"]][6]==id_tr+"_goal_2"){
          busket_tang["data"]["d_"+newD["b_id"]][3] = newD["b_goal_2"];
          parent.leftx.change_odd(newD["b_goal_2"] , id_tr+"_goal_2" , blink_data , newD , 2 , busket_tang["type"]);
        } 
      }
    }
  }

  if(oldD["b_1h_goal"]!=newD["b_1h_goal"] || oldD["b_1h_goal_1"]!=newD["b_1h_goal_1"] || oldD["b_1h_goal_2"]!=newD["b_1h_goal_2"]){

    if(newD["b_1h_goal"]!="" && newD["b_1h_goal_1"]!="" && newD["b_1h_goal_2"]!=""){
      
      if(dp_mode=="3"){
        $("#"+id_tr+"_1h_goal").html(newD["b_1h_goal"]+"<br>ต่ำ");
      }else{
        $("#"+id_tr+"_1h_goal").html(newD["b_1h_goal"]);
      }
    }else{
      $("#"+id_tr+"_1h_goal").html("");
    }

    newD["b_1h_goal_1"] = (newD["b_1h_goal_1"]==0 ? "" : formatMoney(newD["b_1h_goal_1"],2));
    newD["b_1h_goal_2"] = (newD["b_1h_goal_2"]==0 ? "" : formatMoney(newD["b_1h_goal_2"],2));

    if(newD["b_1h_goal_1"]<0){
      $("#"+id_tr+"_1h_goal_1").attr("class" , "FavOddsClass");
    }else{
      $("#"+id_tr+"_1h_goal_1").attr("class" , "UdrDogOddsClass");
    }
    $("#"+id_tr+"_1h_goal_1").html(newD["b_1h_goal_1"]);
    $("#"+id_tr+"_1h_goal_1").attr("href" , "javascript:bet("+step_mode+",'"+newD["b_id"]+"','"+newD["id_type_6"]+"','h','"+newD["b_1h_goal_1"]+"',6,'"+id_tr+"_1h_ggoal','"+id_tr+"_1h_goal_1')");

    if(newD["b_1h_goal_2"]<0){
      $("#"+id_tr+"_1h_goal_2").attr("class" , "FavOddsClass");
    }else{
      $("#"+id_tr+"_1h_goal_2").attr("class" , "UdrDogOddsClass");
    }
    $("#"+id_tr+"_1h_goal_2").html(newD["b_1h_goal_2"]);
    $("#"+id_tr+"_1h_goal_2").attr("href" , "javascript:bet("+step_mode+",'"+newD["b_id"]+"','"+newD["id_type_6"]+"','a','"+newD["b_1h_goal_2"]+"',6,'"+id_tr+"_1h_ggoal','"+id_tr+"_1h_goal_2')");

    if(old_arr_data.length>0){
      $("."+id_tr+"_1h_ggoal").addClass("show_blink");
      var blink_data = {};
      blink_data["id"] = id_tr+"_1h_ggoal";
      blink_data["ctime"] = 5;
      arr_blink.push(blink_data);
      
      if(busket_tang["data"]["d_"+newD["b_id"]]!=undefined){
        if(busket_tang["data"]["d_"+newD["b_id"]][6]==id_tr+"_1h_goal_1"){
          busket_tang["data"]["d_"+newD["b_id"]][3] = newD["b_1h_goal_1"];
          parent.leftx.change_odd(newD["b_1h_goal_1"] , id_tr+"_1h_goal_1" , blink_data , newD , 6 , busket_tang["type"]);
        }else if(busket_tang["data"]["d_"+newD["b_id"]][6]==id_tr+"_1h_goal_2"){
          busket_tang["data"]["d_"+newD["b_id"]][3] = newD["b_1h_goal_2"];
          parent.leftx.change_odd(newD["b_1h_goal_2"] , id_tr+"_1h_goal_2" , blink_data , newD , 6 , busket_tang["type"]);
        } 
      }
    }
  }

}
function update_1x2(oldD , newD ,id_tr){

  if(oldD["b_1x2_1"]!=newD["b_1x2_1"] || oldD["b_1x2_x"]!=newD["b_1x2_x"] || oldD["b_1x2_2"]!=newD["b_1x2_2"]){

    newD["b_1x2_1"] = (newD["b_1x2_1"]==0 ? "" : formatMoney(newD["b_1x2_1"],2));
    newD["b_1x2_2"] = (newD["b_1x2_2"]==0 ? "" : formatMoney(newD["b_1x2_2"],2));
    newD["b_1x2_x"] = (newD["b_1x2_x"]==0 ? "" : formatMoney(newD["b_1x2_x"],2));

    if(newD["b_1x2_1"]<0){
      $("#"+id_tr+"_1x2_1").attr("class" , "FavOddsClass");
    }else{
      $("#"+id_tr+"_1x2_1").attr("class" , "UdrDogOddsClass");
    }
    $("#"+id_tr+"_1x2_1").html(newD["b_1x2_1"]);
    $("#"+id_tr+"_1x2_1").attr("href" , "javascript:bet("+step_mode+",'"+newD["b_id"]+"','"+newD["id_type_3"]+"','1','"+newD["b_1x2_1"]+"',3,'"+id_tr+"_g1x2','"+id_tr+"_1x2_1')");

    if(newD["b_1x2_2"]<0){
      $("#"+id_tr+"_1x2_2").attr("class" , "FavOddsClass");
    }else{
      $("#"+id_tr+"_1x2_2").attr("class" , "UdrDogOddsClass");
    }
    $("#"+id_tr+"_1x2_2").html(newD["b_1x2_2"]);
    $("#"+id_tr+"_1x2_2").attr("href" , "javascript:bet("+step_mode+",'"+newD["b_id"]+"','"+newD["id_type_3"]+"','2','"+newD["b_1x2_2"]+"',3,'"+id_tr+"_g1x2','"+id_tr+"_1x2_2')");

    if(newD["b_1x2_x"]<0){
      $("#"+id_tr+"_1x2_x").attr("class" , "FavOddsClass");
    }else{
      $("#"+id_tr+"_1x2_x").attr("class" , "UdrDogOddsClass");
    }
    $("#"+id_tr+"_1x2_x").html(newD["b_1x2_x"]);
    $("#"+id_tr+"_1x2_x").attr("href" , "javascript:bet("+step_mode+",'"+newD["b_id"]+"','"+newD["id_type_3"]+"','X','"+newD["b_1x2_x"]+"',3,'"+id_tr+"_g1x2','"+id_tr+"_1x2_x')");

    if(old_arr_data.length>0){
      $("."+id_tr+"_g1x2").addClass("show_blink");
      var blink_data = {};
      blink_data["id"] = id_tr+"_g1x2";
      blink_data["ctime"] = 5;
      arr_blink.push(blink_data);
      
      if(busket_tang["data"]["d_"+newD["b_id"]]!=undefined){
        if(busket_tang["data"]["d_"+newD["b_id"]][6]==id_tr+"_1x2_1"){
          busket_tang["data"]["d_"+newD["b_id"]][3] = newD["b_1x2_1"];
          parent.leftx.change_odd(newD["b_1x2_1"] , id_tr+"_1x2_1" , blink_data , newD , 3 , busket_tang["type"]);
        }else if(busket_tang["data"]["d_"+newD["b_id"]][6]==id_tr+"_1x2_2"){
          busket_tang["data"]["d_"+newD["b_id"]][3] = newD["b_1x2_2"];
          parent.leftx.change_odd(newD["b_1x2_2"] , id_tr+"_1x2_2" , blink_data , newD , 3 , busket_tang["type"]);
        }else if(busket_tang["data"]["d_"+newD["b_id"]][6]==id_tr+"_1x2_x"){
          busket_tang["data"]["d_"+newD["b_id"]][3] = newD["b_1x2_x"];
          parent.leftx.change_odd(newD["b_1x2_x"] , id_tr+"_1x2_x" , blink_data , newD , 3 , busket_tang["type"]);
        } 
      }
    }
  }

  if(oldD["b_1h_1x2_1"]!=newD["b_1h_1x2_1"] || oldD["b_1h_1x2_x"]!=newD["b_1h_1x2_x"] || oldD["b_1h_1x2_2"]!=newD["b_1h_1x2_2"]){

    newD["b_1h_1x2_1"] = (newD["b_1h_1x2_1"]==0 ? "" : formatMoney(newD["b_1h_1x2_1"],2));
    newD["b_1h_1x2_2"] = (newD["b_1h_1x2_2"]==0 ? "" : formatMoney(newD["b_1h_1x2_2"],2));
    newD["b_1h_1x2_x"] = (newD["b_1h_1x2_x"]==0 ? "" : formatMoney(newD["b_1h_1x2_x"],2));

    if(newD["b_1h_1x2_1"]<0){
      $("#"+id_tr+"_1h_1x2_1").attr("class" , "FavOddsClass");
    }else{
      $("#"+id_tr+"_1h_1x2_1").attr("class" , "UdrDogOddsClass");
    }
    $("#"+id_tr+"_1h_1x2_1").html(newD["b_1h_1x2_1"]);
    $("#"+id_tr+"_1h_1x2_1").attr("href" , "javascript:bet("+step_mode+",'"+newD["b_id"]+"','"+newD["id_type_7"]+"','1','"+newD["b_1h_1x2_1"]+"',7,'"+id_tr+"_1h_g1x2','"+id_tr+"_1h_1x2_1')");

    if(newD["b_1h_1x2_2"]<0){
      $("#"+id_tr+"_1h_1x2_2").attr("class" , "FavOddsClass");
    }else{
      $("#"+id_tr+"_1h_1x2_2").attr("class" , "UdrDogOddsClass");
    }
    $("#"+id_tr+"_1h_1x2_2").html(newD["b_1h_1x2_2"]);
    $("#"+id_tr+"_1h_1x2_2").attr("href" , "javascript:bet("+step_mode+",'"+newD["b_id"]+"','"+newD["id_type_7"]+"','2','"+newD["b_1h_1x2_2"]+"',7,'"+id_tr+"_1h_g1x2','"+id_tr+"_1h_1x2_2')");

    if(newD["b_1h_1x2_x"]<0){
      $("#"+id_tr+"_1h_1x2_x").attr("class" , "FavOddsClass");
    }else{
      $("#"+id_tr+"_1h_1x2_x").attr("class" , "UdrDogOddsClass");
    }
    $("#"+id_tr+"_1h_1x2_x").html(newD["b_1h_1x2_x"]);
    $("#"+id_tr+"_1h_1x2_x").attr("href" , "javascript:bet("+step_mode+",'"+newD["b_id"]+"','"+newD["id_type_7"]+"','X','"+newD["b_1h_1x2_x"]+"',7,'"+id_tr+"_1h_g1x2','"+id_tr+"_1h_1x2_x')");

    if(old_arr_data.length>0){
      $("."+id_tr+"_1h_g1x2").addClass("show_blink");
      var blink_data = {};
      blink_data["id"] = id_tr+"_1h_g1x2";
      blink_data["ctime"] = 5;
      arr_blink.push(blink_data);
      
      if(busket_tang["data"]["d_"+newD["b_id"]]!=undefined){
        if(busket_tang["data"]["d_"+newD["b_id"]][6]==id_tr+"_1h_1x2_1"){
          busket_tang["data"]["d_"+newD["b_id"]][3] = newD["b_1h_1x2_1"];
          parent.leftx.change_odd(newD["b_1h_1x2_1"] , id_tr+"_1h_1x2_1" , blink_data , newD , 7 , busket_tang["type"]);
        }else if(busket_tang["data"]["d_"+newD["b_id"]][6]==id_tr+"_1h_1x2_2"){
          busket_tang["data"]["d_"+newD["b_id"]][3] = newD["b_1h_1x2_2"];
          parent.leftx.change_odd(newD["b_1h_1x2_2"] , id_tr+"_1h_1x2_2" , blink_data , newD , 7 , busket_tang["type"]);
        }else if(busket_tang["data"]["d_"+newD["b_id"]][6]==id_tr+"_1h_1x2_x"){
          busket_tang["data"]["d_"+newD["b_id"]][3] = newD["b_1h_1x2_x"];
          parent.leftx.change_odd(newD["b_1h_1x2_x"] , id_tr+"_1h_1x2_x" , blink_data , newD , 7 , busket_tang["type"]);
        } 
      }
    }
  }

}
function update_oe(oldD , newD ,id_tr){

  if(oldD["b_odd"]!=newD["b_odd"] || oldD["b_even"]!=newD["b_even"]){

    newD["b_odd"] = (newD["b_odd"]==0 ? "" : formatMoney(newD["b_odd"],2));
    newD["b_even"] = (newD["b_even"]==0 ? "" : formatMoney(newD["b_even"],2));

    if(newD["b_odd"]<0){
      $("#"+id_tr+"_odd").attr("class" , "FavOddsClass");
    }else{
      $("#"+id_tr+"_odd").attr("class" , "UdrDogOddsClass");
    }
    $("#"+id_tr+"_odd").html(newD["b_odd"]);
    $("#"+id_tr+"_odd").attr("href" , "javascript:bet("+step_mode+",'"+newD["b_id"]+"','"+newD["id_type_4"]+"','h','"+newD["b_odd"]+"',4,'"+id_tr+"_goe','"+id_tr+"_odd')");

    if(newD["b_even"]<0){
      $("#"+id_tr+"_even").attr("class" , "FavOddsClass");
    }else{
      $("#"+id_tr+"_even").attr("class" , "UdrDogOddsClass");
    }
    $("#"+id_tr+"_even").html(newD["b_even"]);
    $("#"+id_tr+"_even").attr("href" , "javascript:bet("+step_mode+",'"+newD["b_id"]+"','"+newD["id_type_4"]+"','a','"+newD["b_even"]+"',4,'"+id_tr+"_goe','"+id_tr+"_even')");


    if(old_arr_data.length>0){
      $("."+id_tr+"_goe").addClass("show_blink");
      var blink_data = {};
      blink_data["id"] = id_tr+"_goe";
      blink_data["ctime"] = 5;
      arr_blink.push(blink_data);
      
      if(busket_tang["data"]["d_"+newD["b_id"]]!=undefined){
        if(busket_tang["data"]["d_"+newD["b_id"]][6]==id_tr+"_odd"){
          busket_tang["data"]["d_"+newD["b_id"]][3] = newD["b_odd"];
          parent.leftx.change_odd(newD["b_odd"] , id_tr+"_odd" , blink_data , newD , 4 , busket_tang["type"]);
        }else if(busket_tang["data"]["d_"+newD["b_id"]][6]==id_tr+"_even"){
          busket_tang["data"]["d_"+newD["b_id"]][3] = newD["b_even"];
          parent.leftx.change_odd(newD["b_even"] , id_tr+"_even" , blink_data , newD , 4 , busket_tang["type"]);
        } 
      }
    }
  }

  if(oldD["b_1h_odd"]!=newD["b_1h_odd"] || oldD["b_1h_even"]!=newD["b_1h_even"]){

    newD["b_1h_odd"] = (newD["b_1h_odd"]==0 ? "" : formatMoney(newD["b_1h_odd"],2));
    newD["b_1h_even"] = (newD["b_1h_even"]==0 ? "" : formatMoney(newD["b_1h_even"],2));

    if(newD["b_1h_odd"]<0){
      $("#"+id_tr+"_1h_odd").attr("class" , "FavOddsClass");
    }else{
      $("#"+id_tr+"_1h_odd").attr("class" , "UdrDogOddsClass");
    }
    $("#"+id_tr+"_1h_odd").html(newD["b_1h_odd"]);
    $("#"+id_tr+"_1h_odd").attr("href" , "javascript:bet("+step_mode+",'"+newD["b_id"]+"','"+newD["id_type_8"]+"','h','"+newD["b_1h_odd"]+"',8,'"+id_tr+"_1h_goe','"+id_tr+"_1h_odd')");

    if(newD["b_1h_even"]<0){
      $("#"+id_tr+"_1h_even").attr("class" , "FavOddsClass");
    }else{
      $("#"+id_tr+"_1h_even").attr("class" , "UdrDogOddsClass");
    }
    $("#"+id_tr+"_1h_even").html(newD["b_1h_even"]);
    $("#"+id_tr+"_1h_even").attr("href" , "javascript:bet("+step_mode+",'"+newD["b_id"]+"','"+newD["id_type_8"]+"','a','"+newD["b_1h_even"]+"',8,'"+id_tr+"_1h_goe','"+id_tr+"_1h_even')");


    if(old_arr_data.length>0){
      $("."+id_tr+"_1h_goe").addClass("show_blink");
      var blink_data = {};
      blink_data["id"] = id_tr+"_1h_goe";
      blink_data["ctime"] = 5;
      arr_blink.push(blink_data);
      
      if(busket_tang["data"]["d_"+newD["b_id"]]!=undefined){
        if(busket_tang["data"]["d_"+newD["b_id"]][6]==id_tr+"_1h_odd"){
          busket_tang["data"]["d_"+newD["b_id"]][3] = newD["b_1h_odd"];
          parent.leftx.change_odd(newD["b_1h_odd"] , id_tr+"_1h_odd" , blink_data , newD , 8 , busket_tang["type"]);
        }else if(busket_tang["data"]["d_"+newD["b_id"]][6]==id_tr+"_1h_even"){
          busket_tang["data"]["d_"+newD["b_id"]][3] = newD["b_1h_even"];
          parent.leftx.change_odd(newD["b_1h_even"] , id_tr+"_1h_even" , blink_data , newD , 8 , busket_tang["type"]);
        } 
      }
    }
  }

}