@extends('layouts.index')
@section('content')
<h3 class="offset-4">Modification de l'adresse {{ $address->name }}</h3>
<div class="col-sm-8 offset-2">
    @if($admin)
        {{ aire()->open()->route('admin.adresse.update', $address->id)->bind($address)->put() }}
    @else
        {{ aire()->open()->route('adresse.update', $address->id)->bind($address)->put() }}
    @endif
    {{ aire()->input('name', 'Nom')->placeholder("Nom de l'adresse...")->required()->groupAddClass('mb-3') }}
    {{ aire()->input('address', 'Adresse')->placeholder("Adresse...")->required()->groupAddClass('mb-3') }}
    {{ aire()->input('zipCode', 'Code postal')->placeholder("Code postal...")->required()->groupAddClass('mb-3') }}
    {{ aire()->input('city', 'Ville')->placeholder("Ville...")->required()->groupAddClass('mb-3') }}
    <div class="row mb-3">
        <div class="col-6">
            {{ aire()->input('phone', 'Téléphone fixe')->placeholder("Téléphone fixe...")->required() }}
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="hidePhone" id="hidePhone" {{ $address->hidePhone ? 'checked' : '' }}>
                <label class="custom-control-label" for="hidePhone">Téléphone privé</label>
            </div>
        </div>
        <div class="col-6">
            {{ aire()->input('fax', 'Fax')->placeholder('Fax...') }}
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="hideFax" id="hideFax" {{ $address->hideFax ? 'checked' : '' }}>
                <label class="custom-control-label" for="hideFax">Ne pas montrer mon fax</label>
            </div>
        </div>
    </div>
    {{ aire()->textarea('description', 'Description')->placeHolder("Informations supplémentaires (horaires, etc...)")->class('ckeditor')->groupAddClass('mb-3') }}
    {{ aire()->submit('Ajouter')->addClass('float-end btn-pink')->removeClass('btn-primary') }}
    {{ aire()->close() }}
</div>
@stop
{{--@section('script')--}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $('#nav-membre').addClass('active');--}}
{{--            $('#nav-profil').addClass('active');--}}
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
