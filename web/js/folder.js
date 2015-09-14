$(function() {
    $('tr[data-row]').dblclick(function(e) {
        if (!$(e.target).hasClass("dropdown-toggle")) {
            window.location = $(this).first('td').find('a[data-name]').attr('href');
        }
    });

    $('#newFolderModal').on('shown.bs.modal', function () {
        var modal = $(this);
        modal.find('input.form-control').focus();
    });

    $('#newFileModal').on('show.bs.modal', function () {
        var modal = $(this);
        modal.find('button[type="submit"]').attr("disabled", true);
        modal.find('input[type="file"]').click().on('change', function () {
            modal.find('button[type="submit"]').attr("disabled", false);
            modal.find('div.alert').remove();

            var $this = $(this);
            var file = $this[0].files[0];

            modal.find('input#ag_vaultbundle_file_name').val(file.name);

            // Make sure we have a pdf
            if(file.type != 'application/pdf' && file.type != 'application/x-pdf' && file.type != 'application/x-download'){
                modal.find('form').append('<div class="alert alert-danger">Ce fichier n\'est pas un pdf.</div>');
                modal.find('button[type="submit"]').attr("disabled", true);
            } else {
                modal.find('input.form-control').focus().select();
            }
        });
    });

    $('#renameModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var name = button.parents('tr').first('td').find('a[data-name]').text(); // Extract info from data-* attributes
        var modal = $(this);

        if (name.indexOf(".pdf") >= 0) name = name.replace(".pdf", "");

        modal.find('input.form-control').val(name).data('former-name', name).data('id', button.data('id'));
        modal.find('form').data('href', button.data('href'));
    }).on('shown.bs.modal', function () {
        var modal = $(this);
        modal.find('input.form-control').select();
    }).find('form').on('submit', function (e) {
        e.preventDefault();

        var form = $(this);
        var input = form.find('input#newName');
        var formerName = input.data('former-name');
        var newName = input.val();

        if (newName != formerName) {
            var target = form.data('href');
            $.get(target, {name: newName }, function (data) {
                if(data.success) {
                    var $row = $('[data-'+data.type+'-id='+data.id+']');
                    var $text = $row.first('td').find('a[data-name]');

                    $('#renameModal').modal('hide');
                    input.data('former-name', data.name);
                    $text.fadeOut("slow", function () {
                        $text.text(data.name);
                        $text.fadeIn("slow");
                    });
                    if(data.type == 'folder') {
                        $text.prop('href', data.route);
                    }
                } else {
                    form.append('<div class="alert alert-danger">Une erreur est survenue. Veuillez contacter le big boss pour un petit service après-vente qui mets dans le bien.</div>');
                }
            });
        } else {
            $('#renameModal').modal('hide');
        }
    });

    $('#fileDetailsModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var href = button.data('details'); // Extract info from data-* attributes
        var name = button.parents('tr').first('td').find('a[data-name]').text();
        var modal = $(this);

        modal.find('span.filename').text(name);
        $.get(href, function(data) {
            modal.find('.container-fluid').text("").append(data);
        });
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