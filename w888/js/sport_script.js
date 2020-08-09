var OnlyMROdds=false;
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

function MMRchangeBGColor3_over(e, _, t, a) {
    var r = document.getElementById(_ + "_1")
      , d = document.getElementById(_ + "_2")
      , s = document.getElementById(_ + "_3");
    OnlyMROdds ? (null != s && (s.style.backgroundColor = t),
    null != d && (d.style.backgroundColor = t)) : e.id == _ + "_3" ? null != s && (s.style.backgroundColor = t) : (null != r && (r.style.backgroundColor = t),
    null != d && (d.style.backgroundColor = t))
}
function MMRchangeBGColor3_out(e, _, t) {
    var a = document.getElementById(e + "_1")
      , r = document.getElementById(e + "_2")
      , d = document.getElementById(e + "_3");
    null != d && (d.style.backgroundColor = t),
    null != a && (a.style.backgroundColor = _),
    null != r && (r.style.backgroundColor = OnlyMROdds ? t : _)
}
function changeOddsType_ou(val){
  Odds_type = val;
  arr_blink = [];
  ddd = {};
  ddd_old = {};
  data_ball(1,old_arr_data);
}
function dec_price(val){
  if(val!=""){
    var vre = 0;
    if(val<0){
      vre = 3-(0-(parseFloat(val)));
    }else{
      vre = 1+(parseFloat(val));
    }
    return formatMoney(vre,2);
  }else{
    return "";
  }
}
function hk_price(val){
  if(val!=""){
    var vre = 0;
    if(val<0){
      vre = 2-(0-(parseFloat(val)));
    }else{
      vre = val;
    }
    return formatMoney(vre,2);
  }else{
    return "";
  }
}
function changeDisplayMode(val,site){
  dp_mode = val;
  $("#tmplTable tbody").remove();
  $("#header_tb_ball_live").html("");
  $("#header_tb_ball").html("");
  n =1;
  n_live =1;
  data_ball(1,old_arr_data);
}
function changeDisplayModex(val,site){
  dp_mode = val;
  /*$("#tmplTable tbody").remove();
  $("#header_tb_ball_live").html("");
  $("#header_tb_ball").html("");*/
  n =1;
  n_live =1;
  data_ball(1,old_arr_data);
}
var busket_tang = {};
busket_tang["type"] = "";
busket_tang["data"] = {};
function bet(sm , e, t, a, r, d, b , i) {
  if(sm==1){
    busket_tang["type"] = 1;
    busket_tang["data"] = {};
    busket_tang["data"]["d_"+e] = [];
    busket_tang["data"]["d_"+e][0] = e;
    busket_tang["data"]["d_"+e][1] = t;
    busket_tang["data"]["d_"+e][2] = a;
    busket_tang["data"]["d_"+e][3] = r;
    busket_tang["data"]["d_"+e][4] = d;
    busket_tang["data"]["d_"+e][5] = b;
    busket_tang["data"]["d_"+e][6] = i;
    fFrame.leftx.DoBetProcessX(e, t, a, r, d , Odds_type , b, i);
  }else{
    if(busket_tang["type"]==1){
      busket_tang["data"] = [];
    }
    busket_tang["type"] = 2;

if(Object.keys(busket_tang["data"]).length<max_step || busket_tang["data"]["d_"+e] != undefined){

    busket_tang["data"]["d_"+e] = [];
    busket_tang["data"]["d_"+e][0] = e;
    busket_tang["data"]["d_"+e][1] = t;
    busket_tang["data"]["d_"+e][2] = a;
    busket_tang["data"]["d_"+e][3] = r;
    busket_tang["data"]["d_"+e][4] = d;
    busket_tang["data"]["d_"+e][5] = b;
    busket_tang["data"]["d_"+e][6] = i;
    
    /*}else{
      delete busket_tang[e]; 
    }*/
    fFrame.leftx.DoBetProcessX_step(busket_tang , Odds_type);
  }

  }
  //console.log(busket_tang);
}
function del_step(e){
  delete busket_tang["data"]["d_"+e]; 

  if(Object.keys(busket_tang["data"]).length<=0){
    fFrame.leftx.ReloadWaitingBetListx('yes','no','1');
  }else{ 
    fFrame.leftx.DoBetProcessX_step(busket_tang , Odds_type);
  }
  
}
function del_all(){
  busket_tang["data"] = {};
}
function changePage(val){
  //$(".loader").show();
  page_show = val;
  if(page_show==1){
    $("#disstyle_Div").show();
    $("#selOddsType_Div").show();
  }else if(page_show==2){
    $("#disstyle_Div").hide();
    $("#selOddsType_Div").hide();
  }else if(page_show==3){
    $("#disstyle_Div").hide();
    $("#selOddsType_Div").show();
  }

  $("#tmplTable tbody").remove();
  $("#header_tb_ball_live").html("");
  $("#header_tb_ball").html("");
  n =1;
  n_live =1;
  data_ball(1,old_arr_data);
  //var d1 = data_ball(1,old_arr_data);
  /*data_ball(1,old_arr_data).then(function(){
    $(".loader").hide();
  });*/
  /*$.when( data_ball(1,old_arr_data) ).done(function ( x ) {
    $(".loader").hide();
  });*/
}
function show_blinkx(){
    for (var key in arr_blink) {
        var blink_d = arr_blink[key];
        if(blink_d["ctime"]<=0){
            $("."+blink_d["id"]).removeClass("show_blink");
            delete arr_blink[key];
            $("#BPOddsChangeAlert").hide();
        }else{
            $("."+blink_d["id"]).addClass("show_blink");
            blink_d["ctime"] = parseInt(blink_d["ctime"])-1;
            arr_blink[key] = blink_d;
        }
    }
}
function show_blink(){
    for (var key in arr_blink) {
        var blink_d = arr_blink[key];
        if(blink_d["ctime"]<=0){
            $("."+blink_d["id"]).removeClass("show_blink");
            delete arr_blink[key];
            $("#BPOddsChangeAlert").hide();
        }else{
            $("."+blink_d["id"]).addClass("show_blink");
            blink_d["ctime"] = parseInt(blink_d["ctime"])-1;
            arr_blink[key] = blink_d;
        }
    }
}
function set_BG(data){
  var bgck = "";
  var bgcl = "bgcpelight";

  var bgcov = "f5eeb8";

  var bgcou1 = "C6D4F1";
  var bgcou2 = "bbbeeb";
  var i = 0;
  for (var k in data) {
    if(bgck!=data[k].bID){
      bgck = data[k].bID;
      if(bgcl=="bgcpe"){
        bgcl = "bgcpelight";
        bgrm = "bgcpe";

        bgcou1 = "E4E4E4";
        bgcou2 = "bbbeeb";
      }else{
        bgcl = "bgcpe";
        bgrm = "bgcpelight";

        bgcou1 = "C6D4F1";
        bgcou2 = "bbbeeb";
      }

      $(".bl_bg"+data[k].bID).addClass(bgcl);
      $(".bl_bg"+data[k].bID).removeClass(bgrm);
    }else{
      $(".bl_bg"+data[k].bID).addClass(bgcl);
      $(".bl_bg"+data[k].bID).removeClass(bgrm);
    }
    var id_tr = 'e_'+data[k].bID+'_'+data[k].bAdd;

    $(".bl_ball"+data[k].bID+"_"+data[k].bAdd).attr("onmouseout" , "MMRchangeBGColor3_out('"+id_tr+"','#"+bgcou1+"','#"+bgcou2+"');");
    $(".bl_ball"+data[k].bID+"_"+data[k].bAdd).attr("onmouseover" , "MMRchangeBGColor3_over(this,'"+id_tr+"','#f5eeb8');");
  }
}
function set_BG_live(data){
  var bgck = "";
  var bgcl = "liveligh";

  var bgcov = "f5eeb8";

  var bgcou1 = "C6D4F1";
  var bgcou2 = "bbbeeb";
  for (var k in data) {
    if(bgck!=data[k].bID){
      bgck = data[k].bID;
      if(bgcl=="live"){
        bgcl = "liveligh";
        bgrm = "live";

        bgcou1 = "ffddd2";
        bgcou2 = "bbbeeb";
      }else{
        bgcl = "live";
        bgrm = "liveligh";

        bgcou1 = "FFCCBC";
        bgcou2 = "bbbeeb";
      }

      $(".bl_bg"+data[k].bID).addClass(bgcl);
      $(".bl_bg"+data[k].bID).removeClass(bgrm);
    }else{
      $(".bl_bg"+data[k].bID).addClass(bgcl);
      $(".bl_bg"+data[k].bID).removeClass(bgrm);
    }
    var id_tr = 'e_'+data[k].bID+'_'+data[k].bAdd;

    $(".bl_ball_live"+data[k].bID+"_"+data[k].bAdd).attr("onmouseout" , "MMRchangeBGColor3_out('"+id_tr+"','#"+bgcou1+"','#"+bgcou2+"');");
    $(".bl_ball_live"+data[k].bID+"_"+data[k].bAdd).attr("onmouseover" , "MMRchangeBGColor3_over(this,'"+id_tr+"','#f5eeb8');");
  }
}
function selectLeague(){
  var leagues = leagueArray;
  var _lbs = '';

  $.each(leagueArray, function(index, val){
    let _id = index;
    let isChk = (selectedLeague.indexOf(_id) != -1 || selectedLeague.length == 0) ? 'checked="checked"' : "";
    _lbs += ['<div class="chkLgeLB-c">', 
    '<div>',
    '<table callspacing="0" cellpadding="0"><tr>',
    '<td><input type="checkbox" name="chkLge" id="chkLge_',_id,'" value="',_id,'" ' + isChk + ' /></td>',
    '<td><label for="chkLge_',_id,'">',val.name_th,'<label></td>',
    '</tr></table>',
    '</div>',
    '</div>',].join("");
  });

  let _isChk = (selectedLeague.length == 0 || selectedLeague.length == Object.keys(leagues).length) ? 'checked="checked"' : "";
  var _form = ['<div>','<div>',
  '<div>',
  '<input type="checkbox" name="chkLgeAll" id="chkLgeAll" value="all" ' + _isChk + ' />',
  '<label for="chkLgeAll">'+txt_select_all+'<label>',
  '</div>',
  '<br />',
  _lbs,
  '</div>','</div>'].join("");

  $.confirm({
    title: txt_title_league,
    content: _form,
    theme: 'oho ohox',
    animation: 'none',
    closeAnimation: 'none',
    useBootstrap: false,
    closeIcon: true,
    onContentReady: function () {
      var self = this;
      self.$content.find('#chkLgeAll').change(function(){
        if($(this).is(':checked')){
          self.$content.find('input[name="chkLge"]').prop('checked', 'checked');
        }else{
          self.$content.find('input[name="chkLge"]').prop('checked', '');
        }
      });
      self.$content.find('input[name="chkLge"]').change(function(){
        if($(this).is(':checked')){
          let cntChk = self.$content.find('input[name="chkLge"]:checked');
          if(cntChk.length == Object.keys(leagues).length)
            self.$content.find('#chkLgeAll').prop('checked', 'checked');
        }else{
          self.$content.find('#chkLgeAll').prop('checked', '');
        }
      });
    },
    buttons: {
      confirm: {
        text: txt_save,
        btnClass: "btn btn-default oho-btn _submit",
        action: function () {
          var self = this;
          var chkList = self.$content.find('input[name="chkLge"]:checked');
          var chkListVal = [];
          selectedLeague = [];
          if($("#chkLgeAll").prop("checked") == false){
            if(chkList.length > 0){
              //var _selectorStrNot = [];
              //var _selectorStr = [];
              for(var i = 0; i < chkList.length; i++){
                let v = $(chkList[i]).val();
                selectedLeague.push(v);
              }
            }else{
              // if not select any then show all
            }
          }
          data_ball(1,old_arr_data);
        }
      },
      cancel: { 
        text: txt_cancel,
        btnClass: "btn btn-default oho-btn _close",
      }
    }
  });
}
function OnSwitchSportMixParley(e , t){
  var $parley = $(e).data('parley');
  var mkt = parent.leftx.sportMarket;
  if($parley=='mixparley'){
    var c = parent.leftx.document.getElementsByName('sport_collapse');
    for (var i = 0; i < c.length; i++){
      if(c[i].checked === true){
        var s = c[i].value;
        break;
      }
    }

    if(s !== void 0){
      var v = "main_sport_step.php?vvw=&page_show=1&sp="+s+"&live="+(mkt == 'l' ? '1' : '')+"&token="+t;
      var x = parent.leftx.document.getElementsByName('sport_rdo');
      for (var i = 0; i < x.length; i++) {
        if(x[i].value == v){
          x[i].checked = true;
          parent.leftx.triggerEvent(x[i], 'change');
          break;
        }
      }
    }
  }else if($parley=='today'){
    var m = parent.leftx.document.getElementById('chkMarket_'+mkt);
    var t = parent.leftx.document.getElementById('sport_'+mkt+'_soccer');
    if(m.checked === false){
      $(m).prop('checked', true);
      var l = parent.leftx.document.getElementsByClassName('sport_menu_list');
      for (var i = 0; i < l.length; i++){
        if(l[i].classList.contains('sport_'+mkt)){
          l[i].style.display = 'block';
        }else{
          l[i].style.display = 'none';
        }
      }
    }
    t.checked = true;
    parent.leftx.triggerEvent(t, 'change');
  }
}

function openStatsInfo(e) {
    window.open("stats.php?MatchId=" + e, "StatsInfo" + e)
}

function _mtr(val, type, nam) {
  // console.log(nam)
  var val2 = "";
  if(val!=""){
    if(type==4){
      if(val>0.00){
        val2 = val-(nam/100);
        if(val2<=0.00){
          val2=0.00;
        }
      }else if(val<0.00){
        val = (val)-(nam/100);
        if(val<=-1.00){
          val2 = 2+(val);
        }else{
          val2 = val;
        }
      }
    }else if(type==2){
      val2 = val-(nam/100);
    }else{
      val2 = val-(nam/100);
    }
  }else{
    val2 = val;
  }
// console.log(val2)
  return val2;
}