require('./bootstrap');

$(document).ready(function() {
    $(document).on('click', '#showGallery', function(e) {
        e.preventDefault();
        $('section.gallery .row a:first').click();
    });
});
