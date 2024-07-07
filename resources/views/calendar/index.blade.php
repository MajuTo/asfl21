@section('title')
    <title>ASFL21, Calendrier de grossesse</title>
@stop
@extends('layouts.index')
@section('css')
    {{-- timeline --}}
    <link rel="stylesheet" href={{ asset('css/vis.timeline.min.css') }}>
    <link rel="stylesheet" href={{ asset('css/vis-timeline-perso.css') }}>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/css/datepicker-bs5.min.css">
@stop
@section('content')
{{--	<div class="row">--}}
        <h1 class="text-center">Calendrier de grossesse</h1>
        <hr>
        {{ aire()->open()->post()->class('form-inline d-flex justify-content-evenly align-items-center') }}
        {{ aire()->input('date1')->id('date1')->placeholder('Date des dernières règles')->class('mb-1 col-6') }}
        {{ aire()->input('date2')->id('date2')->placeholder('Date de conception')->class('mb-1 col-6') }}
        {{ aire()->submit('Valider')->class('btn btn-pink') }}
        {{ aire()->close() }}
{{--            <x-form class="form-inline d-flex justify-content-evenly align-items-center">--}}
{{--                <x-floating-input id="date1" name="date1" label="Date des dernières règles"/>--}}
{{--                <x-floating-input id="date2" name="date2" label="Date de conception" floating/>--}}
{{--                <x-form-input name="date1" id="date1" label="Date des dernières règles" class="mb-1 col-6" floating></x-form-input>--}}
{{--                <x-form-input name="date2" id="date2" label="Date de conception" class="mb-1 col-6" floating></x-form-input>--}}
{{--                <button type="submit" class="btn btn-pink">Valider</button>--}}
{{--            </x-form>--}}
        <hr>
{{--            {{ aire()->open(route('calendrier.store'))->id('calendar-form')->class('form-inline d-flex justify-content-evenly') }}--}}
{{--                {{ aire()->input('date1', '')->id('date1')->placeholder('Date des dernières règles')->autoComplete('off') }}--}}
{{--                {{ aire()->input('date2', '')->id('date2')->placeholder('Date de conception')->autoComplete('off') }}--}}
{{--                {{ aire()->submit('Valider')->addClass('pull-right btn-pink')->removeClass('btn-primary') }}--}}
{{--            {{ aire()->close() }}--}}

{{--            {!! BootForm::open()->id('calendar-form')->action(route('calendrier.store'))->addClass('form-inline d-flex justify-content-evenly') !!}--}}
{{--            <div class="">--}}
{{--                {!! Form::token() !!}--}}
{{--    	    	<div class="">--}}
{{--                    {!! BootForm::text('', 'date1', null, ['id' => 'date1'])->placeHolder("Date des dernieres règles")->addClass('datedropper')->noAutocomplete() !!}--}}
{{--    	    	</div>--}}
{{--    	    	<div class="">--}}
{{--                    {!! BootForm::text('', 'date2', null, ['id' => 'date2'])->placeHolder("Date de conception")->addClass('datedropper')->noAutocomplete() !!}--}}
{{--    	    	</div>--}}
{{--    	    	<div class="">--}}
{{--                    {!! BootForm::submit('Valider', 'btn-pink') !!}--}}
{{--    	       	</div>--}}
{{--            </div>--}}
{{--            {!! BootForm::close() !!}--}}
{{--    </div>--}}
{{--    <hr>--}}
    @if(!$json_events)
    <div class="row">
        <div class="col-12">
            <p class="text-center">Ce calendrier vous permettra d'avoir des repères tout au long de votre grossesse. Entrez la date de vos dernières règles ou du début de votre grossesse, vous obtiendrez ensuite les dates importantes de vos consultations, examens médicaux, et droits.</p>
        </div>
    </div>
    @else
{{--    @dd($json_events)--}}
        <!-- NEW TIMELINE -->
{{--        <div class="row">--}}
            <div class="text-center" id="jourj">
                <span id="ani-j">J</span>
                <span class="hide-element ani-minus">-</span>
                <span id="ani-nbr">{{ $jourj }}</span>
            </div>
            <button id="group-toggle" class="btn btn-pink no-group row">Montrer les groupes</button>
            <div id="visualization" class="ow"><span id="show-more" class="span-minus"></span></div>
{{--        </div>--}}
        <div class="row">
            <div class="col-sm-6">
                <div id="legend">
                    <div class="legend-div"><span class="conception"><i class="fas fa-venus-mars"></i></span> Conception</div>
                    <div class="legend-div"><span class="consultation"><i class="fas fa-stethoscope"></i></span> Consultation</div>
                    <div class="legend-div"><span class="medical"><i class="fas fa-user-md"></i></span> Médical</div>
                    <div class="legend-div"><span class="administratif"><i class="fas fa-calendar"></i></span> Administratif</div>
                    <div class="legend-div"><span class="maternite"><i class="fas fa-h-square"></i></span> Maternité</div>
                    <div class="legend-div"><span class="naissance"><i class="fas fa-gift"></i></span> Naissance</div>
                </div>
            </div>
            <div class="col-sm-6">
                <div id="list-div">
                    <p id="explication" class="text-justify"><small><em>Pour plus d'informations, passer la souris sur un élément du calendrier. Vous pouvez séléctionner un élément en cliquant dessus. Pour séléctionner un deuxième élément, cliquer longuement (rester appuyer). Ainsi, vous pouvez créer une liste personnalisée de dates.</em></small></p>
                    <ul id="mylist">
                    </ul>
                </div>
            </div>
        </div>
        <!-- END TIMELINE -->
    @endif
