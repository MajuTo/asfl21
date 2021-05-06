@extends('layouts.index')
@section('content')
    <div class="col-sm-8 offset-2">
        {!! Aire::open(route('adresse.store'), $address) !!}
            {{ Aire::input('name', 'Nom')->placeholder("Nom de l'adresse...")->required() }}
            {{ Aire::input('address', 'Adresse')->placeholder("Adresse...")->required() }}
            {{ Aire::input('zipCode', 'Code postal')->placeholder("Code postal...")->required() }}
            {{ Aire::input('city', 'Ville')->placeholder("Ville...")->required() }}
            <div class="row">
                <div class="col-6 mb-3">
                    {{ Aire::input('phone', 'Téléphone fixe')->placeholder("Téléphone fixe...")->groupAddClass('mb-1')->required() }}
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="hidePhone" id="hidePhone" {{ $address->hidePhone ? 'checked' : '' }}>
                        <label class="custom-control-label" for="hidePhone">Téléphone privé</label>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    {{ Aire::input('fax', 'Fax')->groupAddClass('mb-1')->placeholder('Fax...') }}
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
        // document.addEventListener('DOMContentLoaded', function() {
        //     document.getElementById('nav-membre').classList.add('active')
        //     document.getElementById('nav-profil').classList.add('active')
        //     let checkboxes = document.querySelectorAll('input[type="checkbox"]')
        //     checkboxes.forEach(checkbox => {
        //         let activeClass = checkbox.checked ? 'checked' : 'notchecked'
        //         checkbox.parentElement.classList.add(activeClass)
        //     })
        // })
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
