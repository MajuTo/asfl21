@foreach ($sagesfemmes as $sf) 
<tr>
   <td class="sf-tr" data-sf="{{ $sf->id }}" id="{{ $sf->id }}">{{{ Str::upper($sf->name) }}} {{{ Str::title($sf->firstname) }}}</td>
   <td><a href="{{ URL::route('user.show', [$sf->id, strtoupper($sf->name) . '_' . ucfirst($sf->firstname)]) }}"><i id="tooltip-sf" class="fa fa-external-link" data-toggle="tooltip" data-placement="left" title="Contact"></i></a></td>
</tr>
@endforeach