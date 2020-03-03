$(document).ready(function () {
    $('.datedropper').datepicker({
        format: 'dd/mm/yyyy',
        language: 'fr'
    });
    $('#date1').change(function () {
        $('#date2').val('');
    });
    $('#date2').change(function () {
        $('#date1').val('');
    });
});
