!function(t){var e,i,n,a,o,d,c,r,s,h,l,f,p,g=0,b={},u=[],y=0,w={},m=[],v=null,x=new Image,I=/\.(jpg|gif|png|bmp|jpeg|webp)(.*)?$/i,C=/[^\.]\.(swf)\s*$/i,k=/[^\.]\.(svg)\s*$/i,j=1,O=0,T="",A=!1,D=t.extend(t("<div/>")[0],{prop:0}),S=navigator.userAgent.match(/msie [6]/i)&&!window.XMLHttpRequest,F=void 0!==document.createTouch,E=function(){i.hide(),x.onerror=x.onload=null,v&&v.abort(),e.empty()},N=function(){return!1===b.onError(u,g,b)?(i.hide(),void(A=!1)):(b.titleShow=!1,b.width="auto",b.height="auto",e.html('<p id="fancybox-error">The requested content cannot be loaded.<br />Please try again later.</p>'),void P())},B=function(){var n,a,o,c,r,s,h=u[g]
if(E(),b=t.extend({},t.fn.fancybox.defaults,void 0===t(h).data("fancybox")?b:t(h).data("fancybox")),s=b.onStart(u,g,b),s===!1)return void(A=!1)
if("object"==typeof s&&(b=t.extend(b,s)),o=b.title||(h.nodeName?t(h).attr("title"):h.title)||"",h.nodeName&&!b.orig&&(b.orig=t(h).children("img:first").length?t(h).children("img:first"):t(h)),""===o&&b.orig&&(o=b.orig.attr(b.titleFromAlt?"alt":"title")),n=b.href||(h.nodeName?t(h).attr("href"):h.href)||null,(/^(?:javascript)/i.test(n)||"#"==n)&&(n=null),b.type?(a=b.type,n||(n=b.content)):b.content?a="html":n&&(a=n.match(I)||t(h).hasClass("image")?"image":n.match(C)?"swf":n.match(k)?"svg":t(h).hasClass("iframe")?"iframe":0===n.indexOf("#")?"inline":"ajax"),!a)return void N()
switch("inline"==a&&(h=n.substr(n.indexOf("#")),a=t(h).length>0?"inline":"ajax"),b.type=a,b.href=n,b.title=o,b.autoDimensions&&("html"==b.type||"inline"==b.type||"ajax"==b.type?(b.width="auto",b.height="auto"):b.autoDimensions=!1),b.modal&&(b.overlayShow=!0,b.hideOnOverlayClick=!1,b.hideOnContentClick=!1,b.enableEscapeButton=!1,b.showCloseButton=!1),b.padding=parseInt(b.padding,10),b.margin=parseInt(b.margin,10),e.css("padding",b.padding+b.margin),t(".fancybox-inline-tmp").off("fancybox-cancel").on("fancybox-change",function(){t(this).replaceWith(d.children())}),a){case"html":e.html(b.content),P()
break
case"inline":if(t(h).parent().is("#fancybox-content")===!0)return void(A=!1)
t('<div class="fancybox-inline-tmp" />').hide().insertBefore(t(h)).on("fancybox-cleanup",function(){t(this).replaceWith(d.children())}).on("fancybox-cancel",function(){t(this).replaceWith(e.children())}),t(h).appendTo(e),P()
break
case"image":A=!1,t.fancybox.showActivity(),x=new Image,x.onerror=function(){N()},x.onload=function(){A=!0,x.onerror=x.onload=null,z()},x.src=n
break
case"swf":b.scrolling="no",c='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="'+b.width+'" height="'+b.height+'"><param name="movie" value="'+n+'"></param>',r="",t.each(b.swf,function(t,e){c+='<param name="'+t+'" value="'+e+'"></param>',r+=" "+t+'="'+e+'"'}),c+='<embed src="'+n+'" type="application/x-shockwave-flash" width="'+b.width+'" height="'+b.height+'"'+r+"></embed></object>",e.html(c),P()
break
case"svg":b.scrolling="no",c='<object width="'+b.width+'" height="'+b.height+'" data="'+n+'"></object>',e.html(c),P()
break
case"ajax":A=!1,t.fancybox.showActivity(),b.ajax.win=b.ajax.success,v=t.ajax(t.extend({},b.ajax,{url:n,data:b.ajax.data||{},error:function(t){t.status>0&&N()},success:function(t,a,o){var d="object"==typeof o?o:v
if(200==d.status){if("function"==typeof b.ajax.win){if(s=b.ajax.win(n,t,a,o),s===!1)return void i.hide();("string"==typeof s||"object"==typeof s)&&(t=s)}e.html(t),P()}}}))
break
case"iframe":H()}},P=function(){var i=b.width,n=b.height,a=0==t(window).width()?window.innerWidth:t(window).width(),o=0==t(window).height()?window.innerHeight:t(window).height()
i=(""+i).indexOf("%")>-1?parseInt((a-2*b.margin)*parseFloat(i)/100,10)+"px":"auto"==i?"auto":i+"px",n=(""+n).indexOf("%")>-1?parseInt((o-2*b.margin)*parseFloat(n)/100,10)+"px":"auto"==n?"auto":n+"px",e.wrapInner('<div style="width:'+i+";height:"+n+";overflow: "+("auto"==b.scrolling?"auto":"yes"==b.scrolling?"scroll":"hidden")+';position:relative;"></div>'),b.width=e.width(),b.height=e.height(),H()},z=function(){b.width=x.width,b.height=x.height,t("<img />").attr({id:"fancybox-img",src:x.src,alt:b.title}).appendTo(e),H()},H=function(){var o,l
return i.hide(),a.is(":visible")&&!1===w.onCleanup(m,y,w)?(t(".fancybox-inline-tmp").trigger("fancybox-cancel"),void(A=!1)):(A=!0,t(d.add(n)).off(),t(window).off("resize.fb scroll.fb"),t(document).off("keydown.fb"),a.is(":visible")&&"outside"!==w.titlePosition&&a.css("height",a.height()),m=u,y=g,w=b,w.overlayShow?(n.css({"background-color":w.overlayColor,opacity:w.overlayOpacity,cursor:w.hideOnOverlayClick?"pointer":"auto",height:t(document).height()}),n.is(":visible")||(S&&t("select:not(#fancybox-tmp select)").filter(function(){return"hidden"!==this.style.visibility}).css({visibility:"hidden"}).one("fancybox-cleanup",function(){this.style.visibility="inherit"}),n.show())):n.hide(),p=Q(),M(),a.is(":visible")?(t(c.add(s).add(h)).hide(),o=a.position(),f={top:o.top,left:o.left,width:a.width(),height:a.height()},l=f.width==p.width&&f.height==p.height,void d.fadeTo(w.changeFade,.3,function(){var i=function(){d.html(e.contents()).fadeTo(w.changeFade,1,W)}
t(".fancybox-inline-tmp").trigger("fancybox-change"),d.empty().removeAttr("filter").css({"border-width":w.padding,width:p.width-2*w.padding,height:b.autoDimensions?"auto":p.height-O-2*w.padding}),l?i():(D.prop=0,t(D).animate({prop:1},{duration:w.changeSpeed,easing:w.easingChange,step:$,complete:i}))})):(a.removeAttr("style"),d.css("border-width",w.padding),"elastic"==w.transitionIn?(f=U(),d.html(e.contents()),a.show(),w.opacity&&(p.opacity=0),D.prop=0,void t(D).animate({prop:1},{duration:w.speedIn,easing:w.easingIn,step:$,complete:W})):("inside"==w.titlePosition&&O>0&&r.show(),d.css({width:p.width-2*w.padding,height:b.autoDimensions?"auto":p.height-O-2*w.padding}).html(e.contents()),void a.css(p).fadeIn("none"==w.transitionIn?0:w.speedIn,W))))},L=function(t){return t&&t.length?"float"==w.titlePosition?'<table id="fancybox-title-float-wrap" style="border-spacing:0;border-collapse:collapse"><tr><td id="fancybox-title-float-left"></td><td id="fancybox-title-float-main">'+t+'</td><td id="fancybox-title-float-right"></td></tr></table>':'<div id="fancybox-title-'+w.titlePosition+'">'+t+"</div>":!1},M=function(){if(T=w.title||"",O=0,r.empty().removeAttr("style").removeClass(),w.titleShow===!1)return void r.hide()
if(T=t.isFunction(w.titleFormat)?w.titleFormat(T,m,y,w):L(T),!T||""===T)return void r.hide()
switch(r.addClass("fancybox-title-"+w.titlePosition).html(T).appendTo("body").show(),w.titlePosition){case"inside":r.css({width:p.width-2*w.padding,marginLeft:w.padding,marginRight:w.padding}),O=r.outerHeight(!0),r.appendTo(o),p.height+=O
break
case"over":r.css({marginLeft:w.padding,width:p.width-2*w.padding,bottom:w.padding}).appendTo(o)
break
case"float":r.css("left",-1*parseInt((r.width()-p.width-40)/2,10)).appendTo(a)
break
default:r.css({width:p.width-2*w.padding,paddingLeft:w.padding,paddingRight:w.padding}).appendTo(a)}r.hide()},R=function(){return(w.enableEscapeButton||w.enableKeyboardNav)&&t(document).on("keydown.fb",function(e){27==e.keyCode&&w.enableEscapeButton?(e.preventDefault(),t.fancybox.close()):37!=e.keyCode&&39!=e.keyCode||!w.enableKeyboardNav||"INPUT"===e.target.tagName||"TEXTAREA"===e.target.tagName||"SELECT"===e.target.tagName||(e.preventDefault(),t.fancybox[37==e.keyCode?"prev":"next"]())}),w.showNavArrows?((w.cyclic&&m.length>1||0!==y)&&s.show(),void((w.cyclic&&m.length>1||y!=m.length-1)&&h.show())):(s.hide(),void h.hide())},W=function(){t.support.opacity||(d.get(0).style.removeAttribute("filter"),a.get(0).style.removeAttribute("filter")),b.autoDimensions&&d.css("height","auto"),a.css("height","auto"),T&&T.length&&r.show(),w.showCloseButton&&c.show(),R(),w.hideOnContentClick&&d.on("click",t.fancybox.close),w.hideOnOverlayClick&&n.on("click",t.fancybox.close),w.autoResize&&t(window).on("resize.fb",t.fancybox.resize),w.centerOnScroll&&t(window).on("scroll.fb",t.fancybox.center),t.fn.mousewheel&&a.on("mousewheel.fb",function(e,i){A?e.preventDefault():"image"!=w.type||0!=t(e.target).get(0).clientHeight&&t(e.target).get(0).scrollHeight!==t(e.target).get(0).clientHeight||(e.preventDefault(),t.fancybox[i>0?"prev":"next"]())}),"iframe"==w.type&&t('<iframe id="fancybox-frame" name="fancybox-frame'+(new Date).getTime()+'"'+(navigator.userAgent.match(/msie [6]/i)?' allowtransparency="true""':"")+' style="border:0;margin:0;overflow:'+("auto"==b.scrolling?"auto":"yes"==b.scrolling?"scroll":"hidden")+'" src="'+w.href+'"'+(!1===b.allowfullscreen?"":" allowfullscreen")+"></iframe>").appendTo(d),a.show(),A=!1,t.fancybox.center(),w.onComplete(m,y,w),K()},K=function(){var e,i
m.length-1>y&&(e=m[y+1].href,void 0!==e&&(e.match(I)||t(obj).hasClass("image"))&&(i=new Image,i.src=e)),y>0&&(e=m[y-1].href,void 0!==e&&(e.match(I)||t(obj).hasClass("image"))&&(i=new Image,i.src=e))},$=function(t){var e={width:parseInt(f.width+(p.width-f.width)*t,10),height:parseInt(f.height+(p.height-f.height)*t,10),top:parseInt(f.top+(p.top-f.top)*t,10),left:parseInt(f.left+(p.left-f.left)*t,10)}
void 0!==p.opacity&&(e.opacity=.5>t?.5:t),a.css(e),d.css({width:e.width-2*w.padding,height:e.height-O*t-2*w.padding})},q=function(){return[0==t(window).width()?window.innerWidth:t(window).width()-2*w.margin,0==t(window).height()?window.innerHeight:t(window).height()-2*w.margin,t(document).scrollLeft()+w.margin,t(document).scrollTop()+w.margin]},Q=function(){var t,e=q(),i={},n=w.autoScale,a=2*w.padding
return i.width=(""+w.width).indexOf("%")>-1?parseInt(e[0]*parseFloat(w.width)/100,10):w.width+a,i.height=(""+w.height).indexOf("%")>-1?parseInt(e[1]*parseFloat(w.height)/100,10):w.height+a,n&&(i.width>e[0]||i.height>e[1])&&("image"==b.type||"svg"==b.type||"swf"==b.type?(t=w.width/w.height,i.width>e[0]&&(i.width=e[0],i.height=parseInt((i.width-a)/t+a,10)),i.height>e[1]&&(i.height=e[1],i.width=parseInt((i.height-a)*t+a,10))):(i.width=Math.min(i.width,e[0]),i.height=Math.min(i.height,e[1]))),i.top=parseInt(Math.max(e[3]-20,e[3]+.5*(e[1]-i.height-40)),10),i.left=parseInt(Math.max(e[2]-20,e[2]+.5*(e[0]-i.width-40)),10),i},X=function(t){var e=t.offset()
return e.top+=parseInt(t.css("paddingTop"),10)||0,e.left+=parseInt(t.css("paddingLeft"),10)||0,e.top+=parseInt(t.css("border-top-width"),10)||0,e.left+=parseInt(t.css("border-left-width"),10)||0,e.width=t.width(),e.height=t.height(),e},U=function(){var e,i,n=b.orig?t(b.orig):!1,a={}
return n&&n.length?(e=X(n),a={width:e.width+2*w.padding,height:e.height+2*w.padding,top:e.top-w.padding-20,left:e.left-w.padding-20}):(i=q(),a={width:2*w.padding,height:2*w.padding,top:parseInt(i[3]+.5*i[1],10),left:parseInt(i[2]+.5*i[0],10)}),a},G=function(){return i.is(":visible")?(t("div",i).css("top",-40*j+"px"),void(j=(j+1)%12)):void clearInterval(l)}
t.fn.fancybox=function(e){return t(this).length?(t(this).data("fancybox",t.extend({},e,t.metadata?t(this).metadata():{})).off("click.fb").on("click.fb",function(e){if(e.preventDefault(),!A){A=!0,t(this).blur(),u=[],g=0
var i=t(this).attr("rel")||""
i&&""!=i&&"nofollow"!==i?(u=t('a[rel="'+i+'"], area[rel="'+i+'"]'),g=u.index(this)):u.push(this),B()}}),this):this},t.fancybox=function(e){var i
if(!A){if(A=!0,i=void 0!==arguments[1]?arguments[1]:{},u=[],g=parseInt(i.index,10)||0,t.isArray(e)){for(var n=0,a=e.length;a>n;n++)"object"==typeof e[n]?t(e[n]).data("fancybox",t.extend({},i,e[n])):e[n]=t({}).data("fancybox",t.extend({content:e[n]},i))
u=jQuery.merge(u,e)}else"object"==typeof e?t(e).data("fancybox",t.extend({},i,e)):e=t({}).data("fancybox",t.extend({content:e},i)),u.push(e);(g>u.length||0>g)&&(g=0),B()}},t.fancybox.showActivity=function(){clearInterval(l),i.show(),l=setInterval(G,66)},t.fancybox.hideActivity=function(){i.hide()},t.fancybox.next=function(){return t.fancybox.pos(y+1)},t.fancybox.prev=function(){return t.fancybox.pos(y-1)},t.fancybox.pos=function(t){A||(t=parseInt(t),u=m,t>-1&&t<m.length?(g=t,B()):w.cyclic&&m.length>1&&(g=t>=m.length?0:m.length-1,B()))},t.fancybox.cancel=function(){A||(A=!0,t(".fancybox-inline-tmp").trigger("fancybox-cancel"),E(),b.onCancel(u,g,b),A=!1)},t.fancybox.close=function(){function e(){n.fadeOut("fast"),r.empty().hide(),a.hide(),t(".fancybox-inline-tmp").trigger("fancybox-cleanup"),d.empty(),w.onClosed(m,y,w),m=b=[],y=g=0,w=b={},A=!1}if(!A&&!a.is(":hidden")){if(A=!0,w&&!1===w.onCleanup(m,y,w))return void(A=!1)
if(E(),t(c.add(s).add(h)).hide(),t(d.add(n)).off(),t(window).off("resize.fb scroll.fb mousewheel.fb"),t(document).off("keydown.fb"),d.find("iframe#fancybox-frame").attr("src",S&&/^https/i.test(window.location.href||"")?"javascript:void(false)":"about:blank"),"inside"!==w.titlePosition&&r.empty(),a.stop(),"elastic"==w.transitionOut){f=U()
var i=a.position()
p={top:i.top,left:i.left,width:a.width(),height:a.height()},w.opacity&&(p.opacity=1),r.empty().hide(),D.prop=1,t(D).animate({prop:0},{duration:w.speedOut,easing:w.easingOut,step:$,complete:e})}else a.fadeOut("none"==w.transitionOut?0:w.speedOut,e)}},t.fancybox.resize=function(){n.is(":visible")&&n.css("height",t(document).height()),t.fancybox.center(!0)},t.fancybox.center=function(){var t,e
A||(e=arguments[0]===!0?1:0,t=q(),(e||!(a.width()>t[0]||a.height()>t[1]))&&a.stop().animate({top:parseInt(Math.max(t[3]-20,t[3]+.5*(t[1]-d.height()-40)-w.padding)),left:parseInt(Math.max(t[2]-20,t[2]+.5*(t[0]-d.width()-40)-w.padding))},"number"==typeof arguments[0]?arguments[0]:200))},t.fancybox.init=function(){t("#fancybox-wrap").length||(t("body").append(e=t('<div id="fancybox-tmp"></div>'),i=t('<div id="fancybox-loading"><div></div></div>'),n=t('<div id="fancybox-overlay"></div>'),a=t('<div id="fancybox-wrap"></div>')),o=t('<div id="fancybox-outer"></div>').append('<div class="fancybox-bg" id="fancybox-bg-n"></div><div class="fancybox-bg" id="fancybox-bg-ne"></div><div class="fancybox-bg" id="fancybox-bg-e"></div><div class="fancybox-bg" id="fancybox-bg-se"></div><div class="fancybox-bg" id="fancybox-bg-s"></div><div class="fancybox-bg" id="fancybox-bg-sw"></div><div class="fancybox-bg" id="fancybox-bg-w"></div><div class="fancybox-bg" id="fancybox-bg-nw"></div>').appendTo(a),o.append(d=t('<div id="fancybox-content"></div>'),c=t('<a id="fancybox-close"></a>'),r=t('<div id="fancybox-title"></div>'),s=t('<a href="javascript:;" id="fancybox-left"><span class="fancy-ico" id="fancybox-left-ico"></span></a>'),h=t('<a href="javascript:;" id="fancybox-right"><span class="fancy-ico" id="fancybox-right-ico"></span></a>')),c.click(t.fancybox.close),i.click(t.fancybox.cancel),s.click(function(e){e.preventDefault(),t.fancybox.prev()}),h.click(function(e){e.preventDefault(),t.fancybox.next()}),t.support.opacity||a.addClass("fancybox-ie"),S&&(i.addClass("fancybox-ie6"),a.addClass("fancybox-ie6"),t('<iframe id="fancybox-hide-sel-frame" src="'+(/^https/i.test(window.location.href||"")?"javascript:void(false)":"about:blank")+'" style="overflow:hidden;border:0" tabindex="-1"></iframe>').prependTo(o)))},t.fn.fancybox.defaults={padding:10,margin:40,opacity:!1,modal:!1,cyclic:!1,allowfullscreen:!1,scrolling:"auto",width:560,height:340,autoScale:!0,autoDimensions:!0,centerOnScroll:!F,autoResize:!0,ajax:{},swf:{wmode:"transparent"},svg:{wmode:"transparent"},hideOnOverlayClick:!0,hideOnContentClick:!1,overlayShow:!0,overlayOpacity:.7,overlayColor:"#777",titleShow:!0,titlePosition:"float",titleFormat:null,titleFromAlt:!1,transitionIn:"fade",transitionOut:"fade",speedIn:300,speedOut:300,changeSpeed:300,changeFade:"fast",easingIn:"swing",easingOut:"swing",showCloseButton:!0,showNavArrows:!0,enableEscapeButton:!0,enableKeyboardNav:!0,onStart:function(){},onCancel:function(){},onComplete:function(){},onCleanup:function(){},onClosed:function(){},onError:function(){}},t(document).ready(function(){t.fancybox.init()})}(jQuery);