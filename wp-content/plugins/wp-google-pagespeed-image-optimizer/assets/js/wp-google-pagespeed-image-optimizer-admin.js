jQuery(document).ready(function(){
	'use strict';
	
	jQuery(document).on('click','a[data-optimize-single]',function(event){
		event.preventDefault();

		var element = jQuery(this);
		var attachmentid = jQuery(this).attr('data-optimize-single');

		jQuery.ajax({
			type : "get",
			dataType : "html",
			url : ajaxurl,
			data : {action: "bulk_optimize_single_image_ajax", attachment_id: attachmentid},
			success: function(data)
			{
				var res = JSON.parse(data);
				jQuery(element).parent().html(res.savings);
			}
		});
	});

	jQuery(document).on('click','a[data-restore-backup]',function(event){
		event.preventDefault();

		var element = jQuery(this);
		var attachmentid = jQuery(this).attr('data-restore-backup');

		jQuery.ajax({
			type : "get",
			dataType : "html",
			url : ajaxurl,
			data : {action: "restore_backup_ajax", attachment_id: attachmentid},
			success: function(data)
			{
				console.log(data);
				element.parent().parent().find('span:eq(1)').html('Optimized file: File not yet optimized.');
				element.parent().parent().find('span:eq(2)').remove();
				element.parent().parent().find('br:eq(2)').remove();
				element.parent().html('<a href="#" class="optimize-this-button" data-optimize-single="'+attachmentid+'">Optimize this file only</a>');
			}
		});
	});
});