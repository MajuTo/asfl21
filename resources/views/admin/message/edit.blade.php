@extends('layouts.admin')
@section('content')
    {{ Aire::open()->route('admin.message.update', $message->id)->put() }}
        {{ Aire::bind($message) }}
        {{ Aire::input('title', 'Titre')->placeholder('Titre...')->required() }}
        {{ Aire::textarea('content', 'Message')->placeholder('Message...')->addClass('ckeditor')->required() }}
        {{ Aire::select($categories, 'category_id', 'Catégorie') }}
        {{ Aire::submit('Enregistrer')->addClass('pull-right btn-pink') }}
    {{ Aire::close() }}
@endsection
