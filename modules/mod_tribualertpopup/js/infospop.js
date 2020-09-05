function initinfospop(moduleid) {
	var temp = 0;
	var text=jQuery("#"+moduleid).html();
	jQuery('body').prepend(text);
	
	jQuery("#"+moduleid).remove();
	var height = jQuery(document).outerHeight();
	jQuery("#infosfullscreen_"+moduleid).height(height);
	
	jQuery("#infosfullscreen_"+moduleid).hide();

	jQuery('#closeinfos_'+moduleid).click(function () { jQuery("#infosfullscreen_"+moduleid).hide(); });
	jQuery('#infosfullscreen_'+moduleid).click(function (e) { 
		if(e.target.id === "infosfullscreen_"+moduleid)
		{
		  jQuery("#infosfullscreen_"+moduleid).hide();
		}
		
	});
	jQuery( ".informationsbanner a" ).click(function( event ) {
			event.preventDefault();
	});
};

function positionpop(moduleid) {
	var width=jQuery("#infospopupwidth_"+moduleid).val();
	if(width > jQuery(window).width()) {
		jQuery('#infosposition_'+moduleid).css('width',$(window).width()-20+'px');
	} else {
		if(width.substring(width.length-1) != "%")
			width=width+'px';
		jQuery('#infosposition_'+moduleid).css('width',width);
	}
	
	var height = jQuery('#infosposition_'+moduleid).height();
	if(height > jQuery(window).height()) {
		jQuery('#infosposition_'+moduleid).css('height',$(window).height()-20+'px');
		jQuery('#infosposition_'+moduleid).css('margin-top','10px');
	} else {
		var top = (jQuery(window).height() - height) / 2;
		jQuery('#infosposition_'+moduleid).css('margin-top',top+'px');
	}
}

function showinfospop(moduleid) {
	jQuery("#infosfullscreen_"+moduleid).show();
	var temp = 0;
	var zetimer=jQuery("#infostimer_"+moduleid).val();
	var fermcl=jQuery('#closeinfos_'+moduleid).val();
	if  (zetimer!=0){
		timetmp=zetimer*1000;
		// timer
		for (i=zetimer ;i > -1;i--){
			setTimeout("jQuery('#closeinfos_"+moduleid+"').val('"+fermcl+" "+i+"');",temp);
			temp+=1000;
			if (temp==timetmp){ setTimeout("jQuery('#infosfullscreen_"+moduleid+"').hide();",temp);	}
		}
	}
	
	positionpop(moduleid);
};