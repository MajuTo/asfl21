{{ HTML::script('assets/js/jquery-1.11.1.min.js') }}
{{ HTML::script('assets/bootstrap/js/bootstrap.min.js') }}

<script>
    $(".alert").fadeTo(5000, 500).slideUp(500, function(){
        $(".alert").alert('close');
    });
</script>

<script>
    $('.dropdown').mouseenter(function(){
        $(this).addClass('focus');
    });

    $('.dropdown').mouseleave(function(){
        $(this).removeClass('focus');
    });
</script>