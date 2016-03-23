{{ HTML::script('assets/js/jquery-1.11.1.min.js') }}
{{ HTML::script('assets/bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('//cdn.ckeditor.com/4.5.7/basic/ckeditor.js') }}
<script>
    $(document).ready(function(){
        $(".alert").fadeTo(5000, 500).slideUp(500, function(){
            $(".alert").alert('close');
        });

        $('.dropdown').mouseenter(function(){
            $(this).addClass('focus');
        });

        $('.dropdown').mouseleave(function(){
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

    });
</script>

<script>
    //Initial load of page
    $(document).ready( function(){
        CKEDITOR.replaceAll('ckeditor');
        sizeContent();
        init_erasers();
    });

    //Every resize of window
    $(window).resize(sizeContent);

    //Dynamically assign height
    function sizeContent() {
        var windowHeight = $(window).height();
        var contentHeight = windowHeight - 160 + "px";
            
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

</script>