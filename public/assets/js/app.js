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
    initCheckboxes();
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
    document.querySelectorAll('.eraser').forEach(el => {
        el.addEventListener('click', e => {
            if( ! confirm("Confirmez la suppression") ) {
                e.preventDefault();
            }
        })
    })
}

function initCheckboxes() {
    document.querySelectorAll('input[type=checkbox]:not(:checked)')?.forEach(el => {
        el.parentElement.classList.add('notchecked')
    })
    document.querySelectorAll('input[type=checkbox]:checked')?.forEach(el => {
        el.parentElement.classList.add('checked')
    })
    document.querySelectorAll('input[type=checkbox]')?.forEach((checkbox) => {
        checkbox.addEventListener('click', e => {
            if (e.target.parentElement.classList.contains('checked')) {
                e.target.parentElement.classList.remove('checked')
                e.target.parentElement.classList.add('notchecked')
            } else {
                e.target.parentElement.classList.remove('notchecked')
                e.target.parentElement.classList.add('checked')
            }
        })
    })
}
