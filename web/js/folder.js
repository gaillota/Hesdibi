$(function() {
    $('.file').click(function (e) {
        e.preventDefault();

        var mimeType = $(this).data('mime');
        var content = '<embed src="'+this.href+'#nameddest=self&page=1&view=fitH,fitV&zoom=80,0,0" type="' + mimeType + '" height="100%" width="100%"/>';
        if (mimeType.indexOf('image') > -1) {
            content = '<img class="center-block" src="' + this.href + '" />';
        }

        $.fancybox({
            'width' : '100%',
            'height' : '100%',
            'autoSize' : false,
            'padding' : 0,
            'scrolling' : 'no',
            'content': content
        });
    });
});