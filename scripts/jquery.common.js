$(document).ready(function(){
	var mst;
	jQuery(".shopClass > h3").hover(function(){
	var curItem = jQuery(this);
	mst = setTimeout(function(){//延时触发
		curItem.find(".shopClass > .shopClass_list").slideDown('fast');
		alert("ddd");
		mst = null;
	});
	}, function(){
	if(mst!=null)clearTimeout(mst);
	jQuery(this).find(".shopClass_list").slideUp('fast');
		alert("ddd");
	});
});