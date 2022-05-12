// # Javascript Reference/wp-media
// https://codex.wordpress.org/Javascript_Reference/wp.media
jQuery(function ($) {
    $('body').on('click', '.wpar_upload_image_button', function (e) {
        e.preventDefault();

        var button = $(this),
            wpar_uploader = wp.media({
                title: 'Custom image',
                library: {
                    type: 'image'
                },
                button: {
                    text: 'Use this image'
                },
                multiple: false
            }).on('select', function () {
                var attachment = wpar_uploader.state().get('selection').first().toJSON();

                $('#cf-image').val(attachment.url);
                $('#img-div').attr("src", attachment.url);
            })
                .open();
    });
});