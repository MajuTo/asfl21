@extends('layouts.index')
@section('content')
<div class="container">
            @foreach($a->activities as $u)
                {{ $u->activityName }} <br />
                {{ $u->activityDesc }} <br />
            @endforeach
    {{ $activities->links() }}
    <div class="row">

    {{-- var_dump($a) --}}
        @foreach($activities as $act)

        {{-- Présentation des activités --}}
        <div class="col-sm-6 col-md-3">
            <div class="service wow fadeInDown animated" style="visibility: visible; -webkit-animation: fadeInDown;">
                <h3>{{ $act->activityName }}</h3>
                <p>{{ substr($act->activityDesc, 0, 25) }}</p>
                <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#activity{{ $act->idActivity }}">
                  Détails...
              </button>
          </div>
      </div>

      {{-- Présentation des activités --}}
      <div class="modal fade" id="activity{{ $act->idActivity }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ $act->activityName }}</h4>
                </div>
                <div class="modal-body">
                    {{ $act->activityDesc }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
@stop