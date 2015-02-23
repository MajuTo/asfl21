@foreach ($sagesfemmes as $sf) 
<tr class="sf-tr" data-sf="{{ $sf->id }}" id="{{ $sf->id }}">
   <td>{{{ Str::upper($sf->name) }}}</td>
   <td>{{{ Str::title($sf->firstname) }}}</td>
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