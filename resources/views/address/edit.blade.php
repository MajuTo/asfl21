@extends('layouts.index')
@section('content')
<div class="col-sm-6 offset-4">
    <h3>Modification d'une adresse</h3>
</div>
<div class="col-sm-8 offset-2">
    @if($admin)
        {{ Aire::open(route('admin.adresse.update', $address->id), $address) }}
    @else
        {{ Aire::open(route('adresse.update', $address->id), $address) }}
    @endif
    {{ Aire::input('name', 'Nom')->placeholder("Nom de l'adresse...")->required() }}
    {{ Aire::input('address', 'Adresse')->placeholder("Adresse...")->required() }}
    {{ Aire::input('zipCode', 'Code postal')->placeholder("Code postal...")->required() }}
    {{ Aire::input('city', 'Ville')->placeholder("Ville...")->required() }}
    <div class="row">
        <div class="col-6">
            {{ Aire::input('phone', 'Téléphone fixe')->placeholder("Téléphone fixe...")->required() }}
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="hidePhone" id="hidePhone" {{ $address->hidePhone ? 'checked' : '' }}>
                <label class="custom-control-label" for="hidePhone">Téléphone privé</label>
            </div>
        </div>
        <div class="col-6">
            {{ Aire::input('fax', 'Fax')->placeholder('Fax...') }}
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="hideFax" id="hideFax" {{ $address->hideFax ? 'checked' : '' }}>
                <label class="custom-control-label" for="hideFax">Ne pas montrer mon fax</label>
            </div>
        </div>
    </div>
    {!! Aire::textarea('description', 'Description')->placeHolder("Informations supplémentaires (horaires, etc...)")->class('ckeditor') !!}

    {!! Aire::submit('Ajouter')->addClass('pull-right btn-pink')->removeClass('btn-primary') !!}

    {!! Aire::close() !!}
</div>
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-membre').addClass('active');
            $('#nav-profil').addClass('active');
            $(':checkbox:not(:checked)').parent().addClass('notchecked');
            $(':checkbox:checked').parent().addClass('checked');
            $(':checkbox').on('change', function(){
                if( $(this).parent().hasClass('checked') ){
                    $(this).parent().removeClass('checked').addClass('notchecked');
                }else{
                    $(this).parent().removeClass('notchecked').addClass('checked');
                }
            });
        });
    </script>
@stop
