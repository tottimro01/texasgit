var TMPL_TABLE_ID="tmplTable";var TMPL_COLGROUP_ID="tmplColgroup";var TMPL_HEADER_ID="tmplHeader";var TMPL_LEAGUE_ID="tmplLeague";var TMPL_EVENT_ID="tmplEvent";var TMPL_EVENT_MASTER_ID="tmplEventMaster";var CLS_UPD="Odds_Upd";var CLS_SAME="Odds_Same";var IsSaveLeague=false;var SelMainMarket=0;function OutrightKeeper(){var r=this;var p=null;var n=undefined;var e=undefined;var d=undefined;var o=new Array();var b=new Array();var c=new Array();this.DivBase=2;this.HashHeader=null;this.DataTags=null;this.EventList=null;this.HtmlList=null;this.TemplateFrame=null;this.DataFrame=null;this.TableContainer=null;this.BetTypes=null;function l(u){var v="";if(u!=undefined){v=u.innerHTML;v=v.replace(/%7B/g,"{");v=v.replace(/%7D/g,"}");v=v.replace(/[	\n]/g,"")}return v}function k(){var u=r.TemplateFrame.document.getElementById(TMPL_TABLE_ID);if(u!=null){var v=u.parentNode.innerHTML;v=v.substring(0,v.indexOf(u.innerHTML));v=v.substr(v.lastIndexOf("<"));return v}return"<table>"}function j(){var u=r.TemplateFrame.document.getElementById(TMPL_COLGROUP_ID);if(u!=null){var v=u.parentNode.innerHTML;v=v.substring(0,v.indexOf(u.innerHTML)-1);v=v.substr(v.lastIndexOf("<"));return v+u.innerHTML+"</colgroup>"}return""}function h(){if(r.EventList.length==0){return""}return r.TemplateFrame.document.getElementById(TMPL_HEADER_ID).innerHTML}function i(u){var v=_replaceTags(r.EventList[u],n);if(r.afterNewLeague!=null){v=r.afterNewLeague(r.EventList,u,v)}return v}function g(u){var v;v=_replaceTags(r.EventList[u],e);if(r.afterNewEvent!=null){v=r.afterNewEvent(r.EventList,u,v)}return v}function f(u){var v;v=_replaceTags(r.EventList[u],d);if(r.afterNewEvent!=null){v=r.afterNewEvent(r.EventList,u,v)}return v}this.getTable=function(){return p};this.setTemplate=function(u){this.TemplateFrame=u;var v=this.TemplateFrame.document.getElementById(TMPL_LEAGUE_ID);n=l(v);n=_formatTemplate(n,"{%","}");v=this.TemplateFrame.document.getElementById(TMPL_EVENT_ID);e=l(v);e=_formatTemplate(e,"{%","}");v=this.TemplateFrame.document.getElementById(TMPL_EVENT_MASTER_ID);if(v==null){d=e}else{d=l(v);d=_formatTemplate(d,"{%","}")}};this.setDatas=function(u,v){this.DataTags=v;var y=new Array(u.length);var x=0;for(var w=0;w<u.length;w++){var z=_hashData(u[w],v);if(z.LeagueId==""){z.LeagueId=y[w-1]["LeagueId"];z.LeagueName=y[w-1]["LeagueName"];z.ShowTime=y[w-1]["ShowTime"]}z.Div=w%this.DivBase;if(this.afterSetData!=null){this.afterSetData(w,z,y)}y[w]=z}this.EventList=y};this.paintOddsTable=function(){if(r.getLeagueList!=null){r.getLeagueList()}var u=new Array();this.HtmlList=new Array();this.HtmlList.length=this.EventList.length;u.push(k());u.push(j());u.push("<THead>"+h()+"</THead><TBody>");var A,B,x;for(var v=0;v<this.EventList.length;v++){var y=this.EventList[v]["LeagueId"];if(y!=A&&r.isFilterLeague(y)){A=y;u.push(i(v))}var z=this.EventList[v]["MatchId"];if(B!=z){B=z;o[z]=v;x=f(v)}else{x=g(v)}this.HtmlList[v]=x;if(r.isFilterLeague(y)){u.push(x)}}u.push("</TBody></Table>");var w=u.join("");this.TableContainer.innerHTML=w;p=this.TableContainer.childNodes[0];if(this.afterRepaintTable!=null){this.afterRepaintTable(p,this.EventList)}};this.refreshOddsTable=function(u,w,v,y,x){b=new Array();t(y);s(x);a(u);q(w);m(v);this.regenTableHtml();if(this.afterRepaintTable!=undefined){this.afterRepaintTable(p)}};function t(u){for(var w in u){var x=u[w];var v=o[w];r.EventList[v]["ShowTime"]=x;b[w]="showtime"}}function s(u){for(var B in c){if(typeof(c[B])=="function"){continue}var x=o[B];if(x==null){continue}r.EventList[x]["Changed"]="";b[B]="oddsClear"}c=new Array();for(var v=0;v<u.length;v++){var B=u[v][0];var C=u[v][1];var x=o[B];if((x!=null)&&(r.EventList[x]["Odds"]!=C)){r.EventList[x]["Odds"]=C;r.EventList[x]["Changed"]=CLS_UPD;c[r.EventList[x]["MatchId"]]=1;b[r.EventList[x]["MatchId"]]="oddsNew";var A=r.EventList[x];r.EventList=arrayRemove(r.EventList,x,x);r.HtmlList=arrayRemove(r.HtmlList,x,x);var y=x;while(y>0){if((A.LeagueId==r.EventList[y-1]["LeagueId"])&&(parseFloat(C)<parseFloat(r.EventList[y-1]["Odds"]))){y--}else{break}}while(y<r.EventList.length){if((A.LeagueId==r.EventList[y]["LeagueId"])&&(parseFloat(C)>parseFloat(r.EventList[y]["Odds"]))){y++}else{break}}r.EventList=arrayInsert(r.EventList,y,[A]);r.HtmlList=arrayInsert(r.HtmlList,y,["update temp string"]);var w=(x<y)?x:y;for(var z=r.EventList.length-1;z>=w;z--){o[r.EventList[z]["MatchId"]]=z}}}}function a(u){for(var v=0;v<u.length;v++){var y=u[v];var w=o[y];r.EventList=arrayRemove(r.EventList,w,w);r.HtmlList=arrayRemove(r.HtmlList,w,w);for(var x=r.EventList.length-1;x>=w;x--){o[r.EventList[x]["MatchId"]]=x}}}function m(w){var y,x;for(var u=0;u<w.length;u++){x=_hashData(w[u],r.DataTags);if(x.LeagueId==""){x.LeagueId=y.LeagueId;x.LeagueName=y.LeagueName;x.ShowTime=y.ShowTime}y=x;var v=r.findMatchCode(x.MatchCode,x.Odds);r.EventList=arrayInsert(r.EventList,v,new Array(x));r.HtmlList=arrayInsert(r.HtmlList,v,["insert temp string"]);b[x.MatchId]="ins"}}function q(u){for(var B in u){b[B]="srt";var A=u[B];var y=o[B];var z=r.EventList[y];z.MatchCode=A;r.EventList=arrayRemove(r.EventList,y,y);r.HtmlList=arrayRemove(r.HtmlList,y,y);var x=r.findMatchCode(A,z.Odds);r.EventList=arrayInsert(r.EventList,x,[z]);r.HtmlList=arrayInsert(r.HtmlList,x,["resort temp string"]);var w=(y<x)?y:x;for(var v=r.EventList.length-1;v>=w;v--){o[r.EventList[v]["MatchId"]]=v}}}this.findMatchCode=function(y,z){var v=0;var x=this.EventList.length-1;var w;if(this.EventList.length==0){return 0}else{if(y>=this.EventList[x]["MatchCode"]){return x+1}else{if(y<this.EventList[v]["MatchCode"]){return v}}}while(v<=x){w=Math.ceil((v+x)/2);var u=this.EventList[w]["MatchCode"];if(u<y){v=w+1}else{if(u>y){x=w-1}else{while(w<this.EventList.length){if((this.EventList[w]["MatchCode"]==y)&&(parseFloat(z)>parseFloat(this.EventList[w]["Odds"]))){w++}else{break}}while(w>0){if((this.EventList[w-1]["MatchCode"]==y)&&(parseFloat(z)<parseFloat(this.EventList[w-1]["Odds"]))){w--}else{break}}return w}}}if(w+1>=this.EventList.length){w=this.EventList.length-2}for(w=w+1;w>=0;w--){if(this.EventList[w]["MatchCode"]<=y){return w+1}}return 0};this.regenTableHtml=function(){getLeagueList();var u=new Array();u.push(k());u.push(j());u.push("<THead>"+h()+"</THead><TBody>");var z,B,D;var C="0";for(var v=0;v<this.EventList.length;v++){var w=v%this.DivBase;var x=this.EventList[v];z=x.LeagueId;if(z!=B&&r.isFilterLeague(z)){B=z;u.push(i(v))}var A=this.EventList[v]["MatchId"];if((b[x.MatchId]!=null)||(x.Div!=w)){x.Div=w;this.HtmlList[v]=(D!=A)?f(v):g(v)}if(r.isFilterLeague(z)){u.push(this.HtmlList[v])}if(D!=A){D=A;o[A]=v}}u.push("</TBody></Table>");var y=u.join("");arrTicks.push(new Date().getTime());this.TableContainer.innerHTML=y;p=this.TableContainer.childNodes[0]}}function _replaceTags(a,c){var b=new Array(c.length*2-1);b[0]=c[0];var e;for(var d=1;d<c.length;d++){e=d*2;b[e-1]=a[c[d][0]];b[e]=c[d][1]}return b.join("")}function replaceTags(a,b){return _replaceTags(a,_formatTemplate(b,"{%","}"))}function _formatTemplate(h,f,g){var a=h.split(f);for(var b=1;b<a.length;b++){var c=a[b].indexOf(g);var d=a[b].substr(0,c);var e=a[b].substr(c+1,a[b].length-c);a[b]=[d,e]}return a}function _initialTags(e){var a=e.match(/{%.+?}/g);var c=new Hashtable();for(var b=0;b<a.length;b++){var d=a[b].substr(2,a[b].length-3);c.put(d,d)}return c.getValues()}function _hashData(a,b){var d=new Array();for(var c=0;c<b.length;c++){d[b[c]]=a[c]}return d}function _mergeHash(a,b){for(var c in b){a[c]=b[c]}}function arrayRemove(a,d,e){if(e==null){e=d}if(d>e){return a}if(d<0){d=0}if(e>=a.length){e=a.length-1}var b=a.slice(0,d);var c=a.slice(e+1);return b.concat(c)}function arrayInsert(a,e,b){if(e<=0){return b.concat(a)}else{if(e>=a.length){return a.concat(b)}else{var c=a.slice(0,e);var d=a.slice(e);c=c.concat(b);return c.concat(d)}}};