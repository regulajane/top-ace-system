$(document).ready(function() {
    // The maximum number of options
    var MAX_OPTIONS = 5;

    $('#fabForm')
    // Add button click handler
    .on('click', '.addButtonFab', function() {
        var $template = $('#optionTemplatefab'),
            $clone    = $template
                            .clone()
                            .removeClass('hide')
                            .removeAttr('id')
                            .insertBefore($template),
            $option   = $clone.find('[name="item[]"]');

        // Add new field
        // $('#joForm').formValidation('addField', $option);
    })
    // Remove button click handler
    .on('click', '.removeButtonFab', function() {
        var $row    = $(this).parents('.form-group'),
            $option = $row.find('[name="item[]"]');

        // Remove element containing the option
        $row.remove();

        // Remove field
        // $('#joForm').formValidation('removeField', $option);
    })
    // Called after adding new field
    .on('added.field.fv', function(e, data) {
        // data.field   --> The field name
        // data.element --> The new field element
        // data.options --> The new field options

        if (data.field === 'item[]') {
            if ($('#fabForm').find(':visible[name="item[]"]').length >= MAX_OPTIONS) {
                $('#fabForm').find('.addButtonFab').attr('disabled', 'disabled');
            }
        }
    })

    // Called after removing the field
    .on('removed.field.fv', function(e, data) {
       if (data.field === 'item[]') {
            if ($('#fabForm').find(':visible[name="item[]"]').length < MAX_OPTIONS) {
                $('#fabForm').find('.addButtonFab').removeAttr('disabled');
            }
        }
    });

});

//machinist
$(document).ready(function() {
    // The maximum number of options
    var MAX_OPTIONS = 5;

    $('#fabForm')
    // Add button click handler
    .on('click', '.addButtonFabMach', function() {
        var $template = $('#optionTemplateFabMachinist'),
            $clone    = $template
                            .clone()
                            .removeClass('hide')
                            .removeAttr('id')
                            .insertBefore($template),
            $option   = $clone.find('[name="employeeid[]"]');

        // Add new field
        // $('#joForm').formValidation('addField', $option);
    })
    // Remove button click handler
    .on('click', '.removeButtonFabMach', function() {
        var $row    = $(this).parents('.form-group'),
            $option = $row.find('[name="employeeid[]"]');

        // Remove element containing the option
        $row.remove();

        // Remove field
        // $('#joForm').formValidation('removeField', $option);
    })
    // Called after adding new field
    .on('added.field.fv', function(e, data) {
        // data.field   --> The field name
        // data.element --> The new field element
        // data.options --> The new field options

        if (data.field === 'employeeid[]') {
            if ($('#fabForm').find(':visible[name="employeeid[]"]').length >= MAX_OPTIONS) {
                $('#fabForm').find('.addButtonFabMach').attr('disabled', 'disabled');
            }
        }
    })

    // Called after removing the field
    .on('removed.field.fv', function(e, data) {
       if (data.field === 'employeeid[]') {
            if ($('#fabForm').find(':visible[name="employeeid[]"]').length < MAX_OPTIONS) {
                $('#fabForm').find('.addButtonFabMach').removeAttr('disabled');
            }
        }
    });

});
