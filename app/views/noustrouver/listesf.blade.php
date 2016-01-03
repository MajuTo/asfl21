@foreach ($sagesfemmes as $sf) 
<tr>
   <td class="sf-tr hidden-select" data-sf="{{ $sf->id }}" id="{{ $sf->id }}">{{{ Str::upper($sf->name) }}} {{{ Str::title($sf->firstname) }}}</td>
   <td><a href="{{ URL::route('user.show', $sf->id) }}"><i id="tooltip-sf" class="fa fa-envelope" data-toggle="tooltip" data-placement="left" title="Contact"></i></a></td>
</tr>
@endforeach