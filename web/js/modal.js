$(function() {
    // Modal for new folder
    $('#newFolderModal').on('shown.bs.modal', function () {
        var modal = $(this);
        modal.find('input.form-control').focus();
    });

    // Modal for new file
    $('#newFileModal').on('show.bs.modal', function () {
        var modal = $(this);
        modal.find('button[type="submit"]').attr("disabled", true);
        modal.find('input[type="file"]').click().on('change', function () {
            modal.find('button[type="submit"]').attr("disabled", false);
            modal.find('div.alert').remove();

            var $this = $(this);
            var file = $this[0].files[0];

            var typeAccepted = [
                'application/pdf',
                'application/x-pdf',
                'application/x-download',
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/x-png'
            ];

            // Make sure we have a pdf, jpeg or pngZ
            if (typeAccepted.indexOf(file.type) <= -1) {
                modal.find('form').append('<div class="alert alert-danger">This file is no pdf, jpeg or png.</div>');
                modal.find('button[type="submit"]').attr("disabled", true);
            // Make sure the file doesn't exceed the maximum size
            } else if (file.size > 64000000) {
                modal.find('form').append('<div class="alert alert-danger">This file exceeds maximum size allowed (64Mo).</div>');
                modal.find('button[type="submit"]').attr("disabled", true);
            } else {
                modal.find('input#ag_vaultbundle_file_name').val(file.name);
                modal.find('input.form-control').focus().select();
            }
        });
    });

    // Modal for renaming file or folder
    $('#renameModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var name = button.data('name').toString(); // Extract info from data-* attributes
        var modal = $(this);

        //if (name.indexOf(".pdf") >= 0) name = name.replace(".pdf", "");

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
                    var $text = $row.length > 0 ? $row.first('td').find('a[data-name]') : $('span.foldername');

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
                    form.append('<div class="alert alert-danger">An error occured. Please contant the big boss for an after sales service.</div>');
                }
            });
        } else {
            $('#renameModal').modal('hide');
        }
    });

    // Modal for retrieving file informations
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

    // Modal for generating a share link
    $('#shareLinkModal').on('show.bs.modal', function (event) {
        var modal = $(this);
        var button = $(event.relatedTarget); // Button that triggered the modal
        var href = button.data('get-link'); // Extract info from data-* attributes
        var name = button.parents('tr').first('td').find('a[data-name]').text();
        var loader = modal.find('.loader');
        var input = modal.find('.container-fluid input');

        input.hide().val("");
        modal.find('span.filename').text(name);
        loader.css('display', 'flex');
        $.get(href, function(data) {
            if (data.response) {
                loader.hide();
                input.show().val(data.route).select().focus();
            } else {
                alert('An error occured while generating sharing link.');
            }
        })
    });
});