/*

    Copyright (c) 2011 Peter van der Spek

    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included in
    all copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
    THE SOFTWARE.
    
 */
(function(a){var j={};var h;var i=false;var c={ellipsis:"...",setTitle:"never",live:false,maxWords:10};a.fn.ellipsis=function(q,p){var s,r;s=a(this);if(typeof q!=="string"){p=q;q=undefined}r=a.extend({},c,p);r.selector=q;s.each(function(){var t=a(this);e(t,r)});if(r.live){b(s.selector,r)}else{k(s.selector)}return this};function e(q,u){var p=q.data("jqae");if(!p){p={}}var v=p.wrapperElement;if(!v){v=q.wrapInner("<div/>").find(">div");v.css({margin:0,padding:0,border:0})}var w=v.data("jqae");if(!w){w={}}var y=w.originalContent;if(y){v=w.originalContent.clone(true).data("jqae",{originalContent:y}).replaceAll(v)}else{v.data("jqae",{originalContent:v.clone(true)})}q.data("jqae",{wrapperElement:v,containerWidth:q.width(),containerHeight:q.height()});var r=q.height();var x=(parseInt(q.css("padding-top"),10)||0)+(parseInt(q.css("border-top-width"),10)||0)-(v.offset().top-q.offset().top);var s=false;var t=v;if(u.selector){t=a(v.find(u.selector).get().reverse())}t.each(function(){var B=a(this),A=B.text(),z=false;if(v.innerHeight()-B.innerHeight()>r+x){B.remove()}else{l(B);if(B.contents().length){if(s){g(B).get(0).nodeValue+=u.ellipsis;s=false}while(v.innerHeight()>r+x){z=f(B,u.maxWords);if(z){l(B);if(B.contents().length){g(B).get(0).nodeValue+=u.ellipsis}else{s=true;B.remove();break}}else{s=true;B.remove();break}}if(((u.setTitle=="onEllipsis")&&z)||(u.setTitle=="always")){B.attr("title",A)}else{if(u.setTitle!="never"){B.removeAttr("title")}}}}})}function m(p){var t=p.length,u;var r=0;for(var q=0;q<t;q++){u=p.charCodeAt(q);while(u>0){r++;u=u>>8}}return r}function n(t,q,r){if(r==null){r=q}var s=t.substring(0,q);var p=m(s);if(p>r){return n(t,q-1,r)}return s}function f(p,r){var q=g(p);if(q.length){var t=q.get(0).nodeValue;var s=t.lastIndexOf(" ");if(s>-1){t=a.trim(t.substring(0,s));q.get(0).nodeValue=t}else{t=a.trim(n(t,r));q.get(0).nodeValue=t}return true}return false}function g(q){if(q.contents().length){var p=q.contents();var r=p.eq(p.length-1);if(r.filter(o).length){return r}else{return g(r)}}else{q.append("");var p=q.contents();return p.eq(p.length-1)}}function l(q){if(q.contents().length){var p=q.contents();var r=p.eq(p.length-1);if(r.filter(o).length){var s=r.get(0).nodeValue;s=a.trim(s);if(s==""){r.remove();return true}else{return false}}else{while(l(r)){}if(r.contents().length){return false}else{r.remove();return true}}}return false}function o(){return this.nodeType===3}function b(q,p){j[q]=p;if(!h){h=window.setInterval(function(){d()},200)}}function k(p){if(j[p]){delete j[p];if(!j.length){if(h){window.clearInterval(h);h=undefined}}}}function d(){if(!i){i=true;for(var p in j){a(p).each(function(){var r,q;r=a(this);q=r.data("jqae");if((q.containerWidth!=r.width())||(q.containerHeight!=r.height())){e(r,j[p])}})}i=false}}})(jQuery);