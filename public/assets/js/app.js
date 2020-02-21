$(document).ready(function(){
    $(".alert").fadeTo(5000, 500).slideUp(500, function(){
        $(".alert").alert('close');
    });

    $('.dropdown')
        .mouseenter(function(){
            $(this).addClass('focus');
        })
        .mouseleave(function(){
            $(this).removeClass('focus');
        });

    // pass along the csfr token header on every AJAX request
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            }
        });
    });

    // CKEDITOR.replaceAll('ckeditor');
    // $('.ckeditor').trumbowyg();
    sizeContent();
    init_erasers();
});

//Every resize of window
$(window).resize(sizeContent);

//Dynamically assign height
function sizeContent() {
    let windowHeight = $(window).height();
    let contentHeight = windowHeight - 160 + "px";

    $("#content-container").css("min-height", contentHeight);
}

// Confirm delete
function init_erasers(){
    $('.eraser').on('click', function(e){
        if(!confirm("Confirmez la suppression"))
        {
            e.preventDefault();
        }
    });
}
