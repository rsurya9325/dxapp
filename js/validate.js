$(document).ready(function() {

    $('#loginForm').bootstrapValidator({

        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },

        fields: {
            userid: {
                group:'.form-group',
                validators: {
                    notEmpty: {
                        message: 'Employee ID should not be empty'
                    }
                }
            },
            userpasswd: {
                group:'.form-group',
                validators: {
                    notEmpty: {
                        message: 'Password is empty'
                    }
                }
            }

        }
    
    });

});