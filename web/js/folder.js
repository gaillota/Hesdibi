$(function() {
    $('.pdf').click(function (e) {
        e.preventDefault();

        $.fancybox({
            'width' : '98%',
            'height' : '98%',
            'autoSize' : false,
            'content': '<embed src="'+this.href+'#nameddest=self&page=1&view=FitH,0&zoom=80,0,0" type="application/pdf" height="99%" width="100%" />'
        });
    });
});