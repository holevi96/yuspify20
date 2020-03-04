jQuery(document).ready(function(){
jQuery('.solution-label').each(function(index,item){
	jQuery(item).css('left',jQuery('.solution-img').width()*jQuery(item).attr('left')).css('top',jQuery('.solution-img').height()*jQuery(item).attr('top'));
})
    jQuery('.solution-label').hover(function(){
		
        var text = jQuery(this).attr('solDesc');
		jQuery('.solution-label').removeClass('active');
        jQuery(this).addClass('active');
        jQuery(this).parent().parent().find('.solution-desc').parent().animate({'opacity':0},100,function(){
            jQuery(this).find('.solution-desc').text(text)
        }).animate({'opacity':1},100)
    },function(){console.log('unhover')})
});