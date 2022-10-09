// jQuery.noConflict();
$(document).ready(function() {
    
    // TABS
    $('.tabs > ul > li').on('click', function (e) {
        e.preventDefault();
        let $this = $(this)
        $this.siblings().removeClass('is-active')
        $this.addClass('is-active')

        let content_id = '#content-' + $this.data('content')
        $(content_id).siblings().css('display', 'none')
        $(content_id).css('display', 'block')
    })

    // MODAL
    $('button[data-modal], a[data-modal]').on('click', function(e) {
        e.preventDefault();
        let modal = $(this).data('modal')
        $('#' + modal).addClass('is-active'); 
        // $(".modal").addClass('is-active'); 
    });

    $('.modal-close, .modal-background').on('click', function(e) {
        $('.modal').removeClass('is-active');
    });
});