@extends('layouts.index')
@section('content')
<div class="content-container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="animate-page-title">Que me propose ma sage femme libérale ?</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <h3>Pendant ma grossesse</h3>
            <ul>
                <li>Entretien pré natal (entretien du 4eme mois)</li>
                <li>Préparation a la naissance (classique, haptonomie, piscine ...)</li>
                <li>Déclaration de grossesse</li>
                <li>Suivi médical de grossesse (consultations mensuelles)</li>
                <li>Surveillance à domicile de la grossesse (monitoring)</li>
            </ul>
        </div>
        <div class="col-sm-4">
            <h3>Après mon accouchement</h3>
            <ul>
                <li>Visite post-accouchement a domicile (allaitement, pesée du bébé, examen gynécologique...)</li>
                <li>Consultation post-natale ??? (contraception)</li>
                <li>Rééducation du périnée (méthodes nouvelles, électrostimulation ...)</li>
            </ul>
        </div>
        <div class="col-sm-4">
            <h3>Et après ??</h3>
            <ul>
                <li>Suivi gynécologique (frottis, pilules, implants, stérilets ..)</li>
                <li>Sexologie</li>
                <li>rééducation périnéale (prolipsus, fuites urinaires ...)</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <dl>
                <dt>Le suivi de la grossesse</dt>
                <dd>Elle pose le diagnostique de grossesse et effectue son suivi. Elle établit la déclaration de grossesse, réalise mes consultations, s'assure de votre santé et celle de votre enfant, prescrit les examens et thérapeutiques adaptés (7 examens obligatoires)</dd>
                <dt>La préparation a la naissance dès le 4ème mois</dt>
                <dd>Elle accompagne votre couple dès le début de la grossesse, vous informe et vous conseille pour préparer physiquement et psychiquement votre accouchement et l'arrivée de votre enfant (8 séances)</dd>
                <dt>Le suivi a domicile pendant la grossesse</dt>
                <dd>En cas de pathologie et sur prescription d'un médecin, elle réalise l'enregistrement du rythme cardiaque du bébé et des contractions</dd>
                <dt>L'accouchement</dt>
                <dd>Elle est qualifiée pour accompagner et pratiquer l'acouchement. En cas de problèmes, elle collabore avec le gynécologue obstétricien, l'anesthésiste et le pédiatre.</dd>
                <dt>Dès ma sortie de la maternité</dt>
                <dd>Sur votre demande, elle vous rend visite, s'assure de votre santé et celle de votre bébé. Elle procède aux soins, examens et prescriptions nécessaires. Elle répond à vos questions et vous accompagne dans vos premiers pas de parents.</dd>
                <dt>L'allaitement</dt>
                <dd>Elle vous conseille et vous soutient tout au long de votre allaitement.</dd>
                <dt>L'examen post-natal</dt>
                <dd>Elle réalise un examen clinique et vous guide dans le choix de la contraception qu'elle peut vous prescrire.</dd>
                <dt>La rééducation périnéale</dt>
                <dd>Elle prescrit et assure la rééducation périnéale, vous accompagne et vous guide dans votre récupération physique et psychologique.</dd>
                <dt>Un travail en réseau</dt>
                <dd>Elle collabore avec le gynécologue obstétricien, le médecin généraliste, les établissements de santé et les services de Protection Maternelle et Infantile (PMI).</dd>
                <dt>Le frottis</dt>
                <dd>Elle vous informe sur l'utilité, les conditions de réalisation et la fréquence d'un frottis cervico-vaginal de dépistage. Elle propose et réalise le frottis si vous le souhaitez, notamment si vous ne bénéficiez pas d'un suivi régulier en dehors de votre grossesse.</dd>
            </dl>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
        <h3>La sage-femme de PMI</h3>
        <p>Le service dde Protection Maternelle et Infantile du Conseil général a pour mission la prévention de la santé des futurs parents et des enfants. Suite à l'envoi de votre déclaration de grossesse, il vous adresse votre carnet de santé maternité et vous informe des actions menées par les services du Conseil général.</p>
        <p><strong>Contact : </strong>Secrétariat du service PMI<br />1, rue Joseph TISSOT, BP 1601, 21035 DIJON CEDEX - 03 80 63 66 13</p>
        </div>
    </div>
</div>
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $('#nav-metier').addClass('active');
        });
    </script>
@stop