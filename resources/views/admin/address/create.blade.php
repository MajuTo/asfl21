@extends('layouts.admin')
@section('admincontent')
    <div class="col-8">
        <h3 class="offset-2">Ajout d'une adresse</h3>
        {{ aire()->open()->route('admin.adresse.store', $address)->method('POST') }}
        {{ aire()->input('name', 'Nom')->placeholder("Nom de l'adresse...")->required()->groupAddClass('mb-3') }}
        {{ aire()->input('address', 'Adresse')->placeholder("Adresse...")->required()->groupAddClass('mb-3') }}
        {{ aire()->input('zipCode', 'Code postal')->placeholder("Code postal...")->required()->groupAddClass('mb-3') }}
        {{ aire()->input('city', 'Ville')->placeholder("Ville...")->required()->groupAddClass('mb-3') }}
        {{ aire()->input('phone', 'Téléphone fixe')->placeholder("Téléphone fixe...")->required()->groupAddClass('mb-1') }}
        <div class="custom-control form-switch mb-3">
            <input type="checkbox" class="form-check-input" name="hidePhone" id="hidePhone" {{ $address->hidePhone ? 'checked' : '' }}>
            <label class="form-check-label" for="hidePhone">Téléphone privé</label>
        </div>
        {{ aire()->textarea('description', 'Description')->placeHolder("Informations supplémentaires (horaires, etc...)")->rows(8)->groupAddClass('mb-3') }}
        {{ aire()->submit('Ajouter')->addClass('float-end btn-pink')->removeClass('btn-primary') }}
        {{ aire()->close() }}
{{--        <div class="row">--}}
{{--            <div class="col-6 mb-3">--}}
{{--            </div>--}}
{{--            <div class="col-6 mb-3">--}}
{{--                {{ aire()->input('fax', 'Fax')->groupAddClass('mb-1')->placeholder('Fax...') }}--}}
{{--                <div class="custom-control form-switch">--}}
{{--                    <input type="checkbox" class="form-check-input" name="hideFax" id="hideFax" {{ $address->hideFax ? 'checked' : '' }}>--}}
{{--                    <label class="form-check-label" for="hideFax">Ne pas montrer mon fax</label>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        {!! BootForm::openHorizontal(['lg' => [2, 10]])->action(route('admin.adresse.store')) !!}--}}
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
{{--            {!! BootForm::textarea('Description', 'description')->placeHolder("Informations supplémentaires (horaires, etc...)") !!}--}}

{{--            {!! BootForm::submit('Ajouter', 'pull-right btn-pink') !!}--}}

{{--        {!! BootForm::close() !!}--}}
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
