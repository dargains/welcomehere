function _gambitRefreshScroll(){jQuery;_gambitScrollTop=window.pageYOffset,_gambitScrollLeft=window.pageXOffset}function _gambitParallaxAll(){_gambitRefreshScroll();for(var t=0;t<_gambitImageParallaxImages.length;t++)_gambitImageParallaxImages[t].doParallax()}if(function(){for(var t=["ms","moz","webkit","o"],i=0;i<t.length&&!window.requestAnimationFrame;++i)window.requestAnimationFrame=window[t[i]+"RequestAnimationFrame"];window.requestAnimationFrame||(window.requestAnimationFrame=function(t,i){return window.setTimeout(function(){t()},16)})}(),"undefined"==typeof _gambitImageParallaxImages)var _gambitImageParallaxImages=[],_gambitScrollTop,_gambitWindowHeight,_gambitScrollLeft,_gambitWindowWidth;!function(t,i,e,s){function a(i,e){this.element=i,this.settings=t.extend({},o,e),""===this.settings.align&&(this.settings.align="center"),""===this.settings.id&&(this.settings.id=+new Date),this._defaults=o,this._name=n,this.init()}var n="gambitImageParallax",o={direction:"up",mobileenabled:!1,mobiledevice:!1,width:"",height:"",align:"center",opacity:"1",velocity:".3",image:"",target:"",repeat:!1,loopScroll:"",loopScrollTime:"2",removeOrig:!1,zIndex:"-1",id:"",complete:function(){}};t.extend(a.prototype,{init:function(){""===this.settings.target&&(this.settings.target=t(this.element)),this.settings.target.addClass(this.settings.direction),""===this.settings.image&&"undefined"!=typeof t(this.element).css("backgroundImage")&&""!==t(this.element).css("backgroundImage")&&(this.settings.image=t(this.element).css("backgroundImage").replace(/url\(|\)|"|'/g,"")),_gambitImageParallaxImages.push(this),this.setup(),this.settings.complete(),this.containerWidth=0,this.containerHeight=0},setup:function(){this.settings.removeOrig!==!1&&t(this.element).remove(),this.resizeParallaxBackground()},doParallax:function(){if((!this.settings.mobiledevice||this.settings.mobileenabled)&&this.isInView()){"undefined"==typeof this.settings.inner&&(this.settings.inner=this.settings.target[0].querySelectorAll(".parallax-inner-"+this.settings.id)[0]);var t=this.settings.inner;("undefined"==typeof this.settings.doParallaxClientLastUpdate||+new Date-this.settings.doParallaxClientLastUpdate>2e3+1e3*Math.random())&&(this.settings.doParallaxClientLastUpdate=+new Date,this.settings.clientWidthCache=this.settings.target[0].clientWidth,this.settings.clientHeightCache=this.settings.target[0].clientHeight),0===this.containerWidth||0===this.containerHeight||this.settings.clientWidthCache===this.containerWidth&&this.settings.clientHeightCache===this.containerHeight||this.resizeParallaxBackground(),this.containerWidth=this.settings.clientWidthCache,this.containerHeight=this.settings.clientHeightCache;var i=(_gambitScrollTop-this.scrollTopMin)/(this.scrollTopMax-this.scrollTopMin),e=this.moveMax*i;("left"===this.settings.direction||"up"===this.settings.direction)&&(e*=-1);var s="translate3d(",a="px, 0px, 0px)",n="translate3d(0px, ",o="px, 0px)";"undefined"!=typeof _gambitParallaxIE9&&(s="translate(",a="px, 0px)",n="translate(0px, ",o="px)"),"no-repeat"===t.style.backgroundRepeat&&("down"===this.settings.direction&&0>e&&(e=0),"up"===this.settings.direction&&e>0&&(e=0)),"left"===this.settings.direction||"right"===this.settings.direction?(t.style.transition="transform 1ms linear",t.style.webkitTransform=s+e+a,t.style.transform=s+e+a):(t.style.transition="transform 1ms linear",t.style.webkitTransform=n+e+o,t.style.transform=n+e+o),t.style.transition="transform -1ms linear"}},isInView:function(){if("undefined"==typeof this.settings.offsetLastUpdate||+new Date-this.settings.offsetLastUpdate>4e3+1e3*Math.random()){this.settings.offsetLastUpdate=+new Date;var t=this.settings.target[0];this.settings.offsetTopCache=t.getBoundingClientRect().top+i.pageYOffset,this.settings.elemHeightCache=t.clientHeight}var e=this.settings.offsetTopCache,s=this.settings.elemHeightCache;return _gambitScrollTop>e+s||e>_gambitScrollTop+_gambitWindowHeight?!1:!0},computeCoverDimensions:function(t,i,e){var s=t/i,a=e.offsetWidth/e.offsetHeight;if(s>=a)var n=e.offsetHeight,o=n/i,r=t*o;else var r=e.offsetWidth,o=r/t,n=i*o;return r+"px "+n+"px"},resizeParallaxBackground:function(){var i=this.settings.target;if("undefined"!=typeof i&&0!==i.length){var e="true"===this.settings.repeat||this.settings.repeat===!0||1===this.settings.repeat;i[0].style.minHeight="150px";var s=i[0].getAttribute("class");if(s&&s.match(/full\-height/)&&(i[0].style.minHeight=""),"none"===this.settings.direction){var a=i.width()+parseInt(i.css("paddingRight"),10)+parseInt(i.css("paddingLeft"),10),n=i.offset().left;"center"===this.settings.align?n="50% 50%":"left"===this.settings.align?n="0% 50%":"right"===this.settings.align?n="100% 50%":"top"===this.settings.align?n="50% 0%":"bottom"===this.settings.align&&(n="50% 100%"),i.css({opacity:Math.abs(parseFloat(this.settings.opacity)/100),backgroundSize:"cover",backgroundAttachment:"scroll",backgroundPosition:n,backgroundRepeat:"no-repeat"}),""!==this.settings.image&&"none"!==this.settings.image&&i.css({opacity:Math.abs(parseFloat(this.settings.opacity)/100),backgroundImage:"url("+this.settings.image+")"})}else if("fixed"===this.settings.direction){var a=i.width()+parseInt(i.css("paddingRight"),10)+parseInt(i.css("paddingLeft"),10),o=_gambitWindowHeight,r="0%";"center"===this.settings.align?r="50%":"right"===this.settings.align&&(r="100%");var g=i.offset().left,h=!!navigator.userAgent.match(/MSIE/)||!!navigator.userAgent.match(/Trident.*rv[ :]*11\./)||!!navigator.userAgent.match(/Edge\/12/),l=!!navigator.userAgent.match(/Edge\/12/);!h&&i.find(".fixed-wrapper-"+this.settings.id).length<1&&t("<div></div>").addClass("fixed-wrapper-"+this.settings.id).prependTo(i),i.find(".parallax-inner-"+this.settings.id).length<1&&t("<div></div>").addClass("gambit_parallax_inner").addClass("parallax-inner-"+this.settings.id).addClass(this.settings.direction).prependTo(h?i:i.find(".fixed-wrapper-"+this.settings.id)),i.css({position:"relative",overflow:"hidden",zIndex:1}),i.find(".fixed-wrapper-"+this.settings.id).css({position:"absolute",top:0,left:0,right:0,bottom:0,clip:h?"auto":"rect(auto,auto,auto,auto)",webkitTransform:"none",transform:"none"}),i.find(".parallax-inner-"+this.settings.id).css({pointerEvents:"none",width:a,height:o,position:h?"absolute":"fixed",zIndex:this.settings.zIndex,top:0,left:h?0:g,opacity:Math.abs(parseFloat(this.settings.opacity)/100),backgroundSize:e?"auto":h?this.computeCoverDimensions(this.settings.width,this.settings.height,i[0].querySelectorAll(".parallax-inner-"+this.settings.id)[0]):"cover",backgroundAttachment:"fixed",backgroundPosition:e?"0 0 ":"50% 50%",backgroundRepeat:e?"repeat":"no-repeat",webkitTransform:"translateZ(0)",transform:"translateZ(0)"}),l&&(i.css({transform:"none",transformStyle:"flat"}),i.find(".parallax-inner-"+this.settings.id).css({transform:"none",transformStyle:"flat"})),""!==this.settings.image&&"none"!==this.settings.image&&i.find(".parallax-inner-"+this.settings.id).css({opacity:Math.abs(parseFloat(this.settings.opacity)/100),backgroundImage:"url("+this.settings.image+")"}),this.settings.mobiledevice&&!this.settings.mobileenabled&&i.find(".parallax-inner-"+this.settings.id).css({position:"absolute",backgroundAttachment:"initial",backgroundSize:"cover",left:"0",right:"0",bottom:"0",top:"0",height:"auto",width:"auto"})}else if("left"===this.settings.direction||"right"===this.settings.direction){var a=i.width()+parseInt(i.css("paddingRight"),10)+parseInt(i.css("paddingLeft"),10),o=i.height()+parseInt(i.css("paddingTop"),10)+parseInt(i.css("paddingBottom"),10),d=a;a+=400*Math.abs(parseFloat(this.settings.velocity));var c="0%";"center"===this.settings.align?c="50%":"bottom"===this.settings.align&&(c="100%");var g=0;"right"===this.settings.direction&&(g-=a-d),i.find(".parallax-inner-"+this.settings.id).length<1&&t("<div></div>").addClass("gambit_parallax_inner").addClass("parallax-inner-"+this.settings.id).addClass(this.settings.direction).prependTo(i),i.css({position:"relative",overflow:"hidden",zIndex:1}).find(".parallax-inner-"+this.settings.id).css({pointerEvents:"none",width:a,height:o,position:"absolute",zIndex:this.settings.zIndex,top:0,left:g,opacity:Math.abs(parseFloat(this.settings.opacity)/100),backgroundSize:e?"auto":this.computeCoverDimensions(this.settings.width,this.settings.height,i[0].querySelectorAll(".parallax-inner-"+this.settings.id)[0]),backgroundPosition:e?"0 0 ":"50% "+c,backgroundRepeat:e?"repeat":"no-repeat"}),""!==this.settings.image&&"none"!==this.settings.image&&i.find(".parallax-inner-"+this.settings.id).css({opacity:Math.abs(parseFloat(this.settings.opacity)/100),backgroundImage:"url("+this.settings.image+")"});var p=0;i.offset().top>_gambitWindowHeight&&(p=i.offset().top-_gambitWindowHeight);var m=i.offset().top+i.height()+parseInt(i.css("paddingTop"),10)+parseInt(i.css("paddingBottom"),10);this.moveMax=a-d,this.scrollTopMin=p,this.scrollTopMax=m}else{var f=800;"down"===this.settings.direction&&(f*=1.2);var a=i.width()+parseInt(i.css("paddingRight"),10)+parseInt(i.css("paddingLeft"),10),o=i.height()+parseInt(i.css("paddingTop"),10)+parseInt(i.css("paddingBottom"),10),u=o;o+=f*Math.abs(parseFloat(this.settings.velocity));var g="0%";"center"===this.settings.align?g="50%":"right"===this.settings.align&&(g="100%");var c=0;"down"===this.settings.direction&&(c-=o-u),i.find(".parallax-inner-"+this.settings.id).length<1&&t("<div></div>").addClass("gambit_parallax_inner").addClass("parallax-inner-"+this.settings.id).addClass(this.settings.direction).prependTo(i),i.css({position:"relative",overflow:"hidden",zIndex:1}).find(".parallax-inner-"+this.settings.id).css({pointerEvents:"none",width:a,height:o,position:"absolute",zIndex:this.settings.zIndex,top:c,left:0,opacity:Math.abs(parseFloat(this.settings.opacity)/100),backgroundSize:e?"auto":this.computeCoverDimensions(this.settings.width,this.settings.height,i[0].querySelectorAll(".parallax-inner-"+this.settings.id)[0]),backgroundPosition:e?"0":g+" 50%",backgroundRepeat:e?"repeat":"no-repeat"}),""!==this.settings.image&&"none"!==this.settings.image&&i.find(".parallax-inner-"+this.settings.id).css({opacity:Math.abs(parseFloat(this.settings.opacity)/100),backgroundImage:"url("+this.settings.image+")"});var p=0;i.offset().top>_gambitWindowHeight&&(p=i.offset().top-_gambitWindowHeight);var m=i.offset().top+i.height()+parseInt(i.css("paddingTop"),10)+parseInt(i.css("paddingBottom"),10);this.moveMax=o-u,this.scrollTopMin=p,this.scrollTopMax=m}}}}),t.fn[n]=function(i){return this.each(function(){t.data(this,"plugin_"+n)||t.data(this,"plugin_"+n,new a(this,i))}),this}}(jQuery,window,document),jQuery(document).ready(function(t){"use strict";function i(){_gambitRefreshScroll();for(var t=0;t<_gambitImageParallaxImages.length;t++)_gambitImageParallaxImages[t].doParallax();requestAnimationFrame(i)}function e(){_gambitScrollTop=window.pageYOffset,_gambitWindowHeight=window.innerHeight,_gambitScrollLeft=window.pageXOffset,_gambitWindowWidth=window.innerWidth}t(window).on("scroll touchmove touchstart touchend gesturechange mousemove",function(t){requestAnimationFrame(_gambitParallaxAll)}),navigator.userAgent.match(/(Mobi|Android)/)&&requestAnimationFrame(i),t(window).on("grid:items:added",function(){setTimeout(function(){var t=jQuery;e(),t.each(_gambitImageParallaxImages,function(t,i){i.resizeParallaxBackground()})},1)}),t(window).on("resize",function(){setTimeout(function(){var t=jQuery;e(),t.each(_gambitImageParallaxImages,function(t,i){i.resizeParallaxBackground()})},1)}),setTimeout(function(){var t=jQuery;e(),t.each(_gambitImageParallaxImages,function(t,i){i.resizeParallaxBackground()})},1),setTimeout(function(){var t=jQuery;e(),t.each(_gambitImageParallaxImages,function(t,i){i.resizeParallaxBackground()})},100)});