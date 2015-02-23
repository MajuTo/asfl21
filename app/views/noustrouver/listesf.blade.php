@foreach ($sagesfemmes as $sf) 
<tr class="sf-tr" data-sf="{{ $sf->id }}" id="{{ $sf->id }}">
   <td>{{{ Str::upper($sf->name) }}}</td>
   <td>{{{ Str::title($sf->firstname) }}}</td>
</tr>
@endforeach

    <script>
        $(document).ready(function(){
          // get selected sf
          function getSelectedSf(){
            var selected_sf = [];
            $.each($('.sf-tr-selected'), function(){
              selected_sf.push($(this).attr('id'));
            })
            return selected_sf;
          }

          // load list of sf by activity
          function printSfByActivity(){
            var activity_id = $(this).data('activity');
            var selectedActivities = getSelectedActivities();

            $.ajax({
              url:  "{{ URL::route('getSfByActivity') }}",
              type: 'POST',
              data: {selectedActivities: selectedActivities},
              success: function(response){
                $('tbody#listesf').html(response);
              }
            });
          }

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
                markers[i].setVisible(true);
              }
            }
          }

          $('.sf-tr').on('click', function(){
            $(this).toggleClass('sf-tr-selected');
            toggleMarkers();
          });

        });
    </script>
