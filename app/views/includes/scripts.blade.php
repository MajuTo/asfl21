{{ HTML::script('assets/js/jquery-1.11.1.min.js') }}
{{ HTML::script('assets/bootstrap/js/bootstrap.min.js') }}
<!-- GSAP -->
{{ HTML::script('assets/greensock/TweenMax.min.js') }}
<!-- Vertical Timeline reset -->
<!-- {{ HTML::script('assets/vertical-timeline/js/modernizr.js') }} -->


<script>
    $(document).ready(function(){
        TweenMax.from('.animate-page-title', 2, {x: 760, opacity: 0});

        $(".alert").fadeTo(5000, 500).slideUp(500, function(){
            $(".alert").alert('close');
        });

        $('.dropdown').mouseenter(function(){
            $(this).addClass('focus');
        });

        $('.dropdown').mouseleave(function(){
            $(this).removeClass('focus');
        });

    });
</script>

<script>
    //Initial load of page
    $(document).ready(sizeContent);

    //Every resize of window
    $(window).resize(sizeContent);

    //Dynamically assign height
    function sizeContent() {
        var newHeight = $(window).height() - 135 + "px";
        $(".content-container").css("height", newHeight);
    }
</script>