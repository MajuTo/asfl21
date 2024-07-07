@extends('layouts.admin')
@section('admincontent')
    <div class="col-8">
{{--    <x-inline-input class="mb-3" name="titre" label="Titre"/>--}}
        {{ aire()->open()->route('admin.message.update', $message)->bind($message)->method('PUT') }}
        {{ aire()->input('title', 'Titre')->placeholder('Titre...')->groupAddClass('mb-3')->required() }}
        {{ aire()->select($categories, 'category_id', 'Catégorie')->groupAddClass('mb-3')->required() }}
        {{ aire()->textArea('content', 'Message')->placeholder('Message...')->class('ckeditor')->groupAddClass('mb-3')->required() }}
        {{ aire()->submit('Enregistrer')->class('btn btn-pink float-end') }}
        {{ aire()->close() }}
{{--    {!! BootForm::openHorizontal(['lg' => [3, 9]])->put()->action(route('admin.message.update', $message->id)) !!}--}}
{{--        {!! Form::token() !!}--}}
{{--        {!! BootForm::bind($message) !!}--}}
{{--        {!! BootForm::text('Titre', 'title')->placeHolder('Titre...')->required() !!}--}}
{{--        {!! BootForm::textarea('Message', 'content')->placeHolder('Message...')->class('ckeditor')->required() !!}--}}
{{--        {!! BootForm::select('Catégorie', 'category_id')->options($categories) !!}--}}
{{--        {!! BootForm::submit('Enregistrer', 'pull-right btn-pink') !!}--}}
{{--    {!! BootForm::close() !!}--}}
    </div>
@stop
{{--@section('script')--}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $('#nav-membre').addClass('active');--}}
{{--            $('#nav-admin').addClass('active');--}}
{{--            $('#nav-admin-messages').addClass('active');--}}
{{--        });--}}
{{--    </script>--}}
{{--@stop--}}
