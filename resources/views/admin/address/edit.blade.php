@extends('layouts.admin')
@section('admincontent')
{{--<div class="content-container">--}}
{{--    <div class="col-sm-9 col-sm-offset-1">--}}
    <h3 class="offset-2">Modification d'une adresse de {{ $user->firstname . ' ' . $user->name }}</h3>
    <div class="col-8">
        @if($admin)
            {{ aire()->open()->route('admin.adresse.update', $address->id)->method('PUT')->bind($address) }}
        @else
            {{ aire()->open()->route('adresse.update', $address->id)->method('PUT')->bind($address) }}
        @endif
        {{ aire()->input('name', 'Nom')->placeholder("Nom de l'adresse...")->required()->groupAddClass('mb-3') }}
        {{ aire()->input('address', 'Adresse')->placeholder("Adresse...")->required()->groupAddClass('mb-3') }}
        {{ aire()->input('zipCode', 'Code postal')->placeholder("Code postal...")->required()->groupAddClass('mb-3') }}
        {{ aire()->input('city', 'Ville')->placeholder("Ville...")->required()->groupAddClass('mb-3') }}
{{--        <div class="row">--}}
{{--            <div class="col-6">--}}
                {{ aire()->input('phone', 'Téléphone fixe')->placeholder("Téléphone fixe...")->required() }}
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input" name="hidePhone" id="hidePhone" {{ $address->hidePhone ? 'checked' : '' }}>
                    <label class="custom-control-label" for="hidePhone">Téléphone privé</label>
                </div>
{{--            </div>--}}
{{--            <div class="col-6">--}}
{{--                {{ aire()->input('fax', 'Fax')->placeholder('Fax...') }}--}}
{{--                <div class="custom-control custom-switch">--}}
{{--                    <input type="checkbox" class="custom-control-input" name="hideFax" id="hideFax" {{ $address->hideFax ? 'checked' : '' }}>--}}
{{--                    <label class="custom-control-label" for="hideFax">Ne pas montrer mon fax</label>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        {{ aire()->textarea('description', 'Description')->placeHolder("Informations supplémentaires (horaires, etc...)")->rows(8)->groupAddClass('mb-3') }}
        {{ aire()->submit('Ajouter')->addClass('float-end btn-pink')->removeClass('btn-primary') }}
        {{ aire()->close() }}
{{--        @if($admin)--}}
{{--            {!! BootForm::openHorizontal(['lg' => [3, 9]])->put()->action(route('admin.adresse.update', $address->id)) !!}--}}
{{--        @else--}}
{{--            {!! BootForm::openHorizontal(['lg' => [3, 9]])->put()->action(route('adresse.update', $address->id)) !!}--}}
{{--        @endif--}}
{{--            {!! Form::token() !!}--}}
{{--            {!! BootForm::bind($address) !!}--}}
{{--            {!! BootForm::text('Nom', 'name')->placeHolder("Nom de l'adresse...")->required() !!}--}}
{{--            {!! BootForm::text('Adresse', 'address')->placeHolder("Adresse...")->required() !!}--}}
{{--            {!! BootForm::text('Code postal', 'zipCode')->placeHolder("Code postal...")->required() !!}--}}
{{--            {!! BootForm::text('Ville', 'city')->placeHolder("Ville...")->required() !!}--}}
{{--            {!! BootForm::text('Téléphone Fixe', 'phone')->placeHolder("Téléphone fixe...") !!}--}}
{{--            @if($address->hidePhone)--}}
{{--                {!! BootForm::checkbox('Téléphone privé', 'hidePhone')->check() !!}--}}
{{--            @else--}}
{{--                {!! BootForm::checkbox('Téléphone privé', 'hidePhone') !!}--}}
{{--            @endif--}}
{{--            {!! BootForm::text('Fax', 'fax')->placeHolder("Fax...") !!}--}}
{{--            @if($address->hideFax)--}}
{{--                {!! BootForm::checkbox('Ne pas montrer mon fax', 'hideFax')->check() !!}--}}
{{--            @else--}}
{{--                {!! BootForm::checkbox('Ne pas montrer mon fax', 'hideFax') !!}--}}
{{--            @endif--}}
{{--            {!! BootForm::textarea('Informations supplémentaires', 'description')->placeHolder("Informations supplémentaires (horaires, etc...)") !!}--}}
{{--            {!! BootForm::submit('Enregistrer', 'pull-right btn-pink') !!}--}}
{{--        {!! BootForm::close() !!}--}}
{{--    </div>--}}
{{--</div>--}}
    </div>
@stop
{{--@section('script')--}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $('#nav-membre').addClass('active');--}}
{{--            $('#nav-admin').addClass('active');--}}
{{--            $('#nav-admin-users').addClass('active');--}}
{{--            $(':checkbox:not(:checked)').parent().addClass('notchecked');--}}
{{--            $(':checkbox:checked').parent().addClass('checked');--}}
{{--            $(':checkbox').on('change', function(){--}}
{{--                if( $(this).parent().hasClass('checked') ){--}}
{{--                    $(this).parent().removeClass('checked').addClass('notchecked');--}}
{{--                }else{--}}
{{--                    $(this).parent().removeClass('notchecked').addClass('checked');--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@stop--}}
