function set_table_2rows(clone_ball, ball_data) {

    var td_ball = clone_ball.querySelectorAll("td");
    var id_tr = 'id_' + ball_data["b_id"] + '_' + ball_data["b_add"];

    if (ball_data["b_live"] != 0) {
        if (ball_data["b_live"] == 1 || ball_data["b_live"] == 3) {
            td_ball[0].innerHTML = "<font color=\"red\">" + ball_data["b_run_score_full"] + "</font> <br>" + ball_data["b_live_string"] + "'";
        } else {
            td_ball[0].innerHTML = "<font color=\"red\">" + ball_data["b_run_score_full"] + "</font> <br><span style='color: #106cbb; font-weight: bold;'>" + ball_data["b_live_string"] + "</span>";
        }
    } else {
        var date_data_1 = new Date(ball_data["b_date_play"] * 1000);
        var hours_data_1 = "0" + date_data_1.getHours();
        var minutes_data_1 = "0" + date_data_1.getMinutes();
        var formattedTime = hours_data_1.substr(-2) + ':' + minutes_data_1.substr(-2);
        td_ball[0].innerHTML = "<font color=\"red\">LIVE</font><br>" + formattedTime;
    }
    td_ball[0].setAttribute('id', id_tr + '_ts');


    var div_team = td_ball[1].querySelectorAll("div");
    div_team[0].setAttribute('id', id_tr + '_home');
    div_team[1].setAttribute('id', id_tr + '_away');
    div_team[2].setAttribute('id', id_tr + '_draw');

    if (ball_data["b_zone"] == 1) {
        div_team[0].className = "FavTeamClass";
        div_team[1].className = "UdrDogTeamClass";
    }else{
        if (ball_data["b_big"] == 1) {
            div_team[0].className = "FavTeamClass";
        } else {
            div_team[0].className = "UdrDogTeamClass";
        }

        if (ball_data["b_big"] == 2) {
            div_team[1].className = "FavTeamClass";
        } else {
            div_team[1].className = "UdrDogTeamClass";
        }
    }

    var ex_card_r = ball_data["card_r"].split(",");

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

    div_team[0].innerHTML = "<span>" + ball_data["b_name_1_th"] + "</span>"+card_r_h;
    div_team[1].innerHTML = "<span>" + ball_data["b_name_2_th"] + "</span>"+card_r_a;
    if ((ball_data["b_1x2_1"] > 0 && ball_data["b_1x2_x"] > 0 && ball_data["b_1x2_2"] > 0) || (ball_data["b_1h_1x2_1"] > 0 && ball_data["b_1h_1x2_x"] > 0 && ball_data["b_1h_1x2_2"] > 0)) {
        div_team[2].innerHTML = txt_draw;
        div_team[2].className = "HdpGoalClass";
    } else {
        div_team[2].innerHTML = "";
    }

    var div_hdc = td_ball[3].querySelectorAll("div");
    var a_hdc = div_hdc[1].querySelectorAll("a");
    if (ball_data["b_hdc"] != "" && ball_data["b_hdc_1"] != "" && ball_data["b_hdc_2"] != "") {

        if (ball_data["b_big"] == 2) {
            div_hdc[0].innerHTML = "<br>" + ball_data["b_hdc"];
        } else {
            div_hdc[0].innerHTML = ball_data["b_hdc"];
        }

        if (ball_data["b_hdc_1"] < 0) {
            a_hdc[0].className = "FavOddsClass";
        } else {
            a_hdc[0].className = "UdrDogOddsClass";
        }

        a_hdc[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_1"] + "','h','" + (ball_data["b_hdc_1"] == 0 ? "" : formatMoney(ball_data["b_hdc_1"], 2)) + "',1,'"+id_tr+"_ghdc','"+id_tr+"_hdc_1')");
        a_hdc[0].innerHTML = (ball_data["b_hdc_1"] == 0 ? "" : formatMoney(ball_data["b_hdc_1"], 2));

        if (ball_data["b_hdc_2"] < 0) {
            a_hdc[1].className = "FavOddsClass";
        } else {
            a_hdc[1].className = "UdrDogOddsClass";
        }

        a_hdc[1].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_1"] + "','a','" + (ball_data["b_hdc_2"] == 0 ? "" : formatMoney(ball_data["b_hdc_2"], 2)) + "',1,'"+id_tr+"_ghdc','"+id_tr+"_hdc_2')");
        a_hdc[1].innerHTML = (ball_data["b_hdc_2"] == 0 ? "" : formatMoney(ball_data["b_hdc_2"], 2));
    }
    div_hdc[0].setAttribute('id', id_tr + '_hdc');
    //div_hdc[1].setAttribute('id', id_tr+'_ghdc');
    div_hdc[1].className += id_tr + '_ghdc';
    a_hdc[0].setAttribute('id', id_tr + '_hdc_1');
    a_hdc[1].setAttribute('id', id_tr + '_hdc_2');

    var div_goal = td_ball[4].querySelectorAll("div");
    var a_goal = div_goal[1].querySelectorAll("a");
    if (ball_data["b_goal"] != "" && ball_data["b_goal_1"] != "" && ball_data["b_goal_2"] != "") {

        div_goal[0].innerHTML = ball_data["b_goal"] + "<br>ต่ำ";

        if (ball_data["b_goal_1"] < 0) {
            a_goal[0].className = "FavOddsClass";
        } else {
            a_goal[0].className = "UdrDogOddsClass";
        }

        a_goal[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_2"] + "','h','" + (ball_data["b_goal_1"] == 0 ? "" : formatMoney(ball_data["b_goal_1"], 2)) + "',2,'"+id_tr+"_goal','"+id_tr+"_goal_1')");
        a_goal[0].innerHTML = (ball_data["b_goal_1"] == 0 ? "" : formatMoney(ball_data["b_goal_1"], 2));

        if (ball_data["b_goal_2"] < 0) {
            a_goal[1].className = "FavOddsClass";
        } else {
            a_goal[1].className = "UdrDogOddsClass";
        }

        a_goal[1].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_2"] + "','a','" + (ball_data["b_goal_2"] == 0 ? "" : formatMoney(ball_data["b_goal_2"], 2)) + "',2,'"+id_tr+"_goal','"+id_tr+"_goal_2')");
        a_goal[1].innerHTML = (ball_data["b_goal_2"] == 0 ? "" : formatMoney(ball_data["b_goal_2"], 2));
    }
    div_goal[0].setAttribute('id', id_tr + '_goal');
    //div_goal[1].setAttribute('id', id_tr+'_ggoal');
    div_goal[1].className += id_tr + '_ggoal';
    a_goal[0].setAttribute('id', id_tr + '_goal_1');
    a_goal[1].setAttribute('id', id_tr + '_goal_2');

    var div_1x2 = td_ball[5].querySelectorAll("div");
    var a_1x2 = div_1x2[0].querySelectorAll("a");
    if ((ball_data["b_1x2_1"] > 0 && ball_data["b_1x2_x"] > 0 && ball_data["b_1x2_2"] > 0) || (ball_data["b_1x2_1"] != 0 && ball_data["b_1x2_2"] != 0)) {

        if (ball_data["b_1x2_1"] < 0) {
            a_1x2[0].className = "FavOddsClass";
        } else {
            a_1x2[0].className = "UdrDogOddsClass";
        }

        a_1x2[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_3"] + "','1','" + (ball_data["b_1x2_1"] == 0 ? "" : formatMoney(ball_data["b_1x2_1"], 2)) + "',3,'"+id_tr+"_g1x2','"+id_tr+"_1x2_1')");
        a_1x2[0].innerHTML = (ball_data["b_1x2_1"] == 0 ? "" : formatMoney(ball_data["b_1x2_1"], 2));

        if (ball_data["b_1x2_2"] < 0) {
            a_1x2[1].className = "FavOddsClass";
        } else {
            a_1x2[1].className = "UdrDogOddsClass";
        }

        a_1x2[1].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_3"] + "','2','" + (ball_data["b_1x2_2"] == 0 ? "" : formatMoney(ball_data["b_1x2_2"], 2)) + "',3,'"+id_tr+"_g1x2','"+id_tr+"_1x2_2')");
        a_1x2[1].innerHTML = (ball_data["b_1x2_2"] == 0 ? "" : formatMoney(ball_data["b_1x2_2"], 2));

        if (ball_data["b_1x2_x"] < 0) {
            a_1x2[2].className = "FavOddsClass";
        } else {
            a_1x2[2].className = "UdrDogOddsClass";
        }

        a_1x2[2].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_3"] + "','X','" + (ball_data["b_1x2_x"] == 0 ? "" : formatMoney(ball_data["b_1x2_x"], 2)) + "',3,'"+id_tr+"_g1x2','"+id_tr+"_1x2_x')");
        a_1x2[2].innerHTML = (ball_data["b_1x2_x"] == 0 ? "" : formatMoney(ball_data["b_1x2_x"], 2));
    }
    //div_1x2[0].setAttribute('id', id_tr+'_g1x2');
    div_1x2[0].className += id_tr + '_g1x2';
    a_1x2[0].setAttribute('id', id_tr + '_1x2_1');
    a_1x2[1].setAttribute('id', id_tr + '_1x2_2');
    a_1x2[2].setAttribute('id', id_tr + '_1x2_x');

    var div_1h_hdc = td_ball[6].querySelectorAll("div");
    var a_1h_hdc = div_1h_hdc[1].querySelectorAll("a");
    if (ball_data["b_1h_hdc"] != "" && ball_data["b_1h_hdc_1"] != "" && ball_data["b_1h_hdc_2"] != "") {

        if (ball_data["b_big"] == 2) {
            div_1h_hdc[0].innerHTML = "<br>" + ball_data["b_1h_hdc"];
        } else {
            div_1h_hdc[0].innerHTML = ball_data["b_1h_hdc"];
        }

        if (ball_data["b_1h_hdc_1"] < 0) {
            a_1h_hdc[0].className = "FavOddsClass";
        } else {
            a_1h_hdc[0].className = "UdrDogOddsClass";
        }

        a_1h_hdc[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_5"] + "','h','" + (ball_data["b_1h_hdc_1"] == 0 ? "" : formatMoney(ball_data["b_1h_hdc_1"], 2)) + "',5,'"+id_tr+"_1h_hdc','"+id_tr+"_1h_hdc_1')");
        a_1h_hdc[0].innerHTML = (ball_data["b_1h_hdc_1"] == 0 ? "" : formatMoney(ball_data["b_1h_hdc_1"], 2));

        if (ball_data["b_1h_hdc_2"] < 0) {
            a_1h_hdc[1].className = "FavOddsClass";
        } else {
            a_1h_hdc[1].className = "UdrDogOddsClass";
        }

        a_1h_hdc[1].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_5"] + "','a','" + (ball_data["b_1h_hdc_2"] == 0 ? "" : formatMoney(ball_data["b_1h_hdc_2"], 2)) + "',5,'"+id_tr+"_1h_hdc','"+id_tr+"_1h_hdc_2')");
        a_1h_hdc[1].innerHTML = (ball_data["b_1h_hdc_2"] == 0 ? "" : formatMoney(ball_data["b_1h_hdc_2"], 2));
    }
    div_1h_hdc[0].setAttribute('id', id_tr + '_1h_hdc');
    //div_1h_hdc[0].setAttribute('id', id_tr+'_1h_ghdc');
    div_1h_hdc[1].className += id_tr + '_1h_ghdc';
    a_1h_hdc[0].setAttribute('id', id_tr + '_1h_hdc_1');
    a_1h_hdc[1].setAttribute('id', id_tr + '_1h_hdc_2');


    var div_1h_goal = td_ball[7].querySelectorAll("div");
    var a_1h_goal = div_1h_goal[1].querySelectorAll("a");
    if (ball_data["b_1h_goal"] != "" && ball_data["b_1h_goal_1"] != "" && ball_data["b_1h_goal_2"] != "") {


        div_1h_goal[0].innerHTML = ball_data["b_1h_goal"] + "<br>ต่ำ";

        if (ball_data["b_1h_goal_1"] < 0) {
            a_1h_goal[0].className = "FavOddsClass";
        } else {
            a_1h_goal[0].className = "UdrDogOddsClass";
        }

        a_1h_goal[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_6"] + "','h','" + (ball_data["b_1h_goal_1"] == 0 ? "" : formatMoney(ball_data["b_1h_goal_1"], 2)) + "',6,'"+id_tr+"_1h_ggoal','"+id_tr+"_1h_goal_1')");
        a_1h_goal[0].innerHTML = (ball_data["b_1h_goal_1"] == 0 ? "" : formatMoney(ball_data["b_1h_goal_1"], 2));

        if (ball_data["b_1h_goal_2"] < 0) {
            a_1h_goal[1].className = "FavOddsClass";
        } else {
            a_1h_goal[1].className = "UdrDogOddsClass";
        }

        a_1h_goal[1].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_6"] + "','a','" + (ball_data["b_1h_goal_2"] == 0 ? "" : formatMoney(ball_data["b_1h_goal_2"], 2)) + "',6,'"+id_tr+"_1h_ggoal','"+id_tr+"_1h_goal_2')");
        a_1h_goal[1].innerHTML = (ball_data["b_1h_goal_2"] == 0 ? "" : formatMoney(ball_data["b_1h_goal_2"], 2));
    }
    div_1h_goal[0].setAttribute('id', id_tr + '_1h_goal');
    //div_1h_goal[0].setAttribute('id', id_tr+'_1h_ggoal');
    div_1h_goal[1].className += id_tr + '_1h_ggoal';
    a_1h_goal[0].setAttribute('id', id_tr + '_1h_goal_1');
    a_1h_goal[1].setAttribute('id', id_tr + '_1h_goal_2');

    var div_1h_1x2 = td_ball[8].querySelectorAll("div");
    var a_1h_1x2 = div_1h_1x2[0].querySelectorAll("a");
    if ((ball_data["b_1h_1x2_1"] > 0 && ball_data["b_1h_1x2_x"] > 0 && ball_data["b_1h_1x2_2"] > 0) || (ball_data["b_1h_1x2_1"] != 0 && ball_data["b_1h_1x2_2"] != 0)) {


        if (ball_data["b_1h_1x2_1"] < 0) {
            a_1h_1x2[0].className = "FavOddsClass";
        } else {
            a_1h_1x2[0].className = "UdrDogOddsClass";
        }

        a_1h_1x2[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_7"] + "','1','" + (ball_data["b_1h_1x2_1"] == 0 ? "" : formatMoney(ball_data["b_1h_1x2_1"], 2)) + "',7,'"+id_tr+"_1h_g1x2','"+id_tr+"_1h_1x2_1')");
        a_1h_1x2[0].innerHTML = (ball_data["b_1h_1x2_1"] == 0 ? "" : formatMoney(ball_data["b_1h_1x2_1"], 2));

        if (ball_data["b_1h_1x2_2"] < 0) {
            a_1h_1x2[1].className = "FavOddsClass";
        } else {
            a_1h_1x2[1].className = "UdrDogOddsClass";
        }

        a_1h_1x2[1].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_7"] + "','2','" + (ball_data["b_1h_1x2_2"] == 0 ? "" : formatMoney(ball_data["b_1h_1x2_2"], 2)) + "',7,'"+id_tr+"_1h_g1x2','"+id_tr+"_1h_1x2_2')");
        a_1h_1x2[1].innerHTML = (ball_data["b_1h_1x2_2"] == 0 ? "" : formatMoney(ball_data["b_1h_1x2_2"], 2));

        if (ball_data["b_1h_1x2_x"] < 0) {
            a_1h_1x2[2].className = "FavOddsClass";
        } else {
            a_1h_1x2[2].className = "UdrDogOddsClass";
        }

        a_1h_1x2[2].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_7"] + "','X','" + (ball_data["b_1h_1x2_x"] == 0 ? "" : formatMoney(ball_data["b_1h_1x2_x"], 2)) + "',7,'"+id_tr+"_1h_g1x2','"+id_tr+"_1h_1x2_x')");
        a_1h_1x2[2].innerHTML = (ball_data["b_1h_1x2_x"] == 0 ? "" : formatMoney(ball_data["b_1h_1x2_x"], 2));
    }
    //div_1h_1x2[0].setAttribute('id', id_tr+'_1h_g1x2');
    div_1h_1x2[0].className += id_tr + '_1h_g1x2';
    a_1h_1x2[0].setAttribute('id', id_tr + '_1h_1x2_1');
    a_1h_1x2[1].setAttribute('id', id_tr + '_1h_1x2_2');
    a_1h_1x2[2].setAttribute('id', id_tr + '_1h_1x2_x');
    if (ball_data["b_add"] == 1) {
        td_ball[9].innerHTML = "<a href=\"javascript:openStatsInfo(&quot;" + ball_data["b_id"] + "&quot;);\" title=\"Statistic Information\"><span class=\"iconOdds stats\"></span></a>";
    }
}

function set_table_1rows(clone_ball, ball_data) {

    var td_ball = clone_ball.querySelectorAll("td");
    var id_tr = 'id_' + ball_data["b_id"] + '_' + ball_data["b_add"];

    if (ball_data["b_live"] != 0) {
        if (ball_data["b_live"] == 1 || ball_data["b_live"] == 3) {
            td_ball[0].innerHTML = "<font color=\"red\">" + ball_data["b_run_score_full"] + "</font> <br>" + ball_data["b_live_string"] + "'";
        } else {
            td_ball[0].innerHTML = "<font color=\"red\">" + ball_data["b_run_score_full"] + "</font> <br><span style='color: #106cbb; font-weight: bold;'>" + ball_data["b_live_string"] + "</span>";
        }
    } else {
        var date_data_1 = new Date(ball_data["b_date_play"] * 1000);
        var hours_data_1 = "0" + date_data_1.getHours();
        var minutes_data_1 = "0" + date_data_1.getMinutes();
        var formattedTime = hours_data_1.substr(-2) + ':' + minutes_data_1.substr(-2);
        td_ball[0].innerHTML = "<font color=\"red\">LIVE</font><br>" + formattedTime;
    }
    td_ball[0].setAttribute('id', id_tr + '_ts');



    var div_list = td_ball[1].querySelectorAll("div");

    var div_team = div_list[0].querySelectorAll("div");

    div_team[0].setAttribute('id', id_tr + '_home');
    div_team[1].setAttribute('id', id_tr + '_away');

    if (ball_data["b_zone"] == 1) {
        div_team[0].className = "FavTeamClass";
        div_team[1].className = "UdrDogTeamClass";
    }else{
        if (ball_data["b_big"] == 1) {
            div_team[0].className = "FavTeamClass";
        } else {
            div_team[0].className = "UdrDogTeamClass";
        }

        if (ball_data["b_big"] == 2) {
            div_team[1].className = "FavTeamClass";
        } else {
            div_team[1].className = "UdrDogTeamClass";
        }
    }

    var ex_card_r = ball_data["card_r"].split(",");

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

    div_team[0].innerHTML = "<span>" + ball_data["b_name_1_th"] + "</span>"+card_r_h;
    div_team[1].innerHTML = "<span>" + ball_data["b_name_2_th"] + "</span>"+card_r_a;

    td_ball[2].setAttribute('id', id_tr + '_hdc');
    td_ball[3].className += id_tr + '_ghdc';
    td_ball[4].className += id_tr + '_ghdc';

    var a_hdc_1 = td_ball[3].querySelectorAll("a");
    var a_hdc_2 = td_ball[4].querySelectorAll("a");

    a_hdc_1[0].setAttribute('id', id_tr + '_hdc_1');
    a_hdc_2[0].setAttribute('id', id_tr + '_hdc_2');
    if (ball_data["b_hdc"] != "" && ball_data["b_hdc_1"] != "" && ball_data["b_hdc_2"] != "") {
        td_ball[2].innerHTML = ball_data["b_hdc"];


        if (ball_data["b_hdc_1"] < 0) {
            a_hdc_1[0].className = "FavOddsClass";
        } else {
            a_hdc_1[0].className = "UdrDogOddsClass";
        }
        a_hdc_1[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_1"] + "','h','" + (ball_data["b_hdc_1"] == 0 ? "" : formatMoney(ball_data["b_hdc_1"], 2)) + "',1,'"+id_tr+"_ghdc','"+id_tr+"_hdc_1')");
        a_hdc_1[0].innerHTML = formatMoney(ball_data["b_hdc_1"], 2);


        if (ball_data["b_hdc_2"] < 0) {
            a_hdc_2[0].className = "FavOddsClass";
        } else {
            a_hdc_2[0].className = "UdrDogOddsClass";
        }
        a_hdc_2[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_1"] + "','a','" + (ball_data["b_hdc_2"] == 0 ? "" : formatMoney(ball_data["b_hdc_2"], 2)) + "',1,'"+id_tr+"_ghdc','"+id_tr+"_hdc_2')");
        a_hdc_2[0].innerHTML = formatMoney(ball_data["b_hdc_2"], 2);
    }

    td_ball[5].setAttribute('id', id_tr + '_goal');
    td_ball[6].className += id_tr + '_ggoal';
    td_ball[7].className += id_tr + '_ggoal';

    var a_goal_1 = td_ball[6].querySelectorAll("a");
    var a_goal_2 = td_ball[7].querySelectorAll("a");
    a_goal_1[0].setAttribute('id', id_tr + '_goal_1');
    a_goal_2[0].setAttribute('id', id_tr + '_goal_2');
    if (ball_data["b_goal"] != "" && ball_data["b_goal_1"] != "" && ball_data["b_goal_2"] != "") {

        td_ball[5].innerHTML = ball_data["b_goal"];


        if (ball_data["b_goal_1"] < 0) {
            a_goal_1[0].className = "FavOddsClass";
        } else {
            a_goal_1[0].className = "UdrDogOddsClass";
        }
        a_goal_1[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_2"] + "','h','" + (ball_data["b_goal_1"] == 0 ? "" : formatMoney(ball_data["b_goal_1"], 2)) + "',2,'"+id_tr+"_ggoal','"+id_tr+"_goal_1')");
        a_goal_1[0].innerHTML = formatMoney(ball_data["b_goal_1"], 2);


        if (ball_data["b_goal_2"] < 0) {
            a_goal_2[0].className = "FavOddsClass";
        } else {
            a_goal_2[0].className = "UdrDogOddsClass";
        }
        a_goal_2[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_2"] + "','a','" + (ball_data["b_goal_2"] == 0 ? "" : formatMoney(ball_data["b_goal_2"], 2)) + "',2,'"+id_tr+"_ggoal','"+id_tr+"_goal_2')");
        a_goal_2[0].innerHTML = formatMoney(ball_data["b_goal_2"], 2);
    }

    td_ball[8].setAttribute('id', id_tr + '_1h_hdc');
    td_ball[9].className += id_tr + '_1h_ghdc';
    td_ball[10].className += id_tr + '_1h_ghdc';

    var a_1h_hdc_1 = td_ball[9].querySelectorAll("a");
    var a_1h_hdc_2 = td_ball[10].querySelectorAll("a");
    a_1h_hdc_1[0].setAttribute('id', id_tr + '_1h_hdc_1');
    a_1h_hdc_2[0].setAttribute('id', id_tr + '_1h_hdc_2');
    if (ball_data["b_1h_hdc"] != "" && ball_data["b_1h_hdc_1"] != "" && ball_data["b_1h_hdc_2"] != "") {
        td_ball[8].innerHTML = ball_data["b_1h_hdc"];


        if (ball_data["b_1h_hdc_1"] < 0) {
            a_1h_hdc_1[0].className = "FavOddsClass";
        } else {
            a_1h_hdc_1[0].className = "UdrDogOddsClass";
        }
        a_1h_hdc_1[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_5"] + "','h','" + (ball_data["b_1h_hdc_1"] == 0 ? "" : formatMoney(ball_data["b_1h_hdc_1"], 2)) + "',5,'"+id_tr+"_1h_ghdc','"+id_tr+"_1h_hdc_1')");
        a_1h_hdc_1[0].innerHTML = formatMoney(ball_data["b_1h_hdc_1"], 2);


        if (ball_data["b_1h_hdc_2"] < 0) {
            a_1h_hdc_2[0].className = "FavOddsClass";
        } else {
            a_1h_hdc_2[0].className = "UdrDogOddsClass";
        }
        a_1h_hdc_2[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_5"] + "','a','" + (ball_data["b_1h_hdc_2"] == 0 ? "" : formatMoney(ball_data["b_1h_hdc_2"], 2)) + "',5,'"+id_tr+"_1h_ghdc','"+id_tr+"_1h_hdc_2')");
        a_1h_hdc_2[0].innerHTML = formatMoney(ball_data["b_1h_hdc_2"], 2);
    }

    td_ball[11].setAttribute('id', id_tr + '_1h_goal');
    td_ball[12].className += id_tr + '_1h_ggoal';
    td_ball[13].className += id_tr + '_1h_ggoal';

    var a_1h_goal_1 = td_ball[12].querySelectorAll("a");
    var a_1h_goal_2 = td_ball[13].querySelectorAll("a");
    a_1h_goal_1[0].setAttribute('id', id_tr + '_1h_goal_1');
    a_1h_goal_2[0].setAttribute('id', id_tr + '_1h_goal_2');
    if (ball_data["b_1h_goal"] != "" && ball_data["b_1h_goal_1"] != "" && ball_data["b_1h_goal_2"] != "") {

        td_ball[11].innerHTML = ball_data["b_1h_goal"];


        if (ball_data["b_1h_goal_1"] < 0) {
            a_1h_goal_1[0].className = "FavOddsClass";
        } else {
            a_1h_goal_1[0].className = "UdrDogOddsClass";
        }
        a_1h_goal_1[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_6"] + "','h','" + (ball_data["b_1h_goal_1"] == 0 ? "" : formatMoney(ball_data["b_1h_goal_1"], 2)) + "',6,'"+id_tr+"_1h_ggoal','"+id_tr+"_1h_goal_1')");
        a_1h_goal_1[0].innerHTML = formatMoney(ball_data["b_1h_goal_1"], 2);


        if (ball_data["b_1h_goal_2"] < 0) {
            a_1h_goal_2[0].className = "FavOddsClass";
        } else {
            a_1h_goal_2[0].className = "UdrDogOddsClass";
        }
        a_1h_goal_2[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_6"] + "','a','" + (ball_data["b_1h_goal_2"] == 0 ? "" : formatMoney(ball_data["b_1h_goal_2"], 2)) + "',6,'"+id_tr+"_1h_ggoal','"+id_tr+"_1h_goal_2')");
        a_1h_goal_2[0].innerHTML = formatMoney(ball_data["b_1h_goal_2"], 2);
    }

    if (ball_data["b_add"] == 1) {
        td_ball[14].innerHTML = "<a href=\"javascript:openStatsInfo(&quot;" + ball_data["b_id"] + "&quot;);\" title=\"Statistic Information\"><span class=\"iconOdds stats\"></span></a>";
    }

}

function set_table_1Frows(clone_ball, ball_data) {
    var td_ball = clone_ball.querySelectorAll("td");
    var id_tr = 'id_' + ball_data["b_id"] + '_' + ball_data["b_add"];

    if (ball_data["b_live"] != 0) {
        if (ball_data["b_live"] == 1 || ball_data["b_live"] == 3) {
            td_ball[0].innerHTML = "<font color=\"red\">" + ball_data["b_run_score_full"] + "</font> <br>" + ball_data["b_live_string"] + "'";
        } else {
            td_ball[0].innerHTML = "<font color=\"red\">" + ball_data["b_run_score_full"] + "</font> <br><span style='color: #106cbb; font-weight: bold;'>" + ball_data["b_live_string"] + "</span>";
        }
    } else {
        var date_data_1 = new Date(ball_data["b_date_play"] * 1000);
        var hours_data_1 = "0" + date_data_1.getHours();
        var minutes_data_1 = "0" + date_data_1.getMinutes();
        var formattedTime = hours_data_1.substr(-2) + ':' + minutes_data_1.substr(-2);
        td_ball[0].innerHTML = "<font color=\"red\">LIVE</font><br>" + formattedTime;
    }
    td_ball[0].setAttribute('id', id_tr + '_ts');



    var div_list = td_ball[1].querySelectorAll("div");

    var div_team = div_list[0].querySelectorAll("div");

    div_team[0].setAttribute('id', id_tr + '_home');
    div_team[1].setAttribute('id', id_tr + '_away');

    if (ball_data["b_zone"] == 1) {
        div_team[0].className = "FavTeamClass";
        div_team[1].className = "UdrDogTeamClass";
    }else{
        if (ball_data["b_big"] == 1) {
            div_team[0].className = "FavTeamClass";
        } else {
            div_team[0].className = "UdrDogTeamClass";
        }

        if (ball_data["b_big"] == 2) {
            div_team[1].className = "FavTeamClass";
        } else {
            div_team[1].className = "UdrDogTeamClass";
        }
    }

    var ex_card_r = ball_data["card_r"].split(",");

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

    div_team[0].innerHTML = "<span>" + ball_data["b_name_1_th"] + "</span>"+card_r_h;
    div_team[1].innerHTML = "<span>" + ball_data["b_name_2_th"] + "</span>"+card_r_a;

    td_ball[2].setAttribute('id', id_tr + '_hdc');
    td_ball[3].className += id_tr + '_ghdc';
    td_ball[4].className += id_tr + '_ghdc';

    var a_hdc_1 = td_ball[3].querySelectorAll("a");
    var a_hdc_2 = td_ball[4].querySelectorAll("a");

    a_hdc_1[0].setAttribute('id', id_tr + '_hdc_1');
    a_hdc_2[0].setAttribute('id', id_tr + '_hdc_2');
    if (ball_data["b_hdc"] != "" && ball_data["b_hdc_1"] != "" && ball_data["b_hdc_2"] != "") {
        td_ball[2].innerHTML = ball_data["b_hdc"];


        if (ball_data["b_hdc_1"] < 0) {
            a_hdc_1[0].className = "FavOddsClass";
        } else {
            a_hdc_1[0].className = "UdrDogOddsClass";
        }
        a_hdc_1[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_1"] + "','h','" + (ball_data["b_hdc_1"] == 0 ? "" : formatMoney(ball_data["b_hdc_1"], 2)) + "',1,'"+id_tr+"_ghdc','"+id_tr+"_hdc_1')");
        a_hdc_1[0].innerHTML = formatMoney(ball_data["b_hdc_1"], 2);


        if (ball_data["b_hdc_2"] < 0) {
            a_hdc_2[0].className = "FavOddsClass";
        } else {
            a_hdc_2[0].className = "UdrDogOddsClass";
        }
        a_hdc_2[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_1"] + "','a','" + (ball_data["b_hdc_2"] == 0 ? "" : formatMoney(ball_data["b_hdc_2"], 2)) + "',1,'"+id_tr+"_ghdc','"+id_tr+"_hdc_2')");
        a_hdc_2[0].innerHTML = formatMoney(ball_data["b_hdc_2"], 2);
    }

    td_ball[5].setAttribute('id', id_tr + '_goal');
    td_ball[6].className += id_tr + '_ggoal';
    td_ball[7].className += id_tr + '_ggoal';

    var a_goal_1 = td_ball[6].querySelectorAll("a");
    var a_goal_2 = td_ball[7].querySelectorAll("a");
    a_goal_1[0].setAttribute('id', id_tr + '_goal_1');
    a_goal_2[0].setAttribute('id', id_tr + '_goal_2');
    if (ball_data["b_goal"] != "" && ball_data["b_goal_1"] != "" && ball_data["b_goal_2"] != "") {

        td_ball[5].innerHTML = ball_data["b_goal"];


        if (ball_data["b_goal_1"] < 0) {
            a_goal_1[0].className = "FavOddsClass";
        } else {
            a_goal_1[0].className = "UdrDogOddsClass";
        }
        a_goal_1[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_2"] + "','h','" + (ball_data["b_goal_1"] == 0 ? "" : formatMoney(ball_data["b_goal_1"], 2)) + "',2,'"+id_tr+"_ggoal','"+id_tr+"_goal_1')");
        a_goal_1[0].innerHTML = formatMoney(ball_data["b_goal_1"], 2);


        if (ball_data["b_goal_2"] < 0) {
            a_goal_2[0].className = "FavOddsClass";
        } else {
            a_goal_2[0].className = "UdrDogOddsClass";
        }
        a_goal_2[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_2"] + "','a','" + (ball_data["b_goal_2"] == 0 ? "" : formatMoney(ball_data["b_goal_2"], 2)) + "',2,'"+id_tr+"_ggoal','"+id_tr+"_goal_2')");
        a_goal_2[0].innerHTML = formatMoney(ball_data["b_goal_2"], 2);
    }

    if (ball_data["b_add"] == 1) {
        td_ball[14].innerHTML = "<a href=\"javascript:openStatsInfo(&quot;" + ball_data["b_id"] + "&quot;);\" title=\"Statistic Information\"><span class=\"iconOdds stats\"></span></a>";
    }

}

function set_table_1Hrows(clone_ball, ball_data) {
    var td_ball = clone_ball.querySelectorAll("td");
    var id_tr = 'id_' + ball_data["b_id"] + '_' + ball_data["b_add"];

    if (ball_data["b_live"] != 0) {
        if (ball_data["b_live"] == 1 || ball_data["b_live"] == 3) {
            td_ball[0].innerHTML = "<font color=\"red\">" + ball_data["b_run_score_full"] + "</font> <br>" + ball_data["b_live_string"] + "'";
        } else {
            td_ball[0].innerHTML = "<font color=\"red\">" + ball_data["b_run_score_full"] + "</font> <br><span style='color: #106cbb; font-weight: bold;'>" + ball_data["b_live_string"] + "</span>";
        }
    } else {
        var date_data_1 = new Date(ball_data["b_date_play"] * 1000);
        var hours_data_1 = "0" + date_data_1.getHours();
        var minutes_data_1 = "0" + date_data_1.getMinutes();
        var formattedTime = hours_data_1.substr(-2) + ':' + minutes_data_1.substr(-2);
        td_ball[0].innerHTML = "<font color=\"red\">LIVE</font><br>" + formattedTime;
    }
    td_ball[0].setAttribute('id', id_tr + '_ts');



    var div_list = td_ball[1].querySelectorAll("div");

    var div_team = div_list[0].querySelectorAll("div");

    div_team[0].setAttribute('id', id_tr + '_home');
    div_team[1].setAttribute('id', id_tr + '_away');

    if (ball_data["b_zone"] == 1) {
        div_team[0].className = "FavTeamClass";
        div_team[1].className = "UdrDogTeamClass";
    }else{
        if (ball_data["b_big"] == 1) {
            div_team[0].className = "FavTeamClass";
        } else {
            div_team[0].className = "UdrDogTeamClass";
        }

        if (ball_data["b_big"] == 2) {
            div_team[1].className = "FavTeamClass";
        } else {
            div_team[1].className = "UdrDogTeamClass";
        }
    }

    var ex_card_r = ball_data["card_r"].split(",");

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

    div_team[0].innerHTML = "<span>" + ball_data["b_name_1_th"] + "</span>"+card_r_h;
    div_team[1].innerHTML = "<span>" + ball_data["b_name_2_th"] + "</span>"+card_r_a;

    td_ball[8].setAttribute('id', id_tr + '_1h_hdc');
    td_ball[9].className += id_tr + '_1h_ghdc';
    td_ball[10].className += id_tr + '_1h_ghdc';

    var a_1h_hdc_1 = td_ball[9].querySelectorAll("a");
    var a_1h_hdc_2 = td_ball[10].querySelectorAll("a");
    a_1h_hdc_1[0].setAttribute('id', id_tr + '_1h_hdc_1');
    a_1h_hdc_2[0].setAttribute('id', id_tr + '_1h_hdc_2');
    if (ball_data["b_1h_hdc"] != "" && ball_data["b_1h_hdc_1"] != "" && ball_data["b_1h_hdc_2"] != "") {
        td_ball[8].innerHTML = ball_data["b_1h_hdc"];


        if (ball_data["b_1h_hdc_1"] < 0) {
            a_1h_hdc_1[0].className = "FavOddsClass";
        } else {
            a_1h_hdc_1[0].className = "UdrDogOddsClass";
        }
        a_1h_hdc_1[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_5"] + "','h','" + (ball_data["b_1h_hdc_1"] == 0 ? "" : formatMoney(ball_data["b_1h_hdc_1"], 2)) + "',5,'"+id_tr+"_1h_ghdc','"+id_tr+"_1h_hdc_1')");
        a_1h_hdc_1[0].innerHTML = formatMoney(ball_data["b_1h_hdc_1"], 2);


        if (ball_data["b_1h_hdc_2"] < 0) {
            a_1h_hdc_2[0].className = "FavOddsClass";
        } else {
            a_1h_hdc_2[0].className = "UdrDogOddsClass";
        }
        a_1h_hdc_2[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_5"] + "','a','" + (ball_data["b_1h_hdc_2"] == 0 ? "" : formatMoney(ball_data["b_1h_hdc_2"], 2)) + "',5,'"+id_tr+"_1h_ghdc','"+id_tr+"_1h_hdc_2')");
        a_1h_hdc_2[0].innerHTML = formatMoney(ball_data["b_1h_hdc_2"], 2);
    }

    td_ball[11].setAttribute('id', id_tr + '_1h_goal');
    td_ball[12].className += id_tr + '_1h_ggoal';
    td_ball[13].className += id_tr + '_1h_ggoal';

    var a_1h_goal_1 = td_ball[12].querySelectorAll("a");
    var a_1h_goal_2 = td_ball[13].querySelectorAll("a");
    a_1h_goal_1[0].setAttribute('id', id_tr + '_1h_goal_1');
    a_1h_goal_2[0].setAttribute('id', id_tr + '_1h_goal_2');
    if (ball_data["b_1h_goal"] != "" && ball_data["b_1h_goal_1"] != "" && ball_data["b_1h_goal_2"] != "") {

        td_ball[11].innerHTML = ball_data["b_1h_goal"];


        if (ball_data["b_1h_goal_1"] < 0) {
            a_1h_goal_1[0].className = "FavOddsClass";
        } else {
            a_1h_goal_1[0].className = "UdrDogOddsClass";
        }
        a_1h_goal_1[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_6"] + "','h','" + (ball_data["b_1h_goal_1"] == 0 ? "" : formatMoney(ball_data["b_1h_goal_1"], 2)) + "',6,'"+id_tr+"_1h_ggoal','"+id_tr+"_1h_goal_1')");
        a_1h_goal_1[0].innerHTML = formatMoney(ball_data["b_1h_goal_1"], 2);


        if (ball_data["b_1h_goal_2"] < 0) {
            a_1h_goal_2[0].className = "FavOddsClass";
        } else {
            a_1h_goal_2[0].className = "UdrDogOddsClass";
        }
        a_1h_goal_2[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_6"] + "','a','" + (ball_data["b_1h_goal_2"] == 0 ? "" : formatMoney(ball_data["b_1h_goal_2"], 2)) + "',6,'"+id_tr+"_1h_ggoal','"+id_tr+"_1h_goal_2')");
        a_1h_goal_2[0].innerHTML = formatMoney(ball_data["b_1h_goal_2"], 2);
    }

    if (ball_data["b_add"] == 1) {
        td_ball[14].innerHTML = "<a href=\"javascript:openStatsInfo(&quot;" + ball_data["b_id"] + "&quot;);\" title=\"Statistic Information\"><span class=\"iconOdds stats\"></span></a>";
    }
}

function set_table_1x2(clone_ball, ball_data) {

    var td_ball = clone_ball.querySelectorAll("td");
    var id_tr = 'id_' + ball_data["b_id"] + '_' + ball_data["b_add"];

    if (ball_data["b_live"] != 0) {
        if (ball_data["b_live"] == 1 || ball_data["b_live"] == 3) {
            td_ball[0].innerHTML = "<font color=\"red\">" + ball_data["b_run_score_full"] + "</font> <br>" + ball_data["b_live_string"] + "'";
        } else {
            td_ball[0].innerHTML = "<font color=\"red\">" + ball_data["b_run_score_full"] + "</font> <br><span style='color: #106cbb; font-weight: bold;'>" + ball_data["b_live_string"] + "</span>";
        }
    } else {
        var date_data_1 = new Date(ball_data["b_date_play"] * 1000);
        var hours_data_1 = "0" + date_data_1.getHours();
        var minutes_data_1 = "0" + date_data_1.getMinutes();
        var formattedTime = hours_data_1.substr(-2) + ':' + minutes_data_1.substr(-2);
        td_ball[0].innerHTML = "<font color=\"red\">LIVE</font><br>" + formattedTime;
    }
    td_ball[0].setAttribute('id', id_tr + '_ts');



    var div_list = td_ball[1].querySelectorAll("div");

    var div_team = div_list[0].querySelectorAll("div");

    div_team[0].setAttribute('id', id_tr + '_home');
    div_team[1].setAttribute('id', id_tr + '_away');

    if (ball_data["b_zone"] == 1) {
        div_team[0].className = "FavTeamClass";
        div_team[1].className = "UdrDogTeamClass";
    }else{
        if (ball_data["b_big"] == 1) {
            div_team[0].className = "FavTeamClass";
        } else {
            div_team[0].className = "UdrDogTeamClass";
        }

        if (ball_data["b_big"] == 2) {
            div_team[1].className = "FavTeamClass";
        } else {
            div_team[1].className = "UdrDogTeamClass";
        }
    }

    var ex_card_r = ball_data["card_r"].split(",");

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

    div_team[0].innerHTML = "<span>" + ball_data["b_name_1_th"] + "</span>"+card_r_h;
    div_team[1].innerHTML = "<span>" + ball_data["b_name_2_th"] + "</span>"+card_r_a;

    td_ball[2].className += id_tr + '_g1x2';
    td_ball[3].className += id_tr + '_g1x2';
    td_ball[4].className += id_tr + '_g1x2';

    var a_1x2_1 = td_ball[2].querySelectorAll("a");
    var a_1x2_2 = td_ball[3].querySelectorAll("a");
    var a_1x2_3 = td_ball[4].querySelectorAll("a");

    a_1x2_1[0].setAttribute('id', id_tr + '_1x2_1');
    a_1x2_2[0].setAttribute('id', id_tr + '_1x2_x');
    a_1x2_3[0].setAttribute('id', id_tr + '_1x2_2');
    if ((ball_data["b_1x2_1"] > 0 && ball_data["b_1x2_x"] > 0 && ball_data["b_1x2_2"] > 0) || (ball_data["b_1x2_1"] != 0 && ball_data["b_1x2_2"] != 0)) {

        if (ball_data["b_1x2_1"] < 0) {
            a_1x2_1[0].className = "FavOddsClass";
        } else {
            a_1x2_1[0].className = "UdrDogOddsClass";
        }
        a_1x2_1[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_3"] + "','1','" + (ball_data["b_1x2_1"] == 0 ? "" : formatMoney(ball_data["b_1x2_1"], 2)) + "',3,'"+id_tr+"_1x2_1','"+id_tr+"_1x2_1')");
        a_1x2_1[0].innerHTML = formatMoney(ball_data["b_1x2_1"], 2);


        if (ball_data["b_1x2_x"] < 0) {
            a_1x2_2[0].className = "FavOddsClass";
        } else {
            a_1x2_2[0].className = "UdrDogOddsClass";
        }
        a_1x2_2[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_3"] + "','X','" + (ball_data["b_1x2_x"] == 0 ? "" : formatMoney(ball_data["b_1x2_x"], 2)) + "',3,'"+id_tr+"_1x2_x','"+id_tr+"_1x2_x')");
        if(ball_data["b_1x2_x"]==0){
          a_1x2_2[0].innerHTML = "";
        }else{
          a_1x2_2[0].innerHTML = formatMoney(ball_data["b_1x2_x"], 2);
        }

        if (ball_data["b_1x2_2"] < 0) {
            a_1x2_3[0].className = "FavOddsClass";
        } else {
            a_1x2_3[0].className = "UdrDogOddsClass";
        }
        a_1x2_3[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_3"] + "','2','" + (ball_data["b_1x2_2"] == 0 ? "" : formatMoney(ball_data["b_1x2_2"], 2)) + "',3,'"+id_tr+"_1x2_2','"+id_tr+"_1x2_2')");
        a_1x2_3[0].innerHTML = formatMoney(ball_data["b_1x2_2"], 2);

    }

    td_ball[5].className += id_tr + '_1h_g1x2';
    td_ball[6].className += id_tr + '_1h_g1x2';
    td_ball[7].className += id_tr + '_1h_g1x2';

    var a_1h_1x2_1 = td_ball[5].querySelectorAll("a");
    var a_1h_1x2_2 = td_ball[6].querySelectorAll("a");
    var a_1h_1x2_3 = td_ball[7].querySelectorAll("a");

    a_1h_1x2_1[0].setAttribute('id', id_tr + '_1h_1x2_1');
    a_1h_1x2_2[0].setAttribute('id', id_tr + '_1h_1x2_x');
    a_1h_1x2_3[0].setAttribute('id', id_tr + '_1h_1x2_2');
    if ((ball_data["b_1h_1x2_1"] > 0 && ball_data["b_1h_1x2_x"] > 0 && ball_data["b_1h_1x2_2"] > 0) || (ball_data["b_1h_1x2_1"] != 0 && ball_data["b_1h_1x2_2"] != 0)) {

        if (ball_data["b_1h_1x2_1"] < 0) {
            a_1h_1x2_1[0].className = "FavOddsClass";
        } else {
            a_1h_1x2_1[0].className = "UdrDogOddsClass";
        }
        a_1h_1x2_1[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_7"] + "','1','" + (ball_data["b_1h_1x2_1"] == 0 ? "" : formatMoney(ball_data["b_1h_1x2_1"], 2)) + "',7,'"+id_tr+"_1h_1x2_1','"+id_tr+"_1h_1x2_1')");
        a_1h_1x2_1[0].innerHTML = formatMoney(ball_data["b_1h_1x2_1"], 2);


        if (ball_data["b_1h_1x2_x"] < 0) {
            a_1h_1x2_2[0].className = "FavOddsClass";
        } else {
            a_1h_1x2_2[0].className = "UdrDogOddsClass";
        }
        a_1h_1x2_2[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_7"] + "','X','" + (ball_data["b_1h_1x2_x"] == 0 ? "" : formatMoney(ball_data["b_1h_1x2_x"], 2)) + "',7,'"+id_tr+"_1h_1x2_x','"+id_tr+"_1h_1x2_x')");
        if(ball_data["b_1h_1x2_x"]==0){
          a_1h_1x2_2[0].innerHTML = "";
        }else{
          a_1h_1x2_2[0].innerHTML = formatMoney(ball_data["b_1h_1x2_x"], 2);
        }

        if (ball_data["b_1h_1x2_2"] < 0) {
            a_1h_1x2_3[0].className = "FavOddsClass";
        } else {
            a_1h_1x2_3[0].className = "UdrDogOddsClass";
        }
        a_1h_1x2_3[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_7"] + "','2','" + (ball_data["b_1h_1x2_2"] == 0 ? "" : formatMoney(ball_data["b_1h_1x2_2"], 2)) + "',7,'"+id_tr+"_1h_1x2_2','"+id_tr+"_1h_1x2_2')");
        a_1h_1x2_3[0].innerHTML = formatMoney(ball_data["b_1h_1x2_2"], 2);

    }


    if (ball_data["b_add"] == 1) {
        td_ball[8].innerHTML = "<a href=\"javascript:openStatsInfo(&quot;" + ball_data["b_id"] + "&quot;);\" title=\"Statistic Information\"><span class=\"iconOdds stats\"></span></a>";
    }

}

function set_table_oe(clone_ball, ball_data) {

    var td_ball = clone_ball.querySelectorAll("td");
    var id_tr = 'id_' + ball_data["b_id"] + '_' + ball_data["b_add"];

    if (ball_data["b_live"] != 0) {
        if (ball_data["b_live"] == 1 || ball_data["b_live"] == 3) {
            td_ball[0].innerHTML = "<font color=\"red\">" + ball_data["b_run_score_full"] + "</font> <br>" + ball_data["b_live_string"] + "'";
        } else {
            td_ball[0].innerHTML = "<font color=\"red\">" + ball_data["b_run_score_full"] + "</font> <br><span style='color: #106cbb; font-weight: bold;'>" + ball_data["b_live_string"] + "</span>";
        }
    } else {
        var date_data_1 = new Date(ball_data["b_date_play"] * 1000);
        var hours_data_1 = "0" + date_data_1.getHours();
        var minutes_data_1 = "0" + date_data_1.getMinutes();
        var formattedTime = hours_data_1.substr(-2) + ':' + minutes_data_1.substr(-2);
        td_ball[0].innerHTML = "<font color=\"red\">LIVE</font><br>" + formattedTime;
    }
    td_ball[0].setAttribute('id', id_tr + '_ts');



    var div_list = td_ball[1].querySelectorAll("div");

    var div_team = div_list[0].querySelectorAll("div");

    div_team[0].setAttribute('id', id_tr + '_home');
    div_team[1].setAttribute('id', id_tr + '_away');

    if (ball_data["b_zone"] == 1) {
        div_team[0].className = "FavTeamClass";
        div_team[1].className = "UdrDogTeamClass";
    }else{
        if (ball_data["b_big"] == 1) {
            div_team[0].className = "FavTeamClass";
        } else {
            div_team[0].className = "UdrDogTeamClass";
        }

        if (ball_data["b_big"] == 2) {
            div_team[1].className = "FavTeamClass";
        } else {
            div_team[1].className = "UdrDogTeamClass";
        }
    }

    var ex_card_r = ball_data["card_r"].split(",");

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

    div_team[0].innerHTML = "<span>" + ball_data["b_name_1_th"] + "</span>"+card_r_h;
    div_team[1].innerHTML = "<span>" + ball_data["b_name_2_th"] + "</span>"+card_r_a;

    td_ball[2].className += id_tr + '_goe';
    td_ball[3].className += id_tr + '_goe';

    var a_odd = td_ball[2].querySelectorAll("a");
    var a_even = td_ball[3].querySelectorAll("a");

    a_odd[0].setAttribute('id', id_tr + '_odd');
    a_even[0].setAttribute('id', id_tr + '_even');
    if (ball_data["b_odd"] != "" && ball_data["b_even"] != "") {

        if (ball_data["b_odd"] < 0) {
            a_odd[0].className = "FavOddsClass";
        } else {
            a_odd[0].className = "UdrDogOddsClass";
        }
        a_odd[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_4"] + "','h','" + (ball_data["b_odd"] == 0 ? "" : formatMoney(ball_data["b_odd"], 2)) + "',4,'"+id_tr+"_goe','"+id_tr+"_odd')");
        a_odd[0].innerHTML = formatMoney(ball_data["b_odd"], 2);


        if (ball_data["b_even"] < 0) {
            a_even[0].className = "FavOddsClass";
        } else {
            a_even[0].className = "UdrDogOddsClass";
        }
        a_even[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_4"] + "','a','" + (ball_data["b_even"] == 0 ? "" : formatMoney(ball_data["b_even"], 2)) + "',4,'"+id_tr+"_goe','"+id_tr+"_even')");
        a_even[0].innerHTML = formatMoney(ball_data["b_even"], 2);
    }

    td_ball[4].className += id_tr + '_1h_goe';
    td_ball[5].className += id_tr + '_1h_goe';

    var a_1h_odd = td_ball[4].querySelectorAll("a");
    var a_1h_even = td_ball[5].querySelectorAll("a");

    a_1h_odd[0].setAttribute('id', id_tr + '_1h_odd');
    a_1h_even[0].setAttribute('id', id_tr + '_1h_even');
    if (ball_data["b_1h_odd"] != "" && ball_data["b_1h_even"] != "") {

        if (ball_data["b_1h_odd"] < 0) {
            a_1h_odd[0].className = "FavOddsClass";
        } else {
            a_1h_odd[0].className = "UdrDogOddsClass";
        }
        a_1h_odd[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_8"] + "','h','" + (ball_data["b_1h_odd"] == 0 ? "" : formatMoney(ball_data["b_1h_odd"], 2)) + "',8,'"+id_tr+"_1h_goe','"+id_tr+"_1h_odd')");
        a_1h_odd[0].innerHTML = formatMoney(ball_data["b_1h_odd"], 2);


        if (ball_data["b_1h_even"] < 0) {
            a_1h_even[0].className = "FavOddsClass";
        } else {
            a_1h_even[0].className = "UdrDogOddsClass";
        }
        a_1h_even[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_8"] + "','a','" + (ball_data["b_1h_even"] == 0 ? "" : formatMoney(ball_data["b_1h_even"], 2)) + "',8,'"+id_tr+"_1h_goe','"+id_tr+"_1h_even')");
        a_1h_even[0].innerHTML = formatMoney(ball_data["b_1h_even"], 2);
    }


    if (ball_data["b_add"] == 1) {
        td_ball[6].innerHTML = "<a href=\"javascript:openStatsInfo(&quot;" + ball_data["b_id"] + "&quot;);\" title=\"Statistic Information\"><span class=\"iconOdds stats\"></span></a>";
    }

}
function set_table_muay(clone_ball, ball_data) {

    var td_ball = clone_ball.querySelectorAll("td");
    var id_tr = 'id_' + ball_data["b_id"] + '_' + ball_data["b_add"];

    if (ball_data["b_live"] != 0) {
        if (ball_data["b_live"] == 1 || ball_data["b_live"] == 3) {
            td_ball[0].innerHTML = "<font color=\"red\">" + ball_data["b_run_score_full"] + "</font> <br>" + ball_data["b_live_string"] + "'";
        } else {
            td_ball[0].innerHTML = "<font color=\"red\">" + ball_data["b_run_score_full"] + "</font> <br><span style='color: #106cbb; font-weight: bold;'>" + ball_data["b_live_string"] + "</span>";
        }
    } else {
        var date_data_1 = new Date(ball_data["b_date_play"] * 1000);
        var hours_data_1 = "0" + date_data_1.getHours();
        var minutes_data_1 = "0" + date_data_1.getMinutes();
        var formattedTime = hours_data_1.substr(-2) + ':' + minutes_data_1.substr(-2);
        td_ball[0].innerHTML = "<font color=\"red\">LIVE</font><br>" + formattedTime;
    }
    td_ball[0].setAttribute('id', id_tr + '_ts');


    var div_team = td_ball[1].querySelectorAll("div");
    div_team[0].setAttribute('id', id_tr + '_home');
    div_team[1].setAttribute('id', id_tr + '_away');
    div_team[2].setAttribute('id', id_tr + '_draw');
    
    if (ball_data["b_zone"] == 1) {
        div_team[0].className = "FavTeamClass";
        div_team[1].className = "UdrDogTeamClass";
    }else{
        if (ball_data["b_big"] == 1) {
            div_team[0].className = "FavTeamClass";
        } else {
            div_team[0].className = "UdrDogTeamClass";
        }

        if (ball_data["b_big"] == 2) {
            div_team[1].className = "FavTeamClass";
        } else {
            div_team[1].className = "UdrDogTeamClass";
        }
    }

    var ex_card_r = ball_data["card_r"].split(",");

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

    div_team[0].innerHTML = "<span>" + ball_data["b_name_1_th"] + "</span>"+card_r_h;
    div_team[1].innerHTML = "<span>" + ball_data["b_name_2_th"] + "</span>"+card_r_a;
    if ((ball_data["b_1x2_1"] > 0 && ball_data["b_1x2_x"] > 0 && ball_data["b_1x2_2"] > 0) || (ball_data["b_1h_1x2_1"] > 0 && ball_data["b_1h_1x2_x"] > 0 && ball_data["b_1h_1x2_2"] > 0)) {
        div_team[2].innerHTML = "เสมอ";
        div_team[2].className = "HdpGoalClass";
    } else {
        div_team[2].innerHTML = "";
    }

    var div_hdc = td_ball[3].querySelectorAll("div");
    var a_hdc = div_hdc[1].querySelectorAll("a");
    if (ball_data["b_hdc"] != "" && ball_data["b_hdc_1"] != "" && ball_data["b_hdc_2"] != "") {

        if (ball_data["b_big"] == 2) {
            div_hdc[0].innerHTML = "<br>" + ball_data["b_hdc"];
        } else {
            div_hdc[0].innerHTML = ball_data["b_hdc"];
        }

        if (ball_data["b_hdc_1"] < 0) {
            a_hdc[0].className = "FavOddsClass";
        } else {
            a_hdc[0].className = "UdrDogOddsClass";
        }

        a_hdc[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_1"] + "','h','" + (ball_data["b_hdc_1"] == 0 ? "" : formatMoney(ball_data["b_hdc_1"], 2)) + "',1,'"+id_tr+"_ghdc','"+id_tr+"_hdc_1')");
        a_hdc[0].innerHTML = (ball_data["b_hdc_1"] == 0 ? "" : formatMoney(ball_data["b_hdc_1"], 2));

        if (ball_data["b_hdc_2"] < 0) {
            a_hdc[1].className = "FavOddsClass";
        } else {
            a_hdc[1].className = "UdrDogOddsClass";
        }

        a_hdc[1].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_1"] + "','a','" + (ball_data["b_hdc_2"] == 0 ? "" : formatMoney(ball_data["b_hdc_2"], 2)) + "',1,'"+id_tr+"_ghdc','"+id_tr+"_hdc_2')");
        a_hdc[1].innerHTML = (ball_data["b_hdc_2"] == 0 ? "" : formatMoney(ball_data["b_hdc_2"], 2));
    }
    div_hdc[0].setAttribute('id', id_tr + '_hdc');
    //div_hdc[1].setAttribute('id', id_tr+'_ghdc');
    div_hdc[1].className += id_tr + '_ghdc';
    a_hdc[0].setAttribute('id', id_tr + '_hdc_1');
    a_hdc[1].setAttribute('id', id_tr + '_hdc_2');

    var div_goal = td_ball[4].querySelectorAll("div");
    var a_goal = div_goal[1].querySelectorAll("a");
    if (ball_data["b_goal"] != "" && ball_data["b_goal_1"] != "" && ball_data["b_goal_2"] != "") {

        div_goal[0].innerHTML = ball_data["b_goal"] + "<br>ต่ำ";

        if (ball_data["b_goal_1"] < 0) {
            a_goal[0].className = "FavOddsClass";
        } else {
            a_goal[0].className = "UdrDogOddsClass";
        }

        a_goal[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_2"] + "','h','" + (ball_data["b_goal_1"] == 0 ? "" : formatMoney(ball_data["b_goal_1"], 2)) + "',2,'"+id_tr+"_goal','"+id_tr+"_goal_1')");
        a_goal[0].innerHTML = (ball_data["b_goal_1"] == 0 ? "" : formatMoney(ball_data["b_goal_1"], 2));

        if (ball_data["b_goal_2"] < 0) {
            a_goal[1].className = "FavOddsClass";
        } else {
            a_goal[1].className = "UdrDogOddsClass";
        }

        a_goal[1].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_2"] + "','a','" + (ball_data["b_goal_2"] == 0 ? "" : formatMoney(ball_data["b_goal_2"], 2)) + "',2,'"+id_tr+"_goal','"+id_tr+"_goal_2')");
        a_goal[1].innerHTML = (ball_data["b_goal_2"] == 0 ? "" : formatMoney(ball_data["b_goal_2"], 2));
    }
    div_goal[0].setAttribute('id', id_tr + '_goal');
    //div_goal[1].setAttribute('id', id_tr+'_ggoal');
    div_goal[1].className += id_tr + '_ggoal';
    a_goal[0].setAttribute('id', id_tr + '_goal_1');
    a_goal[1].setAttribute('id', id_tr + '_goal_2');

    var div_oe = td_ball[5].querySelectorAll("div");
    var a_oe = div_oe[0].querySelectorAll("a");
    if (ball_data["b_odd"]!=0 && ball_data["b_even"]!=0) {

        if (ball_data["b_odd"] < 0) {
            a_oe[0].className = "FavOddsClass";
        } else {
            a_oe[0].className = "UdrDogOddsClass";
        }

        a_oe[0].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_4"] + "','1','" + (ball_data["b_odd"] == 0 ? "" : formatMoney(ball_data["b_odd"], 2)) + "',4,'"+id_tr+"_goe','"+id_tr+"_odd')");
        a_oe[0].innerHTML = (ball_data["b_odd"] == 0 ? "" : formatMoney(ball_data["b_odd"], 2));

        if (ball_data["b_even"] < 0) {
            a_oe[1].className = "FavOddsClass";
        } else {
            a_oe[1].className = "UdrDogOddsClass";
        }

        a_oe[1].setAttribute("href", "javascript:bet("+step_mode+",'" + ball_data["b_id"] + "','" + ball_data["id_type_4"] + "','2','" + (ball_data["b_even"] == 0 ? "" : formatMoney(ball_data["b_even"], 2)) + "',4,'"+id_tr+"_goe','"+id_tr+"_even')");
        a_oe[1].innerHTML = (ball_data["b_even"] == 0 ? "" : formatMoney(ball_data["b_even"], 2));

        
    }
    div_oe[0].className += id_tr + '_goe';
    a_oe[0].setAttribute('id', id_tr + '_odd');
    a_oe[1].setAttribute('id', id_tr + '_even');
    

    if (ball_data["b_add"] == 1) {
        td_ball[6].innerHTML = "<a href=\"javascript:openStatsInfo(&quot;" + ball_data["b_id"] + "&quot;);\" title=\"Statistic Information\"><span class=\"iconOdds stats\"></span></a>";
    }

}