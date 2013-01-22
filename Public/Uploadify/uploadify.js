var uploadOptions = {
	width : 120,
	height : 30,
	fileTypeDesc : 'Image Files',
	method : 'post',
	fileSizeLimit : '2MB',
    fileTypeExts : '*.gif; *.jpg; *.jpeg; *.png', 
	onUploadSuccess : function (file, data, reponse) {
		var name = this.settings.id;
		eval('data = ' + data);
		if (data.status) {
			var full = typeof data.path == 'string' ? false : true;
			var show = full ? data.path[0] : data.path;
			var element = '<div class="upload-img"><img src="' + show + '" width="' + uploadOptions.disWidth + '" height="' + uploadOptions.disHeight + '"/>';
				element += '<span class="upload-del" title="删除"></span>';
				if (full) {
					for (var i = 0; i < data.path.length; i++) {
						element += '<input type="hidden" name="' + name + '[' + i + ']' + '[]" value="' + data.path[i] + '"/>';
					}
				} else {
					element += '<input type="hidden" name="' + name + '" value="' + data.path + '"/>';
				}
				element += '</div>';
				$('#' + name).next().after(element).find('.uploadify-queue-item').fadeOut();
		} else {
			this.setStats({
                successful_uploads:this.queueData.uploadsSuccessful-1
            });
			alert(data.error);
		}
	}
}

$('.upload-del').live('click', function () {
	var obj = $(this);
	var input = obj.nextAll();
	var data = {};
	for (var i = 0; i < input.length; i++) {
		data[i] = input.eq(i).val();
	}
	$.post(uploadUrl, {'upload_del' : data}, function (data) {
		if (data) {
			var upload = obj.parent().prev().prev().data('uploadify');
			upload.setStats({
				successful_uploads:--upload.queueData.uploadsSuccessful
			});
			obj.parent().remove();
		} else {
			alert('文件删除失败');
		}
	}, 'json');
});