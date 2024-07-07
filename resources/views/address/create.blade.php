@extends('layouts.index')
@section('content')
    <h3 class="offset-4">Ajout d'une adresse</h3>
    <div class="col-sm-8 offset-2">
        {{ aire()->open()->route('adresse.store', $address) }}
            {{ aire()->input('name', 'Nom')->placeholder("Nom de l'adresse...")->required()->groupAddClass('mb-3') }}
            {{ aire()->input('address', 'Adresse')->placeholder("Adresse...")->required()->groupAddClass('mb-3') }}
            {{ aire()->input('zipCode', 'Code postal')->placeholder("Code postal...")->required()->groupAddClass('mb-3') }}
            {{ aire()->input('city', 'Ville')->placeholder("Ville...")->required()->groupAddClass('mb-3') }}
            <div class="row mb-3">
                <div class="col-6">
                    {{ aire()->input('phone', 'Téléphone fixe')->placeholder("Téléphone fixe...")->required()->groupAddClass('mb-1') }}
                    <div class="custom-control form-switch">
                        <input type="checkbox" class="form-check-input" name="hidePhone" id="hidePhone" {{ $address->hidePhone ? 'checked' : '' }}>
                        <label class="form-check-label" for="hidePhone">Téléphone privé</label>
                    </div>
                </div>
                <div class="col-6">
                    {{ aire()->input('fax', 'Fax')->placeholder('Fax...')->groupAddClass('mb-1') }}
                    <div class="custom-control form-switch">
                        <input type="checkbox" class="form-check-input" name="hideFax" id="hideFax" {{ $address->hideFax ? 'checked' : '' }}>
                        <label class="form-check-label" for="hideFax">Ne pas montrer mon fax</label>
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
{{--         document.addEventListener('DOMContentLoaded', function() {--}}
{{--             document.getElementById('nav-membre').classList.add('active')--}}
{{--             document.getElementById('nav-profil').classList.add('active')--}}
{{--             let checkboxes = document.querySelectorAll('input[type="checkbox"]')--}}
{{--             checkboxes.forEach(checkbox => {--}}
{{--                 let activeClass = checkbox.checked ? 'checked' : 'notchecked'--}}
{{--                 checkbox.parentElement.classList.add(activeClass)--}}
{{--             })--}}
{{--         })--}}
{{--         $(document).ready(function(){--}}
{{--             $('#nav-membre').addClass('active');--}}
{{--             $('#nav-profil').addClass('active');--}}
{{--             $(':checkbox:not(:checked)').parent().addClass('notchecked');--}}
{{--             $(':checkbox:checked').parent().addClass('checked');--}}
{{--             $(':checkbox').on('change', function(){--}}
{{--                 if( $(this).parent().hasClass('checked') ){--}}
{{--                     $(this).parent().removeClass('checked').addClass('notchecked');--}}
{{--                 }else{--}}
{{--                     $(this).parent().removeClass('notchecked').addClass('checked');--}}
{{--                 }--}}
{{--             });--}}
{{--         });--}}
{{--    </script>--}}
{{--@stop--}}
