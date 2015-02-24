@extends('layouts.admin')
@section('content')
    {{ BootForm::openHorizontal(3, 9)->put()->action(URL::route('admin.message.update', $message->id)) }}
        {{ Form::token() }}
        {{ BootForm::bind($message) }}
        {{ BootForm::text('Titre', 'title')->placeHolder('Titre...')->required() }}
        {{ BootForm::text('Message', 'content')->placeHolder('Message...')->required() }}
        {{ BootForm::submit('Enregistrer', 'pull-right btn-pink') }}
    {{ BootForm::close() }}
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-membre').addClass('active');
            $('#nav-admin').addClass('active');
            $('#nav-admin-messages').addClass('active');
        });
    </script>
@stop