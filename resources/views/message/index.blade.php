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
                {{ aire()->open()->action(route('message.store')) }}
                    {{ aire()->input('title', 'Titre')->placeholder('Titre...')->required()->groupAddClass('mb-2') }}
                    {{ aire()->textArea('content', 'Votre message')->placeholder('Ecrivez votre message ici...')->required()->groupAddClass('mb-1')->addClass('ckeditor') }}
                    @if(auth()->user()->group_id == 2 || auth()->user()->group_id == 3)
                    {{ aire()->checkbox('admin-msg', 'Envoyer le message comme administrateur')->groupAddClass('mb-3') }}
                    @endif
                    {{ aire()->submit('Envoyer')->addClass('pull-right btn btn-pink') }}
                {{ aire()->close() }}
{{--                <x-form :action="route('message.store')">--}}
{{--                    <x-form-input name="title" label="Titre" class="mb-3" required></x-form-input>--}}
{{--                    <x-form-textarea name="content" label="Votre message" class="ckeditor"></x-form-textarea>--}}
{{--                    @if(in_array(auth()->user()->group_id, [2, 3]))--}}
{{--                        <x-form-checkbox name="admin-msg" switch label="Envoyer le message comme administrateur"></x-form-checkbox>--}}
{{--                    @endif--}}
{{--                    <x-form-submit class="mt-2 btn-pink">Envoyer</x-form-submit>--}}
{{--                </x-form>--}}
            </div>
        </div>
        <div class="col-sm-6">
        <h3>Messages des membres</h3>
            @foreach($mMessages as $mMessage)
                <span class="pull-left message-author">{{ strtoupper($mMessage->user->name) . ' ' . Str::title($mMessage->user->firstname) . ' ' . $mMessage->created_at->format('d/m/Y H:i:s') }}</span><br />
                <p>
                    <strong>{{ $mMessage->title }}</strong><br />
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
                <span class="pull-left message-author">{{ strtoupper($aMessage->user->name) . ' ' . Str::title($aMessage->user->firstname) . ' ' . $aMessage->created_at->format('d/m/Y H:i:s') }}</span><br />
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
        let sendButton = document.getElementById('envoi')
        sendButton?.addEventListener('click', e => {
            let classList = document.querySelector('.messagerie-form').classList
            if (classList?.contains('hide-form')) {
                classList?.remove('hide-form')
                sendButton.innerText = 'Fermer le formulaire'
            } else {
                classList?.add('hide-form')
                sendButton.innerText = 'Ecrire un message'
            }
        })
    </script>
@stop
