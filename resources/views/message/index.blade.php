@extends('layouts.index')
@section('content')

<section id="messagerie">
    <div class="row">
        <h1>Messagerie</h1>
    </div>
    <div class="row">
        <div class="col-sm-12">
        <h3><button class="btn btn-pink" id="envoi">Écrire un message</button></h3>
            <div class="messagerie-form hide-form">
                {{ Aire::open()->route('message.store') }}
                {{ Aire::input('title', 'Titre')->placeholder('Titre...')->required() }}
                {{ Aire::textarea('content', 'Message')->required()->placeholder('(Votre message ici...)')->helpText("Écrivez votre message ici...")->addClass('ckeditor') }}
                @if(auth()->user()->group_id == 2 || auth()->user()->group_id == 3)
                    {{ Aire::checkbox('admin-msg', 'Envoyer le message comme administrateur') }}
                @endif
                {{ Aire::submit('Envoyer')->addClass('btn-pink') }}
            {{ Aire::close() }}
            </div>
        </div>
        <div class="col-sm-6">
        <h3>Messages des membres</h3>
            @foreach($mMessages as $mMessage)
                <span class="float-start message-author">{{ strtoupper($mMessage->user->name) . ' ' . ucfirst($mMessage->user->firstname) . ' ' . date('d/m/Y H:i:s', strtotime($mMessage->created_at)) }}</span><br />
                <p>
                    <strong class="float-start">{{ $mMessage->title }}</strong><br />
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
                <span class="float-start message-author">{{ strtoupper($aMessage->user->name) . ' ' . ucfirst($aMessage->user->firstname) . ' ' . date('d/m/Y H:i:s', strtotime($aMessage->created_at)) }}</span><br />
                <p>
                    <strong class="float-start">{{ $aMessage->title }}</strong><br />
                    {!! $aMessage->content !!}
                </p>
                <hr>
            @endforeach
            {{-- Paginator::setPageName('am') --}}
            {{ $aMessages->appends('mm', request('mm'))->links() }}
        </div>
    </div>
</section>
@endsection
@section('script')
    <script>
        let sendButton = document.getElementById('envoi')
        sendButton?.addEventListener('click', () => {
            let classList = document.querySelector('.messagerie-form').classList
            if (classList?.contains('hide-form')) {
                classList?.remove('hide-form')
                sendButton.innerText = 'Fermer le formulaire'
            } else {
                classList?.add('hide-form')
                sendButton.innerText = 'Écrire un message'
            }
        })
    </script>
@endsection
