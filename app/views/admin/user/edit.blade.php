@extends('layouts.admin')
@section('content')
<div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <ul class="nav nav-pills nav-justified">

                <li class="active"><a href="#profil" data-toggle="tab">Profil</a></li>
                <li><a href="#adresses" data-toggle="tab">Adresses</a></li>
                <li><a href="#activites" data-toggle="tab">Activités</a></li>
                
            </ul>
        </div>
    </div>
    <div class="row tab-content">

        <!-- Div de l'onglet profil -->
        <div role="tabpanel" class="row tab-pane fade in active" id="profil">
            {{ BootForm::openHorizontal(2, 10)->put()->action(URL::route('admin.user.update', $user->id)) }}
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="col-sm-9 col-sm-offset-3"><h3>Coordonnées de {{ $user->firstname }}</h3></div>
                        {{ Form::token() }}
                        {{ BootForm::bind($user) }}
                        {{ BootForm::text('Nom', 'name')->placeHolder("Nom...")->required() }}
                        {{ BootForm::text('Prénom', 'firstname')->placeHolder("Prénom...")->required() }}
                        {{ BootForm::text('Identifiant', 'username')->placeHolder("Identifiant...")->required() }}
                        {{ BootForm::text('Email', 'email')->placeHolder("Email...")->required() }}
                        @if($user->hideEmail)
                            {{ BootForm::checkbox('Ne pas montrer mon email (Cache le formulaire de contact)', 'hideEmail')->check() }}
                        @else
                            {{ BootForm::checkbox('Ne pas montrer mon email (Cache le formulaire de contact)', 'hideEmail') }}
                        @endif
                        {{ BootForm::text('Mobile', 'mobile')->placeHolder("Mobile...") }}
                        @if($user->hideMobile)
                            {{ BootForm::checkbox('Ne pas montrer mon mobile', 'hideMobile')->check() }}
                        @else
                            {{ BootForm::checkbox('Ne pas montrer mon mobile', 'hideMobile') }}
                        @endif
                        {{ BootForm::textarea('Plus de détail', 'description')->placeHolder("Dites en un peu plus sur vous même et/ou vos activités...")->class('ckeditor') }}
                        {{ BootForm::select('Groupe', 'group_id')->options($groups) }}
                        {{ BootForm::submit('Enregistrer', 'pull-right btn-pink') }}
                </div>
            {{ BootForm::close() }}
        </div>

        <!-- Div de l'onglet adresses -->
        <div role="tabpanel" class="tab-pane fade" id="adresses">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-7">
                    <h2><a href="{{ URL::route('admin.adresse.create') }}" ><button class="btn btn-pink pull-right">Ajouter</button></a></h2>
                </div>
            </div>
            <div class="col-sm-10 col-sm-offset-1">
                <table class="table table-condensed table-hover">
                    <thead>
                        <td>Nom</td>
                        <td>Adresse</td>
                        <td>Téléphone</td>
                        <td>Actions</td>
                    </thead>
                    <tbody>
                        @foreach($addresses as $address)
                            <tr>
                                <td>{{ $address->name }}</td>
                                <td>{{ Str::title($address->address) }}, {{ $address->zipCode }}, {{ Str::title($address->city) }}</td>
                                <td>{{ $address->phone }}</td>
                                <td>
                                    <a href="{{ URL::route('admin.adresse.edit', $address->id) }}"><button class="btn label label-warning">Editer</button></a>
                                    {{ BootForm::open()->delete()->action(URL::route('admin.adresse.destroy', $address->id))->style('display: inline;') }}
                                        {{ Form::token() }}
                                        {{ BootForm::bind($address) }}
                                        {{ BootForm::submit('Supprimer', 'label-danger label eraser') }}
                                    {{ BootForm::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Div de l'onglet activités -->
        <div role="tabpanel" class="tab-pane fade" id="activites">
          <div class="col-sm-6 col-sm-offset-3">
              <div class="col-sm-12 text-center"><h3>Activités de {{ $user->firstname }}</h3></div>
              {{ BootForm::openHorizontal(2, 10)->put()->action(URL::route('admin.user.updateActivities', $user->id)) }}
                  {{ Form::token() }}
                  {{ BootForm::bind($user) }}
                  @foreach($activities as $act)
                      @if($user->activities->contains($act->id))
                          {{ BootForm::checkbox($act->activityName, 'activities[]')->value($act->id)->check() }}
                      @else
                          {{ BootForm::checkbox($act->activityName, 'activities[]')->value($act->id) }}
                      @endif
                  @endforeach
                  {{ BootForm::submit('Enregistrer', 'pull-right btn-pink') }}
              {{ BootForm::close() }}
          </div>
        </div>

    </div> <!-- Fin div tab-content -->
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-membre').addClass('active');
            $('#nav-admin').addClass('active');
            $('#nav-admin-users').addClass('active');
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