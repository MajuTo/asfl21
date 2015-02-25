@foreach ($sagesfemmes as $sf) 
<tr>
   <td class="sf-tr" data-sf="{{ $sf->id }}" id="{{ $sf->id }}">{{{ Str::upper($sf->name) }}} {{{ Str::title($sf->firstname) }}}</td>
   <td><a href="{{ URL::route('user.show', $sf->id) }}"><i id="tooltip-sf" class="fa fa-envelope" data-toggle="tooltip" data-placement="left" title="Contact"></i></a></td>
</tr>
@endforeach

<script>
    $(document).ready(function(){

      function toggleMarkers(){
        if ($('.sf-tr').hasClass('sf-tr-selected')) {
          for(i=0; i<markers.length; i++){
            markers[i].setVisible(false);
          }

          $('.sf-tr-selected').each(function(){
            var sf = $(this).data('sf');

            for(i=0; i<markers.length; i++){
              if ( sf == markers[i]['id']) {
                markers[i].setVisible(true)
              };
            }
          });

        } else {
          for(i=0; i<markers.length; i++){
            markers[i].setVisible(false);
          }
        }
      }

      $('.sf-tr').on('click', function(){
        $(this).toggleClass('sf-tr-selected');
        toggleMarkers();
      });

    });
</script>