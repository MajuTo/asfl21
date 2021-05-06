@extends('layouts.index')
@section('content')

<section id="messagerie">
    <div class="row">
        <h1>Messagerie</h1>
    </div>
    <div class="row">
        <div class="col-sm-12">
        <h3><button class="btn btn-pink" id="envoi">Ecrire un message</button></h3>
            <div class="messagerie-form hide-form">
                {{ Aire::open()->action(route('message.store')) }}
                    {{ Aire::input('title', 'Titre')->placeholder('Titre...')->required() }}
                    {{ Aire::textArea('content', 'Votre message')->placeholder('Ecrivez votre message ici...')->addClass('ckeditor')->required() }}
                    @if(Auth::getUser()->group_id == 2 || Auth::getUser()->group_id == 3)
                    {{ Aire::checkbox('admin-msg', 'Envoyer le message comme administrateur') }}
                    @endif
                    {{ Aire::submit('Envoyer')->addClass('pull-right btn btn-pink')->removeClass('btn-primary') }}
                {{ Aire::close() }}
            </div>
        </div>
        <div class="col-sm-6">
        <h3>Messages des membres</h3>
            @foreach($mMessages as $mMessage)
                <span class="pull-left message-author">{{ strtoupper($mMessage->user->name) . ' ' . Str::title($mMessage->user->firstname) . ' ' . date('d/m/Y H:i:s', strtotime($mMessage->created_at)) }}</span><br />
                <p>
                    <strong class="pull-left">{{ $mMessage->title }}</strong><br />
                    {!! $mMessage->content !!}
                </p>
                <hr>
            @endforeach
            {{-- Paginator::setPageName('mm') --}}
            {!! $mMessages->appends('am', request('am'))->links() !!}
        </div>
        <div class="col-sm-6">
        <h3>Messages de l'association</h3>
            @foreach($aMessages as $aMessage)
                <span class="pull-left message-author">{{ strtoupper($aMessage->user->name) . ' ' . Str::title($aMessage->user->firstname) . ' ' . date('d/m/Y H:i:s', strtotime($aMessage->created_at)) }}</span><br />
                <p>
                    <strong class="pull-left">{{ $aMessage->title }}</strong><br />
                    {!! $aMessage->content !!}
                </p>
                <hr>
            @endforeach
            {{-- Paginator::setPageName('am') --}}
            {{ $aMessages->appends('mm', request('mm'))->links() }}
        </div>
    </div>
</section>
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-membre').addClass('active');
            $('#nav-info').addClass('active');
            $(':checkbox:not(:checked)').parent().addClass('notchecked');
            $(':checkbox:checked').parent().addClass('checked');
            $(':checkbox').on('change', function(){
                if( $(this).parent().hasClass('checked') ){
                    $(this).parent().removeClass('checked').addClass('notchecked');
                }else{
                    $(this).parent().removeClass('notchecked').addClass('checked');
                }
            });

            $('#envoi').click(function(event) {
                if( $('.messagerie-form').hasClass('hide-form')){
                    $('.messagerie-form').removeClass('hide-form');
                    $('#envoi').text('Fermer le formulaire');
                } else {
                    $('.messagerie-form').addClass('hide-form');
                    $('#envoi').text('Ecrire un message');
                }
            });
        });
    </script>
@stop
