!function(t){"function"==typeof define&&define.amd?define(["jquery"],t):"object"==typeof exports?module.exports=t(require("jquery")):t(jQuery)}(function(t){function i(i,n){var o,l,r,d,c,u,h,p,f,m=this.data(),y=this.find("ul"),v=!1;if(m.vals&&0!==y.length){for(i||(i=m.seconds),m.intervalId&&(v=!0,clearTimeout(m.intervalId)),l=(o=Math.floor(i/s))*s,l+=(r=Math.floor((i-l)/a))*a,c=i-(l+=60*(d=Math.floor((i-l)/60))),u=(o<100?"0"+(o<10?"0":""):"")+o+(r<10?"0":"")+r+(d<10?"0":"")+d+(c<10?"0":"")+c,h=m.vals.length-1,p=u.length-1;h>=0;h-=1,p-=1)f=parseInt(u.substr(p,1),10),m.vals[h]=f,y.eq(h).children().html(f);(v||n)&&(m.ttStartTime=t.now(),m.intervalId=setTimeout(e.bind(this),1e3),this.data("intervalId",m.intervalId))}}function e(i){var s,a,n,o,l,r,d=this,c=this.find("ul"),u=this.data();if(!u.vals||0===c.length)return u.intervalId&&(clearTimeout(u.intervalId),this.data("intervalId",null)),void(u.callback&&u.callback());void 0===i&&(i=u.iSec),this.data("tickCount",u.tickCount+1),s=u.vals[i],a=c.eq(i),n=a.children(),o=u.countdown?-1:1,n.eq(1).html(s),s+=o,"function"==typeof u.step&&u.tickCount%u.stepCount==0&&(this.data("tickCount",0),u.step()),i===u.iSec&&(l=u.tickTimeout,r=t.now()-u.ttStartTime,u.sec+=o,l+=Math.abs(u.seconds-u.sec)*l-r,u.intervalId=setTimeout(e.bind(this),l)),s<0||s>u.limits[i]?(s<0?(s=u.limits[i],i===u.iHour&&u.displayDays>0&&0===u.vals[i-1]&&(s=3)):s=0,i>0&&e.call(this,i-1)):!u.countdown&&i===u.iHour&&u.displayDays>0&&2===u.vals[i-1]&&3===u.vals[i]&&(s=0,e.call(this,i-1)),n.eq(1).html(s),t.support.transition?(a.addClass("transition"),a.css({top:"-"+u.height+"px"}),setTimeout(function(){a.removeClass("transition"),n.eq(0).html(s),a.css({top:0}),o>0||i!==u.iSec||(u.sec===u.countdownAlertLimit&&c.parent().addClass("timeTo-alert"),0===u.sec&&(c.parent().removeClass("timeTo-alert"),u.intervalId&&(clearTimeout(u.intervalId),d.data("intervalId",null)),"function"==typeof u.callback&&u.callback()))},410)):a.stop().animate({top:"-"+u.height+"px"},400,i!==u.iSec?null:function(){n.eq(0).html(s),a.css({top:0}),o>0||i!==u.iSec||(u.sec===u.countdownAlertLimit?c.parent().addClass("timeTo-alert"):0===u.sec&&(c.parent().removeClass("timeTo-alert"),u.intervalId&&(clearTimeout(u.intervalId),d.data("intervalId",null)),"function"==typeof u.callback&&u.callback()))}),u.vals[i]=s}var s=86400,a=3600,n={callback:null,step:null,stepCount:1,captionSize:0,countdown:!0,countdownAlertLimit:10,displayCaptions:!1,displayDays:0,displayHours:!0,fontFamily:"Verdana, sans-serif",fontSize:0,lang:"en",languages:{},seconds:0,start:!0,theme:"white",width:25,height:30,gap:11,vals:[0,0,0,0,0,0,0,0,0],limits:[9,9,9,2,9,5,9,5,9],iSec:8,iHour:4,tickTimeout:1e3,intervalId:null,tickCount:0},o={start:function(s){var a;s&&(i.call(this,s),a=setTimeout(e.bind(this),1e3),this.data("ttStartTime",t.now()),this.data("intervalId",a))},stop:function(){var t=this.data();return t.intervalId&&(clearTimeout(t.intervalId),this.data("intervalId",null)),t},reset:function(t){var e=o.stop.call(this),s=void 0===t?e.seconds:t;this.find("div").css({backgroundPosition:"left center"}),this.find("ul").parent().removeClass("timeTo-alert"),i.call(this,s,!0)}},l={en:{days:"DAYS",hours:"HRS",min:"MINS",sec:"SECS"},ru:{days:"Ð´Ð½ÐµÐ¹",hours:"Ñ‡Ð°ÑÐ¾Ð²",min:"Ð¼Ð¸Ð½ÑƒÑ‚",sec:"ÑÐµÐºÑƒÐ½Ð´"},ua:{days:"Ð´Ð½iÐ²",hours:"Ð³Ð¾Ð´Ð¸Ð½",min:"Ñ…Ð²Ð¸Ð»Ð¸Ð½",sec:"ÑÐµÐºÑƒÐ½Ð´"},de:{days:"Tag",hours:"Uhr",min:"Minuten",sec:"Secunden"},fr:{days:"jours",hours:"heures",min:"minutes",sec:"secondes"},sp:{days:"dÃ­as",hours:"horas",min:"minutos",sec:"segundos"},it:{days:"giorni",hours:"ore",min:"minuti",sec:"secondi"},nl:{days:"dagen",hours:"uren",min:"minuten",sec:"seconden"},no:{days:"dager",hours:"timer",min:"minutter",sec:"sekunder"},pt:{days:"dias",hours:"horas",min:"minutos",sec:"segundos"},tr:{days:"gÃ¼n",hours:"saat",min:"dakika",sec:"saniye"}};return void 0===t.support.transition&&(t.support.transition=function(){var t=(document.body||document.documentElement).style;return void 0!==t.transition||void 0!==t.WebkitTransition||void 0!==t.MozTransition||void 0!==t.MsTransition||void 0!==t.OTransition}()),t.fn.timeTo=function(){var e,r,d,c,u,h,p,f,m,y={},v=t.now();for(e=0;e<arguments.length;e+=1)r=arguments[e],0===e&&"string"==typeof r?c=r:"object"==typeof r?"function"==typeof r.getTime?y.timeTo=r:y=t.extend(y,r):"function"==typeof r?y.callback=r:(d=parseInt(r,10),isNaN(d)||(y.seconds=d));if(y.timeTo)y.timeTo.getTime?u=y.timeTo.getTime():"number"==typeof y.timeTo&&(u=y.timeTo),y.seconds=u>v?Math.floor((u-v)/1e3):0;else if(y.time||!y.seconds)if((u=y.time)||(u=new Date),"object"==typeof u&&u.getTime)y.seconds=u.getHours()*a+60*u.getMinutes()+u.getSeconds(),y.countdown=!1;else if("string"==typeof u){for(p=u.split(":"),f=0,m=1;p.length;)f+=p.pop()*m,m*=60;y.seconds=f,y.countdown=!1}return!1!==y.countdown&&y.seconds>s&&void 0===y.displayDays?(h=Math.floor(y.seconds/s),y.displayDays=(h<10?1:h<100&&2)||3):!0===y.displayDays?y.displayDays=3:y.displayDays&&(y.displayDays=y.displayDays>0?Math.floor(y.displayDays):3),this.each(function(){var e,s,a,r,d,u,h,p,f,m,v,g,T,S,I,w,b,k,x,C,M,D,z=t(this),H=z.data();if(H.intervalId&&(clearInterval(H.intervalId),H.intervalId=null),H.vals)"reset"!==c&&t.extend(H,y);else{if(s=H.opt?H.options:y,e=Object.keys(n).reduce(function(t,i){return Array.isArray(n[i])?t[i]=n[i].slice(0):t[i]=n[i],t},{}),H=t.extend(e,s),H.options=s,H.height=Math.round(100*H.fontSize/93)||H.height,H.width=Math.round(.8*H.fontSize+.13*H.height)||H.width,H.displayHours=!(!H.displayDays&&!H.displayHours),r={fontFamily:H.fontFamily},H.fontSize>0&&(r.fontSize=H.fontSize+"px"),d=H.languages[H.lang]||l[H.lang],z.addClass("timeTo").addClass("timeTo-"+H.theme).css(r),u=Math.round(H.height/10),h='<ul style="left:'+u+'px; top:0"><li>0</li><li>0</li></ul></div>',p=H.fontSize?' style="width:'+H.width+"px; height:"+H.height+'px;"':' style=""',f='<div class="first"'+p+">"+h,m="<div"+p+">"+h,v="<span>:</span>",g=Math.round(2*H.width+3),T=H.captionSize||H.fontSize&&Math.round(.43*H.fontSize),S=T?"font-size:"+T+"px;":"",I=T?' style="'+S+'"':"",w=(H.displayCaptions?(H.displayHours?'<figure style="max-width:'+g+'px">$1<figcaption'+I+">"+d.hours+"</figcaption></figure>"+v:"")+'<figure style="max-width:'+g+'px">$1<figcaption'+I+">"+d.min+"</figcaption></figure>"+v+'<figure style="max-width:'+g+'px">$1<figcaption'+I+">"+d.sec+"</figcaption></figure>":(H.displayHours?"$1"+v:"")+"$1"+v+"$1").replace(/\$1/g,f+m),H.displayDays>0){for(b=.4*H.fontSize||n.gap,k=f,a=H.displayDays-1;a>0;a-=1)k+=1===a?m.replace('">',"margin-right:"+Math.round(b)+'px">'):m;w=(H.displayCaptions?'<figure style="width:'+Math.round(H.width*H.displayDays+b+4)+'px">$1<figcaption style="'+S+"padding-right:"+Math.round(b)+'px">'+d.days+"</figcaption></figure>":"$1").replace(/\$1/,k)+w}z.html(w)}if((x=z.find("div")).length<H.vals.length){for(C=H.vals.length-x.length,M=H.vals,D=H.limits,H.vals=[],H.limits=[],a=0;a<x.length;a+=1)H.vals[a]=M[C+a],H.limits[a]=D[C+a];H.iSec=H.vals.length-1,H.iHour=H.vals.length-5}H.sec=H.seconds,z.data(H),c&&o[c]?o[c].call(z,H.seconds):H.start?o.start.call(z,H.seconds):i.call(z,H.seconds)})},t});