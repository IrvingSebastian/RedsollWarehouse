$(document).ready(function() {
    $('input[name="piezas[]"]').change(function() {
        var checkboxId = $(this).attr('id');
        var inputId = checkboxId.replace('checkbox', 'typeNumber');
        var input = $('#' + inputId);

        if(this.checked) {
            input.removeAttr('disabled');
            input.attr('name', inputId);
        } else {
            input.attr('disabled', true);
            input.removeAttr('name');
        }
    });
});