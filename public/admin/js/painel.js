$(function() {
    /**
     * [invl-modal-toggle]
     */
    $(document).on('click', '[invl-modal-toggle]', function() {
        var modal = $(this).attr('invl-modal-toggle');
        $('.invl-modal').removeClass('show');
        if ($(modal).hasClass('show')) {
            $(modal).removeClass('show');
        } else {
            $(modal).addClass('show');
        }
    });
    /**
     * [invl-modal-hide]
     */
    $(document).on('click', '[invl-modal-hide]', function() {
        var modal = $(this).attr('invl-modal-hide');
        if ($(modal).hasClass('show')) {
            $(modal).removeClass('show');
        } else {
            $(modal).addClass('show');
        }
    });
});