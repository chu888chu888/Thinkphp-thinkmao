$(function () {
	$('#pic-ul li').click(function () {
                            $('#pic-ul li').css("border","solid 1px #ccc");
                           $(this).css("border","solid 2px #E00001");
		var pic = $(this).find('input');
		var medium = pic.eq(0).val();
		var max = pic.eq(1).val();
		$('.img-medium').attr('href', max).find('img').attr('src', medium);
		$('.img-medium').next().remove();
		$('.img-medium').CloudZoom();
	});
})