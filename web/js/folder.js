$(function() {
    $('tr[data-row]').dblclick(function(e) {
        if (!$(e.target).hasClass("dropdown-toggle")) {
            window.location = $(this).first('td').find('a[data-name]').attr('href');
        }
    });

    $('.pdf').click(function (e) {
        e.preventDefault();

        $.fancybox({
            'width' : '90%',
            'height' : '90%',
            'autoSize' : false,
            'content': '<embed src="'+this.href+'#nameddest=self&page=1&view=FitH,0&zoom=80,0,0" type="application/pdf" height="99%" width="100%" />'
        });
    });
});