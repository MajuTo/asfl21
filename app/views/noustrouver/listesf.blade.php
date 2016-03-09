@foreach ($sagesfemmes as $sf) 
	<div class="tag">
		<span class="sf-name" data-sf="{{ $sf->id }}" id="{{ $sf->id }}">
			{{{ Str::upper($sf->name) }}} {{{ Str::title($sf->firstname) }}}
		</span>
		<span class="contact-link">
			<a href="{{ URL::route('user.show', [$sf->id, strtoupper($sf->name) . '-' . ucfirst($sf->firstname)]) }}" target="_blank">
			<i id="tooltip-sf" class="fa fa-external-link" data-toggle="tooltip" data-placement="top" title="Contact"></i>
			</a>
		</span>
	</div>
@endforeach