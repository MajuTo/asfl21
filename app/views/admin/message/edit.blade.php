@extends('layouts.admin')
@section('content')
<script src="//cdn.ckeditor.com/4.5.7/basic/ckeditor.js"></script>
    {{ BootForm::openHorizontal(3, 9)->put()->action(URL::route('admin.message.update', $message->id)) }}
        {{ Form::token() }}
        {{ BootForm::bind($message) }}
        {{ BootForm::text('Titre', 'title')->placeHolder('Titre...')->required() }}
        {{ BootForm::textarea('Message', 'content')->placeHolder('Message...')->required() }}
        {{ BootForm::select('Catégorie', 'category_id')->options($categories) }}
        {{ BootForm::submit('Enregistrer', 'pull-right btn-pink') }}
    {{ BootForm::close() }}
@stop
@section('script')
    <script>
        $(document).ready(function(){
            CKEDITOR.replace( 'content' );
            $('#nav-membre').addClass('active');
            $('#nav-admin').addClass('active');
            $('#nav-admin-messages').addClass('active');
        });
    </script>
@stop