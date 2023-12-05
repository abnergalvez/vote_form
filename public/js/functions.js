// Function to submit the form after validation
function submitForm() {
    var isValid = fullValidationForm();
    if(isValid){
        var formData = $('form').serialize();

        // Send the POST request
        $.ajax({
            type: 'POST',
            url: '/vote/save', // Replace with your actual endpoint URL
            data: formData,
            success: function(response) {
                var res = JSON.parse(response);
                $('.alert').css('display', 'block');
                if(res.status !== 'error'){
                    $('.alert').removeClass('alert-danger');
                    $('.alert').addClass('alert-success');
                }else{
                    $('.alert').removeClass('alert-success');
                    $('.alert').addClass('alert-danger');
                }
                $('.alert-content').html(res.message);
                setTimeout(function () {
                    $('.alert').css('display', 'none');
                   if(res.status == 'success'){
                    location.reload();
                   };
                },5000);
            },
            error: function(error) {
                // Handle errors
                console.log(error);
                $('.alert').css('display', 'block');
                $('.alert').removeClass('alert-danger');
                $('.alert').addClass('alert-danger');
                $('.alert-content').html(error);
                setTimeout(function () {
                    $('.alert').css('display', 'none');
                },5000);
            }
        });
    } else {
        // Display error message or handle validation failure
        $('.alert').css('display', 'block');
        $('.alert').removeClass('alert-danger');
        $('.alert').addClass('alert-danger');
        $('.alert-content').html('Existen errores en el formulario');
        setTimeout(function () {
            $('.alert').css('display', 'none');
        },5000);
    }
    
}

// Function to validate a Chilean RUT
function isValidRut(rut) {
    // Format: xxxxxxxx-x
    var rutRegex = /^[0-9]{7,8}-[0-9kK]{1}$/;
    if (!rutRegex.test(rut)) {
        return false;
    }

    var [numRut, dvRut] = rut.split('-');
    var sum = 0;
    var multiplier = 2;

    for (var i = numRut.length - 1; i >= 0; i--) {
        sum += parseInt(numRut.charAt(i)) * multiplier;
        multiplier = (multiplier < 7) ? multiplier + 1 : 2;
    }

    var dvCalc = 11 - (sum % 11);
    dvCalc = (dvCalc === 11) ? 0 : (dvCalc === 10) ? 'k' : dvCalc.toString();

    return dvCalc.toUpperCase() === dvRut.toUpperCase();
}

// Function to set an input as valid
function setValidInput(target) {
    cleanValidationInput(target);
    $(target).addClass('is-valid').removeClass('is-invalid');
}

// Function to set an input as invalid
function setInvalidInput(target) {
    cleanValidationInput(target);
    $(target).addClass('is-invalid').removeClass('is-valid');
}

// Function to set invalid feedback message
function setInvalidFeedBack(target, message) {
    var feedback = $(target).next(".feedback");
    feedback.addClass('invalid-feedback').html(message);
}

// Function to set valid feedback message
function setValidFeedBack(target) {
    var feedback = $(target).next(".feedback");
    feedback.removeClass('invalid-feedback').html('');
}

// Function to clean validation state of an input
function cleanValidationInput(target) {
    $(target).removeClass('is-invalid is-valid');
    $(target).next(".feedback").html('');
}
