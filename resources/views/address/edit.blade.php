@extends('layouts.index')
@section('content')
<div class="col-sm-6 col-sm-offset-4">
    <h3>Modification d'une adresse</h3>
</div>
<div class="col-sm-9 col-sm-offset-1">
    @if($admin)
        {!! BootForm::openHorizontal(['lg' => [3, 9]])->put()->action(route('admin.adresse.update', $address->id)) !!}
    @else
        {!! BootForm::openHorizontal(['lg' => [3, 9]])->put()->action(route('adresse.update', $address->id)) !!}
    @endif
        {{ Form::token() }}
        {!! BootForm::bind($address) !!}
        {!! BootForm::text('Nom', 'name')->placeHolder("Nom de l'adresse...")->required() !!}
        {!! BootForm::text('Adresse', 'address')->placeHolder("Adresse...")->required() !!}
        {!! BootForm::text('Code postal', 'zipCode')->placeHolder("Code postal...")->required() !!}
        {!! BootForm::text('Ville', 'city')->placeHolder("Ville...")->required() !!}
        {!! BootForm::text('Téléphone Fixe', 'phone')->placeHolder("Téléphone fixe...") !!}
        @if($address->hidePhone)
            {!! BootForm::checkbox('Ne pas montrer mon téléphone', 'hidePhone')->check() !!}
        @else
            {!! BootForm::checkbox('Ne pas montrer mon téléphone', 'hidePhone') !!}
        @endif
        {!! BootForm::text('Fax', 'fax')->placeHolder("Fax...") !!}
        @if($address->hideFax)
            {!! BootForm::checkbox('Ne pas montrer mon fax', 'hideFax')->check() !!}
        @else
            {!! BootForm::checkbox('Ne pas montrer mon fax', 'hideFax') !!}
        @endif
        {!! BootForm::textarea('Informations supplémentaires <span class="textarea-subtext">(disponibilités, horaires, etc...)</span>', 'description')->placeHolder("Informations supplémentaires (horaires, etc...)")->class('ckeditor') !!}
        {!! BootForm::submit('Enregistrer', 'pull-right btn-pink') !!}
    {!! BootForm::close() !!}
</div>
@stop
