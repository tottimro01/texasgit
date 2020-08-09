<? session_start();
require('inc/conn.php');
require('inc/function.php');
$url_op=$json_path."/json/sport.json"; 
$op_js=file_get_contents2($url_op);
$jsop = json_decode($op_js, true);

if($jsop["open"]==0){ 
  include 'sa_close.php'; 
  exit(); 
}  
// require("lang/member_lang.php");
  require("lang/variable_lang.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UnderOver</title>
<link href="template/maxbet/public/css/M_UnderOver.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
</head>
<body>

<table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
  <thead>
    <tr>
      <th width="6%" nowrap="">เวลา</th>
      <th width="34%" colspan="2" align="left" class="even">รายการ</th>
      <th style="min-width:78px;max-width:90px;" nowrap="nowrap" class="text-ellipsis" title="เต็มเวลา แต้มต่อ">FT. HDP</th>
      <th style="min-width:78px;max-width:90px;" nowrap="nowrap" class="text-ellipsis" title="เต็มเวลา มากกว่า/น้อยกว่า">FT. O/U</th>
      <th style="min-width:48px;max-width:60px;" nowrap="nowrap" class="text-ellipsis" title="เต็มเวลา ราคาพูล">FT. 1X2</th>
      <th style="min-width:78px;max-width:90px;" nowrap="nowrap" class="even tabt_L text-ellipsis" title="ครึ่งแรก แต้มต่อ">1H. HDP</th>
      <th style="min-width:78px;max-width:90px;" nowrap="nowrap" class="even text-ellipsis" title="ครึ่งแรก มากกว่า/น้อยกว่า">1H. O/U</th>
      <th style="min-width:48px;max-width:60px;" nowrap="nowrap" class="even text-ellipsis" title="ครึ่งแรก ราคาพูล">1H. 1X2</th>
      <th width="1%" nowrap="nowrap"></th>
    </tr>
  </thead>
  <tbody id="load_tb_ball"></tbody>
</table>

<template id="leage_tmpl">
  <tr valign="middle" style="cursor:pointer">      
    <td class="tabtitle"></td>
    <td colspan="9" class="tabtitle"></td>
  </tr>
</template>
<template id="ball_tmpl">
    <tr class="bgcpe displayOn"> 
      <td rowspan="2" class="text_time"></td>
      <td rowspan="2" class="line_unR" valign="top">
        <div></div>
        <div></div>    
        <div></div> 
      </td>
      <td align="right" rowspan="2" nowrap="nowrap"></td>
      <td valign="top" class="none_rline none_dline">
        <div class="line_divL HdpGoalClass"></div>        
        <div class="line_divR OddsDiv "> 
          <a></a><br>          
          <a></a><br>      
        </div>
      </td>
      <td valign="top" class="none_dline none_rline">
        <div class="line_divL HdpGoalClass"></div>        
        <div class="line_divR OddsDiv "> 
          <a></a><br>          
          <a></a><br>        
        </div>
      </td>
      <td rowspan="2" align="right" valign="top" class="tabt_R">
        <div class="line_divL line_divR UdrDogOddsClass "> 
          <a></a><br>          
          <a></a><br>          
          <a></a> 
        </div>
      </td>
      <td valign="top" class="none_rline none_dline">
        <div class="line_divL HdpGoalClass"></div>        
        <div class="line_divR OddsDiv "> 
          <a></a><br>          
          <a></a><br>     
        </div>
      </td>
      <td valign="top" class="none_dline none_rline">
        <div class="line_divL HdpGoalClass"></div>        
        <div class="line_divR OddsDiv "> 
          <a></a><br>          
          <a></a><br>          
        </div>
      </td>
      <td rowspan="2" align="right" valign="top">
        <div class="line_divL line_divR UdrDogOddsClass "> 
          <a></a><br>          
          <a></a><br>          
          <a></a> 
        </div>
      </td>
      <td rowspan="2" align="center" class="breakLine"><span class="displayOn"></span></td>    
    </tr>
    <tr class="bgcpe">      
      <td colspan="2" align="center" class="none_rline none_lline none_tline"></td>
      <td class="none_rline none_tline" colspan="2"></td>    
    </tr>
</template>
<script language="JavaScript" type="text/javascript">
var MD5 = function (s) {
    function L(k, d) {
        return (k << d) | (k >>> (32 - d))
    }

    function K(G, k) {
        var I, d, F, H, x;
        F = (G & 2147483648);
        H = (k & 2147483648);
        I = (G & 1073741824);
        d = (k & 1073741824);
        x = (G & 1073741823) + (k & 1073741823);
        if (I & d) {
            return (x ^ 2147483648 ^ F ^ H)
        }
        if (I | d) {
            if (x & 1073741824) {
                return (x ^ 3221225472 ^ F ^ H)
            } else {
                return (x ^ 1073741824 ^ F ^ H)
            }
        } else {
            return (x ^ F ^ H)
        }
    }

    function r(d, F, k) {
        return (d & F) | ((~d) & k)
    }

    function q(d, F, k) {
        return (d & k) | (F & (~k))
    }

    function p(d, F, k) {
        return (d ^ F ^ k)
    }

    function n(d, F, k) {
        return (F ^ (d | (~k)))
    }

    function u(G, F, aa, Z, k, H, I) {
        G = K(G, K(K(r(F, aa, Z), k), I));
        return K(L(G, H), F)
    }

    function f(G, F, aa, Z, k, H, I) {
        G = K(G, K(K(q(F, aa, Z), k), I));
        return K(L(G, H), F)
    }

    function D(G, F, aa, Z, k, H, I) {
        G = K(G, K(K(p(F, aa, Z), k), I));
        return K(L(G, H), F)
    }

    function t(G, F, aa, Z, k, H, I) {
        G = K(G, K(K(n(F, aa, Z), k), I));
        return K(L(G, H), F)
    }

    function e(G) {
        var Z;
        var F = G.length;
        var x = F + 8;
        var k = (x - (x % 64)) / 64;
        var I = (k + 1) * 16;
        var aa = Array(I - 1);
        var d = 0;
        var H = 0;
        while (H < F) {
            Z = (H - (H % 4)) / 4;
            d = (H % 4) * 8;
            aa[Z] = (aa[Z] | (G.charCodeAt(H) << d));
            H++
        }
        Z = (H - (H % 4)) / 4;
        d = (H % 4) * 8;
        aa[Z] = aa[Z] | (128 << d);
        aa[I - 2] = F << 3;
        aa[I - 1] = F >>> 29;
        return aa
    }

    function B(x) {
        var k = "",
            F = "",
            G, d;
        for (d = 0; d <= 3; d++) {
            G = (x >>> (d * 8)) & 255;
            F = "0" + G.toString(16);
            k = k + F.substr(F.length - 2, 2)
        }
        return k
    }

    function J(k) {
        k = k.replace(/rn/g, "n");
        var d = "";
        for (var F = 0; F < k.length; F++) {
            var x = k.charCodeAt(F);
            if (x < 128) {
                d += String.fromCharCode(x)
            } else {
                if ((x > 127) && (x < 2048)) {
                    d += String.fromCharCode((x >> 6) | 192);
                    d += String.fromCharCode((x & 63) | 128)
                } else {
                    d += String.fromCharCode((x >> 12) | 224);
                    d += String.fromCharCode(((x >> 6) & 63) | 128);
                    d += String.fromCharCode((x & 63) | 128)
                }
            }
        }
        return d
    }
    var C = Array();
    var P, h, E, v, g, Y, X, W, V;
    var S = 7,
        Q = 12,
        N = 17,
        M = 22;
    var A = 5,
        z = 9,
        y = 14,
        w = 20;
    var o = 4,
        m = 11,
        l = 16,
        j = 23;
    var U = 6,
        T = 10,
        R = 15,
        O = 21;
    s = J(s);
    C = e(s);
    Y = 1732584193;
    X = 4023233417;
    W = 2562383102;
    V = 271733878;
    for (P = 0; P < C.length; P += 16) {
        h = Y;
        E = X;
        v = W;
        g = V;
        Y = u(Y, X, W, V, C[P + 0], S, 3614090360);
        V = u(V, Y, X, W, C[P + 1], Q, 3905402710);
        W = u(W, V, Y, X, C[P + 2], N, 606105819);
        X = u(X, W, V, Y, C[P + 3], M, 3250441966);
        Y = u(Y, X, W, V, C[P + 4], S, 4118548399);
        V = u(V, Y, X, W, C[P + 5], Q, 1200080426);
        W = u(W, V, Y, X, C[P + 6], N, 2821735955);
        X = u(X, W, V, Y, C[P + 7], M, 4249261313);
        Y = u(Y, X, W, V, C[P + 8], S, 1770035416);
        V = u(V, Y, X, W, C[P + 9], Q, 2336552879);
        W = u(W, V, Y, X, C[P + 10], N, 4294925233);
        X = u(X, W, V, Y, C[P + 11], M, 2304563134);
        Y = u(Y, X, W, V, C[P + 12], S, 1804603682);
        V = u(V, Y, X, W, C[P + 13], Q, 4254626195);
        W = u(W, V, Y, X, C[P + 14], N, 2792965006);
        X = u(X, W, V, Y, C[P + 15], M, 1236535329);
        Y = f(Y, X, W, V, C[P + 1], A, 4129170786);
        V = f(V, Y, X, W, C[P + 6], z, 3225465664);
        W = f(W, V, Y, X, C[P + 11], y, 643717713);
        X = f(X, W, V, Y, C[P + 0], w, 3921069994);
        Y = f(Y, X, W, V, C[P + 5], A, 3593408605);
        V = f(V, Y, X, W, C[P + 10], z, 38016083);
        W = f(W, V, Y, X, C[P + 15], y, 3634488961);
        X = f(X, W, V, Y, C[P + 4], w, 3889429448);
        Y = f(Y, X, W, V, C[P + 9], A, 568446438);
        V = f(V, Y, X, W, C[P + 14], z, 3275163606);
        W = f(W, V, Y, X, C[P + 3], y, 4107603335);
        X = f(X, W, V, Y, C[P + 8], w, 1163531501);
        Y = f(Y, X, W, V, C[P + 13], A, 2850285829);
        V = f(V, Y, X, W, C[P + 2], z, 4243563512);
        W = f(W, V, Y, X, C[P + 7], y, 1735328473);
        X = f(X, W, V, Y, C[P + 12], w, 2368359562);
        Y = D(Y, X, W, V, C[P + 5], o, 4294588738);
        V = D(V, Y, X, W, C[P + 8], m, 2272392833);
        W = D(W, V, Y, X, C[P + 11], l, 1839030562);
        X = D(X, W, V, Y, C[P + 14], j, 4259657740);
        Y = D(Y, X, W, V, C[P + 1], o, 2763975236);
        V = D(V, Y, X, W, C[P + 4], m, 1272893353);
        W = D(W, V, Y, X, C[P + 7], l, 4139469664);
        X = D(X, W, V, Y, C[P + 10], j, 3200236656);
        Y = D(Y, X, W, V, C[P + 13], o, 681279174);
        V = D(V, Y, X, W, C[P + 0], m, 3936430074);
        W = D(W, V, Y, X, C[P + 3], l, 3572445317);
        X = D(X, W, V, Y, C[P + 6], j, 76029189);
        Y = D(Y, X, W, V, C[P + 9], o, 3654602809);
        V = D(V, Y, X, W, C[P + 12], m, 3873151461);
        W = D(W, V, Y, X, C[P + 15], l, 530742520);
        X = D(X, W, V, Y, C[P + 2], j, 3299628645);
        Y = t(Y, X, W, V, C[P + 0], U, 4096336452);
        V = t(V, Y, X, W, C[P + 7], T, 1126891415);
        W = t(W, V, Y, X, C[P + 14], R, 2878612391);
        X = t(X, W, V, Y, C[P + 5], O, 4237533241);
        Y = t(Y, X, W, V, C[P + 12], U, 1700485571);
        V = t(V, Y, X, W, C[P + 3], T, 2399980690);
        W = t(W, V, Y, X, C[P + 10], R, 4293915773);
        X = t(X, W, V, Y, C[P + 1], O, 2240044497);
        Y = t(Y, X, W, V, C[P + 8], U, 1873313359);
        V = t(V, Y, X, W, C[P + 15], T, 4264355552);
        W = t(W, V, Y, X, C[P + 6], R, 2734768916);
        X = t(X, W, V, Y, C[P + 13], O, 1309151649);
        Y = t(Y, X, W, V, C[P + 4], U, 4149444226);
        V = t(V, Y, X, W, C[P + 11], T, 3174756917);
        W = t(W, V, Y, X, C[P + 2], R, 718787259);
        X = t(X, W, V, Y, C[P + 9], O, 3951481745);
        Y = K(Y, h);
        X = K(X, E);
        W = K(W, v);
        V = K(V, g)
    }
    var i = B(Y) + B(X) + B(W) + B(V);
    return i.toLowerCase()
};
function dynamicSortMultiple() {
    var props = [];
    /*Let's separate property name from ascendant or descendant keyword*/
    for (var i = 0; i < arguments.length; i++) {
        var splittedArg = arguments[i].split(/ +/);
        props[props.length] = [splittedArg[0], (splittedArg[1] ? splittedArg[1].toUpperCase() : "ASC")];
    }
    return function (obj1, obj2) {
        var i = 0,
            result = 0,
            numberOfProperties = props.length;
        /*Cycle on values until find a difference!*/
        while (result === 0 && i < numberOfProperties) {
            result = dynamicSort(props[i][0], props[i][1])(obj1, obj2);
            i++;
        }
        return result;
    }
}

function dynamicSort(property, isAscDesc) {
    return function (obj1, obj2) {
        if (isAscDesc === "DESC") {
            return ((obj1[property] > obj2[property]) ? (-1) : ((obj1[property] < obj2[property]) ? (1) : (0)));
        }
        /*else, if isAscDesc==="ASC"*/
        return ((obj1[property] > obj2[property]) ? (1) : ((obj1[property] < obj2[property]) ? (-1) : (0)));
    }
}
function formatMoney(n, c, d, t) {
    var c = isNaN(c = Math.abs(c)) ? 0 : c,
        d = d == undefined ? "." : d,
        t = t == undefined ? "," : t,
        s = n < 0 ? "-" : "",
        i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
        j = (j = i.length) > 3 ? j % 3 : 0;

    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}
  var data_ball = [];
  var db = 0;
<?
$sql = sql_query_sp("select * from bom_tb_ball_list where (b_date ='24-07-2019' or b_live=1 or b_live=2 or b_live=3) and b_active=1");
while($rs=sql_fetch_as($sql)){
  //print_r($rs);
  ?>
var db_in = {};
  <?
  foreach ($rs as $key => $value) {
    # code...
    ?>
    db_in["<?=$key?>"] = "<?=$value?>";
    <?
  }
?>
data_ball[db] = db_in;
db++;
<?
}
?>
//console.log(data_ball);
var zone_data_ball = [];
var team_data_ball = {};
var i_zone_data_ball = 0;
var i_team_data_ball = 0;

var check_zone_data_ball = [];
  for (var k in data_ball) {

    var arr_insert = {};
    arr_insert["b_zone"] = data_ball[k]["b_zone_th"];
    arr_insert["b_zone_en"] = data_ball[k]["b_zone_en"];
    arr_insert["b_top"] = data_ball[k]["b_top"];
    arr_insert["b_asc"] = data_ball[k]["b_asc"];
    arr_insert["b_active"] = data_ball[k]["b_active"];

    var check_arr = check_zone_data_ball.indexOf(data_ball[k]["b_zone_en"]);
    check_zone_data_ball[i_zone_data_ball] = data_ball[k]["b_zone_en"];
    if (check_arr < 0) {
      zone_data_ball[i_zone_data_ball] = arr_insert;
      i_zone_data_ball++;
    }

    if (!team_data_ball[MD5(data_ball[k]["b_zone_en"])]) {
      team_data_ball[MD5(data_ball[k]["b_zone_en"])] = [];
      i_team_data_ball = 0;
    }else{
      i_team_data_ball = team_data_ball[MD5(data_ball[k]["b_zone_en"])].length;
    }
    team_data_ball[MD5(data_ball[k]["b_zone_en"])][i_team_data_ball] = data_ball[k];

  }

  zone_data_ball.sort(dynamicSortMultiple("b_active DESC", "b_top Asc", "b_asc Asc"));

  var load_tb_ball = document.querySelector("#load_tb_ball");
  load_tb_ball.innerHTML = "";

  var bgck = "";
  var bgcl = "bgcpelight";
  for (var k2 in zone_data_ball) {
    if (zone_data_ball[k2].b_zone != null) {
      var template_leage = document.querySelector('#leage_tmpl');
      var clone_leage = document.importNode(template_leage.content, true);
      var tr_leage = clone_leage.querySelectorAll("tr");
      tr_leage[0].className += "tr_" + MD5(zone_data_ball[k2].b_zone_en) + " lge_" + MD5(zone_data_ball[k2].b_zone_en);

      var td_leage = clone_leage.querySelectorAll("td");
      td_leage[1].textContent = zone_data_ball[k2].b_zone;
      load_tb_ball.appendChild(clone_leage);

      team_data_ball[MD5(zone_data_ball[k2].b_zone_en)].sort(dynamicSortMultiple("b_active DESC", "b_date_play Asc", "b_top_team Asc", "b_id Asc", "b_hf DESC", "b_add Asc"));

      var n_team = 0;
      var c_team_show = {};

      for (var k3 in team_data_ball[MD5(zone_data_ball[k2].b_zone_en)]) {
        var ball_data = team_data_ball[MD5(zone_data_ball[k2].b_zone_en)][k3];

        if((ball_data["b_hdc"]!="" && ball_data["b_hdc_1"]!="" && ball_data["b_hdc_2"]!="") || (ball_data["b_goal"]!="" && ball_data["b_goal_1"]!="" && ball_data["b_goal_2"]!="") || (ball_data["b_1x2_1"]>0 && ball_data["b_1x2_x"]>0 && ball_data["b_1x2_2"]>0) || (ball_data["b_1h_hdc"]!="" && ball_data["b_1h_hdc_1"]!="" && ball_data["b_1h_hdc_2"]!="") || (ball_data["b_1h_goal"]!="" && ball_data["b_1h_goal_1"]!="" && ball_data["b_1h_goal_2"]!="") || (ball_data["b_1h_1x2_1"]>0 && ball_data["b_1h_1x2_x"]>0 && ball_data["b_1h_1x2_2"]>0)){

          var template_ball = document.querySelector('#ball_tmpl');
          var clone_ball = document.importNode(template_ball.content, true);

          var tr_ball = clone_ball.querySelectorAll("tr");

          if(bgck!=ball_data["b_id"]){
            bgck = ball_data["b_id"];
            if(bgcl=="bgcpe"){
              bgcl = "bgcpelight";
            }else{
              bgcl = "bgcpe";
            }
            tr_ball[0].className = bgcl;
            tr_ball[1].className = bgcl;
          }else{
            tr_ball[0].className = bgcl;
            tr_ball[1].className = bgcl;
          }

          tr_ball[0].className += " displayOn";

          var td_ball = clone_ball.querySelectorAll("td");

          var date_data_1 = new Date(ball_data["b_date_play"] * 1000);
          var hours_data_1 = "0" + date_data_1.getHours();
          var minutes_data_1 = "0" + date_data_1.getMinutes();
          var formattedTime = hours_data_1.substr(-2) + ':' + minutes_data_1.substr(-2);
          td_ball[0].innerHTML = "<font color=\"red\">LIVE</font> "+formattedTime;

          var div_team = td_ball[1].querySelectorAll("div");
          if(ball_data["b_big"]==1){
            div_team[0].className = "FavTeamClass";
          }else{
            div_team[0].className = "UdrDogTeamClass";
          }
          div_team[0].innerHTML = "<span>"+ball_data["b_name_1_th"]+"</span>";
          if(ball_data["b_big"]==2){
            div_team[1].className = "FavTeamClass";
          }else{
            div_team[1].className = "UdrDogTeamClass";
          }
          div_team[1].innerHTML = "<span>"+ball_data["b_name_2_th"]+"</span>";
          if((ball_data["b_1x2_1"]>0 && ball_data["b_1x2_x"]>0 && ball_data["b_1x2_2"]>0) || (ball_data["b_1h_1x2_1"]>0 && ball_data["b_1h_1x2_x"]>0 && ball_data["b_1h_1x2_2"]>0)){
            div_team[2].innerHTML = "เสมอ";
            div_team[2].className = "HdpGoalClass";
          }else{
            div_team[2].innerHTML = "";
          }

          if(ball_data["b_hdc"]!="" && ball_data["b_hdc_1"]!="" && ball_data["b_hdc_2"]!=""){
            var div_hdc = td_ball[3].querySelectorAll("div");
            div_hdc[0].innerHTML = ball_data["b_hdc"];

            var a_hdc = div_hdc[1].querySelectorAll("a");
            if(ball_data["b_hdc_1"]<0){
              a_hdc[0].className = "FavOddsClass";
            }else{
              a_hdc[0].className = "UdrDogOddsClass";
            }
            a_hdc[0].innerHTML = ball_data["b_hdc_1"];
            if(ball_data["b_hdc_2"]<0){
              a_hdc[1].className = "FavOddsClass";
            }else{
              a_hdc[1].className = "UdrDogOddsClass";
            }
            a_hdc[1].innerHTML = ball_data["b_hdc_2"];
          }

          if(ball_data["b_goal"]!="" && ball_data["b_goal_1"]!="" && ball_data["b_goal_2"]!=""){
            var div_goal = td_ball[4].querySelectorAll("div");
            div_goal[0].innerHTML = ball_data["b_goal"]+"<br>ต่ำ";

            var a_goal = div_goal[1].querySelectorAll("a");
            if(ball_data["b_goal_1"]<0){
              a_goal[0].className = "FavOddsClass";
            }else{
              a_goal[0].className = "UdrDogOddsClass";
            }
            a_goal[0].innerHTML = ball_data["b_goal_1"];
            if(ball_data["b_goal_2"]<0){
              a_goal[1].className = "FavOddsClass";
            }else{
              a_goal[1].className = "UdrDogOddsClass";
            }
            a_goal[1].innerHTML = ball_data["b_goal_2"];
          }

          if(ball_data["b_1x2_1"]>0 && ball_data["b_1x2_x"]>0 && ball_data["b_1x2_2"]>0){
            var div_1x2 = td_ball[5].querySelectorAll("div");

            var a_1x2 = div_1x2[0].querySelectorAll("a");
            if(ball_data["b_1x2_1"]<0){
              a_1x2[0].className = "FavOddsClass";
            }else{
              a_1x2[0].className = "UdrDogOddsClass";
            }
            a_1x2[0].innerHTML = formatMoney(ball_data["b_1x2_1"],2);
            if(ball_data["b_1x2_2"]<0){
              a_1x2[1].className = "FavOddsClass";
            }else{
              a_1x2[1].className = "UdrDogOddsClass";
            }
            a_1x2[1].innerHTML = formatMoney(ball_data["b_1x2_2"],2);
            if(ball_data["b_1x2_x"]<0){
              a_1x2[2].className = "FavOddsClass";
            }else{
              a_1x2[2].className = "UdrDogOddsClass";
            }
            a_1x2[2].innerHTML = formatMoney(ball_data["b_1x2_x"],2);
          }

          if(ball_data["b_1h_hdc"]!="" && ball_data["b_1h_hdc_1"]!="" && ball_data["b_1h_hdc_2"]!=""){
            var div_1h_hdc = td_ball[6].querySelectorAll("div");
            div_1h_hdc[0].innerHTML = ball_data["b_1h_hdc"];

            var a_1h_hdc = div_1h_hdc[1].querySelectorAll("a");
            if(ball_data["b_1h_hdc_1"]<0){
              a_1h_hdc[0].className = "FavOddsClass";
            }else{
              a_1h_hdc[0].className = "UdrDogOddsClass";
            }
            a_1h_hdc[0].innerHTML = ball_data["b_1h_hdc_1"];
            if(ball_data["b_1h_hdc_2"]<0){
              a_1h_hdc[1].className = "FavOddsClass";
            }else{
              a_1h_hdc[1].className = "UdrDogOddsClass";
            }
            a_1h_hdc[1].innerHTML = ball_data["b_1h_hdc_2"];
          }

          if(ball_data["b_1h_goal"]!="" && ball_data["b_1h_goal_1"]!="" && ball_data["b_1h_goal_2"]!=""){
            var div_1h_goal = td_ball[7].querySelectorAll("div");
            div_1h_goal[0].innerHTML = ball_data["b_1h_goal"]+"<br>ต่ำ";

            var a_1h_goal = div_1h_goal[1].querySelectorAll("a");
            if(ball_data["b_1h_goal_1"]<0){
              a_1h_goal[0].className = "FavOddsClass";
            }else{
              a_1h_goal[0].className = "UdrDogOddsClass";
            }
            a_1h_goal[0].innerHTML = ball_data["b_1h_goal_1"];
            if(ball_data["b_1h_goal_2"]<0){
              a_1h_goal[1].className = "FavOddsClass";
            }else{
              a_1h_goal[1].className = "UdrDogOddsClass";
            }
            a_1h_goal[1].innerHTML = ball_data["b_1h_goal_2"];
          }

          if(ball_data["b_1h_1x2_1"]>0 && ball_data["b_1h_1x2_x"]>0 && ball_data["b_1h_1x2_2"]>0){
            var div_1h_1x2 = td_ball[8].querySelectorAll("div");

            var a_1h_1x2 = div_1h_1x2[0].querySelectorAll("a");
            if(ball_data["b_1h_1x2_1"]<0){
              a_1h_1x2[0].className = "FavOddsClass";
            }else{
              a_1h_1x2[0].className = "UdrDogOddsClass";
            }
            a_1h_1x2[0].innerHTML = formatMoney(ball_data["b_1h_1x2_1"],2);
            if(ball_data["b_1h_1x2_2"]<0){
              a_1h_1x2[1].className = "FavOddsClass";
            }else{
              a_1h_1x2[1].className = "UdrDogOddsClass";
            }
            a_1h_1x2[1].innerHTML = formatMoney(ball_data["b_1h_1x2_2"],2);
            if(ball_data["b_1h_1x2_x"]<0){
              a_1h_1x2[2].className = "FavOddsClass";
            }else{
              a_1h_1x2[2].className = "UdrDogOddsClass";
            }
            a_1h_1x2[2].innerHTML = formatMoney(ball_data["b_1h_1x2_x"],2);
          }
          if(ball_data["b_add"]==1){
            td_ball[9].innerHTML = "<a href=\"javascript:openStatsInfo(&quot;"+ball_data["b_id"]+"&quot;);\" title=\"Statistic Information\"><span class=\"iconOdds stats\"></span></a>";
          }

          load_tb_ball.appendChild(clone_ball);
          n_team++;
        }
      }
      if (n_team <= 0) {
        $(".tr_" + MD5(zone_data_ball[k2].b_zone_en)).hide();
      }
    }
  }
</script>
</body>
</html>
