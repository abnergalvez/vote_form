// ----------- Document Init Charge  -------

$(document).ready(function () {
    
    $('#region').on('change', function () {
        var selectedRegion = $(this).val();
        var selectCommune = $('#commune');
        if(selectedRegion !== ''){
            $.post('/region/getcommunes/', { region_id: selectedRegion }, function (data) {
                var communeOptions = JSON.parse(data);
                selectCommune.empty();
                selectCommune.append($('<option>', {value: "",text: "Selecione comuna"}));
                $.each(communeOptions, function (index, commune) {
                    selectCommune.append($('<option>', {
                        value: commune.id,
                        text: commune.label
                    }));
                });
            });
        }else{
            selectCommune.empty();
            cleanValidationInput(selectCommune);
        }
        
    });

    $("#rut").on("blur", function() {
        validateRut("#rut", true);
    });

    $("#fullname").on("blur", function() {
        validateFullName("#fullname", true);
    });

    $("#alias").on("blur", function() {
        validateAlias("#alias", true);
    });

    $("#email").on("blur", function() {
        validateEmail("#email", true);
    });

    $("#region").on("change", function() {
        validateRegion("#region", true);
    });

    $("#commune").on("change", function() {
        validateCommune("#commune", true);
    });

    $("#candidate").on("change", function() {
        validateCandidate("#candidate", true);
    });

    $('input[name="find_out[]"]').on("change", function() {
        validateFindOut();
    });
});





