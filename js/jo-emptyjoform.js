                                            $(document).ready(function() {
                                                // The maximum number of options
                                                var MAX_OPTIONS = 5;

                                                $('#joForm')
                                                // Add button click handler
                                                .on('click', '.addButton', function() {
                                                    var $template = $('#optionTemplate'),
                                                        $clone    = $template
                                                                        .clone()
                                                                        .removeClass('hide')
                                                                        .removeAttr('id')
                                                                        .insertBefore($template),
                                                        $option   = $clone.find('[name="serviceid[]"]');

                                                    // Add new field
                                                    // $('#joForm').formValidation('addField', $option);
                                                })
                                                // Remove button click handler
                                                .on('click', '.removeButton', function() {
                                                    var $row    = $(this).parents('.form-group'),
                                                        $option = $row.find('[name="serviceid[]"]');

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

                                                    if (data.field === 'serviceid[]') {
                                                        if ($('#joForm').find(':visible[name="serviceid[]"]').length >= MAX_OPTIONS) {
                                                            $('#joForm').find('.addButton').attr('disabled', 'disabled');
                                                        }
                                                    }
                                                })

                                                // Called after removing the field
                                                .on('removed.field.fv', function(e, data) {
                                                   if (data.field === 'serviceid[]') {
                                                        if ($('#joForm').find(':visible[name="serviceid[]"]').length < MAX_OPTIONS) {
                                                            $('#joForm').find('.addButton').removeAttr('disabled');
                                                        }
                                                    }
                                                });

                                            });
                                            // --------------------------------asasasas-----------------------------------------------------------
                                                $(document).ready(function() {
                                                // The maximum number of options
                                                var MAX_OPTIONS = 5;

                                                $('.joEmpty #additionalitems').typeahead({
                                                        name: 'additionalitems',
                                                        remote:'includes/data-processors/searchjo.php?key=%QUERY',
                                                        limit : 10
                                                        
                                                    });


                                                $('#joForm')
                                                // Add button click handler
                                                .on('click', '.addButtonAI', function() {




                                                    var $template = $('#optionTemplateAdditionalItems'),
                                                        $clone    = $template
                                                                        .clone()
                                                                        .removeClass('hide')
                                                                        .removeAttr('id')
                                                                        .insertBefore($template),
                                                        $option   = $clone.find('[name="additionalitems[]"]');

                                                    $('.joEmpty #additionalitems').typeahead({
                                                        name: 'additionalitems',
                                                        remote:'includes/data-processors/searchjo.php?key=%QUERY',
                                                        limit : 10
                                                        
                                                    });

                                                    // Add new field
                                                    // $('#joForm').formValidation('addField', $option);
                                                })
                                                // Remove button click handler
                                                .on('click', '.removeButtonAI', function() {
                                                    var $row    = $(this).parents('.form-group'),
                                                        $option = $row.find('[name="additionalitems[]"]');

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

                                                    if (data.field === 'additionalitems[]') {
                                                        if ($('#joForm').find(':visible[name="additionalitems[]"]').length >= MAX_OPTIONS) {
                                                            $('#joForm').find('.addButtonAI').attr('disabled', 'disabled');
                                                        }
                                                    }
                                                })

                                                // Called after removing the field
                                                .on('removed.field.fv', function(e, data) {
                                                   if (data.field === 'additionalitems[]') {
                                                        if ($('#joForm').find(':visible[name="additionalitems[]"]').length < MAX_OPTIONS) {
                                                            $('#joForm').find('.addButtonAI').removeAttr('disabled');
                                                        }
                                                    }
                                                });

                                            });


                                                // ---------------------------------------------------------------------------------------
                                            $(document).ready(function() {
                                                // The maximum number of options
                                                var MAX_OPTIONS = 5;

                                                $('#joForm')

                                                .on('click', '.addButtonMach', function() {
                                                    var $template = $('#optionTemplateMachinist'),
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
                                                .on('click', '.removeButtonMach', function() {
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
                                                        if ($('#joForm').find(':visible[name="employeeid[]"]').length >= MAX_OPTIONS) {
                                                            $('#joForm').find('.addButtonMach').attr('disabled', 'disabled');
                                                        }
                                                    }
                                                })

                                                // Called after removing the field
                                                .on('removed.field.fv', function(e, data) {
                                                   if (data.field === 'employeeid[]') {
                                                        if ($('#joForm').find(':visible[name="employeeid[]"]').length < MAX_OPTIONS) {
                                                            $('#joForm').find('.addButtonMach').removeAttr('disabled');
                                                        }
                                                    }
                                                });
                                        // ------------------------------------------------------------------------------------------------------

                                        $(document).ready(function() {
                                                // The maximum number of options
                                                var MAX_OPTIONS = 5;

                                                $('#joForm')
                                                // Add button click handler
                                                .on('click', '.addButtonItem', function() {
                                                    var $template = $('#optionTemplateItem'),
                                                        $clone    = $template
                                                                        .clone()
                                                                        .removeClass('hide')
                                                                        .removeAttr('id')
                                                                        .insertBefore($template),
                                                        $option   = $clone.find('[name="itemid[]"]');

                                                    // Add new field
                                                    // $('#joForm').formValidation('addField', $option);
                                                })
                                                // Remove button click handler
                                                .on('click', '.removeButtonItem', function() {
                                                    var $row    = $(this).parents('.form-group'),
                                                        $option = $row.find('[name="itemid[]"]');

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

                                                    if (data.field === 'itemid[]') {
                                                        if ($('#joForm').find(':visible[name="itemid[]"]').length >= MAX_OPTIONS) {
                                                            $('#joForm').find('.addButtonItem').attr('disabled', 'disabled');
                                                        }
                                                    }
                                                })

                                                // Called after removing the field
                                                .on('removed.field.fv', function(e, data) {
                                                   if (data.field === 'itemid[]') {
                                                        if ($('#joForm').find(':visible[name="itemid[]"]').length < MAX_OPTIONS) {
                                                            $('#joForm').find('.addButtonItem').removeAttr('disabled');
                                                        }
                                                    }
                                                });

                                            });

                                            });