function jsonPath(n,t,i){var r={resultType:i&&i.resultType||"VALUE",result:[],normalize:function(n){var t=[];return n.replace(/[\['](\??\(.*?\))[\]']/g,function(n,i){return"[#"+(t.push(i)-1)+"]"}).replace(/'?\.'?|\['?/g,";").replace(/;;;|;;/g,";..;").replace(/;$|'?\]|'$/g,"").replace(/#([0-9]+)/g,function(n,i){return t[i]})},asPath:function(n){for(var i=n.split(";"),r="$",t=1,u=i.length;t<u;t++)r+=/^[0-9*]+$/.test(i[t])?"["+i[t]+"]":"['"+i[t]+"']";return r},store:function(n,t){return n&&(r.result[r.result.length]=r.resultType=="PATH"?r.asPath(n):t),!!n},trace:function(n,t,i){var f,u;if(n)if(f=n.split(";"),u=f.shift(),f=f.join(";"),t&&t.hasOwnProperty(u))r.trace(f,t[u],i+";"+u);else if(u==="*")r.walk(u,f,t,i,function(n,t,i,u,f){r.trace(n+";"+i,u,f)});else if(u==="..")r.trace(f,t,i),r.walk(u,f,t,i,function(n,t,i,u,f){typeof u[n]=="object"&&r.trace("..;"+i,u[n],f+";"+n)});else if(/,/.test(u))for(var o=u.split(/'?,'?/),e=0,s=o.length;e<s;e++)r.trace(o[e]+";"+f,t,i);else/^\(.*?\)$/.test(u)?r.trace(r.eval(u,t,i.substr(i.lastIndexOf(";")+1))+";"+f,t,i):/^\?\(.*?\)$/.test(u)?r.walk(u,f,t,i,function(n,t,i,u,f){r.eval(t.replace(/^\?\((.*?)\)$/,"$1"),u[n],n)&&r.trace(n+";"+i,u,f)}):/^(-?[0-9]*):(-?[0-9]*):?([0-9]*)$/.test(u)&&r.slice(u,f,t,i);else r.store(i,t)},walk:function(n,t,i,r,u){var f,o,e;if(i instanceof Array)for(f=0,o=i.length;f<o;f++)f in i&&u(f,n,t,i,r);else if(typeof i=="object")for(e in i)i.hasOwnProperty(e)&&u(e,n,t,i,r)},slice:function(n,t,i,u){var s;if(i instanceof Array){var o=i.length,f=0,e=o,h=1;for(n.replace(/^(-?[0-9]*):(-?[0-9]*):?(-?[0-9]*)$/g,function(n,t,i,r){f=parseInt(t||f);e=parseInt(i||e);h=parseInt(r||h)}),f=f<0?Math.max(0,f+o):Math.min(o,f),e=e<0?Math.max(0,e+o):Math.min(o,e),s=f;s<e;s+=h)r.trace(s+";"+t,i,u)}},eval:function(x,_v,_vname){try{return u&&_v&&eval(x.replace(/@/g,"_v"))}catch(e){throw new SyntaxError("jsonPath: "+e.message+": "+x.replace(/@/g,"_v").replace(/\^/g,"_a"));}}},u=n;if(t&&n&&(r.resultType=="VALUE"||r.resultType=="PATH"))return r.trace(r.normalize(t).replace(/^\$;/,""),n,"$"),r.result.length?r.result:!1}