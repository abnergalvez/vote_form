// ----------- Validations Field Form Functions  -------

function validateFullName(field, full = false){
    var fullname = $(field).val();
    validFullnameBool = true;
    if(fullname !==''){
        setValidInput($(field));
        setValidFeedBack($(field));
        validFullnameBool = true;
    }else{
        if(full){
            setInvalidInput($(field));
            setInvalidFeedBack($(field),'El campo es obligatorio');
            validFullnameBool = false;
        }else{
            cleanValidationInput($(field));
        }
    }
     return validFullnameBool;
}

function validateAlias(field, full = false){
    var alias = $(field).val();
    var validAliasBool = true;
    if(alias !==''){
        if (alias.length < 5) {
            setInvalidInput($(field));
            setInvalidFeedBack($(field),'La longitud mínima son 5 caracteres');
            validAliasBool = false;
        }
        var regex = /^(?=.*[a-zA-Z])(?=.*\d).+$/;
        if(!regex.test(alias)){
            setInvalidInput($(field));
            setInvalidFeedBack($(field),'Debe contener al menos una letra y un numero');
            validAliasBool = false;
        }else{
            setValidInput($(field));
            setValidFeedBack($(field));
            validAliasBool = true;
        }
    }else{
        cleanValidationInput($(field));
    }
    return validAliasBool;
}

function validateRut(field, full = false){
    var rut = $(field).val();
    var validRutBool = true;

    if(rut !==''){
        if (!isValidRut(rut)) {
            setInvalidInput($(field));
            setInvalidFeedBack($(field),'Rut Invalido');
            validRutBool = false;
        }else{
            setValidInput($(field));
            setValidFeedBack($(field));
            validRutBool = true;
        }
    }else{
        if(full){
            setInvalidInput($(field));
            setInvalidFeedBack($(field),'El campo es obligatorio');
            validRutBool = false;
        }else{
            cleanValidationInput($(field));
        }
    }
     return validRutBool;
}

function validateEmail(field, full = false){
    var email = $(field).val();
    var validEmailBool = true;
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(email !==''){
        if (!regex.test(email)) {
            setInvalidInput($(field));
            setInvalidFeedBack($(field),'Email invalido');
            validEmailBool = false;
        }else{
            setValidInput($(field));
            setValidFeedBack($(field));
            validEmailBool = true;
        }
    }else{
        if(full){
            setInvalidInput($(field));
            setInvalidFeedBack($(field),'El campo es obligatorio');
            validEmailBool = false;
        }else{
            cleanValidationInput($(field));
        }
    }
     return validEmailBool;
}

function validateRegion(field, full){
    var region = $(field).val();
    validRegionBool = true;
    
    if(region !==''){
        setValidInput($(field));
        setValidFeedBack($(field));
        validRegionBool = true;
    }else{
        if(full){
            setInvalidInput($(field));
            setInvalidFeedBack($(field),'El campo es obligatorio');
            validRegionBool = false;
        }else{
            cleanValidationInput($(field));
        }
    }
     return validRegionBool;
}

function validateCommune(field, full = false){
    var commune = $(field).val();
    var validCommuneBool = true;
    
    if(commune !==''){
        setValidInput($(field));
        setValidFeedBack($(field));
        validCommuneBool = true;
    }else{
        if(full){
            setInvalidInput($(field));
            setInvalidFeedBack($(field),'El campo es obligatorio');
            validCommuneBool = false;
        }else{
            cleanValidationInput($(field));
        }
    }
     return validCommuneBool;
}

function validateCandidate(field, full = false){
    var candidate = $(field).val();
    var validCandidateBool = true;
    
    if(candidate !==''){
        setValidInput($(field));
        setValidFeedBack($(field));
        validCandidateBool = true;
    }else{
        if(full){
            setInvalidInput($(field));
            setInvalidFeedBack($(field),'El campo es obligatorio');
            validCandidateBool = false;
        }else{
            cleanValidationInput($(field));
        }
    }
     return validCandidateBool;
}

function validateFindOut(){
    var findOutChecked = $('input[name="find_out[]"]:checked');
    var validFindOutBool = true;
    if(findOutChecked.length < 2){
        $('.feedback-checkbox').text(' Se debe seleccionar al menos 2');
        $('.feedback-checkbox').addClass('text-danger');
        validFindOutBool = false;
    }else{
        $('.feedback-checkbox').text('');
        validFindOutBool = true;
    }
    return validFindOutBool;
}

function fullValidationForm(){
    let isValid = true;

    let fullNameValid = validateFullName('#fullname', true);
    let aliasValid = validateAlias('#alias', true);
    let rutValid = validateRut('#rut', true);
    let emailValid = validateEmail('#email', true);
    let regionValid = validateRegion('#region', true);
    let communeValid = validateCommune('#commune', true);
    let candidateValid = validateCandidate('#candidate', true);
    let findOutvalid = validateFindOut();

    isValid = isValid && fullNameValid;
    isValid = isValid && aliasValid;
    isValid = isValid && rutValid;
    isValid = isValid && emailValid;
    isValid = isValid && regionValid;
    isValid = isValid && communeValid;
    isValid = isValid && candidateValid;
    isValid = isValid && findOutvalid;
    return isValid;
}