@stop

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/js/datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/js/locales/fr.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const date1 = document.getElementById('date1')
            const date2 = document.getElementById('date2')
            const options = {
                buttonClass: 'btn',
                language: 'fr'
            }
            const datepicker1 = new Datepicker(date1, options)
            const datepicker2 = new Datepicker(date2, options)
            date1.addEventListener('show', e => {
                datepicker2.setDate({clear: true})
            })
            date2.addEventListener('show', e => {
                datepicker1.setDate({clear: true})
            })
        })
    </script>
    @if ($json_events)
{{--        {{ Html::script('assets/js/vis-timeline.js') }}--}}
        <script src="{{ asset('js/vis.timeline.min.js') }}"></script>
        <script type="text/javascript">
            // $(document).ready(function () {
            document.addEventListener("DOMContentLoaded", function() {

                // DOM element where the Timeline will be attached
                let containerTimeline = document.getElementById('visualization');

                let groups = new vis.DataSet(@json($json_groups));
                let items = new vis.DataSet(@json($json_events));

                // Option Configuration for the Timeline
                let options = {
                    zoomMin: 1000 * 60 * 60 * 24 * 5,
                    zoomMax: 1000 * 60 * 60 * 24 * 31 * 10,
                    zoomable: false,
                    moveable: false,
                    multiselect: true,
                    start: new Date(@json($start_limit)),
                    end: new Date(@json($end_limit)),
                    locale: 'fr'
                };

                // Create a Timeline
                let timeline = new vis.Timeline(containerTimeline, items, options);

                // Toggle Order by group on click
                // let btnGroupToggle = $('#group-toggle');
                // btnGroupToggle.click(function () {
                //     if (btnGroupToggle.hasClass('no-group')) {
                //         btnGroupToggle.removeClass('no-group');
                //         btnGroupToggle.text('Cacher les groupes');
                //         timeline.setGroups(groups);
                //     } else {
                //         btnGroupToggle.addClass('no-group');
                //         btnGroupToggle.text('Montrer les groupes');
                //         timeline.setGroups();
                //     }
                // });
                let btnGroupToggle = document.getElementById('group-toggle')
                btnGroupToggle.addEventListener('click', () => {
                    if(btnGroupToggle.classList?.contains('no-group')) {
                        btnGroupToggle.classList?.remove('no-group')
                        btnGroupToggle.innerText = 'Cacher les groupes'
                        timeline.setGroups(groups)
                    } else {
                        btnGroupToggle.classList?.add('no-group')
                        btnGroupToggle.innerText = 'Montrer les groupes'
                        timeline.setGroups()
                    }
                })

                // Timeline Eventlistener (on select, create personalized list)
                // timeline.on('select', function (properties) {
                //     $('#mylist > li').remove();
                //     let selected = timeline.getSelection().sort(function (a, b) {
                //         return a - b
                //     });
                //     if (selected.length > 0) {
                //         $('#explication').hide();
                //     } else {
                //         $('#explication').show();
                //     }
                //     $.each(selected, function (key, value) {
                //         if (typeof value !== 'undefined' && value !== null) {
                //             $('#mylist').append("<li>" + $('#content' + value).html() + "</li>")
                //         }
                //     });
                // });
                timeline.addEventListener('select', () => {
                    document.querySelectorAll('#mylist > li').forEach(el => {
                        el.remove()
                    })
                    let selected = timeline.getSelection().sort(function (a, b) {
                        return a - b
                    });
                    document.getElementById('explication').style.display = (selected.length > 0) ? 'none' : 'block';
                    // $.each(selected, function (key, value) {
                    //     if (typeof value !== 'undefined' && value !== null) {
                    //         $('#mylist').append("<li>" + $('#content' + value).html() + "</li>")
                    //     }
                    // });
                    let list = document.querySelector('.myList')
                    selected.forEach((value, key) => {
                        if (typeof value !== 'undefined' && value !== null) {
                            let li = document.createElement("li")
                            li.innerHTML = document.getElementById('content'+value).innerHTML
                            list?.appendChild(li)
                            // $('#mylist').append("<li>" + $('#content' + value).html() + "</li>")
                        }
                    })
                })

                /* EFFECTS */
                // On hover, show more text in top-center of timeline
                // let timelineItems = $('.vis-item');
                let timelineItems = document.querySelectorAll('.vis-item');
                // let timelinePopup = $('#show-more');
                let timelinePopup = document.querySelector('#show-more');
                timelineItems.forEach(el => {
                    el.addEventListener('mouseover', e => {
                        e.stopImmediatePropagation()
                        timelinePopup.innerHTML = el.children.item(0).children.item(1).innerHTML
                        timelinePopup.classList.add('span-plus')
                    })
                    el.addEventListener('mouseleave', e => {
                        timelinePopup.children.item(0).remove()
                        timelinePopup.classList.remove('span-plus')
                    })
                })
                // timelineItems.mouseenter(function (event) {
                //     let element = $(this).children('.vis-item-content').children(':nth-child(2)').attr('id');
                //     $(this).css('z-index', '999');
                //     timelinePopup.html($(this).children('.vis-item-content').children(':nth-child(2)').clone());
                //     timelinePopup.addClass('span-plus');
                //     $('#show-more #' + element).addClass('info-plus');
                // });
                //
                // timelineItems.mouseleave(function (event) {
                //     let element = $(this).children('.vis-item-content').children(':nth-child(2)').attr('id');
                //     timelinePopup.children(':first-child').remove();
                //     timelinePopup.removeClass('span-plus');
                //     $(this).css('z-index', '0');
                // });

                /* END TIMELINE */
                // $('#nav-calendrier').addClass('active');
            });
    </script>
    @endif

@stop
